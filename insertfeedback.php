
<?php
 
    header("Access-Control-Allow-Origin: *"); //add this CORS header to enable any domain to send HTTP requests to these endpoints:
    header("Access-Control-Allow-Methods: GET, POST");
    header("Access-Control-Allow-Headers: Content-Type");
 
    // $conn = new mysqli("localhost", "root", "", "bazaar_db");
    // if(mysqli_connect_error()){
    //     echo mysqli_connect_error();
    //     exit();
    // }
    // else{

        $mysqli = new mysqli("localhost", "root", "", "bazaar_db");
        if ($mysqli -> connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
            exit();
        }else{


 
    
            error_reporting(E_ERROR | E_PARSE);
        $eData = file_get_contents("php://input");
        $dData = json_decode($eData, true);
 
          




        // $productname = "testing1";
        $feedbackId = $dData['productName'];
        // $productmname = "testing2";
        $feeddbackuserId = $dData['feeddbackuserId'];
        // $productmodel = "testing3";
        $productfeedback = $dData['feedback'];
        // $productprice = "testing4";
        $productrating = $dData['productrating'];
        // $productimg = "testing11";
        $feedbackdatatime = $dData['datatime'];
        
 
        $result = "";

      
 
        // if($productname != "" and $productmname != "" and $productmodel != "" and $productprice != "" ){
            // $sql = "INSERT INTO productsinfo(pname, pmname, pmodel, pprice, pimg ) VALUES('productname1','productmname1',' 'productmodel1', 'productprice1','1productimg');";
            // id		feedback	rating	datetime
            $sql = "INSERT INTO feedback(id, userId,feedback, rating, datetime) VALUES ('$feedbackId','$feeddbackuserId','$productfeedback','$productrating','$feedbackdatatime')";
       
            // $sql = "INSERT INTO productsinfo(pname, pmname, pmodel, pprice, pimg ) VALUES('$productname','$productmname',' '$productmodel', '$productprice','$productimg');";
            
            $res = mysqli_query($mysqli, $sql);


            // echo "Failed to connect to MySQL: " .$res;
        
            if($res){
                $result = "You have Insert a record successfully!";
                echo $result;
            }
            
            else{
                $result = "Failed ";
            }
        // }
        // else{
        //     $result = "Successfull ";
        // }
 
        $mysqli -> close();
        $response[] = array("result" => $result);
        echo json_encode($response);
    }
 
?>