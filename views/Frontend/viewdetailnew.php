<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Page</title>
    <style>
   /* Căn bản cho phần tin tức */
.news {
    font-size: 28px; /* Cập nhật kích thước chữ */
    font-weight: bold; /* Cập nhật độ đậm chữ */
    color: #333; /* Cập nhật màu chữ */
    margin-bottom: 20px; /* Cập nhật khoảng cách dưới */
}

/* Kiểu cho tiêu đề tin tức */
.news h2 {
    font-size: 28px; /* Cập nhật kích thước chữ */
    font-weight: bold; /* Cập nhật độ đậm chữ */
    color: #333; /* Cập nhật màu chữ */
    margin-bottom: 10px; /* Cập nhật khoảng cách dưới */
    text-align: center; /* Đảm bảo tiêu đề được căn giữa theo chiều ngang */
}

/* Kiểu cho hình ảnh */
.news img {
    width: 100%; /* Chiều rộng 100% */
    height: auto; /* Chiều cao tự động */
    border-radius: 0; /* Không bo góc */
    margin-bottom: 15px; /* Khoảng cách dưới */
    display: block; /* Hiển thị như khối */
}

/* Kiểu cho mô tả (đoạn văn dưới hình ảnh) */
.news p {
    font-size: 16px; /* Kích thước chữ */
    color: #333; /* Màu chữ */
    text-align: justify; /* Căn chỉnh văn bản cho mô tả */
    margin-top: 10px; /* Khoảng cách trên */
}

/* Container cho tin tức */
.news-container {
    display: flex; /* Chuyển sang flexbox */
    flex-direction: row; /* Đảm bảo nó nằm trong một hàng ngang */
    justify-content: flex-start; /* Căn trái các mục */
    gap: 20px; /* Khoảng cách giữa các mục */
    margin: 0 auto; /* Căn giữa container */
    padding: 20px; /* Khoảng cách bên trong */
    overflow-x: auto; /* Đảm bảo cuộn ngang nếu cần */
}

/* Mỗi khối tin tức */
.news-container .news {
    flex-basis: 300px; /* Chiều rộng cố định cho mỗi mục tin tức */
    width: 300px; /* Chiều rộng cố định, điều chỉnh nếu cần */
    margin-bottom: 20px; /* Khoảng cách dưới */
}

/* Tiêu đề cho khối */
.block_title {
    text-align: center; /* Căn giữa tiêu đề */
    margin-bottom: 20px; /* Khoảng cách dưới */
}

.block_title h3 {
    font-size: 28px; /* Cập nhật kích thước chữ */
    font-weight: bold; /* Cập nhật độ đậm chữ */
    color: #333; /* Cập nhật màu chữ */
    margin-bottom: 10px; /* Cập nhật khoảng cách dưới */
}

/* Kiểu cho thanh bên và banner */
.sidebar_widget {
    margin-bottom: 35px; /* Khoảng cách dưới */
}

.banner_img img {
    width: 100%; /* Chiều rộng 100% */
    height: auto; /* Chiều cao tự động */
    border-radius: 5px; /* Bo góc nhẹ */
}

.block_tags a {
    display: inline-block; /* Hiển thị như khối nội tuyến */
    padding: 5px 10px; /* Khoảng cách bên trong */
    margin: 5px; /* Khoảng cách giữa các thẻ */
    background-color: #f1f1f1; /* Màu nền */
    text-decoration: none; /* Không gạch chân */
    border-radius: 5px; /* Bo góc */
    font-size: 14px; /* Kích thước chữ */
}

.block_tags a:hover {
    background-color: #007BFF; /* Màu nền khi di chuột */
    color: white; /* Màu chữ khi di chuột */
}

/* Kiểu cho form đăng ký nhận bản tin */
.newsletter input {
    padding: 10px; /* Khoảng cách bên trong */
    width: 100%; /* Chiều rộng 100% */
    margin-bottom: 10px; /* Khoảng cách dưới */
    border-radius: 5px; /* Bo góc */
    border: 1px solid #ccc; /* Đường viền */
}

