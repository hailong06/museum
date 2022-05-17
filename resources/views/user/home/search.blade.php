@extends('user.museum')
@section('main')
    </header>
    <div class="container">
        <div class="form-group" align="center">
            <input type="text" name="search" id="live_search" class="form-control"
                placeholder="{{ __('messages.searchPlace') }}" />
        </div>
        <h3 align="center">{{ __('messages.totalData') }}: <span id="total_records"></span></h3>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>{{ __('messages.title') }}</th>
                    <th>{{ __('messages.sumary') }}</th>
                    <th>{{ __('messages.content') }}</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        <hr class="my-4" />
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
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
