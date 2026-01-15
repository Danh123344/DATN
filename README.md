HƯỚNG DẪN CÀI ĐẶT VÀ SỬ DỤNG ĐỒ ÁN (PHP NATIVE)
Hệ thống  trực tuyến được xây dựng bằng ngôn ngữ PHP thuần (Native PHP), sử dụng cơ sở dữ liệu MySQL.
🛠 Yêu cầu hệ thống
XAMPP (Phiên bản PHP 7.4 hoặc 8.x).
Trình duyệt web (Chrome, Edge, Firefox...).
🚀 Các bước cài đặt
1. Chuẩn bị Cơ sở dữ liệu
Khởi động Apache và MySQL trong bảng điều khiển XAMPP.
Truy cập vào đường dẫn: http://localhost/phpmyadmin/.
Tạo một cơ sở dữ liệu mới với tên là sachshop.
Chọn cơ sở dữ liệu vừa tạo, nhấn vào thẻ Import.
Chọn file .sql nằm trong thư mục database của project này để tải lên.
2. Cấu hình kết nối Database
Để code có thể kết nối với MySQL trên máy của bạn, hãy kiểm tra file sau:
Đường dẫn: service/config.php
Nội dung cần lưu ý:
PHP
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root'); // Username mặc định của XAMPP
define('DB_PASSWORD', '');     // Password mặc định là để trống
define('DB_DATABASE', 'sachshop'); // Đảm bảo tên này khớp với tên bạn đã tạo
3. Chạy Website
Copy toàn bộ thư mục project vào đường dẫn: C:\xampp\htdocs\.
Mở trình duyệt và truy cập: http://localhost/DATN/ (hoặc tên thư mục bạn đặt trong htdocs).
📂 Cấu trúc thư mục chính
/admin: Trang quản trị dành cho người quản lý.
/css, /js, /img: Chứa các file giao diện và hình ảnh sản phẩm.
/service: Chứa các file xử lý logic và kết nối cơ sở dữ liệu (Quan trọng nhất).
/database: Chứa file backup dữ liệu MySQL.
index.php: Trang chủ của website.
