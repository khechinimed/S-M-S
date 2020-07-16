<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 pt-4">
                <h3 class="card-title">Notes</h3>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Prenom</th>
                            <th>Nom</th>
                            <th>Age</th>
                            <th>Filière</th>
                            <th>Note 1</th>
                            <th>Note 2</th>
                            <th>Note finale</th>
                            <th>Registred At</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>ID</th>
                            <th>Prenom</th>
                            <th>Nom</th>
                            <th>Age</th>
                            <th>Filière</th>
                            <th>Note 1</th>
                            <th>Note 2</th>
                            <th>Note finale</th>
                            <th>Registred At</th>
                        </tr>
                
                    </tbody>
                    </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
