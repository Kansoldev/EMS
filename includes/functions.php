<?php
    function validate(string $var) {
        $var = trim($var);
        $var = stripslashes($var);
        $var = htmlentities($var, ENT_QUOTES, "UTF-8");
        return $var;
    }

    function countTableAll($table) {
        global $pdo;
        
        $stmt = $pdo->prepare("SELECT * FROM $table");
        $stmt->execute();
        return $stmt->rowCount();   
    }

    function queryTableColumn($table, $column = "*") {
        global $pdo;
        
        $stmt = $pdo->prepare("SELECT $column FROM $table");
        $stmt->execute();
        return $stmt->fetchAll();
    }