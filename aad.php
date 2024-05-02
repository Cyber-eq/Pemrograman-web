<?php
function displayMenu($menu) {
    echo "Menu Makanan: <br>";
    foreach($menu as $item => $price) {
        echo "- $item: Rp $price <br>";
    }
}
// Contoh penggunaan
$menu = array(
    "Nasi Goreng" => 15000,
    "Mie Goreng" => 12000,
    "Ayam Goreng" => 20000,
    "Ayam Bakar" => 25000,
    "Soto" => 10000,
    "Rawon" => 15000,);


displayMenu($menu);
function orderFood($menu, $item, $quantity) {
    if(array_key_exists($item, $menu)) {
        $total = $menu[$item] * $quantity;
        echo "Pesanan: $item ($quantity) <br>";
        echo "Total Harga: Rp $total <br>";
    } else {
        echo "Maaf, menu tidak ditemukan.";
    }
}
// Contoh penggunaan
$order = "Nasi Goreng";
$quantity = 2;
orderFood($menu, $order, $quantity);
function calculateDiscount($totalPrice, $discountPercentage, $maxDiscount) {
    $discount = $totalPrice * ($discountPercentage / 100);
    $discount = min($discount, $maxDiscount);
    return $discount;
}
// Contoh penggunaan
$totalPrice = 50000;
$discountPercentage = 10;
$maxDiscount = 20000;
$discountAmount = calculateDiscount($totalPrice, $discountPercentage, $maxDiscount);
echo "Diskon: Rp $discountAmount";

function calculateTotalCost($foodPrice, $tax, $deliveryCharge) {
    $totalCost = $foodPrice + $tax + $deliveryCharge;
    return $totalCost;
}
// Contoh penggunaan
$foodPrice = 40000;
$tax = 0.1 * $foodPrice; // 10% pajak
$deliveryCharge = 5000;
$totalCost = calculateTotalCost($foodPrice, $tax, $deliveryCharge);
echo "Total Biaya: Rp $totalCost";

function sendOrder($name, $address, $order) {
    echo "Pesanan untuk $name akan dikirim ke alamat: $address <br>";
    echo "Pesanan: $order";
}
// Contoh penggunaan
$name = "Arfa zaim";
$address = "Boyolali";
$order = "Nasi Goreng, Ayam Goreng";
sendOrder($name, $address, $order);
?>