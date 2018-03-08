<?php

$db = new mysqli("localhost", "root", "", "voyage");
if ($db->connect_errno) {
    die("Erreur connection Base de données");
}
