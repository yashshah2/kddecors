<?php

  include 'db_connect.php';

  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];
  $phone = $_POST['phone'];
  $uniqueid = getUniqueId($name,$phone);
  function getUniqueId($name,$phone)
  {
    $n=substr(strtoupper($name),0,5);
    $p=substr($phone,0,5);
    $m=date('m');
    $y=date('y');
    $d=date('d');
    $final_id = $n.$d.$m.$y.$p;
    return $final_id;
  }
  $query = "INSERT INTO contact(cust_id,Name,email,phone,message)
            VALUES('".$uniqueid."','".$name."','".$email."','".$phone."','".$message."')";
  mysqli_query($connection,$query);
  //header("Location:acknowledgement.html");

    // Import PHPMailer classes into the global namespace
    // These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    // Load Composer's autoloader
    require 'phpmailer\vendor\autoload.php';

    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'krishnadecor142@gmail.com';                     // SMTP username
        $mail->Password   = 'psdewani142';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port       = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('shah.yash362@gmail.com', 'Yash Shah');
        $mail->addAddress($email, 'User');     // Add a recipient
      //  $mail->addAddress('ellen@example.com');               // Name is optional
      //  $mail->addReplyTo('info@example.com', 'Information');
      //  $mail->addCC('cc@example.com');
      //  $mail->addBCC('bcc@example.com');

        // Attachments
        $mail->addAttachment('images\krishnadecors.pptx');         // Add attachments
      //  $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Welcome to Krishna Decor';
        $mail->Body    = '<h4>WELCOME TO <b>KRISHNA DECORS</b></h4>.<h5> At Krishna Decors,
        we believe in providing the best services.
        We suggest you best suitable product by analysing your requirements and execute with expertise
        at your location. Krishna Decor deals with distribution and turnkey projects for
        all types of applications in artificial turf landscaping, green-wall and WPC deckwoods.
        With ready stock of thousands of square meters in all varieties makes us a perfect choice
         of architects, developers, retailers,& dealers who\'d consider our ideas and products
         for artificial landscaping and exterior decor. We are a perfect blend of raw materials design
        and technical expertise in fabrication and ground knowledge which makes us the winner as one
        point source for all your
         requirement in turnkey projects for artificial grass and sports turf. </h5>
         <h3> Thank you for showing interest. We\'ll get back to you in 12-24 hours.<br><br>
         Regards,<br>
         Krishna Decor<br>
         9480332831';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
         ?>

          <html lang="en" dir="ltr">
            <head>
              <meta charset="utf-8">
              <title>Krishna Decor | Welcome</title>
              <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
              <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
              <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
            </head>
            <style media="screen">


            .shadow {
          box-shadow: 0px 11px 15px -7px rgba(0, 0, 0, 0.2), 0px 24px 38px 3px rgba(0, 0, 0, 0.14), 0px 9px 46px 8px rgba(0, 0, 0, 0.12);    transition: box-shadow 0.28s cubic-bezier(0.4, 0, 0.2, 1);
          }
          body {
            background: url(images/g2.jpg) no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
          }
            </style>
            <body>

          <div style="width:65%;margin-top:100px;" class="shadow p-3 mb-5 bg-white rounded container" style="margin-bottom:50px;">


           <center><h1>Your details have been successfully recorded</h1>
           <h4>Our Team will get back to you in 24 hours. Thank you showing interest.</h4></center>
           <center>
            <img  src="checked.png" alt="" height="100">
            <h3 style="margin-left:-20px">Welcome to Krishna Decor</h3>

          </center>

          <!-- <center> -->
          <a href="index.html"><button type="button"  class="btn btn-success" name="button">Continue</button></a>

          <!-- </center> -->

          </div>
            </body>
          </html>


    <?php } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    } ?>
