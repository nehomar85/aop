<?php require_once('../connections/Portal.php'); ?>
<?php
	
	$meses = array('','Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
	for($x=1;$x<=12;$x=$x+1){
		$casos[$x]=0;
		$casos2[$x]=0;
		$casos3[$x]=0;
	}
	$anno='2019';
	#$anno=date('Y');
	$y='2019';
	
	$sql=mysqli_query($Portal,"select mes, sum(trx) valor from transacciones where anio = '$y' group by 1;");
	while($row=mysqli_fetch_array($sql)){
		$mes=$row['mes'];
		if($y==$anno){
			$casos[$mes]=$casos[$mes]+$row['valor'];
		}
	}
	
	$sql2=mysqli_query($Portal,"select mes, sum(trx) valor from transacciones where anio = '$y' and cliente not like 'Factura%' group by 1;");
	while($row2=mysqli_fetch_array($sql2)){
		$mes2=$row2['mes'];
		if($y==$anno){
			$casos2[$mes2]=$casos2[$mes2]+$row2['valor'];
		}
	}
	
	$sql3=mysqli_query($Portal,"select mes, sum(trx) valor from transacciones where anio = '$y' and cliente like 'Factura%' group by 1;");
	while($row3=mysqli_fetch_array($sql3)){
		$mes3=$row3['mes'];
		if($y==$anno){
			$casos3[$mes3]=$casos3[$mes3]+$row3['valor'];
		}
	}

?>
<html style="zoom:90%;">	
<head>
<title>.:Operaciones-Ptesa:.</title>
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
   <script src="http://code.highcharts.com/highcharts.js"></script>
   <script src="https://code.highcharts.com/modules/exporting.js"></script>
</head>
<body>
<div id="container" style="width: 100%; height: 100%; margin: 0 auto"></div>
<script language="JavaScript">
$(function () {
    $(document).ready(function() {
	var chart;
	$('#container').highcharts({
	chart: {
		type: 'line'
    },
	title: {
        text: ''
    },
    subtitle: {
        text: 'Transacciones Mensuales Factura Electrónica | EPH'
    },
    xAxis: [{
        categories: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
        crosshair: true
    }],
    yAxis: {
		//min: 3000,
		//max: 45000,
        title: {
			text: false
            //text: 'trx'
        }
    },
    /*legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },*/
   /*plotOptions: {
        series: {
            pointStart: 2010
        }
    },*/
	tooltip: {
        pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b><br/>',
        shared: true
    },
	plotOptions: {
		line: {
			dataLabels: {
				enabled: true,
                borderRadius: 5,
                backgroundColor: 'rgba(252, 255, 197, 0.7)',
                borderWidth: 1,
                borderColor: '#AAA',
                y: -6
			}
		}
	},	
	//aqui colors de cada linea
	colors: ['#00a65a', '#39F', '#6CF'],
    series: [{
        name: 'Total Transacciones',
        data: (function() {
                   var data = [];
                    <?php
                        for($x=1;$x<=(12)-1;$x=$x+1){
                    ?>
                    data.push(['<?php echo $meses[$x]; ?>',  <?php echo $casos[$x] ?>]);
                    <?php } ?>
                return data;
                })(),
    },
	{
        name: 'Trx EPH',
		//dashStyle: 'DashDot',
		dashStyle: 'ShortDashDot',
        data: (function() {
                   var data = [];
                    <?php
                        for($x=1;$x<=(12)-1;$x=$x+1){
                    ?>
                    data.push(['<?php echo $meses[$x]; ?>',  <?php echo $casos2[$x] ?>]);
                    <?php } ?>
                return data;
                })(),
    },
	{
        name: 'Trx Factura Electrónica',
		//dashStyle: 'DashDot',
		dashStyle: 'DashDot',
        data: (function() {
                   var data = [];
                    <?php
                        for($x=1;$x<=(12)-1;$x=$x+1){
                    ?>
                    data.push(['<?php echo $meses[$x]; ?>',  <?php echo $casos3[$x] ?>]);
                    <?php } ?>
                return data;
                })(),	
	}],
	credits: {
		enabled: false
    }
});
});
});
</script>
</body>
</html>