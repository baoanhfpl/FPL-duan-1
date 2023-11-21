<?php

function insert_product($name, $price, $desc, $path, $category_id) {
    $sql = "INSERT INTO products(name, price, description, image, category_id) VALUES('$name', $price, '$desc', '$path', $category_id)";
    pdo_execute($sql);
}

function update_product($id, $name, $price, $desc, $path, $category_id) {
    $sql = "UPDATE products set name='$name',price=$price, description='$desc', image='$path', category_id=$category_id where id = $id";
    pdo_execute($sql);
}

function insert_variant($product_id, $size_id, $color_id, $quantity) {
    $sql = "INSERT INTO variants(product_id, size_id, color_id, quantity)
    VALUES($product_id, $size_id, $color_id, $quantity)";
    pdo_execute($sql);
}

function update_variant($id, $size_id, $color_id, $quantity) {
    $sql = "UPDATE variants set size_id=$size_id, 
    color_id=$color_id, quantity=$quantity where id = $id";
    pdo_execute($sql);
}

function insert_color($name) {
    $sql = "INSERT INTO colors(name) VALUES('$name')";
    pdo_execute($sql);
}

function insert_size($name) {
    $sql = "INSERT INTO sizes(name) VALUES('$name')";
    pdo_execute($sql);
}

?>