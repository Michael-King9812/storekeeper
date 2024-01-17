var myElement1 = document.getElementById('recent-jobs');
new SimpleBar(myElement1, { autoHide: true });

/* Subscription Overview Chart */
var options = {
    series: [{
        name: "Basic",
        data: [75, 78, 38, 39, 38, 73, 73, 53, 53, 16, 16, 53]
    },
    {
        name: "Pro",
        data: [35, 35, 62, 63, 13, 13, 60, 60, 41, 41, 82, 82]
    }
    ],
    chart: {
        toolbar: {
            show: false
        },
        height: 285,
        type: 'line',
        zoom: {
            enabled: false
        },
        dropShadow: {
            enabled: true,
            enabledOnSeries: undefined,
            top: 5,
            left: 0,
            blur: 3,
            color: '#000',
            opacity: 0.15
        },
    },
    grid: {
        borderColor: '#f1f1f1',
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        width: [2, 2],
        curve: ['smooth', 'smooth'],
        lineCap: 'butt',
        dashArray: [0, 0]
    },
    title: {
        text: undefined,
    },
    legend: {
        show: true,
        position: 'top',
        horizontalAlign: 'center',
        fontWeight: 600,
        fontSize: '11px',
        tooltipHoverFormatter: function (val, opts) {
            return val + ' - ' + opts.w.globals.series[opts.seriesIndex][opts.dataPointIndex] + ''
        },
        labels: {
            colors: '#74767c',
        },
        markers: {
            width: 7,
            height: 7,
            strokeWidth: 0,
            radius: 12,
            offsetX: 0,
            offsetY: 0
        },
    },
    markers: {
        discrete: [{
            seriesIndex: 0,
            dataPointIndex: 5,
            fillColor: '#305cfc',
            strokeColor: '#fff',
            size: 4,
            shape: "circle"
        },
        {
            seriesIndex: 0,
            dataPointIndex: 11,
            fillColor: '#305cfc',
            strokeColor: '#fff',
            size: 4,
            shape: "circle"
        },
        {
            seriesIndex: 1,
            dataPointIndex: 10,
            fillColor: '#23b7e5',
            strokeColor: '#fff',
            size: 4,
            shape: "circle"
        }, {
            seriesIndex: 1,
            dataPointIndex: 4,
            fillColor: '#23b7e5',
            strokeColor: '#fff',
            size: 4,
            shape: "circle"
        }],
        hover: {
            sizeOffset: 6
        }
    },
    yaxis: {
        title: {
            style: {
                color: '#adb5be',
                fontSize: '14px',
                fontFamily: 'poppins, sans-serif',
                fontWeight: 600,
                cssClass: 'apexcharts-yaxis-label',
            },
        },
        labels: {
            formatter: function (y) {
                return y.toFixed(0) + "";
            },
            show: true,
            style: {
                colors: "#8c9097",
                fontSize: '11px',
                fontWeight: 600,
                cssClass: 'apexcharts-xaxis-label',
            },
        }
    },
    xaxis: {
        type: 'day',
        categories: ['01 Jan', '02 Jan', '03 Jan', '04 Jan', '05 Jan', '06 Jan', '07 Jan', '08 Jan', '09 Jan',
            '10 Jan', '11 Jan', '12 Jan'
        ],
        axisBorder: {
            show: true,
            color: 'rgba(119, 119, 142, 0.05)',
            offsetX: 0,
            offsetY: 0,
        },
        axisTicks: {
            show: true,
            borderType: 'solid',
            color: 'rgba(119, 119, 142, 0.05)',
            width: 6,
            offsetX: 0,
            offsetY: 0
        },
        labels: {
            rotate: -90,
            style: {
                colors: "#8c9097",
                fontSize: '11px',
                fontWeight: 600,
                cssClass: 'apexcharts-xaxis-label',
            },
        }
    },
    tooltip: {
        y: [
            {
                title: {
                    formatter: function (val) {
                        return val
                    }
                }
            },
            {
                title: {
                    formatter: function (val) {
                        return val
                    }
                }
            },
            {
                title: {
                    formatter: function (val) {
                        return val;
                    }
                }
            }
        ]
    },
    colors: ["rgb(132, 90, 223)", "#23b7e5"],
};

