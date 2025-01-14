<form action="" method="post" enctype="multipart/form-data" >
    
    <table>
        <tr>
            <td colspan="2" style="text-align:center; color:black; font-size:30px; font-weight:bold">ĐĂNG KÝ</td>
        </tr>
        <tr>
            <td style="color:black">Fullname</td>
            <td><input name="txt_fullname" type="text" placeholder="Nhập đầy đủ họ tên" required/></td>
        </tr>
        <tr>
            <td style="color:black">Username</td>
            <td><input name="txt_username" type="text" placeholder="Nhập tên đăng nhập" required/></td>
        </tr>
        <tr>
            <td style="color:black">Password</td>
            <td><input name="txt_password" type="password" placeholder="Nhập mật khẩu" required/></td>
        </tr>
        <tr>
            <td style="color:black">Confirm Password</td>
            <td><input name="txt_confirm_password" type="password" placeholder="Nhập lại mật khẩu" required/></td>
        </tr>
        <tr>
            <td style="color:black">Email</td>
            <td><input name="txt_email" type="email" placeholder="Nhập email" required/></td>
        </tr>
        <tr>
            <td style="color:black">Phone</td>
            <td><input name="txt_phone" type="text" placeholder="Nhập số điện thoại" required/></td>
        </tr>
        <tr>
            <td style="color:black">Giới tính</td>
            <td style="color:black">
                <input type="radio" name="txt_gioitinh" value="Nam" checked="checked"/>Nam
                <input type="radio" name="txt_gioitinh" value="Nữ"/>Nữ
            </td>
        </tr>
        <tr>
            <td style="color:black">Quốc tịch</td>
            <td>
                <select name="quoctich">
                    <option value="Mỹ">Mỹ</option>
                    <option value="Việt Nam" selected="selected">Việt Nam</option>
                    <option value="Hàn Quốc">Hàn Quốc</option>
                </select>
            </td>
        </tr>
        <tr>
            <td style="color:black">Địa chỉ</td>
            <td>
                <textarea name="txt_address" placeholder="nhập địa chỉ" cols="30" rows="5" required></textarea>
            </td>
        </tr>
        <tr>
            <td style="color:black">Sở thích</td>
            <td style="color:black">
                <input type="checkbox" name="txt_xemphim" value="Xem phim"/>Xem Phim <br/>
                <input name="txt_thethao" type="checkbox" value="Thể thao"/>Thể thao<br/>
                <input name="txt_web" type="checkbox" value="Web" checked="checked"/>Web
            </td>
        </tr>
        <tr style="display: none;">
            <td style="color:black">Mức độ truy cập</td>
            <td>
                <select name="mucdotruycap">
                    <option value="Nguoidung" selected="selected">Người dùng</option>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align:center">
                
                <!-- <input type="submit" name="" value="ĐĂNG KÝ THÀNH VIÊN"/> -->
    <button formaction="./register/" type="submit" name="Đăng ký" value="ĐĂNG KÝ" >Đăng ký</button>

                <input type="reset" name="Reset" value="Reset"/>
                <p><a href="http://localhost/phpnangcao/webbanquanao/Dangnhap/">Đăng nhập</a></p>
            </td>
        </tr>
    </table>
</form>
