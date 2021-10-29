@extends('layouts.admin')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Products</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ul class="list-group list-group-horizontal float-md-right mt-2">
              <li class="list-group-item">
                <a href="#" class="text-secondary">Export</a>
              </li>
              <li class="list-group-item">
                <a href="{{ route('add-new-product') }}" class="text-secondary">Add Product</a>
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
                    <input type="text" class="form-control" placeholder="Filter Products">
                  </div>
                </form>
              </div>
              <div class="card-body table-responsive p-0">
                  <table class="table table-valign-middle table-hover cursor-pointer">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>SKU</th>
                        <th>Status</th>
                        <th>Product Image</th>
                        <th>Category</th>
                        <th>Created At</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr onclick="window.location='customer.php';">
                        <td>1</td>
                        <td>Test Product</td>
                        <td>$100</td>
                        <td>233UKF2021</td>
                        <td>In Stock</td>
                        <td>Product Image</td>
                        <td>Wall Art</td>
                        <td>17-October-2021</td>
                      </tr>
                      <tr onclick="window.location='customer2.php';">
                        <td>1</td>
                        <td>Test Product</td>
                        <td>$100</td>
                        <td>233UKF2021</td>
                        <td>In Stock</td>
                        <td>Product Image</td>
                        <td>Wall Art</td>
                        <td>17-October-2021</td>
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