<?php require_once('../connections/Portal.php'); ?>
<?php 
	
	$anno=date('Y');
	$y=date('Y');
		
	if(isset($_POST['selVal'])){
		$anno=$_POST['selVal'];
		$y=$_POST['selVal'];
	}

	$meses = array('','Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
	for($x=1;$x<=12;$x=$x+1){
		$casos[$x]=0;
		$casos2[$x]=0;
	}
	
	
	$sql=mysqli_query($Portal,"SELECT month(fechaReporte) Mes,
case month(fechaReporte)
when 1 then '719:36'
when 2 then (select timediff('720:00', sec_to_time(sum(time_to_sec((timediff(fechaSolucion,fechaReporte)))))) from casos
where month(fechaReporte) = 2 and (prioridad ='Alta') and year(fechaReporte) = '$y')
when 3 then (select timediff('720:00', sec_to_time(sum(time_to_sec((timediff(fechaSolucion,fechaReporte)))))) from casos
where month(fechaReporte) = 3 and (prioridad ='Alta') and year(fechaReporte) = '$y')
when 4 then '719:55'
when 5 then '719:36'
when 6 then (select timediff('720:00', sec_to_time(sum(time_to_sec((timediff(fechaSolucion,fechaReporte)))))) from casos
where month(fechaReporte) = 6 and (prioridad ='Alta') and year(fechaReporte) = '$y')
when 7 then (select timediff('720:00', sec_to_time(sum(time_to_sec((timediff(fechaSolucion,fechaReporte)))))) from casos
where month(fechaReporte) = 7 and (prioridad ='Alta') and year(fechaReporte) = '$y')
when 8 then (select timediff('720:00', sec_to_time(sum(time_to_sec((timediff(fechaSolucion,fechaReporte)))))) from casos
where month(fechaReporte) = 8 and (prioridad ='Alta') and year(fechaReporte) = '$y')
when 9 then (select timediff('720:00', sec_to_time(sum(time_to_sec((timediff(fechaSolucion,fechaReporte)))))) from casos
where month(fechaReporte) = 9 and (prioridad ='Alta') and year(fechaReporte) = '$y')
when 10 then '716:00'
when 11 then '719:36'
when 12 then '719:36'
end as valor
from casos where year(fechaReporte) = '$y' group by 1;");
	while($row=mysqli_fetch_assoc($sql)){
		$mes=$row['Mes'];
		if($y==$anno){
			$casos[$mes]=$casos[$mes]+date('h',(strtotime($row['valor'])));
		}
	}

	$sql2=mysqli_query($Portal,"select month(fechaReporte) Mes,
case month(fechaReporte)
when 1 then '719:36'
when 2 then (select timediff('720:00', sec_to_time(sum(time_to_sec((timediff(fechaSolucion,fechaReporte)))))) from casos
where month(fechaReporte) = 2 and (prioridad ='Alta') and year(fechaReporte) = '$y')
when 3 then (select timediff('720:00', sec_to_time(sum(time_to_sec((timediff(fechaSolucion,fechaReporte)))))) from casos
where month(fechaReporte) = 3 and (prioridad ='Alta') and year(fechaReporte) = '$y')
when 4 then '719:55'
when 5 then '719:36'
when 6 then (select timediff('720:00', sec_to_time(sum(time_to_sec((timediff(fechaSolucion,fechaReporte)))))) from casos
where month(fechaReporte) = 6 and (prioridad ='Alta') and year(fechaReporte) = '$y')
when 7 then (select timediff('720:00', sec_to_time(sum(time_to_sec((timediff(fechaSolucion,fechaReporte)))))) from casos
where month(fechaReporte) = 7 and (prioridad ='Alta') and year(fechaReporte) = '$y')
when 8 then (select timediff('720:00', sec_to_time(sum(time_to_sec((timediff(fechaSolucion,fechaReporte)))))) from casos
where month(fechaReporte) = 8 and (prioridad ='Alta') and year(fechaReporte) = '$y')
when 9 then (select timediff('720:00', sec_to_time(sum(time_to_sec((timediff(fechaSolucion,fechaReporte)))))) from casos
where month(fechaReporte) = 9 and (prioridad ='Alta') and year(fechaReporte) = '$y')
when 10 then '716:00'
when 11 then '719:36'
when 12 then '719:36'
end as valor
from casos where year(fechaReporte) = '$y' group by 1;");
	while($row2=mysqli_fetch_array($sql2)){
		$mes2=$row2['Mes'];
		if($y==$anno){
			$casos2[$mes2]=$casos2[$mes2]+date('h.i',(strtotime($row2['valor'])));
		}
	}

	
?>