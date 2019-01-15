<?php

/*
echo "<pre>----";
print_r($_POST);

echo "----</pre>";
echo "<pre>----";
print_r($_GET);

echo "----</pre>";
*/

  //API PARA OBTENER LOS HINCHAS DE UN CLUB
    $ch = curl_init("http://api.apptorneofox.com/api/hinchas_club"); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); 
    curl_setopt($ch, CURLOPT_POST, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    $output = curl_exec($ch);   
    curl_close($ch);
    $data = json_decode($output);
    //Ver el Resultado del API
    /*
      foreach ($data->data as $equipo ) {
      ?>
        <h2 align="center">VALOR DEL OBJETO</h2>
        <h3>Nombre : <?php echo $equipo->nombre ;  ?></h3>
        <h3>Escudo: <img style="height: 15%;"  src="<?php echo $equipo->escudo ;?>" alt=""></h3>
        <h3>Cantidad de hinchas: <?php  echo $equipo->hinchas ;?></h3>
        <hr>
      <?php
       
      }
      //FIN DE API PARA OBTENER HINCHAS DE UN CLUB
       return 1;
    */     
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Hinchas</title>
		<meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1" user-scalable="no">
	<style>
        <?php
            if(!$_GET['i']){
            echo " #container { min-height: 1990px; }";
            }
        ?>
	</style>
        <link rel="stylesheet" type="text/css" href="style.css" />
	</head>


<?php
	//base de datos
        $DB_SERVER = "awsfcf2waysports.co6n6hotu5cp.us-east-1.rds.amazonaws.com";
        $DB_USER = "admin";
        $DB_PASSWORD = "Shok7788!";
        $DB = "torneofox_produccion";
        mysql_query("SET NAMES 'utf8'");
        mysql_query("SET CHARACTER SET utf8 ");
        $link=mysql_connect($DB_SERVER, $DB_USER, $DB_PASSWORD) or die(mysql_error());
        mysql_select_db($DB) or die(mysql_error());
    // FIN base de datos

	//funciones
	include("funciones.php");
	//Fin funciones


date_default_timezone_set('America/Bogota');
//  idusurio
if($_GET['idusuario']){
    $idusuario=$_GET['idusuario'];
}
elseif($_GET['Idusuario']){
    $idusuario=$_GET['Idusuario'];
}
else{
    $idusuario=$_POST['idusuario'];
}

	//ACTUALIZAR
        if($_POST['predecir']){
            include("actualizar.php");
        echo "<h3 class=\"resultados_actualizados\">Resultados Actualizados<h3>";
        }
    //FIN Actualizar

    $query3="select * from polla_config";
    $result3 = mysql_query($query3);
    $config = mysql_fetch_array($result3);

?>
<body>


<!– Define si hay instrucciones o muestra los resultados–>
	<?php 
	    $instrucciones_html="<div class=\"instrucciones\">
		<img src=\"https://s3.amazonaws.com/torneofox-dev/posts/Instrucciones_polla_FOX.jpg\">
		</div>";
		if(!$_GET['i'])  
		{
			echo $instrucciones_html;
		
		}else{ 
	?> 
<!– FIN Define si hay instrucciones o muestra los resultados–>
    

    <div id="container">

        <!– INICIO DE LA POLLA LISTADO–>
          <div class="bg">
       	  <form   method="POST">
          <table  cellspacing="0" cellpadding="0">

       <?php
       		   //valida si hay fechas 
                  $query="select * from polla_fechas as a, polla_partidos as b where a.activo=1 and a.id=b.id_fecha order by b.fecha_partido ASC ";

                  $result = mysql_query($query);

                  if(mysql_num_rows($result)==0){
                  echo "
                  <div class=\"column\">
                  <h5 class=\"haz\">Espera Proximos encuentros...</h5>
                  </div>
                  </table>
                  ";
                 //valida si hay fechas Imprime resultados
                 }else{

$datem3=date("Y-m-d H:i:s", time());

while ($row = mysql_fetch_array($result)){

$ahora=strtotime("now");
$ahora+=600; //10 minutos para cerrar los partidos
date("Y-m-d H:i:s", $ahora);

if($ahora>=strtotime($row['fecha_partido'])){
$disable='disabled';
}else{
$disable='';
} //desactiva el partido si empieza dentro de 10 minutos
   
	

	echo "<tr >
		<td class=\"local\">
		    <span id=\"imagen\">
		    <img src=\"".imagen($row['equipo_l'])."\" width=\"80px\" height=\"80px\">
		    </span>
        </td>
        <td> 
         <div class=\"progress-pie-chart\" data-percent=\"15\">
                <div class=\"ppc-progress\">
                    <div class=\"ppc-progress-fill\"></div>
                </div>
                <div class=\"ppc-percents\">
                    <div class=\"pcc-percents-wrapper\">
                    <span>%</span>
                    </div>
                 </div>
                </div></td>
				    <td class=\"visitante\" >
				         <span id=\"imagen\">
				         <img src=\"".imagen($row['equipo_v'])."\" width=\"70px\" height=\"70px\">
				        </span>
                    </td>
                    <td> 
         <div class=\"progress-pie-chart\" data-percent=\"25\">
                <div class=\"ppc-progress\">
                    <div class=\"ppc-progress-fill red\"></div>
                </div>
                <div class=\"ppc-percents\">
                    <div class=\"pcc-percents-wrapper\">
                    <span>%</span>
                    </div>
                 </div>
                </div></td>             
				    </tr>   
				    
				 ";
                   
	}//fin While listado equipos



  $hidden="<input type=\"hidden\" name=\"idusuario\" value=\"".$idusuario."\"><input type=\"hidden\" name=\"i\" value=\"1\">";

  
 																					}  //valida si hay fechas Imprime resultados               
?>                    
            </form>
        </div><!– Encapsulado polla–>



			<?php
            }// fin instrucciones
           
			?>

    <script src="index.js"></script>
    <script>
        $(function(){
            var $ppc = $('.progress-pie-chart'),
                percent = parseInt($ppc.data('percent')),
                deg = 360*percent/100;
            if (percent > 50) {
                $ppc.addClass('gt-50');
            }
            $('.ppc-progress-fill').css('transform','rotate('+ deg +'deg)');
            $('.ppc-percents span').html(percent+'%');
        });
    
    </script>

  </body>
</html>