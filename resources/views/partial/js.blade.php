<!-- jQuery first (required by plugins like MetisMenu) -->
<script src='{{asset("assets/js/jquery.min.js")}}'></script>

<!-- Bootstrap JS (after jQuery) -->
<script src='{{asset("assets/js/bootstrap.bundle.min.js")}}'></script>

<!-- Plugins -->
<script src='{{asset("assets/plugins/simplebar/js/simplebar.min.js")}}'></script>
<script src='{{asset("assets/plugins/metismenu/js/metisMenu.min.js")}}'></script>
<script src='{{asset("assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js")}}'></script>
<script src='{{asset("assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js")}}'></script>
<script src='{{asset("assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js")}}'></script>
<script src='{{asset("assets/plugins/chartjs/js/chart.js")}}'></script>
<script src='{{asset("assets/plugins/chartjs/js/Chart.extension.js")}}'></script>
<script src='{{asset("assets/plugins/sparkline-charts/jquery.sparkline.min.js")}}'></script>

<!-- Notification / Dashboard JS -->
<script src='{{asset("assets/js/index3.js")}}'></script>

<!-- Initialize MetisMenu -->
<script>
    $(document).ready(function() {
        $('#menu').metisMenu(); // initialize the sidebar menu

        // Sidebar collapse toggle
        $('.toggle-icon').on('click', function() {
            $('.sidebar-wrapper').toggleClass('collapsed');
        });
    });
</script>

<!-- App JS (last, after all plugins and custom scripts) -->
<script src='{{asset("assets/js/app.js")}}'></script>
