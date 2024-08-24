 <?php
        $conn = new mysqli('localhost','root','','emp');

        if(!$conn){
            die(mysqli_error($conn));
        }
        // else{
        //     echo "connection successfully";
        // }
?> 

