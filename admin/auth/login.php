<?php
    session_start();
    require_once "../../includes/functions.php";
    require_once "../../config/db.php";

    $errors = array();

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        global $pdo;

        $email = validate($_POST["email"]);
        $password = validate($_POST["password"]);

		$sql = $pdo->prepare("SELECT * FROM admin WHERE email = :email");
		$sql->bindValue(":email", $email);
	    $sql->execute();

        if ($sql->rowCount() === 0) {
            $errors["email"] = "Your email does not exists";
            echo json_encode($errors);
            exit;
        }

        $result = $sql->fetch();

        if (!password_verify($password, $result["password"])) {
            $errors["password"] = "Your password is incorrect";
        }

        if (empty($errors)) {
            $_SESSION["admin"] = $result["name"];
        }
    }

    echo json_encode($errors);