<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> I LOVE TWICE </title> 
    <link rel="stylesheet" href="reg.css">
    <script src="javaa.js"></script>
    <?php
  include "../Connection/dbconn.php";
  include 'registerr.php';
  ?>
  </head>
<body>
    <div class="container">
        <form method="post" action="Register.php">
        <div class="flex-column">
            <label for="user_id">User ID:</label>
            <div class="inputForm">
            <input type="text" class="input" id="user_id" name="user_id" placeholder="Enter ID" required>
            </div>
        <div class="flex-column">
            <label for="first_name">First Name:</label>
            <div class="inputForm">
            <input type="text" class="input" id="first_name" name="first_name" placeholder="Enter Firstname" required>
            </div>  
        <div class="flex-column">    
            <label for="last_name">Last Name:</label>
            <div class="inputForm">
            <input type="text" class="input" id="last_name" name="last_name" placeholder="Enter Lastname" required>
            </div>
        <div class="flex-column">   
            <label for="gender">Gender:</label>
            <div class="inputForm">
            <select id="gender" class="input" name="gender">
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
            </div>
        <div class="flex-column">  
            <label for="email">Email:</label>
            <div class="inputForm">
            <input type="email" class="input" id="email" name="Email" placeholder="Ex. Aizen@gmail.com" required>
            </div>
        <div class="flex-column">     
            <label for="username">Username:</label>
            <div class="inputForm">
            <input type="text" class="input" id="username" name="username" placeholder="Enter Password" required>
            </div>  
        <div class="flex-column">
            <label>Password:</label></div>
            <div class="inputForm">
            <svg class="svg" height="20" viewBox="-64 0 512 512" width="20" xmlns="http://www.w3.org/2000/svg"><path d="m336 512h-288c-26.453125 0-48-21.523438-48-48v-224c0-26.476562 21.546875-48 48-48h288c26.453125 0 48 21.523438 48 48v224c0 26.476562-21.546875 48-48 48zm-288-288c-8.8125 0-16 7.167969-16 16v224c0 8.832031 7.1875 16 16 16h288c8.8125 0 16-7.167969 16-16v-224c0-8.832031-7.1875-16-16-16zm0 0"></path><path d="m304 224c-8.832031 0-16-7.167969-16-16v-80c0-52.929688-43.070312-96-96-96s-96 43.070312-96 96v80c0 8.832031-7.167969 16-16 16s-16-7.167969-16-16v-80c0-70.59375 57.40625-128 128-128s128 57.40625 128 128v80c0 8.832031-7.167969 16-16 16zm0 0"></path></svg>        
            <input type="password" class="input" id="myInput" name="password" placeholder="Enter your Password">
            <input type="checkbox" class="checkboxx" onclick="myFunction()">
          </div>
            <button class="button-submit">Sign In</button>
        <p class="p">Don't have an account? <span class="span"> <a href="../Login/index.php">Login now</a></h3> </span>
        </form>
    </div>
</body>
</html>
