(function ($) {

    'use strict';

    const graph = {

        // Initialization the functions
        init: () => {
            graph.chart();
        },

        chart: () => {
            let $wrap = $('#chartContainer');
            let data = $wrap.data('graph');
            let event = $wrap.data('event');
            let event_point = $wrap.data('event-point');

            let dataPoints = jQuery.map( data, function( points ) {
                return points;
            });

            let chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                backgroundColor: "transparent",
                axisY: {
                    lineThickness: 0,
                    gridThickness: 0,
                    tickLength: 0,
                    labelFormatter: function(e) {
                        return "";
                    }
                },
                axisX2: {
                    lineThickness: 0,
                    gridThickness: 0,
                    tickLength: 0,
                    labelFontSize: 14,
                    labelFontWeight: 'normal',
                    labelFontColor: '#617781',
                },
                toolTip:{
                    content: event,
                    fontColor: '#FFFFFF',
                    fontSize: 13,
                    fontWeight: 'bold',
                    cornerRadius: 16,
                    backgroundColor: '#006BE5',
                    borderColor: '#006BE5',
                },
                data: [{
                    type: "spline",
                    lineThickness: 6,
                    lineColor: '#006BE5',
                    axisXType: "secondary",

                    xValueFormatString: "MMM",
                    xValueType: "dateTime",

                    markerSize: 0,
                    markerBorderColor: "#FFFFFF",
                    markerBorderThickness: 5,
                    markerType: "circle",
                    highlightEnabled: false,

                    indexLabelWrap: true,
                    indexLabelFontColor: "#303030",
                    indexLabelFontSize: 15,
                    indexLabelFontWeight: 'bold',
                    indexLabelPlacement: "inside",
                    indexLabelLineThickness: 1,
                    indexLabelLineColor:'transparent',
                    dataPoints: dataPoints
                }]
            });

            chart.render();
            chart.toolTip.showAtX(event_point);

            /*
            let $canvas = $('.canvasjs-chart-canvas');
            let offset = $('.summary-calc__graph-inner').offset().top - $('.canvasjs-chart-tooltip').offset().top;

            if (offset < 50){
                chart.set("height", "200");
            }
             */
        }
    };

    // Run the main function
    $(function () {
        graph.init();
    });

})(jQuery);