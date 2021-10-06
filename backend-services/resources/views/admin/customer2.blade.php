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
            <h1 class="m-0">Customer: James Black</h1>
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
              <div class="card-body">
                <div class="row">
                  <div class="col-4 text-center">
                    <p class="h6">Last order</p>
                    <p class="text-bold">2 days ago</p>
                  </div>
                  <div class="col-4 text-center">
                    <p class="h6">Total spent to date</p>
                    <p class="text-bold">124.90€</p>
                  </div>
                  <div class="col-4 text-center">
                    <p class="h6">Average order value</p>
                    <p class="text-bold">43.00€</p>
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
                <table class="table table-borderless table-valign-middle">
                  <tbody>
                    <tr>
                      <td class="col-1">
                        <img src="dist/img/paint-demo.jpeg" class="img-fluid mr-2 pt-2 img-max-600">
                      </td>
                      <td class="col-7">
                        Canvas Orange
                        <span class="text-secondary d-block">Size: Medium</span>
                        <span class="text-secondary d-block">Product ID: 0123</span>  
                      </td>
                      <td class="col-2">€20 x 2</td>
                      <td class="col-2 text-right">€40</td>
                    </tr>
                  </tbody>
                </table>
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
                  <span class="time"><i class="far fa-clock"></i> 20 Sept 2021 - 09:44 AM</span>
                  <div class="timeline-body pt-1">
                    <p>Order Confirmation email for order #781654654 sent to this customer (james@mail.com).</p>
                  </div>
                </div>
              </div>
              <!-- END timeline item -->

              <!-- timeline item -->
              <div>
                <i class="far"></i>
                <div class="timeline-item bg-transparent border-0 mb-2">
                  <span class="time"><i class="far fa-clock"></i> 20 Sept 2021 - 09:44 AM</span>
                  <div class="timeline-body pt-1">
                    <p>This customer placed order #781654654 on Online Store (checkout #2554541517546).</p>
                  </div>
                </div>
              </div>
              <!-- END timeline item -->

              <!-- timeline item -->
              <div>
                <i class="far"></i>
                <div class="timeline-item bg-transparent border-0 mb-2">
                  <span class="time"><i class="far fa-clock"></i> 24 Nov 2020 - 09:01 PM</span>
                  <div class="timeline-body pt-1">
                    <p>Order Confirmation email for order #1568745845 sent to this customer (james@mail.com).</p>
                  </div>
                </div>
              </div>
              <!-- END timeline item -->

              <!-- timeline item -->
              <div>
                <i class="far"></i>
                <div class="timeline-item bg-transparent border-0 mb-2">
                  <span class="time"><i class="far fa-clock"></i> 24 Nov 2020 - 09:01 PM</span>
                  <div class="timeline-body pt-1">
                    <p>This customer placed order #1568745845 on Online Store (checkout #2126185454848).</p>
                  </div>
                </div>
              </div>
              <!-- END timeline item -->

              <!-- timeline item -->
              <div>
                <i class="far"></i>
                <div class="timeline-item bg-transparent border-0 mb-2">
                  <span class="time"><i class="far fa-clock"></i> 8 Oct 2020 - 07:15 AM</span>
                  <div class="timeline-body pt-1">
                    <p>Order Confirmation email for order #755936395 sent to this customer (james@mail.com).</p>
                  </div>
                </div>
              </div>
              <!-- END timeline item -->

              <!-- timeline item -->
              <div>
                <i class="far"></i>
                <div class="timeline-item bg-transparent border-0 mb-2">
                  <span class="time"><i class="far fa-clock"></i> 8 Oct 2020 - 07:14 AM</span>
                  <div class="timeline-body pt-1">
                    <p>This customer placed order #755936395 on Online Store (checkout #21261883244643).</p>
                  </div>
                </div>
              </div>
              <!-- END timeline item -->

              <!-- timeline item -->
              <div>
                <i class="far"></i>
                <div class="timeline-item bg-transparent border-0 mb-2">
                  <span class="time"><i class="far fa-clock"></i> 8 Oct 2020 - 07:14 AM</span>
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
                <h3 class="card-title">Customer overview</h3>
              </div>
              <div class="card-body">
                <strong>James BLACK</strong>
                <p class="text-muted">
                  14 orders on website
                </p>
                <hr>
                <strong>Contact Information</strong>
                <p class="text-muted">james@mail.com</p>
                <hr>
                <strong>Shipping Address</strong>
                <p class="text-muted">
                  James Black<br>
                  22 Water St<br>
                  88000 Orange<br>
                  France<br>
                  06 12 34 56 78
                </p>
                <hr>
                <strong>Billing Address</strong>
                <p class="text-muted">Same as shipping address</p>
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
