<?php
require_once 'conexion.php';

$datos = $_POST['datos'];

if($datos == 'categorias')
    $stmt = $conn->prepare('SELECT * FROM categorias');
else if($datos == 'medicamentos')
    $stmt = $conn->prepare('SELECT * FROM medicamentos');  
else
    $stmt = $conn->prepare('SELECT * FROM lotes');

$stmt->execute();
$results = $stmt->get_result();

$res = [];
foreach($results as $row)
    $res[] = $row;

echo json_encode($res);
?>