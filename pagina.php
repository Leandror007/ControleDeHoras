<?php
    
	$Host= "localhost";  
	$Base= "tb_escalas" ;  
	$Usuario= "root" ;   
	$Senha= "" ;  
 
    mysql_connect($Host, $Usuario, $Senha);
    mysql_select_db($Base);
   
   
////////////////////////////para o menu de datas/////////////////////////////////////////////////////
	@$filtro = ($_POST["filtro"]); //filtro para busca 
	$atual = date('Y-m-01'); //input para escolher a data
	
    $sData = 'SELECT DISTINCT mesano from  tb_quadro where id_agente like "'. $_GET["id"].'"
                    order by mesano desc' ;
    $oU = mysql_query($sData);


	if($filtro == ""){

		$sQuery = "SELECT * from tb_quadro where mesano = '$atual' and id_agente = ". $_GET["id"];
		$oUsers = mysql_query($sQuery);
		$clientes = mysql_num_rows($oUsers); 

	 }else{


	 	$sQuery = "SELECT * from tb_quadro where mesano = '$filtro' and id_agente = ". $_GET["id"];
		$oUsers = mysql_query($sQuery);
		$clientes = mysql_num_rows($oUsers);


	}

?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>

<style type="text/css">
#geral{ position:absolute; top:20%; left:30%; width:80%; height:90%; margin-left:-335px; margin-top:-97px; text-align:left; border:2px solid #f00; }

