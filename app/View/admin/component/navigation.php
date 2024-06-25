<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/admin/root.css">
    <link rel="stylesheet" href="/css/admin/navigation.css">
    <link rel="stylesheet" href="/css/admin/<?= $model['css']; ?>.css">
    <link rel="shortcut icon" href="/images/ad-login.svg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title><?= $model['title']; ?></title>
</head>

<body>
    <section id="navbar">
        <div class="search">
            <i class="fa-solid fa-magnifying-glass"></i>
        </div>
        <div class="user">
            <i class="fa-regular fa-bell"></i>
            <div class="account">
                <i class="fa-solid fa-circle-user"></i>
                <div class="info">
                    <h4><?= $_SESSION['admin']['name']; ?></h4>
                    <p><?= $_SESSION['admin']['role']; ?></p>
                </div>
            </div>
        </div>
    </section>
    <section id="sidebar" class="collapsed">
        <div class="sidebar-menu">
            <div class="toggle">
                <i class="fa-solid fa-bars"></i>
            </div>
            <a href="/admin/dashboard" class="menu <?= ($model['title'] == 'Dashboard') ? 'menu-active' : '' ?>">
                <i class="fa-solid fa-layer-group"></i>
                <h4>Dashboard</h4>
            </a>
            <a href="/admin/products" class="menu <?= ($model['title'] == 'Products' || $model['title'] == 'Add Product' || $model['title'] == 'Edit Product') ? 'menu-active' : '' ?>
">
                <i class="fa-solid fa-martini-glass-citrus"></i>
                <h4>Products</h4>
            </a>

            <a href="/admin/orders" class="menu <?= ($model['title'] == 'Orders' || $model['title'] == 'ViewOrder' ) ? 'menu-active' : '' ?>">
                <i class="fa-regular fa-rectangle-list"></i>
                <h4>Orders</h4>
            </a>
            <a href="/admin/ui" class="menu <?= ($model['title'] == 'UI') ? 'menu-active' : '' ?>">
                <i class="fa-solid fa-paintbrush"></i>
                <h4>UI</h4>
            </a>
            <a href="/admin/manager" class="menu <?= ($model['title'] == 'Manager') ? 'menu-active' : '' ?>">
                <i class="fa-solid fa-crown"></i>
                <h4>Manager</h4>
            </a>
            <a href="/admin/standings" class="menu <?= ($model['title'] == 'Standings') ? 'menu-active' : '' ?>">
                <i class="fa-solid fa-arrow-up-wide-short"></i>
                <h4>Standings</h4>
            </a>
            <a href="/admin/logout" class="menu">
                <i class="fa-solid fa-power-off"></i>
                <h4>Logout</h4>
            </a>
        </div>
    </section>