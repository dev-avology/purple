@extends('layouts.admin')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tags</h1>
          </div><!-- /.col -->
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
                    <input type="text" class="form-control" placeholder="Filter tags">
                  </div>
                </form>
              </div>
              <div class="card-body table-responsive p-0">
                  <table class="table table-valign-middle table-hover cursor-pointer">
                    <thead>
                      <tr>
                        <th>Tags</th>
                        <th>Languages</th>
                        <th>Descriptions</th>
                        <th>Artworks with this Tag</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr onclick="window.location='tag.php';">
                        <td><span class="badge bg-info">Leonardo da Vinci</span></td>
                        <td>
                          <img src="{{asset('public/admin/dist/img/united-kingdom-flag-round-xs-r.png')}}" width="20px">
                          <img src="{{asset('public/admin/dist/img/france-flag-round-xs-r.png')}}" width="20px">
                        </td>
                        <td>
                          <img src="{{asset('public/admin/dist/img/united-kingdom-flag-round-xs-r.png')}}" width="20px">
                          <img src="{{asset('public/dist/img/france-flag-round-xs-r.png')}}" width="20px">
                        </td>
                        <td>1</td>
                      </tr>
                      <tr onclick="window.location='#';">
                        <td><span class="badge bg-info">Mona Lisa</span></td>
                        <td>
                          <img src="{{asset('public/admin/dist/img/united-kingdom-flag-round-xs-r.png')}}" width="20px">
                        </td>
                        <td>
                          <img src="{{asset('public/admin/dist/img/united-kingdom-flag-round-xs-r.png')}}" width="20px">
                        </td>
                        <td>24</td>
                      </tr>
                      <tr onclick="window.location='#';">
                        <td><span class="badge bg-info">La Joconde</span></td>
                        <td>
                          <img src="{{asset('public/admin/dist/img/france-flag-round-xs-r.png')}}" width="20px">
                        </td>
                        <td>-</td>
                        <td>4</td>
                      </tr>
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