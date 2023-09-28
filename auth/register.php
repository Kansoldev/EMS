<?php
    session_start();

    require_once "../config/db.php";
    require_once "../config/config.php";
    require_once "../includes/functions.php";

    $errors = array();

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        global $pdo;
        
        try {
            $pdo->beginTransaction();

            $firstname = validate($_POST["firstname"]);
            $lastname = validate($_POST["lastname"]);
            $email = validate($_POST["email"]);
            $password = validate($_POST["password"]);
            $job_title = validate($_POST["job"]);
            $phone_no = validate($_POST["phone"]);
            $dob = validate($_POST["dob"]);
            $gender = validate($_POST["gender"]);
            $address = validate($_POST["address"]);
            $departmentID = validate($_POST["department"]);

            $sql = $pdo->prepare("SELECT * FROM employee_credentials WHERE email = :email");
			$sql->bindValue(":email", $email);
            $sql->execute();
            $count = $sql->rowCount();

            if ($count === 1) {
                $errors["email"] = "Email already exists";
                echo json_encode($errors);
                exit;
            } 

            $sql = "INSERT INTO employees (firstname, lastname, dob, gender, phone_number, job_title, address, department_id) VALUES (:firstname, :lastname, :dob, :gender, :phone, :job, :address, :did)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(":firstname", $firstname);
            $stmt->bindValue(":lastname", $lastname);
            $stmt->bindValue(":dob", $dob);
            $stmt->bindValue(":gender", $gender);
            $stmt->bindValue(":phone", $phone_no);
            $stmt->bindValue(":job", $job_title);
            $stmt->bindValue(":address", $address);
            $stmt->bindValue(":did", $departmentID);
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
            }
        } catch (Exception $e) {
            $pdo->rollBack();
        }
    }

    echo json_encode($errors);