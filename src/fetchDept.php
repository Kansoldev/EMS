<?php
    require_once "../config/db.php";
    require_once "../config/config.php";
    require_once "../includes/functions.php";

    $payload = file_get_contents('php://input');
    $data = json_decode($payload, true);

    $sql = $pdo->prepare("SELECT id, department_name FROM departments WHERE faculty_id = :id");
    $sql->bindValue(":id", $data["facultyID"]);
    $sql->execute();
    $result = $sql->fetchAll();

    echo json_encode(["departments" => $result]);