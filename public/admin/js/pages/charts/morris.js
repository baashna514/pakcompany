$(function () {
    getMorris('line', 'line_chart');
    getMorris('bar', 'bar_chart');
    getMorris('donut', 'donut_chart');
});


function getMorris(type, element) {
    if (type === 'line') {
        Morris.Line({
            element: element,
            data: [{
                'period': '2011 Q3',
                'licensed': 1200
            }, {
                    'period': '2011 Q2',
                    'licensed': 3351
                }, {
                    'period': '2011 Q1',
                    'licensed': 2300
                }, {
                    'period': '2010 Q4',
                    'licensed': 2570
                }, {
                    'period': '2009 Q4',
                    'licensed': 3171
                }, {
                    'period': '2008 Q4',
                    'licensed': 3155
                }, {
                    'period': '2007 Q4',
                    'licensed': 3226
                }, {
                    'period': '2006 Q4',
                    'licensed': 3245
                }, {
                    'period': '2005 Q4',
                    'licensed': 3289
                }],
            xkey: 'period',
            ykeys: ['licensed'],
            labels: ['Licensed'],
            lineColors: ['rgb(233, 30, 99)'],
            lineWidth: 3
        });
    } else if (type === 'bar') {
        Morris.Bar({
            element: element,
            data: [{
                x: 'January',
                Orders: 3
            }, {
                    x: 'February',
                    Orders: 2
                }, {
                    x: 'March',
                    Orders: 5
                }, {
                    x: 'April',
                    Orders: 8
                }, {
                    x: 'May',
                    Orders: 5
                }, {
                    x: 'June',
                    Orders: 6
                }, {
                    x: 'July',
                    Orders: 7
                }],
            xkey: 'x',
            ykeys: ['Orders'],
            labels: ['ORDERS'],
            barColors: ['rgb(0, 188, 212)'],
        });
    } else if (type === 'donut') {
        Morris.Donut({
            element: element,
            data: [{
                label: 'Holly Quran',
                value: 25
            }, {
                    label: 'Panj Surah',
                    value: 40
                }, {
                    label: 'Namaz',
                    value: 25
                }, {
                    label: 'Special Edition',
                    value: 10
                }],
            colors: ['rgb(233, 30, 99)', 'rgb(0, 188, 212)', 'rgb(255, 152, 0)', 'rgb(0, 150, 136)'],
            formatter: function (y) {
                return y
            }
        });
    }
}