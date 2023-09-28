<?php
    require_once "../config/db.php";
    require_once "../config/config.php";
    require_once "../includes/functions.php";

    $errors = array();
    $employeeID = validate($_POST["employee_id"]);

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $phone_no = validate($_POST["phone"]);
        $address = validate($_POST["address"]);

        $updateEmployeeStmt = "UPDATE employees SET phone_number = :phone, address = :address WHERE id = :eid";
        $stmt = $pdo->prepare($updateEmployeeStmt);
        $stmt->bindValue(":phone", $phone_no);
        $stmt->bindValue(":address", $address);
        $stmt->bindValue(":eid", $employeeID);
        
        if ($stmt->execute()) {
            echo json_encode(["message" => "Your details has been updated!"]);
        }
    }