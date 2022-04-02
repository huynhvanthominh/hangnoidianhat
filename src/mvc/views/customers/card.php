<div class="container card-shopping">
    <div class="row">
        <div class="col-lg-8">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th><input type="checkbox" checked></th>
                        <th>Tên sản phẩm</th>
                        <th>Đơn giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <p class="center"><input type="checkbox" checked></p>
                        </td>
                        <td>
                            <p>San pham a</p>
                        </td>
                        <td>
                            <p class="center">300.000</p>
                        </td>
                        <td>
                            <div class="table-amount">
                                <button class="btn btn-primary minus">-</button>
                                <input type="text" class="form-control" value="1">
                                <button class="btn btn-primary plus">+</button>
                            </div>
                        </td>
                        <td>
                            <p class="center">300.000</p>
                        </td>
                        <td>
                            <div class="d-flex justify-content-end">
                                <button class="btn btn-info">Xem</button>
                                <button class="btn btn-success ms-1">Cập nhật</button>
                                <button class="btn btn-danger ms-1">Xóa</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p class="center"><input type="checkbox" checked></p>
                        </td>
                        <td>
                            <p>San pham b</p>
                        </td>
                        <td>
                            <p class="center">400.000</p>
                        </td>
                        <td>
                            <div class="table-amount">
                                <button class="btn btn-primary minus">-</button>
                                <input type="text" class="form-control" value="1">
                                <button class="btn btn-primary plus">+</button>
                            </div>
                        </td>
                        <td>
                            <p class="center">400.000</p>
                        </td>
                        <td>
                            <div class="d-flex justify-content-end">
                                <button class="btn btn-info">Xem</button>
                                <button class="btn btn-success ms-1">Cập nhật</button>
                                <button class="btn btn-danger ms-1">Xóa</button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="d-flex justify-content-end">
                <p>Tổng tiền: <b class="fs-4">700.000</b> VNĐ</p>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    Thông tin nhận hàng
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <label for="">Họ và tên người nhận:</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-12 mt-2">
                            <label for="">Số điện thoại người nhận:</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-12 mt-2">
                            <label for="">Địa chỉ nhận hàng:</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-12 mt-2">
                            <label for="">Phương thức thanh toán:</label>
                            <select class="form-select">
                                <option value="" disabled selected>Chọn phương thức thanh toán...</option>
                                <option value="">Thanh toán khi nhận hàng</option>
                                <option value="">Thanh toán online</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex">
                    <button class="ms-auto btn btn-primary">Thanh toán</button>
                </div>
            </div>
        </div>
    </div>
</div>