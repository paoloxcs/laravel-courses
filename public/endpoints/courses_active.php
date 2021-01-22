<?php 
header("Access-Control-Allow-Origin: *");
header('Content-type: application/json');
// Conexión
$cnnx = mysqli_connect('dossierdearquitectura.com', "dossierd_cursos", "YrTM}~Wt;Qtk", 'dossierd_courses');
mysqli_set_charset($cnnx, "utf8");
if (!$cnnx) { 
    die('Could not connect: ' . mysqli_connect_error()); 
}
$query = "SELECT id, title, slug, url_banner,url_thumbnail FROM courses WHERE is_active=1 ORDER BY id DESC";
$rs =  mysqli_query($cnnx, $query) or die(mysqli_error($cnnx));
$courses = [];
while ($row = mysqli_fetch_assoc($rs)) {
	$curso = [
		'id'	=>	$row['id'],
		'name' => $row['title'],
		'action_link'	=> 'https://cursos.dossierdearquitectura.com/'.$row['slug'],
		'url_thumbnail' =>	$row['url_thumbnail']
	];

	array_push($courses, $curso);
}
echo json_encode($courses);

