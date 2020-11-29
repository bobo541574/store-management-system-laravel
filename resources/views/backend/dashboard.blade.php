@extends('backend.templates.master')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        {{-- <div class="card text-center">
            <h4 class="card-header font-weight-bolder">Admin Dashboard</h4>
            <div class="card-body">
                @include('backend.shared._messages')
            </div>
        </div> --}}
        <!-- Area Chart -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-primary">Product, Order & Checkout Lists</h5>
            </div>
            <div class="table table-responsive">
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('/vendor/chart.js/Chart.min.js') }}"></script>

<script>
    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = 'Nunito',
        '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#8E2DE2';

    function number_format(number, decimals, dec_point, thousands_sep) {
        // *     example: number_format(1234.56, 2, ',', ' ');
        // *     return: '1 234,56'
        number = (number + '').replace(',', '').replace(' ', '');
        var n = !isFinite(+number) ? 0 : +number,
            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
            sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
            dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
            s = '',
            toFixedFix = function (n, prec) {
                var k = Math.pow(10, prec);
                return '' + Math.round(n * k) / k;
            };
        // Fix for IE parseFloat(0.55).toFixed(0) = 0;
        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }
        if ((s[1] || '').length < prec) {
            s[1] = s[1] || '';
            s[1] += new Array(prec - s[1].length + 1).join('0');
        }
        return s.join(dec);
    }

    const order_quantities = "{{ json_encode($order_quantities) }}";
    console.log(JSON.parse(order_quantities));
    const product_quantities = "{{ json_encode($product_quantities) }}";
    console.log(JSON.parse(product_quantities));
    const checkout_quantities = "{{ json_encode($checkout_quantities) }}";
    console.log(JSON.parse(checkout_quantities));
    // Area Chart Example
    var ctx = document.getElementById("myAreaChart");
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets: [{
                    label: "order per month",
                    lineTension: 0.3,
                    fontSize: 32,
                    backgroundColor: "rgb(142, 45, 226, 0)",
                    borderColor: "#8E2DE2",
                    pointRadius: 3,
                    pointBackgroundColor: "#8E2DE2",
                    pointBorderColor: "#8E2DE2",
                    pointHoverRadius: 3,
                    pointHoverBackgroundColor: "#8E2DE2",
                    pointHoverBorderColor: "#8E2DE2",
                    pointHitRadius: 10,
                    pointBorderWidth: 2,
                    data: JSON.parse(order_quantities),
                },
                {
                    label: "product per month",
                    lineTension: 0.3,
                    backgroundColor: "rgb(241, 39, 17, 0)",
                    borderColor: "#f12711",
                    pointRadius: 3,
                    pointBackgroundColor: "#f12711",
                    pointBorderColor: "#f12711",
                    pointHoverRadius: 3,
                    pointHoverBackgroundColor: "#f12711",
                    pointHoverBorderColor: "#f12711",
                    pointHitRadius: 10,
                    pointBorderWidth: 2,
                    data: JSON.parse(product_quantities),
                },
                {
                    label: "checkout per month",
                    lineTension: 0.3,
                    backgroundColor: "rgb(118, 184, 82, 0)",
                    borderColor: "#76b852",
                    pointRadius: 3,
                    pointBackgroundColor: "#76b852",
                    pointBorderColor: "#76b852",
                    pointHoverRadius: 3,
                    pointHoverBackgroundColor: "#76b852",
                    pointHoverBorderColor: "#76b852",
                    pointHitRadius: 10,
                    pointBorderWidth: 2,
                    data: JSON.parse(checkout_quantities),
                }
            ],
        },
        options: {
            maintainAspectRatio: false,
            responsive: true,
            layout: {
                padding: {
                    left: 10,
                    right: 25,
                    top: 25,
                    bottom: 0
                }
            },
            scales: {
                xAxes: [{
                    time: {
                        unit: 'Month'
                    },
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    ticks: {
                        maxTicksLimit: 12
                    },
                }],
                yAxes: [{
                    ticks: {
                        maxTicksLimit: 10,
                        padding: 10,
                        // Include a dollar sign in the ticks
                        callback: function (value, index, values) {
                            return number_format(value) + ' unit';
                        }
                    },
                    gridLines: {
                        color: "#b3b3b3",
                        zeroLineColor: "#b3b3b3",
                        drawBorder: false,
                        borderDash: [3],
                        zeroLineBorderDash: [3]
                    }
                }],
            },
            legend: {
                display: false,
            },
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#8E2DE2",
                bodyFontSize: 13,
                titleMarginBottom: 8,
                titleFontColor: '#232323',
                titleFontSize: 16,
                tooltipsFontSize: 16,
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                intersect: false,
                mode: 'index',
                caretPadding: 10,
                callbacks: {
                    label: function (tooltipItem, chart) {
                        var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                        return datasetLabel + ' : ' + number_format(tooltipItem.yLabel);
                    }
                }
            }
        }
    });
</script>
@endpush