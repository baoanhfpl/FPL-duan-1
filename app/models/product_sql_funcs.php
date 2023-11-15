<?php

function insert_product($name, $price, $desc, $path, $category_id) {
    $sql = "INSERT INTO products(name, price, description, image, category_id) VALUES('$name', $price, '$desc', '$path', $category_id)";
    pdo_execute($sql);
}

function select_all_product() {
    $sql = "SELECT * from products order by id desc";
    return pdo_query($sql);
}

function select_one_product($id) {
    $sql = "SELECT * from products where id=$id";
    return pdo_query_one($sql);
}

function delete_product($id) {
    $sql = "delete from products where id=$id";
    pdo_query($sql);
}

function update_product($id, $name, $price, $desc, $path, $category_id) {
    $sql = "UPDATE products set name='$name', price=$price, 
    description='$desc', image='$path', category_id=$category_id where id = $id";
    pdo_execute($sql);
}

?>