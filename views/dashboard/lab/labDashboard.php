<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Dashboard - Lab Partner</title>

    <link href="/scss/main.css" rel="stylesheet"/>
    <script src="/js/lq-sidemenu.js"></script>
    <!-- Font awesome kit -->
    <script crossorigin="anonymous" src="https://kit.fontawesome.com/9b33f63a16.js"></script>
</head>
<body class="app-window">
<section>
    <lq-side-menu>
        <a class="sidebar-list-itm" href="#">Orders</a>
        <a class="sidebar-list-itm" href="#">Contact Us</a>
    </lq-side-menu>
</section>
<section class="lqs-space">
    <nav class="lqs-space-fixed">
        <div class="navbar-logo">
            <a href="#">
                <img alt="MedEx Logo with name" src="/res/logo/logo-text_light.svg"/>
            </a>
        </div>
        <div class="navbar-inner">
            <ul class="navbar-routes">
                <li><a href="#">Home</a></li>
                <li><a href="#">Account</a></li>
                <li><a class="disabled">Dashboard</a></li>
                <li><a href="#">About Us</a></li>
            </ul>
            <div class="navbar-separator"></div>
            <div class="navbar-account">
                <!-- User state: anonymous -->
                <a class="btn btn-info">Login</a>
                <a class="btn btn-warning">Register</a>
            </div>
        </div>
    </nav>
    <div class="canvas">
        <article>
            <section class="dashboard">
                <!-- Ongoing tests-->
                <div class="card card-widget widget-1">
                    <div class="card-header">
                        Some Icons
                    </div>
                    <div class="card-body">
                        <ul>
                            <li>Test-001</li>
                            <li>Test-002</li>
                        </ul>
                        <h5 class="card-title">Ongoing Tests</h5>
                    </div>
                </div>
                <!-- Total Earnings -->
                <div class="card card-widget widget-2">
                    <div class="card-header">
                        Some Icons
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            LKR 13400.00
                        </p>
                        <h5 class="card-title">Total Earnings</h5>
                        <span>Last Month</span>
                    </div>
                </div>
                <!--Completed tests-->
                <div class="card card-widget widget-3">
                    <div class="card-header">
                        Some Icons
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            142
                        </p>
                        <h5 class="card-title">Total Tests Completed</h5>
                        <span>Last Month</span>
                    </div>
                </div>
                <!-- Table -->
                <div class="card widget-4">
                    <div class="card-body">
                        <table>
                            <thead>
                            <tr>
                                <th>Test Type</th>
                                <th>Test ID</th>
                                <th>Deadline</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                            <thead>
                            <tbody>
                            <tr>
                                <td>Type A</td>
                                <td>Test-003</td>
                                <td>12.11.22</td>
                                <td>LKR 120</td>
                                <td>Some buttons</td>
                            </tr>
                            <tr>
                                <td>Type A</td>
                                <td>Test-003</td>
                                <td>12.11.22</td>
                                <td>LKR 120</td>
                                <td>Some buttons</td>
                            </tr>
                            <tr>
                                <td>Type A</td>
                                <td>Test-003</td>
                                <td>12.11.22</td>
                                <td>LKR 120</td>
                                <td>Some buttons</td>
                            </tr>
                            <tr>
                                <td>Type A</td>
                                <td>Test-003</td>
                                <td>12.11.22</td>
                                <td>LKR 120</td>
                                <td>Some buttons</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </article>
    </div>
</section>
</body>
</html>