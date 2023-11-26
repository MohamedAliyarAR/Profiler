<?php 



       

        
           
        
        if (!empty($_POST['name']) && !empty($_POST['age']) && !empty($_POST['phonenumber']) && !empty($_POST['dob']) && !empty($_POST['email'])) {
    
            
        $email = $_POST['email'];
        $name=$_POST['name'];
        $age=$_POST['age'];
        $phonenumber=$_POST['phone'];
        $dob=$_POST['dob'];
                    
        
    
            $insertOne = $customerDetails->insertOne([
                "name" =>      $name  ,    
            "age" =>         $age,
            "phonenumber" => $phonenumber,
            "dob" =>       $dob ]);

            $document = array(
                "name" => 'test',
                "age" => 'test',
                "phonenumber" => 'test',
                "dob" => 'test'
            );
            $insertOne = $customerDetails->insertOne($document);
            if ($insertOne->getInsertedId()) {
                // $successMessage = array("success" => "Registered successfully");
                // echo json_encode($successMessage);
                echo "success";
            } else {
                // $errorMessage = array("error" => "Insertion failed: " . $insertOne->getMessage());
                // echo json_encode($errorMessage);
                echo "Failed";
            }
            
        // }
    // }
        
// else{
    // $errorMessage = array("error" => "Some fiels are empty");
            // echo json_encode($errorMessage);
            // echo "fields are empty";
// }

           
    
         
// ?>