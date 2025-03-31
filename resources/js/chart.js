import * as am5 from "@amcharts/amcharts5";
import * as am5percent from "@amcharts/amcharts5/percent";
import am5themes_Animated from "@amcharts/amcharts5/themes/Animated";

let series;

am5.ready(function() {

    let root = am5.Root.new("chartdiv");
    root.setThemes([
        am5themes_Animated.new(root)
    ]);
    let chart = root.container.children.push(am5percent.PieChart.new(root, {
        layout: root.verticalLayout
    }));

    series = chart.series.push(am5percent.PieSeries.new(root, {
        alignLabels: false,
        valueField: "value",
        categoryField: "category"
    }));
    series.get("colors").set("colors", [
        am5.color(0xbd98e8),
        am5.color(0xddb042),
        am5.color(0xa371db),
        am5.color(0xd5932b),
        am5.color(0x8d52cb),
        am5.color(0xbc7323),
    ]);
    series.labels.template.setAll({
        fontSize: 15,
        text: "{category}",
        fill: am5.color(0xd1d1d1),

        textType: "circular",
        radius: 3,
    });

    series.slices.template.setAll({
        fillOpacity: 0.5,
        strokeWidth: 3,
        stroke: am5.color(0xd1d1d1)
    });

    series.ticks.template.set("visible", false);
    series.slices.template.set("tooltipText", "");

    series.slices.template.adapters.add("radius", function (radius, target) {
        let dataItem = target.dataItem;
        let high = series.getPrivate("valueHigh");

        if (dataItem) {
            let value = target.dataItem.get("valueWorking", 0);
            return radius * value / high
        }
        return radius;
    });

    series.data.setAll(chartData);

    let delayed;

    document.getElementById("container").addEventListener('scroll',()=>{
        clearTimeout(delayed);
        delayed = setTimeout(showChartIfVisible, 100, series);
    })
    series.appear().then(()=>{series.hide();})
});

function inViewport(element){
    let position = element.getBoundingClientRect();
    return position.top > 0 && position.top < window.innerHeight
}

function showChartIfVisible(series){
    if(inViewport(document.getElementById("chartdiv")) && series.isHidden()){
        series.appear(1000, 100);
    }else if(!series.isHidden()){
        series.hide(1000);
    }
};
