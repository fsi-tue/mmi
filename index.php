<?php
require_once('config.php');
require_once('utils.php');
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css<?php echo $FILE_REVISION; ?>">
    <link rel="stylesheet" href="css/index.css<?php echo $FILE_REVISION; ?>">
    <title>FSI / FSK Mailinglistenanmeldung</title>
</head>
<body>
    <div id="center">
        <h1>FSI / FSK Mailinglistenanmeldung</h1>
        <p style="text-align: center; margin-bottom:1.5em">Dieses Tool funktioniert aktuell ausschließlich mit @student.uni-tuebingen.de Mailadressen!</p>
        <div class="container">

            <form action="" method="POST">
                Name: <input type="text" id="form-name" name="name"><br>
                Mailadresse: <input type="email" id="form-mail" name="mail" required_size="30"><br><br>

                <div class="checkboxes">

                    <input type="checkbox" id="form-infostudium" name="infostudium" checked="checked">
                    <label for="form-infostudium">info-studium</label>
                    <br>

                    <input type="checkbox" id="form-infotalk" name="infotalk">
                    <label for="form-infotalk">info-talk</label>
                    <br>

                    <input type="checkbox" id="form-kogwiss" name="kogwiss">
                    <label for="form-kogwiss">kogwiss</label>
                    <br>

                    <input type="checkbox" id="form-versuche" name="versuche">
                    <label for="form-versuche">versuche</label>
                    <br>

                    <input type="checkbox" id="form-infolehramt" name="infolehramt">
                    <label for="form-infolehramt">info-lehramt</label>
                    <br>

                    <input type="checkbox" id="form-infojobs" name="infojobs">
                    <label for="form-infojobs">info-jobs</label>
                    <br>

                    <input type="checkbox" id="form-linuxag" name="linuxag">
                    <label for="form-linuxag">Linux AG</label>
                    <br>

                    <input type="checkbox" id="form-coding" name="coding">
                    <label for="form-coding">coding</label>
                    <br>

                    <input type="checkbox" id="form-crypto" name="crypto">
                    <label for="form-crypto">AK Cryptoparty</label>
                    <br>

                </div>

                <input type="submit" name="action" value="Anmelden">
                <input type="submit" name="action" value="Abmelden">
            </form>
            
                <?php if($_SERVER['REQUEST_METHOD'] === 'POST') {
                    register($_POST);
                }
                ?>

        </div>
    </div>
        <a style="text-align: center" href="https://github.com/fsi-tue/mmi">Source Code</a>
    </div>
</body>
</html>
