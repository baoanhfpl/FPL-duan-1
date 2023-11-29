<div class="container">
    <h2>Danh sách sản phẩm đã đặt</h2>
    <div>
        <a href="index.php?act=order_history" class="btn btn-info flex-shrink-1 my-2">Quay lại</a>
    </div>
    <div class="heading d-flex justify-content-between align-items-center mb-4">
        <table class="table table-bordered">
            <thead>
                <tr class="text-center table-primary">
                    <th>Hình ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Chiết khấu</th>
                    <th>Tổng tiền</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $total_product = 0;
                $total_money = 0;
                foreach ($order_detail as $order) {
                    extract($order);
                    $variant = query_one("variants", $variant_id);
                    $product = query_one("products", $variant['product_id']);
                    $total_product += $quantity;
                    $total_money += $total_price;
                ?>
                    <tr>
                        <td>
                            <img src="../../../uploads/<?= $product['image'] ?>" alt="" style="width: 60px">
                        </td>
                        <td>
                            <a href="index.php?act=detail_product&product_id=<?=$product['id']?>&color_id=<?=$variant['color_id']?>"><?=$product['name']?></a>
                        </td>
                        <td><?= number_format($product['price']) ?>đ</td>
                        <td class="text-center"><?= $quantity ?></td>
                        <td class="text-center"><?= $discount ?>%</td>
                        <td><?= number_format($total_price) ?>đ</td>
                    </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <tr class="table-success">
                    <th colspan="2" rowspan="2" class="text-center">Tổng hóa đơn</th>
                    <th rowspan="1">Số lượng</th>
                    <td colspan="3" class="text-center"><?= $total_product ?></td>
                </tr>
                <tr class="table-success">
                    <th>Thành tiền</th>
                    <td colspan="3" class="text-center"><?= number_format($total_money) ?>đ</td>
                </tr>
            </tfoot>
        </table>
    </div>