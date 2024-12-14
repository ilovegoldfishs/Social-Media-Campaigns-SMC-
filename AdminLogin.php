<?php
session_start();
include('DBConnect.php');

// Check for existing login attempts
function checkLoginAttempts($email, $dbconnect)
{
    $attemptsKey = "login_attempts_" . $email;
    $attempts = isset($_SESSION[$attemptsKey]) ? $_SESSION[$attemptsKey] : 0;
    $lastAttemptKey = "last_attempt_" . $email;
    $lastAttempt = isset($_SESSION[$lastAttemptKey]) ? $_SESSION[$lastAttemptKey] : 0;

    $currentTime = time();
    $blockDuration = 600; // 10 minutes in seconds

    // Check if the user is blocked
    if ($attempts >= 3 && ($currentTime - $lastAttempt) < $blockDuration) {
        echo "<script>window.alert('Too many login attempts. Please try again in 10 minutes.')</script>";
        echo "<script>window.location='AdminLogin.php'</script>";
        exit(); // Stop further execution
    } else if ($attempts >= 3 && ($currentTime - $lastAttempt) >= $blockDuration) {
        // Reset attempts if block duration passed
        unset($_SESSION[$attemptsKey]);
        unset($_SESSION[$lastAttemptKey]);
        return false;
    } else {
        return false;
    }
}

// Handle login attempts
function handleLoginAttempt($email, $success, $dbconnect)
{
    $attemptsKey = "login_attempts_" . $email;
    $lastAttemptKey = "last_attempt_" . $email;

    if ($success) {
        // Reset attempts on successful login
        unset($_SESSION[$attemptsKey]);
        unset($_SESSION[$lastAttemptKey]);
    } else {
        // Increment attempts on failed login
        $_SESSION[$attemptsKey] = isset($_SESSION[$attemptsKey]) ? $_SESSION[$attemptsKey] + 1 : 1;
        $_SESSION[$lastAttemptKey] = time();
    }
}

if (isset($_POST['btnlogin'])) {
    $Aemail = $_POST['txtAemail'];
    $Apassword = $_POST['txtApass'];

    // Check if the user is blocked
    if (checkLoginAttempts($Aemail, $dbconnect)) {
        exit(); // Stop further execution
    }

    // Prepare the query
    $Admincheckaccount = "SELECT * FROM admintable WHERE AdminEmail=? AND AdminPassword=?";
    $stmt = mysqli_prepare($dbconnect, $Admincheckaccount);

    // Bind the parameters
    mysqli_stmt_bind_param($stmt, "ss", $Aemail, $Apassword);

    // Execute the query
    mysqli_stmt_execute($stmt);

    // Get the result
    $resultaccount = mysqli_stmt_get_result($stmt);

    // Get the number of rows
    $Adminrowaccount = mysqli_num_rows($resultaccount);

    if ($Adminrowaccount > 0) {
        $array = mysqli_fetch_array($resultaccount);
        $AID = $array['AdminID'];
        $Aname = $array['AdminName'];

        // Update the last login timestamp
        $updateLastLogin = "UPDATE admintable SET AdminLastLogin = NOW() WHERE AdminID = '$AID'";
        mysqli_query($dbconnect, $updateLastLogin);

        $_SESSION['ADMINID'] = $AID;
        $_SESSION['ADMINNAME'] = $Aname;

        handleLoginAttempt($Aemail, true, $dbconnect);

        echo "<script>window.alert('Admin Login Successful')</script>";
        echo "<script>window.location='Dashboard.php'</script>";
    } else {
        handleLoginAttempt($Aemail, false, $dbconnect);

        echo "<script>window.alert('Admin Login Fail')</script>";
        echo "<script>window.location='AdminLogin.php'</script>";
    }

    // Close the statement
    mysqli_stmt_close($stmt);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="Styles.css?v=<?php echo time(); ?>">
</head>

<body>
    <div class="register">
        <div class="user-container">
            <h1>Admin Login</h1>
            <form class="log-form" action="#" method="post">
                <label>Email:</label>
                <input type="email" name="txtAemail" required>

                <label for="password">Password:</label>
                <input type="password" name="txtApass" required id="txtpassword">
                <input type="checkbox" onclick="showPassword()">

                <button type="submit" name="btnlogin">Login</button>
            </form>
        </div>
    </div>
    <script>
        function showPassword() {
            var x = document.getElementById("txtpassword");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</body>

</html>