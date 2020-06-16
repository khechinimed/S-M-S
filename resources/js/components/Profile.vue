<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                <div class="card card-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header text-white" style="background-image:url('./img/user-cover.jpg')">
                  <h3 class="widget-user-username text-left">{{ this.form.name | upText}}</h3>
                  <h5 class="widget-user-desc text-left">{{ this.form.type | upText}}</h5>
                </div>
                <div class="widget-user-image">
                    <img class="img-circle elevation-2" :src="getProfilePhoto()" alt="User Avatar">
                </div>
                <div class="card-footer">
                    <div class="row">
                    <div class="col-sm-4 border-right">
                        <div class="description-block">
                        <h5 class="description-header">3,200</h5>
                        <span class="description-text">SALES</span>
                        </div>
                        <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 border-right">
                        <div class="description-block">
                        <h5 class="description-header">13,000</h5>
                        <span class="description-text">FOLLOWERS</span>
                        </div>
                        <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4">
                        <div class="description-block">
                        <h5 class="description-header">35</h5>
                        <span class="description-text">PRODUCTS</span>
                        </div>
                        <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                </div>


                <!-- SECOND PART -->
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link" href="#activity" data-toggle="tab">Activity</a></li>
                  <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane" id="activity">
                    <div class="text-center">
                        <h3>Display User Activity</h3>
                    </div>
                  </div>
                  

                  <div class="tab-pane active" id="settings">
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputName"  class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" v-model="form.name" class="form-control" id="inputName" placeholder="Name" :class="{ 'is-invalid': form.errors.has('name') }">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" v-model="form.email" class="form-control" id="inputEmail" placeholder="Email" :class="{ 'is-invalid': form.errors.has('email') }">
                          <has-error :form="form" field="type"></has-error>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" v-model="form.bio" id="inputExperience" placeholder="Experience"></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputPhoto" class="col-sm-2 col-form-label">Profile Photo (less than 2Mb)</label>
                        <div class="col-sm-10">
                          <input type="file" @change="updateProfile" id="inputPhoto" placeholder="Photo">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputPhoto" class="col-sm-2 col-form-label">Role</label>
                        <div class="col-sm-10">
                        <select v-model="form.type" id="type" class="form-control">
                          
                            <option value="">Select User Role</option>
                            <option value="admin">Admin</option>
                            <option value="teacher">Prof</option>
                            <option value="student">Etudiant</option>
                        </select>
                        </div>
                        <has-error :form="form" field="type"></has-error>
                      </div>
                      
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button @click.prevent="updateInfo" type="submit" class="btn btn-success">Update</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return{
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
        mounted() {
            console.log('Component mounted.')
        },
        created() {
            axios.get('api/profile').then(({ data }) => (this.form.fill(data)));
        },
        methods: {
          updateInfo(){
            this.$Progress.start();
            this.form.put('api/profile')
            .then(()=>{
              this.$Progress.finish();
            })
            .catch(()=>{
              this.$Progress.fail();
            })
          },
          updateProfile(e){
            //console.log("uploading");
            let file = e.target.files[0];
            //console.log("file");

            //checking if the file size is less than 2Mb
            if(file['size'] < 2111775){

              var reader = new FileReader();
              reader.onloadend = (file) => {
                //console.log('RESULT', reader.result)
                this.form.photo = reader.result;
              }
              reader.readAsDataURL(file);
            }else{

              Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Vous avez uploadé un gros fichier!',
              })
            }

          },
          getProfilePhoto(){
            
            let photo = (this.form.photo.length > 200) ? this.form.photo : "img/profile/" + this.form.photo;

            return photo;
          }
        }
    }
</script>

<style>
.widget-user-header{
    background-position: center center;
    background-size: cover;
    height: 250px !important;
}
.widget-user .card-footer{
    padding: 100;
}
</style>