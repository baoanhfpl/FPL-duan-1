<h2>Danh sách liên hệ</h2>
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
            <th>Tên khách hàng</th>
            <th>Số điện thoại</th>
            <th>Email</th>
            <th>Tiêu đề</th>
            <th>Nội dung</th>
            <th>Ngày gửi</th>
            <th>Trạng thái</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            foreach($contacts as $contact) {
                extract($contact);
                $user = query_one("users", $user_id);
        ?>
            <tr>
            <td><?=$id?></td>
            <td><?=$user['display_name']?></td>
            <td><?=$tel?></td>
            <td><?=$email?></td>
            <td><?=$title?></td>
            <td><?=$content?></td>
            <td><?=$date?></td>
            <td>
                <?php if($status == 0) { ?>
                    <a href="index.php?act=show_contact&contact_id=<?=$id?>" class="btn btn-secondary">Chưa phản hồi</a>
                <?php }else { ?>
                    <a href="index.php?act=hide_contact&contact_id=<?=$id?>" class="btn btn-success">Đã phản hồi</a>
                <?php } ?>
            </td>
            <td class="text-center">
                <a href="index.php?act=delete_contact&contact_id=<?=$id?>" class="btn btn-danger">Xóa</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>