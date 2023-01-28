<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP FORM</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>


<?php
// define variables and set to empty values
$nameErr = $emailErr = $passErr = $mobile = $address = $age = $date = "";
$name = $email = $password = $mobErr = $addressErr = $ageErr = $dateErr = $errMsg = "";

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
  }

    if (empty($_POST["password"])) {
      $passErr = "Password is required";
    } else {
      $password = test_input($_POST["password"]);
      
    }

  //password stength,number,lowercase and capital letter verification 
  if(!empty($_POST["password"]) && ($_POST["password"])) {
    $password = test_input($_POST["password"]);
    if (strlen($_POST["password"]) < '8') {
        $passErr = "Your Password Must Contain At Least 8 Characters!";
    }
    elseif(!preg_match("#[0-9]+#",$password)) {
        $passErr = "Your Password Must Contain At Least 1 Number!";
    }
    elseif(!preg_match("#[A-Z]+#",$password)) {
        $passErr = "Your Password Must Contain At Least 1 Capital Letter!";
    }
    elseif(!preg_match("#[a-z]+#",$password)) {
        $passErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
    } 
}


//name whitespece and number validation
  $name = test_input($_POST["name"]);
  if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
    $nameErr = "Only letters and white space allowed";
  }



if (empty($_POST["mobile"])) {
  $mobErr = "Phone Number is required";
} else {
  $mobile = test_input($_POST["mobile"]);

 
function validate_mobile($mobile)
{
    return preg_match('/^[6-9]\d{9}$/', $mobile);
}

if(validate_mobile($mobile)){
  $mobile = test_input($_POST["mobile"]);
}else{
  $mobErr = "Enter A Valid Number";
}
}

//Address 
if (empty($_POST["address"])) {
  $addressErr = "Address is required";
} else {
  $address = test_input($_POST["address"]);
  
}

// Check if $age is not empty
if (empty($_POST["age"])) {
  $ageErr .= "You must enter your age.";
} else {
  $age = test_input($_POST["age"]);
  
}
if (!empty($_POST["age"]) && !is_numeric($age)) {
  $ageErr .= "Your age must be a number.";
}
// Check if age is not empty and is under 14
if (!empty($_POST["age"]) && $age < 18) {
  $ageErr .= "You must be 18 or older";
}

// Check if age is not empty and is over 80
if (!empty($_POST["age"]) && $age > 60) {
  $ageErr .= "You must be 60 or younger";
}



}



?>
    <div class="mainbody">
        <div class="formbody">
            <p>Enter Your Deatails</p>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> ">

            <span class="error"> <?php echo $nameErr;?>
                <section>
                  <label for="name" class="login-label">Name</label>
                  <br>
                  <input type="text" name="name" placeholder="Name">
                </section><br>
                  
                <?php echo $mobErr;?>
                <section>
                  <label for="phone" class="login-label">Phone Number</label>
                  <br>
                  <input type="text" name="mobile" placeholder="Phone Number" >
                </section><br>

                <span class="error"> <?php echo $addressErr;?>
                <section>
                  <label  for="adderess" class="login-label">Address</label>
                  <br>
                  <textarea class="address" name="address" ></textarea> 
                </section><br>

                <span class="error"> <?php echo $ageErr;?>
                <section>
                  <label for="age" class="login-label">Age</label>
                  <input type="number" name="age">
                </section><br>

                <label for="bloodGroup" class="login-label"> Blood Group</label>
                <select name="bgroup" id="" require>
                <option value="a+">sellect</option>
                    <option value="a+">A+</option>
                    <option value="a+">O+</option>
                    <option value="a+">B+</option>
                    <option value="ab+">AB+</option>
                    <option value="a-">A-</option>
                    <option value="o-">O-</option>
                    <option value="b-">B-</option>
                    <option value="ab-">AB-</option>
                </select><br>

                <span class="error"> <?php echo $dateErr;?>
                <section>
                  <label for="date" class="login-label">Date Of Birth</label>
                  <br>
                  <input type="text" name="date" id="" placeholder="Date Of Birth">
                </section> <br>

                <input type="submit"  name="submit" class="submit" action="action.php">
            </form>
           
        </div>
      
    </div>
</body>
</html>
