<?php 
    session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">  
    <link href="./style.css" rel="stylesheet">
</head>
<body >
    <?php include "./navbar.php";?> 
    <div class="container" >
        <?php 
            if (isset($_SESSION['name']) && $_SESSION['name']){ ?>
                <div class="text-center">
                    <h3 class="badge badge-light" >Bạn đã đăng nhập với tên là <?php echo $_SESSION['name'] ?> </h3>
                    <br>
                    <h5 class="badge badge-light" >Click vào đây để <a href="dangxuat.php">Đăng xuất</a></h5>
                    <br><br>
                </div>
            <?php }
            else{ ?>
            <div class="text-center"> 
                <h3 class="badge badge-light" > Bạn chưa đăng nhập </h3>
            </div>
            <?php }
        ?>
        <div>&nbsp;</div>
        <div class="row">
            <div class="col-sm">
                <div class='text-justify'> 
                <?php
                $conn = mysqli_connect('localhost', 'root', '', 'ct275_baocao');
                $query = mysqli_query($conn, "SELECT id, name, image, price FROM sanpham where id = '6'");
                     while($rows = mysqli_fetch_assoc($query))
                    {       
                        $name = $rows['name'];
                        $image = $rows['image'];  
                        echo '<img src="'.$image.'" alt="" class="echo">'."</br>";  
                        echo "<h4><b>$name</b></h4>" ."</br>";
                    }
                ?>
                    <h4>Mặt Nạ dưỡng chất từ thiên nhiên, thẩm thấu từ bên trong làm cho làn da trở nên mịn màn và luôn trẻ trung</h4>
                </div>
            </div>
            <div class="col-sm">
                <div class='text-justify'> 
                <?php
                    $conn = mysqli_connect('localhost', 'root', '', 'ct275_baocao');
                    $query = mysqli_query($conn, "SELECT id, name, image, price FROM sanpham where id = '7'");
                        while($rows = mysqli_fetch_assoc($query))
                        {       
                            $name = $rows['name'];
                            $image = $rows['image'];  
                            echo '<img src="'.$image.'" alt="" class="echo"">'."</br>";  
                            echo "<h4><b>$name</b></h4>" ."</br>";
                        }
                ?>
                    <h4>Mặt nạ cao cấp giúp săn chắc da, ngăn ngừa lão hóa nuôi dưỡng làn da từ sâu bên trong</h4>
                </div>
            </div>
        </div>
        <br><br>
        <h3 style="color: #00cc33"><b>Sản phẩm phù hợp với mọi loại da, giúp dưỡng ẩm, cấp nước và tái tạo tế bào da mới và phục hồi làn da hư tổn.</b></h3>
        <br><br>
        <h1 class="text-center h1"><b>Cảm ơn bạn đã lựa chọn sản phẩm của chúng tôi!!!</b></h1>
    </div>
    <br><br><br><br><br>
    <?php include "./footer.php";?>
</body>
</html>