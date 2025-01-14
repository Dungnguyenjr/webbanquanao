<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
    <style>
        .product {
            border: 1px solid #ccc !important;
            padding: 10px !important;
            margin: 10px !important;
            border-radius: 5px !important;
            transition: transform 0.3s, box-shadow 0.3s !important;
            display: flex;
            flex-direction: column;
            align-items: center;
            max-width: 350px; /* Optional: If you want a max width for each product */
            justify-content: space-between;
        }

        .product img {
            width: 150px;
            height: auto;
        }

        .product:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .button {
            display: block;
            padding: 5px 10px;
            font-size: 16px;
            font-weight: bold;
            color: white;
            background-color: #007BFF;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            margin: 5px 0;
            width: 155px; /* Set width for consistent button size */
        }

        .button:hover {
            background-color: #0056b3;
        }

        .product h2 {
            font-size: 30px;
        }

        .product-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .product-container .product {
            flex-basis: 25%; /* Adjust the number of products per row */
            margin-bottom: 20px;
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
                        <a href="<?php echo BASE_URL; ?>"><img src="<?php echo BASE_URL; ?>/public/assets/img/banner/banner5.jpg" alt=""></a>
                    </div>
                    <div class="banner_img">
                        <a href="<?php echo BASE_URL; ?>"><img src="<?php echo BASE_URL; ?>/public/assets/img/banner/banner6.jpg" alt=""></a>
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

            <!-- Product Section -->
            <div class="col-lg-9 col-md-12 col-12">
                <div style="padding-bottom: 10px;" class="product-container">
                    <div class="grid wide">
                    <div class="block_title">
                        <h3>Tin tức</h3>
                    </div>
                        <div style="padding-top: 30px;" class="row">
                            <?php if (isset($data["data"])): ?>
                                <?php foreach ($data["data"] as $r): ?>
                                    <div class="product">
                                        <h2>Tên tin tức: <?php echo $r['Tentintuc']; ?></h2>
                                        <a href="<?php echo BASE_URL; ?>Clothingnewsuser/Detail/<?php echo $r['id']; ?>">
                                            <img src="<?php echo isset($r['hinhanh']) ? BASE_URL . '/public/newsphoto/' . $r['hinhanh'] : 'path/to/default/image.jpg'; ?>" alt="Product Image" style="cursor:pointer;">
                                        </a>
                                        <p>Mô tả: Với mùa đông sắp tới, quần áo oversized đang trở lại mạnh mẽ trong các bộ sưu tập thời trang. Những chiếc áo khoác to bản, áo len...</p>
                                    </div>

                                <?php endforeach; ?>
                            <?php else: ?>
                                <p>Không có dữ liệu</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="banner_area mb-60">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="single_banner">
                                <a href="<?php echo BASE_URL; ?>"><img src="<?php echo BASE_URL; ?>/public/assets/img/banner/banner7.jpg" alt="" width="250" height="250"></a>
                                <div class="banner_title">
                                    <p>Up to <span>40%</span> off</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="single_banner">
                                <a href="<?php echo BASE_URL; ?>"><img src="<?php echo BASE_URL; ?>/public/assets/img/banner/banner8.jpg" alt="" width="250" height="250"></a>
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
