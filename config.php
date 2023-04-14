<?php

    error_reporting(E_ERROR);
    date_default_timezone_set("Europe/Berlin");

    $FILE_REVISION = "?v=" . file_get_contents(__DIR__ . "/.git/refs/heads/master", NULL, NULL, 0, 40);

    #General Informations
    $CONFIG_CONTACT = 'fsi@fsi.uni-tuebingen.de';
    
    $SENDER_EMAIL = "fsi@fsi.uni-tuebingen.de";
    $SENDER_NAME  = "EEI - Fachschaft Informatik"
?>
