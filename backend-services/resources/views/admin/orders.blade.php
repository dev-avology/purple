@extends('layouts.admin')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Orders</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ul class="list-group list-group-horizontal float-md-right mt-2">
              <li class="list-group-item">
                <a href="#" class="text-secondary">Export</a>
              </li>
              <li class="list-group-item">
                <a href="#" class="text-secondary">Create Order</a>
              </li>
            </ul> 
          </div> 
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header border-0">
                <form action="">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Filter orders">
                  </div>
                </form>
              </div>
              <div class="card-body table-responsive p-0">
                  <table class="table table-valign-middle table-hover cursor-pointer">
                    <thead>
                      <tr>
                        <th>Order ID</th>
                        <th>Order Date</th>
                        <th>Customer</th>
                        <th>Total</th>
                        <th>Payment</th>
                        <th>Fulfillment</th>
                        <th>Items</th>
                        <th>Delivery Method</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr onclick="window.location='order.php';">
                        <td>4567</td>
                        <td>10 sept 2021</td>
                        <td>Brian Blue</td>
                        <td>€199.95</td>
                        <td><span class="badge bg-success">Paid</span></td>
                        <td><span class="badge bg-warning">Unfulfilled</span></td>
                        <td>6 items</td>
                        <td>Standard shipping</td>
                      </tr>
                      <tr onclick="window.location='order2.php';">
                        <td>4566</td>
                        <td>9 sept 2021</td>
                        <td>James Black</td>
                        <td>€29.95</td>
                        <td><span class="badge bg-success">Paid</span></td>
                        <td><span class="badge bg-success">Fulfilled</span></td>
                        <td>1 item</td>
                        <td>Standard shipping</td>
                      </tr>
                      <tr onclick="window.location='order3.php';">
                        <td>4564</td>
                        <td>8 sept 2021</td>
                        <td>Tom Green</td>
                        <td>€74.95</td>
                        <td><span class="badge bg-info">Refunded</span></td>
                        <td><span class="badge bg-danger">Canceled</span></td>
                        <td>2 items</td>
                        <td>Standard shipping</td>
                      </tr>
                    </tbody>
                  </table>
              </div>
            </div>
            <!-- /.card -->
          </div>

          <!-- /.col-md-12 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection