<?php
// DB connection
include_once "db_conn.php";

header('Content-type: text/plain');
//PHP Mailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$usremail = $_GET['fpemail'];

$queryE = "";
$result = "";

$queryE = "SELECT u.id, u.user_login, u.user_pass, u.user_email, um.meta_key, um.meta_value AS user_role
            FROM wp_users u INNER JOIN wp_usermeta um on u.id = um.user_id
            WHERE (u.user_email = '".$usremail."')
            Limit 1";

if ($result = $connProd->query($queryE)) {
  while ($row = $result->fetch_row()) {
    $userid = $row[0];
    echo $userid;
  }

    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);
    //$mail = new PHPMailer\PHPMailer\PHPMailer(true);

    try {
        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.<domainname>.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = '<username/email>';                     // SMTP username
        $mail->Password   = '<password>';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port       = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('<useremail>', 'Mailer');
        $mail->addAddress($usremail, '<Recipient_Name>');     // Add a recipient
        $mail->addAddress($usremail);               // Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        // Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = '<email subject>';
        $mail->Body    = '<p>You are receiving this email because you initiated a password recovery for email('.$usremail.').</p><p><a href="https://<domain_name>/legacyorders/data/psswd_reset.php?xxddy='.$userid.'">Please click here to reset your password.</a></p>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        $emailmsg = 'ggy';
        $location = '../customer_login.php?emailmsg='.$emailmsg;
        header('Location: '.$location.'');
    } catch (Exception $e) {
        //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        $emailmsg = 'nny';
        $location = '../customer_login.php?emailmsg='.$emailmsg;
        header('Location: '.$location.'');
    }

}
?>
