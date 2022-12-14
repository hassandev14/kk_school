/**
 * Theme: Appzia Admin
 * Morris Chart
 */
! function(e) {
    "use strict";
    var a = function() {};
    a.prototype.createLineChart = function(e, a, r, t, o, i) {
        Morris.Line({
            element: e,
            data: a,
            xkey: r,
            ykeys: t,
            labels: o,
            gridLineColor: "#3d4956",
            resize: !0,
            lineColors: i
        })
    }, a.prototype.createAreaChart = function(e, a, r, t, o, i, s, n) {
        Morris.Area({
            element: e,
            pointSize: 3,
            lineWidth: 0,
            data: t,
            xkey: o,
            ykeys: i,
            labels: s,
            resize: !0,
            hideHover: "auto",
            gridLineColor: "#3d4956",
            lineColors: n
        })
    }, a.prototype.createBarChart = function(e, a, r, t, o, i) {
        Morris.Bar({
            element: e,
            data: a,
            xkey: r,
            ykeys: t,
            labels: o,
            gridLineColor: "#3d4956",
            barSizeRatio: .4,
            resize: !0,
            hideHover: "auto",
            barColors: i
        })
    }, a.prototype.createDonutChart = function(e, a, r) {
        Morris.Donut({
            element: e,
            data: a,
            resize: !0,
            colors: r,
            backgroundColor: "#2f3e47",
            labelColor: "#fff"
        })
    }, a.prototype.init = function() {
        this.createLineChart("morris-line-example", [{
            y: "2009",
            a: 100,
            b: 90
        }, {
            y: "2010",
            a: 75,
            b: 65
        }, {
            y: "2011",
            a: 50,
            b: 40
        }, {
            y: "2012",
            a: 75,
            b: 65
        }, {
            y: "2013",
            a: 50,
            b: 40
        }, {
            y: "2014",
            a: 75,
            b: 65
        }, {
            y: "2015",
            a: 100,
            b: 90
        }], "y", ["a", "b"], ["Series A", "Series B"], ["#00a3ff", "#04a2b3"]);
        this.createAreaChart("morris-area-example", 0, 0, [{
            y: "2009",
            a: 10,
            b: 20
        }, {
            y: "2010",
            a: 75,
            b: 65
        }, {
            y: "2011",
            a: 50,
            b: 40
        }, {
            y: "2012",
            a: 75,
            b: 65
        }, {
            y: "2013",
            a: 50,
            b: 40
        }, {
            y: "2014",
            a: 75,
            b: 65
        }, {
            y: "2015",
            a: 90,
            b: 60
        }, {
            y: "2016",
            a: 90,
            b: 75
        }], "y", ["a", "b"], ["Series A", "Series B"], ["#00a3ff", "#04a2b3"]);
        this.createBarChart("morris-bar-example", [{
            y: "2009",
            a: 100,
            b: 90
        }, {
            y: "2010",
            a: 75,
            b: 65
        }, {
            y: "2011",
            a: 50,
            b: 40
        }, {
            y: "2012",
            a: 75,
            b: 65
        }, {
            y: "2013",
            a: 50,
            b: 40
        }, {
            y: "2014",
            a: 75,
            b: 65
        }, {
            y: "2015",
            a: 100,
            b: 90
        }, {
            y: "2016",
            a: 90,
            b: 75
        }], "y", ["a", "b"], ["Series A", "Series B"], ["#00a3ff", "#04a2b3"]);
        this.createDonutChart("morris-donut-example", [{
            label: "Download Sales",
            value: 11
        }, {
            label: "In-Store Sales",
            value: 12
        }, {
            label: "Mail-Order Sales",
            value: 13
        }], ["#dcdcdc", "#e66060", "#04a2b3"])
    }, e.MorrisCharts = new a, e.MorrisCharts.Constructor = a
}(window.jQuery),
function(e) {
    "use strict";
    window.jQuery.MorrisCharts.init()
}();