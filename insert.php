<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<style>
* {
  box-sizing: border-box;
}

body {
  background-image: url('stu_reg.jpg');
  background-repeat:  no-repeat;
  background-attachment: fixed;
  background-size: 100% 110%;
  background-color: black;
}

#regForm,#output {
  background-color: rgba(250,250,250,0.4);
  margin: 100px auto;
  font-family: Raleway;
  padding: 40px;
  width: 60%;
  min-width: 300px;
  box-shadow:1px ;
  box-shadow:2px 2px 10px rgba(0,0,0,0.2);
}

h1 {
  text-align: center;  
}

input {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffeeee;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

button {
  background-color: #4CAF50;
  color: #ffffff;
  border: none;
  padding: 14px 35px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
  letter-spacing: 1.2px;
  width:200px;
  border-radius:10px;
  border:1px solid rgba(10,10,100,0.5);
}
button:hover {
  font-size: 20px;
  box-sizing: border-box;
  padding: 12px 30.5px;
  font-weight: 900;
  box-shadow: inset 0.5px 0.5px 30px rgba(50,220,50,0.6);
}
#prevBtn {background-color: #4CAF50;}
/* Make circles that indicate the steps of the form: */
.step {
  height: 26px;
  width: 35px;
  background-color: #0b0b0b;
  border: none;  
  border-radius: 25px;
  display: inline-block;
  opacity: 0.4;
}
.step.active {opacity: 1;}
.step.finish {background-color: rgba(50,20,250,0.6);opacity: 0.6;}
</style>
<body>
<div class="output" style="display: block" id="output">
  <?php 
  if(isset($_POST['pword']))
    {
      $fname=$_POST['fname']; $lname=$_POST['lname']; $name=$_POST['email'];
      $phone=$_POST['phone']; $dd=$_POST['dd']; $mm=$_POST['mm'];
      $yyyy=$_POST['yyyy']; $uname=$_POST['uname']; $pword=$_POST['pword'];

      $servername = "localhost";       $username = "root"; 
      $password = "hubadmin@ece";      $dbname = "myDBPDO";
      try {
          $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
          // set the PDO error mode to exception
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sql = "INSERT INTO users (fname, lname, email,phone,dob,uname,pass)VALUES ('$fname','$lname','$email','$phone','$dob','$uname','$pword')";
          // use exec() because no results are returned
          $conn->exec($sql); 
          echo "Registration successfully Completed";
          }
      catch(PDOException $e)
          {
          echo $e->getMessage();
          header("location: intern.php");
          }

      $conn = null;
    }
  ?>
  Registration successfully Completed
</div>
</body>
</html>
