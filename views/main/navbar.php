<?php
    // session_start();
    if(sizeof($_GET)==0){
        $current_page = 'main';
        $current_controller = 'home';
        $current_action = 'index';
    }else{
        $current_page = isset($_GET['page']) ? $_GET['page'] : '';
        $current_controller = isset($_GET['controller']) ? $_GET['controller'] : '';
        $current_action = isset($_GET['action']) ? $_GET['action'] : '';

    }
    if(isset($_SESSION['username'])){
        $cart = Cart::getCartByUsername($_SESSION['username']);
        $cartItems = CartItem::getCartItemsByCartId($cart->getCartId());
        $user = User::getUserByUsername($_SESSION['username']);
        $list_item = [];
        $total = 0;
        foreach($cartItems as $item){
            $prodItem = Product::getProductById($item->getProductId());
            $list_item[] = [
                'cartItemId' => $item->getCartItemId(),
                'productId' => $prodItem->getProductId(),
                'productName' => $prodItem->getProductName(),
                'price' => $prodItem->getPrice(),
                'image' => $prodItem->getImageUrl(),
                'quantity' => $item->getQuantity(),
                'size' => $item->getSize()
            ];
            $total += $prodItem->getPrice() * $item->getQuantity();
        }
        $data += array('cartItems' => $list_item, 'total' => $total, 'user' => $user);
    }
    $folderPath = 'views/'.$current_page.'/'.$current_controller;
    //echo $current_page . ' - ' . $current_controller . ' - ' . $current_action."<br>";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inferno Co.</title>
    <link rel="icon" href="public/img/logo.svg">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $folderPath . "/style.css" ?>">
    <link rel="stylesheet" href="public/css/image-zoom.css">

    <style>
        /* Custom styles */
        a {
            text-decoration: none;
        }
        .navbar-brand {
            color: #ff4433;
            font-family: 'Roboto', sans-serif;
            font-size: 24px;
            font-weight: bold;
        }

        .navbar-nav .nav-link {
            color: #ffffff;
            font-weight: bold;
        }

        .navbar-nav .nav-link.active {
            color: #ff4433;
        }

        .search-bar {
            max-width: 300px;
        }

        .social-icon a {
            color: #333;
            margin-right: 10px;
        }

        /* Show dropdown on hover */
        .dropdown:hover .dropdown-menu {
            display: block;
        }

        .breadcrumb-text {
            border-bottom: 1px solid #ebebeb;
            padding: 15px 0;
        }

        .breadcrumb-text.product-more a:nth-child(1):after {
            color: #252525;
        }
        
        .breadcrumb-text a {
            display: inline-block;
            font-size: 16px;
            color: #252525;
            margin-right: 28px;
            position: relative;
        }
        
        .breadcrumb-text a:after {
            position: absolute;
            right: -18px;
            top: 0px;
            content: "";
            font-family: "FontAwesome";
            font-size: 16px;
            color: #b2b2b2;
        }
        
        .breadcrumb-text .active {
            display: inline-block;
            color: #b2b2b2;
        }

        .avatar {
            width: 40px; /* Kích thước avatar */
            height: 40px;
            object-fit: cover; /* Giữ tỉ lệ ảnh */
        }

        .cart-hover{
            display: none;
        }
        .cart-container{
            background-color: rgba(255, 255, 255, 0.8);
        }

        .cart-container:hover .cart-hover{
            display: block;
        }

        .cart-container a{
            position: relative;
        }

        .cart-container .cart-hover{
            position: absolute;
            right: 70px;
            top: 116px;
            width: 450px;
            background: #ffffff;
            z-index: 99;
            text-align: left;
            padding: 30px;
            -webkit-box-shadow: 0 13px 32px rgba(51, 51, 51, 0.1);
            box-shadow: 0 13px 32px rgba(51, 51, 51, 0.1);
            -webkit-transition: all 0.3s;
            -o-transition: all 0.3s;
            transition: all 0.3s;
        }

        .cart-container .cart-hover .selected-items{
            max-height: 200px;
            overflow-y: auto;
        }

        .cart-container .cart-hover .selected-items table{
            width: 100%;
        }

        .cart-container .cart-hover .selected-items table tr td{
            font-size: 12px;
        }

        .cart-container .cart-hover .selected-items table tr td.si-pic img{
            width: 70px;
            height: 70px;
            object-fit: cover;
            border: 1px solid #ebebeb;
        }

        .cart-container .cart-hover .selected-items table tr td.si-text{
            padding-left: 4px;
        }

        .cart-container .cart-hover .selected-items table tr td.si-text .product-selected p{
            color: #fe4231;
            line-height: 20px;
        }

        .cart-container .cart-hover .selected-items table tr td.si-text .product-selected h6{
            color: #232530;
        }

        .cart-container .cart-hover .selected-items table tr td.si-close{
                color: #252525;
                font-size: 16px;
                width: 40px;
                cursor: pointer;
                margin-right: 4px;
        }

        .cart-container .cart-hover .selected-total{
            overflow: hidden;
            border-top: 1px solid #e5e5e5;
            color: #fe4231;
            padding-top: 26px;
            margin-bottom: 30px;
        }

        .cart-container .cart-hover .selected-total span {
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            float: left;
        }

        .cart-container .cart-hover .selected-total h5 {
            font-size: 18px;
            float: right;
        }

        .cart-container .cart-hover .selected-btn .view-card{
            font-size: 12px;
            letter-spacing: 2px;
            display: block;
            text-align: center;
            background: #191919;
            color: #ffffff;
            padding: 15px 30px 12px;
            margin-bottom: 10px;
        }

        .cart-container .cart-hover .selected-btn .checkout-btn{
            font-size: 12px;
            letter-spacing: 2px;
            display: block;
            text-align: center;
            background: #fe4231;
            color: #ffffff;
            padding: 15px 30px 12px;
        }

        footer {
            font-family: Arial, sans-serif; 
        }

        footer h5,
        footer h6 {
            color: #ff4a4a;
        }

        footer p a:hover {
            color: #ff4a4a;
        }

        footer .form-control {
            border-radius: 5px;
        }

        footer .btn-danger {
            background-color: #ff4a4a;
            border: none;
            border-radius: 5px;
        }

        footer .btn-danger:hover {
            background-color: #e84343;
        }

        footer .text-danger {
            color: #ff4a4a !important;
        
    }
    </style>

