<h2>Danh sách sản phẩm đã đặt</h2>
<div class="heading d-flex justify-content-between align-items-center mb-4">
    <div>
        <a href="index.php?act=add_order_product&order_id=<?=$order_id?>" class="btn btn-success flex-shrink-1">Thêm sản phẩm</a>
        <a href="index.php?act=orders" class="btn btn-secondary flex-shrink-1">Quay lại</a>
    </div>
    <div>
        <div class="input-group">
            <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
            <button type="button" class="btn btn-outline-primary">search</button>
        </div>
    </div>
</div>
<table class="table table-bordered">
    <thead>
        <tr class="text-center table-primary">
            <th>Biến thể</th>
            <th>Hình ảnh</th>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Chiết khấu</th>
            <th>Tổng tiền</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $total_product = 0;
            $total_money = 0;
            foreach($order_detail as $order) {
                extract($order);
                $variant = query_one("variants", $variant_id);
                $product = query_one("products", $variant['product_id']);
                $total_product += $quantity;
                $total_money += $total_price;
        ?>
            <tr>
                <td><?=$variant['id']?></td>
                <td>
                    <img src="../../../uploads/<?=$product['image']?>" alt="">
                </td>
                <td><?=$product['name']?></td>
                <td><?=number_format($product['price'])?>đ</td>
                <td><?=$quantity?></td>
                <td><?=$discount?></td>
                <td><?=number_format($total_price)?>đ</td>
                <td>
                    <a href="index.php?act=edit_order_product&order_id=<?=$order_id?>&detail_id=<?=$id?>" class="btn btn-warning">Sửa</a>
                    <a href="" class="btn btn-danger">Xóa</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
    <tfoot>
        <tr class="table-success">
            <th colspan="4" class="text-center">Tổng hóa đơn</th>
            <td><?=$total_product?></td>
            <td colspan="3" class="text-center"><?=number_format($total_money)?>đ</td>
        </tr>
    </tfoot>
</table>
<div class="d-flex justify-content-between">
    <a href="index.php?act=delete_order&order_id=<?=$order_id?>" class="btn btn-danger">Hủy đơn hàng</a>
    <form action="index.php?act=order_products&order_id=<?=$order_id?>" method="post">
        <select class="btn btn-primary" name="status">
        <?php
            $order = query_one("orders", $order_id);
            $status = query_all("order_status");
            foreach($status as $state) {
                extract($state);
        ?>
            <option value="<?=$id?>" <?=$id == $order['status'] ? 'selected' : ''?>><?=$name?></option>
        <?php } ?>
        </select>
        <button type="submit" class="btn btn-success">Lưu thông tin</button>
    </form>
</div>