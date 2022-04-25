<?php
    session_start();
    
    $conn = mysqli_connect('localhost', 'root', '', 'ct275_baocao');

    if (isset($_POST["submit_add"])) {
        $id = $_POST["id"];
        $name = $_POST["name"];
        $image = $_POST["image"];
        $price = $_POST["price"];
        $quantity = $_POST['quantity'];
        $query = mysqli_query($conn, "INSERT INTO `donhang` (id, name, image,  price, quantity) VALUES ('$id', '$name', '$image', '$price', '$quantity')");
    }

    if(isset($_POST["order_click"]))
    {
        $name = $_POST["name"];
        $address = $_POST["address"];
        $phone = $_POST["phone"];
        $note = $_POST["note"];
        $query = mysqli_query($conn, "INSERT INTO `nguoidung` (name, address, phone, note) VALUES ('$name', '$address', '$phone', '$note')");
        header('location: trangchu.php');
    }

    if(isset($_GET["delete"])){
        $remove_id = $_GET['delete'];
        mysqli_query($conn,"DELETE FROM `donhang` WHERE `id` = $remove_id");
        header('location: ./donhang.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đơn Hàng</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">  
    <link href="./style.css" rel="stylesheet">
</head>
<body>
    <?php include "./navbar.php";?>
    <div class="container" >
        <br>
        <h1 class="text-center">Đơn Hàng</h1>
        <br>
        <form action="" id="donhang" method="POST" style=" background-color: white">
            <table class="border container">
                <tr>
                    <th class="text-center border">STT</th>
                    <th class="text-center border">Tên sản phẩm</th>
                    <th class="text-center border">Ảnh sản phẩm</th>
                    <th class="text-center border">Đơn giá</th>
                    <th class="text-center border">Số lượng</th>
                    <th class="text-center border">Thành tiền</th>
                    
                </tr>
            
                <?php
                    $conn = mysqli_connect('localhost', 'root', '', 'ct275_baocao');
                    $donhang = mysqli_query($conn, "SELECT * FROM `donhang`");                   
                    $stt = 1;
                    $total = 0;
                    while($row = mysqli_fetch_array($donhang)) { ?>
                        <tr>
                            <td class="border text-center"> <?php echo $stt; ?></td>
                            <td class="border text-center"> <?php echo $row['name'] ?></td>
                            <td class="border text-center"> <img src="<?php echo $row['image'] ?>" class="td_img"> </td>
                            <td class="border text-center"> <?php echo $row['price'] ?> VNĐ</td>
                            <td class="border text-center"> <?php echo $row['quantity'] ?> </td>
                            <td class="border text-center"> <?php echo ($row['price'] * $row['quantity']); ?> VNĐ </td>
                            <?php $total += ($row['price'] * $row['quantity']) ?>
                            
                        </tr>
                        
                    <?php
                        $stt++;
                        }

                ?>
                <tr class="text-right">
                    <td class="border" colspan="7">Thành Tiền: <?php echo $total ?> VNĐ</td>
                </tr>
                
            </table>
            
            
        </form> 
        <br><br>  
        <?php
                    $conn = mysqli_connect('localhost', 'root', '', 'ct275_baocao');
                    $donhang = mysqli_query($conn, "SELECT * FROM `donhang`");
                    $row = mysqli_fetch_array($donhang);
                ?>
               <button> <a style="color: #000000; text-decoration: none;" href='donhang.php?delete=""' onclick="return confirm('Bạn có chắc chắn muốn xóa!!!');">XÓA ĐƠN HÀNG</a></button>
                
            <hr>
            <div>  
                <form action="#" method="POST" onsubmit="return validate(this);">
                    <div>
                        <h2><b>Thông tin người mua</b></h2>
                    </div>
                    <br>
                    <div>
                        <label for="">Người nhận: </label>
                        <input type="text" name="name" id="name">
                    </div>
                    <div>
                       <label for="">Số điện thoại: </label>
                       <input type="text" name="phone" id="phone">
                    </div>
                    <div>
                        <label for="">Địa chỉ người nhận: </label>
                        <input type="text" name="address" id="address">
                    </div>
                    <div>
                        <label for="">Ghi chú: </label>
                        <textarea name="note" id="note" cols="50" rows="5"></textarea>
                    </div>
                    <div >
                        <input  type="submit" name="order_click" value="ĐẶT HÀNG">
                    </div>
                </form>
            </div>
            <br> <br>
        
        <br> <br>
    </div>
    <br> <br>
    <script>
        function validate(frm)
        {
            var name = document.getElementById('name');
            var phone = document.getElementById('phone');
            var address = document.getElementById('address');
            if (name!=null && name.value.length<4 )
            {
                alert('Tên không hợp lệ. Vui lòng nhập lại!!!');
                return false;
            }
            if (phone!=null && phone.value.length<10 )
            {
                alert('Số điện thoại không hợp lệ. Vui lòng nhập lại!!!');
                return false;
            }
            if (address!=null && address.value.length<10 )
            {
                alert('Địa chỉ không hợp lệ. Vui lòng nhập lại!!!');
                return false;
            }
            alert("Cảm ơn bạn đã mua sản phẩm của bên shop!!!");
            return true;
        }
    </script>
    <?php include "./footer.php";?>
</body>
</html>