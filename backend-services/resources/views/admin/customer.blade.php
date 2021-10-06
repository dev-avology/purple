@extends('layouts.admin')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <a href="customers.php" class="btn btn-outline-dark float-left mr-3">
              <i class="fas fa-angle-left"></i>
            </a>
            <h1 class="m-0">Customer: Jane Doe</h1>
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

            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title float-left text-bold">Artist portfolio</h3>
                <a href="#" class="d-block float-right">See portfolio</a>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-4">
                    <p class="h2 text-center">
                      1
                      <span class="h6 d-block">Created Product</span>
                    </p>
                  </div>
                  <div class="col-4">
                    <p class="h2 text-center">
                      0
                      <span class="h6 d-block">Sold Product</span>
                    </p>
                  </div>
                  <div class="col-4">
                    <p class="h2 text-center">
                      0.00€
                      <span class="h6 d-block">Total Sales</span>
                    </p>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title float-left text-bold">Last order placed</h3>
              </div>
              <div class="card-body">
                <p>
                  This customer hasn’t placed any orders.
                </p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <h3 class="mt-4">Timeline</h3>

            <hr>

            <!-- The timeline -->
            <div class="timeline timeline-inverse">
              <!-- timeline time label -->
              <div class="time-label">
                <span class="badge bg-info">
                  Customer Status
                </span>
              </div>
              <!-- /.timeline-label -->

              <!-- timeline item -->
              <div>
                <i class="far"></i>
                <div class="timeline-item bg-transparent border-0 mb-2">
                  <span class="time"><i class="far fa-clock"></i> 9 Sept 2021 - 12:02 PM</span>
                  <div class="timeline-body pt-1">
                    <p>Customer created a design.</p>
                  </div>
                </div>
              </div>
              <!-- END timeline item -->

              <!-- timeline item -->
              <div>
                <i class="far"></i>
                <div class="timeline-item bg-transparent border-0 mb-2">
                  <span class="time"><i class="far fa-clock"></i> 9 Sept 2021 - 09:28 AM</span>
                  <div class="timeline-body pt-1">
                    <p>Customer was created.</p>
                  </div>
                </div>
              </div>
              <!-- END timeline item -->

            </div>

          </div>

          <div class="col-md-4">

            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title float-left text-bold">Customer overview</h3>
                <div class="card-tools">
                  <a href="#">Edit</a>
                </div>
              </div>
              <div class="card-body">
                <p>
                  Jane Doe
                  <br>
                  <a href="">jane@mail.com</a>
                </p>
                <p>
                  Paris, France
                  <br>
                  Customer since 01/01/2021
                </p>
                <hr>
                <p>
                  Jane Doe <br>
                  123 Apple St <br>
                  80000 City <br>
                  France <br>
                  +33 6 12 34 56 78
                </p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title float-left text-bold">Email marketing</h3>
                <div class="card-tools">
                  <a href="#">Edit</a>
                </div>
              </div>
              <div class="card-body">
                <p>
                  <span class="badge badge-success">Subscribed</span>
                </p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->


            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title text-bold">Tags</h3>
              </div>
              <div class="card-body">
                <form action="">
                  <div class="form-group">
                    <input type="text" placeholder="VIP, sale, shopper..." class="form-control">
                  </div>
                </form>
              </div>
              <!-- /.card-body -->
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


@section('modal')

<!-- MODAL -->
<div class="modal fade" id="noteModal" tabindex="-1" role="dialog" aria-labelledby="noteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <form action="">
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Notes about this order</label>
            <textarea class="form-control" id="notes" placeholder="Your notes" rows="5">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>

@endsection