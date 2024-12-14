<?php
session_start();
include('DBConnect.php');

if (isset($_GET['cid'])) {
    $cid = mysqli_real_escape_string($dbconnect, $_GET['cid']);
} else {
    echo "ID not found in the URL";
}

// Retrieve campaign data from the database
$select = "SELECT * FROM campaigntable WHERE CampaignID=?";
$stmt1 = $dbconnect->prepare($select);
$stmt1->bind_param("i", $cid);
$stmt1->execute();
$result = $stmt1->get_result();
$aarr = $result->fetch_assoc();

// Get the user ID from the session
$UID = $_SESSION['MemberID'];
$selectuser = "SELECT * FROM membertable WHERE MemberID=?";
$stmt = $dbconnect->prepare($selectuser);
$stmt->bind_param("i", $UID);
$stmt->execute();
$result = $stmt->get_result();
$ucarr = $result->fetch_assoc();

$Showid = $ucarr['MemberID'];
$Showname = $ucarr['firstname'] . ' ' . $ucarr['Surname'];
$Showemail = $ucarr['MemberEmail'];

if (!isset($_SESSION['MemberID'])) {
    echo "<script>window.alert('Please Login Again')</script>";
    echo "<script>window.location='Login.php'</script>";
} else {
    if (isset($_POST['btnsubmit'])) {
        $txtname = $_POST['txtname'];
        $txtemail = $_POST['txtemail'];
        $txtcardnumber = $_POST['txtcardnumber'];

        // Get the selected donation amount from the hidden field or the custom amount field
        $customAmount = (int) $_POST['custom-amount'];  // Ensure custom amount is an integer
        $selectedAmount = isset($_POST['selected-amount']) && !empty($_POST['selected-amount']) ? (int) $_POST['selected-amount'] : $customAmount;
        if (empty($selectedAmount)) {
            echo "<script>alert('Please select a donation amount or enter a custom amount.');</script>";
        } else {
            // Insert data into the jointb table
            $insertSQL = "INSERT INTO jointable (MemberID, CampaignID, CardNumber, Amount) VALUES (?, ?, ?, ?)";
            $stmt = $dbconnect->prepare($insertSQL);
            $stmt->bind_param("iisi", $Showid, $cid, $txtcardnumber, $selectedAmount);
            $stmt->execute();

            // Check if the insertion was successful
            if ($stmt->affected_rows === 1) {
                echo "<script>alert('Thank you for your donation! You are a Good Person I ever meet');</script>";
                echo "<script>window.location='Information.php';</script>";
            } else {
                echo "<script>alert('Error: " . $stmt->error . "');</script>";
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
    <title>Campaign Donation</title>
    <link rel="stylesheet" href="UserStyles.css?i=<?php echo time(); ?>">
    <script src="script.js"></script>
</head>

<body>
    <header class="join-header">
        <h1>Support Our Campaign</h1>
    </header>

    <div class="join-container">
        <a href="Information.php" class="back-button">&larr;Previous Page</a>
        <section class="join-campaign-info">
            <h2>Help Us Make a Difference</h2>
            <p>Your donation will support our efforts to create positive change in our community. Every contribution, no matter how small, brings us closer to our goal.</p>
            <div class="join-progress-bar">
                <div class="join-progress"></div>
            </div>
            <p>$75,000 raised of $100,000 goal</p>
        </section>

        <section class="join-donation-form">
            <h2>Make a Donation</h2>
            <form action="" method="POST">
                <div class="donation-options">
                    <div class="donation-option" data-amount="10">$10</div>
                    <div class="donation-option" data-amount="25">$25</div>
                    <div class="donation-option" data-amount="50">$50</div>
                    <div class="donation-option" data-amount="100">$100</div>
                    <div class="donation-option" data-amount="custom">Custom</div>
                </div>

               
                <input type="hidden" id="selected-amount" name="selected-amount" value="">

                <!-- Custom amount input -->
                <div class="join-form-group" id="custom-amount-group" style="display: none;">
                    <label for="custom-amount">Enter custom amount:</label>
                    <input type="number" id="custom-amount" name="custom-amount" min="1" step="0.01">
                </div>

                <div class="join-form-group">
                    <label for="name">Full Name:</label>
                    <input type="text" id="name" name="txtname" value="<?php echo htmlspecialchars($Showname); ?>" readonly>
                </div>

                <div class="join-form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="txtemail" value="<?php echo htmlspecialchars($Showemail); ?>" readonly>
                </div>

                <div class="join-form-group">
                    <label for="card-number">Card Number:</label>
                    <input type="text" id="card-number" name="txtcardnumber" required>
                </div>
                <input type="hidden" name="txttecid" value="<?php echo $Showid; ?>">
                <button class="join-button" type="submit" name="btnsubmit">Donate Now</button>
            </form>
        </section>


        <section class="join-testimonials">
            <h2>What Our Supporters Say</h2>
            <div class="join-testimonial">
                <p>"I'm proud to support this amazing cause. Together, we can make a real difference!"</p>
                <p>- John D.</p>
            </div>
            <div class="join-testimonial">
                <p>"The work this campaign is doing is truly inspiring. Keep it up!"</p>
                <p>- Sarah M.</p>
            </div>
            <div class="join-testimonial">
                <p>"Every donation counts. I'm glad I could contribute to this important mission."</p>
                <p>- Michael R.</p>
            </div>
        </section>
    </div>

    <script>
        // Handle donation option selection
        document.querySelectorAll('.donation-option').forEach(option => {
            option.addEventListener('click', function() {
                document.querySelectorAll('.donation-option').forEach(opt => opt.classList.remove('selected'));
                this.classList.add('selected');

                // Get the selected amount
                const selectedAmount = this.dataset.amount;

                // Update the hidden input field
                const selectedAmountInput = document.getElementById('selected-amount');

                if (selectedAmount === 'custom') {
                    // Show the custom amount input field
                    document.getElementById('custom-amount-group').style.display = 'block';
                    selectedAmountInput.value = ''; // Reset value for custom amount
                } else {
                    // Hide the custom amount input field
                    document.getElementById('custom-amount-group').style.display = 'none';
                    selectedAmountInput.value = selectedAmount; // Update hidden input with selected amount
                }
            });
        });
    </script>
</body>

</html>