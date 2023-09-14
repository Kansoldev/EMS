<?php
    require_once "../../config/db.php";
    require_once "../../config/config.php";
    require_once "../../includes/functions.php";

    $errors = array();

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        global $pdo;

        $faculty = validate($_POST["faculty_name"]);

        // Check if faculty already exists
        $sql = $pdo->prepare("SELECT * FROM faculties WHERE faculty_name = ?");
        $sql->execute([$faculty]);
        $count = $sql->rowCount();

        if ($count === 1) {
            $errors["message"] = "This faculty already exists";
            echo json_encode($errors);
            exit;
        } 

        $sql = "INSERT INTO faculties (faculty_name) VALUES (?)";
        $stmt = $pdo->prepare($sql);

        if ($stmt->execute([$faculty])) {
            $data = queryTableColumn("faculties");
        }
        
        echo json_encode(["faculties" => $data]);
    }