<?php

// //Khai báo sử dụng session
session_start();
 
//Xử lý đăng nhập
if (isset($_POST['submit'])) 
{
    //Kết nối tới database
    $conn = mysqli_connect('localhost', 'root', '', 'ct275_baocao');
     
    //Lấy dữ liệu nhập vào
    $name = addslashes($_POST['name']);
    $pwd = addslashes($_POST['pwd']);
     
    //Kiểm tra đã nhập đủ tên đăng nhập với mật khẩu chưa
    if (!$name || !$pwd) {
        echo "Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu!!! <a href='dangnhap.php'>Về trang đăng nhập</a>";
        exit;
    }
     
    //Kiểm tra tên đăng nhập có tồn tại không
    $query = mysqli_query($conn, "SELECT name, password FROM dangky WHERE name='$name'");
    
    if (mysqli_num_rows($query) == 0) {
        echo "Tên đăng nhập này không tồn tại. Vui lòng kiểm tra lại!!! <a href='dangnhap.php'>Về trang đăng nhập</a>";
        exit;
    }
     
    //Lấy mật khẩu trong database ra
    $row = mysqli_fetch_array($query);
     
    //So sánh 2 mật khẩu có trùng khớp hay không
    if ($pwd != $row['password']) {
        echo "Mật khẩu không đúng. Vui lòng nhập lại!!! <a href='dangnhap.php'>Về trang đăng nhập</a>";
        exit;
    }
     
    //Lưu tên đăng nhập
    $_SESSION['name'] = $name;
    // echo "Xin chào " . $name . ". Bạn đã đăng nhập thành công!!! <a href='trangchu.php'>Về trang chủ</a>";
    header('location: trangchu.php');
    die();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">  
    <link href="style.css" rel="stylesheet">
</head>
<body >
    <?php include "./partials/navbar.php";?>
    <div class="container div_login" >
        <form action="#" method="post" enctype="application/x-www-form-urlencoded" class="main-form p-5">
        <div class="form-group row">
                <label for="inputName3" class="col-sm-4 col-form-label text-right">Họ tên</label>
                <div class="col-sm-6">
                <input type="name" class="form-control" id="name" name="name">
                </div>
            </div>    
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-4 col-form-label text-right">Mật khẩu</label>
                <div class="col-sm-6">
                <input type="password" class="form-control" id="pwd" name="pwd">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-6 text-right">
                <button type="submit" name="submit" class="btn btn-primary button">Đăng Nhập</button>
                </div>
            </div>
        </form>  
    </div>
    <?php include "./partials/footer.php";?>
</body>
</html>
