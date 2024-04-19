<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/admin/root.css">
    <link rel="stylesheet" href="/css/admin/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title><?= $model['title']; ?></title>
</head>

<body>
    <section id="navbar">
        <i class="fa-solid fa-magnifying-glass"></i>
        <div class="user">
            <i class="fa-regular fa-bell"></i>
            <div class="account">
                <i class="fa-solid fa-circle-user"></i>
                <div class="info">
                    <h4><?= $model['data']['name']; ?></h4>
                    <p><?= $model['data']['role']; ?></p>
                </div>
            </div>
        </div>
    </section>
    <section id="sidebar" class="collapsed">
        <div class="sidebar-menu">
            <div class="toggle">
                <i class="fa-solid fa-bars"></i>
            </div>
            <a href="dashboard" class="menu <?= ($model['title'] == 'Dashboard') ? 'menu-active' : '' ?>">
                <i class="fa-solid fa-layer-group"></i>
                <h4>Dashboard</h4>
            </a>
            <a href="products" class="menu <?= ($model['title'] == 'Products') ? 'menu-active' : '' ?>">
                <i class="fa-solid fa-martini-glass-citrus"></i>
                <h4>Products</h4>
            </a>

            <a href="orders" class="menu">
                <i class="fa-regular fa-rectangle-list"></i>
                <h4>Orders</h4>
            </a>
            <a href="ui" class="menu">
                <i class="fa-solid fa-paintbrush"></i>
                <h4>UI</h4>
            </a>
            <a href="manager" class="menu">
                <i class="fa-solid fa-crown"></i>
                <h4>Manager</h4>
            </a>
            <a href="standings" class="menu">
                <i class="fa-solid fa-arrow-up-wide-short"></i>
                <h4>Standings</h4>
            </a>
            <a href="logout" class="menu">
                <i class="fa-solid fa-power-off"></i>
                <h4>Logout</h4>
            </a>
        </div>
    </section>