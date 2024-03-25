<?php
global $con;
session_start();
include 'config.php';
if(isset($_SESSION['userId'])){
    $userId = $_SESSION['userId'];
}

if(isset($_POST['placeOrder_btn'])){

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $notes = $_POST['notes'];
    $orderCost = $_SESSION['total'];
    $status = "Pending";
    $orderDate = date('Y-m-d H:i:s');

    $stmt = $con->prepare("INSERT INTO orders (orderCost,userId,name,email,address,phone,city,notes,date,status) VALUES(?,?,?,?,?,?,?,?,?,?)" );
    $stmt->bind_param('iissssssss', $orderCost,$userId,$name,$email,$address,$phone,$city,$notes,$orderDate,$status);
    $stmt->execute();

    $orderId = $stmt->insert_id;

    $stmt1 = $con->prepare("SELECT * FROM `cart` WHERE userId = ?");
    $stmt1->execute([$userId]);
    $select_cart = $stmt1->get_result();
    while ($row = mysqli_fetch_assoc($select_cart)){
        $product_id = $row['productId'];
        $product_image = $row['image'];
        $product_name = $row['name'];
        $product_price = $row['price'];
        $product_quantity = $row['quantity'];

        $stmt2 = $con->prepare("INSERT INTO order_items (orderId,userId,productId,name,price,quantity,image,date) VALUES(?,?,?,?,?,?,?,?)" );
        $stmt2->bind_param('iiisiiss',$orderId,$userId,$product_id,$product_name,$product_price,$product_quantity,$product_image,$orderDate);
        if($stmt2->execute()){
            $stmt3 = $con->prepare("DELETE FROM `cart` WHERE userId = ?");
            if($stmt3->execute([$userId])){
                header('location: UserPayment.php?order_status ="order placed successfully!!"');
            }
        }
    }
}




