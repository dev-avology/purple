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
            <h1 class="m-0">Refund Order #4567</h1>
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
                      <td class="col-5">
                        Canvas Blue <i>- €30</i>
                        <span class="text-secondary d-block">Size: Medium</span>
                        <span class="text-secondary d-block">Product ID: 0123</span>  
                      </td>
                      <td class="col-4">
                        <div class="input-group spinner w-25">
                          <input type="text" class="form-control" value="0" min="0" max="2">
                          <div class="input-group-btn-vertical">
                            <div class="quantity-max">/2</div>
                            <button class="btn btn-default" type="button"><i class="fa fa-caret-up"></i></button>
                            <button class="btn btn-default" type="button"><i class="fa fa-caret-down"></i></button>
                          </div>
                        </div>
                      </td>
                      <td class="col-2 text-right">€0</td>
                    </tr>
                    <tr>
                      <td class="col-1">
                        <img src="dist/img/paint-demo2.jpeg" class="img-fluid mr-2 img-max-600">
                      </td>
                      <td class="col-5">
                        Poster Red <i>- €15</i>
                        <span class="text-secondary d-block">Size: Medium</span>
                        <span class="text-secondary d-block">Product ID: 0123</span>  
                      </td>
                      <td class="col-4">
                        <div class="input-group spinner w-25">
                          <input type="text" class="form-control" value="0" min="0" max="1">
                          <div class="input-group-btn-vertical">
                            <div class="quantity-max">/1</div>
                            <button class="btn btn-default" type="button"><i class="fa fa-caret-up"></i></button>
                            <button class="btn btn-default" type="button"><i class="fa fa-caret-down"></i></button>
                          </div>
                        </div>
                      </td>
                      <td class="col-2 text-right">€0</td>
                    </tr>
                    <tr>
                      <td class="col-1">
                        <img src="dist/img/paint-demo3.jpeg" class="img-fluid mr-2 img-max-600">
                      </td>
                      <td class="col-7">
                        Paint Yellow <i>- €35</i>
                        <span class="text-secondary d-block">Size: Medium</span>
                        <span class="text-secondary d-block">Product ID: 0123</span>  
                      </td>
                      <td class="col-2">
                        <div class="input-group spinner w-25">
                          <input type="text" class="form-control" value="0" min="0" max="2">
                          <div class="input-group-btn-vertical">
                            <div class="quantity-max">/2</div>
                            <button class="btn btn-default" type="button"><i class="fa fa-caret-up"></i></button>
                            <button class="btn btn-default" type="button"><i class="fa fa-caret-down"></i></button>
                          </div>
                        </div>
                      </td>
                      <td class="col-2 text-right">€0</td>
                    </tr>
                    <tr>
                      <td class="col-1">
                        <img src="dist/img/paint-demo4.jpeg" class="img-fluid mr-2 img-max-600">
                      </td>
                      <td class="col-7">
                        Black Metal Print <i>- €50</i>
                        <span class="text-secondary d-block">Size: Medium</span>
                        <span class="text-secondary d-block">Product ID: 0123</span>  
                      </td>
                      <td class="col-2">
                        <div class="input-group spinner w-25">
                          <input type="text" class="form-control" value="0" min="0" max="1">
                          <div class="input-group-btn-vertical">
                            <div class="quantity-max">/1</div>
                            <button class="btn btn-default" type="button"><i class="fa fa-caret-up"></i></button>
                            <button class="btn btn-default" type="button"><i class="fa fa-caret-down"></i></button>
                          </div>
                        </div>
                      </td>
                      <td class="col-2 text-right">€0</td>
                    </tr>
                  </tbody>
                </table>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="card card-outline card-info">
              <div class="card-header">
                <h3 class="card-title"> Reason for refund</h3>
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
                
                <table class="table table-borderless table-valign-middle">
                  <tbody>
                    <tr>
                      <td>
                        Items subtotal
                      </td>
                      <td class="text-right">
                        €0
                      </td>
                    </tr>
                    <tr>
                      <td>
                        Discount
                      </td>
                      <td class="text-right">
                        €0
                      </td>
                    </tr>
                    <tr>
                      <td>
                        Tax
                      </td>
                      <td class="text-right">
                        €0
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <strong>Refund total</strong>
                      </td>
                      <td class="text-right">
                        <strong>€0</strong>
                      </td>
                    </tr>
                  </tbody>
                </table>

              </div>
              <!-- /.card-body -->

              <div class="card-footer bg-white border-top">
                <h3 class="card-title float-none mb-3">Refund Amount</h3>
                <form action="#">
                  <div class="badge pl-0">Stripe (**** **** **** 0123)</div>
                  <div class="form-group">
                    <input type="text" placeholder="€0.00" class="form-control">
                    <small class="form-text text-muted">€199.95 available for refund</small>
                  </div>
                  <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" checked>
                    <label class="form-check-label" for="exampleCheck1">Send a notification to the customer</label>
                  </div>
                  <hr>
                  <div class="form-group">
                    <button class="btn btn-secondary w-100" disabled>Refund €0.00</button>
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

@section('pagescripts')
<script>
  $(function(){

    $('.spinner .btn:first-of-type').on('click', function() {
      var btn = $(this);
      var input = btn.closest('.spinner').find('input');
      if (input.attr('max') == undefined || parseInt(input.val()) < parseInt(input.attr('max'))) {    
        input.val(parseInt(input.val(), 10) + 1);
      } else {
        btn.next("disabled", true);
      }
    });
    $('.spinner .btn:last-of-type').on('click', function() {
      var btn = $(this);
      var input = btn.closest('.spinner').find('input');
      if (input.attr('min') == undefined || parseInt(input.val()) > parseInt(input.attr('min'))) {    
        input.val(parseInt(input.val(), 10) - 1);
      } else {
        btn.prev("disabled", true);
      }
    });

})
</script>
@endsection

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
