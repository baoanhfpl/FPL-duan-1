<?php

function insert_category($name, $path) {
    $sql = "INSERT INTO categories(name, image) VALUES('$name', '$path')";
    pdo_execute($sql);
}

function select_all_cate() {
    $sql = "SELECT * from categories";
    return pdo_query($sql);
}

function select_one_cate($id) {
    $sql = "SELECT * from categories where id=$id";
    return pdo_query_one($sql);
}

function delete_cate($id) {
    $sql = "delete from categories where id=$id";
    pdo_query($sql);
}

function update_cate($id, $name, $path) {
    $sql = "UPDATE categories set name='$name', image='$path' where id = $id";
    pdo_execute($sql);
}

function show_category($id) {
    $sql = "UPDATE categories set status=1 where id = $id";
    pdo_execute($sql);
}

function hide_category($id) {
    $sql = "UPDATE categories set status=0 where id = $id";
    pdo_execute($sql);
}

function search_category($search_param) {
    $sql = "SELECT * FROM categories where name like '%$search_param%'";
    return pdo_query($sql);
}

?>