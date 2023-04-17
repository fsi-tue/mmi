<?php
require_once('config.php');

/* GHOST FROM EEI
function replaceFirstOccurence($searchStr, $replacementStr, $sourceStr) {
        return (false !== ($pos = strpos($sourceStr, $searchStr))) ? substr_replace($sourceStr, $replacementStr, $pos, strlen($searchStr)) : $sourceStr;
}
*/

function subscribe($subscribername, $subscribermail, $mailinglist) {
    $mailingslist_appendix = '-subscribe@fsi.uni-tuebingen.de';
    $mailinglist .= $mailingslist_appendix;
    $subject = "Subscribe";
    $msg = "Subscribe me please!";
    return sendMail($subscribername, $subscribermail, $mailinglist, $subject, $msg);
    //mail($mailinglist, $subject, $msg, $headers);
}

function unsubscribe($subscribername, $subscribermail, $mailinglist) {
    $mailingslist_appendix = '-unsubscribe@fsi.uni-tuebingen.de';
    $mailinglist .= $mailingslist_appendix;
    $subject = "Unsubscribe";
    $msg = "Unsubscribe me please!";
    $headers = "From:" . $subscribername . " <" . $subscribermail . ">";
    return sendMail($subscribername, $subscribermail, $mailinglist, $subject, $msg);
    //mail($mailinglist, $subject, $msg, $headers);
}

function register($E){
    $success = true;
    if($E['action'] == 'Anmelden') {
        $mail = filter_input(INPUT_GET, 'mail', FILTER_SANITIZE_EMAIL);

        if($E['infostudium'] == 'on'){
            $success &= subscribe($E['name'], $E['mail'], 'info-studium');
        }

        if($E['infotalk'] == 'on'){
            $success &= subscribe($E['name'], $E['mail'], 'info-talk');
        }

        if($E['kogwiss'] == 'on'){
            $success &= subscribe($E['name'], $E['mail'], 'kogwiss');
        }

        if($E['versuche'] == 'on'){
            $success &= subscribe($E['name'], $E['mail'], 'versuche');
        }

        if($E['infolehramt'] == 'on'){
            $success &= subscribe($E['name'], $E['mail'], 'info-lehramt');
        }

        if($E['infojobs'] == 'on'){
            $success &= subscribe($E['name'], $E['mail'], 'info-jobs');
        }

        if($E['linuxag'] == 'on'){
            $success &= subscribe($E['name'], $E['mail'], 'linux-ag');
        }

        if($E['coding'] == 'on'){
            $success &= subscribe($E['name'], $E['mail'], 'coding');
        }

        if($E['crypto'] == 'on'){
            $success &= subscribe($E['name'], $E['mail'], 'crypto');
        }

        if ($success) {
            echo "<div class='block info' style='text-align:center'>Erfolgreich angemeldet!</div>";
        } else {
            echo "<div class='block error' style='text-align:center'>Fehler beim Anmelden!</div>";
        }
    }

    if($E['action'] == 'Abmelden') {
        $mail = filter_input(INPUT_GET, 'mail', FILTER_SANITIZE_EMAIL);

        if($E['infostudium'] == 'on'){
            $success &= unsubscribe($E['name'], $E['mail'], 'info-studium');
        }

        if($E['infotalk'] == 'on'){
            $success &= unsubscribe($E['name'], $E['mail'], 'info-talk');
        }

        if($E['kogwiss'] == 'on'){
            $success &= unsubscribe($E['name'], $E['mail'], 'kogwiss');
        }

        if($E['versuche'] == 'on'){
            $success &= unsubscribe($E['name'], $E['mail'], 'versuche');
        }

        if($E['infolehramt'] == 'on'){
            $success &= unsubscribe($E['name'], $E['mail'], 'info-lehramt');
        }

        if($E['infojobs'] == 'on'){
            $success &= unsubscribe($E['name'], $E['mail'], 'info-jobs');
        }

        if($E['linuxag'] == 'on'){
            $success &= unsubscribe($E['name'], $E['mail'], 'linux-ag');
        }

        if($E['coding'] == 'on'){
            $success &= unsubscribe($E['name'], $E['mail'], 'coding');
        }

        if($E['crypto'] == 'on'){
            $success &= unsubscribe($E['name'], $E['mail'], 'crypto');
        }

        if ($success) {
            echo "<div class='block info' style='text-align:center'>Erfolgreich abgemeldet!</div>";
        } else {
            echo "<div class='block error' style='text-align:center'>Fehler beim Abmelden!</div>";
        }
    }

}

# Loads the environment variables from the .env file
# https://dev.to/fadymr/php-create-your-own-php-dotenv-3k2i
function loadEnv($path) {
    // Path is not readable
    if (!is_readable($path)) {
        return;
    }

    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {

        // Skip empty lines
        if (empty($line) || strpos($line, '=') === false || strpos(trim($line), '#') === 0) {
            continue;
        }

        // Parse the line
        list($key, $value) = explode('=', $line, 2);
        $key = trim($key);
        $value = trim($value);

        if (!array_key_exists($key, $_SERVER) && !array_key_exists($key, $_ENV)) {
            putenv(sprintf('%s=%s', $key, $value));
            $_ENV[$key] = $value;
            $_SERVER[$key] = $value;
        }
    }
}

# Returns the value of an environment variable
function getEnvVar($key, $default = null) {
    // use getenv() if possible
    return getenv($key) ?: $default;
}

?>