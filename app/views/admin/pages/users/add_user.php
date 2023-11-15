<h2>Thêm mới người dùng</h2>
<form action="index.php?act=add_user" method="post">
    <div class="form-group">
        <label for="">Tên người dùng</label>
        <input type="text" class="form-control" placeholder="Tên người dùng" name="display_name">
    </div>
    <div class="form-group">
        <label for="">Tên đăng nhập</label>
        <input type="text" class="form-control" placeholder="Tên đăng nhập" name="username">
    </div>
    <div class="form-group">
        <label for="">Mật khẩu</label>
        <input type="text" class="form-control" placeholder="Mật khẩu" name="password">
    </div>
    <div class="form-group">
        <label for="">Email</label>
        <input type="text" class="form-control" placeholder="Email" name="email">
    </div>
    
    <button type="submit" class="btn btn-primary">Thêm mới</button>
</form>