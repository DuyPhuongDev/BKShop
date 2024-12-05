<?php
require_once('controllers/main/base_controller.php');
require_once('models/Product.php');
require_once('models/Cart.php');
require_once('models/CartItem.php');
class ContactController extends BaseController{
    function __construct(){
        $this->folder = 'contact';
    }

    public function index()
    {
        session_start();
        $data = array();
        $this->render("index", $data);
    }
}