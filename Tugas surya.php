<?php
// contoh penggunaan array 
function createMenu() {
    $menu = array(
        array("name" => "Nasi Goreng", "price" => 15000),
        array("name" => "Mie Goreng", "price" => 12000),
        array("name" => "Ayam Bakar", "price" => 20000),
        array("name" => "Sate Ayam", "price" => 18000),
        array("name" => "Gado-Gado", "price" => 10000)
    );

    echo "<table border='1'>
            <tr>
                <th>Menu</th>
                <th>Harga</th>
            </tr>";

    foreach ($menu as $item) {
        echo "<tr>";
        echo "<td>" . $item['name'] . "</td>";
        echo "<td>" . $item['price'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
}

createMenu();

function calculateDiscount($menu, $discountPercentage) {
    $discountedMenu = array();
    foreach ($menu as $item) {
        $discountAmount = ($item['price'] * $discountPercentage) / 100;
        $discountedPrice = $item['price'] - $discountAmount;
        $discountedMenu[] = array("name" => $item['name'], "price" => $discountedPrice);
    }
    return $discountedMenu;
}

function calculateDeliveryFee($orderTotal) {
    $deliveryFee = 0;
    if ($orderTotal >= 50000) {
        $deliveryFee = 0;
    } elseif ($orderTotal >= 30000) {
        $deliveryFee = 5000;
    } else {
        $deliveryFee = 10000;
    }
    return $deliveryFee;
}

function createOrderTable($menu, $discountPercentage, $customerName, $cashierName) {
    $discountedMenu = calculateDiscount($menu, $discountPercentage);
    $table = "<table border='1'>
                <tr>
                    <th>No.</th>
                    <th>Menu</th>
                    <th>Price</th>
                    <th>Discounted Price</th>
                </tr>";
    $index = 1;
    $orderTotal = 0;
    foreach ($discountedMenu as $item) {
        $table .= "<tr>";
        $table .= "<td>" . $index++ . "</td>";
        $table .= "<td>" . $item['name'] . "</td>";
        $table .= "<td>Rp. " . $menu[$index - 2]['price'] . "</td>";
        $table .= "<td>Rp. " . $item['price'] . "</td>";
        $table .= "</tr>";
        $orderTotal += $item['price'];
    }
    $deliveryFee = calculateDeliveryFee($orderTotal);
    $table .= "<tr>
                 <td colspan='3' align='right'>Order Total:</td>
                 <td>Rp. " . $orderTotal . "</td>
               </tr>";
    $table .= "<tr>
                 <td colspan='3' align='right'>Delivery Fee:</td>
                 <td>Rp. " . $deliveryFee . "</td>
               </tr>";
    $table .= "<tr>
                 <td colspan='3' align='right'>Grand Total:</td>
                 <td>Rp. " . ($orderTotal + $deliveryFee) . "</td>
               </tr>";
    $table .= "</table>";
    $table .= "<p>Customer Name: " . $customerName . "</p>";
    $table .= "<p>Cashier Name: " . $cashierName . "</p>";
    return $table;
}

$menu = array(
    array("name" => "Nasi Goreng", "price" => 15000),
    array("name" => "Mie Goreng", "price" => 12000),
    array("name" => "Ayam Bakar", "price" => 20000),
    array("name" => "Sate Ayam", "price" => 18000),
    array("name" => "Gado-Gado", "price" => 10000)
);
$discountPercentage = 10;
$customerName = "Surya tagor";
$cashierName = "Jane Smith";
$address = "Boyolali";
$orderTable = createOrderTable($menu, $discountPercentage, $customerName, $cashierName, $address);
echo $orderTable, $address ;
?>