@extends('layouts.admin')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <div class="d-flex">
                <p class="d-flex flex-column">
                  <span class="text-bold text-lg">820</span>
                  <span>Today's Visitors</span>
                </p>
                <p class="ml-auto d-flex flex-column text-right">
                  <span class="text-success">
                    <i class="fas fa-arrow-up"></i> 12.5%
                  </span>
                  <span class="text-muted">Since yesterday</span>
                </p>
              </div>
              <!-- /.d-flex -->

              <div class="position-relative mb-4">
                <canvas id="visitors-chart" height="200"></canvas>
              </div>

              <div class="d-flex flex-row justify-content-end">
                <span class="mr-2">
                  <i class="fas fa-square text-primary"></i> Today
                </span>

                <span>
                  <i class="fas fa-square text-gray"></i> Yesterday
                </span>
              </div>
            </div>
          </div>
          <!-- /.card -->

          <div class="card">
            <div class="card-header border-0">
              <h3 class="card-title">Last Orders</h3>
              <div class="card-tools">
                <a href="#" class="btn btn-tool btn-sm">
                  <i class="fas fa-download"></i>
                </a>
                <a href="#" class="btn btn-tool btn-sm">
                  <i class="fas fa-bars"></i>
                </a>
              </div>
            </div>
            <div class="card-body table-responsive p-0">
              <table class="table table-valign-middle table-hover cursor-pointer">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Total</th>
                    <th>Items</th>
                  </tr>
                </thead>
                <tbody>
                  <tr onclick="window.location='order.php';">
                    <td>Brian Blue</td>
                    <td>€199.95 EUR</td>
                    <td>6 Items</td>
                  </tr>
                  <tr onclick="window.location='order2.php';">
                    <td>James Black</td>
                    <td>€29.95 EUR</td>
                    <td>1 Item</td>
                  </tr>
                  <tr onclick="window.location='order3.php';">
                    <td>Tom Green</td>
                    <td>€74.95 EUR</td>
                    <td>2 Items</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <!-- /.card -->
        </div>

        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <div class="d-flex">
                <p class="d-flex flex-column">
                  <span class="text-bold text-lg">€1,820 EUR</span>
                  <span>Today's Sales</span>
                </p>
                <p class="ml-auto d-flex flex-column text-right">
                  <span class="text-success">
                    <i class="fas fa-arrow-up"></i> 17%
                  </span>
                  <span class="text-muted">Since yesterday</span>
                </p>
              </div>
              <!-- /.d-flex -->

              <div class="position-relative mb-4">
                <canvas id="sales-chart" height="200"></canvas>
              </div>

              <div class="d-flex flex-row justify-content-end">
                <span class="mr-2">
                  <i class="fas fa-square text-primary"></i> Today
                </span>

                <span>
                  <i class="fas fa-square text-gray"></i> Yesterday
                </span>
              </div>
            </div>
          </div>
          <!-- /.card -->

          <div class="card">
            <div class="card-header border-0">
              <h3 class="card-title">Last Customers</h3>
              <div class="card-tools">
                <a href="#" class="btn btn-tool btn-sm">
                  <i class="fas fa-download"></i>
                </a>
                <a href="#" class="btn btn-tool btn-sm">
                  <i class="fas fa-bars"></i>
                </a>
              </div>
            </div>
            <div class="card-body table-responsive p-0">
              <table class="table table-valign-middle table-hover cursor-pointer">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Artist</th>
                  </tr>
                </thead>
                <tbody>
                  <tr onclick="window.location='customer.php';">
                    <td>Jane Doe</td>
                    <td>example@mail.com</td>
                    <td><i class="fas fa-check-circle"></i></td>
                  </tr>
                  <tr onclick="window.location='customer2.php';">
                    <td>James Black</td>
                    <td>example@mail.com</td>
                    <td><i class="fas fa-times"></i></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <!-- /.card -->
        </div>

        <!-- /.col-md-6 -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection