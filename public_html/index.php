<?php

use namefeeder\FlashMessage;
use namefeeder\UserSession;

require_once(
    realpath(__DIR__)
    . DIRECTORY_SEPARATOR
    . '..' . DIRECTORY_SEPARATOR
    . 'php' . DIRECTORY_SEPARATOR
    . 'inc.php'
);

$errorMessage = FlashMessage::getFlashMessage('error');
$successMessage = FlashMessage::getFlashMessage('success');
if (UserSession::getSessionId() != 0) {
    header('Location:profile.php');
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Sign Up</title>
 <link rel="stylesheet" type="text/css" href="/styles/src/app.css">
</head>
<body> 
 <br/>
  <div class="message">
        <?php if ($errorMessage != '') {
            ?>
          <div class="error-message">
                <?= $errorMessage ?>
           </div>
            <?php
        } ?>
        <?php if ($successMessage != '') {
            ?>
            <div class="success-message">
                <?= $successMessage ?>
           </div>
            <?php
        } ?>
  </div>
 <br/>
  <div class="container">
        <div class="container-2">
          <div class="header">
               <h4>Welcome to Project Namefeeder</h4> 
            </div>
         <form id="signup_form" class="signup" name="signup" action="send.php" method="post">
               <div class="row" >
                     <p class="text1">sign up to project.namefeeder.com</p><br/>
                    <div class="row-body">
                     <p class="text2">First name</p>
                        <td><input type="text" class="formInput" id="fname" placeholder="Enter First name" autofocus name="fname"></td>
                        <h5 id="fname_error"></h5>
                 </div>
                 <div class="row-body">
                     <p class="text2">Last name</p>
                     <td><input type="text" class="formInput" id="lname" placeholder="Enter Last name" autofocus name="lname"></td>
                     <h5 id="lname_error"></h5>
                 </div>
                 <div class="row-body">
                     <p class="text2">Email Address</p>
                     <td><input type="email" class="formInput" id="nemail" placeholder="Enter Email Address" autofocus name="nemail"></td>
                      <h5 id="email_error"></h5>
                 </div>
                 <div class="row-body">
                     <p class="text2">Birthday</p>
                      <td><input type="date" id="bday" class="formInput" placeholder="Select Birthday" autofocus name="bdate"></td>
                      <h5 id="bday_error"></h5>
                  </div>
                 <div class="row-body">
                     <p class="text2">Create Password</p>
                       <td><input type="Password" id="pass" class="formInput" placeholder="Enter Password" autofocus name="npass"></td>
                       <h5 id="pass_error"></h5>
                  </div>
                 <div class="row-body">
                     <p class="text2">Confirm Password</p>
                      <td><input type="Password" id="conpass" class="formInput" placeholder="Re-Enter Password" autofocus name="rpass"></td>
                     <h5 id="re_pass_error"></h5>
                   </div>
                 <div class="row-2">
                        <div class="row-body2">
                            <input type="submit" class="formButton"  name="submit" value="Sign up"/>
                       </div>
                 </div>
                 <p class="text_link_signup" id="linkloging"> have an account? Sign in</p>
              </div>
         </form>
            <form id="signin_form" name="signin" class="signin" action="send.php" method="post">
               <div class="row" >
                     <p class="text1">sign in to project.namefeeder.com</p><br/>
                    <div class="row-body">
                     <p class="text2">User Email ddress</p>
                     <td><input type="email" class="formInput" id="nemailLogin" placeholder="Enter Email Address" autofocus name="emailLogin"></td>
                     <h5 id="email_login_error"></h5>
                   </div>
                 <div class="row-body">
                     <p class="text2">Enter Password</p>
                        <td><input type="Password" id="passLogin" class="formInput" placeholder="Enter Password" autofocus name="passLogin"></td>
                      <h5 id="pass_login_error"></h5>
                    </div>
                 <div class="row-2">
                        <input type="submit" class="formButton"  name="signin" value="Sign in"/>
                   </div>
                 <p class="text_link_signup" id="linkcreatAcc" > Don't have an account? Create account </p>
             </div>
         </form>

           <div class="footer">
               <p class="text3">Thank You</p>
         </div>
     </div>
 </div>
 <script src="js/vendor/jquery-3.6.3.min.js"></script>
  <script src="/js/src/app.js"></script>
</body>
</html>
