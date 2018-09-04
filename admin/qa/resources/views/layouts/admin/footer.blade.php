	    </div>

    	<script src="{{ asset('admin/vendor/jQuery/jquery-2.2.3.min.js') }}"></script>
        <script src="{{ asset('admin/vendor/jquery-fullscreen/jquery.fullscreen-min.js') }}"></script>
        <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('admin/vendor/slimScroll/jquery.slimscroll.min.js') }}"></script>
        <script src="{{ asset('admin/vendor/fastclick/fastclick.min.js') }}"></script>
        <script src="{{ asset('admin/vendor/chartjs/Chart.min.js') }}"></script>
        <script src="{{ asset('admin/vendor/sparkline/jquery.sparkline.min.js') }}"></script>
         <script src="{{ asset('admin/vendor/select2/select2.min.js') }}"></script>
        <script src="{{ asset('admin/vendor/colorpicker/bootstrap-colorpicker.js') }}"></script>
        <script src="{{ asset('admin/resources/js/app.min.js') }}"></script>
         <script src="{{ asset('admin/vendor/input-mask/jquery.inputmask.js') }}"></script>
        <script src="{{ asset('admin/vendor/input-mask/jquery.inputmask.extensions.js') }}"></script>
        <script src="{{ asset('admin/vendor/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
        <script src="{{ asset('admin/vendor/datepicker/bootstrap-datepicker.js') }}"></script>
        <script src="{{ asset('admin/vendor/timepicker/bootstrap-timepicker.js') }}"></script>
        <script src="{{ asset('admin/vendor/daterangepicker/daterangepicker.js') }}"></script>
        <script src="{{ asset('admin/vendor/pickadate/picker.js') }}"></script>
        <script src="{{ asset('admin/vendor/pickadate/picker-date.js') }}"></script>
        <script src="{{ asset('admin/vendor/pickadate/picker-time.js') }}"></script>
        <script src="{{ asset('admin/vendor/iCheck/icheck.min.js') }}"></script>
        <script src="{{ asset('admin/resources/js/pages/advance-elements.js') }}"></script>
        <script src="{{ asset('admin/resources/js/app.min.js') }}"></script>

         <script src="https://cdn.ckeditor.com/4.10.0/standard/ckeditor.js"></script>
         
        <script src="{{ asset('admin/resources/js/demo.js') }}"></script>
        <script src="{{ asset('js/delete.js') }}"></script>
        <script src="{{ asset('js/custom.js') }}"></script>
        <script src="{{ asset('js/sweetalert2.all.js') }}"></script>        
        <script>var BASE_URL = jQuery('meta[name="site-url"]').attr('content');</script>
        @include('sweetalert::alert')
              
        @yield('script')

    </body>

</html>