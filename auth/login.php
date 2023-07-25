<?php
    session_start();

    require_once "../config/db.php";
    require_once "../config/config.php";

    $errors = array();

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        global $pdo;
        
        $email = $_POST["email"];
        $password = $_POST["password"];

        $stmt = $pdo->prepare("SELECT email, password, employee_id, firstname FROM employee_credentials ec JOIN employees emp ON ec.employee_id = emp.id WHERE email = :email");
        $stmt->bindValue(":email", $email);
        $stmt->execute();
        $count = $stmt->rowCount();

        if ($count === 0) {
            $errors["email"] = "Your email address does not exist";
            echo json_encode($errors);
            exit;
        }

        if ($count > 0) {
            $result = $stmt->fetch();

            if (!password_verify($password, $result["password"])) {
                $errors["password"] = "Your password is not correct";
            }
        }

        if (empty($errors)){
            $_SESSION["employee"] = $result["firstname"];
        }
    }

    echo json_encode($errors);