<?php require_once('../connections/Portal.php'); ?>
<?php
	$strProducto = "SELECT * FROM producto ORDER BY producto ASC";
	$resultProducto = $Portal->query($strProducto);
	$Producto = '<option disabled selected hidden>Producto</option>';
	while( $fila = $resultProducto->fetch_array() )
	{
		$Producto.='<option value="'.$fila["producto"].'">'.$fila["producto"].'</option>';
	}

	$strCliente = "SELECT * FROM cliente ORDER BY Cliente ASC";
	$resultCliente = $Portal->query($strCliente);
	$Cliente = '<option disabled selected hidden>Cliente</option>';
	while( $fila = $resultCliente->fetch_array() )
	{
		$Cliente.='<option value="'.$fila["cliente"].'">'.$fila["cliente"].'</option>';
	}

	if(isset($_GET['annio']) && !empty($_GET['annio'])){
		$anno=$_GET['annio'];
		$y=$_GET['annio'];
	} else {
		$anno=date('2020');
		$y=date('2020');
	}
	
	$sqlAnnio=" and year(fechaReporte) = '".$y."' ";
	
	if(isset($_GET['Cliente']) && !empty($_GET['Cliente'])){
		$cliente=$_GET['Cliente'];
		$sqlCliente=" and cliente = '".$cliente."' ";
	} else {
		$cliente="";
		$sqlCliente="";
	}
	
	if(isset($_GET['Producto']) && !empty($_GET['Producto'])){
		$producto=$_GET['Producto'];
		$sqlProducto=" and producto = '".$producto."' ";
	} else {
		$sqlProducto="";
	}

	$meses = array('','Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
	for($x=1;$x<=12;$x=$x+1){
		$casos[$x]=0;	
		$casos2[$x]=0;		
		$casos3[$x]=0;		
	}
	
	$sql=mysqli_query($Portal,"SELECT fechaReporte, COUNT(*) As valor
	FROM casos
	WHERE fechaReporte IS NOT NULL
	AND reabierto IS NULL
	GROUP BY 1;");
	while($row=mysqli_fetch_array($sql)){
		$y=date("Y", strtotime($row['fechaReporte']));
		$mes=(int)date("m", strtotime($row['fechaReporte'])); 
		if($y==$anno){
			$casos[$mes]=$casos[$mes]+$row['valor'];
		}
	}
	
	$sql2=mysqli_query($Portal,"SELECT month(fechaReporte) Mes, SLA_Calidad(cliente,fechaReporte,'$anno') '%Calidad' 
	FROM casos 
	WHERE year(fechaReporte) = '$y' 
	GROUP BY 1");
	while($row2=mysqli_fetch_array($sql2)){
		$mes2=$row2['Mes']; 
		if($y==$anno){
			$casos2[$mes2]=$casos2[$mes2]+$row2['%Calidad'];
		}
	}

	$sql3=mysqli_query($Portal,"SELECT fechaReporte, COUNT(*) As valor
	FROM casos
	WHERE fechaReporte IS NOT NULL
	AND reabierto='Si'
	GROUP BY 1");
	while($row3=mysqli_fetch_array($sql3)){
		$y=date("Y", strtotime($row3['fechaReporte']));
		$mes3=(int)date("m", strtotime($row3['fechaReporte'])); 
		if($y==$anno){
			$casos3[$mes3]=$casos3[$mes3]+$row3['valor'];
		}
	}
	
?>
<html style="zoom:90%;">
<head>
	<link rel="stylesheet" href="../dist/css/adminlte.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
   <script src="http://code.highcharts.com/highcharts.js"></script>
   <script src="https://code.highcharts.com/modules/exporting.js"></script>
</head>
<body>
	<form action="CalidadClientes" method="get">
	  <div class="container-fluid">
		<div class="row">
		  <div class="col-md-12">
			<!-- general form elements -->
			  <div class="row">
				<div class="col-md-2">
				  <div class="form-group">
					<select class="form-control form-control-sm" id="annio" name="annio" >
					  <option disabled selected hidden>Año</option>
					  <option value="2020">2020</option>
					  <option value="2019">2019</option>
					  <option value="2018">2018</option>
					</select>
				  </div>
				</div>
				<div class="col-md-3">
				  <div class="form-group">
					<select class="form-control form-control-sm" id="Cliente" name="Cliente"><?php echo $Cliente; ?></select>
				  </div>
				</div>
				<div class="col-md-2">
				  <div class="form-group">
					<select class="form-control form-control-sm" id="Producto" name="Producto"><?php echo $Producto; ?></select>
				  </div>
				</div>
				<!-- /.col -->
				<div class="col-md-3">
				  <div class="form-group">
					<button type="submit" class="btn btn-outline-primary fas fa-filter " />
					<?php if(isset($anno)){echo $anno." ";} if(isset($cliente)){echo $cliente." ";} if(isset($producto)){echo $producto;} else{ echo "";} ?>
				  </div>
				</div>
			  </div>
		  </div>
		  <div class="col-md-12">
			<div class="form-group">
			  <div id="container" style="height: 250px;"/>
			</div>
		  </div>
		</div>
	  </div>
	</form>

<script language="JavaScript">
$(function () {
    $(document).ready(function() {
	var chart;
	$('#container').highcharts({
    chart: {
        zoomType: 'xy'
    },
    title: {
        text: ''
    },
    subtitle: {
        text: '% Calidad | Casos Reabiertos'
    },
    xAxis: [{
        categories: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun',
            'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
        crosshair: true
    }],
    yAxis: [{ // Primary yAxis
		max: 100,
		min: 0,
		/*plotLines: [{
                value: 90,
                color: 'green',
                dashStyle: 'shortdash',
                width: 1,
				//label:{text:'90%'}
                }],*/
        labels: {
            format: '{value}%',
            style: {
				color: '#28a745',
                //color: Highcharts.getOptions().colors[1]
            }
        },
        title: {
            text: 'Calidad',
            style: {
				color: '#28a745',
                //color: Highcharts.getOptions().colors[1]
            }
        }
    }, { // Secondary yAxis
        title: {
            text: 'Escalados',
            style: {
				color: '#bfdcea',
                color: Highcharts.getOptions().colors[0]
            }
        },
        labels: {
            format: '{value}',
            style: {
				//color: '#bfdcea',
                color: Highcharts.getOptions().colors[0]
            }
        },
        opposite: true
    }],
	tooltip: {
        shared: true
    },
	plotOptions: {
        series: {
            stacking: 'column'
        }
    },
    /*legend: {
        layout: 'vertical',
        align: 'right',
        x: -60,
        verticalAlign: 'top',
        y: 60,	
        floating: true,
        backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || ''
    },*/
    series: [{
        name: 'Escalados',
        type: 'column',
		color: '#bfdcea',
        yAxis: 1,
        data: (function() {
                   var data = [];
                    <?php
                        if($anno!='2020'){$fecha=12;}else{$fecha=date('m');}
                        for($x=1;$x<=$fecha;$x=$x+1){
                    ?>
                    data.push(['<?php echo $meses[$x]; ?>',  <?php echo $casos[$x] ?>]);
                    <?php } ?>
                return data;
                })(),
        tooltip: {
            valueSuffix: ''
        }

    }, 
	{
        name: 'Reabiertos',
        type: 'column',
		color: '#0a1f49',
        yAxis: 1,
        data: (function() {
                   var data = [];
                    <?php
                        if($anno!='2020'){$fecha=12;}else{$fecha=date('m');}
                        for($x=1;$x<=$fecha;$x=$x+1){
                    ?>
                    data.push(['<?php echo $meses[$x]; ?>',  <?php echo $casos3[$x] ?>]);
                    <?php } ?>
                return data;
                })(),
        tooltip: {
            valueSuffix: ''
        }

    },{
        name: '%Calidad',
        type: 'spline',
		color: '#28a745',
        data: (function() {
                   var data = [];
                    <?php
                        if($anno!='2020'){$fecha=12;}else{$fecha=date('m');}
                        for($x=1;$x<=$fecha;$x=$x+1){
                    ?>
                    data.push(['<?php echo $meses[$x]; ?>',  <?php echo $casos2[$x] ?>]);
                    <?php } ?>
                return data;
                })(),
        tooltip: {
            valueSuffix: '%'
        }
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