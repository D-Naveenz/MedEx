<?php

use app\views\pharmacy\Components;

$components = new Components();
echo $components->viewHeader("Sell Medicine");
echo $components->navBar($_SESSION['username']);
echo $components->sideBar('sell-medicine');
?>


<div class="canvas nav-cutoff sidebar-cutoff">
    <div class="canvas-inner">
        <div class="row">
            <div class="col">
                <p> Sell Medicine </p>
            </div>
        </div>
    </div>
</div>

</body>
</html>
