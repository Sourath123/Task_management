<?php
//echo 'hi';die;

ob_start();

session_start();

//print_r($_SESSION);die;

if (!isset($_SESSION['login']) || (isset($_SESION['login']) && $_SESSION['login'] == 0)) {

   // header('Location: login.php');
} else {



    if (isset($_SESSION['login_user_type']) && $_SESSION['login_user_type'] == "admin" || $_SESSION['login_user_type'] == "adhan") {

        $loginid = $_SESSION['uid'];
    } else {

      //  header('Location: login.php');
    }
}

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta http-equiv="content-type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <meta name="description" content />

    <meta name="author" content />

    <title>Task Management</title>


    <link href="css/styles.css" rel="stylesheet" />

    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        crossorigin="anonymous" />

    <script data-search-pseudo-elements defer
        src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.27.0/feather.min.js"
        crossorigin="anonymous"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body class="nav-fixed">

    <nav class="topnav navbar navbar-expand shadow navbar-light bg-white" id="sidenavAccordion">

      

        <button class="btn btn-icon btn-transparent-dark order-1 order-lg-0 mr-lg-2" id="sidebarToggle" href="#"><i
                data-feather="menu"></i></button>



        <ul class="navbar-nav align-items-center ml-auto">

            <li class="nav-item dropdown no-caret mr-2 dropdown-user">

                <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage"
                    href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false"><i data-feather="user"></i><i
                        class="fas fa-chevron-down dropdown-arrow"></i></a>

                <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up"
                    aria-labelledby="navbarDropdownUserImage">

                    <h6 class="dropdown-header d-flex align-items-center">

                        <i data-feather="user" class="dropdown-user-img"></i>

                        <div class="dropdown-user-details">

                            <div class="dropdown-user-details-name">
                                <?= ucfirst($_SESSION['login_user_type']); ?>
                            </div>

                            <div class="dropdown-user-details-email">
                                <?= $_SESSION['email']; ?>
                            </div>

                        </div>

                    </h6>

                    <div class="dropdown-divider"></div>


                    <a class="dropdown-item" href="logout.php">

                        <div class="dropdown-item-icon"><i data-feather="log-out"></i></div>

                        Logout

                    </a>

                </div>

            </li>

        </ul>

    </nav>

    <div id="layoutSidenav">

        <div id="layoutSidenav_nav">

            <nav class="sidenav shadow-right sidenav-light">

                <div class="sidenav-menu">

                    <div class="nav accordion" id="accordionSidenav">

                        <div class="sidenav-menu-heading d-none">Admin Dashboard</div>
                        <?php if($_SESSION['login_user_type'] == "user"){?>
                        <!-- <a class="nav-link" href="dashboard.php">

                            <div class="nav-link-icon"><i data-feather="activity"></i></div>

                            Dashboard

                        </a> -->

                        <a class="nav-link" href="list_tasks.php">

                            <div class="nav-link-icon"><i data-feather="activity"></i></div>

                            Tasks

                        </a>
                   
                  
                    <?php } ?>

                       
                    </div>

                </div>

                <div class="sidenav-footer">

                    <div class="sidenav-footer-content">

                        <div class="sidenav-footer-subtitle">Logged in as:</div>

                        <div class="sidenav-footer-title">
                            <?= $_SESSION['username']; ?>
                        </div>

                    </div>

                </div>

            </nav>

        </div>