<?php
require_once('connection.php');
require_once('models/User.php');
class Payment {
    private $paymentId;
    private $userId;
    private $method;
    private $totalPrice;
    private $status;
    private $paymentDate;

    public function __construct($paymentId, $userId, $method, $totalPrice, $status, $paymentDate)
    {
        $this->paymentId = $paymentId;
        $this->userId = $userId;
        $this->method = $method;
        $this->totalPrice = $totalPrice;
        $this->status = $status;
        $this->paymentDate = $paymentDate;
    }

    public function getPaymentId()
    {
        return $this->paymentId;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function getPaymentDate()
    {
        return $this->paymentDate;
    }

    public function getTotalPrice()
    {
        return $this->totalPrice;
    }

    public function getStatus()
    {
        return $this->status;
    }

    // setter

    public function setPaymentId($paymentId)
    {
        $this->paymentId = $paymentId;
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function setMethod($method)
    {
        $this->method = $method;
    }

    public function setPaymentDate($paymentDate)
    {
        $this->paymentDate = $paymentDate;
    }

    public function setTotalPrice($totalPrice)
    {
        $this->totalPrice = $totalPrice;
    }

    // toString
    public function __toString()
    {
        return $this->paymentId . " " . $this->userId . " " . $this->method . " " . $this->totalPrice . " " . $this->paymentDate;
    }

    //make payment
    public static function makePayment($userId, $method, $totalPrice){
        $db = DB::getInstance();
        $stmt = $db->prepare("INSERT INTO payments (user_id, method, total_price) VALUES (?, ?, ?)");
        $stmt->bind_param("isi", $userId, $method, $totalPrice);
        $stmt->execute();
        if($stmt){
            return true;
        }else{
            return false;
        }
    }

    // get all payments by user id
    public static function getPaymentsByUserId($userId){
        $db = DB::getInstance();
        $stmt = $db->prepare("SELECT * FROM payments WHERE user_id = ? ORDER BY payment_date DESC");
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        $payments = [];
        while($row = $result->fetch_assoc()){
            $payment = new Payment($row['payment_id'], $row['user_id'], $row['method'], $row['total_price'], $row['status'], $row['payment_date']);
            array_push($payments, $payment);
        }
        return $payments;
    }

    // count all payments
    public static function countAllPayments(){
        $db = DB::getInstance();
        $res = [];
        $stmt = $db->prepare("SELECT COUNT(*) as orders, SUM(total_price) as totals FROM payments");
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $res['orders'] = $row['orders'];
        $res['totals'] = $row['totals'];
        return $res;
    }

    public static function getMonthlyRevenueOfLast6Months(){
        $db = DB::getInstance();
        $res = [];
    
        // Lấy 6 tháng gần nhất
        $months = [];
        for ($i = 5; $i >= 0; $i--) {
            $months[] = date('Y-m', strtotime("-$i month"));
        }
    
        // Câu truy vấn SQL để lấy tổng doanh thu mỗi tháng trong 6 tháng qua
        $stmt = $db->prepare("SELECT 
                                  DATE_FORMAT(payment_date, '%Y-%m') AS month, 
                                  SUM(total_price) AS total_revenue 
                              FROM payments 
                              WHERE payment_date >= DATE_SUB(NOW(), INTERVAL 6 MONTH)
                              GROUP BY month 
                              ORDER BY month DESC");
    
        $stmt->execute();
        $result = $stmt->get_result();
    
        // Duyệt qua kết quả và gán giá trị vào mảng $res
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[$row['month']] = $row['total_revenue'];
        }
    
        // Điền giá trị 0 cho các tháng không có doanh thu
        foreach ($months as $month) {
            if (!isset($data[$month])) {
                $data[$month] = 0; // Gán 0 nếu không có doanh thu cho tháng này
            }
        }
    
        // Sắp xếp lại mảng theo thứ tự từ tháng gần nhất
        foreach ($months as $month) {
            $res[] = [
                'month' => $month,
                'total_revenue' => $data[$month]
            ];
        }
    
        return $res;
    }
    
    // get all payments
    public static function getAllPayments(){
        $db = DB::getInstance();
        $stmt = $db->prepare("SELECT * FROM payments ORDER BY payment_date DESC");
        $stmt->execute();
        $result = $stmt->get_result();
        $payments = [];
        while($row = $result->fetch_assoc()){
            $payment = new Payment($row['payment_id'], $row['user_id'], $row['method'], $row['total_price'], $row['status'], $row['payment_date']);
            array_push($payments, $payment);
        }
        return $payments;
    }
}   
?>