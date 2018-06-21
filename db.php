<?php
define("LOGIN", "root");
define("PASS", "");
define("DB", "carousel");
define("HOST", "localhost");


try {
    $DBH = new PDO('mysql:host='.HOST.';dbname='.DB, LOGIN, PASS);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
}
?>
