@extends('layouts.admin')
@section('content')
@include('flash-message')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <a href="{{ route('customers') }}" class="btn btn-outline-dark float-left mr-3">
            <i class="fas fa-angle-left"></i>
          </a>
          <h1 class="m-0">Customer: {{ $user->name }}</h1>
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
                    {{ $user->products->count() }}
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

        </div>

        <div class="col-md-4">

          <div class="card">
            <div class="card-header border-0">
              <h3 class="card-title float-left text-bold">Customer overview</h3>
              <div class="card-tools">
                <a href="{{ route('edit-seller', [
                      'userID' => $user->id, 
                      'userName' => $user->name, 
                      'role' => 'seller'
                    ]) 
                  }}">
                  Edit
                </a>
              </div>
            </div>
            <div class="card-body">
              <p>
                {{ $user->name }}
                <br>
                <a href="javascript:void(0)">{{ $user->email }}</a>
              </p>
              <p>
                Paris, France
                <br>
                Customer since {{ date('m/d/Y', $user->created_at->timestamp) }}
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