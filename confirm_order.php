<?php
require_once __DIR__ . './config/init.php';

if (!isset($_SESSION['cart_items']) || empty($_SESSION['cart_items'])) {
    die("cart is empty");
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: mycart.php");
    exit;
}

$name = htmlspecialchars($_POST['name']);
$address = htmlspecialchars($_POST['address']);
$city = htmlspecialchars($_POST['city']);

if (empty($name) || empty($address) || empty($city)) {
    die("please fill all fields");
}

$delivery_cost = 29;
$total = 0;

foreach ($_SESSION['cart_items'] as $item) {
    $total += $item['price'] * $item['quantity'];
}

$final_total = $total + $delivery_cost;

try {

    $db->beginTransaction();
    $stmt = $db->prepare("INSERT INTO orders 
    (session_id, customer_name, address, city, total, delivery_cost) VALUES (?, ?, ?, ?, ?, ?)
    ");

    $stmt->execute([ session_id(), $name, $address, $city, $final_total, $delivery_cost ]);

    $order_id = $db->lastInsertId();

    $stmtItem = $db->prepare("
        INSERT INTO order_items
        (order_id, product_id, product_name, price, quantity)
        VALUES (?, ?, ?, ?, ?)
    ");

    foreach ($_SESSION['cart_items'] as $item) {
        $stmtItem->execute([ $order_id, $item['id'],$item['name'],$item['price'],$item['quantity']
        ]);
    }

    $db->commit();

    $_SESSION['cart_items'] = [];
    $_SESSION['cart_total'] = 0;
    $_SESSION['cart_count'] = 0;


echo "<script>
        alert('successfully placed order with total: $final_total');
        window.location.href = 'index.php';
    </script>";

} catch (Exception $e) {

    $db->rollBack();
    echo "<script>alert('Error saving order');</script>";
}
?>