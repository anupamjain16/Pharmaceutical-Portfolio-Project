<?php
 
    require ("/home/medicish/public_html/class.phpmailer.php");
 
    if(isset($_POST['submit'])){
        $name=$_POST['name']; // Get Name value from HTML Form
        $mobile=$_POST['mobile'];  // Get Mobile No
        $email=$_POST['email'];  // Get Email Value
        $message=$_POST['message']; // Get Message Value
         
         
        $mail = new PHPMailer();
         
        $mail->IsSMTP();
        
        
        $mail->Host = "medicishealthcare.com"; // Your Domain Name
         
        $mail->SMTPAuth = true;
        $mail->Port = 587;
        $mail->Username = "contactform@medicishealthcare.com"; // Your Email ID
        $mail->Password = "medicis@123"; // Password of your email id
         
        $mail->From = "contactform@medicishealthcare.com";
        $mail->FromName = "Contact Us Form ";
        $mail->AddAddress ("Medicishealthcare@gmail.com"); // On which email id you want to get the message
        
        $mail->AddCC ($email);
         
        $mail->IsHTML(true);
         
        $mail->Subject = "Enquiry from Medicis by $name"; // This is your subject
        
         
        // HTML Message Starts here
         
        $mail->Body = "
        
        Dear $name,
        
       
        
        <html>
       
        <h4> We would like to acknowledge that we have recieved following request.<br>
        A support representative will reviewing your request and will send you a personal response.
        </h4>
            <body>
                <table style='width:600px;'>
                    <tbody>
                        <tr>
                            <td style='width:150px'><strong>Name: </strong></td>
                            <td style='width:400px'>$name</td>
                        </tr>
                        <tr>
                            <td style='width:150px'><strong>Email ID: </strong></td>
                            <td style='width:400px'>$email</td>
                        </tr>
                        <tr>
                            <td style='width:150px'><strong>Mobile No: </strong></td>
                            <td style='width:400px'>$mobile</td>
                        </tr>
                        <tr>
                            <td style='width:150px'><strong>Message: </strong></td>
                            <td style='width:400px'>$message</td>
                        </tr>
                    </tbody>
                </table>
       <h4> Thank you for your patience.<br>
        &nbsp; &nbsp;  &nbsp;  &nbsp; &nbsp;  Sincerly,<br> 
        Medicis Healthcare Team</h4>
                
        </body>
        </html>
        ";
        // HTML Message Ends here
         
             
    if(!$mail->Send()) {
            // Message if mail has been sent
            echo "Mailer Error: " . $mail->ErrorInfo;
           
            // echo "<script>
            //     alert('Submission failed.');
            // </script>";
       
       echo "Facing some error";
        }
        else {
            // Message if mail has been not sent
            
            echo "Mail sent successfully";
            
        //     echo "<script>
        //         alert('Email has been sent successfully.');
        //   </script>";
      }

  if(isset($_SERVER['HTTP_REFERER']))
 {
     header("Location: " . $_SERVER['HTTP_REFERER']);    
 } else {
      echo "An Error";
      }

    
        
    }
?>