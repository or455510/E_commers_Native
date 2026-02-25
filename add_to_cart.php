<?php
require_once __DIR__ . './config/init.php';

header('Content-Type: application/json');

// استقبال البيانات
$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data['product_id'])) {
    echo json_encode(['success' => false]);
    exit;
}

$product_id = (int)$data['product_id'];

// دالة جلب المنتج
$stmt = $db->prepare("SELECT * FROM products WHERE id = ?");
$stmt->execute([$product_id]);
$product = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$product) {
    echo json_encode(['success' => false]);
    exit;
}

// إنشاء السلة لو مش موجودة
if (!isset($_SESSION['cart_items'])) {
    $_SESSION['cart_items'] = [];
    $_SESSION['cart_total'] = 0;
    $_SESSION['cart_count'] = 0;
}

$found = false;

foreach ($_SESSION['cart_items'] as &$item) {
    if ($item['id'] == $product_id) {
        $item['quantity']++;
        $found = true;
        break;
    }
}

if (!$found) {
    $_SESSION['cart_items'][] = [
        'id' => $product['id'],
        'name' => $product['name'],
        'price' => $product['price'],
        'quantity' => 1
    ];
}

$_SESSION['cart_total'] += $product['price'];
$_SESSION['cart_count']++;

echo json_encode([
    'success' => true,
    'cart_count' => $_SESSION['cart_count'],
    'cart_total' => $_SESSION['cart_total']
]);
exit;