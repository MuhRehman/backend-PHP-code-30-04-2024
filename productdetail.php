
<?php
 
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST");
    header("Access-Control-Allow-Headers: Content-Type");
 
    $mysqli  = new mysqli("localhost", "root", "", "bazaar_db");
    // if(mysqli_connect_error()){
    //     echo mysqli_connect_error();
    //     exit();
    // }
    if ($mysqli -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
    }else{
        error_reporting(E_ERROR | E_PARSE);
        $eData = file_get_contents("php://input");
        $dData = json_decode($eData, true);
          
    
        
      

        $result = "";
        $resultProduct = "";
 
       

     
            $sql = "SELECT * FROM productsinfo";
             
            $res = mysqli_query($mysqli, $sql);
           
     
           
            if (mysqli_num_rows($res) != 0) {
            
            // Fetch all
            $resultProduct =  $res -> fetch_all(MYSQLI_ASSOC);
                 
            } else {
                $result = "login failed 11";
                
                $resultProduct = [];
            }
      
 
        $mysqli -> close();
        $response[] = $resultProduct;
        // $response[] = array("result" => $result);

        echo json_encode($response);
    }
 
?>