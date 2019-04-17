<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
<title>Welcome page</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;
	
      /*background-color: lightblue;*/
}

/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
button {
    background-color:    deepskyblue;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
    background-color: aliceblue ;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
}
    
@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
</style>
</head>
<body>

<center><h1>Welcome</h1>

<button onclick="document.getElementById('Login').style.display='block'" style="width:auto;">Login</button>
<button onclick="document.getElementById('SignUp').style.display='block'" style="width:auto;">SignUp</button>
</center>
<div id="Login" class="modal">
   <?php include('errors.php'); ?>
  <form method="post" class="modal-content animate" action="server.php">
    <div class="imgcontainer">
      <span onclick="document.getElementById('Login').style.display='none'" class="close" title="Close Modal">&times;</span>
     
    </div>

    <div class="container">
       
        <center> <h2>Login Form</h2> </center> 
         <b>Username</b>
        <input type="text" placeholder="Enter Username" name="un" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="p" required>
        
        <button type="submit" name="login"> Login</button>
		
      
    </div>

    <div class="container" style="background-color:  lightsteelblue">
        <center> <button type="button" onclick="document.getElementById('Login').style.display='none'" class="cancelbtn">Cancel</button></center>
      
    </div>
  </form>
</div>
<div id="SignUp" class="modal">
   <?php include('errors.php'); ?>
  <form method="post" class="modal-content animate" action="login.php">
    <div class="imgcontainer">
      <span onclick="document.getElementById('SignUp').style.display='none'" class="close" title="Close Modal">&times;</span>
      

    </div>

    <div class="container">
        <center> <h2>Sign Up Form</h2> </center> 
      <label for="fname"><b>First Name</b></label>
      <input type="text" placeholder="First Name" name="fname" required>
      
      <label for="lname"><b>Last Name</b></label>
      <input type="text" placeholder="Last Name" name="lname" required>
      
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Username" name="uname" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
      
	   <label for="psw"><b>Confirm Password</b></label>
      <input type="password" placeholder="Enter Password" name="cpsw" required>
      
        
      <button type="submit" name="reguser" >Sign Up</button>
      <
    </div>

    <div class="container" style="background-color:#f1f1f1">
        <center><button type="button" onclick="document.getElementById('SignUp').style.display='none'" class="cancelbtn">Cancel</button>
        </center>
    </div>
  </form>
</div>

<script>
    // Get the modal
    var modal = document.getElementById('Login');
	var modal1 = document.getElementById('SignUp');
	
     
	//alert("Login Error");
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
		else if (event.target == modal1){
			modal1.style.display = "none";
		}
    }
</script>

</body>
</html>
