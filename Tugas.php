<?php

function getMenu() {
    // Daftar menu
    $menu = array(
        "Mie Ayam",
        "Bakso",
        "Nasigoreng",
        // Tambahkan menu yang lain
    );

    return $menu;
}

// Contoh penggunaan fungsi
$daftar_menu = getMenu();
echo "Menu yang tersedia:\n";
foreach ($daftar_menu as $menu) {
    echo "- $menu\n";
}

?>
