<?php
use app\controllers\supplier\SupplierDashboardController;
use app\models\SupplierModel;

?>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Supplier Dashboard</title>
    <link href="../scss/vendor/demo.css" rel="stylesheet" />
    <!-- Font awesome kit -->
    <script crossorigin="anonymous" src="https://kit.fontawesome.com/9b33f63a16.js"></script>
</head>

<body>

    <nav>
        <div class="nav-search">
            <form onsubmit="preventDefault();" role="search">
                <label for="search">Search for stuff</label>
                <input autofocus id="search" placeholder="Search..." required type="search" />
                <button type="submit">Go</button>
            </form>
        </div>
        <div class="nav-inner">
            <ul>
                <li><a href="login"><i class="fa fa-sign-out"></i></a></li>
            </ul>
            <a class="nav-profile" href="#">
                <div class="nav-profile-image">
                    <img alt="Profile image" src="../res/avatar-empty.png" />
                </div>
            </a>
        </div>
    </nav>

    <div class="sidebar">
        <div class="sidebar-inner">
            <nav class="sidebar-header">
                <div class="sidebar-logo">
                    <a href="/dashboard">
                        <img alt="MedEx logo" src="../res/logo/logo-text_light.svg" />
                    </a>
                </div>
            </nav>
            <div class="sidebar-context">
                <h6 class="sidebar-context-title">Menu</h6>
                <ul>
                    <li>
                        <a class="btn" href="/supplier/add-medicine"> <i class="fa fa-medkit"></i> Add New
                            Medicine
                        </a>
                    </li>
                    <li>
                        <a class="btn" href="/supplier/inventory"> <i class="fa fa-dropbox"></i> Inventory </a>
                    </li>
                    <li>
                        <a class="btn" href="/supplier/update-inventory"> <i class="fa fa-plus-square"></i> Update
                            Inventory
                        </a>
                    </li>
                    <li>
                        <a class="btn" href="/supplier/accept-orders"> <i class="fa fa-check-circle"></i> Accept Orders
                        </a>
                    </li>
                    <li>
                        <a class="btn" href="/supplier/medicine-requests"> <i class="fa fa-hourglass-half"></i> Medicine
                            Requests </a>
                    </li>

                    <li>
                        <a class="btn" href="/supplier/contact-us"> <i class="fa fa-phone"></i> Contact Us </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>


    <div class="canvas nav-cutoff sidebar-cutoff">
        <div class="canvas-inner">
            <div class="row">
                <div class="col" style="display: flex; flex-direction: row;">
                    <div class="card g-col-2 g-row-2-start-3"
                        style=" box-shadow: 0 3px 10px rgb(0 0 0 / 0.2); border-radius: 20px; width:50%">
                        <div class="card-body">
                            <div style="padding: 2%;">
                                <div style="display: flex; flex-direction: row;">
                                    <h3 style="padding-right:60%">Supplier Profile</h3><a href='#'
                                        style="padding-top:5%"><i class='fa fa-pencil'></i></a>
                                </div>
                                <?php
                                $sup = new SupplierModel;
                                $sup->getStatus($_SESSION['username']);
                                $sup->getName($_SESSION['username']);
                                echo " <h5> </br> Supplier Username: " . $_SESSION['username'] . "</br></br>";
                                echo " Supplier Name: " . $_SESSION['name'] . "</br></br> Supplier Status: ";
                                if ($_SESSION['stat']) {
                                    echo "<font color='#17A600'>Verfied </font></h5>";
                                } else {
                                    echo "<font color='#FF5854'>Unverfied </font></h5>";
                                }
                                ?>
                            </div>
                        </div>

                    </div>

                    <div class="card g-col-2 g-row-2-start-3"
                        style=" box-shadow: 0 3px 10px rgb(0 0 0 / 0.2); border-radius: 20px; width:50%">
                        <div class="card-body">
                            <div style="padding: 2%;">
                                Graph to be added
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

</body>
</html>