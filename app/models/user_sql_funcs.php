<?php

function insert_user($display_name, $username, $password, $email) {
    $sql = "INSERT INTO users(display_name, username, password, email) VALUES('$display_name', '$username', '$password', '$email')";
    pdo_execute($sql);
}

function select_all_user() {
    $sql = "SELECT * from users order by id desc";
    return pdo_query($sql);
}

function select_one_user($id) {
    $sql = "SELECT * from users where id=$id";
    return pdo_query_one($sql);
}

function delete_user($id) {
    $sql = "delete from users where id=$id";
    pdo_query($sql);
}

function update_user($id, $name, $price, $desc, $path, $category_id) {
    $sql = "UPDATE users set name='$name', price=$price, 
    description='$desc', image='$path', category_id=$category_id where id = $id";
    pdo_execute($sql);
}

?>