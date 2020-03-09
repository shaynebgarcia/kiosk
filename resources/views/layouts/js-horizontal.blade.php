<script type="text/javascript" src="{{ asset('laravel-admindek/bower_components/jquery/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('laravel-admindek/bower_components/jquery-ui/js/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('laravel-admindek/bower_components/jquery-slimscroll/js/jquery.slimscroll.js') }}"></script>

<script type="text/javascript" src="{{ asset('laravel-admindek/bower_components/bootstrap/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('laravel-admindek/bower_components/modernizr/js/modernizr.js') }}"></script>
<script type="text/javascript" src="{{ asset('laravel-admindek/bower_components/modernizr/js/css-scrollbars.js') }}"></script>

<script type="text/javascript" src="{{ asset('laravel-admindek/assets/pages/waves/js/waves.min.js') }}"></script>
<!-- <script type="text/javascript" src="{{ asset('laravel-admindek/assets/pages/prism/custom-prism.js') }}"></script> -->

<script type="text/javascript" src="{{ asset('laravel-admindek/assets/js/pcoded.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('laravel-admindek/assets/js/vertical/horizontal-layout.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('laravel-admindek/assets/js/script.js') }}"></script>

<script type="text/javascript">
    var loading = $('#loadingDiv').hide();
    $(document)
      .ajaxStart(function () {
        loading.fadeIn(100);
      })
      .ajaxStop(function () {
        loading.fadeOut(1500)
      });
  </script>
