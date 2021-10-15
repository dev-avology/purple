@extends('layouts.admin')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col">
            <a href="artworks.php" class="btn btn-outline-dark float-left mr-3">
              <i class="fas fa-angle-left"></i>
            </a>
            <h1 class="m-0">Mona Lisa Pop Art</h1>
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
	              			<input type="text" class="form-control" value="Mona Lisa Pop Art">
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
	              			<input type="text" class="form-control" value="Mona Lisa Pop Art">
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
              	<h3 class="card-title text-bold">Media</h3>
              </div>
              <div class="card-body">
              	<div class="row">
              		<div class="col-6">
              			<img src="{{asset('public/admin/dist/img/mona-lisa.png')}}" class="img-fluid">
              		</div>
              		<div class="col-6">
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
									<h5 class="mb-1 pt-3 text-primary">{EN-Product-Type} Mona Lisa Pop Art</h5>
									<p class="m-0 text-green">https://splashen.com/{EN-product-category}/mona-lisa-pop-part{-By-artist-name}/{Product-ID}</p>
									<p class="m-0">Check out this unique {EN-Product-Type} Mona Lisa Pop Art created by the artist {Artist-Name}.</p>
								  </div>
								  <div class="tab-pane fade" id="profile2" role="tabpanel" aria-labelledby="profile-tab2">
									<h5 class="mb-1 pt-3 text-primary">{FR-Product-Type} Mona Lisa Pop Art</h5>
									<p class="m-0 text-green">https://splashen.com/fr/{FR-product-category}/mona-lisa-pop-part{-By-artist-name}/{Product-ID}</p>
									<p class="m-0">Découvrez ce magnifique {FR-Product-Type} Mona Lisa Pop Art créé par l'artiste {Artist-Name}.</p>
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
                <h3 class="card-title text-bold">Product status</h3>
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
              	<h3 class="card-title text-bold">Author</h3>
              </div>
              <div class="card-body">
								<p>This design has been created by <a href="customers.php">Jane Doe</a></p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="card">
              <div class="card-header border-0">
              	<h3 class="card-title text-bold">Insight</h3>
              	<p class="float-right">Last 90 days</p>
              </div>
              <div class="card-body">
								<p>Sold 7 unit to 5 customers for €239.90</p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="card">
              <div class="card-header border-0">
              	<h3 class="card-title text-bold">Collections</h3>
              </div>
              <div class="card-body">
								<form action="">
									<div class="form-group">
										<input type="text" placeholder="Add collection" class="form-control">
									</div>
									<span class="badge tag label badge-info"><span>Art Board Prints</span><a><i class="fas fa-times"></i></a> </span>
									<span class="badge tag label badge-info"><span>Canvas Prints</span><a><i class="fas fa-times"></i></a> </span>
									<span class="badge tag label badge-info"><span>Framed Prints</span><a><i class="fas fa-times"></i></a> </span>
									<span class="badge tag label badge-info"><span>Metal Prints</span><a><i class="fas fa-times"></i></a> </span>	  
								</form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="card">
              <div class="card-header border-0">
              	<h3 class="card-title text-bold">Tags</h3>
              </div>
              <div class="card-body">
								<form action="">
									<div class="form-group">
										<input type="text" placeholder="Add tag" class="form-control">
									</div>
									<span class="badge tag label badge-info"><span>Mona Lisa</span><a><i class="fas fa-times"></i></a> </span>
									<span class="badge tag label badge-info"><span>La Joconde</span><a><i class="fas fa-times"></i></a> </span>
									<span class="badge tag label badge-info"><span>Leonardo da Vinci</span><a><i class="fas fa-times"></i></a> </span>
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