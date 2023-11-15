<?php 
    function showMessage() {
        if(isset($_GET["status"]) && $_SESSION["success"]) {
            if($_GET["status"] == "success") {
                echo $_SESSION['success'];
            }
        }
    }
?>