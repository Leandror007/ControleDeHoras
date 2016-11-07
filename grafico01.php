<?php
    
	$Host= "localhost";  
	$Base= "tb_escalas" ;  
	$Usuario= "root" ;   
	$Senha= "" ;  
 
    mysql_connect($Host, $Usuario, $Senha);
    mysql_select_db($Base);  
?>


<?php if($filtro == ""){  ?> 	


<?php

    $mesatual = date("m"); //mes atual de referencia
    $dia = date("d"); //dia atual

    @$ano = substr("$datv", 0, 4);
	$cont = 0;
	
	$dias = array();
	@$mes = substr("$datv", 5, -3);
	$totalDias = date("t", mktime(0,0,0,$mes,'01',$ano));
	$primeiroDia = date("D", mktime(0, 0, 0, $mes, 1, $ano));

	$ultimo_dia = date("t", mktime(0,0,0,$mes,'01',$ano)); // Mágica, plim!

echo $ultimo_dia;
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 	$sQuery ="SELECT * from  tb_quadro where  id_agente = ". $_GET["id"];
    $oD = mysql_query($sQuery);
    $Diasm = mysql_fetch_object($oD);
  
    $nr_hora = array($Diasm->nr_hora1, $Diasm->nr_hora2, $Diasm->nr_hora3, $Diasm->nr_hora4, $Diasm->nr_hora5, $Diasm->nr_hora6, $Diasm->nr_hora7, $Diasm->nr_hora8, $Diasm->nr_hora9, $Diasm->nr_hora10,
    			  $Diasm->nr_hora11, $Diasm->nr_hora12, $Diasm->nr_hora13, $Diasm->nr_hora14, $Diasm->nr_hora15, $Diasm->nr_hora16, $Diasm->nr_hora17, $Diasm->nr_hora18, $Diasm->nr_hora19, $Diasm->nr_hora20,
    			  $Diasm->nr_hora21, $Diasm->nr_hora22, $Diasm->nr_hora23, $Diasm->nr_hora24, $Diasm->nr_hora25, $Diasm->nr_hora26, $Diasm->nr_hora27, $Diasm->nr_hora28, $Diasm->nr_hora29, $Diasm->nr_hora30, $Diasm->nr_hora31);
 
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$countfolga = 0;
$countferias = 0;
$counttreinar = 0;
$countoutros = 0;
$counttrabalho = 0;

for($posicao = 0; $posicao < count($nr_hora); $posicao++){
//	echo   $posicao . " e " . $nr_hora[$posicao]. " <br> ";
	if($nr_hora[$posicao] == 'folga'){
			$countfolga++;
	}
	else if($nr_hora[$posicao] == 'ferias'){
			$countferias++;
	}
	else if($nr_hora[$posicao] == 'treinar'){
			$counttreinar++;
	}
	else if($nr_hora[$posicao] == 'outros'){
			$countoutros++;
	}

	else{
		$counttrabalho++;
	}

}   

?>


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
       

<script type="text/javascript">
       google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Trabalha',  	<?php  echo $counttrabalho;  ?>],
          ['Treinamento', 	<?php  echo $counttreinar;  ?>],
          ['Folga',  		<?php  echo $countfolga;  ?>],
          ['Ferias', 		<?php  echo $countferias;  ?>],
          ['Outros',    	<?php  echo $countoutros;  ?>]
        ]);

        var options = {
          title: 'Registro Mes'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
</script>

<div id="piechart" style="width: 700px; height: 300px;"></div>

<?php

	echo "Dias Trabalhados: ".$counttrabalho."<br>";
 	echo "Dias de Folga: ".$countfolga."<br>";
	echo "Dias de Ferias: ".$countferias."<br>";
	echo "Dias de treinamento: ".$counttreinar."<br>";
	echo "Outros eventos:".$countoutros."<br>";	

?>


<?php }else{  //else que faz a busca da data escolhida ?>


<?php

	@$ano = substr("$filtro", 0, 4);
	$cont = 0;
	$dia = date("d");
	$dias = array();
	@$mes = substr("$filtro", 5, -3);
	$totalDias = date("t", mktime(0,0,0,$mes,'01',$ano));
	$primeiroDia = date("D", mktime(0, 0, 0, $mes, 1, $ano));

	$ultimo_dia = date("t", mktime(0,0,0,$mes,'01',$ano)); // Mágica, plim!

echo $ultimo_dia;
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 	$sQuery ="SELECT * from  tb_quadro where  id_agente = ". $_GET["id"]." and  mesano = '$filtro' ";
    $oD = mysql_query($sQuery);
    $Diasm = mysql_fetch_object($oD);
  
    $nr_hora = array($Diasm->nr_hora1, $Diasm->nr_hora2, $Diasm->nr_hora3, $Diasm->nr_hora4, $Diasm->nr_hora5, $Diasm->nr_hora6, $Diasm->nr_hora7, $Diasm->nr_hora8, $Diasm->nr_hora9, $Diasm->nr_hora10,
    			  $Diasm->nr_hora11, $Diasm->nr_hora12, $Diasm->nr_hora13, $Diasm->nr_hora14, $Diasm->nr_hora15, $Diasm->nr_hora16, $Diasm->nr_hora17, $Diasm->nr_hora18, $Diasm->nr_hora19, $Diasm->nr_hora20,
    			  $Diasm->nr_hora21, $Diasm->nr_hora22, $Diasm->nr_hora23, $Diasm->nr_hora24, $Diasm->nr_hora25, $Diasm->nr_hora26, $Diasm->nr_hora27, $Diasm->nr_hora28, $Diasm->nr_hora29, $Diasm->nr_hora30, $Diasm->nr_hora31);
 
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


?>

<?php	
   
$countfolga = 0;
$countferias = 0;
$counttreinar = 0;
$countoutros = 0;
$counttrabalho = 0;

for($posicao = 0; $posicao < count($nr_hora); $posicao++){
echo $posicao." - ";
if($posicao <= $ultimo_dia){

	if($nr_hora[$posicao] == 'folga'){
			$countfolga++;
	}
	else if($nr_hora[$posicao] == 'ferias'){
			$countferias++;
	}
	else if($nr_hora[$posicao] == 'treinar'){
			$counttreinar++;
	}
	else if($nr_hora[$posicao] == 'outros'){
			$countoutros++;
	}

	else{
		$counttrabalho++;
	}

}else{

}

}   

?>


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
       

<script type="text/javascript">
       google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Trabalha',  	<?php  echo $counttrabalho;  ?>],
          ['Treinamento', 	<?php  echo $counttreinar;  ?>],
          ['Folga',  		<?php  echo $countfolga;  ?>],
          ['Ferias', 		<?php  echo $countferias;  ?>],
          ['Outros',    	<?php  echo $countoutros;  ?>]
        ]);

        var options = {
          title: 'Registro Mes'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
</script>

<div id="piechart" style="width: 700px; height: 300px;"></div>

<?php

	echo "Dias Trabalhados: ".$counttrabalho."<br>";
 	echo "Dias de Folga: ".$countfolga."<br>";
	echo "Dias de Ferias: ".$countferias."<br>";
	echo "Dias de treinamento: ".$counttreinar."<br>";
	echo "Outros eventos:".$countoutros."<br>";	

?>


<?php } ?>
