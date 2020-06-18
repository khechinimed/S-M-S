<template>
    <div class="container">
        <div class="row mt-5">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Users Table</h3>

                <div class="card-tools">
                  <button class="btn btn-success" v-show="$gate.isAdmin()" @click="newModal">Add New <i class="fas fa-user-plus fa-fw"></i></button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Type</th>
                      <th>Registred At</th>
                      <th>Mofify</th>
                    </tr>
                  </thead>
                  <tbody>  
                    <tr v-for="user in users.data" :key="user.id">
                      <td>{{ user.id }}</td>
                      <td>{{ user.name }}</td>
                      <td>{{ user.email }}</td>
                      <td>{{ user.type | upText}}</td>
                      <td>{{ user.created_at | myDate}}</td>
                      <td>
                          <a href="#" @click="editModal(user)">
                              <i class="fa fa-edit blue"></i>
                          </a>
                          /
                          <a href="#" @click="deleteUser(user.id)">
                              <i class="fa fa-trash red"></i>
                          </a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <pagination :data="users" @pagination-change-page="getResults">
                    <span slot="prev-nav">&lt; Previous</span>
                    <span slot="next-nav">Next &gt;</span>
                </pagination>
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>
        
        <!-- Modal -->
        <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNewLabel" v-show="!editmode">Add New</h5>
                <h5 class="modal-title" id="addNewLabel" v-show="editmode">Update User's Info</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form @submit.prevent="editmode ? updateUser() : createUser()">
                <div class="modal-body">
                    <div class="form-group">
                        <input v-model="form.name" type="text" name="name" placeholder="Name"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                        <has-error :form="form" field="username"></has-error>
                    </div>

                    <div class="form-group">
                        <input v-model="form.email" type="email" name="email" placeholder="Email Adress"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                        <has-error :form="form" field="email"></has-error>
                    </div>

                    <div class="form-group">
                        <textarea v-model="form.bio" type="text" name="bio" placeholder="Short bio for user (optional)"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('bio') }">
                        </textarea>
                        <has-error :form="form" field="bio"></has-error>
                    </div>

                    <div class="form-group">
                        <select name="type" v-model="form.type" id="type" class="form-control" :class="{
                        'is-valid': form.errors.has('type')}">
                            <option value="">Select User Role</option>
                            <option value="admin">Admin</option>
                            <option value="teacher">Prof</option>
                        </select>
                        <has-error :form="form" field="type"></has-error>
                    </div>

                    <div class="form-group">
                        <input v-model="form.password" type="password" name="password" placeholder="Password"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('password') }">
                        <has-error :form="form" field="password"></has-error>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button v-show="editmode" type="submit" class="btn btn-success">Update</button>
                    <button v-show="!editmode" type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
            </div>
        </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return{
                editmode: false,
                users: {},
                form: new Form({
                    id: '',
                    name: '',
                    email: '',
                    password: '',
                    bio: '',
                    type: '',
                    photo: ''
                })
            }
        },
        methods: {
            newModal(){
                this.editmode = false;
                this.form.reset();
                $('#addNew').modal('show');
            },
            editModal(user){
                this.form.reset();
                $('#addNew').modal('show');
                this.form.fill(user);
                this.editmode = true;
            },
            loadUsers(){
                axios.get('api/user').then(({ data }) => (this.users = data));
            },
            createUser(){
                this.$Progress.start();

                this.form.post('api/user').then(()=>{
                    
                    Fire.$emit('AfterCreate');

                    $('#addNew').modal('hide');

                    Toast.fire({
                        icon: 'success',
                        title: 'User Created successfully'
                    });

                    this.$Progress.finish();

                }).catch(()=>{
                    
                    Toast.fire({
                        icon: 'error',
                        title: 'User not Created'
                    })

                    this.form.reset();
                });
                
            },
            updateUser(){
                this.$Progress.start();
                this.form.put('api/user/' + this.form.id)
                .then(()=> {
                    //success
                    $('#addNew').modal('hide');
                    Swal.fire(
                        'Updated!',
                        'Information has been updated.',
                        'success'
                    )
                    this.$Progress.finish();
                    Fire.$emit('AfterCreate');
                })
                .catch(()=> {
                    this.$Progress.fail();
                });
            },
            deleteUser(id){
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    //send ajax request to the server
                    if (result.value) {
                        this.form.delete('api/user/' + id).then(()=>{
                        Swal.fire(
                            'Deleted!',
                            'The User has been deleted.',
                            'success'
                        )
                        Fire.$emit('AfterCreate');
                        }).catch(()=> {
                            Swal.fire("Failed!", "There was something wronge.", "warning");
                        })
                    }
                })
            },
            getResults(page = 1){
                
                axios.get('api/user?page=' + page)
                .then(response => {
                    this.users = response.data;
                });

            }
        },
        created() {
            //Searching listening
            Fire.$on('searching', ()=>{
                let query = this.$parent.search;
                axios.get('api/findUser?q=' + query)
                .then((data)=>{
                    this.users = data.data;
                })
                .catch(()=>{

                })
            });
            
            this.loadUsers();
            //setInterval(() => this.loadUsers(), 3000);
            Fire.$on('AfterCreate', () => {
                this.loadUsers();
            });
        }
    }
</script>
