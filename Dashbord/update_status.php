<?php
require_once __DIR__ . '/../config/init.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $order_id = $_POST['order_id'];
    $status   = $_POST['status'];

    $stmt = $db->prepare("UPDATE orders SET status = ? WHERE id = ?");
    $stmt->execute([$status, $order_id]);

    header("Location: index.php");
    exit;
}