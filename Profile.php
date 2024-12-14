<?php
session_start();
include('DBConnect.php');

// Get User ID from session
$UID = $_SESSION['MemberID'];

// Retrieve user data from database
$selectUser = "SELECT * FROM membertable WHERE MemberID=?";
$stmt = $dbconnect->prepare($selectUser);
$stmt->bind_param("i", $UID);
$stmt->execute();
$result = $stmt->get_result();
$userArray = $result->fetch_assoc();

// Assign user data to variables
$Showid = $userArray['MemberID'];
$Showfname = $userArray['firstname'];
$Showsname = $userArray['Surname'];
$Showemail = $userArray['MemberEmail'];
$Showphone = $userArray['PhoneNo'];
$Showdob = $userArray['DateofBirth'];
$Showgender = $userArray['Gender'];
$Showphoto = $userArray['profile'];
$Showname = $userArray['firstname'] . ' ' . $userArray['Surname']; // concatenate firstname and Surname

// Update user data
if (isset($_POST['btnsubmit'])) {
    $fname = $_POST['txtfname'];
    $sname = $_POST['txtsname'];
    $email = $_POST['txtemail'];
    $phone = $_POST['txtphone'];
    $dob = $_POST['dob'];
    $gender = $_POST['colgender'];

    // Image upload handling
    if ($_FILES['txtuserphoto']['size'] > 0) {
        $upphoto = uniqid() . "_" . $_FILES['txtuserphoto']['name'];  // Ensure unique filename
        $folder = '../image/';
        $path = $folder . $upphoto;

        if (!move_uploaded_file($_FILES['txtuserphoto']['tmp_name'], $path)) {
            echo "<p>Image Cannot Upload</p>";
            exit();
        }
    } else {
        // If no new image is uploaded, use the existing image path
        $path = $Showphoto;
    }

    // Prepare and execute update statement
    $updateSQL = "UPDATE membertable SET firstname=?,Surname=?, MemberEmail=?, PhoneNo=?, DateofBirth=?, Gender=?, profile=? WHERE MemberID=?";
    $stmt = $dbconnect->prepare($updateSQL);
    $stmt->bind_param("sssssssi", $fname,$sname, $email, $phone, $dob, $gender, $path, $Showid);

    if ($stmt->execute()) {
        echo "<script>window.alert('Update Profile Success');</script>";
        echo "<script>window.location='Profile.php';</script>";
    } else {
        echo "Error: " . $stmt->error;  // Error handling for debugging
        echo "<script>window.alert('Update Profile Fail');</script>";
        echo "<script>window.location='Profile.php';</script>";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="UserStyles.css?i=<?php echo time(); ?>">
    <script src="script.js"></script>
</head>

<body>
    <div class="profile-container">
    <h1>Welcome  <?php echo htmlspecialchars($Showname); ?> Profile</h1>
    <a href="index.php" class="back-button">&larr;Previous Page</a>
        <form class="profile-form" action="Profile.php" method="POST" enctype="multipart/form-data">
            <div class="profile-form-group">
                <label for="username">Firstname:</label>
                <input type="text" id="username" name="txtfname"  value="<?php echo htmlspecialchars($Showfname); ?>" required>
            </div>

            <div class="profile-form-group">
                <label for="username">Surname:</label>
                <input type="text" id="username" name="txtsname"  value="<?php echo htmlspecialchars($Showsname); ?>" required>
            </div>

            <div class="profile-form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="txtemail"  value="<?php echo htmlspecialchars($Showemail); ?>" required>
            </div>

            <div class="profile-form-group">
                <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" name="txtphone" value="<?php echo htmlspecialchars($Showphone); ?>">
            </div>

            <div class="profile-form-group">
                <label for="dob">Date of Birth:</label>
                <input type="date" id="dob" name="dob" value="<?php echo date('Y-m-d', strtotime($Showdob)); ?>">
            </div>

            <div class="profile-form-group">
                <label for="gender">Gender:</label>
                <select id="gender" name="colgender">
                    <option value="<?php echo htmlspecialchars($Showgender); ?>"><?php echo htmlspecialchars($Showgender); ?></option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                    <option value="prefer-not-to-say">Prefer not to say</ option>
                </select>
            </div>

            <div class="profile-form-group">
                <label for="user-photo">
                    User Photo</label>
                <div class="file-input-wrapper">
                    <input type="file" id="user-photo" name="txtuserphoto" accept="image/*" onchange="localFile(event)">
                    <label for="user-photo" id="user-text">Upload Profile</label>
                </div>
                <p><img src="<?php echo htmlspecialchars($Showphoto); ?>" id="output"></p>

                <script type="text/javascript">
                    var localFile = function(event) {
                        var img = document.getElementById('output');
                        img.src = URL.createObjectURL(event.target.files[0]);
                    };
                </script>
                <br><br>
            </div>

            <button type="submit" class="btnsubmit" name="btnsubmit">Update Profile</button>
        </form>
    </div>
    
</body>

</html>