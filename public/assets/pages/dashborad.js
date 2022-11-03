/**
 Template Name: Appzia Admin
 Dashboard
 */
! function(e) {
    "use strict";
    var a = function() {};
    a.prototype.createAreaChart = function(e, a, r, o, t, i, l, n) {
        Morris.Area({
            element: e,
            pointSize: 3,
            lineWidth: 1,
            data: o,
            xkey: t,
            ykeys: i,
            labels: l,
            resize: !0,
            gridLineColor: "#3d4956",
            hideHover: "auto",
            lineColors: n
        })
    }, a.prototype.createBarChart = function(e, a, r, o, t, i) {
        Morris.Bar({
            element: e,
            data: a,
            xkey: r,
            ykeys: o,
            labels: t,
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
        this.createAreaChart("morris-area-example", 0, 0, [{
            y: barData[0].year,
            a: 1,
            b: 20
        }, {
            y:  barData[1].year,
            a: 75,
            b: 65
        }, {
            y:  barData[2].year,
            a: 50,
            b: 40
        }, {
            y: barData[3].year,
            a: 75,
            b: 65
        }, {
            y: barData[4].year,
            a: 50,
            b: 40
        }], "y", ["a", "b"], ["Series A", "Series B"], ["#00a3ff", "#04a2b3"]);
        this.createBarChart("morris-bar-example", [{
            y: barData[0].year,
            a: barData[0].total_earning,
            b: barData[0].total_expenses
        }, {
            y:  barData[1].year,
            a: barData[1].total_earning,
            b: barData[1].total_expenses
        }, {
            y:  barData[2].year,
           a: barData[2].total_earning,
            b: barData[2].total_expenses
        }, {
            y: barData[3].year,
            a: barData[3].total_earning,
            b: barData[3].total_expenses
        }, {
            y: barData[4].year,
            a: barData[4].total_earning,
            b: barData[4].total_expenses
        }], "y", ["a", "b"], ["Income", "Expenses"], ["#04a2b3", "#F00"]);
        this.createDonutChart("morris-donut-example", [{
            label: "Expenses",
            value: donutData.exp
        }, {
            label: "Salaries",
            value: donutData.salaries
        }, {
            label: "Fee",
            value: donutData.fee
        }], ["#dcdcdc", "#e66060", "#04a2b3"])
    }, e.Dashboard = new a, e.Dashboard.Constructor = a
}(window.jQuery),
function(e) {
    "use strict";
    window.jQuery.Dashboard.init()
}();