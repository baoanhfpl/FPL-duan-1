<h2>Thêm mới màu</h2>
<form action="index.php?act=add_color" method="post">
    <?php showMessage() ?>
    <div class="form-group">
        <label for="">Tên màu</label>
        <input type="text" class="form-control" placeholder="Tên màu" name="name" required>
    </div>
    <button type="submit" class="btn btn-primary">Thêm mới</button>
    <a href="index.php?act=colors" class="btn btn-secondary">Quay lại</a>
</form>