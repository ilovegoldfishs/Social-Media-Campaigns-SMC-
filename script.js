document.addEventListener('DOMContentLoaded', function () {
    const menuToggle = document.getElementById('menuToggle');
    const sidebar = document.getElementById('sidebar');

    menuToggle.addEventListener('click', function () {
        sidebar.classList.toggle('active');
    });

    // Close sidebar when clicking outside of it
    document.addEventListener('click', function (event) {
        if (!sidebar.contains(event.target) && !menuToggle.contains(event.target)) {
            sidebar.classList.remove('active');
        }
    });

    // Add chart initialization if needed (for pages with charts)
    if (document.getElementById('overviewChart')) {
        createOverviewChart();
    }
    if (document.getElementById('analyticsChart')) {
        createAnalyticsChart();
    }
});

function createOverviewChart() {
    const ctx = document.getElementById('overviewChart').getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Followers',
                data: [5000, 5500, 6200, 7800, 8900, 10234],
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1
            },
            {
                label: 'Engagement Rate',
                data: [3.2, 3.5, 4.1, 4.8, 5.2, 5.7],
                borderColor: 'rgb(255, 99, 132)',
                tension: 0.1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}

function createAnalyticsChart() {
    const ctx = document.getElementById('analyticsChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Facebook', 'Instagram', 'Twitter', 'LinkedIn'],
            datasets: [{
                label: 'Followers',
                data: [5000, 3500, 2200, 1800],
                backgroundColor: [
                    'rgba(59, 89, 152, 0.6)',
                    'rgba(193, 53, 132, 0.6)',
                    'rgba(29, 161, 242, 0.6)',
                    'rgba(0, 119, 181, 0.6)'
                ],
                borderColor: [
                    'rgba(59, 89, 152, 1)',
                    'rgba(193, 53, 132, 1)',
                    'rgba(29, 161, 242, 1)',
                    'rgba(0, 119, 181, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}
