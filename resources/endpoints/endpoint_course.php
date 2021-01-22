<?php 
header("Access-Control-Allow-Origin: *");
header('Content-type: application/json');
require('conexiones.php');
// Conexión
$cnnx = mysqli_connect('dossierdearquitectura.com', "dossierd_cursos", "YrTM}~Wt;Qtk", 'dossierd_courses');
mysqli_set_charset($cnnx, "utf8");
if (!$cnnx) { 
    die('Could not connect: ' . mysqli_connect_error()); 
}
$query = "SELECT id, title, slug, url_banner FROM courses WHERE is_active=1 ORDER BY id DESC LIMIT 2";
$rs =  mysqli_query($cnnx, $query) or die(mysqli_error($cnnx));
$courses = [];
while ($row = mysqli_fetch_assoc($rs)) {
	$curso = [
		'id'	=>	$row['id'],
		'name' => $row['title'],
		'action_link'	=> 'http://cursos.dossierdearquitectura.com/'.$row['slug'],
		'banner' =>	$row['url_banner']
	];

	array_push($courses, $curso);
}
echo json_encode($courses);

