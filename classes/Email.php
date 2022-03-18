<?php

    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    class Email {

        private $mailer;

        function __construct($host,$username,$name,$senha) {

            //Create an instance; passing `true` enables exceptions
            $this->mailer = new PHPMailer(true);

            try {
                //Server settings
                // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $this->mailer->isSMTP();                                            //Send using SMTP
                $this->mailer->Host       = $host;                     //Set the SMTP server to send through
                $this->mailer->SMTPAuth   = true;                                   //Enable SMTP authentication
                $this->mailer->Username   = $username;                     //SMTP username
                $this->mailer->Password   = $senha;                               //SMTP password
                $this->mailer->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $this->mailer->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $this->mailer->setFrom($username, $name);
                // $this->mailer->addAddress('gercinon073@gmail.com', 'Gercino Neto');     //Add a recipient
                // $mail->addAddress('ellen@example.com');               //Name is optional
                // $mail->addReplyTo('info@example.com', 'Information');
                // $mail->addCC('cc@example.com');
                // $mail->addBCC('bcc@example.com');

                //Attachments
                // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

                //Content
                $this->mailer->isHTML(true);
                $this->mailer->CharSet = 'UTF-8';                                  //Set email format to HTML
                // $this->mailer->send();
                // echo 'Message has been sent';
            } catch (Exception $e) {
                // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }

        public function addAdress($email,$nome) {
            $this->mailer->addAddress($email,$nome);
        }

        public function formatarEmail($info) {
            $this->mailer->Subject = $info['assunto'];
            $this->mailer->Body    = $info['corpo'];
            $this->mailer->AltBody = strip_tags($info['corpo']);
        }

        public function enviarEmail() {

            if($this->mailer->send()) {
                return true;
            } else {
                return false;
            }

        }

    }

?>