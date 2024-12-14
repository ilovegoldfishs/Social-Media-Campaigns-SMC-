<?php
include('DBConnect.php');

$fname = '';
$sname = '';
$email = '';
$pass = '';
$confpass = '';
$phone = '';
$date = '';
$gender = '';
$profile = '';

if (isset($_POST['btnregister'])) {
    $fname = $_POST['txtfname'];
    $sname = $_POST['txtsname'];
    $email = $_POST['txtemail'];
    $pass = $_POST['txtpassword'];
    $confpass = $_POST['txtconfpassword'];
    $phone = $_POST['txtphone'];
    $date = $_POST['txtdob'];
    $gender = $_POST['colgender'];
    //Photo upload
    $img = $_FILES['txtprofile']['name'];
    $Folder = "../image/";
    $path = $Folder . "_" . $img;
    $copy = copy($_FILES['txtprofile']['tmp_name'], $path);
    if (!$copy) {
        echo "<p>Photo Cannot Upload</p>";
    }
    // Validate password strength
    $Uppercase = preg_match('@[A-Z]@', $pass);
    $Lowercase = preg_match('@[a-z]@', $pass);
    $SpecialChars = preg_match('@[^\w]@', $pass);
    $Number = preg_match('@[0-9]@', $pass);

    if (empty($fname) || strlen($fname) < 3) {
        echo "<script>alert('Username must be at least 3 characters long');</script>";
        echo "<script>document.getElementsByName('txtfname')[0].focus();</script>";
    } else if (empty($sname) || strlen($sname) < 3) {
        echo "<script>alert('Username must be at least 3 characters long');</script>";
        echo "<script>document.getElementsByName('txtsname')[0].focus();</script>";
    } elseif (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email address');</script>";
        echo "<script>document.getElementsByName('txtemail')[0].focus();</script>";
    } elseif (empty($phone)) {
        echo "<script>alert('Invalid phone number');</script>";
        echo "<script>document.getElementsByName('txtphone')[0].focus();</script>";
    } elseif (empty($date)) {
        echo "<script>alert('Date of birth is required');</script>";
        echo "<script>document.getElementsByName('txtdob')[0].focus();</script>";
    } elseif (empty($gender)) {
        echo "<script>alert('Gender is required');</script>";
        echo "<script>document.getElementsByName('colgender')[0].focus();</script>";
    } elseif (empty($path)) {
        echo "<script>alert('Profile picture is required');</script>";
        echo "<script>document.getElementsByName('txtprofile')[0].focus();</script>";
    } elseif ($pass != $confpass) {
        echo "<script>alert('Password and confirm password do not match');</script>";
        echo "<script>document.getElementsByName('txtpassword')[0].focus();</script>";
    } elseif (!$Uppercase || !$Lowercase || !$Number || !$SpecialChars || strlen($pass) < 8) {
        echo "<script>alert('Password should be at least 8 characters in length and should include at least one upper case letter, one special character and one number');</script>";
        echo "<script>document.getElementsByName('txtpassword')[0].focus();</script>";
    } else {
        // Check if email and phone number already exist
        $checksame = "SELECT * FROM membertable WHERE MemberEmail='$email' AND MemberPassword='$pass'";
        $result = mysqli_query($dbconnect, $checksame);
        $row = mysqli_num_rows($result);

        if ($row > 0) {
            echo "<script>alert('Already Exit E-mail and Password! Sorry');</script>";
        } else {
            $currentDateTime = date("Y-m-d H:i:s");
            $insertdata = "INSERT INTO membertable(firstname,Surname,MemberEmail,MemberPassword,PhoneNo,MembersignupDate,MemberloginDate,Comment,DateofBirth,Gender,profile) 
            values ('$fname','$sname','$email','$pass','$phone','$currentDateTime',NULL,NULL,'$date','$gender','$path')";
            $result = mysqli_query($dbconnect, $insertdata);

            if ($result) {
                echo "<script>alert('Member Register Successfull! Nice');</script>";
                echo "<script>window.location='Register.php';</script>";
            } else {
                echo "<script>alert('Please Register Again!');</script>";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Social Media Campaigns</title>
    <link rel="stylesheet" href="UserStyles.css?v=<?php echo time(); ?>">
</head>

<body>
    <div class="register">
        <div class="user-container">
            <h1>Register</h1>
            <form class="log-form" action="Register.php" method="post" enctype="multipart/form-data">
                <div class="profile-section">
                    <div id="profile-image-container" class="profile-image-placeholder">
                        <span>+</span>
                    </div>
                    <label for="profile-upload" class="profile-upload-label">Choose Profile Picture</label>
                    <input type="file" id="profile-upload" name="txtprofile" accept="image/*" value="<?php echo $profile; ?>">
                </div>

                <label>Firstname:</label>
                <input type="text" name="txtfname" required value="<?php echo $fname; ?>">

                <label>Surname:</label>
                <input type="text" name="txtsname" required value="<?php echo $sname; ?>">

                <label>Email:</label>
                <input type="email" name="txtemail" required value="<?php echo $email; ?>">

                <label>Password:</label>
                <input type="password" name="txtpassword" required id="txtpassword">
                <input type="checkbox" onclick="showPassword()">

                <label>Confirm Password:</label>
                <input type="password" name="txtconfpassword" required id="txtcpassword">
                
                <label>Phone Number:</label>
                <input type="text" name="txtphone" value="<?php echo $phone; ?>">

                <label>Date of Birth:</label>
                <input type="date" name="txtdob" value="<?php echo $date; ?>">

                <label>Gender:</label>
                <select id="gender" name="colgender" value="<?php echo $gender; ?>">
                    <option value="">Prefer not to say</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
                <button type="reset" class="btn btn-secondary">Cancel</button>
                <button type="submit" name="btnregister">Register</button>
            </form>
            <div class="login-link">
                <p>Already have an account? <a href="Login.php">Login here</a></p>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const profileUpload = document.getElementById('profile-upload');
                const profileImageContainer = document.getElementById('profile-image-container');

                profileUpload.addEventListener('change', function(event) {
                    const file = event.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            profileImageContainer.innerHTML = '';
                            const img = document.createElement('img');
                            img.src = e.target.result;
                            img.alt = 'Profile Picture';
                            img.classList.add('profile-image');
                            profileImageContainer.appendChild(img);
                        }
                        reader.readAsDataURL(file);
                    }
                });
            });


            function showPassword() {
                var x = document.getElementById("txtpassword");
                var y = document.getElementById("txtcpassword");
                if (x.type === "password" && y.type === "password") {
                    x.type = "text";
                    y.type = "text";
                } 
                else {
                    x.type = "password";
                    y.type = "password";
                }
            }
        </script>
    </div>
</body>

</html>