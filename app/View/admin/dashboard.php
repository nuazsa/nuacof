<?php
require_once 'component/navigation.php';
?>

<section id="main">
    <h1>DASHBOARD</h1>
    <div class="summary">
        <div class="col">
            <div class="container">
                <div class="info">
                    <p>Total Users</p>
                    <h1>2.901</h1>
                </div>
                <i class="fa-solid fa-users" style="color: #92BEFF;"></i>
            </div>
            <div class="status">
                <i class="fa-solid fa-caret-up" style="color: green;"></i>
                <p>
                <div style="color: green;">4.2%</div>Up from yesterday</p>
            </div>
        </div>
        <div class="col">
            <div class="container">
                <div class="info">
                    <p>Total Orders</p>
                    <h1>2.901</h1>
                </div>
                <i class="fa-solid fa-boxes-packing" style="color: #E3D76B;"></i>
            </div>
            <div class="status">
                <i class="fa-solid fa-caret-down" style="color: red;"></i>
                <p>
                <div style="color: red;">4.2%</div>Down from yesterday</p>
            </div>
        </div>
        <div class="col">
            <div class="container">
                <div class="info">
                    <p>Total Orders</p>
                    <h1>2.901</h1>
                </div>
                <i class="fa-solid fa-chart-line" style="color: #7CC376;"></i>
            </div>
            <div class="status">
                <i class="fa-solid fa-caret-down" style="color: red;"></i>
                <p>
                <div style="color: red;">4.2%</div>Down from yesterday</p>
            </div>
        </div>
        <div class="col">
            <div class="container">
                <div class="info">
                    <p>Total Orders</p>
                    <h1>2.901</h1>
                </div>
                <i class="fa-solid fa-pizza-slice" style="color: #F87E7E;"></i>
            </div>
            <div class="status">
                <i class="fa-solid fa-caret-up" style="color: green;"></i>
                <p>
                <div style="color: green;">4.2%</div>Up from yesterday</p>
            </div>
        </div>
    </div>
    <div class="graph">

    </div>
</section>

<script>
    document.querySelector('.toggle').addEventListener('click', function() {
        document.querySelector('#sidebar').classList.toggle('collapsed');
        document.querySelector('#navbar').classList.toggle('collapsed');
    });
</script>


</body>

</html>