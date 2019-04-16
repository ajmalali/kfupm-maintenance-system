<?php
    require_once('config.php');

    $requestID = $_POST['requestID'];
    $sql = "SELECT email FROM request INNER JOIN requester r ON r.Id = request.user_id WHERE request_id = $requestID;";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_array($result);
    $emailTo = $row['email'];

    // Import PHPMailer classes into the global namespace
    // These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
    require 'vendor/autoload.php';
    $message = "<h2>Your maintenance request is completed!</h2>";

// Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);
    $pass = "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";
    try {
        //Server settings
        $mail->SMTPDebug = 4;                                       // Enable verbose debug output
        $mail->isSMTP();                                            // Set mailer to use SMTP
        $mail->Host = 'smtp.sendgrid.net';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                                   // Enable SMTP authentication
        $mail->Username = 'apikey';                     // SMTP username
        $mail->Password = $pass;                               // SMTP password
        $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('ajmalsyedali@gmail.com', 'KFUPM Maintenance System');
        $mail->addAddress($emailTo);

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Your maintenance request is completed';
        $mail->Body = $message;
        $mail->AltBody = strip_tags($message);

        $mail->send();
        echo 'Your order is complete.\nThe shopping invoice will be sent to you by email.';
    } catch (Exception $e) {
        echo "Error in sending email". $e;
    }
