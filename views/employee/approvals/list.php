<?php

use app\stores\EmployeeStore;
use app\views\employee\EmployeeViewComponents;
use app\controllers\employee\EmployeeApprovalListController;

const no_of_approvals = 9;

$components = new EmployeeViewComponents();
$store = EmployeeStore::getEmployeeStore();
$set = $store->flag_aprv_st; // getting the number of set
$store->flag_aprv_st = 0; // resetting the set number in the store
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Admin | Approvals</title>

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
echo $components->createSidebar('approval');
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
                    <g28-selectbox id="filter-by-type" placeholder="All">
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
                        <th>Type</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th class="c" style="max-width: 100px">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    try {
                        $controller = new EmployeeApprovalListController();
                        $approvals = $controller->getAllApprovals(no_of_approvals, $set);
                        if (!empty($approvals)) {
//                            foreach ($approvals as $approval) {
//                                echo $components->createApprovalItem($approval);
//                            }
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
                            echo "<tr>";
                            echo "<td class='no-data' colspan='5'>There is no approval to check!</td>";
                            echo "</tr>";
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