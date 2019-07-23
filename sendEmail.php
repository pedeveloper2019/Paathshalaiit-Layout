<?php
require_once('assets/PHPMailer/src/Exception.php');
require_once('assets/PHPMailer/src/PHPMailer.php');
require_once('assets/PHPMailer/src/SMTP.php');

$username = $_POST["txtName"];
$std = $_POST["ddlClass"];
// echo $exams;
$exams="";
foreach($_POST["ddlExam"] as $exam)
    $exams .=", ".$exam;

$email = strtolower($_POST["txtEmail"]);
// // Instantiation and passing `true` enables exceptions

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
    $mail->Username   = 'pedeveloper.2019@gmail.com';                     // SMTP username
    $mail->Password   = 'supermanbatman@2019';                             // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('pedeveloper.2019@gmail.com', 'Admin PhotonEcademy');
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
    $mail->Subject = 'Student Enquiry';
    $mail->Body    = 'Enquiry submitted by <br>Student Name: '.$username.'<br> Email-Id: '.$email.'<br> Standard: '.$std.'<br> apearing for exam/s: '.$exams;
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

