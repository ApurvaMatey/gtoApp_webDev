    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('lib/jquery/jquery.min.js') }}"></script>

    <!-- Lib Folder Link -->
    <script src="{{ asset('lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('lib/ionicons/ionicons.js') }}"></script>
    <script src="{{ asset('lib/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.js') }}"></script>
    <script src="{{ asset('lib/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('lib/datatables.net-dt/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ asset('lib/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js') }}"></script>
    <script src="{{ asset('lib/parsleyjs/parsley.min.js') }}"></script>

    <!-- CKEditor CDN -->
    <script src="{{ asset('lib/ckeditor/ckeditor.js') }}"></script>
    <!-- <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script> -->

    <script src="{{ asset('js/azia.js') }}"></script>
    
    <!-- Menu Active Class -->
    <script>
        $(document).ready(function() {
            $('.ckeditor').ckeditor();
        });

        $(document).ready(function () {
            var url = window.location;
            $('ul.nav a[href="'+ url +'"]').parent().addClass('active');
            $('ul.nav a').filter(function() {
                return this.href == url;
            }).parent().addClass('active');
        });

        setTimeout(function () {
            // Closing the alert 
            $('.alert-success').alert('close'); 
        }, 7000);
    </script>
    