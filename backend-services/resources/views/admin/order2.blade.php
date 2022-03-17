@extends('layouts.admin')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <a href="orders.php" class="btn btn-outline-dark float-left mr-3">
              <i class="fas fa-angle-left"></i>
            </a>
            <h1 class="m-0">Order #4566</h1>
            <span class="badge bg-gray">September 9, 2021 at 15:09 pm</span>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ul class="list-group list-group-horizontal float-md-right mt-2">
              <li class="list-group-item">
                <a href="#" class="text-secondary">Refund</a>
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

          <div class="col-md-8">
            <div class="card card-outline card-success">
              <div class="card-header border-0">
                <h3 class="card-title"><i class="far fa-check-circle text-success mr-1"></i> Fulfilled</h3>
              </div>
              <div class="card-body">
                <table class="table table-borderless table-valign-middle">
                  <tbody>
                    <tr>
                      <td class="col-1">
                        <img src="dist/img/paint-demo.jpeg" class="img-fluid mr-2 pt-2 img-max-600">
                      </td>
                      <td class="col-7">
                        Poster Orange
                        <span class="text-secondary d-block">Size: Small</span>
                        <span class="text-secondary d-block">Product ID: 0123</span>  
                      </td>
                      <td class="col-2">€25 x 1</td>
                      <td class="col-2 text-right">€25</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="card card-outline card-success">
              <div class="card-header border-0">
                <h3 class="card-title"><i class="far fa-check-circle text-success mr-1"></i> Paid</h3>
              </div>
              <div class="card-body">

                <table class="table table-borderless table-valign-middle">
                  <tr>
                    <th>Subtotal</th>
                    <td>1 item</td><td class="text-right">€25.00</td>
                  </tr>
                  <tr>
                    <th>Shipping</th>
                    <td>Standard shipping</td><td class="text-right">€4.95</td>
                  </tr>
                  <tr>
                    <th>Total</th>
                    <td></td><td class="text-right">€29.95</td>
                  </tr>
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
                  Order Status
                </span>
              </div>
              <!-- /.timeline-label -->

              <!-- timeline item -->
              <div>
                <i class="far"></i>
                <div class="timeline-item bg-transparent border-0 mb-2">
                  <span class="time"><i class="far fa-clock"></i> 12 Sept 2021 - 11:16 AM</span>
                  <div class="timeline-body pt-1">
                    <p>
                      A shipping confirmation email (with tracking number) has been sent to James Black (james@mail.com).
                      <button class="btn btn-light border btn-sm d-block mt-1">Resend email</button>
                    </p>
                  </div>
                </div>
              </div>
              <!-- END timeline item -->

              <!-- timeline item -->
              <div>
                <i class="far"></i>
                <div class="timeline-item bg-transparent border-0 mb-2">
                  <span class="time"><i class="far fa-clock"></i>  12 Sept 2021 - 11:15 AM</span>
                  <div class="timeline-body pt-1">
                    <p>1 item fulfilled via Prodigi fulfillment service.</p>
                  </div>
                </div>
              </div>
              <!-- END timeline item -->

              <!-- timeline item -->
              <div>
                <i class="far"></i>
                <div class="timeline-item bg-transparent border-0 mb-2">
                  <span class="time"><i class="far fa-clock"></i>  10 Sept 2021 - 07:00 AM</span>
                  <div class="timeline-body pt-1">
                    <p>A fulfillment request of 1 item has been sent to Prodigi fulfillment service.</p>
                  </div>
                </div>
              </div>
              <!-- END timeline item -->

              <!-- timeline item -->
              <div>
                <i class="far"></i>
                <div class="timeline-item bg-transparent border-0 mb-2">
                  <span class="time"><i class="far fa-clock"></i>  9 Sept 2021 - 09:29 AM</span>
                  <div class="timeline-body pt-1">
                    <p>
                      Order confirmation email was sent to James Black (james@mail.com).
                      <button class="btn btn-light border btn-sm d-block mt-1">Resend email</button>
                    </p>
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
                    <p>A €199.95 EUR payment was processed using a Visa ending in 0123 (Stripe Checkout id #12345).</p>
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
                    <p>James Black placed this order on Online Store (checkout #0123456789).</p>
                  </div>
                </div>
              </div>
              <!-- END timeline item -->

            </div>

          </div>

          <div class="col-md-4">

            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">Notes</h3>
              </div>
              <div class="card-body">
                <p class="text-muted">
                  Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                  <button type="button" class="btn btn-link m-0 p-0 d-block" data-toggle="modal" data-target="#noteModal">
                    Edit
                  </button>
                </p>
              </div>
              <div class="card-footer bg-white border-top">
                <strong>Tracking Number</strong>
                <p><a href="#">TN-12345678</a></p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">Customer</h3>
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
                <h3 class="card-title">Fraud analysis</h3>
              </div>
              <div class="card-body">
                <strong>Stripe Risk Level</strong>
                <p class="text-muted">
                  <span class="text-info">Low</span>
                </p>
                <hr>
                <strong>Stripe Message</strong>
                  <p class="text-muted">
                    <span class="text-info">
                      Characteristics of this order are similar to non-fraudulent orders observed in the past
                    </span>
                  </p>
                <hr>
                <strong>3D Secure</strong>
                <p class="text-muted">
                  <span class="text-info">
                    <i class="fa fa-check-circle"></i> This order passed 3D Secure authentication
                  </span>
                </p>
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
@endsection