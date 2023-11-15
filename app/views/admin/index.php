<?php
  ob_start();
  session_start();
  include "../../models/pdo_library.php";
  include "../../helper/handle_submit.php";

  include "../../models/cate_sql_funcs.php";
  include "../../models/user_sql_funcs.php";
  include "../../models/comment_sql_funcs.php";
  include "../../models/product_sql_funcs.php";
  include "./layouts/header.php";
  include "./layouts/sidebar.php";
?>

<div class="content-wrapper pt-4">
  <div class="inner container">
    <?php
    if (isset($_GET["act"])) {
      $action = $_GET["act"];
      switch ($action) {
        // Categories
        case "categories":
          $categories = select_all_cate();
          include "./pages/categories/categories.php";
          break;
        case "add_category":
          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST["name"];
            $image = $_FILES["image"];

            $path = $image["name"];

            move_uploaded_file($image["tmp_name"], "./uploads/" . $path);

            insert_category($name, $path);
            $_SESSION['success'] = "<div class='success'>Thêm danh mục thành công</div>";
            header('Location: index.php?act=add_category&status=success');
          }
          include "./pages/categories/add_category.php";
          break;
        case "edit_category":
          if(isset($_GET["category_id"])) {
            $id = $_GET["category_id"];
            $category = select_one_cate($id);
            extract($category);
            $prevImage = $image;

            if($_SERVER['REQUEST_METHOD'] == 'POST') {
              $name = $_POST['name'];
              $image = $_FILES['image'];

              if(empty($image['name'])) {
                $path = $prevImage;
              }else {
                $prevPath = "./uploads/$prevImage";
                if(file_exists($prevPath)) {
                  unlink($prevPath);
                }
                $path = $image['name'];
              }

              move_uploaded_file($image['tmp_name'], "./uploads/" . $path);

              update_cate($id, $name, $path);
              $_SESSION['success'] = "<div class='success'>Lưu thông tin thành công</div>";
              header("Location: index.php?act=edit_category&category_id=$id&status=success");
            }
          }
          include "./pages/categories/edit_category.php";
          break;
        case "delete_category":
          if(isset($_GET["category_id"])) {
            $id = $_GET["category_id"];
            delete_cate($id);
            header("Location: index.php?act=categories");
          }
          break;
        case "show_category":
          if(isset($_GET["category_id"])) {
            $id = $_GET["category_id"];
            show_category($id);
            header("Location: index.php?act=categories");
          }
          $categories = select_all_cate();
          include "./pages/categories/categories.php";
          break;
        case "hide_category":
          if(isset($_GET["category_id"])) {
            $id = $_GET["category_id"];
            hide_category($id);
            header("Location: index.php?act=categories");
          }
          $categories = select_all_cate();
          include "./pages/categories/categories.php";
          break;
        
        // Product
        case "products":
          $products = select_all_product();
          include "./pages/products/products.php";
          break;
        case "add_product":
          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST["name"];
            $price = $_POST["price"];
            $desc = $_POST["desc"];
            $category_id = $_POST["category_id"];
            $image = $_FILES["image"];

            $path = $image["name"];

            move_uploaded_file($image["tmp_name"], "./uploads/" . $path);

            insert_product($name, $price, $desc, $path, $category_id);
            $_SESSION['success'] = "<div class='success'>Thêm sản phẩm thành công</div>";
            header('Location: index.php?act=add_product&status=success');
          }
          include "./pages/products/add_product.php";
          break;
        case "edit_product":
          if(isset($_GET["product_id"])) {
            $id = $_GET["product_id"];
            $product = select_one_product($id);
            extract($product);

            $prevImage = $image;

            if($_SERVER['REQUEST_METHOD'] == 'POST') {
              $name = $_POST['name'];
              $price = $_POST['price'];
              $desc = $_POST['desc'];
              $category_id = $_POST['category_id'];
              $image = $_FILES['image'];

              if(empty($image['name'])) {
                $path = $prevImage;
              }else {
                $prevPath = "./uploads/$prevImage";
                if(file_exists($prevPath)) {
                  unlink($prevPath);
                }
                $path = $image['name'];
              }

              move_uploaded_file($image['tmp_name'], "./uploads/" . $path);

              update_product($id, $name, $price, $desc, $path, $category_id);
              $_SESSION['success'] = "<div class='success'>Lưu thông tin thành công</div>";
              header("Location: index.php?act=edit_product&product_id=$id&status=success");
            }
          }
          include "./pages/products/edit_product.php";
          break;

        case "delete_product":
          if(isset($_GET["product_id"])) {
            $id = $_GET["product_id"];
            delete_product($id);
            header("Location: index.php?act=products");
          }
        case "users":
          $users = select_all_user();
          include "./pages/users/users.php";
          break;
        case "add_user":
          if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $display_name = $_POST['display_name'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];

            insert_user($display_name, $username, $password, $email);
            $_SESSION['success'] = 'Thêm mới user thành công';
            header('Location: index.php?act=add_user');
          }
          include "./pages/users/add_user.php";
          break;
        case "comments":
          $comments = select_all_comment();
          include "./pages/comments/comments.php";
          break;
        case "orders":
          include "./pages/orders/orders.php";
          break;
        case "contacts":
          include "./pages/contacts/contacts.php";
          break;
        case "charts":
          include "./pages/charts/charts.php";
          break;
      }
    } else {
      include "./layouts/home.php";
    }

    ?>
  </div>
</div>

<?php
include "./layouts/footer.php";
?>