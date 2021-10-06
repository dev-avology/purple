@extends('layouts.admin')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col">
            <a href="collections.php" class="btn btn-outline-dark float-left mr-3">
              <i class="fas fa-angle-left"></i>
            </a>
            <h1 class="m-0">Art Board Prints</h1>
            <span class="badge bg-success">Active</span>
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
	              			<label>Title</label>
	              			<input type="text" class="form-control" value="Art Board Prints">
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
	              			<label>Title</label>
	              			<input type="text" class="form-control" value="Impressions rigides">
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
              	<h3 class="card-title text-bold">Mockups</h3>
              </div>
              <div class="card-body">
              	<div class="row">
              		<div class="col-6">
              			<img src="dist/img/mockup1.jpg" class="img-fluid">
              		</div>
              		<div class="col-3">
              			<img src="dist/img/mockup2.jpg" class="img-fluid">
              			<img src="dist/img/mockup3.jpg" class="img-fluid mt-2">
              		</div>
              		<div class="col-3">
              			<button class="btn btn-secondary w-100 h-100">
              				<i class="fas fa-download d-block"></i>
              				<span class="h2">Add/Replace Image</span>
              			</button>
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
					<h5 class="mb-1 pt-3 text-primary">Art Board Prints</h5>
					<p class="m-0 text-green">https://splashen.com/shop/art-board-prints</p>
					<p class="m-0">This description is in english.</p>

					<div class="collapse" id="collapseExample">
					  <hr>
					  <form action="">
					  	<div class="form-group">
					  		<label>Meta-title</label>
					  		<input type="text" class="form-control" value="Art Board Prints">
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

					<h5 class="mb-1 pt-3 text-primary">Impressions rigides</h5>
					<p class="m-0 text-green">https://splashen.com/fr/shop/art-board-prints</p>
					<p class="m-0">Cette description est en français.</p>

					<div class="collapse" id="collapseExample2">
					  <hr>
					  <form action="">
					  	<div class="form-group">
					  		<label>Meta-title</label>
					  		<input type="text" class="form-control" value="Impressions rigides">
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
                <h3 class="card-title text-bold">Collection status</h3>
              </div>
              <div class="card-body">
                <form action="">
                	<div class="form-group">
                		<select name="status" id="status" class="form-control">
                			<option value="">Active</option>
                			<option value="">Draft</option>
                		</select>
                	</div>
                </form>
              </div>
              <!-- /.card-body -->
              <div class="card-footer bg-white border-top">
              	<form>
                  <div class="form-group">
                    <button class="btn btn-secondary w-100" disabled>Update</button>
                  </div>
                </form>
              </div>
            </div>
            <!-- /.card -->

            <div class="card">
              <div class="card-header border-0">
              	<h3 class="card-title text-bold">Collection image</h3>
              </div>
              <div class="card-body">
              	<img src="dist/img/blank.jpeg" class="img-fluid w-100">
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="card">
              <div class="card-header border-0">
              	<h3 class="card-title text-bold">Size guide</h3>
              	<p class="float-right"><a href="#">Edit</a></p>
              </div>
              <div class="card-body">
								<table class="table">
								  <thead>
								    <tr>
								      <th scope="col">Size</th>
								      <th scope="col">Width</th>
								      <th scope="col">Height</th>
								    </tr>
								  </thead>
								  <tbody>
								    <tr>
								      <td>15.24 x 15.24 cm</td>
								      <td>15.24</td>
								      <td>15.24</td>
								    </tr>
								    <tr>
								      <td>20.32 x 20.32 cm</td>
								      <td>20.32</td>
								      <td>20.32</td>
								    </tr>
								    <tr>
								      <td>25.4 x 25.4 cm</td>
								      <td>25.4</td>
								      <td>25.4</td>
								    </tr>
								  </tbody>
								</table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="card">
              <div class="card-header border-0">
              	<h3 class="card-title text-bold">Features</h3>
              </div>
              <div class="card-body">
								<form action="">
									<div class="form-group">
										<input type="text" placeholder="Add feature" class="form-control">
									</div>
									<ul class="list-group">
									  <li class="list-group-item">Easy, budget-friendly, and ready to hang in seconds <span class="float-right"><a href="#">x</a></span></li>
									  <li class="list-group-item">A great format for series/collection presentation <span class="float-right"><a href="#">x</a></span></li>
									  <li class="list-group-item">Textured watercolor paper mounted on 4-ply art board <span class="float-right"><a href="#">x</a></span></li>
									  <li class="list-group-item">Individually wrapped in cellophane sleeves <span class="float-right"><a href="#">x</a></span></li>
									</ul>
								</form>
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