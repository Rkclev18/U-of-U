<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="homepagestyle.css">
</head>
<body>
    <header>
        <img src="uofu.jpg" alt="Logo">
    </header>

    <main>
        <div class="card">
            <h2>Financials</h2>
            <button type="button" onclick="redirectToFinancials()">Go to Financials</button>
            <script>
                function redirectToFinancials() {
                    window.location.href = "../financial report/financials.php";
                }
            </script>
        </div>
        <div class="card">
            <h2>Team Management</h2>
            <button type="button" onclick="redirectToTeamManagement()">Go to Team Management</button>
            <script>
                function redirectToTeamManagement() {
                    window.location.href = "../team/teammanagement.php";
                }
            </script>
        </div>
        <div class="card">
            <h2>Events</h2>
            <button type="button" onclick="redirectToEvents()">Go to Events</button>
            <script>
                function redirectToEvents() {
                    window.location.href = "../events/events.php";
                }
            </script>
        </div>
        <div class="card">
            <h2>Manage User</h2>
            <button type="button" onclick="redirectToManageUsers()">Manage User</button>
            <script>
                function redirectToManageUsers() {
                    window.location.href = "../users/manageuser.php";
                }
            </script>
        </div>
    </main>
		</br>
	

    <footer>
		<a href="Logout.php">Logout</a>
        <p>&copy; 2024 University of Utah Athletics</p>
    </footer>
</body>
</html>
