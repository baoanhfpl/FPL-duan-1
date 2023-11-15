<h2>Danh sách người dùng</h2>
<div class="heading d-flex justify-content-between align-items-center mb-4">
    <a href="index.php?act=add_user" class="btn btn-success flex-shrink-1">Thêm người dùng</a>
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
            <th>Tên</th>
            <th>Email</th>
            <th>Tên đăng nhập</th>
            <th>Mật khẩu</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($users as $user) { 
            extract($user);
        ?>
            <tr>
                <td><?=$id?></td>
                <td class="col-2"><?=$display_name?></td>
                <td><?=$email?></td>
                <td><?=$username?></td>
                <td><?=$password?></td>
                <td class="text-center">
                    <button class="btn btn-primary">Xem chi tiết</button>
                    <button class="btn btn-danger">Xóa</button>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>