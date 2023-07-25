<?php
    session_start();

    require_once "../config/db.php";
    require_once "../config/config.php";

    $errors = array();

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        global $pdo;
        
        try {
            $pdo->beginTransaction();

            $firstname = $_POST["firstname"];
            $lastname = $_POST["lastname"];
            $email = $_POST["email"];
            $password = $_POST["password"];

            $sql = $pdo->prepare("SELECT * FROM employee_credentials WHERE email = :email");
			$sql->bindValue(":email", $email);
            $sql->execute();
            $count = $sql->rowCount();

            if ($count === 1) {
                $errors["email"] = "Email already exists";
                echo json_encode($errors);
                exit;
            } 

            $sql = "INSERT INTO employees (firstname, lastname) VALUES (:firstname, :lastname)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(":firstname", $firstname);
            $stmt->bindValue(":lastname", $lastname);
            $stmt->execute();

            $success = $stmt->rowCount() > 0;
            $employee_id = $pdo->lastInsertId();

            if ($success) {
                $sql = "INSERT INTO employee_credentials (email, password, employee_id) VALUES (:email, :password, :eid)";
                $stmt = $pdo->prepare($sql);
                $stmt->bindValue(":email", $email);
                $stmt->bindValue(":password", password_hash($password, PASSWORD_DEFAULT));
                $stmt->bindValue(":eid", $employee_id);
                $stmt->execute();
                $success = $stmt->rowCount() > 0;
            }

            if ($success) {
                $sql = "INSERT INTO registration (date_registered, employee_id) VALUES (NOW(), :eid)";
                $stmt = $pdo->prepare($sql);
                $stmt->bindValue(":eid", $employee_id);
                $stmt->execute();
                $success = $stmt->rowCount() > 0;
            }

            if ($success) {
                $pdo->commit();
                $_SESSION["employee_id"] = $employee_id;
            }
        } catch (Exception $e) {
            $pdo->rollBack();
        }
    }

    echo json_encode($errors);