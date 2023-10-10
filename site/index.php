<?php
include 'session.php';
include '../main.php';
?>
<!DOCTYPE html>
<html>
<?php include '../template/head.php'; ?>

<body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <?php include '../template/main_header.php'; ?>

        <!-- =============================================== -->

        <!-- Left side column. contains the sidebar -->
        <?php include '../template/sidebar.php'; ?>

        <!-- =============================================== -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Dashboard
                    <small>Printing Label Sanoh Indonesia</small>
                </h1>
                <ol class="breadcrumb">
                    <!--                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Examples</a></li>-->
                    <li class="active">Dashboard</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">

                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-8">
                        <div class="info-box">
                            <span class="info-box-icon bg-aqua"><i class="ion ion-wrench"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Part terdaftar</span>
                                <span class="info-box-number"><?= $part->countRecord() ?> <small>Part</small></span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->

                    <!-- fix for small devices only -->
                    <div class="clearfix visible-sm-block"></div>

                    <div class="col-md-4 col-sm-4 col-xs-8">
                        <div class="info-box">
                            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">User terdaftar</span>
                                <span class="info-box-number"><?= $user->countRecord() ?> &nbsp;&nbsp;<small>Users</small></span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->

                    <!-- fix for small devices only -->
                    <div class="clearfix visible-sm-block"></div>

                    <div class="col-md-4 col-sm-4 col-xs-8">
                        <div class="info-box">
                            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-people-outline"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Customer terdaftar</span>
                                <span class="info-box-number"><?= $cust->countRecord() ?> &nbsp;&nbsp;<small>Users</small></span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                </div>

                <!-- Default box -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Grafik Total Print per Periode</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                                <i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="chart">
                            <canvas id="areaChart" style="height:250px"></canvas>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        -
                    </div>
                    <!-- /.box-footer-->
                </div>
                <!-- /.box -->

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <?php include '../template/footer.php'; ?>
        <!-- =============================================== -->

        <!-- Control sidebar. -->
        <?php include '../template/control_sidebar.php'; ?>

        <!-- =============================================== -->

        <!-- Footer. Contains page content -->
        <?php
        include '../template/js.php';
        ?>
        <script type="text/javascript">
            $(function() {
                // Get context with jQuery - using jQuery's .get() method.
                var areaChartCanvas = $('#areaChart').get(0).getContext('2d')
                // This will get the first returned node in the jQuery collection.
                var areaChart = new Chart(areaChartCanvas)

                var areaChartData = {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt'],
                    datasets: [{
                        label: 'Data Per Periode',
                        fillColor: 'rgba(60,141,188,0.9)',
                        strokeColor: 'rgba(60,141,188,0.8)',
                        pointColor: '#3b8bba',
                        pointStrokeColor: 'rgba(60,141,188,1)',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
                        data: [581, 565, 617, 400, 644, 611, 612, 645, 665, 247]
                        
                    }]
                }

                var areaChartOptions = {
                    //Boolean - If we should show the scale at all
                    showScale: true,
                    //Boolean - Whether grid lines are shown across the chart
                    scaleShowGridLines: false,
                    //String - Colour of the grid lines
                    scaleGridLineColor: 'rgba(0,0,0,.05)',
                    //Number - Width of the grid lines
                    scaleGridLineWidth: 1,
                    //Boolean - Whether to show horizontal lines (except X axis)
                    scaleShowHorizontalLines: true,
                    //Boolean - Whether to show vertical lines (except Y axis)
                    scaleShowVerticalLines: true,
                    //Boolean - Whether the line is curved between points
                    bezierCurve: true,
                    //Number - Tension of the bezier curve between points
                    bezierCurveTension: 0.3,
                    //Boolean - Whether to show a dot for each point
                    pointDot: false,
                    //Number - Radius of each point dot in pixels
                    pointDotRadius: 4,
                    //Number - Pixel width of point dot stroke
                    pointDotStrokeWidth: 1,
                    //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
                    pointHitDetectionRadius: 20,
                    //Boolean - Whether to show a stroke for datasets
                    datasetStroke: true,
                    //Number - Pixel width of dataset stroke
                    datasetStrokeWidth: 2,
                    //Boolean - Whether to fill the dataset with a color
                    datasetFill: true,
                    //String - A legend template
                    legendTemplate: '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
                    //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
                    maintainAspectRatio: true,
                    //Boolean - whether to make the chart responsive to window resizing
                    responsive: true
                }
                areaChart.Line(areaChartData, areaChartOptions)
            });
        </script>

</body>

</html>