<?php
/*
echo "<pre>----";
print_r($_POST);

echo "----</pre>";
echo "<pre>----";
print_r($_GET);

echo "----</pre>";
*/
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Polla</title>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1" user-scalable="no">
			<style><?php if(!$_GET['i']){ echo " #container { min-height: 1990px; }"; } ?> </style>
			<link rel="stylesheet" type="text/css" href="estilos.css"  />
            <link rel="stylesheet" type="text/css" href="style.css"  />
		</head>
<?php
	//Base de datos
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

    //FIN Actualizar

    $query3="select * from polla_config";
    $result3 = mysql_query($query3);
    $config = mysql_fetch_array($result3);
?>
<body>


        
<!– INICIO DE LA POLLA LISTADO–>

    <div class="polla">
        <form  action="index.php?i=1" method="POST">
            <table>
            <?php
            echo "
            <tr>
                <td class=\"local\">". nombre($row['equipo_l'])."<br>
                    <span id=\"imagen\">
                        <img src=\"".imagen($row['equipo_l'])."\" width=\"70px\" height=\"70px\">
                    </span>
                </td>
            </tr>";
            
            ?>
            


            </table>
        </form>
    </div><!– Encapsulado polla–>
	
  </body>
</html>