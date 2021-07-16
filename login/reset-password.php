
<!-- 
HTML
Creator Name: @pritesh jha
date: 7/12/2020
 -->
 <?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate new password
    if(empty(trim($_POST["new_password"]))){
        $new_password_err = "Please enter the new password.";     
    } elseif(strlen(trim($_POST["new_password"])) < 6){
        $new_password_err = "Password must have atleast 6 characters.";
    } else{
        $new_password = trim($_POST["new_password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm the password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($new_password_err) && ($new_password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
        
    // Check input errors before updating the database
    if(empty($new_password_err) && empty($confirm_password_err)){
        // Prepare an update statement
        $sql = "UPDATE users SET password = ? WHERE id = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);
            
            // Set parameters
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Password updated successfully. Destroy the session, and redirect to login page
                session_destroy();
                header("location: login.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
    <style type="text/css">
        * {
              box-sizing:border-box;
            }
        body{
                font: 14px sans-serif;
                background:#ddd;
                font-family:"Raleway";
            }
        .wrapper{   position:absolute;
                      top:50%;
                      left:50%;
                      transform:translate(-50%,-50%);
                      
                      background:#f5f5f5;
                      box-shadow:5px 5px 10px 5px #ccc;
                    width: 350px; 
                    padding: 20px;

                }
        .wrapper form{ padding:5px; }
        .wrapper .form-group {margin:10px 0px;}
        .wrapper .form-group input{
                                      width:100%;
                                      padding:10px;
                                      border:1px solid #aaa;
                                      font-size:16px;
                                      background:#f5f5f5;
                                      border-radius:5px;
                                      outline:none;  
                                    }
        .wrapper .form-group label {
                                          color:#111;
                                    }
        .wrapper .form-group button {
                                          margin-top:5px;
                                          width:100%;
                                          padding:10px;
                                          border:none;
                                          outline:none;
                                          background:#00acee;
                                          color:#f5f5f5;
                                          font-size:16px;
                                          text-transform:uppercase;
                                          cursor:pointer;
                                          border-radius:5px;
                                    }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Reset Password</h2>
        <p>Please fill out this form to reset your password.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
            <div class="form-group <?php echo (!empty($new_password_err)) ? 'has-error' : ''; ?>">
                <label>New Password</label>
                <input type="password" name="new_password" class="form-control" value="<?php echo $new_password; ?>">
                <span class="help-block"><?php echo $new_password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" value="Submit">Submit</button>
                <button> <a class="btn btn-link" href="welcome.php">Cancel</a></button>
            </div>
        </form>
    </div>    
</body>
</html>