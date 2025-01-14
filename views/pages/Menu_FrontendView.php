<div class="header_area">
    <!-- Header middle -->
    <div class="header_middle">
        <div class="container">
            <div class="row align-items-center">
                <!-- Logo start -->
                <div class="col-lg-3 col-md-3">
                    <div class="logo">
                        <a href="index.html">
                        <a href="#"><img src="<?php echo BASE_URL; ?>/public/assets/img/images.png" alt="images" width="80px" height="50px"></a>
                        </a>
                    </div>
                </div>
                <!-- Logo end -->

                <!-- Header Right Info start -->
                <div class="col-lg-9 col-md-9">
                    <div class="header_right_info">
                        <!-- Search Bar -->
                        <div class="search_bar">
                           <!-- Form tìm kiếm -->
                    <form action="" method="POST">
                        <input name="search" placeholder="Search..." type="text">
                        <button formaction="<?php echo BASE_URL; ?>home/search" type="submit"><i class="fa fa-search"></i></button>
                    </form>
                        </div>

                        <!-- Shopping Cart -->
<!-- Shopping Cart -->
<div class="shopping_cart">
    <a href="javascript:void(0);" id="cart-dropdown-toggle">
    <i class="fa-regular fa-user"></i>
        <span>
            <?php
            // Kiểm tra xem người dùng đã đăng nhập hay chưa
            if (isset($_COOKIE['fullname'])) {
                // Nếu đăng nhập, hiển thị tên người dùng
                echo $_COOKIE['fullname'];
            } else {
                // Nếu chưa đăng nhập, hiển thị "Guest"
                echo 'Guest'; // Hiển thị 'Guest' nếu chưa đăng nhập
            }
            ?>
        </span>
        <i class="fa fa-angle-down"></i>
    </a>

    <!-- Mini Cart Dropdown chỉ xuất hiện khi đăng nhập -->
    <div class="mini_cart" id="mini-cart-dropdown">
        <?php if (isset($_COOKIE['fullname'])): ?>
            <!-- Nếu đã đăng nhập, hiển thị các tùy chọn tài khoản -->
            <ul>
                <li><a href='<?php echo BASE_URL; ?>Accountuser/getShow'>Thông tin tài khoản</a></li>
                <li><a href='<?php echo BASE_URL; ?>Accountuser/password'>Đổi mật khẩu</a></li>
                <li><a href='<?php echo BASE_URL; ?>Customeruser/getShow'>Khách hàng</a></li>
                <li><a href='<?php echo BASE_URL; ?>Orderdetails/getShow'>Đơn hàng</a></li>
                <li><a href='<?php echo BASE_URL; ?>Reportuser/getShow'>Lịch sử mua hàng</a></li>
            </ul>
            <div class='cart_button'>
                <a href='<?php echo BASE_URL; ?>Dangnhap/logout'><strong>Đăng Xuất</strong></a>
            </div>
        <?php else: ?>
            <!-- Nếu chưa đăng nhập, hiển thị các liên kết Đăng ký và Đăng nhập -->
            <ul>
                <li><a href='<?php echo BASE_URL; ?>authcontroller/'>Đăng ký</a></li>
                <li><a href='<?php echo BASE_URL; ?>Dangnhap/'>Đăng nhập</a></li>
            </ul>
        <?php endif; ?>
    </div>
</div>

<!-- JavaScript để quản lý việc hiển thị dropdown -->
<script>
    // Lấy các phần tử
    const toggleButton = document.getElementById("cart-dropdown-toggle");
    const miniCart = document.getElementById("mini-cart-dropdown");

    // Khi người dùng nhấn vào biểu tượng giỏ hàng (hoặc Guest), toggle hiển thị của dropdown
    toggleButton.addEventListener("click", function() {
        // Toggle hiển thị của dropdown
        miniCart.style.display = (miniCart.style.display === "block") ? "none" : "block";
    });

    // Tùy chọn: Nếu nhấn vào bất kỳ nơi nào ngoài dropdown, đóng dropdown
    window.addEventListener("click", function(event) {
        if (!event.target.closest(".shopping_cart")) {
            miniCart.style.display = "none";
        }
    });
