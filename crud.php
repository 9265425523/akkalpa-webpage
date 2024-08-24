<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD OPERATION</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="validation.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<?php

include 'connection.php';



if (isset($_POST['submit'])) {

    
    $name = $_POST['name'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    // print_r($number);
    // exit();
    $country = $_POST['country'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $language = $_POST['language'];
    $ch = implode(",",$language);
    $message = $_POST['msg'];

    $sql = "INSERT INTO employee( name, address, email, number, country, password, gender, language, msg) VALUES('$name','$address','$email','$number','$country','$password','$gender','$ch','$message')";
    
    $result = mysqli_query($conn, $sql);
    //  print_r($result);
    //  exit;
    if ($result) {
         header("location:search.php");

        // echo "<script>alert('1 Record inserted..')</script>";
    }
}
?>

    <div class="container-fluid">
        <div class="text-center head pt-5 pb-4">
            <h1>CRUD OPERATION</h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6  col-sm-10 col-10" >
                <div class="card p-4" >
                    <form onsubmit="Validation()" class="m-auto w-75" action="" method="POST">
                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name:</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Your Full Name">
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address:</label>
                            <input type="text" class="form-control" name="address" id="address" placeholder="Enter Your Address">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email ID:</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter Your Email ID">
                        </div>
                        <div class="mb-3">
                            <label for="number" class="form-label">Phone No:</label>
                            <input type="text" class="form-control" name="number" id="number" onkeypress="return isNumberKey(event)" maxlength="10" placeholder="Enter Your Mobile Number">
                        </div>
                        <div class="mb-3">
                            <label for="country" class="form-label ">Country:</label>
                            <select name="country" id="country" class="form-select">
                                <option value="" selected>Select Your Country</option>
                                <option value="India">India</option>
                                <option value="Africa">Africa</option>
                                <option value="Pakistan">Pakistan</option>
                                <option value="UK">U K</option>
                                <option value="USA">U S A</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password">
                        </div>
                        <fieldset class="mb-3">
                            <legend class="form-label">Gender</legend>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" value="male" id="male">
                                <label class="form-check-label" for="male">Male</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" value="female" id="female">
                                <label class="form-check-label" for="female">Female</label>
                            </div>
                        </fieldset>
                        <fieldset class="mb-3">
                            <legend class="form-label">Language:</legend>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="language[]" id="hindi" value="Hindi">
                                <label class="form-check-label" for="hindi">Hindi</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="language[]" id="english" value="English">
                                <label class="form-check-label" for="english">English</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="language[]" id="gujarati" value="Gujarati">
                                <label class="form-check-label" for="gujarati">Gujarati</label>
                            </div>
                        </fieldset>
                        <div class="mb-3">
                            <label for="msg" class="form-label">Message:</label>
                            <textarea class="form-control" name="msg" id="msg" rows="4" placeholder="Enter The Message"></textarea>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Insert</button>

                        <!-- <button type="submit" name="update" class="btn btn-secondary">Update</button> -->
                    </form>
<!-- 
                    <a href="search.php" class="btn btn-success mt-3">Go back to Search Record</a> -->
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    function Validation(){
         
        
        var name=document.getElementById("name").value;
        var email = document.getElementById("email").value;
        var password = document.getElementById("password").value;
        // var number=document.getElementById("number").value;
        const dropdown = document.getElementById('country');
        var address=document.getElementById("address").value;
        const radios = document.getElementsByName('gender');
        let selected = false;
        var description=document.getElementById("msg").value;
        const password_length=password.length=6;



        if(name == "")
        {
            alert("Please Enter The  Name")
            return false;
        }
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        
        if(email == "")
        {
            alert("Please Enter The Email")
            return false;
        }
        else if (!emailRegex.test(email)) {
            alert("Please Enter Valid Email")
            return false;
        }
        if(password == ""){
            alert("Please Enter The Password")
            return false;
        } 

        
        // if(number == "")
        // {
        //     alert("Please Enter The Phone Number")
        //     return false;
        // }
        // else if (number.length < 10) {
        //     alert("Please Enter Must be 10 Digit");
        //     return false;
        // }
        // else if (number.length > 10) {
        //     alert("Only 10 Digit Mobile Number Allow");
        //     return false;
        // }

        if (dropdown.value === '') {
        
                alert('please select country');
                return false;
            }
    
        if(address =="")
        {
            alert("Please Enter Address")
            return false;
        }


        for (const radio of radios) {
        if (radio.checked) {
            selected = true;
            break;
        }
    }
    if (!selected) {
         
         alert('Please select Gender');
         return false;
        }

        if(description =="")
        {
            alert("Please Enter Description")
            return false;
        }

        
     
    }
    function isNumberKey(evt){
            var charCode=(evt.which)? evt.which : evt.keyCode;
            if(charCode > 31 && (charCode < 48 || charCode > 57)){
                return false;
            }
            return true;
        }    
    
</script>
</html>



 