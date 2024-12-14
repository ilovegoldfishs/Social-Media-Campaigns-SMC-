<?php
include('DBConnect.php');
$currentPage = basename($_SERVER['PHP_SELF'], ".php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer</title>
    <link rel="stylesheet" href="UserStyles.css?i=<?php echo time(); ?>">
    <script src="script.js"></script>
</head>

<body>
    <footer>
        <div class="container">
            <div class="footer-grid">
                <div>
                    <h3 class="footer-title">About Us</h3>
                    <p>We are dedicated to helping you navigate the world of social media and create impactful campaigns.</p>
                </div>
                <div>
                    <h3 class="footer-title">Quick Links</h3>
                    <ul class="footer-links">
                        <?php
                        if (isset($_SESSION['MemberID']) && !empty($_SESSION['MemberID'])) {
                            echo "
                <li><a href=Index.php class='footer-link'>Home</a></li>
                        <li><a href='Information.php' class='footer-link'>Information</a></li>
                        <li><a href='SocialMedia.php' class='footer-link'>Social Media Apps</a></li>
                        <li><a href='Howparentscanhelp.php' class='footer-link'>Parents Can Help</a></li>
                        <li><a href='Livestreaming.php' class='footer-link'>Livestreaming</a></li>
                        <li><a href='Contact.php' class='footer-link'>Contact</a></li>
                        <li><a href='Guidance.php' class='footer-link'>Guidance</a></li>";
                        } else {
                            echo " 
                            <li><a href=Index.php class='footer-link'>Home</a></li>
                            <li><a href='Howparentscanhelp.php' class='footer-link'>Parents Can Help</a></li>
                        <li><a href='Livestreaming.php' class='footer-link'>Livestreaming</a></li>";
                        }
                        ?>
                    </ul>
                </div>
                <div>
                    <h3 class="footer-title">Contact Us</h3>
                    <ul class="footer-links">
                        <li>Myanamr@socialmediahub.com</li>
                        <li>+959 456-7890</li>
                        <li>123 Social St, Yangon City, SM 12345</li>
                        <li>You are here: <span><?php echo ucfirst($currentPage); ?></span></li>
                    </ul>
                </div>
            </div>
            <div class="footer-separator"></div>
            <div class="footer-bottom">
                <p>&copy; 2024 Social Media Hub. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>

</html>