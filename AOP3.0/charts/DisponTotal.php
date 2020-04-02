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
		
	$sqlQuery="SELECT month(fechaReporte) Mes,
		case month(fechaReporte)
		when 1 then ifnull((select TIME_FORMAT(timediff('720:00:00', sec_to_time(sum(time_to_sec((timediff(fechaSolucion,fechaReporte)))))), '%H') from casos
		where month(fechaReporte) = 1 and (prioridad ='Alta') ".$sqlAnnio.$sqlCliente.$sqlProducto."),720)
		when 2 then ifnull((select TIME_FORMAT(timediff('720:00:00', sec_to_time(sum(time_to_sec((timediff(fechaSolucion,fechaReporte)))))), '%H') from casos
		where month(fechaReporte) = 2 and (prioridad ='Alta') ".$sqlAnnio.$sqlCliente.$sqlProducto."),720)
		when 3 then ifnull((select TIME_FORMAT(timediff('720:00:00', sec_to_time(sum(time_to_sec((timediff(fechaSolucion,fechaReporte)))))), '%H') from casos
		where month(fechaReporte) = 3 and (prioridad ='Alta') ".$sqlAnnio.$sqlCliente.$sqlProducto."),720)
		when 4 then ifnull((select TIME_FORMAT(timediff('720:00:00', sec_to_time(sum(time_to_sec((timediff(fechaSolucion,fechaReporte)))))), '%H') from casos
		where month(fechaReporte) = 4 and (prioridad ='Alta') ".$sqlAnnio.$sqlCliente.$sqlProducto."),720)
		when 5 then ifnull((select TIME_FORMAT(timediff('720:00:00', sec_to_time(sum(time_to_sec((timediff(fechaSolucion,fechaReporte)))))), '%H') from casos
		where month(fechaReporte) = 5 and (prioridad ='Alta') ".$sqlAnnio.$sqlCliente.$sqlProducto."),720)
		when 6 then ifnull((select TIME_FORMAT(timediff('720:00:00', sec_to_time(sum(time_to_sec((timediff(fechaSolucion,fechaReporte)))))), '%H') from casos
		where month(fechaReporte) = 6 and (prioridad ='Alta') ".$sqlAnnio.$sqlCliente.$sqlProducto."),720)
		when 7 then ifnull((select TIME_FORMAT(timediff('720:00:00', sec_to_time(sum(time_to_sec((timediff(fechaSolucion,fechaReporte)))))), '%H') from casos
		where month(fechaReporte) = 7 and (prioridad ='Alta') ".$sqlAnnio.$sqlCliente.$sqlProducto."),720)
		when 8 then ifnull((select TIME_FORMAT(timediff('720:00:00', sec_to_time(sum(time_to_sec((timediff(fechaSolucion,fechaReporte)))))), '%H') from casos
		where month(fechaReporte) = 8 and (prioridad ='Alta') ".$sqlAnnio.$sqlCliente.$sqlProducto."),720)
		when 9 then ifnull((select TIME_FORMAT(timediff('720:00:00', sec_to_time(sum(time_to_sec((timediff(fechaSolucion,fechaReporte)))))), '%H') from casos
		where month(fechaReporte) = 9 and (prioridad ='Alta') ".$sqlAnnio.$sqlCliente.$sqlProducto."),720)
		when 10 then ifnull((select TIME_FORMAT(timediff('720:00:00', sec_to_time(sum(time_to_sec((timediff(fechaSolucion,fechaReporte)))))), '%H') from casos
		where month(fechaReporte) = 10 and (prioridad ='Alta') ".$sqlAnnio.$sqlCliente.$sqlProducto."),720)
		when 11 then ifnull((select TIME_FORMAT(timediff('720:00:00', sec_to_time(sum(time_to_sec((timediff(fechaSolucion,fechaReporte)))))), '%H') from casos
		where month(fechaReporte) = 11 and (prioridad ='Alta') ".$sqlAnnio.$sqlCliente.$sqlProducto."),720)
		when 12 then ifnull((select TIME_FORMAT(timediff('720:00:00', sec_to_time(sum(time_to_sec((timediff(fechaSolucion,fechaReporte)))))), '%H') from casos
		where month(fechaReporte) = 12 and (prioridad ='Alta') ".$sqlAnnio.$sqlCliente.$sqlProducto."),720)
		end as valor
		from casos group by 1;";
		$sql=mysqli_query($Portal,$sqlQuery);
	while($row=mysqli_fetch_assoc($sql)){
		$mes=$row['Mes'];
		if($y==$anno){
			$casos[$mes]=$casos[$mes]+$row['valor'];
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

	<form action="DisponTotal" method="get">
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
			  <div id="container" style="height: 270px;"/>
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
		type: 'area'
    },
    title: {
        text: ''
    },
	subtitle: {
        text: '% Disponibilidad Productos'
    },
    xAxis: {
        categories: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic']
    },
    yAxis: [{
		//max: 850,
		//min:300,
		plotLines: [{
			value: 712.8,
			color: '#ffc107',
			dashStyle: 'shortdash',
			width: 2,
			label:{text:'99% (712.8 hrs)',y: -15},
			//label:{text:'99% (712.8 hrs)',y: -15,style:{fontWeight: 'bold'}},
			zIndex: 5 //line above all
		}],
		labels: {
            format: '{value} hrs.'
		},
        title: {
            text: 'Disponibilidad Horas'
        }
    },{
		max: 150,
		min: 0,
		title: {
            text: '',
            style: {
                color: Highcharts.getOptions().colors[0]
            }
        },
        labels: {
            format: '{value}%',
            style: {
                color: Highcharts.getOptions().colors[0]
            }
        },
		opposite: true
    }],
    tooltip: {
		formatter: function() {
			var pcnt = (this.y / 720) * 100;
			return '<b>' + this.y + ' hrs.' + '</b>' + ' (' + Highcharts.numberFormat(pcnt,2,',') + '%)';
			//'<span style="color:{series.color}">{series.name}</span>: <b>{point.y} hrs.</b> <br/>';
		}
		//pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y} hrs.</b> ({point.y:.2f}%)<br/>',
    },
	plotOptions: {
        area: {
            //pointStart: 1940,
            marker: {
                enabled: false,
                symbol: 'circle',
                radius: 2,
                states: {
                    hover: {
                        enabled: true
                    }
                }
            }
        }
    },
    series: [{
        name: 'Disponibilidad',
		//color: 'rgba(10,31,73, 0.1)',//#0a1f49
		fillOpacity: 0.2,
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