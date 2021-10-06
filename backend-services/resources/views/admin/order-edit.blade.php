@extends('layouts.admin')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col">
            <a href="order.php" class="btn btn-outline-dark float-left mr-3">
              <i class="fas fa-angle-left"></i>
            </a>
            <h1 class="m-0">Edit Order #4567</h1>
            <span class="badge bg-gray">September 10, 2021 at 7:07 pm</span>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">

          <div class="col-md-8">
            <div class="card card-outline card-warning">
              <div class="card-header">
                <h3 class="card-title"><i class="far fa-circle text-warning mr-1"></i> Unfulfilled</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <table class="table table-borderless table-valign-middle">
                  <tbody>
                    <tr>
                      <td class="col-1">
                        <img src="dist/img/paint-demo.jpeg" class="img-fluid mr-2 pt-2 img-max-600">
                      </td>
                      <td class="col-7">
                        Canvas Blue
                        <span class="text-secondary d-block">Size: Medium</span>
                        <span class="text-secondary d-block">Product ID: 0123</span>  
                      </td>
                      <td class="col-2">
                        €30 x 2
                        <a href="#" class="d-block btn btn-outline-warning btn-xs mb-1">Adjust quantity</a>
                        <a href="#" class="d-block btn btn-outline-danger btn-xs">Remove item</a>
                      </td>
                      <td class="col-2 text-right">€60</td>
                    </tr>
                    <tr>
                      <td class="col-1">
                        <img src="dist/img/paint-demo2.jpeg" class="img-fluid mr-2 img-max-600">
                      </td>
                      <td class="col-7">
                        Poster Red
                        <span class="text-secondary d-block">Size: Medium</span>
                        <span class="text-secondary d-block">Product ID: 0123</span>  
                      </td>
                      <td class="col-2">
                      €15 x 1
                        <a href="#" class="d-block btn btn-outline-warning btn-xs mb-1">Adjust quantity</a>
                        <a href="#" class="d-block btn btn-outline-danger btn-xs">Remove item</a>
                    </td>
                      <td class="col-2 text-right">€15</td>
                    </tr>
                    <tr>
                      <td class="col-1">
                        <img src="dist/img/paint-demo3.jpeg" class="img-fluid mr-2 img-max-600">
                      </td>
                      <td class="col-7">
                        Paint Yellow
                        <span class="text-secondary d-block">Size: Medium</span>
                        <span class="text-secondary d-block">Product ID: 0123</span>  
                      </td>
                      <td class="col-2">
                      €35 x 2
                        <a href="#" class="d-block btn btn-outline-warning btn-xs mb-1">Adjust quantity</a>
                        <a href="#" class="d-block btn btn-outline-danger btn-xs">Remove item</a>
                    </td>
                      <td class="col-2 text-right">€70</td>
                    </tr>
                    <tr>
                      <td class="col-1">
                        <img src="dist/img/paint-demo4.jpeg" class="img-fluid mr-2 img-max-600">
                      </td>
                      <td class="col-7">
                        Black Metal Print
                        <span class="text-secondary d-block">Size: Medium</span>
                        <span class="text-secondary d-block">Product ID: 0123</span>  
                      </td>
                      <td class="col-2">
                      €50 x 1
                        <a href="#" class="d-block btn btn-outline-warning btn-xs mb-1">Adjust quantity</a>
                        <a href="#" class="d-block btn btn-outline-danger btn-xs">Remove item</a>
                    </td>
                      <td class="col-2 text-right">€50</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="card card-outline card-success">
              <div class="card-header">
                <h3 class="card-title"><i class="far fa-check-circle text-success mr-1"></i> Paid</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">

                <table class="table table-borderless table-valign-middle">
                  <tr>
                    <th>Subtotal</th>
                    <td>6 items</td><td class="text-right">€195</td>
                  </tr>
                  <tr>
                    <th>Shipping</th>
                    <td>Standard shipping</td><td class="text-right">€4.95</td>
                  </tr>
                  <tr>
                    <th>Total</th>
                    <td></td><td class="text-right">€199.95</td>
                  </tr>
                </table>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="card card-outline card-info">
              <div class="card-header">
                <h3 class="card-title"> Reason for edit</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <form action="#">
                  <div class="form-group">
                    <input type="text" class="form-control">
                    <small class="form-text text-muted">Only you and other staff can see this reason.</small>
                </div>  
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

          <div class="col-md-4">

            <div class="card card-outline card-dark">
              <div class="card-header">
                <h3 class="card-title">Summary</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <p>No changes have been made.</p>
              </div>
              <!-- /.card-body -->

              <div class="card-footer bg-white border-top">
                  <div class="form-group">
                    <button class="btn btn-secondary w-100" disabled>Update</button>
                  </div>
                </form>
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