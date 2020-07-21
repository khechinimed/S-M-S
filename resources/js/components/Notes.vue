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
                            <th>01</th>
                            <th>MOHAMED</th>
                            <th>KHECHINI</th>
                            <th>21</th>
                            <th>MIAGE</th>
                            <th>16.75</th>
                            <th>18</th>
                            <th>17.37</th>
                            <th>21 - 07 - 2020</th>
                        </tr>
                        <tr>
                            <th>16</th>
                            <th>AZIZ</th>
                            <th>WALOU</th>
                            <th>20</th>
                            <th>MIAGE</th>
                            <th>12</th>
                            <th>10</th>
                            <th>11</th>
                            <th>21 - 07 - 2020</th>
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
