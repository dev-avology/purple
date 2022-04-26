@extends('layouts.admin')

  @section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col">
            <a href="abandoned-checkouts.php" class="btn btn-outline-dark float-left mr-3">
              <i class="fas fa-angle-left"></i>
            </a>
            <h1 class="m-0">Abandonned Checkout #1234567</h1>
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

            <div class="alert alert-warning alert-dismissible">
              <h3 class="card-title mb-3">
                <i class="fas fa-shopping-cart mr-1"></i> 
                Email your customer this link to recover their cart
              </h3>
              <div class="form-group">
                <input class="form-control" type="text" value="https://splashen.com/checkout/id/123456789">
              </div>
            </div>

            <div class="card card-outline card-warning">
              <div class="card-header border-0">
                <h3 class="card-title"><i class="far fa-circle text-warning mr-1"></i> Unfulfilled</h3>
              </div>
              <div class="card-body">
                <table class="table table-borderless table-valign-middle">
                  <tbody>
                    <tr>
                      <td class="col-1">
                        <img src="dist/img/paint-demo3.jpeg" class="img-fluid mr-2 img-max-600">
                      </td>
                      <td class="col-7">
                        Paint Yellow
                        <span class="text-secondary d-block">Size: Small</span>
                        <span class="text-secondary d-block">Product ID: 0123</span>  
                      </td>
                      <td class="col-2">€20 x 2</td>
                      <td class="col-2 text-right">€40</td>
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
                      <td class="col-2">€35 x 1</td>
                      <td class="col-2 text-right">€35</td>
                    </tr>
                  </tbody>
                </table>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="card card-outline card-info">
              <div class="card-header border-0">
                <h3 class="card-title"><i class="far fa-circle text-info mr-1"></i> Checkout details</h3>
              </div>
              <div class="card-body">

                <table class="table table-borderless table-valign-middle">
                  <tr>
                    <th>Subtotal</th>
                    <td>3 items</td><td class="text-right">€75.00</td>
                  </tr>
                  <tr>
                    <th>Shipping</th>
                    <td>Standard shipping</td><td class="text-right">€4.95</td>
                  </tr>
                  <tr>
                    <th>Total</th>
                    <td></td><td class="text-right">€79.95</td>
                  </tr>
                </table>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>

          <div class="col-md-4">

            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">Customer</h3>
              </div>
              <div class="card-body">
                <p>
                  <strong>John Smith</strong>
                  <br>
                  john@mail.com
                </p>
                <p>
                  Accepts email marketing
                  <br>
                  No account
                </p>
              </div>
              <!-- /.card-body -->

              <div class="card-footer bg-white border-top">
                <h3 class="card-title float-none mb-3">Shipping Address</h3>
                <p class="h7">
                  John Smith<br>
                  75 MICKAEL ST<br>
                  APT 10<br>
                  97430 TAMPON<br>
                  France<br>
                  0123456789
                </p>  
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

</body>
</html>

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