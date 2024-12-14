<?php
include('DBConnect.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nav</title>
</head>

<body>
    <header>
        <div class="container">
            <nav>
                <div class="nav-logo">Social Media Hub</div>
                <button class="mobile-menu-toggle">☰</button>
                <div class="nav-links">
                    <?php
                    if (isset($_SESSION['MemberID']) && !empty($_SESSION['MemberID'])) {
                        echo "
                <a href='index.php' class='nav-link'>Home</a>
                <a href='Information.php' class='nav-link'>Information</a>
                <a href='SocialMedia.php' class='nav-link'>Social Media Apps</a>
                <a href='Howparentscanhelp.php' class='nav-link'>Parents Can Help</a>
                <a href='Livestreaming.php' class='nav-link'>Livestreaming</a>
                <a href='Contact.php' class='nav-link'>Contact</a>
                <a href='Guidance.php' class='nav-link'>Guidance</a>";
                    } else {
                        echo " <a href='index.php' class='nav-link'>Home</a>
                <a href='Howparentscanhelp.php' class='nav-link'>Parents Can Help</a>
                <a href='Livestreaming.php' class='nav-link'>Livestreaming</a>
                ";
                    }
                    ?>
                    <div class="dropdown">
                        <a href="#" class="nav-link">Profile</a>
                        <div class="dropdown-content">
                            <?php
                            if (isset($_SESSION['MemberID']) && !empty($_SESSION['MemberID'])) {
                                echo "<a href='Logout.php'>Logout</a>
                        <a href='Profile.php'>View Profile</a>";
                            } else {
                                echo " <a href='Login.php'>Login</a>
                        <a href='Register.php'>Register</a>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </nav>
            
        </div>
        
        </nav>
        </div>
    </header>
    <script>
        // JavaScript for mobile menu toggle
        const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
        const navLinks = document.querySelector('.nav-links');

        mobileMenuToggle.addEventListener('click', () => {
            navLinks.classList.toggle('active');
        });

        // Close mobile menu when clicking outside
        document.addEventListener('click', (e) => {
            if (!navLinks.contains(e.target) && !mobileMenuToggle.contains(e.target)) {
                navLinks.classList.remove('active');
            }
        });
    </script>
</body>

</html>