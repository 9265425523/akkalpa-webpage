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


        if(isset($_GET['updateid'])){

            $uid=$_GET['updateid'];

            $sql = "SELECT * FROM employee WHERE id=$uid";
            $result = mysqli_query($conn,$sql);
          if ($result) {
            while ($row=mysqli_fetch_assoc($result)) {
        
            $name= $row["name"];
            $add=$row["address"];
            $email=$row["email"];
            $number=$row["number"];
            $country=$row["country"];
            $password=$row["password"];
            $gender=$row["gender"];
            $language=$row["language"];
            $lang=explode(",",$language);
            $msg=$row["msg"];
                        
    
            }      
        
    } 

        }

        if (isset($_POST['update'])) {

            $name = $_POST['name'];
            $address = $_POST['address'];
            $email = $_POST['email'];
            $number = $_POST['number'];
            $country = $_POST['country'];
            $password = $_POST['password'];
            $gender = $_POST['gender'];
            $language = $_POST['language'];
            $ch = implode(",", $language);
            $msg = $_POST['msg'];


            // $sql = "INSERT INTO `employee`( `name`, `address`, `email`, `number`, `country`, `password`, `gender`, `language`, `msg`) VALUES('$name','$address','$email','$number','$country','$password','$gender','$ch','$message')";

           $sql= "UPDATE employee SET name='$name',address='$address',email='$email',number='$number',country='$country',password='$password',gender='$gender',language='$ch',msg='$msg' WHERE id=$uid";
           
            $result = mysqli_query($conn, $sql);

            // print_r($result);
            // exit;


            if ($result) {
                    header("location:search.php");
                // echo "<script>alert(' Record Upadated....')</script>";
            }
        }
?>

    <div class="container-fluid">
        <div class="text-center mt-5 mb-4">
            <h1>CRUD OPERATION</h1>
        </div>
<div class="row justify-content-center">
<div class="col-md-8 col-lg-6">
    <div class="card p-4">
        <form onsubmit="Validation()" class="m-auto w-75" action="" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Full Name:</label>
                <input type="text" class="form-control" name="name"  id="name" value="<?php echo $name ?>" placeholder="Enter Your Full Name">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address:</label>
                <input type="text" class="form-control" name="address" id="address" value="<?php echo $add ?>" placeholder="Enter Your Address">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email ID:</label>
                <input type="email" class="form-control" name="email" id="email" value="<?php echo $email ?>" placeholder="Enter Your Email ID">
            </div>
            <div class="mb-3">
                <label for="number" class="form-label">Phone No:</label>
                <input type="text" class="form-control" name="number" id="number" value="<?php echo $number ?>" onkeypress="return isNumberKey(evt)" maxlength="10" placeholder="Enter Your Mobile Number">
            </div>
            <div class="mb-3">
                <label for="country" class="form-label">Country:</label>
                <select name="country"   id="country" class="form-select">
                    <option value="" selected>Select Your Country</option>
                    <option value="India" <?php echo $country == 'India' ? 'selected="selected"' : ''; ?> >India</option>
                    <option value="Africa" <?php echo $country == 'Africa' ? 'selected="selected"' : ''; ?>>Africa</option>
                    <option value="Pakistan" <?php echo $country == 'Pakistan' ? 'selected="selected"' : ''; ?>>Pakistan</option>
                    <option value="UK" <?php echo $country == 'UK' ? 'selected="selected"' : ''; ?>>U K</option>
                    <option value="USA" <?php echo $country == 'USA' ? 'selected="selected"' : ''; ?>>U S A</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" class="form-control" name="password" value="password" id="password" placeholder="Enter Password">
            </div>
            <fieldset class="mb-3">
                <legend class="form-label">Gender</legend>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender"  value="male"  <?php echo $gender == 'male' ? 'checked="checked"':'' ?> id="male">
                    <label class="form-check-label" for="male">Male</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" value="female" <?php echo $gender == 'female' ? 'checked="checked"':'' ?> id="female">
                    <label class="form-check-label" for="female">Female</label>
                </div>
            </fieldset>
            <fieldset class="mb-3">
                <legend class="form-label">Language:</legend>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="language[]" id="hindi" value="Hindi" <?php if(in_array("Hindi", $lang)) echo "checked"; ?> >
                    <label class="form-check-label" for="hindi">Hindi</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="language[]" id="english" value="English"  <?php if(in_array("English",$lang)) echo "checked"; ?> >
                    <label class="form-check-label" for="english">English</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="language[]" id="gujarati" value="Gujarati" <?php if(in_array("Gujarati",$lang)) echo"checked"; ?>>
                    <label class="form-check-label" for="gujarati">Gujarati</label>
                </div>
            </fieldset>
            <div class="mb-3">
                <label for="msg" class="form-label">Message:</label>
                
                <input type="text" class="form-control" name="msg" id="msg" rows="4" value="<?php echo $msg ?>"  placeholder="Enter The Message">
                <!-- <textarea class="form-control" name="msg" id="msg" rows="4" value="<?php echo $msg ?>"  placeholder="Enter The Message"></textarea> -->
            </div>
            <!-- <button type="submit" name="submit" class="btn btn-primary">Insert</button> -->

            <button type="submit" name="update" class="btn btn-secondary">Update</button>
        </form>

                    <!-- <a href="crud.php" class="btn btn-primary mt-3">Go back to Insert Record</a>
                    <a href="search.php" class="btn btn-secondary mt-3">Go back to Search Record</a> -->
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    function Validation() {

        var name = document.getElementById("name").value;
        var email = document.getElementById("email").value;
        var password = document.getElementById("password").value;
        var number = document.getElementById("number").value;
        const dropdown = document.getElementById('country');
        var address = document.getElementById("address").value;
        const radios = document.getElementsByName('gender');
        let selected = false;
        var description = document.getElementById("msg").value;




        if (name == "") {
            alert("Please Enter The  Name")
            return false;
        }
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (email == "") {
            alert("Please Enter The Email")
            return false;
        } else if (!emailRegex.test(email)) {
            alert("Please Enter Valid Email")
            return false;
        }
        if (password == "") {
            alert("Please Enter The Password")
            return false;
        }
        if (number == "") {
            alert("Please Enter The Phone Number")
            return false;
        } else if (number.length < 10) {
            alert("Please Enter Must be 10 Digit");
            return false;
        } else if (number.length > 10) {
            alert("Only 10 Digit Mobile Number Allow");
            return false;
        }

        // if (dropdown.value === '') {

        //     alert('please select country');
        //     return false;
        // }

        if (address == "") {
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
        }

        if (description == "") {
            alert("Please Enter Description")
            return false;
        }



    }
    function isNumberKey(evt) {
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        }

</script>

</html>

