@extends('layouts.admin')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col">
            <a href="tags.php" class="btn btn-outline-dark float-left mr-3">
              <i class="fas fa-angle-left"></i>
            </a>
            <h1 class="m-0">Tag: <span class="badge bg-info">Leonardo da Vinci</span></h1>
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
              <div class="card-body">
				<ul class="nav nav-tabs" id="myTab" role="tablist">
				  <li class="nav-item" role="presentation">
				    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
				    	English
					</a>
				  </li>
				  <li class="nav-item" role="presentation">
				    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">		French
				    </a>
				  </li>
				</ul>
				<div class="tab-content" id="myTabContent">
				  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
          	<form action="" class="pt-3">
          		<div class="form-group">
          			<label>Name</label>
          			<input type="text" class="form-control" value="Leonardo da Vinci">
          		</div>
          		<div class="form-group">
          			<label>Description</label>
          			<textarea class="form-control" name="description" id="description" rows="10">This text is in english.</textarea>
          		</div>
          	</form>
				  </div>
				  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
          	<form action="" class="pt-3">
          		<div class="form-group">
          			<label>Name</label>
          			<input type="text" class="form-control" value="Leonard de Vinci">
          		</div>
          		<div class="form-group">
          			<label>Description</label>
          			<textarea class="form-control" name="description" id="description" rows="10">Ce texte est en français.</textarea>
          		</div>
          	</form>  	
				  </div>
				</div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="card">
              <div class="card-header border-0">
              	<h3 class="card-title float-left text-bold">Search engine listing preview</h3>
              </div>
              <div class="card-body">
				<ul class="nav nav-tabs" id="myTab" role="tablist">
				  <li class="nav-item" role="presentation">
				    <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#home2" role="tab" aria-controls="home2" aria-selected="true">
				    	English
					</a>
				  </li>
				  <li class="nav-item" role="presentation">
				    <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#profile2" role="tab" aria-controls="profile2" aria-selected="false">		French
				    </a>
				  </li>
				</ul>

				<div class="tab-content" id="myTabContent">

				  <div class="tab-pane fade show active" id="home2" role="tabpanel" aria-labelledby="home-tab2">
				  	<a class="float-right mt-2" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
    					Edit SEO
					</a>
					<h5 class="mb-1 pt-3 text-primary">Leonardo da Vinci</h5>
					<p class="m-0 text-green">https://splashen.com/shop/leonard-de-vinci</p>
					<p class="m-0">This description is in english.</p>

					<div class="collapse" id="collapseExample">
					  <hr>
					  <form action="">
					  	<div class="form-group">
					  		<label>Meta-title</label>
					  		<input type="text" class="form-control" value="Leonard de Vinci">
					  	</div>
					  	<div class="form-group">
					  		<label>Meta-description</label>
					  		<textarea class="form-control">This description is in english.</textarea>
					  	</div>
					  </form>
					</div>

				  </div>

				  <div class="tab-pane fade" id="profile2" role="tabpanel" aria-labelledby="profile-tab2">

				  	<a class="float-right mt-2" data-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample2">
    					Edit SEO
					</a>

					<h5 class="mb-1 pt-3 text-primary">Léonard de Vinci</h5>
					<p class="m-0 text-green">https://splashen.com/fr/shop/leonard-de-vinci</p>
					<p class="m-0">Cette description est en français.</p>

					<div class="collapse" id="collapseExample2">
					  <hr>
					  <form action="">
					  	<div class="form-group">
					  		<label>Meta-title</label>
					  		<input type="text" class="form-control" value="Léonard de Vinci">
					  	</div>
					  	<div class="form-group">
					  		<label>Meta-description</label>
					  		<textarea class="form-control">Cette description est en français.</textarea>
					  	</div>
					  </form>
					</div>

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
                <h3 class="card-title text-bold">Infos</h3>
              </div>
              <div class="card-body">
                <p>
                	This features allows you to create a custom description for some tags.
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

@endsection