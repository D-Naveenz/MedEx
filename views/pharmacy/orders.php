<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Dashboard</title>
    <link href="../scss2/vendor/demo.css" rel="stylesheet"/>
    <link href="../css/table.css" rel="stylesheet"/>
    <!-- Font awesome kit -->
    <script crossorigin="anonymous" src="https://kit.fontawesome.com/9b33f63a16.js"></script>
</head>

<body>

<nav>
    <div class="nav-search">
        <form onsubmit="preventDefault();" role="search">
            <label for="search">Search for stuff</label>
            <input autofocus id="search" placeholder="Search..." required type="search"/>
            <button type="submit">Go</button>
        </form>
    </div>
    <div class="nav-inner">
        <ul>
            <li><a href="#"><i class="fa-solid fa-circle-question"></i></a></li>
            <li><a href="#"><i class="fa-solid fa-gear"></i></a></li>
            <li><a href="#"><i class="fa-solid fa-bell"></i></a></li>
        </ul>
        <a class="nav-profile" href="#">
            <div class="nav-profile-image">
                <img alt="Profile image" src="../res/avatar-empty.png"/>
            </div>
        </a>
    </div>
</nav>

<div class="sidebar">
    <div class="sidebar-inner">
        <nav class="sidebar-header">
            <div class="sidebar-logo">
                <a href="/dashboard">
                    <img alt="MedEx logo" src="../res/logo/logo-text_light.svg"/>
                </a>
            </div>
        </nav>
        <div class="sidebar-context">
            <h6 class="sidebar-context-title">Menu</h6>
            <ul>
                <li>
                    <a class="btn" href="/pharmacy/sell-medicine"> <i class="fa-solid fa-house"></i> Sell Medicine </a>
                </li>
                <li>
                    <a class="btn" href="/pharmacy/order-medicine"> <i class="fa-solid fa-house"></i> Order Medicine </a>
                </li>
                <li>
                    <a class="btn disabled" href="/pharmacy/orders"> <i class="fa fa-clock-o"></i> Orders </a>
                </li>
                <li>
                    <a class="btn" href="/pharmacy/inventory"> <i class="fa-solid fa-house"></i> Inventory </a>
                </li>
                <li>
                    <a class="btn" href="/pharmacy/contact-us"> <i class="fa-solid fa-house"></i> Contact Us </a>
                </li>
            </ul>
        </div>
    </div>
</div>


<div class="canvas nav-cutoff sidebar-cutoff">
    <div class="canvas-inner">
        <div class="row">
            <div class="col">


                <div class="orders">
                            <table>
                                <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Order Date</th>
                                    <th>Order Status</th>
                                    <th>Order Total</th>
                                    <th>Delivery Date</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>

                <?php

                use app\controllers\pharmacy\PharmacyOrderHistoryController;
                use app\core\ExceptionHandler;
                use app\models\PharmacyOrderModel;

                if (isset($_SESSION['pharmacyId'])) {
                    $pharmacy_id = $_SESSION['pharmacyId'];
                    $orders = (new PharmacyOrderHistoryController)->getOrdersByPharmacyId($pharmacy_id);
                    if ($orders) {
                        foreach ($orders as $order) {
//                            echo "<tr>";
//                            echo "<td>" . $order['order_id'] . "</td>";
//                            echo "<td>" . $order['order_date'] . "</td>";
//                            echo "<td>" . $order['order_status'] . "</td>";
//                            echo "<td>" . $order['order_total'] . "</td>";
//                            echo "</tr>";

                            echo "<tr>";
//                            echo "<a href='/pharmacy/order-details?order_id='" . $order['id'] . "'>";
                            echo "<td>" . $order['id'] . "</td>";
                            echo "<td>" . $order['order_date'] . "</td>";
//                            echo "<td>" . $order['order_status'] . "</td>";
                            echo "<td>" . (new PharmacyOrderHistoryController)->transformOrderStatus($order['order_status']) . "</td>";
//                            echo "<td>" . $order['order_total'] . "</td>";
                            echo "<td>" . (new PharmacyOrderHistoryController)->transformOrderTotal($order['order_total']) . "</td>";
//                            echo "<td>" . $order['delivery_date'] . "</td>";
                            echo "<td>" . (new PharmacyOrderHistoryController)->transformDeliveryDate($order['delivery_date']) . "</td>";
                            echo "<td>" ."<a href='' id='".$order['id']."'>" . "<i class='fa-solid fa-circle-arrow-right view-order-details' style='color:#333333'></i>" ."</a>" . "</td>";
                            echo "</a>";
                            echo "</tr>";

                        }
                    } else {
                        echo "<tr>";
                        echo "<td colspan='6'>No Orders</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr>";
                    echo "<td colspan='6' style='text-align: center'>No Orders</td>";
                    echo "</tr>";
//                    echo (new ExceptionHandler)->somethingWentWrong();
                }
                ?>
                </tbody>
                </table>
            </div>



            </div>
        </div>
    </div>
</div>

</body>
</html>