// ajaxGetPostMonthlyData: function () {
//     var urlPath = 'http://' + window.location.hostname + ':8000/vendor/chart-analysis';
//     var request = $.ajax({
//         method: 'GET',
//         url: urlPath
//     });

//     request.done( function (response) {
//         console.log(response);
//     })
// },

var subscriptionOptions = {
    
    series: [],
    //     {
    //     name: "Basic",
    //     // data: [75, 78, 38, 39, 38, 73, 73, 53, 53, 16, 16, 53]
    // },
    // {
    //     name: "Pro",
    //     // data: [35, 35, 62, 63, 13, 13, 60, 60, 41, 41, 82, 82]
    // }
    
    chart: {
        toolbar: {
            show: false
        },
        height: 285,
        type: 'line',
        zoom: {
            enabled: false
        },
        dropShadow: {
            enabled: true,
            enabledOnSeries: undefined,
            top: 5,
            left: 0,
            blur: 3,
            color: '#000',
            opacity: 0.15
        },
    },
    grid: {
        borderColor: '#f1f1f1',
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        width: [2, 2],
        curve: ['smooth', 'smooth'],
        lineCap: 'butt',
        dashArray: [0, 0]
    },
    title: {
        text: undefined,
    },
    legend: {
        show: true,
        position: 'top',
        horizontalAlign: 'center',
        fontWeight: 600,
        fontSize: '11px',
        tooltipHoverFormatter: function (val, opts) {
            return val + ' - ' + opts.w.globals.series[opts.seriesIndex][opts.dataPointIndex] + ''
        },
        labels: {
            colors: '#74767c',
        },
        markers: {
            width: 7,
            height: 7,
            strokeWidth: 0,
            radius: 12,
            offsetX: 0,
            offsetY: 0
        },
    },
    // markers: {
    //     discrete: [{
    //         seriesIndex: 0,
    //         dataPointIndex: 5,
    //         fillColor: '#305cfc',
    //         strokeColor: '#fff',
    //         size: 4,
    //         shape: "circle"
    //     },
    //     {
    //         seriesIndex: 0,
    //         dataPointIndex: 11,
    //         fillColor: '#305cfc',
    //         strokeColor: '#fff',
    //         size: 4,
    //         shape: "circle"
    //     },
    //     {
    //         seriesIndex: 1,
    //         dataPointIndex: 10,
    //         fillColor: '#23b7e5',
    //         strokeColor: '#fff',
    //         size: 4,
    //         shape: "circle"
    //     }, {
    //         seriesIndex: 1,
    //         dataPointIndex: 4,
    //         fillColor: '#23b7e5',
    //         strokeColor: '#fff',
    //         size: 4,
    //         shape: "circle"
    //     }],
    //     hover: {
    //         sizeOffset: 6
    //     }
    // },
    yaxis: {
        title: {
            style: {
                color: '#adb5be',
                fontSize: '14px',
                fontFamily: 'poppins, sans-serif',
                fontWeight: 600,
                cssClass: 'apexcharts-yaxis-label',
            },
        },
        labels: {
            formatter: function (y) {
                return y.toFixed(0) + "";
            },
            show: true,
            style: {
                colors: "#8c9097",
                fontSize: '11px',
                fontWeight: 600,
                cssClass: 'apexcharts-xaxis-label',
            },
        }
    },
    xaxis: {
        type: 'day',
        categories: [],
        // ['01 Jan', '02 Jan', '03 Jan', '04 Jan', '05 Jan', '06 Jan', '07 Jan', '08 Jan', '09 Jan',
        //     '10 Jan', '11 Jan', '12 Jan'
        // ],
        axisBorder: {
            show: true,
            color: 'rgba(119, 119, 142, 0.05)',
            offsetX: 0,
            offsetY: 0,
        },
        axisTicks: {
            show: true,
            borderType: 'solid',
            color: 'rgba(119, 119, 142, 0.05)',
            width: 6,
            offsetX: 0,
            offsetY: 0
        },
        labels: {
            rotate: -90,
            style: {
                colors: "#8c9097",
                fontSize: '11px',
                fontWeight: 600,
                cssClass: 'apexcharts-xaxis-label',
            },
        }
    },
    tooltip: {
        y: [
            {
                title: {
                    formatter: function (val) {
                        return val
                    }
                }
            },
            {
                title: {
                    formatter: function (val) {
                        return val
                    }
                }
            },
            {
                title: {
                    formatter: function (val) {
                        return val;
                    }
                }
            }
        ]
    },
    colors: ["rgb(132, 90, 223)", "#23b7e5"],
};

