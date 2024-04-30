
<?php
 

    $to_mail = "claver.coder@gmail.com";
            $subject = "Test mail";
            $mainmessage = "Hello! This is a simple email message.";
            $from = "m.rehman5353@gmail.com";
            $headers = "From: $from";
            if(mail($to_mail,$subject, $mainmessage, $headers )){
            echo "Mail Sent.";
            }else{
                echo "Email Failed..!";
            }


                       
?>