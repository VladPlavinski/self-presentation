import * as am5 from "@amcharts/amcharts5";
import * as am5percent from "@amcharts/amcharts5/percent";
import am5themes_Animated from "@amcharts/amcharts5/themes/Animated";

export {chart};

let chart = {
    containerId: "chartdiv",
    colors: {
        series: [
            am5.color(0xbd98e8),
            am5.color(0xddb042),
            am5.color(0xa371db),
            am5.color(0xd5932b),
            am5.color(0x8d52cb),
            am5.color(0xbc7323),
        ],
        labels: am5.color(0xd1d1d1),
        borders: am5.color(0xd1d1d1),
    },
    root: {},
    chart: {},
    series: {},
    scrollTimeout: {},
    init: function (){
        am5.ready(()=>{this.doWhenReady()});
        this.series.data.setAll(chartData);
        this.setStyle();
    },
    doWhenReady: function(){
        this.create();
        this.setSeriesColors();
        this.setHighAdapter();
    },
    create: function(){
        this.root = am5.Root.new(this.containerId);
        this.root.setThemes([
            am5themes_Animated.new(this.root)
        ]);
        this.chart = this.root.container.children.push(am5percent.PieChart.new(this.root, {
            layout: this.root.verticalLayout
        }));
        this.series = this.chart.series.push(am5percent.PieSeries.new(this.root, {
            alignLabels: false,
            valueField: "value",
            categoryField: "category"
        }));
    },
    setSeriesColors: function(){
        this.series.get("colors").set("colors", this.colors.series);
    },
    setHighAdapter: function(){
        let chart = this;
        chart.series.slices.template.adapters.add("radius", function (radius, target) {
            let high = chart.series.getPrivate("valueHigh");
            if (target.dataItem) {
                let value = target.dataItem.get("valueWorking", 0);
                return radius * value / high
            }
            return radius;
        });
    },
    setStyle: function(){
        this.hideSeriesTooltips();
        this.setSeriesLabels();
        this.setSeriesBorders();
        this.setScrollWatcher();
    },
    hideSeriesTooltips: function(){
        this.series.ticks.template.set("visible", false);
        this.series.slices.template.set("tooltipText", "");
    },
    setSeriesLabels: function (){
        this.series.labels.template.setAll({
            fontSize: 15,
            text: "{category}",
            fill: this.colors.labels,
            textType: "circular",
            radius: 3,
        });
    },
    setSeriesBorders: function (){
        this.series.slices.template.setAll({
            fillOpacity: 0.5,
            strokeWidth: 3,
            stroke: this.colors.borders,
        });
    },
    setScrollWatcher: function(){
        document.getElementById("container").addEventListener('scroll',()=>{
            clearTimeout(this.scrollTimeout);
            this.scrollTimeout = setTimeout(()=>{this.showChartIfVisible()}, 100);
        })
    },
    showChartIfVisible: function(){
        if(this.isChartInViewport() && this.series.isHidden()){
            this.series.appear(1000, 100);
        }else if(!this.series.isHidden()){
            this. series.hide(1000);
        }
    },
    isChartInViewport: function(){
        let position = document.getElementById(this.containerId).getBoundingClientRect();
        return position.top > 0 && position.top < window.innerHeight
    }
}
