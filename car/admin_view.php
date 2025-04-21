<!DOCTYPE html>
<html lang="en">

<head>
    <title>Carbook</title>
    <link rel="stylesheet" href="css/admin_view.css" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet" />
</head>

<body>
    <header>
        <div class="first-menu-group">
            <a class="navbar-logo" href="admin_view.php">Ezy<span class="Rentals">Rental</span></a>
        </div>

        <div class="middle-menu-group">
            <ul class="nav_links">
                <li class="nav-item ">
                    <a href="admin_view.php" class="nav-link">Home</a>
                </li>

                </li>
            </ul>
        </div>

        <div class="last-menu-group">
            <ul class="nav_links">
                <?php
                session_start();

                if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
                    $first_name = $_SESSION['username'];
                    echo "<li class='nav-item'><h1>Welcome, $first_name!</h1></li>";
                    echo "<a href='logout.php' name='logout' class='nav-link'>Logout</a>";
                } else {
                    echo "<a href='login.php' class='nav-link'>Login</a>";
                }
                ?>

            </ul>
        </div>
        <!-- END nav -->
        <div class="menu-logo">
            <img src="images/menu.png" alt="" onclick="toggleMenu()" />
        </div>
    </header>

    <div class="main-page">
        <div class="background-image"></div>
        <div class="text-container">
            <h1>Welcome to Admin</h1>
            <p>
                As an administrator, you have access to the administrator dashboard,
                where you can <br />easily manage your inventory and bookings. You can
                add new cars to your inventory, <br />delete existing ones, and track
                the bookings <br />
                for each car.renting your dream car below.
            </p>
        </div>
    </div>

    <section class="second-page">
        <div class="container">
            <div class="upper-div">
                <h2>Manage Directory</h2>
                <p>
                    As an administrator, you have access to the administrator dashboard,
                    where you can easily manage your inventory and bookings. You can add
                    new cars to your inventory, delete existing ones, and track the
                    bookings for each car.
                </p>
            </div>

            <div class="lower-div">
                <div class="action-div">
                    <h3>Add Cars</h3>
                    <p>
                        Quickly and easily add new cars to your inventory, including make,
                        model, and rental price.
                    </p>
                    <button onclick="window.location.href='add_car.php'">
                        Go to Add Cars
                    </button>
                </div>

                <div class="action-div">
                    <h3>Delete Car</h3>
                    <p>
                        Remove cars from your inventory that are no longer available for
                        rent or need to be taken off the lot.
                    </p>
                    <button onclick="window.location.href='delete.php'">
                        Go to Delete Car
                    </button>
                </div>

                <div class="action-div">
                    <h3>Track Orders</h3>
                    <p>
                        Stay on top of your bookings and ensure that each car is being
                        rented out on time with no conflicts.
                    </p>
                    <button onclick="window.location.href='track.php'">
                        Go to Track Orders
                    </button>
                </div>
            </div>
        </div>

        <div class="container2">
            <div class="first-div">
                <h2>Create New Admin</h2>
                <p>Enter the required information below to create a new admin.</p>
                <div class="second-div">
                    <button onclick="window.location.href='admin_registration.php'">
                        Create New Admin
                    </button>
                </div>
            </div>
        </div>
    </section>
    <script src="css/admin_view.js"></script>
</body>

</html>