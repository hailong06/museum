@extends('user.museum')
@section('main')

    <div class="container">
        <div class="form-group" align="center">
            <input type="text" name="search" id="live_search" class="form-control" placeholder="Search Customer Data" />
        </div>
        <h3 align="center">Total Data : <span id="total_records"></span></h3>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Sumary</th>
                    <th>Content</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
        <hr class="my-4" />
    </div>

@stop()
@section('js')
    <script>
        $(document).ready(function() {
            fetch_customer_data();

            function fetch_customer_data(query = '') {
                $.ajax({
                    url: "{{ route('search.action') }}",
                    method: 'GET',
                    data: {
                        query: query
                    },
                    dataType: 'json',
                    success: function(data) {
                        $('tbody').html(data.table_data);
                        $('#total_records').text(data.total_data);
                    }
                })
            }
            $(document).on('keyup', '#live_search', function() {
                var query = $(this).val();
                fetch_customer_data(query);
            });
        });
    </script>
@stop()
