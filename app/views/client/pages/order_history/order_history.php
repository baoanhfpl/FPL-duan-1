<div class="container">
    <h2>Lịch sử đặt hàng</h2>
    <table class="table table-bordered">
        <thead>
            <tr class="text-center table-primary">
                <th>ID người đặt</th>
                <th>Mã đơn hàng</th>
                <th>Địa chỉ nhận hàng</th>
                <th>Ngày đặt</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
                <th>Chi tiết</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($orders as $order) {
                extract($order);
                $user = query_one("users", $user_id);
                $order_status = query_one("order_status", $status);
            ?>
                <tr>
                    <td><?= $user_id ?></td>
                    <td><?= $id ?></td>
                    <td><?= $address ?></td>
                    <td><?= $date ?></td>
                    <td class="text-center">
                        
                        <?php if($status == 4){ ?>
                            <a href="index.php?act=order_confirm&order_id=<?=$id?>" class="btn btn-success">Đã nhận được hàng</a>
                        <?php }else if($status == 5) { ?>
                            <button class="btn btn-success" disabled>Hoàn thành</button>
                        <?php }else { ?>
                            <button class="btn btn-outline-<?php
                                if($status == 1) {
                                    echo 'info';
                                }else if($status == 2) {
                                    echo 'warning';
                                }else if($status == 3) {
                                    echo 'primary';
                                }
                            ?>"><?=$order_status['name']?></button>
                        <?php } ?>
                    </td>
                    <td>
                        <?php if($status == 1) { ?>
                            <a href="index.php?act=cancel_order&order_id=<?=$id?>" class="btn btn-danger">Hủy đơn</a>
                        <?php }else { ?>
                            <button class="btn btn-danger" disabled>Hủy đơn</button>
                        <?php } ?>
                    </td>
                    <td class="text-center">
                        <a href="index.php?act=detail_order&order_id=<?= $id ?>" class="btn btn-primary">Chi tiết</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>