var apiData;
$(document).ready(function () {
    console.log("Page has been loaded");
    var urlPath = 'http://' + window.location.hostname + ':8000/vendor/chart-analysis';
    $.ajax({
        url: urlPath,
        method: 'GET',
        success: function (data) {
            console.log(data);
            // Store the data in the variable
            apiData = data;

            subscriptionOptions.series = [
                {
                    name: 'SMS',
                    data: apiData.sms_post_count
                },
                {
                    name: 'USSD',
                    data: apiData.ussd_post_count
                },
            ];
            
            // subscriptionOptions.xaxis.categories = apiData.months.map(month => ('0' + month).slice(-2) + ' Jan');
            // subscriptionOptions.xaxis.categories = apiData.months_number.map(month => ('0' + month).slice(-2) + ' Jan');

            subscriptionOptions.xaxis.categories = apiData.months_number.map(month => {
                const monthNamesShort = [
                    'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                    'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
                ];
            
                // Ensure the month is in the valid range (1 to 12)
                const validMonth = Math.max(1, Math.min(12, month));
            
                // Get the corresponding abbreviated month name
                const monthNameShort = monthNamesShort[validMonth - 1];
            
                // Format and return the result
                return ('0' + month).slice(-2) + ' ' + monthNameShort;
            });
            // apiData.months_number

            document.querySelector("#subscriptionOverview").innerHTML = " ";
            var chart1 = new ApexCharts(document.querySelector("#subscriptionOverview"), subscriptionOptions);
            chart1.render();
        },
        error: function (err) {
            console.log(err);
        }
    });
});

function subOverview() {
    chart1.updateOptions({
        colors: ["rgb(" + myVarVal + ")", "#23b7e5"],
    })
}
/* Subscription Overview Chart */

/* Candidates Chart */
var options = {
    series: [1754, 1234],
    labels: ["Female", "Male"],
    chart: {
        height: 250,
        type: 'donut'
    },
    dataLabels: {
        enabled: false,
    },

    legend: {
        show: false,
    },
    stroke: {
        show: true,
        curve: 'smooth',
        lineCap: 'round',
        colors: "#fff",
        width: 0,
        dashArray: 0,
    },
    plotOptions: {

        pie: {
            expandOnClick: false,
            donut: {
                size: '80%',
                background: 'transparent',
                labels: {
                    show: true,
                    name: {
                        show: true,
                        fontSize: '20px',
                        color: '#495057',
                        offsetY: -4
                    },
                    value: {
                        show: true,
                        fontSize: '18px',
                        color: undefined,
                        offsetY: 8,
                        formatter: function (val) {
                            return val + "%"
                        }
                    },
                    total: {
                        show: true,
                        showAlways: true,
                        label: 'Total',
                        fontSize: '22px',
                        fontWeight: 600,
                        color: '#495057',
                    }

                }
            }
        }
    },
    colors: ["rgb(132, 90, 223)", "#23b7e5"],

};
document.querySelector("#candidates-chart").innerHTML = " ";
var chart = new ApexCharts(document.querySelector("#candidates-chart"), options);
chart.render();
function Candidates() {
    chart.updateOptions({
        colors: ["rgb(" + myVarVal + ")", "#23b7e5"],
    })
};
/* Candidates Chart */