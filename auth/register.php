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
                $sql = "INSERT INTO employee_credentials (email, password, account_status, employee_id) VALUES (:email, :password, 0, :eid)";
                $stmt = $pdo->prepare($sql);
                $stmt->bindValue(":email", $email);
                $stmt->bindValue(":password", password_hash($password, PASSWORD_DEFAULT));
                $stmt->bindValue(":eid", $employee_id);
                $stmt->execute();
                $success = $stmt->rowCount() > 0;
            }

            if ($success) {
                $timeframe = 60 * 60 * 24; // Equals to 1 day

                $sql = "INSERT INTO registration (activation_code, activation_expiry, date_registered, employee_id) VALUES (:code, :expiry, NOW(), :eid)";
                $stmt = $pdo->prepare($sql);
                $stmt->bindValue(":code", password_hash(bin2hex(random_bytes(16)), PASSWORD_DEFAULT));
                $stmt->bindValue(":expiry", date('Y-m-d H:i:s', time() + $timeframe));
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
?>