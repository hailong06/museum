@extends('admin.master')
@section('title', 'Dashboard')
@section('main')
    <h1>{{ __('messages.hello') }} {{ Auth::user()->name }}</h1>
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                {{ __('messages.earningMonth') }} </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                @foreach ($month_total as $month_totals)
                                    @if ($month_totals == null)
                                    {{ __('messages.noOrderYet') }}
                                    @else
                                        {{ number_format($month_totals) }}
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                {{ __('messages.earningToday') }}</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                @foreach ($today_total as $today_totals)
                                    @if ($today_totals == null)
                                    {{ __('messages.noOrderYet') }}
                                    @else
                                        {{ number_format($today_totals) }}
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">{{ __('messages.numberOfOrderM') }}
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                        @foreach ($orders as $order)
                                            @if ($order == null)
                                            {{ __('messages.noOrderYet') }}
                                            @else
                                                {{ number_format($order) }}
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%"
                                            aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                {{ __('messages.numberOfStafM') }}</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                @foreach ($user as $users)
                                    @if ($users == null)
                                    {{ __('messages.noNewStaffs') }}
                                    @else
                                        {{ $users }}
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="flex-container">
        <div class="col-md-12">
            <div id="column-chart"></div>
        </div>
    </div>
@stop
@section('js')
    <script>

var data_order = {!! json_encode($datas) !!};
        Highcharts.chart('column-chart', {
            chart: {
                type: 'column'
            },
            title: {
                text: "{{ __('messages.totalSale') }}"
            },
            xAxis: {
                categories: [
                    '',
                    'Jan',
                    'Feb',
                    'Mar',
                    'Apr',
                    'May',
                    'Jun',
                    'Jul',
                    'Aug',
                    'Sep',
                    'Oct',
                    'Nov',
                    'Dec'
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Sales (Vnd)'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:1f} vnd</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Total Sales',
                data: data_order

            }]
        });

    </script>
@stop()