</head>

<body>
    <!-- Header Section -->
    <header class="bg-light header-section">
        <!-- Header Top: Social Icons and Login -->
        <div class="header-top bg-white py-2">
            <div class="container d-flex justify-content-between align-items-center">
                <div class="social-icon">
                    <a href="https://facebook.com"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
                <?php if (!isset($_SESSION['username'])): ?>
                <div class="login">
                    <a href="index.php?page=main&controller=login&action=index" class="text-dark" style="text-decoration: none;"><i class="fas fa-user"></i> Đăng nhập</a>
                </div>
                <?php else: ?>
                    <div class="drop-down-container">
                        <!-- <a href="index.php?page=main&controller=login&action=logout" class="text-dark" style="text-decoration: none;"><i class="fas fa-user"></i> Logout</a> -->
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" id="dropdownMenu" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="public/img/users/users.jpg" class="img-fluid rounded-circle avatar" alt="Avatar">
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu">
                                <li><a class="dropdown-item" href="index.php?page=main&controller=account&action=index">My Account</a></li>
                                <li><a class="dropdown-item" href="index.php?page=main&controller=login&action=logout"><i class="fa-solid fa-right-from-bracket"></i> Đăng xuất</a></li>
                            </ul>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Header Main: Brand and Search -->
        <div class="header-main bg-light py-3">
            <div class="container d-flex justify-content-between align-items-center">
                <!-- Brand -->
                <a href="index.php" class="navbar-brand">BKSHOP Co.</a>
                <!-- Search bar -->
                <div class="d-none d-sm-block">
                <form class="d-flex search-bar">
                    <input class="form-control" type="search" placeholder="Search our Store" aria-label="Search">
                    <button class="btn btn-danger" type="submit"><i class="fas fa-search"></i></button>
                </form>
                </div>
                <!-- Cart -->
                <?php if(isset($_SESSION['username'])): ?>
                    <div class="cart-container">
                        <a href="index.php?page=main&controller=cart&action=index" class="text-dark" style="text-decoration: none;"><i class="fas fa-shopping-cart"></i> Cart</a>
                        <div class="cart-hover">
                            <div class="selected-items">
                                <table>
                                    <tbody id="product-list">
                                        <!-- product list -->
                                    </tbody>
                                </table>
                            </div>
                            <div class="selected-total">
                                <span>Tổng tiền:</span>
                                <h5 id="total_price"></h5>
                            </div>
                            <div class="selected-btn">
                                <a href="index.php?page=main&controller=cart&action=index" class="primary-btn view-card">XEM CHI TIẾT</a>
                                <a href="index.php?page=main&controller=cart&action=payment" class="primary-btn checkout-btn">THANH TOÁN</a>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="cart-noti">1</div> -->
                <?php endif; ?>
            </div>
        </div>

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <!-- Dropdown for All Categories -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="categoriesDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-bars"></i> All Categories
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="categoriesDropdown">
                                <li><a class="dropdown-item" href="#">Jacket</a></li>
                                <li><a class="dropdown-item" href="#">T-Shirt</a></li>
                                <li><a class="dropdown-item" href="#">Jeans</a></li>
                                <li><a class="dropdown-item" href="#">Hoodie</a></li>
                                <li><a class="dropdown-item" href="#">Shoe</a></li>
                            </ul>
                        </li>
                    </ul>
                    <!-- Right-side menu links -->
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link <?= ($current_page == 'main' && $current_controller == 'home' && $current_action == 'index') ? 'active' : '' ?>"
                                href="index.php?page=main&controller=home&action=index">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= ($current_page == 'main' && $current_controller == 'about' && $current_action == 'index') ? 'active' : '' ?>"
                                href="index.php?page=main&controller=about&action=index">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= ($current_page == 'main' && $current_controller == 'products' && $current_action == 'index') ? 'active' : '' ?>"
                                href="index.php?page=main&controller=products&action=index">Shop</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= ($current_page == 'main' && $current_controller == 'blog' && $current_action == 'index') ? 'active' : '' ?>"
                                href="index.php?page=main&controller=blog&action=index">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= ($current_page == 'main' && $current_controller == 'contact' && $current_action == 'index') ? 'active' : '' ?>"
                                href="index.php?page=main&controller=contact&action=index">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Breadcrumb Section Begin -->
    <?php if($current_controller != "products" && $current_controller!="home"): ?>
        <div class="container">
            <div class="breacrumb-section">
                <div class="container">
                    <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-text">
                            <a href="index.php"><i class="fa fa-home"></i> Home</a>
                            <a href="index.php?page=main&controller=<?php echo htmlspecialchars($current_controller) ?>&action=index" class="active"><?php echo ucfirst(htmlspecialchars($current_controller)) ?></a>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>