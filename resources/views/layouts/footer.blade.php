        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Lib Folder Link -->
        <script src="{{ asset('lib/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('lib/jquery-ui/ui/widgets/datepicker.js') }}"></script>
        <script src="{{ asset('lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('lib/ionicons/ionicons.js') }}"></script>
        <script src="{{ asset('lib/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
        <script src="{{ asset('lib/select2/js/select2.min.js') }}"></script>
        <script src="{{ asset('lib/ion-rangeslider/js/ion.rangeSlider.min.js') }}"></script>
        <script src="{{ asset('lib/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js') }}"></script>
        <script src="{{ asset('lib/jquery-simple-datetimepicker/jquery.simple-dtpicker.js') }}"></script>
        <script src="{{ asset('lib/datatables.net/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('lib/datatables.net-dt/js/dataTables.dataTables.min.js') }}"></script>
        <script src="{{ asset('lib/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js') }}"></script>
        
        <script src="{{ asset('lib/parsleyjs/parsley.min.js') }}"></script>
        <!-- <script src="{{ asset('lib/jquery.flot/jquery.flot.js') }}"></script> -->
        <!-- <script src="{{ asset('lib/jquery.flot/jquery.flot.resize.js') }}"></script> -->
        <!-- <script src="{{ asset('lib/chart.js/Chart.bundle.min.js') }}"></script> -->
        <!-- <script src="{{ asset('lib/peity/jquery.peity.min.js') }}"></script> -->

        <!-- JS Folder Links -->
        <!-- <script src="{{ asset('js/app-calendar.js') }}"></script> -->
        <!-- <script src="{{ asset('js/app-calendar-events.js') }}"></script> -->
        <script src="{{ asset('js/azia.js') }}"></script>
        <!-- <script src="{{ asset('js/chart.chartjs.js') }}"></script> -->
        <!-- <script src="{{ asset('js/chart.flot.js') }}"></script> -->
        <!-- <script src="{{ asset('js/chart.flot.sampledata.js') }}"></script> -->
        <!-- <script src="{{ asset('js/chart.morris.js') }}"></script> -->
        <!-- <script src="{{ asset('js/chart.peity.js') }}"></script> -->
        <!-- <script src="{{ asset('js/chart.sparkline.js') }}"></script> -->
        <!-- <script src="{{ asset('js/dashboard.sampledata.js') }}"></script> -->
        <!-- <script src="{{ asset('js/jquery.vmap.sampledata.js') }}"></script> -->
        <!-- <script src="{{ asset('js/map.apple.js') }}"></script> -->
        <!-- <script src="{{ asset('js/map.bluewater.js') }}"></script> -->
        <!-- <script src="{{ asset('js/map.mapbox.js') }}"></script> -->
        <!-- <script src="{{ asset('js/map.shiftworker.js') }}"></script> -->

        <!-- CKEditor CDN -->
        <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

        <!-- Menu Active Class -->
        <script>
                $(document).ready(function() {
                        $('.ckeditor').ckeditor();
                });
        
                var pgurl = window.location.href;
                $(".nav li a").each(function() {
                        console.log($(this).attr("href"));
                        if($(this).attr("href") == pgurl) {
                                $(this).addClass("active");
                        }
                });
        </script>