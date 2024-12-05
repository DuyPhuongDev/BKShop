<?php
$pages = array(
  'error' => ['errors'],
  'main' => ['home', 'about', 'products', 'blog', 'contact', 'login', 'register', 'viewdetail', 'detail_blog', 'cart', 'account'],
  'admin' => ['dashboard', 'members', 'products', 'news', 'comments']
);
$controllers = array(
  //Admin controller
  'errors' => ['index'],
  'dashboard' => ['index'], // Bổ sung thêm các hàm trong controllers
  'product' => ['index', 'add', 'edit', 'delete'],
  'news' => ['index', 'add', 'edit', 'delete', 'hide'],
  'user' => ['index', 'add', 'edit', 'delete', 'changeStatus'],

  //Main controller
  'about' => ['index'],
  'home' => ['index'],
  'blog' => ['index'],
  'contact' => ['index'],
  'account' => ['index', 'edit', 'editInfo', 'changePassword'],
  'cart' => ['index', 'deleteItem', 'payment', 'makepayment', 'vnpay_return'],  
  'detail_blog' => ['index', 'comment', 'reply'],
  'products' => ['index', 'viewdetail', 'addtocart'],
  'register' => ['index', 'submit', 'editInfo'],
  'login' => ['index','logout']
); // Các controllers trong hệ thống và các action có thể gọi ra từ controller đó.
if (!array_key_exists($page, $pages) || !array_key_exists($controller, $controllers) || !in_array($action, $controllers[$controller])) {
  $page = 'error';
  $controller = 'errors';
  $action = 'index';
}
// echo $page.'<br>';
// echo "controllers/".$page."/".$controller."_controller.php"."<br>";
// echo $action."<br>";
include_once('controllers/'.$page.'/' . $controller . '_controller.php');
$klass = ucfirst($controller) . 'Controller';
// echo $klass."<br>";
$controller = new $klass;
$controller->$action();