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
	$totalDias = date("t", mktime(0,0,0,$mes,'01',$ano));
	$primeiroDia = date("D", mktime(0, 0, 0, $mes, 1, $ano));

	$ultimo_dia = date("t", mktime(0,0,0,$mes,'01',$ano)); // Mágica, plim!

	//echo $ultimo_dia.'-'.$totalDias;

 
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
	$totalDias = date("t", mktime(0,0,0,$mes,'01',$ano));
	$primeiroDia = date("D", mktime(0, 0, 0, $mes, 1, $ano));

	$ultimo_dia = date("t", mktime(0,0,0,$mes,'01',$ano)); // Mágica, plim!
	//echo $ultimo_dia.'-'.@$ano.'-'.$mes.'-'.$primeiroDia;
	//echo $ultimo_dia.'-'.$totalDias;

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
