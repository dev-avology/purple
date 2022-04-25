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
            <h1 class="m-0">Add New Collection</h1>
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
	              	<form action="{{url('collections/save')}}" method="POST" class="pt-3" enctype="multipart/form-data">
						  @csrf
	              		<div class="form-group">
	              			<label>Title</label>
	              			<input type="text" class="form-control" name="name" placeholder="Enter Collection Name" required>
	              		</div>
	              		<div class="form-group">
	              			<label>Description</label>
	              			<textarea class="form-control" name="description" id="description" rows="10" placeholder="Enter Description" required ></textarea>
	              		</div>
						<div class="form-group">
							<div class="card">
								<div class="card-header border-0">
									<h3 class="card-title text-bold">Collection image</h3>
								</div>
								<div class="card-body">
									<input type="file" class="form-control" name="collection_image" required />
								</div>
								<!-- /.card-body -->
							</div>
							<!-- /.card -->
						</div>
						<div class="form-group">
							<button class="btn btn-secondary w-100" type="submit" >Save</button>
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