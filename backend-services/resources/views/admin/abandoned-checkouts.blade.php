@extends('layouts.admin')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Abandoned Checkouts</h1>
          </div><!-- /.col -->
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
                    <input type="text" class="form-control" placeholder="Filter abandoned checkouts">
                  </div>
                </form>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-valign-middle table-hover cursor-pointer">
                  <thead>
                    <tr>
                      <th>Checkout ID</th>
                      <th>Order Date</th>
                      <th>Placed by</th>
                      <th>Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr onclick="window.location='abandoned-checkout.php'">
                      <td>1234567</td>
                      <td>10 sept 2021</td>
                      <td>Joe Lemon</td>
                      <td>€79.95 EUR</td>
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
