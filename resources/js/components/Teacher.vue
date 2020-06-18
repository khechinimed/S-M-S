<template>
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-3" v-for="user in users.data" :key="user.id">
            <!-- Widget: user widget style 2 -->
            <div class="card card-widget widget-user-2">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-warning" style="height: 100px !important">
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
                      Projects <span class="float-right badge bg-primary">31</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      Tasks <span class="float-right badge bg-info">5</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      Completed Projects <span class="float-right badge bg-success">12</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      Followers <span class="float-right badge bg-danger">842</span>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /.widget-user -->
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
            loadUsers(){
                axios.get('api/user').then(({ data }) => (this.users = data));
            },
        },
        created() {
            this.loadUsers();
        }
    }
</script>
