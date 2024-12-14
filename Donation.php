<?php
session_start();
include('DBConnect.php');

if (!isset($_SESSION['ADMINID'])) {
    echo "<script>window.alert('Please Login Again')</script>";
    echo "<script>window.location='AdminLogin.php'</script>";
    exit;
}

// Function to get dashboard data
function getDashboardData($dbconnect)
{
    // Get total donations
    $sql = "SELECT SUM(Amount) as totalDonations FROM jointable";
    $result = $dbconnect->query($sql);
    $totalDonations = $result->fetch_assoc()['totalDonations'];

    // Get total campaigns
    $sql = "SELECT COUNT(DISTINCT CampaignID) as totalCampaigns FROM jointable";
    $result = $dbconnect->query($sql);
    $totalCampaigns = $result->fetch_assoc()['totalCampaigns'];

    // Get total users
    $sql = "SELECT COUNT(DISTINCT MemberID) as totalUsers FROM membertable";
    $result = $dbconnect->query($sql);
    $totalUsers = $result->fetch_assoc()['totalUsers'];

    return [
        'totalDonations' => $totalDonations,
        'totalCampaigns' => $totalCampaigns,
        'totalUsers' => $totalUsers
    ];
}

// Function to get donation data
function getDonationData($dbconnect, $page)
{
    $itemsPerPage = 10;
    $offset = ($page - 1) * $itemsPerPage;

    // Get donations data
    $sql = "SELECT j.JoinID, u.firstname,u.Surname, c.CampaignName, j.Amount, j.CardNumber
            FROM jointable j
            JOIN membertable u ON j.MemberID = u.MemberID
            JOIN campaigntable c ON j.CampaignID = c.CampaignID
            ORDER BY j.JoinID DESC
            LIMIT $offset, $itemsPerPage";

    $result = $dbconnect->query($sql);

    $donations = [];
    while ($row = $result->fetch_assoc()) {
        $donations[] = [
            'firstname' => $row['firstname'],
            'surname' => $row['Surname'],
            'campaignName' => $row['CampaignName'],
            'amount' => $row['Amount'],

        ];
    }

    // Get total number of donations
    $sql = "SELECT COUNT(*) as total FROM jointable";
    $result = $dbconnect->query($sql);
    $totalDonations = $result->fetch_assoc()['total'];

    $totalPages = ceil($totalDonations / $itemsPerPage);

    return [
        'donations' => $donations,
        'currentPage' => $page,
        'totalPages' => $totalPages
    ];
}

// Handle AJAX requests
if (isset($_GET['action'])) {
    header('Content-Type: application/json');

    if ($_GET['action'] === 'dashboard') {
        echo json_encode(getDashboardData($dbconnect));
    } elseif ($_GET['action'] === 'donations') {
        $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
        echo json_encode(getDonationData($dbconnect, $page));
    }

    $dbconnect->close();
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Campaign Donations</title>
    <link rel="stylesheet" href="Styles.css?v=<?php echo time(); ?>">
    <script src="script.js"></script>
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
                <li><a href="Analytics.php">Analytics</a></li>
                <li><a href="Campaigns.php">Campaigns</a></li>
                <li><a href="CampaignsType.php">Campaigns Type</a></li>
                <li><a href="Media.php">Media</a></li>
                <li><a href="Technique.php">Security Techniques</a></li>
                <li><a href="Member.php">Member</a></li>
                <li><a href="Donation.php" class="active">Donation</a></li>
            </ul>
        </nav>
        <main>
            <div class="donate-container">
                <section class="donate-dashboard">
                    <div class="donate-card">
                        <h3>Total Donations</h3>
                        <p id="total-donations">Loading...</p>
                    </div>
                    <div class="donate-card">
                        <h3>Total Campaigns</h3>
                        <p id="total-campaigns">Loading...</p>
                    </div>
                    <div class="donate-card">
                        <h3>Total Users</h3>
                        <p id="total-users">Loading...</p>
                    </div>
                </section>

                <section>
                    <h2>Recent Donations</h2>
                    <table class="donate-table">
                        <thead>
                            <tr>
                                <th>Firstname</th>
                                <th>Surname</th>
                                <th>Campaign</th>
                                <th>Amount</th>

                            </tr>
                        </thead>
                        <tbody id="donations-table-body">
                            <!-- Donation data will be inserted here -->
                        </tbody>
                    </table>
                    <div class="pagination" id="pagination">
                        <!-- Pagination links will be inserted here -->
                    </div>
                </section>
            </div>

            <script>
                // Function to fetch and display dashboard data
                function fetchDashboardData() {
                    fetch('Donation.php?action=dashboard')
                        .then(response => response.json())
                        .then(data => {
                            document.getElementById('total-donations').textContent = '$' + data.totalDonations;
                            document.getElementById('total-campaigns').textContent = data.totalCampaigns;
                            document.getElementById('total-users').textContent = data.totalUsers;
                        })
                        .catch(error => console.error('Error fetching dashboard data:', error));
                }

                // Function to fetch and display donation data
                function fetchDonationData(page = 1) {
                    fetch(`Donation.php?action=donations&page=${page}`)
                        .then(response => response.json())
                        .then(data => {
                            const tableBody = document.getElementById('donations-table-body');
                            tableBody.innerHTML = '';
                            data.donations.forEach(donation => {
                                const row = `
                            <tr>
                                <td>${donation.firstname}</td>
                                <td>${donation.surname}</td>
                                <td>${donation.campaignName}</td>
                                <td>$${donation.amount}</td>
                                
                            </tr>
                        `;
                                tableBody.innerHTML += row;
                            });
                            updatePagination(data.currentPage, data.totalPages);
                        })
                        .catch(error => console.error('Error fetching donation data:', error));
                }

                // Function to update pagination links
                function updatePagination(currentPage, totalPages) {
                    const pagination = document.getElementById('pagination');
                    pagination.innerHTML = '';
                    for (let i = 1; i <= totalPages; i++) {
                        const link = document.createElement('a');
                        link.href = '#';
                        link.textContent = i;
                        if (i === currentPage) {
                            link.classList.add('active');
                        }
                        link.addEventListener('click', (e) => {
                            e.preventDefault();
                            fetchDonationData(i);
                        });
                        pagination.appendChild(link);
                    }
                }

                // Initial data fetch
                fetchDashboardData();
                fetchDonationData();

                // Refresh data every 20 seconds
                setInterval(fetchDashboardData, 20000);
                setInterval(() => fetchDonationData(1), 20000);
            </script>
        </main>
    </div>
</body>

</html>