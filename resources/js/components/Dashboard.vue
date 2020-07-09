<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">MIAGE</li>
                        </ol>
                    </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
                </div>
                <section class="container-fluid">
                    <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ students.total }}</h3>

                            <p>Nommbre des étudiants</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="/students" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ classes.total }}</h3>

                                <p>Nombres des modules</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="/class" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ users.total }}</h3>

                                <p>Nombre d'utilisateurs</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="/users" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>36</h3>
                                <p>Nombre de visites</p>
                            </div>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                </section>
                
                
            </div>
        </div>
        <div class="row">
          
          

          <div class="col-md-12">
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-bullhorn"></i>
                  
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="callout callout-danger">
                  <h5>I am a danger callout!</h5>

                  <p>There is a problem that we need to fix. A wonderful serenity has taken possession of my entire
                    soul,
                    like these sweet mornings of spring which I enjoy with my whole heart.</p>
                </div>
                <div class="callout callout-info">
                  <h5>I am an info callout!</h5>

                  <p>Follow the steps to continue to payment.</p>
                </div>
                <div class="callout callout-warning">
                  <h5>I am a warning callout!</h5>

                  <p>This is a yellow callout.</p>
                </div>
                <div class="callout callout-success">
                  <h5>I am a success callout!</h5>

                  <p>This is a green callout.</p>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return{
                users: {},
                students: {},
                classes: {}
            }
        },
        methods: {
            loadUsers(){
                axios.get('api/user').then(({ data }) => (this.users = data));
                axios.get('api/student').then(({ data }) => (this.students = data));
                axios.get("api/class").then(({ data }) => (this.classes = data.classes));
            },

        },
        created() {
            this.loadUsers();
        }
    }
</script>
