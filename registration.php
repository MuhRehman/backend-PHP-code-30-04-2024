
<?php
    // To Remove unwanted errors
    // error_reporting(0);
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);


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
        
        
        $result = "";
 
        if ($user != "" && $email != "" && $pass != "") {
            echo "Connected Not insert!";exit;
            $sql = "INSERT INTO users(name, email, password, roleid) VALUES('$user', '$email', '$pass', '11');";
          
            $res = mysqli_query($mysqli, $sql);

          
          
            if ($res) {
                $result = "You have registered successfully .....!";

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

    
           
?>