<?php
    function validate(string $var) {
        $var = trim($var);
        $var = stripslashes($var);
        $var = htmlentities($var, ENT_QUOTES, "UTF-8");
        return $var;
    }