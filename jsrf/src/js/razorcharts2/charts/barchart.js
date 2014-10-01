define(['vendor/lodash',
        'razorcharts2/scales/scale',
        'razorcharts2/axes/leftaxis',
        'razorcharts2/axes/bottomaxis',
        'razorcharts2/utils/graphutils',
        'razorcharts2/plots/bar'], function (_, Scale, LeftAxis, BottomAxis, GraphUtils, Bar) {
    var BarChart = function () {
        this.options = {};
        this.xAxisOptions = {};
        this.yAxisOptions = {};
        this.plot = [];
    };

    BarChart.prototype.config = function (_options) {
        var options = this.options = _.extend(this.options, _options);
        if(options.stacked) {
            configureStackedBarChart (this);
        } else {
            configureBarChart (this);
        }
    };

    function configureBarChart (self) {
        calcScaleBounds (self);
        configureScales (self);
        configureAxes (self);
        configurePlots (self);
    };

    function configureStackedBarChart (self) {

    }

    function calcScaleBounds (self) {
        var allData = [],
            series = self.options.series;

        for(var i=0; i<series.length; i++) {
            allData = allData.concat (series[i].data);
        }

        self.dataMin = _.min (allData);
        self.dataMax = _.max (allData);
    };

    function configureScales (self) {
        self.yScale = new Scale.ordinal ();
        self.yScale.domain (self.options.labels);

        self.xScale = new Scale.linear ();
        self.xDomain = xAxisDomain (self);
        self.xScale.domain ([self.xDomain.min, self.xDomain.max]);
    };

    function configureAxes (self) {
        self.yAxis = new LeftAxis ();
        self.yAxis.config({
            type: 'ordinal',
            scale: self.yScale,
            ticks: self.options.labels.reverse()
        });

        self.xAxis = new BottomAxis ();
        self.xAxis.config({
            type: 'linear',
            scale: self.xScale,
            ticks: self.xDomain.ticks
        });
    };

    function xAxisDomain (self) {
        var min = self.dataMin < 0 ? self.dataMin : 0,
            max = self.dataMax;

        if(_.isNumber(self.xAxisOptions.minValue) || _.isNumber(self.xAxisOptions.maxValue)) {
            min = self.xAxisOptions.minValue || min;
            max = self.xAxisOptions.maxValue || max;
        }

        var domain = GraphUtils.prettyDomain (min, max);
        return domain;
    };

    function configurePlots (self) {
        var series = self.options.series;
        for(var i=0; i<series.length; i++) {
            series[i].scale = self.xScale;
        }
        self.plot = new Bar ();
        self.plot.config({
            series: series
        });
    };

    BarChart.prototype.renderTo = function (paper, w, h) {
        this.paper = paper;
        this.width = w;
        this.height = h;
        createContainers (this);
        this.xScale.range ([0, w]);
        this.xAxis.renderTo (paper, this.xAxisContainer, w, h);

        this.yScale.range ([0, h - this.xAxis.height()]);
        this.yAxis.renderTo (paper, this.yAxisContainer, w, h - this.xAxis.height());

        this.xScale.range ([0, w - this.yAxis.width()]);
        this.xAxis.resizeTo (w - this.yAxis.width(), h);

        this.xAxisContainer.translate (this.yAxis.width(), h - this.xAxis.height());
        this.yAxisContainer.translate (this.yAxis.width(), 0);

        this.plot.renderTo (paper, this.plotContainer, w - this.yAxis.width(), h - this.xAxis.height());
        this.plotContainer.translate (this.yAxis.width(), 0);
    };

    function createContainers (self) {
        var paper = self.paper;
        self.xAxisContainer = paper.g ();
        self.xAxisContainer.attr ('id', 'rc-axis-container');
        paper.append (self.xAxisContainer);

        self.yAxisContainer = paper.g ();
        self.yAxisContainer.attr ('id', 'rc-axis-container');
        paper.append (self.yAxisContainer);

        self.plotContainer = paper.g ();
        self.plotContainer.attr ('id', 'rc-plot-container');
        paper.append (self.plotContainer);
    }

    BarChart.prototype.resizeTo = function (w, h) {
        this.width = w;
        this.height = h;

        this.xScale.range ([0, w]);
        this.xAxis.resizeTo (w, h);

        this.yScale.range ([0, h - this.xAxis.height ()]);
        this.yAxis.resizeTo (w, h - this.xAxis.height ());

        this.xScale.range ([0, w - this.yAxis.width()]);
        this.xAxis.resizeTo (w - this.yAxis.width(), h);

        this.xAxisContainer.translate (this.yAxis.width(), h - this.xAxis.height());
        this.yAxisContainer.translate (this.yAxis.width(), 0);

        this.plot.resizeTo (w - this.yAxis.width(), h - this.xAxis.height());
        this.plotContainer.translate (this.yAxis.width(), 0);

    };

    BarChart.prototype.update = function (series) {
        var options = this.options;
        if(series) {
            for(var i=0; i<series.length; i++) {
                var idx = series[i].seriesIndex;
                var oldSeries = _.where(options.series, {seriesIndex: idx})[0];
                oldSeries.data = series[i].data;
            }
        }
        if(options.stacked) {
            updateStackedBarChart (this);
        } else {
            updateBarChart (this);
        }
    };

    function updateBarChart (self) {
        var w = self.width,
            h = self.height;


        calcScaleBounds (self);
        self.xDomain = xAxisDomain (self);
        self.xScale.domain ([self.xDomain.min, self.xDomain.max]);
        self.xAxis.setTicks (self.xDomain.ticks);
        self.xAxis.update ();

        self.plot.update ();
    };

    return BarChart;
});