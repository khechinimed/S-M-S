@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
                <div class="col-12">

                        <!-- Main content -->
                        <div class="invoice p-3 mb-3">
                          <!-- title row -->
                          <div class="row">
                            <div class="col-12">
                              <h4>
                                <i class="fa fa-globe"></i> MIAGE | 2020
                                <small class="float-right">Date: 21/07/2020</small>
                              </h4>
                            </div>
                            <!-- /.col -->
                          </div>
                          <!-- info row -->
                          <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                              From
                              <address>
                                <strong>Admin, Inc.</strong><br>
                                795 Folsom Ave, Suite 600<br>
                                San Francisco, CA 94107<br>
                                Phone: (804) 123-5432<br>
                                Email: info@almasaeedstudio.com
                              </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                              <b>Invoice #007612</b><br>
                              <br>
                              <b>Order ID:</b> 4F3S8J<br>
                              <b>Payment Due:</b> 2/22/2014<br>
                              <b>Account:</b> 968-34567
                            </div>
                            <!-- /.col -->
                          </div>
                          <!-- /.row -->

                          <!-- Table row -->

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

                          

                          <!-- this row will not appear when printing -->
                          <div class="row no-print">
                            <div class="col-12">
                              <button @click.prevent="printme" target="_blank" type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                                <i class="fa fa-download"></i> Print / Generate PDF
                              </button>

                            </div>
                          </div>

                        </div>
                        <!-- /.invoice -->
                      </div>


        </div>
    </div>


@endsection
