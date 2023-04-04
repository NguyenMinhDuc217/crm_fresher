/*
    TicketsByEmployeeReportChart.js
    Author: Phuc Lu
    Date: 2020.05.12
*/

window.TicketsByEmployeeReportChart = class extends CustomChartWidget {

    drawChart (placeholderId, width, height) {
        var data = google.visualization.arrayToDataTable(this.chartData.data);
        var container = document.getElementById(placeholderId);
        var options = {
            width: width,
            height: height - 28,
            pointSize: 9,
            legend: { position: 'bottom' },
            chartArea: { left: '9%', top: '7%', width: '86%', height: '70%' }, 
            vAxes: {
                0: {
                    viewWindowMode: 'explicit',
                    viewWindow: { min: 0 },
                    title: this.chartData.data[0][1],
                    titleTextStyle: {
                        color: 'grey',
                        fontSize: 11,
                        italic: 0,
                    }
                },
                1: {
                    format: 'short',
                    viewWindowMode: 'explicit',
                    viewWindow: { min: 0 },       
                    title: this.chartData.data[0][2],
                    titleTextStyle: {
                        color: 'grey',
                        fontSize: 11,
                        italic: 0,
                    }
                }
            },
            series: {
                0: { type: "bars", targetAxisIndex: 0, color: '#7cb5ec' }
            },
        };

        // START-- Support mobile compatibilities
        if (location.href.indexOf('EmbeddedReportChart') > 0 && screen.availWidth <= 600) {
            options.fontSize = 40;
        }
        // END-- Support mobile compatibilities

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.ComboChart(container);
        var _this = this;
        var runOnce = google.visualization.events.addListener(chart, 'ready', function () {
            google.visualization.events.removeListener(runOnce);
            var leftVal, newLeftTicks = [];
            var leftTicks = chart.ia.hd[0].La;
            var maxLeftTick = 0;
            var leftInterval = 0;

            for (var i = 0; i < leftTicks.length; i++) {
                if (leftTicks[i].Da > maxLeftTick) {
                    maxLeftTick = leftTicks[i].Da;
                }
            }

            if (maxLeftTick == 1) {
                leftInterval = 1;
            }
            else {
                leftInterval = _this.roundAxiForChart(maxLeftTick / 5);
            }

            for (var i = 0; i < 6; i++) {
                leftVal = _this.getFormatedValueAndSuffix(leftInterval * i);

                newLeftTicks.push({ v: leftInterval * i, f: leftVal[0] + (leftVal[1]  != '' ? ' ' + leftVal[1] : '') });
            }

            options.vAxes = options.vAxes || {};            
            options.vAxes[0].ticks = newLeftTicks;
            options.vAxes[0].viewWindow.max = leftInterval * 5;
            chart.draw(data, options);
        });

        chart.draw(data, options);
    }
 };
