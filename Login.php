<?php
session_start();
include('DBConnect.php');

function checkLoginAttempts($email, $dbconnect)
{
    $attemptsKey = "login_attempts_" . $email;
    $attempts = isset($_SESSION[$attemptsKey]) ? $_SESSION[$attemptsKey] : 0;
    $lastAttemptKey = "last_attempt_" . $email;
    $lastAttempt = isset($_SESSION[$lastAttemptKey]) ? $_SESSION[$lastAttemptKey] : 0;

    $currentTime = time();
    $blockDuration = 600;

    if ($attempts >= 3 && ($currentTime - $lastAttempt) < $blockDuration) {
        echo "<p>You have made $attempts attempts. You are blocked for 10 minutes.</p>";
        return true;
    } else if ($attempts >= 3 && ($currentTime - $lastAttempt) >= $blockDuration) {
        unset($_SESSION[$attemptsKey]);
        unset($_SESSION[$lastAttemptKey]);
        return false;
    } else {
        return false;
    }
}

function handleLoginAttempt($email, $success, $dbconnect)
{
    $attemptsKey = "login_attempts_" . $email;
    $lastAttemptKey = "last_attempt_" . $email;
    $loginErrorKey = "LoginError";

    if ($success) {
        unset($_SESSION[$attemptsKey]);
        unset($_SESSION[$lastAttemptKey]);
        unset($_SESSION[$loginErrorKey]);
    } else {
        $_SESSION[$attemptsKey] = isset($_SESSION[$attemptsKey]) ? $_SESSION[$attemptsKey] + 1 : 1;
        $_SESSION[$lastAttemptKey] = time();

        if (isset($_SESSION[$loginErrorKey])) {
            $_SESSION[$loginErrorKey]++;
        } else {
            $_SESSION[$loginErrorKey] = 1;
        }
    }

    $attempts = isset($_SESSION[$attemptsKey]) ? $_SESSION[$attemptsKey] : 0;
    echo "<p>Attempt count: $attempts</p>";

    if (isset($_SESSION[$loginErrorKey])) {
        $countererror = $_SESSION[$loginErrorKey];
        echo "<script>window.alert('Login Fail $countererror')</script>";
    }
}

if (isset($_POST['btnlogin'])) {
    $email = $_POST['txtemail'];
    $password = $_POST['txtpassword'];

    if (checkLoginAttempts($email, $dbconnect)) {
        echo "<script>window.alert('Too many login attempts. Please try again in 10 minutes.')</script>";
        echo "<script>window.location='Login.php'</script>";
        exit();
    }

    $checkaccount = "SELECT * FROM membertable WHERE MemberEmail=? AND MemberPassword=?";
    $stmt = mysqli_prepare($dbconnect, $checkaccount);
    mysqli_stmt_bind_param($stmt, "ss", $email, $password);
    mysqli_stmt_execute($stmt);
    $resultaccount = mysqli_stmt_get_result($stmt);
    $rowaccount = mysqli_num_rows($resultaccount);

    if ($rowaccount > 0) {
        $array = mysqli_fetch_array($resultaccount);
        $ID = $array['MemberID'];

        $updateLastLogin = "UPDATE membertable SET MemberloginDate = NOW() WHERE MemberID = '$ID'";
        mysqli_query($dbconnect, $updateLastLogin);

        $_SESSION['MemberID'] = $ID;

        handleLoginAttempt($email, true, $dbconnect);

        echo "<script>window.alert('Dear Member Login Successful')</script>";
        echo "<script>window.location='index.php'</script>";
    } else {
        handleLoginAttempt($email, false, $dbconnect);
        echo "<script>window.location='Login.php'</script>";
    }

    mysqli_stmt_close($stmt);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <title>Login - Social Media Campaigns</title>
    <link rel="stylesheet" href="UserStyles.css?v=<?php echo time(); ?>">
</head>

<body>
    <div class="register">
        <div class="user-container">
            <h1>Customer Login</h1>
            <form class="log-form" action="#" method="post" onsubmit="return rep()">
                <label>Email:</label>
                <input type="email" name="txtemail" required>

                <label for="password">Password:</label>
                <input type="password" name="txtpassword" required id="txtpassword">
                <input type="checkbox" onclick="showPassword()">
                <div id="recaptcha"></div>
                <script type="text/javascript">
                    function rep() {
                        var response = grecaptcha.getResponse();
                        if (response.length == 0) {
                            alert("Please Check the reCAPTCHA!.");
                            return false;
                        }
                        return true;
                    }
                </script>
                <button type="submit" name="btnlogin" disabled>Login</button>
                <script>
                    var recaptchaWidgetId = grecaptcha.render('recaptcha', {
                        'sitekey': '6LfDdVYqAAAAAOQTpf2Tpcgh0RcpXQNwOO_Vk6vI',
                        'callback': function(response) {
                            document.querySelector('button[name="btnlogin"]').disabled = false;
                        }
                    });
                </script>
            </form>
            <div class="register-link">
                <p>Don't have an account ? <a href=" Register.php"> Register here</a></p>
            </div>

            <?php
            if (isset($_POST['btnlogin'])) {
                if (isset($_SESSION['last_attempt_' . $_POST['txtemail']])) {
                    $email = $_POST['txtemail'];
                    $attemptsKey = "login_attempts_" . $email;
                    $attempts = isset($_SESSION[$attemptsKey]) ? $_SESSION[$attemptsKey] : 0;
                    $lastAttemptKey = "last_attempt_" . $email;
                    $lastAttempt = isset($_SESSION[$lastAttemptKey]) ? $_SESSION[$lastAttemptKey] : 0;

                    $currentTime = time();
                    $blockDuration = 600;

                    $remainingTime = $blockDuration - ($currentTime - $lastAttempt);
                    $minutes = floor($remainingTime / 60);
                    $seconds = $remainingTime % 60;
            ?>
                    <p id="countdown">You have made <?php echo $attempts; ?> attempts. You are blocked for <?php echo $minutes; ?> minutes and <?php echo $seconds; ?> seconds.</p>
                    <script>
                        let countdown = document.getElementById("countdown");
                        let time = <?php echo $remainingTime; ?>;
                        let interval = setInterval(function() {
                            let minutes = Math.floor(time / 60);
                            let seconds = time % 60;
                            countdown.textContent = `You have made <?php echo $attempts; ?> attempts. You are blocked for ${minutes} minutes and ${seconds} seconds.`;
                            time--;
                            if (time <= 0) {
                                clearInterval(interval);
                                countdown.textContent = "You can try again now.";
                            }
                        }, 1000);
                    </script>
            <?php
                }
            }
            ?>
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