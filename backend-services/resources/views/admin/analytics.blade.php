@extends('layouts.admin')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Analytics</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">

        <div class="row">
          <div class="col">
            <form id="form" name="form" class="form-inline mb-3">
                <div class="form-group">
                    <div id="reportrange"  class="pull-left" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc;">
                        <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>&nbsp;
                        <span></span> <b class="caret"></b>
                    </div>
                </div>
            </form>
          </div>
        </div>

        <div class="row">

          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span class="text-bold text-lg">€6,314.49 EUR</span>
                    <span>Total Sales</span>
                  </p>
                </div>
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                  <canvas id="sales-chart2" height="200"></canvas>
                </div>

              </div>
            </div>
            <!-- /.card -->
          </div>

          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span class="text-bold text-lg">9,820</span>
                    <span>Visitors</span>
                  </p>
                </div>
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                  <canvas id="visitors-chart2" height="200"></canvas>
                </div>

              </div>
            </div>
            <!-- /.card -->
          </div>

          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span class="text-bold text-lg">11.2%</span>
                    <span>Returning customer rate</span>
                  </p>
                </div>
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                  <canvas id="ana1" height="200"></canvas>
                </div>

              </div>
            </div>
            <!-- /.card -->
          </div>

            <div class="col-md-4">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex">
                    <p class="d-flex flex-column">
                      <span class="text-bold text-lg">1.07%</span>
                      <span>Online store conversion rate</span>
                    </p>
                  </div>
                  <!-- /.d-flex -->

                  <table class="table table-borderless table-valign-middle">
                    <tbody>
                      <tr>
                        <td class="col-10">
                          Added to cart
                          <small class="form-text text-muted">430 sessions</small>
                        </td>
                        <td class="col-2 text-right">2.58%</td>
                      </tr>
                      <tr>
                        <td class="col-10">
                          Reached checkout
                          <small class="form-text text-muted">355 sessions</small>
                        </td>
                        <td class="col-2 text-right">2.11%</td>
                      </tr>
                      <tr>
                        <td class="col-10">
                          Sessions converted
                          <small class="form-text text-muted">178 sessions</small>
                        </td>
                        <td class="col-2 text-right">1.07%</td>
                      </tr>
                    </tbody>
                  </table>

                </div>
              </div>
              <!-- /.card -->
            </div>

          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span class="text-bold text-lg">54.07€</span>
                    <span>Average order value</span>
                  </p>
                </div>
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                  <canvas id="ana2" height="200"></canvas>
                </div>

              </div>
            </div>
            <!-- /.card -->
          </div>

          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span class="text-bold text-lg">186</span>
                    <span>Total orders</span>
                  </p>
                </div>
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                  <canvas id="ana3" height="200"></canvas>
                </div>

              </div>
            </div>
            <!-- /.card -->
          </div>

          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span>Top products by units sold</span>
                  </p>
                </div>
                <!-- /.d-flex -->

                <table class="table table-borderless table-valign-middle">
                  <tbody>
                    <tr>
                      <td class="col-10">
                        Product 1
                      </td>
                      <td class="col-2 text-right">10</td>
                    </tr>
                    <tr>
                      <td class="col-10">
                        Product 2
                      </td>
                      <td class="col-2 text-right">9</td>
                    </tr>
                    <tr>
                      <td class="col-10">
                        Product 3
                      </td>
                      <td class="col-2 text-right">7</td>
                    </tr>
                    <tr>
                      <td class="col-10">
                        Product 3
                      </td>
                      <td class="col-2 text-right">7</td>
                    </tr>
                    <tr>
                      <td class="col-10">
                        Product 3
                      </td>
                      <td class="col-2 text-right">6</td>
                    </tr>
                  </tbody>
                </table>

              </div>
            </div>
            <!-- /.card -->
          </div>

          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span>Online store sessions by location</span>
                  </p>
                </div>
                <!-- /.d-flex -->

                <table class="table table-borderless table-valign-middle">
                  <tbody>
                    <tr>
                      <td class="col-10">
                        France
                      </td>
                      <td class="col-2 text-right">13,637</td>
                    </tr>
                    <tr>
                      <td class="col-10">
                        Belgium
                      </td>
                      <td class="col-2 text-right">961</td>
                    </tr>
                    <tr>
                      <td class="col-10">
                        United-Kingdom
                      </td>
                      <td class="col-2 text-right">389</td>
                    </tr>
                    <tr>
                      <td class="col-10">
                        Switzerland
                      </td>
                      <td class="col-2 text-right">377</td>
                    </tr>
                    <tr>
                      <td class="col-10">
                        Canada
                      </td>
                      <td class="col-2 text-right">309</td>
                    </tr>
                  </tbody>
                </table>

              </div>
            </div>
            <!-- /.card -->
          </div>

          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span>Online store sessions by device type</span>
                  </p>
                </div>
                <!-- /.d-flex -->

                <table class="table table-borderless table-valign-middle">
                  <tbody>
                    <tr>
                      <td class="col-10">
                        Mobile
                      </td>
                      <td class="col-2 text-right">10,711</td>
                    </tr>
                    <tr>
                      <td class="col-10">
                        Desktop
                      </td>
                      <td class="col-2 text-right">5,518</td>
                    </tr>
                    <tr>
                      <td class="col-10">
                        Tablet
                      </td>
                      <td class="col-2 text-right">261</td>
                    </tr>
                    <tr>
                      <td class="col-10">
                        Other
                      </td>
                      <td class="col-2 text-right">189</td>
                    </tr>
                    <tr>
                      <td class="col-10">-</td>
                      <td class="col-2 text-right">-</td>
                    </tr>
                  </tbody>
                </table>

              </div>
            </div>
            <!-- /.card -->
          </div>

          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span>Top landing pages by sessions</span>
                  </p>
                </div>
                <!-- /.d-flex -->

                <table class="table table-borderless table-valign-middle">
                  <tbody>
                    <tr>
                      <td class="col-10">
                        / (homepage)
                      </td>
                      <td class="col-2 text-right">1,849</td>
                    </tr>
                    <tr>
                      <td class="col-10">
                        /product-category/product-title/
                      </td>
                      <td class="col-2 text-right">1,235</td>
                    </tr>
                    <tr>
                      <td class="col-10">
                        /product-category/
                      </td>
                      <td class="col-2 text-right">610</td>
                    </tr>
                    <tr>
                      <td class="col-10">
                        /product-category/product-title/
                      </td>
                      <td class="col-2 text-right">547</td>
                    </tr>
                    <tr>
                      <td class="col-10">
                        /product-category/product-title/
                      </td>
                      <td class="col-2 text-right">440</td>
                    </tr>
                  </tbody>
                </table>

              </div>
            </div>
            <!-- /.card -->
          </div>

        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection