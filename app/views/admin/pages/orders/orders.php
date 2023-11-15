<h2>Danh sách đơn hàng</h2>
<div class="heading d-flex justify-content-between align-items-center mb-4">
    <a href="index.php?act=add_order" class="btn btn-success flex-shrink-1">Thêm đơn hàng</a>
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
            <th>Ảnh sản phẩm</th>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Ngày đặt</th>
            <th>Thành tiền</th>
            <th>Trạng thái</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>Nguyễn Văn A</td>
            <td>
                <img src="https://bizweb.dktcdn.net/100/415/697/products/mc3-fb5749ff-d267-4a6e-8c6b-db2901aacf22.jpg?v=1637916273907" alt="">
            </td>
            <td>Áo Thun Unisex Hà Nội Trà Đá TS001</td>
            <td>2.399.000đ</td>
            <td>2</td>
            <td>12/11/2023</td>
            <td>4.798.000đ</td>
            <td>Chờ giao hàng</td>
            <td class="text-center">
                <button class="btn btn-warning">Sửa</button>
                <button class="btn btn-danger">Hủy</button>
                <button class="btn btn-primary">Chi tiết</button>
            </td>
        </tr>
    </tbody>
</table>