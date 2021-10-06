<!-- jQuery -->
<script src="{{asset('public/admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('public/admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE -->
<script src="{{asset('public/admin/dist/js/adminlte.js')}}"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{asset('public/admin/plugins/chart.js/Chart.min.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('public/admin/dist/js/pages/dashboard3.js')}}"></script>

<!-- Include Date Range Picker -->
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>


<script type="text/javascript">
  $(document).ready(function() {
    if (window.location.href.indexOf("order.php") > -1 ||
    	window.location.href.indexOf("order2.php") > -1 ||
      window.location.href.indexOf("order3.php") > -1 ||
      window.location.href.indexOf("orders.php") > -1 ||
      window.location.href.indexOf("abandoned-checkout.php") > -1 ||
    	window.location.href.indexOf("abandoned-checkouts.php") > -1) {
      $('#open-tab-order').parent().addClass("menu-is-opening menu-open");
      $('#open-tab-order').show();
    } else if (window.location.href.indexOf("artwork.php") > -1 ||
    	window.location.href.indexOf("artworks.php") > -1 ||
      window.location.href.indexOf("tags.php") > -1 ||
      window.location.href.indexOf("tag.php") > -1 ||
      window.location.href.indexOf("collection.php") > -1 ||
    	window.location.href.indexOf("collections.php") > -1) {
      $('#open-tab-product').parent().addClass("menu-is-opening menu-open");
      $('#open-tab-product').show();
    }
  });
</script>