<h2>Danh sách bình luận</h2>
<div class="heading d-flex justify-content-between align-items-center mb-4">
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
            <th>ID</th>
            <th>Ảnh sản phẩm</th>
            <th>Tên sản phẩm</th>
            <th>Tên người dùng</th>
            <th>Nội dung</th>
            <th>Đánh giá</th>
            <th>Ngày đăng</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($comments as $comment) {
            extract($comment);
            $user = select_one_user($user_id);
            $product = select_one_product($product_id);
        ?>
            <tr>
                <td><?=$id?></td>
                <td>
                    <img src="../../../uploads/<?=$product['image']?>" alt="">
                </td>
                <td class="col-2"><?=$product['name']?></td>
                <td><?=$user['display_name']?></td>
                <td><?=$content?></td>
                <td><?=$stars?>/5</td>
                <td><?=$date?></td>
                <td class="text-center">
                    <button class="btn btn-danger">Xóa</button>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>