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
	}
	
	$sql=mysqli_query($Portal,"SELECT month(fechaReporte) Mes, SLA_Efectividad('$cliente',fechaReporte,'$anno',producto) '%Efectividad' FROM casos 
	WHERE year(fechaReporte) = '$y' group by 1;");
	while($row=mysqli_fetch_array($sql)){
		$mes=$row['Mes']; 
		if($y==$anno){
			$casos[$mes]=$casos[$mes]+$row['%Efectividad'];
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

	<form action="Efectividad" method="get">
	  <div class="container-fluid">
		<div class="row">
		  <div class="col-md-12">
			<!-- general form elements -->
			  <div class="row">
				<div class="col-md-2">
				  <div class="form-group">
					<select class="form-control form-control-sm" id="annio" name="annio" >
					  <option value="2020">2020</option>
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
				<div class="col-md-2">
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
			  <!--div id="container" style="width: 100%; height: 100%; margin: 0 auto"></div-->
			</div>
		  </div>
		</div>
	  </div>
	</form>

<!--div id="container" style="width: 100%; height: 100%; margin: 0 auto"></div-->
<script language="JavaScript">
$(function () {
    $(document).ready(function() {
	var chart;
	$('#container').highcharts({
	    chart: {
        type: 'spline'
    },
    title: {
        text: ''
    },
    subtitle: {
        text: '% Efectividad | Productos Clientes'
    },
    xAxis: {
        categories: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic']
    },
    yAxis: {
		max:100,
		labels: {
		format: '{value}%'
		},
        title: {
            text: 'Efectividad'
        }
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: false
            },
            enableMouseTracking: true
        }
    },
    series: [{
        name: 'Efectividad',
		color: '#00417a',
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
			valueSuffix: '%'
			}}],
	credits: {
            enabled: false
    }
});
});
});
</script>
</body>
</html>