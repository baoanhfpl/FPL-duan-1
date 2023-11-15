<?php 
    include "./layouts/header.php";
    if(isset($_GET["page"])) {
        $page = $_GET["page"];
        switch($page) {
            case "products":
                include "./pages/products/index.php";
                break;
            case "contact":
                include "./pages/contact/index.php";
                break;
            case "cart":
                include "./pages/cart/index.php";
                break;
            case "detail_product":
                include "./pages/detail_product/index.php";
                break;
            default:
                include "./pages/home/index.php";
        }
    }else {
        include "./pages/home/index.php";
    }
    include "./layouts/footer.php";
?>