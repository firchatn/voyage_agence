<?php

$db = new mysqli("localhost", "lejenome", "moez6639", "voyage");
if ($db->connect_errno) {
    die("Erreur connection Base de données");
}
