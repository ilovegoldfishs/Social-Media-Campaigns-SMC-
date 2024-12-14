<?php
include('DBConnect.php');
if (isset($_POST['btnsubmit'])) {
    $id = $_POST['txtcustomerid'];
    $message = $_POST['txtmessage'];
    // Prepare and execute update statement
    $updateSQL = "UPDATE membertable SET Comment=? WHERE MemberID=?";
    $stmt = $dbconnect->prepare($updateSQL);
    $stmt->bind_param("si", $message, $id);

    if ($stmt->execute()) {
        echo "<script>window.alert('Submit Comment Success');</script>";
        echo "<script>window.location='Contact.php';</script>";
    } else {
        echo "Error: " . $stmt->error;  // Error handling for debugging
        echo "<script>window.alert('Submit Comment Fail');</script>";
        echo "<script>window.location='Contact.php';</script>";
    }
    $stmt->close();
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="UserStyles.css?i=<?php echo time(); ?>">
    <script src="script.js"></script>
</head>

<body>
    <!---Nav Bar---->
    <?php include('MemberNav.php') ?>
    <?php
    $uid = $_SESSION['MemberID'];
    $selectuser = "SELECT * FROM membertable WHERE MemberID=?";
    $stmt = $dbconnect->prepare($selectuser);
    $stmt->bind_param("i", $uid);
    $stmt->execute();
    $result = $stmt->get_result();
    $ucarr = $result->fetch_assoc();
    $Showid = $ucarr['MemberID'];
    $Showname = $ucarr['firstname'] . ' ' . $ucarr['Surname']; // concatenate firstname and Surname
    $Showemail = $ucarr['MemberEmail'];

    ?>

    <div class="contact-container">
        <section class="content-section">
            <h2>Send us a message</h2>
            <form class="contact-form" action="Contact.php" method="POST">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" value="<?php echo htmlspecialchars($Showname); ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" value="<?php echo htmlspecialchars($Showemail); ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="message">Message:</label>
                    <textarea id="message" name="txtmessage" rows="5" required></textarea>
                </div>
                <input type="hidden" name="txtcustomerid" value="<?php echo $Showid; ?>">
                <button class="contact-button" type="submit" name="btnsubmit">Send Message</button>
            </form>
            <div class="privacy-policy">
                By submitting this form, you agree to our <a href="Privacy-policy.html">Privacy Policy</a>.
            </div>
        </section>

        <?php
        $showuser = "SELECT * FROM membertable limit 4";
        $userquery = mysqli_query($dbconnect, $showuser);
        while ($userarray = mysqli_fetch_array($userquery)) {
            $uname = $userarray['firstname'] . ' ' . $userarray['Surname']; // concatenate firstname and Surname
            $ucom = $userarray['Comment'];
        ?>
            <section class="content-section">
                <h2>Recent Messages</h2>
                <div class="message-cards">
                    <div class="message-card">
                        <div class="message-content">
                            <p class="message-author"><?php echo $uname; ?></p>
                            <p><?php echo $ucom; ?></p>
                        </div>
                    </div>
                </div>
            </section>
        <?php
        }
        ?>

        <section class="content-section faq-section">
            <h2>Frequently Asked Questions</h2>
            <div class="faq-item">
                <p class="faq-question">Q: How long does it usually take to get a response?</p>
                <p>A: We aim to respond to all inquiries within 24 hours during business days.</p>
            </div>
            <div class="faq-item">
                <p class="faq-question">Q: Can I schedule a call with your team?</p>
                <p>A: Yes, you can request a call by mentioning it in your message, and we'll arrange a suitable time.</p>
            </div>
            <div class="faq-item">
                <p class="faq-question">Q: Do you offer support on weekends?</p>
                <p>A: We offer limited support on weekends for urgent matters. Regular inquiries are addressed on the next business day.</p>
            </div>
        </section>
    </div>

    <!---Footer Bar---->
    <?php include('MemberFooter.php') ?>
</body>

</html>