.titulo{color: #FFFAFA; font-size: 25px;}

table[name="tbprincipal"].td{ width: 100px;  padding:10px; }

.folga{ background: #33ff33;}

.ferias{ background: #33CCFF;}

.outros{background: black; color: white;}

.treinar{background: #FF6600; }

.reduzi{ font-size: 10px; margin-top: -10px; position: relative; top: -5px; color: #2F4F4F;}

.finalsemana{ background: red;}

table[name='calend']{ width: 10%;}

table[name='calend'].td{ height: 25px; width: 40px; background: #f5f5f5; font: 12px verdana; text-align: center; } 

.mes{ font: bold 12px verdana; background: #FFF5EE; text-align: center; line-height: 25px; height: 25px; width: 240px;}

.semana{ font: bold 12px verdana; }

.dia{ height: 23px; width: 30px; padding-top:6px; vertical-align:middle; position:relative; }

.evento{ position: relative; font: 9px verdana; color: #C30; position:absolute; right: -2px; top: -2px;	}

#calendario{position: relative; left: 20%;}

.corCal{ background: #FFF5EE;}	

.dia{ text-align: center;}

.escolha{ position: relative; left: 20%; }

/* ------------------------------------------------------------------------------------------*/
/* ------------------------------------------------------------------------------------------*/

#menu ul{ width:90%; margin:0; background: #000; border:3px  #ffffff; }

#menu li { padding:3px 5px; background:#666666; margin-bottom:2px; font: 12px verdana, arial, helvetiva, sans-serif; }

#menu li a { display:block; color: #ffffff;	text-decoration: none; }

#menu li a:visited { color: #ffffcc; }

#menu li a:hover {  color: #000; background-color:#fff; } 

</style>

</head>
<body>
<form name="form1" method="post" action="<?php echo 'pagina.php?id='.$_GET["id"] ?>">
<div id="geral">
	<table border="1px" width="100%"  style="border-collapse:collapse" name="tbprincipal">
		<tr>
			<td bgcolor="#6699CC" bgcolor="#6699CC" class="titulo">Logo</td>

			<td bgcolor="#6699CC" class="titulo">Exemplo para tutorial</td>

			<td bgcolor="#6699CC" class="tb01"> 
			<div class="escolha">
				<table border="0px">
				<tr>
					<td class="tb01">
						<select class="form-control" name="filtro" id="filtro" type="text" >
			                    <option value="Nao">Escolha a data</option>
			                    <?php
			                        while ($oRow = mysql_fetch_object($oU)) {
			                            echo "<option value='$oRow->mesano'> $oRow->mesano </option>  ";
			                         }
			                    ?>
		                    </select>    
						</td>
							
			    		<td> <button type="submit" value="Mostrar" name="B1">Exibir</button>
			    	</td>
				</tr>    
		    	</table>	
		    </div>	
			</td>
		</tr>
		<tr>
			<td width="20%"> 
				<ul>
	        		  <li><a href="#">Link n&uacute;mero 1</a></li>
	        		  <li><a href="#">Link n&uacute;mero 2</a></li>
	    		</ul>	
			</td>

			<td width="50%"> - </td>

			<td width="30%" class="corCal"> 
<div id="calendario">		
		<!--  inicio do else if -->   
 <?php if($filtro == ""){  ?> 	


<?php

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 	$sQuery ="SELECT * from  tb_quadro where  id_agente = ". $_GET["id"];
    $oD = mysql_query($sQuery);
    $Diasm = mysql_fetch_object($oD);
  
    $mDia = array($Diasm->nr_hora1, $Diasm->nr_hora2, $Diasm->nr_hora3, $Diasm->nr_hora4, $Diasm->nr_hora5, $Diasm->nr_hora6, $Diasm->nr_hora7, $Diasm->nr_hora8, $Diasm->nr_hora9, $Diasm->nr_hora10,
    			  $Diasm->nr_hora11, $Diasm->nr_hora12, $Diasm->nr_hora13, $Diasm->nr_hora14, $Diasm->nr_hora15, $Diasm->nr_hora16, $Diasm->nr_hora17, $Diasm->nr_hora18, $Diasm->nr_hora19, $Diasm->nr_hora20,
    			  $Diasm->nr_hora21, $Diasm->nr_hora22, $Diasm->nr_hora23, $Diasm->nr_hora24, $Diasm->nr_hora25, $Diasm->nr_hora26, $Diasm->nr_hora27, $Diasm->nr_hora28, $Diasm->nr_hora29, $Diasm->nr_hora30, $Diasm->nr_hora31);

    $arrlength = count($mDia); //contar a quantidade do array

    @$datv = $Diasm->mesano;

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	@$ano = substr("$datv", 0, 4);
	$cont = 0;
	$dia = date("d");
	$dias = array();
	@$mes = substr("$datv", 5, -3);
	$totalDias = date("t");
	$primeiroDia = date("D", mktime(0, 0, 0, $mes, 1, $ano));

	$ultimo_dia = date("t", mktime(0,0,0,$mes,'01',$ano)); // Mágica, plim!
	//echo $ultimo_dia;

 
for($d = 0; $d < $totalDias; $d++)$dias[$d] = array_push($dias, $d+1);
 
switch($primeiroDia){
	case "Sun":
		$pos = 0;
	break;
 
	case "Mon":
		$pos = 1;
	break;
 
	case "Tue":
		$pos = 2;
	break;
 
	case "Wed":
		$pos = 3;
	break;
 
	case "Thu":
		$pos = 4;
	break;
 
	case "Fri":
		$pos = 5;
	break;
 
	case "Sat":
		$pos = 6;
	break;
}//Fim do switch
 
switch($mes){
	case 1:
		$mes2 = "Janeiro";
	break;
 
	case 2:
		$mes2 = "Fevereiro";
	break;
 
	case 3:
		$mes2 = "Março";
	break;
 
	case 4:
		$mes2 = "Abril";
	break;
 
	case 5:
		$mes2 = "Maio";
	break;
 
	case 6:
		$mes2 = "Junho";
	break;
 
	case 7:
		$mes2 = "Julho";
	break;
 
	case 8:
		$mes2 = "Agosto";
	break;
 
	case 9:
		$mes2 = "Setembro";
	break;
 
	case 10:
		$mes2 = "Outubro";
	break;
 
	case 11:
		$mes2 = "Novembro";
	break;
 
	case 12:
		$mes2 = "Dezembro";
	break;
}//Fim do switch
 
echo "<table border=1 cellspacing=0 cellpadding=0 name='calend'> ";
echo "<caption class='mes'><b> $mes2  $ano </b></caption>";
echo "<thead> <tr>
		<td class='finalsemana'><div class='dia semana'>D</div></td>
		<td><div class='dia semana'>S</div></td>
		<td><div class='dia semana'>T</div></td>
		<td><div class='dia semana'>Q</div></td>
		<td><div class='dia semana'>Q</div></td>
		<td><div class='dia semana'>S</div></td>
		<td class='finalsemana'><div class='dia semana'>S</div></td>
	</tr>";
 


for($linha = 0; $linha < 6; $linha++){  //if que cria as lignhas maximo 6
	echo "</thead><tbody> <tr>";
	 
	for($coluna = 0; $coluna < 7; $coluna++){ //if que cria as colunas 7 referente a cada dia da semana
		$pos2 = $cont - $pos;
 
		if(empty($dias[$pos2])){
			echo "<td><center> - </center></td>";
		}else{
			if($dias[$pos2] == $dia){

				if($dias[$pos2] <= $ultimo_dia){ //if de verificado do mes

						if($mDia[$pos2] == "folga"){ //if folga 
							print_r ("<td class='folga'> <div class='dia'>".$dias[$pos2].'<span class="evento">'.$mDia[$pos2].'</span></div>'."</td>");
						
						}//fim do if folga 
						else if($mDia[$pos2] == "ferias"){ //if ferias
							print_r ("<td class='ferias'> <div class='dia'>".$dias[$pos2].'<span class="evento">'.$mDia[$pos2].'</span></div>'."</td>");
						}//fim do if ferias
						else if($mDia[$pos2] == "outros"){ //if outros
							print_r ("<td class='outros'> <div class='dia'>".$dias[$pos2].'<span class="evento">'.$mDia[$pos2].'</span></div>'."</td>");
						
						}//fim do if ferias
						else if($mDia[$pos2] == "treinar"){ //if treinar
							print_r ("<td class='treinar'> <div class='dia'>".$dias[$pos2].'<span class="evento">'.$mDia[$pos2].'</span></div>'."</td>");
						}//fim do if ferias
						else{
							print_r ("<td bgColor='darkgray'> <div class='dia'>".$dias[$pos2].'<span class="evento">'.$mDia[$pos2].'</span></div>'."</td>");
						}


					
				}
			}else{ 
				if($dias[$pos2] <= $ultimo_dia){ //if de verificado do mes


					if($mDia[$pos2] == "folga"){//if folga 
						print_r ("<td class='folga'> <div class='dia'>".$dias[$pos2].'<span class="evento">'.$mDia[$pos2].'</span></div>'."</td>");
					}
					else if($mDia[$pos2] == "ferias"){ //if ferias
						print_r ("<td class='ferias'> <div class='dia'>".$dias[$pos2].'<span class="evento">'.$mDia[$pos2].'</span></div>'."</td>");
					}
					else if($mDia[$pos2] == "outros"){ //if outros
						print_r ("<td class='outros'> <div class='dia'>".$dias[$pos2].'<span class="evento">'.$mDia[$pos2].'</span></div>'."</td>");
					}
					else if($mDia[$pos2] == "treinar"){ //if treinar
						print_r ("<td class='treinar'> <div class='dia'>".$dias[$pos2].'<span class="evento">'.$mDia[$pos2].'</span></div>'."</td>");
					}
					else{
						print_r ("<td><center> <div class='dia'>".$dias[$pos2].'<span class="evento">'.$mDia[$pos2].'</span></div>'."</td>");
					}


				}
			}
		}//Fim do else
 
		$cont++;
	}//Fim do for
	echo "</tr> ";

}//Fim do for
 
echo "</table>";
?>


<!--  inicio do else if -->

<?php }else{  //else que faz a busca da data escolhida ?>


<?php

	@$ano = substr("$filtro", 0, 4);
	$cont = 0;
	$dia = date("d");
	$dias = array();
	@$mes = substr("$filtro", 5, -3);
	$totalDias = date("t");
	$primeiroDia = date("D", mktime(0, 0, 0, $mes, 1, $ano));

	$ultimo_dia = date("t", mktime(0,0,0,$mes,'01',$ano)); // Mágica, plim!
	//echo $ultimo_dia.'-'.@$ano.'-'.$mes.'-'.$primeiroDia;


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 	$sQuery ="SELECT * from  tb_quadro where  id_agente = ". $_GET["id"]." and  mesano = '$filtro' ";
    $oD = mysql_query($sQuery);
    $Diasm = mysql_fetch_object($oD);
  
    $mDia = array($Diasm->nr_hora1, $Diasm->nr_hora2, $Diasm->nr_hora3, $Diasm->nr_hora4, $Diasm->nr_hora5, $Diasm->nr_hora6, $Diasm->nr_hora7, $Diasm->nr_hora8, $Diasm->nr_hora9, $Diasm->nr_hora10,
    			  $Diasm->nr_hora11, $Diasm->nr_hora12, $Diasm->nr_hora13, $Diasm->nr_hora14, $Diasm->nr_hora15, $Diasm->nr_hora16, $Diasm->nr_hora17, $Diasm->nr_hora18, $Diasm->nr_hora19, $Diasm->nr_hora20,
    			  $Diasm->nr_hora21, $Diasm->nr_hora22, $Diasm->nr_hora23, $Diasm->nr_hora24, $Diasm->nr_hora25, $Diasm->nr_hora26, $Diasm->nr_hora27, $Diasm->nr_hora28, $Diasm->nr_hora29, $Diasm->nr_hora30, $Diasm->nr_hora31);

    $arrlength = count($mDia); //contar a quantidade do array

    @$datv = $Diasm->mesano;

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



 
for($d = 0; $d < $totalDias; $d++)$dias[$d] = array_push($dias, $d+1);
 
switch($primeiroDia){
	case "Sun":
		$pos = 0;
	break;
 
	case "Mon":
		$pos = 1;
	break;
 
	case "Tue":
		$pos = 2;
	break;
 
	case "Wed":
		$pos = 3;
	break;
 
	case "Thu":
		$pos = 4;
	break;
 
	case "Fri":
		$pos = 5;
	break;
 
	case "Sat":
		$pos = 6;
	break;
}//Fim do switch
 
switch($mes){
	case 1:
		$mes2 = "Janeiro";
	break;
 
	case 2:
		$mes2 = "Fevereiro";
	break;
 
	case 3:
		$mes2 = "Março";
	break;
 
	case 4:
		$mes2 = "Abril";
	break;
 
	case 5:
		$mes2 = "Maio";
	break;
 
	case 6:
		$mes2 = "Junho";
	break;
 
	case 7:
		$mes2 = "Julho";
	break;
 
	case 8:
		$mes2 = "Agosto";
	break;
 
	case 9:
		$mes2 = "Setembro";
	break;
 
	case 10:
		$mes2 = "Outubro";
	break;
 
	case 11:
		$mes2 = "Novembro";
	break;
 
	case 12:
		$mes2 = "Dezembro";
	break;
}//Fim do switch
 
echo "<table border=1 cellspacing=0 cellpadding=0 name='calend'>";
echo "<caption class='mes'><b> $mes2  $ano </b></caption>";
echo "<thead> <tr>
		<td class='finalsemana'><div class='dia semana'>D</div></td>
		<td><div class='dia semana'>S</div></td>
		<td><div class='dia semana'>T</div></td>
		<td><div class='dia semana'>Q</div></td>
		<td><div class='dia semana'>Q</div></td>
		<td><div class='dia semana'>S</div></td>
		<td class='finalsemana'><div class='dia semana'>S</div></td>
	</tr>";
 
 


for($linha = 0; $linha < 6; $linha++){  //if que cria as lignhas maximo 6
	echo "</thead><tbody> <tr>";
	 
	for($coluna = 0; $coluna < 7; $coluna++){ //if que cria as colunas 7 referente a cada dia da semana
		$pos2 = $cont - $pos;
 
		if(empty($dias[$pos2])){
			echo "<td><center> - </center></td>";
		}else{
			if($dias[$pos2] == $dia){

				if($dias[$pos2] <= $ultimo_dia){ //if de verificado do mes

						if($mDia[$pos2] == "folga"){ //if folga 
							print_r ("<td class='folga'> <div class='dia'>".$dias[$pos2].'<span class="evento">'.$mDia[$pos2].'</span></div>'."</td>");
						
						}//fim do if folga 
						else if($mDia[$pos2] == "ferias"){ //if ferias
							print_r ("<td bgColor='darkgray' class='ferias'><div class='dia'>".$dias[$pos2].'<span class="evento">'.$mDia[$pos2].'</span></div>'."</td>");
						}//fim do if ferias
						else if($mDia[$pos2] == "outros"){ //if outros
							print_r ("<td bgColor='darkgray' class='outros'><div class='dia'>".$dias[$pos2].'<span class="evento">'.$mDia[$pos2].'</span></div>'."</td>");
						}//fim do if ferias
						else if($mDia[$pos2] == "treinar"){ //if treinar
							print_r ("<td bgColor='darkgray' class='treinar'><div class='dia'>".$dias[$pos2].'<span class="evento">'.$mDia[$pos2].'</span></div>'."</td>");
						}//fim do if ferias
						else{
							print_r ("<td bgColor='darkgray'><div class='dia'>".$dias[$pos2].'<span class="evento">'.$mDia[$pos2].'</span></div>'."</td>");
						}


					
				}
			}else{ 
				if($dias[$pos2] <= $ultimo_dia){ //if de verificado do mes


					if($mDia[$pos2] == "folga"){//if folga 
						print_r ("<td class='folga'><div class='dia'>".$dias[$pos2].'<span class="evento">'.$mDia[$pos2].'</span></div>'."</td>");
					}
					else if($mDia[$pos2] == "ferias"){ //if ferias
						print_r ("<td class='ferias'><div class='dia'>".$dias[$pos2].'<span class="evento">'.$mDia[$pos2].'</span></div>'."</td>"); 
					}
					else if($mDia[$pos2] == "outros"){ //if outros
						print_r ("<td class='outros'><div class='dia'>".$dias[$pos2].'<span class="evento">'.$mDia[$pos2].'</span></div>'."</td>");
					}
					else if($mDia[$pos2] == "treinar"){ //if treinar
						print_r ("<td class='treinar'><div class='dia'>".$dias[$pos2].'<span class="evento">'.$mDia[$pos2].'</span></div>'."</td>");
					}
					else{
						print_r ("<td><center><div class='dia'>".$dias[$pos2].'<span class="evento">'.$mDia[$pos2].'</span></div>'."</td>");
					}


				}
			}
		}//Fim do else
 
		$cont++;
	}//Fim do for
	echo "</tr> ";

}//Fim do for
 
echo "</table>";
?>


<?php }//encerra o if do filtro ?>		

</div>

			</td>
		</tr>

		<tr>
			<td> - </td>
			<td> - </td>
			<td> 
				<div id="menu">
					<ul>
	        		  <li><a href="#">Quantidade de Horas feitas: 50 horas </a></li>
	        		  <li><a href="#">Quantidade de folgas tiradas: 30 horas</a></li>
	        		  <li><a href="#">Quantidade de horas restantes: 30 horas</a></li>
	    			</ul>
	    		</div>
			</td>
		</tr>

		<tr>
			<td> - </td>
			<td> - </td>
			<td> - </td>
		</tr>

		<tr>
			<td colspan="3" bgcolor="#6699CC"> <div align="center"><font color="#FFFF00" size="5" face="Courier New, Courier, mono">&copy; <font size="1">- Copyright 2016 Todos os direitos reservados</font> </font></div> </td>			
		</tr>
	</table>
</div>
</form>
</body>
</html>