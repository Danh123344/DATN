<?php
require_once('../libs/dbhelper.php');
require_once('../libs/utility.php');

include('./header.php');
include('./navbar.php');

// Khởi tạo giá trị mặc định để tránh lỗi undefined
$ngaybatdau = '';
$ketthuc    = '';

if (isset($_POST['loc'])) {
    $ngaybatdau = isset($_POST['batdau']) ? $_POST['batdau'] : '';
    $ketthuc    = isset($_POST['ketthuc']) ? $_POST['ketthuc'] : '';
}
?>
<div class="container-fluid">
    <center>
        <h2>QUẢN LÝ HOÁ ĐƠN</h2>
    </center>
    <h4>Lọc Sản Phẩm </h4>
    <form class="form-inline" style="margin: 10px;" method="post">

        <br>
        <label for="batdau">Ngày Bắt Đầu</label>
        <input type="date" class="form-control" id="batdau" name="batdau" value="<?= $ngaybatdau ?>">
        <label for="ketthuc" style="margin: 10px;">Ngày Kết Thúc:</label>
        <input type="date" class="form-control" name="ketthuc" id="ketthuc" value="<?= $ketthuc ?>">
        <button type="submit" style="margin: 5px;" name="loc" class="btn btn-primary">Lọc</button>
    </form>

    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th width="50px">Mã Hoá Đơn</th>
                <th width="150px">KH</th>
                <!-- ĐÃ BỎ CỘT NV -->
                <th width="100px">Ngày Lập</th>
                <th width="100px">Tổng Tiền</th>
                <th width="150px">Địa Chỉ</th>
                <th width="100px">Trạng Thái</th>
                <th width="100px"></th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Câu SQL lấy danh sách hóa đơn
            $baseSql = "SELECT 
                            hd.*, 
                            nv.HoTen AS tennv, 
                            kh.HoTen AS tenkh
                        FROM hoadon AS hd
                        LEFT JOIN nhanvien AS nv ON hd.MaNV = nv.MaNV
                        LEFT JOIN khachhang AS kh ON hd.MaKH = kh.id";

            if (!isset($_POST['loc']) || empty($ngaybatdau) || empty($ketthuc)) {
                $sql = $baseSql;
            } else {
                $sql = $baseSql . " WHERE hd.NgayLap BETWEEN '$ngaybatdau' AND '$ketthuc'";
            }

            $dshoadon = executeResult($sql);

            foreach ($dshoadon as $row) {
                $trangthai = '<button class="btn btn-danger" onclick="changetrangthai(' . $row['MaHD'] . ')">Đang xử lý</button>';
                if ($row['TrangThai'] == 1) {
                    $trangthai = '<button class="btn btn-primary" onclick="changetrangthai2(' . $row['MaHD'] . ')">Đã xử lý</button>';
                }
                ?>
                <tr>
                    <td><?php echo $row['MaHD']; ?></td>
                    <td><?php echo $row['MaKH'] . " - " . $row['tenkh']; ?></td>
                    <!-- ĐÃ BỎ Ô HIỂN THỊ NHÂN VIÊN -->
                    <td><?php echo $row['NgayLap']; ?></td>
                    <td><?php echo $row['TongTien']; ?></td>
                    <td><?php echo $row['DiaChiGiaoHang']; ?></td>
                    <td><?php echo $trangthai; ?></td>
                    <td>
                        <a href="#" class="btn btn-success get_id"
                           data-id="<?php echo $row['MaHD'] ?>"
                           data-toggle="modal" data-target="#myModal">
                            Chi Tiết
                        </a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>

    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">CHI TIẾT HOÁ ĐƠN</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body" id="load_data">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function changetrangthai(id) {
        var option = confirm('Bạn có muốn cập nhật trạng thái đơn hàng không ?')
        if (!option) {
            return;
        }

        $.ajax({
            url: './ajax.php',
            method: 'POST',
            data: {
                MaHD: id,
                action: 'change'
            },
            success: function (data) {
                alert(data);
                location.reload();
            }
        });
    }

    function changetrangthai2(id) {
        var option = confirm('Bạn có muốn cập nhật trạng thái đơn hàng không ?')
        if (!option) {
            return;
        }

        $.ajax({
            url: './ajax.php',
            method: 'post',
            data: {
                MaHD: id,
                action: 'change2'
            },
            success: function (data) {
                alert(data);
                location.reload();
            }
        });
    }

    $(document).ready(function () {
        $(".get_id").click(function () {
            var ids = $(this).data('id');
            $.ajax({
                url: "chitiethoadon.php",
                method: 'post',
                data: {
                    id: ids
                },
                success: function (data) {
                    $('#load_data').html(data);
                }
            });
        });
    });
</script>

<?php
include('./footer.php');
?>
