<?php
require_once('config.php');
require_once('utils.php');

if (!isset($_GET['token'])) {
    header('Location:/');
    die();
}

$token = filter_input(INPUT_GET, 'token', FILTER_SANITIZE_ENCODED);
global $FILE_REVISION;
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css<?php
    echo $FILE_REVISION; ?>">
    <link rel="stylesheet" href="css/index.css<?php
    echo $FILE_REVISION; ?>">
    <title>FSI / FSK Mailinglistenanmeldung</title>
</head>
<body>
<div id="center">
    <div class="container">
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        } else {
            ?>
            <form action="confirm.php" method="post">
                <input type="hidden" name="token" value="<?= $token ?>">
                <input type="submit" name="action" value="Anmelden">
            </form>
            <?php
        } ?>
    </div>
    <a style="text-align: center" href="https://github.com/fsi-tue/mmi">Source Code</a>
</div>
</body>
</html>
