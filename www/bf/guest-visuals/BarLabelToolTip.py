class BarLabelToolTip(plugins.PluginBase):    
    JAVASCRIPT = """
    mpld3.register_plugin("barlabeltoolTip", BarLabelToolTip);
    BarLabelToolTip.prototype = Object.create(mpld3.Plugin.prototype);
    BarLabelToolTip.prototype.constructor = BarLabelToolTip;
    BarLabelToolTip.prototype.requiredProps = ["id"];
    BarLabelToolTip.prototype.defaultProps = {
        labels: null,
        hoffset: 0,
        voffset: 10,
        location: 'mouse'
    };
    function BarLabelToolTip(fig, props){
        mpld3.Plugin.call(this, fig, props);
    };
    
    BarLabelToolTip.prototype.draw = function(){
        var svg = d3.select("#" + this.fig.figid);
        var obj = svg.selectAll(".mpld3-path");

        var labels = this.props.labels;
        var loc = this.props.location;

        this.tooltip = this.fig.canvas.append("text")
            .attr("class", "mpld3-tooltip-text")
            .attr("x", 0)
            .attr("y", 0)
            .text("")
            .style("visibility", "hidden");

        function mouseover(d, i) {
            this.tooltip
                .style("visibility", "visible")
                .text(labels[i]);
        }

        function mousemove(d, i) {
            if (loc === "mouse") {
                var pos = d3.mouse(this.fig.canvas.node())
                this.x = 244;
                this.y = 40;
                //alert(pos);
            }

            this.tooltip
                .attr('x', this.x)
                .attr('y', this.y);
        }

        function mouseout(d, i) {
            this.tooltip.style("visibility", "hidden");
        }

        obj
            .on("mouseover", mouseover.bind(this))
            .on("mousemove", mousemove.bind(this))
            .on("mouseout", mouseout.bind(this));        
    }
    """
    def __init__(self, bar, labels=None, location="mouse"):
        import matplotlib
        from mpld3.utils import get_id

        if location not in ["bottom left", "top left", "bottom right", "top right", "mouse"]:
            raise ValueError("invalid location: {0}".format(location))
        
        self.dict_ = {"type": "barlabeltoolTip",
                      "id": get_id(bar),
                      "labels": labels,
                      "location": location}
