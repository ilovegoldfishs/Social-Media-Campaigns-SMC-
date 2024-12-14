<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analytics - Social Media Dashboard</title>
    <link rel="stylesheet" href="Styles.css?v=<?php echo time(); ?>">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <div class="dashboard">
        <header class="dash-header">
            <h1>Social Media Dashboard</h1>
            <button id="menuToggle" class="menu-toggle">☰</button>
        </header>
        <nav id="sidebar">
            <ul>
                <li><a href="Dashboard.php">Overview</a></li>
                <li><a href="Analytics.php" class="active">Analytics</a></li>
                <li><a href="Campaigns.php">Campaigns</a></li>
                <li><a href="CampaignsType.php">Campaigns Type</a></li>
                <li><a href="Media.php">Media</a></li>
                <li><a href="Technique.php">Security Techniques</a></li>
                <li><a href="User.php">Customer</a></li>
                <li><a href="Donation.php">Donation</a></li>
            </ul>
        </nav>
        <main>
            <section id="analytics">
                <h2>Analytics</h2>
                <div class="chart-container">
                    <canvas id="analyticsChart"></canvas>
                </div>
            </section>
        </main>
    </div>
    <script src="script.js?k=<?php echo time(); ?>"></script>
</body>

</html>