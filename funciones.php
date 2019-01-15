<?php

function nombre($id)
{
    
  $query = "select * from equipos where id=$id";
    
    
    $result2 = mysql_query($query);
    $row     = mysql_fetch_array($result2);
    
    return utf8_encode($row['nombre']);
}
function marcador($id, $equipo, $id_usuario)
{
    
     $query = "select * from polla_pronostico where id_partido=$id and id_usuario=$id_usuario";
    
    
    $result2 = mysql_query($query);
    $row     = mysql_fetch_array($result2);

    if($equipo=='l'){
        if($row['m_l']==''){
        $row['m_l']='';
        }
    
    return $row['m_l'];
    
    }else{
    if($row['m_v']==''){
        $row['m_v']='';
        }
    return $row['m_v'];    
    }
    
    
}
function imagen($id)
{
    
 $query = "select * from equipos where id=$id";
    
    
    $result2 = mysql_query($query);
    $row     = mysql_fetch_array($result2);
    
return  "https://d1eq3zzbvm027z.cloudfront.net/equipos/".$row['bandera'];

    
    
} 

function jugadores_img($id){
    
$query = "select * from jugadores where id=$id";
    
    
    $result222 = mysql_query($query);
    $row     = mysql_fetch_array($result222);
    if($row['foto']){ 
    $imagen="<img src=\"http://colombia-prod.s3-website-us-east-1.amazonaws.com/jugadores/".$row['foto']."\" width=\"30px\" height=\"30px\">";
    return  $imagen;
    }else{
    return '';}

}
 
/////////////////////////////////////////////////// 
//Convierte fecha de mysql a español 
//////////////////////////////////////////////////// 
function cambiaf_mysql($fechadb){
//vamos a suponer que recibmos el formato MySQL básico de YYYY-MM-DD
//lo primero es separar cada elemento en una variable
    list($yy,$mm,$dd)=explode("-",$fechadb);
//si viniera en otro formato, adaptad el explode y el orden de las variables a lo que necesitéis
//creamos un objeto DateTime (existe desde PHP 5.2)
    $fecha = new DateTime();
//definimos la fecha pasándole las variabes antes extraídas
        $fecha->setDate($yy, $mm, $dd);
//y ahora el propio objeto nos permite definir el formato de fecha para imprimir que queramos       
    return $fecha->format('d/m/Y');
}


?>