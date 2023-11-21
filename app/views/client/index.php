<?php 
    ob_start();
    session_start();
    include "../../models/pdo_library.php";
    include "../../helper/handle_submit.php";
    include "../../models/sql_funcs.php";
    include "../../models/user_sql_funcs.php";
    include "./layouts/header.php";
    if(isset($_GET["act"])) {
        $act = $_GET["act"];
        switch($act) {
            case "products":
                if(isset($_GET['category_id'])) {
                    $category_id = $_GET['category_id'];
                    $products = query_many("products", "category_id = $category_id");
                }else {
                    $products = query_all("products");
                }
                include "./pages/products/index.php";
                break;
            case "contact":
                include "./pages/contact/index.php";
                break;
            case "cart":
                include "./pages/cart/index.php";
                break;
            case "detail_product":
                if(isset($_GET['product_id'])) {
                    $product_id = $_GET['product_id'];
                    $product = query_one("products", $product_id);
                }
                include "./pages/detail_product/index.php";
                break;
            case "checkout":
                include "./pages/checkout/checkout.php";
                break;
            case "login":
                if($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $username = $_POST['username'];
                    $password = $_POST['password'];

                    $user = check_user($username, $password);
                    if($user) {
                        $_SESSION['user_id'] = $user['id'];
                        header("Location: index.php");
                    }else {
                        $_SESSION['error'] = "Tài khoản hoặc mật khẩu không đúng";
                        header('Location: index.php?act=login&status=error');
                    }
                }
                include "./pages/auth/login_form.php";
                break;
            case "register":
                if($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $display_name = $_POST['display_name'];
                    $username = $_POST['username'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];

                    $users = query_all("users");
                    foreach($users as $user) {
                        if($username == $user['username']) {
                            $_SESSION['error'] = "Tên tài khoản đã tồn tại";
                            header('Location: index.php?act=register&status=error');
                            die;
                        }else if($email == $user['email']) {
                            $_SESSION['error'] = "Email đã tồn tại";
                            header('Location: index.php?act=register&status=error');
                            die;
                        }
                    }
                    insert_user($display_name, $username, $password, $email);
                    $_SESSION['success'] = "Đăng kí thành công";
                    header('Location: index.php?act=register&status=success');
                }
                include "./pages/auth/register_form.php";
                break;
            case "logout":
                if(isset($_SESSION['user_id'])) {
                    session_unset();
                    session_destroy();
                    header("Location: index.php");
                }
                break;
            default:
                include "./pages/home/index.php";
        }
    }else {
        $products = query_many("products", "status = 1 LIMIT 8");
        $categories = query_many("categories", "status = 1 LIMIT 6");
        include "./pages/home/index.php";
    }
    include "./layouts/footer.php";
?>