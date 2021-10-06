@extends('layouts.admin')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Preferences</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">

          <div class="col-6">
            <div class="card">
              <div class="card-header border-0">
                <h4>General</h4>
              </div>
              <div class="card-body">
                <form action="">

                  <div class="form-group">
                    <label for="">Store Status</label>
                    <select class="form-control" name="" id="">
                      <option value="">Active</option>
                      <option value="">Under Maintenance</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="">Default Store Language</label>
                    <select class="form-control" name="" id="">
                      <option value="">Auto (detecting browser language)</option>
                      <option value="">French</option>
                      <option value="">English</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="">Default Store Currency</label>
                    <select class="form-control" name="" id="">
                      <option value="">EUR</option>
                      <option value="">USD</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="">Stripe API Key</label>
                    <input type="text" class="form-control" value="0123456789">
                  </div>

                </form>
              </div>
            </div>
          </div>


          <div class="col-6">
            <div class="card">
              <div class="card-header border-0">
                <h4>SEO</h4>
              </div>
              <div class="card-body">
                <form action="">

                  <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">English</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">French</a>
                    </li>
                  </ul>

                  <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                      <div class="form-group">
                        <label for="">Homepage Meta Title</label>
                        <input type="text" class="form-control" value="Splashen: Awesome products designed by independent artists">
                      </div>

                      <div class="form-group">
                        <label for="">Homepage Meta Description</label>
                        <textarea class="form-control" name="" id="" rows="3">This description is in english.</textarea>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                      <div class="form-group">
                        <label for="">Homepage Meta Title</label>
                        <input type="text" class="form-control" value="Splashen: Des produits incroyables créés par des artistes indépendants">
                      </div>

                      <div class="form-group">
                        <label for="">Homepage Meta Description</label>
                        <textarea class="form-control" name="" id="" rows="3">Cette description est en français</textarea>
                      </div>
                    </div>
                  </div>

                  <hr>

                  <div class="form-group">
                    <label for="">Social Sharing Image Preview</label>
                    <input type="file" class="form-control-file" id="">
                    <small class="text-muted">Recommended size: 1200 x 628 px</small>
                  </div>

                </form>
              </div>
            </div>
          </div>

          <div class="col-12">
            <button class="btn btn-success btn-lg">Save</button>
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