<?php
require_once('assets/PHPMailer/src/Exception.php');
require_once('assets/PHPMailer/src/PHPMailer.php');
require_once('assets/PHPMailer/src/SMTP.php');

$username = $_POST["txtname"];
$std = $_POST["ddlClass"];
$std = $_POST["ddlExam"];
$email = strtolower($_POST["email"]); 
// Instantiation and passing `true` enables exceptions

$mail = new PHPMailer\PHPMailer\PHPMailer();
$mail->IsSMTP();

try {
    //Server settings
    $mail->SMTPDebug = 2;                                       // Enable verbose debug output
    // $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'danishmulla1234@gmail.com';                     // SMTP username
    $mail->Password   = 'dan91823';                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('danishmulla1234@gmail.com', 'Admin CIMS');
    $mail->addAddress($email);     // Add a recipient
    // $mail->addAddress('ellen@example.com');               // Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    // // Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Account Creation';
    $mail->Body    = ' Your Account is created with <br>Username <b>'.$username.'</b><br> and randomly created Password <b>'.$pass.'</b><br>It is advised to change the password from settings tab after succussesful login. ';
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if($mail->send()){
    echo 'Message has been sent';
    } 
    else
    {
        echo "Message could not be sent.Error: {$mail->ErrorInfo}";
    }
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

