<?php

include "connection.php";

if(isset($_GET['deleteid'])){


    $did=$_GET['deleteid'];

    $sql="DELETE FROM employee where id=$did";

    $result=mysqli_query($conn,$sql);

    if($result){
        header("Location:search.php");
        //  echo "<script>window.confirm('Are you sure')</script>";
    }

}

?>