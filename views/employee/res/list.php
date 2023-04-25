<?php

use app\controllers\employee\EmployeeResListController;
use app\stores\EmployeeStore;
use app\views\employee\EmployeeViewComponents;

const no_of_approvals = 10;

$components = new EmployeeViewComponents();
$store = EmployeeStore::getEmployeeStore();
$filter = $store->flag_g_t; // getting the filter
$set = $store->flag_g_st; // getting the number of set
$store->flag_g_st = 0; // resetting the set number in the store
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Admin | Resources</title>

    <!-- Font awesome kit -->
    <script crossorigin="anonymous" src="https://kit.fontawesome.com/9b33f63a16.js"></script>
    <!-- Simplebar -->
    <link rel="stylesheet" href="https://unpkg.com/simplebar@latest/dist/simplebar.css"/>
    <script src="https://unpkg.com/simplebar@latest/dist/simplebar.min.js"></script>
    <!-- g28 style -->
    <link rel="stylesheet" href="/scss/main.css" />
    <script src="/js/g28-main.js"></script>
</head>
<body>
<!-- Section: Fixed Components -->
<?php
echo $components->createSidebar('res');
echo $components->createNavbar();
?>
<!-- Section: Fixed Components -->

<!-- Section: Dashboard Layout -->
<div class="canvas nav-cutoff sidebar-cutoff">
    <div class="canvas-inner">
        <!-- Toolbox -->
        <div class="toolbox">
            <div class="block row">
                <div class="col">
                    <div class="nav-search">
                        <form onsubmit="preventDefault();" role="search">
                            <label for="filter-by-search">Search for stuff</label>
                            <input autofocus id="filter-by-search" placeholder="Search..." required type="search"/>
                            <button type="submit">Go</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="separator"></div>
            <form class="block row" method="POST" action="">
                <div class="col">
                    <label for="filter-by-type">Group by: </label>
                </div>
                <div class="col">
                    <g28-selectbox id="filter-by-type" placeholder="All" <?php
                    if ($filter != 'all') {
                        echo 'value="' . match ($filter) {
                                'pharmacy' => 'Pharmacy',
                                'supplier' => 'Supplier',
                                'lab' => 'Laboratory',
                                'delivery' => 'Delivery Partner',
                                default => 'All'
                            } . '"';
                    }
                    ?>>
                        All, Pharmacy, Supplier, Laboratory, Delivery Partner
                    </g28-selectbox>
                </div>
            </form>
        </div>
        <!-- Toolbox -->

        <!-- Content -->
        <div class="row margin-bottom">
            <div class="col">
                <table class="table approval-table">
                    <thead>
                    <tr>
                        <th>Username</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th class="c" style="max-width: 100px">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    try {
                        $controller = new EmployeeResListController();
                        $approvals = match ($filter) {
                            'pharmacy' => $controller->getPharmacyList(no_of_approvals, $set),
                            'supplier' => $controller->getSupplierList(no_of_approvals, $set),
                            'lab' => $controller->getLabList(no_of_approvals, $set),
                            'delivery' => $controller->getDeliveryList(no_of_approvals, $set),
                            default => throw new Exception("Invalid filter!"),
                        };
                        if (!empty($approvals)) {
                            for ($i = 0; $i < no_of_approvals; $i++) {
                                if (array_key_exists($i, $approvals)) {
                                    echo $components->createApprovalItem($approvals[$i]);
                                } else {
                                    echo "<tr class='empty'>";
                                    echo "<td colspan='5'></td>";
                                    echo "</tr>";
                                }
                            }
                        } else {
                            echo "<tr class='empty'>";
                            echo "<td class='no-data' colspan='5' rowspan='".no_of_approvals."'>No records found!</td>";
                            echo "</tr>";
                            for ($i = 0; $i < no_of_approvals - 1; $i++) {
                                echo "<tr></tr>";
                            }
                        }
                    } catch (Exception $e) {
                        echo "Something went wrong!";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Content -->
    </div>
</div>
<!-- Section: Dashboard Layout -->

<!-- g28 styling framework -->
<script type="application/javascript">
    // you can configure variables in here.
    configs.stage = 'dev';
    configs.customFormElmPath = '/scss/components/forms';

    //logging
    logger("Logging g28 initial state before loading specialized JS files...");
    for (let property in configs) {
        logger(`> ${property}: ${configs[property]}`);
    }
</script>
<script src="/js/g28-forms.js"></script>
<script src="/js/employee/approval-list.js"></script>
<!-- g28 styling framework -->
</body>
</html>