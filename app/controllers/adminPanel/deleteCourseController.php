<?php

require_once '../app/models/Utility.php';

$admin = getUser()->isAdmin;

if (!$admin)
    header('Location: /', true, 301);

$url = $_SERVER['REQUEST_URI'];

// get id after seconde /
try {
    $id = (int)explode('/', $url)[3];
} catch (Exception $e) {
    header('Location: /', true, 301);
}

require_once '../app/models/DBManage.php';

$db = new DBManage();
$cours = $db->getCourseById($id);

if ($db->deleteCourse($id)) {
    if (file_exists($cours->path)) {
        unlink($cours->path);
        echo json_encode(array("success" => true, "message" => "Le cours a été supprime."));
    } else
        echo json_encode(array("success" => true, "message" => "Le cours a été supprime de la DB mais le fichier n'existait pas."));
} else
    echo json_encode(array("success" => false, "message" => "Erreur de la DB."));