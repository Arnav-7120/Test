<?php

session_start();
?>
<!doctype html>
<html lang = "en">
<head>
    <meta charset="UTF-8">
    <title>User_Homepage</title>
    <link rel="stylesheet" href="">
    <link rel="Stylesheet" href="Style3.css">
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-brand">
            <h1><span class="lab la-accusoft"></span> user_office</h1>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="User_HOMEPAGE.html" class="active"><span class="lab la-igloo"></span><span>Dashboard</span></a>
                </li>
                <li>
                    <a href="appoint.html"><span class="lab la-users"></span><span>Book Appointment</span></a>
                </li>
                <li>
                    <a href="User_show_appoint.php"><span class="lab la-igloo"></span><span>Show Appointment</span></a>
                </li>
                <li>
                    <a href="User_cancel_book.php"><span class="lab la-igloo"></span><span>Cancel Appointment Booking</span></a>
                </li>
                <li>
                    <a href=""><span class="lab la-igloo"></span><span>Reschedule Appointment</span></a>
                </li>
                <li>
                    <a href="login1.php"><span class="lab la-igloo"></span><span>Logout</span></a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-content">
        <header>
            <h1>
                <label for="">
                    <span class="las la-bars"></span>
                </label>
                Dashboard
            </h1>
            <div class="search-wrapper">
                <span class="las la-search"></span>
                <input type="search" placeholder="Search here" />
            </div>
            <div class="user-wrapper">
                <img src="User_Pict.png" width="40px" height="40px" alt="">
                <div>
                    <h4>Human</h4>
                    <small>Super Admin</small>
                </div>
            </div>
        </header>
        <main>
            <div class="Cards">
                <div class="card-single">
                    <h1>54</h1>
                    <span>customers</span>
                </div>
                <div>
                    <span class="lab la-google-wallet"></span>
                </div>
            </div>
            <div class="recent-grid">
                <div class="projects">
                    <div class="card">
                        <div class="card-header">
                            <h2>Recents Projects</h2>

                            <button>see all <span class="las.la-arrow-right"></span></button>

                        </div>
                        <div class="card-body">
                            <table width="100%">
                                <thead>
                                    <tr>
                                        <td>Project Title</td>
                                        <td>Department</td>
                                        <td><span class="status"></span>pending</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <TR>
                                        <td>Ui/UX Design</td>
                                        <td>Ui/UX Design</td>
                                        <td>Ui/UX Design</td>
                                        <td><span class="status"></span>review</td>
                                    </TR>
                                </tbody>

                            </table>
                        </div>
                   </div>
                    </div>
                </div>
                  <div class="cust">
                    <div class="card">
                        <div class="card-header">
                            <h2>New Card</h2>

                            <button>see all <span class="las.la-arrow-right"></span></button>

                        </div>
                        <div class="card-body">
                            <div class="Customer1">
                                <div class="info"></div>
                                <img src="" width="40px" height="40px" alt="">
                                <div>
                                    <h4>Lord Canning</h4>
                                    <small>test</small>
                                </div>
                            </div>
                        <div>
                                <span class="las.la-arrow-circle"></span>
                                <span class="las.la-arrow-comment"></span>
                                <span class="las.la-arrow-phone"></span>
                    </div>

                </div>
                        
                    </div>
            </div>
        </main>
    </div>

</body>
</html>
?>
