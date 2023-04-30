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
        <form method="POST" action="">
            <div class="form-group">
                <label for="exampleFormControlInput1">Email address</label>
                <input type="email" class="form-input" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput2">TextBox disabled</label>
                <input type="email" class="form-input disabled" id="exampleFormControlInput2" placeholder="Disabled text" disabled>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">SelectBox (legacy)</label>
                <select class="form-input" id="exampleFormControlSelect1">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleCustomSelectBox1">SelectBox (new: g28 style)</label>
                <g28-selectbox id="exampleCustomSelectBox1" placeholder="Please select an item">
                    Item 1, Item 2, Item 3, Item 4, Item 5
                </g28-selectbox>
            </div>
            <div class="form-group">
                <label  for="exampleCustomSelectBox2">Disabled SelectBox (new: g28 style)</label>
                <g28-selectbox id="exampleCustomSelectBox2" class="disabled" placeholder="The selectbox is disabled">
                    Item 1, Item 2, Item 3, Item 4, Item 5
                </g28-selectbox>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect2">SelectBox: multiple selections</label>
                <select multiple class="form-input" id="exampleFormControlSelect2">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Textarea</label>
                <textarea class="form-input" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormFileUpload1">File Upload</label>
                <input class="form-input" type="file" id="exampleFormFileUpload1" accept="image/*">
            </div>
            <div class="selector-group">
                <label class="form-check-label">Horizontal(Default) Selector Group</label>
                <div class="form-selector">
                    <input type="checkbox" class="form-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <div class="form-selector">
                    <input type="radio" class="form-input" id="exampleRadio1">
                    <label class="form-check-label" for="exampleRadio1">Check me out</label>
                </div>
            </div>
            <div class="selector-group vertical">
                <label>Vertical Selector Group</label>
                <div class="form-selector">
                    <input type="checkbox" class="form-input" id="exampleCheck2">
                    <label class="form-check-label" for="exampleCheck2">Check me out</label>
                </div>
                <div class="form-selector">
                    <input type="radio" class="form-input" id="exampleRadio2">
                    <label class="form-check-label" for="exampleRadio2">Check me out</label>
                </div>
            </div>
            <div class="button-group">
                <button type="submit" class="btn btn-primary">Submit: Default(left align)</button>
            </div>
            <div class="button-group center">
                <button type="submit" class="btn btn-primary">Submit: Center align</button>
            </div>
            <div class="button-group right">
                <button type="submit" class="btn btn-primary">Submit: Right align</button>
            </div>
        </form>
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

    document.querySelectorAll('.approval-table tbody tr:not(.empty)').forEach((row) => {
        row.addEventListener('click', (e) => {
            e.stopPropagation();
            if (e.target.tagName === 'TD') {
                let entity = row.getAttribute('data-usr');
                let type = row.getAttribute('data-tp');
                window.location.href = '/employee/res/' + type + '?et=' + entity;
            }
        });
    });
</script>
<script src="/js/g28-forms.js"></script>
<!-- g28 styling framework -->
</body>
</html>
