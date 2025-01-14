<body>
    <form action="login" method="post">
        <table width="500" border="1" style="text-align:center; border-radius: 15px; border-collapse: separate;">
            <tr>
                <td colspan="2" style="text-align:center; color:black; font-size:30px; font-weight:bold"> ĐĂNG NHẬP </td>
            </tr>
            <tr>
                <td>Tên đăng nhập</td>
                <td><input name="txt_username" type="text"></td>
            </tr>
            <tr>
                <td>Mật khẩu</td>
                <td><input name="txt_password" type="password"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input name="btn_login" type="submit" value="Đăng nhập">
                    <p><a href="http://localhost/phpnangcao/webbanquanao/authcontroller/">Đăng ký</a></p>
                    <p><a href="registerUser.php">Quên mật khẩu?</a></p>
                    
                </td>
            </tr>
        </table>
    </form>
</body>