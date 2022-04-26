@extends('layouts.admin')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Products</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ul class="list-group list-group-horizontal float-md-right mt-2">
            <li class="list-group-item">
              <a href="#" class="text-secondary">Export</a>
            </li>
            <li class="list-group-item">
              <a href="#" class="text-secondary">Add Product</a>
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
                  <input type="text" class="form-control" placeholder="Filter products">
                </div>
              </form>
            </div>
            <div class="card-body table-responsive p-0">
              <table class="table table-valign-middle table-hover cursor-pointer">
                <thead>
                  <tr>
                    <th>Media</th>
                    <th>Product</th>
                    <th>Status</th>
                    <th>Sold (last 90days)</th>
                    <th>Approval Status</th>
                  </tr>
                </thead>
                <tbody id="artwork-table-body">
                  @foreach($artistArts as $art)
                  <tr class="open-artwork" data-id="{{$art->art_id}}">
                    <td>
                      <img src="{{asset(config('file-upload-paths.artwork').'/'.$art->art_photo_path)}}" width="auto" height="45px">
                    </td>
                    <td>{{$art->title}}</td>
                    <td>
                      @if ($art->is_public)
                      <span class="badge bg-success">Active</span>
                      @else
                      <span class="badge bg-warning">Not Active</span>
                      @endif
                    </td>
                    <td>7</td>
                    <td><input class="approval-checkbox" type="checkbox" name="approal-status" data-attr="{{$art->id}}" @if($art->is_approved) checked @endif /></td>
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

@section('pagescripts')

<script>
  $(document).ready(function() {

    $('input[name="approal-status"]').click(function(event) {

      var id = $(this).data('attr');

      $.ajax({
        type: "POST",
        url: "{{route('update-approval-of-artwork')}}",
        data: {id, _token: "{{ csrf_token() }}"},
        dataType: "json",
        success: function(response) {
          toastr.success(response.message);
        }
      });
      event.stopPropagation();
    });

    $('.open-artwork').click(function() {
      let currentRowID = $(this).data('id');
      window.location = "artwork/" + currentRowID;
    });


  });
</script>

@endsection