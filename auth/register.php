<?php
    require_once "../config/db.php";
    require_once "../config/config.php";

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        global $pdo;
        
        try {
            $pdo->beginTransaction();

            $firstname = $_POST["firstname"];
            $lastname = $_POST["lastname"];
            $email = $_POST["email"];
            $password = $_POST["password"];

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
                echo "Queries executed successfully";
            } else {
                $pdo->rollBack();
                echo "Error: Failed to execute one of the queries.";
            }
        } catch (Exception $e) {
            $pdo->rollBack();
            echo "Error: " . $e->getMessage();
        }
    }