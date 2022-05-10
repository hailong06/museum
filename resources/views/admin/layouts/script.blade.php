<script src="{{ url('admin') }}/vendor/jquery/jquery.min.js"></script>
<script src="{{ url('admin') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ url('admin') }}/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="{{ url('admin') }}/js/sb-admin-2.min.js"></script>
<script src="{{ url('admin') }}/vendor/chart.js/Chart.min.js"></script>
<script src="{{ url('admin') }}/js/demo/chart-area-demo.js"></script>
<script src="{{ url('js') }}/nicEdit.js"></script>
<script src="{{ url('admin') }}/js/demo/chart-pie-demo.js"></script>
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script src="https://cdn.tiny.cloud/1/2pfagd9jiu73qv44mj3lahq7uaoo662iyoppm4osrtvj2sva/tinymce/5/tinymce.min.js"
referrerpolicy="origin"></script>

<script>
    var route_prefix = "http://127.0.0.1:8000/laravel-filemanager";
    $('#lfm').filemanager('image', {
        prefix: route_prefix
    });

    var editor_config = {
        path_absolute: "/",
        selector: 'textarea.my-editor',
        height: 350,
        relative_urls: false,
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table directionality",
            "emoticons template paste textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
        file_picker_callback: function(callback, value, meta) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName(
                'body')[0].clientWidth;
            var y = window.innerHeight || document.documentElement.clientHeight || document
                .getElementsByTagName('body')[0].clientHeight;

            var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
            if (meta.filetype == 'image') {
                cmsURL = cmsURL + "&type=Images";
            } else {
                cmsURL = cmsURL + "&type=Files";
            }

            tinyMCE.activeEditor.windowManager.openUrl({
                url: cmsURL,
                title: 'Filemanager',
                width: x * 0.8,
                height: y * 0.8,
                resizable: "yes",
                close_previous: "no",
                onMessage: (api, message) => {
                    callback(message.content);
                }
            });
        }
    };

    tinymce.init(editor_config);
</script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
@yield('js')
