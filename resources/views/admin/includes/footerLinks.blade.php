<!-- jQuery 3 -->
<!-- Bootstrap 3.3.7 -->
<script src="/panel-admin/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="/panel-admin/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="/panel-admin/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/panel-admin/js/adminlte.min.js"></script>
<!-- Sparkline -->
<script src="/panel-admin/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap  -->
<script src="/panel-admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="/panel-admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll -->
<script src="/panel-admin/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS -->
<script src="/panel-admin/chart.js/Chart.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/panel-admin/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/panel-admin/js/demo.js"></script>
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script>
    jQuery(document).ready(function () {
        jQuery('#logout').click(function (e) {
            e.preventDefault();
            jQuery.ajax({
                url: "{{ route('logout') }}",
                method: 'post',
                beforeSend: function (request) {
                    request.setRequestHeader("X-CSRF-TOKEN", $('meta[name="csrf-token"]').attr('content'));
                    request.setRequestHeader("cache-control", "no-cache");
                },
                success:function (){
                    window.location.href="/"
                }
            });
        });
    });
</script>
<script>

    CKEDITOR.replace('ckeditor', {
        filebrowserBrowseUrl: '/roza-admin/elfinder/ckeditor',
        contentsLangDirection: 'rtl'
    });


    CKEDITOR.replace('ckeditorlongdesc', {
        filebrowserBrowseUrl: '/roza-admin/elfinder/ckeditor',
        contentsLangDirection: 'rtl'

    });

    CKEDITOR.replace('ckeditorinfo', {
        filebrowserBrowseUrl: '/roza-admin/elfinder/ckeditor',
        contentsLangDirection: 'rtl'

    });


</script>
