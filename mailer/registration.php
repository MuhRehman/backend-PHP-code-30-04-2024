
<?php
 
    header("Access-Control-Allow-Origin: *"); //add this CORS header to enable any domain to send HTTP requests to these endpoints:
    header("Access-Control-Allow-Methods: GET, POST");
    header("Access-Control-Allow-Headers: Content-Type");
 

 



    $mysqli = new mysqli("localhost", "root", "", "bazaar_db");
    if ($mysqli -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
    }else{

        error_reporting(E_ERROR | E_PARSE);
        $eData = file_get_contents("php://input");
        $dData = json_decode($eData, true);
 
        $user = $dData['user'];
        $email = $dData['email'];
        $pass = $dData['pass'];
        $role = $dData['roleid'];
        
        
        $result = "";
 
        if ($user != "" && $email != "" && $pass != "") {
            // echo "Connected Not insert!";exit;
            $sql = "INSERT INTO users(name, email, password, roleid) VALUES('$user', '$email', '$pass', '$role');";
          
            $res = mysqli_query($mysqli, $sql);

          
            if ($res) {
                $result = "You Have Registered Successfully!";
            } else {
                $result = "";
            }
            
        } else {
            $result = "";
        }
 
        $mysqli -> close();
        $response[] = array("result" => $result);
        echo json_encode($response);


    }
 


    require "./PHPMailer.php";
    require "./SMTP.php";
    require "./Exception.php";

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;

   $user_names = $dData['user'];
   $user_namesa = $dData['user'];
   $send_to_email = $dData['email'];
    // $pass = $dData['pass'];

function sendMail($send_to_email, $user_namesa, $user_names) {

   
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "tls";
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Enter your email ID
    $mail->Username = "m.rehman5353@gmail.com";
    $mail->Password = "yihusyqiewgduras";
    
    // Your email ID and Email Title
    $mail->setFrom("m.rehman5353@gmail.com", "Online Bazzar");

    $mail->addAddress($send_to_email);

    // You can change the subject according to your requirement!
    $mail->Subject = "Account Activation";

    // You can change the Body Message according to your requirement!
    $mail->Body = "Hello , {$user_names}\nYour account registration is successfully Online Bazaar !  {$user_namesa}.";
    $mail->send();
  
    echo "Successfully to connect to Sent";
}

sendMail($send_to_email, $verification_otp, $send_to_name);

// Message to print email success!
echo "Email Sent Successfully!";
?>