<?php
require_once 'db.php';


function getProduct(){
    global $db;
    $stmt = $db->prepare("SELECT * FROM products ORDER BY created_at DESC");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function add_product($name,$description,$price,$old_price,$category_id){
        global $db;

    $stmt = $db->prepare("INSERT INTO products (name,description,price,old_price,category_id) VALUES (?,?,?,?,?)");
    return $stmt->execute([$name,$description,$price,$old_price,$category_id]);


}

function product_cat($category_id){
    global $db;
    $stmt = $db->prepare(" SELECT * FROM products WHERE category_id = ? ");
    $stmt->bindValue(1, (int)$category_id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getOrders() {
    global $db;
    $stmt = $db->prepare("SELECT * FROM orders ORDER BY created_at DESC");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getOrderItems($order_id) {
    global $db;
    $stmt = $db->prepare("SELECT * FROM order_items WHERE order_id = ?");
    $stmt->execute([$order_id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function updateOrderStatus($order_id, $status) {
    global $db;
    $stmt = $db->prepare("UPDATE orders SET status = ? WHERE id = ?");
    return $stmt->execute([$status, $order_id]);
}

function updateOrderDetails($order_id, $name,  $address, $coupon = null, $note = null) {
    global $db;
    $stmt = $db->prepare("UPDATE orders SET customer_name = ?, address = ?, coupon_code = ?, note = ? WHERE id = ?");
    return $stmt->execute([$name, $address, $coupon, $note, $order_id]);
}
function getOrdersCountByStatus($status = null)
{
   global $db;

    if ($status === null) {
        $stmt = $db->prepare("SELECT COUNT(*) as total FROM orders");
        $stmt->execute();
    } else {
        $stmt = $db->prepare("SELECT COUNT(*) as total FROM orders WHERE status = ?");
        $stmt->execute([$status]);
    }

    return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
}

function getCategories() {
    global $db;

    $stmt = $db->prepare("SELECT * FROM categories ORDER BY id DESC");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function addCategory($name) {
    global $db;

    $stmt = $db->prepare("INSERT INTO categories (name) VALUES (?)");
    return $stmt->execute([$name]);
}

function deleteCategory($id) {
    global $db;

    $stmt = $db->prepare("DELETE FROM categories WHERE id = ?");
    return $stmt->execute([$id]);
}

function upload_image($product_id){

    global $db;

    if (!isset($_FILES['image']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK) {
        return false;
    }

    $file = $_FILES['image'];

    $allowedMimeTypes = ['image/jpeg','image/png','image/webp'];
    $allowedExtensions = ['jpg','jpeg','png','webp'];

    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mimeType = finfo_file($finfo, $file['tmp_name']);
    finfo_close($finfo);

    if (!in_array($mimeType, $allowedMimeTypes)) return false;

    $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

    if (!in_array($extension, $allowedExtensions)) return false;

    if ($file['size'] > 2 * 1024 * 1024) return false;

    $newFileName = bin2hex(random_bytes(16)) . '.' . $extension;

    $uploadPath = '../uploads/products/';

    if (!is_dir($uploadPath)) {
        mkdir($uploadPath, 0777, true);
    }

    $destination = $uploadPath . $newFileName;

    if (!move_uploaded_file($file['tmp_name'], $destination)) {
        return false;
    }

    $stmt = $db->prepare("INSERT INTO product_photos (product_id,image) VALUES (?,?)");
    $stmt->execute([$product_id,$newFileName]);

    return true;
}
function getProductImages($product_id){
    global $db;

    $stmt = $db->prepare("SELECT * FROM product_photos WHERE product_id = ?");
    $stmt->execute([$product_id]);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}