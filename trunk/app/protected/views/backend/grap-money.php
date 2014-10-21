<div id="container" style="min-width: 100%; max-width: 100%; height: 400px; margin: 0 auto">   
</div>
<script type="text/javascript">

    var chart = "";
    $(function() {
        // Set up the chart
        $.getJSON('index.php?r=Money/JsonGetSumPriceGroupMonth',
                '', function(data) {
                    var listdata = new Array();
                    var listcategory = new Array();
                    $.each(data, function(index, value) {
                        listdata.push(parseInt(value.sumtotal));
                        listcategory.push(value.monthyear);
                    });
                    console.log(' listdata : ' + listdata);
                    // ############### load grap ##############
                    $('#container').highcharts({
                        chart: {
                            type: 'bar'
                        },
                        xAxis: {
                            categories: listcategory,
                            title: {
                                text: null
                            }
                        },
                        series: [{
                                name: 'Year 1800',
                                data: listdata
                            }]
                    });
                });
    });
</script>

