<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- cdn script imports-->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- cdn css import -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- custom script and css import -->
    <script type="text/javascript" src="js/main/script.js"></script>
    <link rel="stylesheet" href="css/main/style.css">

    <title>Student Registration</title>
  </head>
  <body>
    <?php
    if(isset($_POST['submit'])){

      $fname = $_POST['fname'];
      $lname = $_POST['lname'];
      $address = $_POST['address'];
      $gender = $_POST['gender'];
      $email = $_POST['email'];
      $pw = $_POST['pw'];
      $cpw = $_POST['cpw'];

      if(!empty($fname) && !empty($lname) && !empty($address) && !empty($gender) && !empty($email) && !empty($pw) && !empty($cpw)){
        if($pw != $cpw){
          echo "<script type='text/javascript'>alert('Password Doesn't Match');</script>";
        }else{
          include 'DBConnection/dbcon.php';

          $conn = dbCOn();

          $sql = "INSERT INTO student (fname, lname, address, gender, email, password)
                  VALUES ('$fname', '$lname', '$address','$gender','$email','$pw')";

          if ($conn->query($sql) === TRUE) {
              echo "<script type='text/javascript'>alert('New Record Created Successfully');</script>";
          } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
              echo "<script type='text/javascript'>alert('Error: '.$sql.'<br>'.$conn->error.'');</script>";
          }

          $conn->close();
        }
      }else{
        echo "<script type='text/javascript'>alert('Fill all the fields');</script>";
      }


    }
    ?>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h1>Student Registration</h1>
            </div>
            <form class="form-body" method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
              <div class="form-group">
                <label for="exampleInputPassword1">First Name</label>
                <input type="text" name="fname" class="form-control"  placeholder="Enter First Name">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Last Name</label>
                <input type="text" name="lname" class="form-control" placeholder="Enter Last Name">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Address</label>
                <input type="text" name="address" class="form-control" placeholder="Enter Address">
              </div>
              <div class="form-group">
                <label for="exampleFormControlSelect2">Gender</label>
                <select class="form-control" name="gender" >
                  <option value="M">Male</option>
                  <option value="F">Female</option>
                </select>
              </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" name="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" name="pw" class="form-control" placeholder="Enter Password">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Confir Password</label>
                  <input type="password" name="cpw" class="form-control" placeholder="Enter the same Password">
                </div>
                <input type="submit" name="submit" class="btn btn-primary" value="Submit">
            </form>


          </div>
        </div>
      </div>
  </body>
</html>
