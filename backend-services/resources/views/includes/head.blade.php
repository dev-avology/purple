  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('public/admin/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('public/admin/dist/css/adminlte.min.css')}}">
  <!---Custom CSS--->
  <link rel="stylesheet" href="{{asset('public/admin/dist/css/style.css')}}">
  <!-- Date Range style -->
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />

  <!-- Custom -->
  <style type="text/css">
    .cursor-pointer {cursor: pointer;}
    .pt-3-5 {padding-top: 3.5rem!important;}
    .img-max-60 {max-width: 60px;} 

    .input-group-btn-vertical {
      position: relative;
      white-space: nowrap;
      width: 2%;
      vertical-align: middle;
      display: table-cell;
    }

    .input-group-btn-vertical > .btn {
      display: block;
      float: none;
      width: 100%;
      max-width: 100%;
      padding: 8.5px;
      margin-left: -1px;
      position: relative;
      border-radius: 0;
    }

    .input-group-btn-vertical > .btn:first-child {
      border-top-right-radius: 4px;
    }

    .input-group-btn-vertical > .btn:last-child {
      border-bottom-right-radius: 4px;
    }

    .input-group-btn-vertical i {
      position: absolute;
      top: 0;
      left: 4px;
    }

  .quantity-max {
      position: absolute;
      right: 15px;
      top: 5px;
      font-size: 18px;
      color: lightgray;
  }

  .tag {
  font-size: 14px;
  padding: .3em .4em .4em;
  margin: 0 .1em;
}
.tag a {
  color: #bbb;
  cursor: pointer;
  opacity: 0.6;
}
.tag a:hover {
  opacity: 1.0
}
.tag .remove {
  vertical-align: bottom;
  top: 0;
}
.tag a {
  margin: 0 0 0 .3em;
}
.tag a .glyphicon-white {
  color: #fff;
  margin-bottom: 2px;
}
  </style>