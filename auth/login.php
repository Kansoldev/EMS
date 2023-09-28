<?php
    session_start();

    require_once "../config/db.php";
    require_once "../config/config.php";
    require_once "../includes/functions.php";

    $errors = array();

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        global $pdo;
        
        $email = validate($_POST["email"]);
        $password = validate($_POST["password"]);

        $stmt = $pdo->prepare("SELECT * FROM employee_credentials WHERE email = :email");
        $stmt->bindValue(":email", $email);
        $stmt->execute();
        $count = $stmt->rowCount();

        if ($count === 0) {
            $errors["email"] = "Your email address does not exist";
            echo json_encode($errors);
            exit;
        }

        $result = $stmt->fetch();

        if (!password_verify($password, $result["password"])) {
            $errors["password"] = "Your password is not correct";
        }

        if (empty($errors)){
            $_SESSION["employee_id"] = $result["employee_id"];
        }
    }

    echo json_encode($errors);