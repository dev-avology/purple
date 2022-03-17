@extends('layouts.admin')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col">
            <a href="{{route('collections')}}" class="btn btn-outline-dark float-left mr-3">
              <i class="fas fa-angle-left"></i>
            </a>
            <h1 class="m-0">{{$collection->name}}</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
				<div class="tab-content" id="myTabContent">
				  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
	              	<form action="{{url('collections/update')}}" method="POST" class="pt-3">
						  @csrf
	              		<div class="form-group">
	              			<label>Title</label>
	              			<input type="text" class="form-control" name="name" value="{{$collection->name}}">
	              		</div>
	              		<div class="form-group">
	              			<label>Description</label>
	              			<textarea class="form-control" name="description" id="description" rows="10">{{$collection->content}}</textarea>
	              		</div>
						<div class="form-group">
							<div class="card">
								<div class="card-header border-0">
									<h3 class="card-title text-bold">Collection image</h3>
								</div>
								<div class="card-body">
									<img src="{{ asset(config('file-upload-paths.category-images').'/'.$collection->image) }}" class="img-fluid w-100">
								</div>
								<!-- /.card-body -->
							</div>
							<!-- /.card -->
						</div>
						<input type="hidden"  name="category_id" value="{{$collection->id}}" />
						<div class="form-group">
							<button class="btn btn-secondary w-100" type="submit" >Update</button>
						</div>
	              	</form>
				  </div>
				</div>
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