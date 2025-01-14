<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
    <style>
/* Basic styling for the product display */
.product {
    border: 2px solid #ccc;
    padding: 30px;
    margin: 50px;
    border-radius: 5px;
    transition: transform 0.3s, box-shadow 0.3s;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: flex-start; /* Changed to allow description to grow */
    max-width: 450px; /* Increase the width of product container */
    text-align: center; /* Centers text */
}

.product img {
    width: 200px;
    height: auto;
    margin-bottom: 15px; /* Adds space between image and text */
}

.product:hover {
    transform: translateY(-5px);
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
}

/* Button Styling */
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

/* Product title style */
.product h2 {
    font-size: 18px;
    margin: 5px 0;
}

/* Description style */
.product p {
    font-size: 16px;
    margin-bottom: 15px;
    line-height: 1.5; /* Makes the text more readable */
}

/* Optional: Add a minimum height to product descriptions */
.product p:last-child {
    min-height: 50px;
}

/* Container for all products */
.product-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center; /* Center the products */
    gap: 20px; /* Adds space between products */
    margin: 0 auto; /* Centers the entire container */
    padding: 20px;
    max-width: 1200px; /* Increased the width of product container */
}

/* Style for individual product containers */
.product-container .product {
    flex-basis: 30%; /* Increased width for each product */
    margin-bottom: 20px;
}

/* Sidebar and Banner Styling */
.sidebar_widget {
    margin-bottom: 35px;
}

.banner_img img {
    width: 100%;
    height: auto;
    border-radius: 5px;
}

.block_title h3 {
    font-size: 18px;
    margin-bottom: 10px;
}

.block_tags a {
    display: inline-block;
    padding: 5px 10px;
    margin: 5px;
    background-color: #f1f1f1;
    text-decoration: none;
    border-radius: 5px;
    font-size: 14px;
}

.block_tags a:hover {
    background-color: #007BFF;
    color: white;
}

/* Newsletter Form Styling */
.newsletter input {
    padding: 10px;
    width: 100%;
    margin-bottom: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
}

.newsletter button {
    padding: 10px;
    background-color: #007BFF;
    color: white;
    border: none;
    width: 100%;
    border-radius: 5px;
}

.newsletter button:hover {
    background-color: #0056b3;
}

/* Responsive styling */
@media (max-width: 768px) {
    .product-container .product {
        flex-basis: 48%; /* Adjust width for medium screens */
    }
}

@media (max-width: 576px) {
    .product-container .product {
        flex-basis: 100%; /* Full width for small screens */
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
                         <a href="<?php echo BASE_URL; ?>"><img src="<?php echo BASE_URL; ?>/public/assets/img/banner/banner5.jpg" alt="Banner 1"></a>
                    </div>
                    <div class="banner_img">
                         <a href="<?php echo BASE_URL; ?>"><img src="<?php echo BASE_URL; ?>/public/assets/img/banner/banner6.jpg" alt="Banner 2"></a>
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
                    <div class="block_title">
                        <h3>Products</h3>
                    </div>
                    <div style="padding-top: 30px;" class="row">
                        <?php if (isset($data) && is_array($data)) { ?>
                            <?php foreach ($data as $r) { ?>
                                <?php if (isset($r['Tensp'])) { ?>
                                    <div class="product">
                                        <h2>Mã sản phẩm: <?php echo $r['Ma_sp']; ?></h2>
                                        <h2>Tên sản phẩm: <?php echo $r['Tensp']; ?></h2>
                                        <img src="<?php echo BASE_URL;?>/public/images/<?php echo $r['hinhanh']; ?>" alt="Product Image">
                                        <p>Giá: <?php echo $r['giaxuat']; ?></p>
                                        <p>Khuyến mãi: <?php echo $r['khuyenmai']; ?></p>
                                        <p>Mô tả sản phẩm: <?php echo $r['mota_sp']; ?></p>
                                        <button type="button" onclick="addToCart('<?php echo BASE_URL; ?>home/cart/<?php echo $r['Ma_sp']; ?>')" class="button">Add to Cart</button>
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
