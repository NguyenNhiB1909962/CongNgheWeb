<?php

    $conn = mysqli_connect('localhost', 'root', '', 'ct275_baocao');
	if (isset($_POST["submit"])) {
		$name = $_POST["name"];
		$password = $_POST["pwd"];
		$email = $_POST["email"];
        $query = mysqli_query($conn, "INSERT INTO `dangky` (name, email, password) VALUES ('$name', '$email', '$password')");
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">  
    <link href="./style.css" rel="stylesheet">
</head>
<body >
    <?php include "./navbar.php";?>

    <div class="container div_login">
        <form  action="#" method="post" enctype="application/x-www-form-urlencoded" class="main-form p-5" onsubmit="return validate5(this);" >
            <div class="form-group row"> 
                <label for="name" class="col-sm-4 col-form-label text-right">Họ tên</label>
                <div class="col-sm-6">
                    <input type="name" class="form-control" id="name" name="name">
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-sm-4 col-form-label text-right">Email</label>
                <div class="col-sm-6">
                    <input type="email" class="form-control" id="email" name="email">
                </div>
            </div>
            
            <div class="form-group row">
                <label for="pwd" class="col-sm-4 col-form-label text-right">Mật khẩu</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" id="pwd" name="pwd">
                </div>
            </div>
            
            <div class="form-group row">
                <div class="col-sm-6 text-right">
                    <button type="submit" name="submit" class="btn btn-primary button">Đăng Ký</button>
                </div>
            </div>
        </form>  
    </div>
    <script>
        function validate5(frm)
        {
            var emailReg = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            var mail = document.getElementById('email');
            var pwd = document.getElementById('pwd');
            var hoten = document.getElementById('name');
            if (hoten!=null && hoten.value.length<4 )
            {
                alert('Tên không hợp lệ. Vui lòng nhập lại!!!');
                return false;
            }
            if (mail!=null && emailReg.test(mail.value) == false )
            {
                alert('Email không hợp lệ. Vui lòng nhập lại!!!');
                return false;
            }
            if (pwd!=null && pwd.value.length<8 )
            {
                alert('Mật khẩu không hợp lệ. Vui lòng nhập lại!!!');
                return false;
            }
            alert("Đã gửi dữ liệu");
            return true;
        }
    </script>
    <?php include "./footer.php";?>
</body>
</html>
