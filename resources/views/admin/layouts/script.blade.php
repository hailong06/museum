<script src="{{url('admin')}}/vendor/jquery/jquery.min.js"></script>
<script src="{{url('admin')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{url('admin')}}/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="{{url('admin')}}/js/sb-admin-2.min.js"></script>
<script src="{{url('admin')}}/vendor/chart.js/Chart.min.js"></script>
<script src="{{url('admin')}}/js/demo/chart-area-demo.js"></script>
<script src="{{url('admin')}}/js/demo/chart-pie-demo.js"></script>
<script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script>
<script type="text/javascript">
    bkLib.onDomLoaded(function() {
         new nicEditor().panelInstance('area1');
    });
</script>
@yield('js')
