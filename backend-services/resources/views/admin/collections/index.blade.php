@extends('layouts.admin')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Collections</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ul class="list-group list-group-horizontal float-md-right mt-2">
              <li class="list-group-item">
                <a href="#" class="text-secondary">Export</a>
              </li>
              <li class="list-group-item">
                <a href="{{route('collections.add')}}" class="text-secondary">Add Collection</a>
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
                    <input type="text" class="form-control" placeholder="Filter collections">
                  </div>
                </form>
              </div>
              <div class="card-body table-responsive p-0">
                  <table class="table table-valign-middle table-hover cursor-pointer">
                    <thead>
                      <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($collections as $collection)
                      <tr>
                        <td>
                        <a href="{{ asset(config('file-upload-paths.category-images').'/'.$collection->image) }}" target="_blank">
                          <img class="product-listing-thumb" src="{{ asset(config('file-upload-paths.category-images').'/'.$collection->image) }}" />
                        </a>
                        </td>
                        <td>{{$collection->name}}</td>
                        <td>
                            <a href="{{ url('collections/edit', ['collection_id' => $collection->id]) }}" ><i class="far fa-edit"></i></a>
                            <a href="{{ url('collections/delete', ['collection_id' => $collection->id]) }}" onclick="return confirm('Are you sure.')" >
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                      </tr>
                      @endforeach
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