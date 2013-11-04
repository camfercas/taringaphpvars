<?
// Funcion base para recortar codigo fuente de taringa
function Obtener_contenidos($url,$inicio='',$final){
$source = @file_get_contents($url)or die('se ha producido un error');
$posicion_inicio = strpos($source, $inicio) + strlen($inicio);
$posicion_final = strpos($source, $final) - $posicion_inicio;
$found_text = substr($source, $posicion_inicio, $posicion_final);
return $inicio . $found_text .$final;
}

// // // // // // // // // // //
// FUNCIONES DATOS DE USUARIO //
// // // // // // // // // // //

//Obtener Nombre
function tNombre($i)
{
$url = 'http://www.taringa.net/'.$i.'';
    $nombreVar = Obtener_contenidos($url,'<span class="fn">','<span class="nickname">');
$nombre = substr($nombreVar, 17, -73);
return $nombre;
}
//Obtener URL del avatar
function tAvatar($i)
{
$url = 'http://www.taringa.net/'.$i.'';
    $avatarVar = Obtener_contenidos($url,'<img class="photo" src="','<!-- ava -->');
$avatar = substr($avatarVar, 24, -37);
return $avatar;
}
//Obtener Pais
function tPais($i)
{
$url = 'http://www.taringa.net/'.$i.'';
    $paisVar = Obtener_contenidos($url,'<span class="country-name">','<span class="bio clearfix">');
$pais = substr($paisVar, 27, -51);
return $pais;
}
//Obtener Rango
function tRango($i)
{
$url = 'http://www.taringa.net/'.$i.'';
    $rangoVar = Obtener_contenidos($url,'<span class="role">','<span>Rango</span>');
$rango = substr($rangoVar, 27, -44);
return $rango;
}
//Obtener Online
function tOnline($i)
{
$url = 'http://www.taringa.net/'.$i.'';
$onlineVar = Obtener_contenidos($url,'background-position: 0 -792px','<span>Puntos</span>');
$online = substr($onlineVar, 38, -93);
//Online = user
//Onlin  = moderador/admin/desarrollador
if($online == "Online" or $online == "Onlin"){
$estado = "on";
}else{
$estado = "off";
}
return $estado;
}
//Obtener Puntos
function tPuntos($i)
{
$url = 'http://www.taringa.net/'.$i.'';
    $puntosVar = Obtener_contenidos($url,'<span>Rango</span>','<span>Puntos</span>');
	
	if(tOnline($i) == "on"){
$puntos = substr($puntosVar, 322, -33);
}elseif(tOnline($i) == "off"){
$puntos = substr($puntosVar, 52, -33);
}

return $puntos;
}
//Obtener Cantidad de seguidores
function tSeguidores($i)
{
$url = 'http://www.taringa.net/'.$i.'/seguidores';
    $seguidoresVar = Obtener_contenidos($url,'/seguidores">','<span>Seguidores</span>');
$seguidores = substr($seguidoresVar, 13, -46);
return $seguidores;
}
//Obtener Cantidad de siguiendo
function tSiguiendo($i)
{
$url = 'http://www.taringa.net/'.$i.'/siguiendo';
    $siguiendoVar = Obtener_contenidos($url,'siguiendo">','<span>Siguiendo</span>');
$siguiendo = substr($siguiendoVar, 11, -45);
return $siguiendo;
}

// // // // // // // // // // //
// FUNCIONES DATOS DE TARINGA //
// // // // // // // // // // //

//Obtener Cantidad de siguiendo
function tStat($i)
{
$url = 'http://www.taringa.net';
if($i == "online"){
    $usersonlineVar = Obtener_contenidos($url,'data-stats="online">','usuarios online</div>');
	$usersonline = substr($usersonlineVar, 20, -32);
return $usersonline;
}elseif($i == "miembros"){
	$miembrosVar = Obtener_contenidos($url,'data-stats="users">','miembros</div>');
	$miembros = substr($miembrosVar, 19, -25);
return $miembros;
}elseif($i == "comentarios"){
	$comentariosVar = Obtener_contenidos($url,'data-stats="comentarios">','comentarios</div>');
	$comentarios = substr($comentariosVar, 25, -28);
return $comentarios;
}elseif($i == "post"){
	$miembrosVar = Obtener_contenidos($url,'data-stats="posts">','posts</div>');
	$miembros = substr($miembrosVar, 20, -22);
return $miembros;
}

}
?>