.newsletter button {
    padding: 10px; /* Khoảng cách bên trong */
    background-color: #007BFF; /* Màu nền */
    color: white; /* Màu chữ */
    border: none; /* Không có đường viền */
    width: 100%; /* Chiều rộng 100% */
    border-radius: 5px; /* Bo góc */
}

.newsletter button:hover {
    background-color: #0056b3; /* Màu nền khi di chuột */
}

/* Kiểu responsive */
@media (max-width: 768px) {
    .news-container .news {
        flex-basis: 48%; /* Chiều rộng cho màn hình nhỏ hơn */
    }
}

@media (max-width: 576px) {
    .news-container .news {
        flex-basis: 100%; /* Chiều rộng cho màn hình rất nhỏ */
    }
}
    </style>
</head>

<body>
    <div class="pos_home_section">
        <div class="row pos_home">
            <!-- Sidebar Section -->
            <div class="col-lg-3 col-md-8 col-12">
                <div class="sidebar_widget banner mb-35">
                    <div class="banner_img mb-35">
                        <a href="<?php echo BASE_URL; ?>"><img src="<?php echo BASE_URL; ?>public/assets/img/banner/banner5.jpg" alt="Banner 1"></a>
                    </div>
                    <div class="banner_img">
                       <a href="<?php echo BASE_URL; ?>"><img src="<?php echo BASE_URL; ?>public/assets/img/banner/banner6.jpg" alt="Banner 2"></a>
                    </div>
                </div>

                <div class="sidebar_widget tags mb-35">
                    <div class="block_title">
                        <h3>Popular Tags</h3>
                    </div>
                    <div class="block_tags">
                        <a href="#">iPod</a>
                        <a href="#">Samsung</a>
                        <a href="#">Apple</a>
                        <a href="#">iPhone 5s</a>
                        <a href="#">Superdrive</a>
                        <a href="#">Shuffle</a>
                        <a href="#">Nano</a>
                        <a href="#">iPhone 4s</a>
                        <a href="#">Canon</a>
                    </div>
                </div>

                <div class="sidebar_widget newsletter mb-35">
                    <div class="block_title">
                        <h3>Newsletter</h3>
                    </div>
                    <form action="#">
                        <p>Sign up for our newsletter</p>
                        <input placeholder="Your email address" type="text">
                        <button>Subscribe</button>
                    </form>
                </div>
            </div>

            <!-- News Section -->
            <div class="col-lg-9 col-md-12 col-12">
                <div class="block_title">
                    <h3>Tin tức</h3>
                </div>
                <div class="news-container">
                    <div class="row">
                        <?php if (isset($data) && is_array($data)) { ?>
                            <?php foreach ($data as $r) { ?>
                                <?php if (is_array($r)) { ?>
                                    <div class="news">
                                    <h2><?php echo isset($r['Tentintuc']) ? $r['Tentintuc'] : 'Tiêu đề không có'; ?></h2>
                                        <img src="<?php echo isset($r['hinhanh']) ? BASE_URL . '/public/newsphoto/' . $r['hinhanh'] : 'path/to/default/image.jpg'; ?>" alt="News Image">
                                        <p><?php echo isset($r['motasp']) ? $r['motasp'] : 'Mô tả không có'; ?></p>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        <?php } else { ?>
                            <p>Không có dữ liệu</p>
                        <?php } ?>
                    </div>
                </div>

                <div class="banner_area mb-60">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="single_banner">
                                <a href="<?php echo BASE_URL; ?>"><img src="<?php echo BASE_URL; ?>public/assets/img/banner/banner7.jpg" alt="Sale Banner 1"></a>
                                <div class="banner_title">
                                    <p>Up to <span>40%</span> off</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="single_banner">
                                <a href="<?php echo BASE_URL; ?>"><img src="<?php echo BASE_URL; ?>public/assets/img/banner/banner8.jpg" alt="Sale Banner 2"></a>
                                <div class="banner_title title_2">
                                    <p>Sale off <span>30%</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