</script>



                        <!-- Cart Icon -->
                        <div class="cart_icon">
                            <?php
                            $totalQty = 0;
                            if (isset($_COOKIE['id'])) {
                                $userId = $_COOKIE['id'];
                                $cartItems = $this->model("cart")->getCartById($userId);
                                foreach ($cartItems as $item) {
                                    $totalQty += $item['qty'];
                                }
                            } else {
                                $cartItems = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];
                                foreach ($cartItems as $item) {
                                    $totalQty += $item['qty'];
                                }
                            }
                            ?>
                            <a href="<?php echo BASE_URL; ?>Order">
                                <i class="fas fa-shopping-cart"></i>
                                <span id="count_shopping_cart_store"><?php echo $totalQty; ?></span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Header Right Info end -->
            </div>
        </div>
    </div>
    <!-- Header middle end -->

    <!-- Header bottom -->
    <div class="header_bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="main_menu_inner">
                        <div class="main_menu d-none d-lg-block">
                            <nav>
                                <ul>
                                    <li class="active"><a href="<?php echo BASE_URL;?>User">Home</a></li>
                                    <li><a href="<?php echo BASE_URL;?>User">Sản phẩm</a>
                                        <div class="mega_menu jewelry">
                                            <div class="mega_items jewelry">
                                                <ul>
                                                    <li><a href="shop-list.html">Quần áo trẻ em</a></li>
                                                    <li><a href="shop-fullwidth.html">Quần áo người lớn</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                    <li><a href="#">Nữ</a>
                                    <div class="mega_menu">
    <div class="mega_top fix">
        <!-- Áo Section -->
        <div class="mega_items">
            <h3><a href="#">Áo</a></h3>
            <ul>
                <li><a href="#">Áo dài tay</a></li>
                <li><a href="#">Áo cộc tay</a></li>
            </ul>
        </div>
        
        <!-- Quần và váy Section -->
        <div class="mega_items">
            <h3><a href="#">Quần và váy</a></h3>
            <ul>
                <li><a href="#">Quần dài</a></li>
                <li><a href="#">Quần ngắn</a></li>
                <li><a href="#">Váy dài</a></li>
                <li><a href="#">Váy ngắn</a></li>
            </ul>
        </div>
        
        <!-- Váy Section -->
        <div class="mega_items">
            <h3><a href="#">Váy</a></h3>
            <ul>
                <li><a href="#">Váy dài</a></li>
                <li><a href="#">Váy ngắn</a></li>
            </ul>
        </div>
        
    </div>
    <div class="pos_home_section">
        <div class="container-fluid">
            <div class="mega_items">
                 <a href="#"><img src="<?php echo BASE_URL; ?>/public/assets/img/banner4.jpg" alt="Banner 4" width="199px" height="155px"></a>
             </div>
        </div>
    </div>

</div>

                                    </li>
                                    <li><a href="#">Nam</a>
                                        <div class="mega_menu">
                                            <div class="mega_top fix">
                                                <div class="mega_items">
                                                    <h3><a href="#">Áo</a></h3>
                                                    <ul>
                                                        <li><a href="#">Áo dài tay</a></li>
                                                        <li><a href="#">Áo cộc tay</a></li>
                                                    </ul>
                                                </div>
                                                <div class="mega_items">
                                                    <h3><a href="#">Quần</a></h3>
                                                    <ul>
                                                        <li><a href="#">Quần dài</a></li>
                                                        <li><a href="#">Quần cộc</a></li>
                                                        <li><a href="#">Quần âu</a></li>
                                                        <li><a href="#">Quần vải</a></li>
                                                        <li><a href="#">Quần Jean</a></li>
                                                    </ul>
                                                </div>
                                                <div class="mega_items">
                                                    <a href="#"><img src="<?php echo BASE_URL; ?>/public/assets/img/banner3.jpg" alt="Banner 3"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li><a href="<?php echo BASE_URL;?>Clothingnewsuser/getShow">Tin tức</a>
                                                                <div class="mega_menu jewelry">
                                                                    <div class="mega_items jewelry">
                                                                        <ul>
                                                                            <li><a href="blog-details.html">blog details</a></li>
                                                                            <li><a href="blog-fullwidth.html">blog fullwidth</a></li>
                                                                            <li><a href="blog-sidebar.html">blog sidebar</a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>  
                                                            </li>
                                                            <li><a href="contact.html">Phản hồi</a>
                                                        </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header bottom end -->
</div>
