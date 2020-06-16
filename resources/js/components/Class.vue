<template>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Modules</h3>

                    <div class="card-tools">
                    <button class="btn btn-success" v-show="$gate.isAdmin()" @click="newModal">Ajouter un module<i class="fas fa-user-plus fa-fw"></i></button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                    <thead>
                        <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Created At</th>
                        <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>  
                        <tr v-for="classes in classes.data" :key="classes.id">
                        <td>{{ classes.id }}</td>
                        <td>{{ classes.className }}</td>
                        <td>{{ classes.created_at | myDate}}</td>
                        <td>
                            <a href="#" @click="editModal(classes)">
                                <i class="fa fa-edit blue"></i>
                            </a>
                            /
                            <a href="#" @click="deleteClass(classes.id)">
                                <i class="fa fa-trash red"></i>
                            </a>
                        </td>
                        </tr>
                    </tbody>
                    </table>
                </div>
              <!-- /.card-body -->
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
            <form @submit.prevent="editmode ? updateClass() : createClass()">
                <div class="modal-body">
                    <div class="form-group">
                        <input v-model="form.className" type="text" name="name" placeholder="Nom du module"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('className') }">
                        <has-error :form="form" field="className"></has-error>
                    </div>

                    <div class="form-group" v-show="$gate.isAdmin()">
                        <select name="type" v-model="form.user_id" id="type" class="form-control" :class="{
                        'is-valid': form.errors.has('user_id')}">
                            <option value="">Select User Role</option>
                            <option value="admin">Admin</option>
                            <option value="teacher">Prof</option>
                            <option value="student">Etudiant</option>
                        </select>
                        <has-error :form="form" field="user_id"></has-error>
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
        data(){
            return{
                editmode: false,
                classes: {},
                profs: {},
                form: new Form({
                    id: '',
                    className: '',
                })
            }
        },
        methods: {
            loadClasses(){
                axios.get("api/class").then(({ data }) => (this.classes = data));
            },

            newModal(){
                this.editmode = false;
                this.form.reset();
                $('#addNew').modal('show');
            },

            editModal(classes){
                this.form.reset();
                $('#addNew').modal('show');
                this.form.fill(classes);
                this.editmode = true;
            },

            createClass(){

            },
            
            updateClass(){

            },

            deleteClass(){

            },
            editClass(){
                
            }



        },

        created(){
            this.loadClasses();
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
