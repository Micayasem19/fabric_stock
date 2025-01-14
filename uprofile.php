<?php
include 'includes/config.php';
session_start();
$user_id = $_SESSION['user_id'];



$image = "SELECT CONCAT(firstname, ' ', lastname) as name, email, contact, type_of_user, pwd , image_name, date_inserted FROM users where id = $user_id";
$result_image = mysqli_query($conn, $image);
$row1 = $result_image->fetch_assoc();
?>

<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/table.css">
    <link rel="stylesheet" href="./style/top.css">
    <link rel="stylesheet" href="./style/livesearch.css">
    <link rel="stylesheet" href="./style/modal.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

    <style>
        .dashboard {
            margin-top: 20px;
            background-color: #3498db;
            /* Dark Blue Background */
            color: #fff;
            /* White Text Color */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 51, 102, 0.1);
            /* Light Blue Shadow */
        }

        .profile-card {
            background-color: #ffffff;
            /* White Background */
            border: 2px solid #66b3ff;
            /* Light Blue Border */
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 51, 102, 0.1);
            /* Light Blue Shadow */
        }

        .profile-image img {
            border: 2px solid #66b3ff;
            /* Light Blue Border */
            border-radius: 50%;
            /* Make it a circle */
        }

        .profile-name {
            color: #003366;
            /* Dark Blue Text Color */
            font-size: 1.5em;
            /* Larger font size */
            font-weight: bold;
            /* Bold font weight */
            margin-top: 10px;
            /* Space from the image */
        }

        .profile-details {
            margin-top: 20px;
            /* Space from the profile name */
        }

        .details {
            margin-bottom: 10px;
            /* Space between details */
        }

        .text {
            color: #003366;
            /* Dark Blue Text Color */
        }

        .submit input {
            background-color: #3498db;
            /* Dark Blue Button Background */
            color: #fff;
            /* White Text Color */
            padding: 10px 15px;
            /* Add padding to the button */
            border: none;
            /* Remove button border */
            border-radius: 5px;
            /* Add button border-radius */
            cursor: pointer;
            /* Change cursor to pointer on hover */
        }
    </style>



    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Admin Dashboard Panel</title>
</head>

<body>


    <nav>
        <div class="nav-profile-card">
            <span class="nav-profile-image">
                <img src="img/profile_image/<?php echo $row1['image_name']; ?>" width='100' height='100'>
            </span>

            <span class="nav-profile-name">
                <?php

                echo $row1['name'];
                ?>
            </span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="dashboard.php">
                        <img src="./img/nav-icons/dashboard.png" class="icon" alt="icon">
                        <span class="link-name">Dashboard</span>
                    </a></li>
                <li><a href="stock.php">
                        <img src="./img/nav-icons/stock.png" class="icon" alt="icon">
                        <span class="link-name">Stocks</span>
                    </a></li>
                <li><a href="user.php">
                        <img src="./img/nav-icons/user-list.png" class="icon" alt="icon">
                        <span class="link-name">User's List</span>
                    </a></li>

                <li><a href="profile.php">
                        <img src="./img/nav-icons/account.png" class="icon" alt="icon">
                        <span class="link-name">Profile</span>
                    </a></li>

                <li class="open-button">
                    <i class="uil uil-signout"></i>
                    <span class="link-name" id="openModalBtn">Logout</span>
                </li>


            </ul>




        </div>
    </nav>
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">

            <p> Do you really wanna log out?</p>
            <div class="modal-choice">
                <span class="close btn" id="closeModalBtn">No</span>
                <a class="btn" href="index.php">Yes</a>

            </div>

        </div>

    </div>


    <section class="dashboard">
        <div class="profile-card">
            <div class="data-list profile-image">
                <img src="img/profile_image/<?php echo $row1['image_name']; ?>" alt="Profile Image">
            </div>

            <span class="profile-name">
                <?php

                echo $row1['name'];
                ?>
            </span>

            <div class="profile-details">
                <div class="details">
                    <p class="text">Email:
                        <?php echo $row1['email']; ?>
                    </p>
                </div>

                <div class="details">
                    <p class="text">Contact:
                        <?php echo $row1['contact']; ?>
                    </p>
                </div>

                <div class="details">
                    <p class="text">Password:
                        <?php echo $row1['pwd']; ?>
                    </p>
                </div>

                <div class="details">
                    <p class="text">Date joined:
                        <?php echo $row1['date_inserted']; ?>
                    </p>
                </div>
            </div>

            <form action="includes/edit_user.php" method="post" class="submit">
                <input type='hidden' name='id' value='<?php echo $user_id ?>'>
                <input type='submit' class='table-btn' value='Update'>
            </form>
        </div>
    </section>

    <footer>
        Created by: FSCS

    </footer>

</body>

</html>
<script>
    // Get the modal and the buttons
    var modal = document.getElementById("myModal");
    var openModalBtn = document.getElementById("openModalBtn");
    var closeModalBtn = document.getElementById("closeModalBtn");

    // Open the modal
    openModalBtn.onclick = function () {
        modal.style.display = "block";
    };

    // Close the modal
    closeModalBtn.onclick = function () {
        modal.style.display = "none";
    };

    // Close the modal if the user clicks outside of it
    window.onclick = function (event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    };

</script>