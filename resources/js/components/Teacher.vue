<template>
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-4" v-for="user in users.data" :key="user.id">
            <!-- Widget: user widget style 2 -->
            <div class="card card-widget widget-user-2">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-warning" style="height: 120px !important">
                <div class="widget-user-image">
                  <img class="img-circle elevation-2" :src="'/img/profile/' + user.photo" alt="User Avatar">
                </div>
                <!-- /.widget-user-image -->
                <h3 class="widget-user-username">{{ user.name }}</h3>
                <h5 class="widget-user-desc">{{ user.type | upText}}</h5>
              </div>
              <div class="card-footer p-0">
                <ul class="nav flex-column">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      ID: <span class="float-right badge bg-success">{{ user.id }}</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      Email: <span class="float-right badge bg-info">{{ user.email }}</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      Students: <span class="float-right badge bg-danger">{{ user.classes_count }}</span>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /.widget-user -->
          </div>
        </div>
        <!-- PAGINATION -->
        <div class="">
          <pagination :data="users" @pagination-change-page="getResults">
              <span slot="prev-nav">&lt; Previous</span>
              <span slot="next-nav">Next &gt;</span>
          </pagination>
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
            loadUsers(){
                axios.get('api/user').then(({ data }) => (this.users = data));
            },

            getResults(page = 1){
                
                axios.get('api/user?page=' + page)
                .then(response => {
                    this.users = response.data;
                });

            }
        },
        created() {
            this.loadUsers();
        }
    }
</script>
