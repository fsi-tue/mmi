<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

// Load Composer's autoloader
require 'vendor/autoload.php';

/**
 * Sends an email to a given address.
 *
 * @param        $subscriberName
 * @param        $subscriberMail
 * @param        $mailingList
 * @param string $subject
 * @param string $body
 *
 * @return bool
 */
function sendMail($subscriberName, $subscriberMail, $mailingList, $subject, $body)
{
    $mail = new PHPMailer(TRUE);
    try {
        $mail->SMTPDebug = SMTP::DEBUG_SERVER; // Enable verbose debug output. */
        $mail->isSMTP();

        /* https://stackoverflow.com/questions/2491475/phpmailer-character-encoding-issues */
        $mail->Encoding = 'base64';
        $mail->CharSet = 'UTF-8';

        $mail->SMTPAuth = TRUE;
        $mail->SMTPKeepAlive = TRUE;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->SMTPOptions = [
            'ssl' => [
                'verify_peer' => FALSE,
                'verify_peer_name' => FALSE,
                'allow_self_signed' => TRUE
            ]
        ];
        $mail->Host = getEnvVar('EMAIL_HOST');
        $mail->Port = getEnvVar('EMAIL_PORT');
        $mail->Password = getEnvVar('SENDER_PASSWORD');
        $mail->Username = getEnvVar('SENDER_USERNAME');
        $mail->setFrom($subscriberMail, $subscriberName);
        $mail->addAddress($mailingList);

        $mail->isHTML();
        $mail->Subject = $subject;
        $mail->Body = $body;

        $mail->send();
        return TRUE;
    } catch (Exception $exception) {
        return FALSE;
    }
}