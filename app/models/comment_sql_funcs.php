<?php

function insert_comment() {
    $sql = "INSERT INTO comments() VALUES()";
    pdo_execute($sql);
}

function select_all_comment() {
    $sql = "SELECT * from comments order by id desc";
    return pdo_query($sql);
}

function select_one_comment($id) {
    $sql = "SELECT * from comments where id=$id";
    return pdo_query_one($sql);
}

function delete_comment($id) {
    $sql = "delete from comments where id=$id";
    pdo_query($sql);
}

function update_comment($id, $name, $price, $desc, $path, $category_id) {
    $sql = "UPDATE comments set name='$name', price=$price, 
    description='$desc', image='$path', category_id=$category_id where id = $id";
    pdo_execute($sql);
}

?>