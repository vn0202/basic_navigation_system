<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
// require 'vendor/autoload.php';
require "PHPMailer/src/Exception.php";
require "PHPMailer/src/PHPMailer.php";
require "PHPMailer/src/SMTP.php";

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0; 
    $mail->CharSet="UTF-8";                   //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'vn0202.nd@gmail.com';                     //SMTP username
    $mail->Password   = 'nghia02021998';                               //SMTP password
    $mail->SMTPSecure = "TLS";            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('vn0202.nd@gamil.com', 'Unitop shop');
    $mail->addAddress("{$_POST['email']}");     //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    
    $listItems= $_SESSION['cart']['buy'];

    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Đặt hàng thành công';
  $content= show_item();
    $mail->Body    = "{$content}";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    // echo 'Message has been sent';
} catch (Exception $e) {
    // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
<?php get_header() ?>
<div id="main-content-wp" class="thank-page">

    <div class="wp-inner clearfix">
        <?php  get_sibar()?>
        <div id="content" class="fl-right">
            <div class="section" id="thank-wp">
                <div class="section-head">
                    <h3 class="section-title">Đặt hàng thành công</h3>
                </div>
                <div class="section-detail">
                    <p>Chúc mừng bạn đã đặt hàng thành công. Vui lòng kiểm tra địa chỉ <a href="https://mail.google.com/" title="Email">Email</a> để kiểm tra đơn hàng!</p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>