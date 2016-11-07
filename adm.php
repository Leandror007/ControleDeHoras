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
<form name="form1" method="post" action="<?php echo 'adm.php?id='.$_GET["id"] ?>">
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
			                    <option value="">Escolha a data</option>
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

			<td width="50%"> <?php include "grafico01.php"; ?> </td>

			<td width="30%" class="corCal"> 
				<?php include "calendario.php"; ?>
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