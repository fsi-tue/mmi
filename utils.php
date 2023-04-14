<?php
require_once('config.php');

/* GHOST FROM EEI
function replaceFirstOccurence($searchStr, $replacementStr, $sourceStr) {
        return (false !== ($pos = strpos($sourceStr, $searchStr))) ? substr_replace($sourceStr, $replacementStr, $pos, strlen($searchStr)) : $sourceStr;
}
*/

function subscribe($subscribername, $subscribermail, $mailinglist) { 
    $mailingslist_appendix = '-join@fsi.uni-tuebingen.de';
    $mailinglist .= $mailingslist_appendix;
    $subject = "Subscribe";
    $msg = "Subscribe me please!";
    $headers = "From:" . $subscribername . " <" . $subscribermail . ">";
    //mail($mailinglist, $subject, $msg, $headers);
}

function unsubscribe($subscribername, $subscribermail, $mailinglist) { 
    $mailingslist_appendix = '-leave@fsi.uni-tuebingen.de';
    $mailinglist .= $mailingslist_appendix;
    $subject = "Unsubscribe";
    $msg = "Unsubscribe me please!";
    $headers = "From:" . $subscribername . " <" . $subscribermail . ">";
    //mail($mailinglist, $subject, $msg, $headers);
}

function register($E){
    if($E['action'] == 'Anmelden') {
        $mail = filter_input(INPUT_GET, 'mail', FILTER_SANITIZE_EMAIL);
        
        if($E['infostudium'] == 'on'){
            subscribe($E['name'], $E['mail'], 'info-studium');
        }
        
        if($E['infotalk'] == 'on'){
            subscribe($E['name'], $E['mail'], 'info-talk');
        }
        
        if($E['kogwiss'] == 'on'){
            subscribe($E['name'], $E['mail'], 'kogwiss');
        }

        if($E['versuche'] == 'on'){
            subscribe($E['name'], $E['mail'], 'versuche');
        }

        if($E['infolehramt'] == 'on'){
            subscribe($E['name'], $E['mail'], 'info-lehramt');
        }

        if($E['infojobs'] == 'on'){
            subscribe($E['name'], $E['mail'], 'info-jobs');
        }

        if($E['linuxag'] == 'on'){
            subscribe($E['name'], $E['mail'], 'linux-ag');
        }

        if($E['coding'] == 'on'){
            subscribe($E['name'], $E['mail'], 'coding');
        }

        if($E['crypto'] == 'on'){
            subscribe($E['name'], $E['mail'], 'crypto');
        }
    
        echo "<div class='block info' style='text-align:center'>Erfolgreich angemeldet!</div>";
    }

    if($E['action'] == 'Abmelden') {
        $mail = filter_input(INPUT_GET, 'mail', FILTER_SANITIZE_EMAIL);
        
        if($E['infostudium'] == 'on'){
            unsubscribe($E['name'], $E['mail'], 'info-studium');
        }
        
        if($E['infotalk'] == 'on'){
            unsubscribe($E['name'], $E['mail'], 'info-talk');
        }
        
        if($E['kogwiss'] == 'on'){
            unsubscribe($E['name'], $E['mail'], 'kogwiss');
        }

        if($E['versuche'] == 'on'){
            unsubscribe($E['name'], $E['mail'], 'versuche');
        }

        if($E['infolehramt'] == 'on'){
            unsubscribe($E['name'], $E['mail'], 'info-lehramt');
        }

        if($E['infojobs'] == 'on'){
            unsubscribe($E['name'], $E['mail'], 'info-jobs');
        }

        if($E['linuxag'] == 'on'){
            unsubscribe($E['name'], $E['mail'], 'linux-ag');
        }

        if($E['coding'] == 'on'){
            unsubscribe($E['name'], $E['mail'], 'coding');
        }

        if($E['crypto'] == 'on'){
            unsubscribe($E['name'], $E['mail'], 'crypto');
        }
    
        echo "<div class='block info' style='text-align:center'>Erfolgreich abgemeldet!</div>";
    }
    
}

?>