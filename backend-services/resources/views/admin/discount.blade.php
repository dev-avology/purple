@extends('layouts.admin')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <a href="discounts.php" class="btn btn-outline-dark float-left mr-3">
              <i class="fas fa-angle-left"></i>
            </a>
            <h1 class="m-0">Discount: DISCOUNT10</h1>
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
                <h3 class="card-title float-left text-bold">Discount code</h3>
              </div>
              <div class="card-body">
                <form action="">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Your code name" value="DISCOUNT10">
                  </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title float-left text-bold">Types</h3>
              </div>
              <div class="card-body">
                <form action="">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                    <label class="form-check-label" for="exampleRadios1">
                      Percentage
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                    <label class="form-check-label" for="exampleRadios2">
                      Fixed amount
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="option3">
                    <label class="form-check-label" for="exampleRadios3">
                      Free shipping
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios4" value="option4">
                    <label class="form-check-label" for="exampleRadios4">
                      Buy X get Y
                    </label>
                  </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title float-left text-bold">Value</h3>
              </div>
              <div class="card-body">
                <form action="">
                  <div class="input-group mb-3">
                    <input type="number" class="form-control" value="10" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <span class="input-group-text" id="basic-addon2">%</span>
                    </div>
                  </div>
                  <hr>
                  <p class="h6 text-bold mb-3">APPLIES TO</p>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios11" value="option11" checked>
                    <label class="form-check-label" for="exampleRadios11">
                      All products
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios22" value="option22">
                    <label class="form-check-label" for="exampleRadios22">
                      Specific collections
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios33" value="option33">
                    <label class="form-check-label" for="exampleRadios33">
                      Specific products
                    </label>
                  </div>
                  <div class="form-group mt-3">
                    <input type="text" class="form-control" placeholder="Search products">
                  </div>
                  <table class="table table-borderless table-valign-middle">
                    <tbody>
                      <tr>
                        <td class="col-1">
                          <img src="dist/img/paint-demo.jpeg" class="img-fluid mr-2 pt-2 img-max-600">
                        </td>
                        <td class="col-9">
                          Canvas Blue
                          <span class="text-secondary d-block">Size: Medium</span>
                          <span class="text-secondary d-block">Product ID: 0123</span>  
                        </td>
                        <td class="col-1"><a href="#">Edit</a></td>
                        <td class="col-1 text-center">x</td>
                      </tr>
                    </tbody>
                  </table>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->


            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title float-left text-bold">Minimum requirements</h3>
              </div>
              <div class="card-body">
                <form action="">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                    <label class="form-check-label" for="exampleRadios1">
                      None
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                    <label class="form-check-label" for="exampleRadios2">
                      Minimum purchase amount (€)
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="option3">
                    <label class="form-check-label" for="exampleRadios3">
                      Minimum quantity of items
                    </label>
                  </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title float-left text-bold">Customer eligibility</h3>
              </div>
              <div class="card-body">
                <form action="">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                    <label class="form-check-label" for="exampleRadios1">
                      Everyone
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                    <label class="form-check-label" for="exampleRadios2">
                      Specific groups of customers
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="option3">
                    <label class="form-check-label" for="exampleRadios3">
                      Specific customers
                    </label>
                  </div>
                  <div class="form-group mt-3">
                    <input type="text" class="form-control" placeholder="Search customers">
                  </div>
                  <table class="table table-borderless table-valign-middle">
                    <tbody>
                      <tr>
                        <td class="col-5">James Black <span class="text-muted pl-3">(james@mail.com)</span></td>
                        <td class="col-1 text-center">x</td>
                      </tr>
                    </tbody>
                  </table>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title float-left text-bold">Usage limits</h3>
              </div>
              <div class="card-body">
                <form action="">
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Limit to one use per customer</label>
                  </div>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Limit number of times this discount can be used in total</label>
                    <input type="number" class="form-control col-1" placeholder="0">
                  </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title float-left text-bold">Active dates</h3>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-6">
                    <form action="">
                      <div class="form-group">
                        <label for="">Start date</label>
                        <input type="date" class="form-control">
                      </div>
                    </form>
                  </div>
                  <div class="col-6">
                    <form action="">
                      <div class="form-group">
                        <label for="">Start time</label>
                        <input type="time" class="form-control">
                      </div>
                    </form>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <form action="">
                      <div class="form-group">
                        <label for="">End date</label>
                        <input type="date" class="form-control">
                      </div>
                    </form>
                  </div>
                  <div class="col-6">
                    <form action="">
                      <div class="form-group">
                        <label for="">End time</label>
                        <input type="time" class="form-control">
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>

          <div class="col-md-4">

            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title float-left text-bold">Summary</h3>
              </div>
              <div class="card-body">
                <p>
                  <span class="text-bold">DISCOUNT10</span> <span class="badge badge-success">active</span>
                </p>
                <p>
                  <ul class="pl-3">
                    <li >10% off all products</li>
                    <li >For James Black</li>
                    <li >One use per customer</li>
                    <li >Active from 18 Sep</li>
                  </ul>
                </p>
                <hr>
                <p><span class="text-bold">PERFORMANCE</span></p>
                <p>
                  <ul class="pl-3">
                    <li >1 used</li>
                    <li >€22.50 in total sales</li>
                  </ul>
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