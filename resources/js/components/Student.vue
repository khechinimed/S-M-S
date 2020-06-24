<template>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Student Table</h3>

                    <div class="card-tools">
                    <button class="btn btn-success" @click="newModal">Add New <i class="fas fa-user-plus fa-fw"></i></button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                    <thead>
                        <tr>
                        <th>ID</th>
                        <th>Prenom</th>
                        <th>Nom</th>
                        <th>Age</th>
                        <th>Filière</th>
                        <th>Registred At</th>
                        </tr>
                    </thead>
                    <tbody>  
                        <tr v-for="student in students.data" :key="student.id">
                        <td>{{ student.id }}</td>
                        <td>{{ student.first_name | upText }}</td>
                        <td>{{ student.last_name | upText }}</td>
                        <td>{{ student.age }}</td>
                        <td>MIAGE</td>
                        <td>{{ student.created_at | myDate}}</td>
                        <td>
                            <a href="#" @click="deleteStudent(student.id)">
                              <i class="fa fa-trash red"></i>
                            </a></td>                       
                        </tr>
                    </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <!-- <div class="card-footer">
                    <pagination :data="students" @pagination-change-page="getResults">
                        <span slot="prev-nav">&lt; Previous</span>
                        <span slot="next-nav">Next &gt;</span>
                    </pagination>
                </div> -->
                </div>
            <!-- /.card -->
        
          </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNewLabel">Add New</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form @submit.prevent="createStudent()">
                <div class="modal-body">
                    <div class="form-group">
                        <input v-model="form.first_name" type="text" name="first_name" placeholder="Prénom"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('first_name') }">
                        <has-error :form="form" field="first_name"></has-error>
                    </div>

                    <div class="form-group">
                        <input v-model="form.last_name" type="text" name="last_name" placeholder="Nom"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('last_name') }">
                        <has-error :form="form" field="last_name"></has-error>
                    </div>

                    <div class="form-group">
                        <input v-model="form.age" type="number" name="age" placeholder="Age"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('age') }">
                        <has-error :form="form" field="age"></has-error>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Create</button>
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
            return {
                students: {},
                form: new Form({
                    id: '',
                    first_name: '',
                    last_name: '',
                    age: '',
                    user_id: ''
                })
            }
        },
        methods: {
            newModal(){
                this.form.reset();
                $('#addNew').modal('show');
            },
            loadStudents(){
                axios.get('api/student').then(({ data }) => (this.students = data));
            },
            createStudent(){
                this.$Progress.start();

                this.form.post('api/student').then(()=>{
                    
                    Fire.$emit('AfterCreate');

                    $('#addNew').modal('hide');

                    Toast.fire({
                        icon: 'success',
                        title: 'Etudiant Ajouté(e)'
                    });

                    this.$Progress.finish();

                }).catch(()=>{
                    
                    Toast.fire({
                        icon: 'error',
                        title: 'Etudiant non Ajouté(e)'
                    })

                    this.form.reset();
                });
                
            },
            deleteStudent(id) {
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
                        this.form.delete('api/student/' + id).then(()=>{
                        Swal.fire(
                            'Deleted!',
                            'The Student has been deleted.',
                            'success'
                        )
                        Fire.$emit('AfterCreate');
                        }).catch(()=> {
                            Swal.fire("Failed!", "There was something wronge.", "warning");
                        })
                    }
                })
            }
        },
        created() {
            
            this.loadStudents();

            Fire.$on('AfterCreate', () => {
                this.loadStudents();
            });

            Fire.$on('searching', ()=>{
                let query = this.$parent.search;
                axios.get('api/findStudent?q=' + query)
                .then((data)=>{
                    this.students = data.data;
                })
                .catch(()=>{

                })
            });

        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
