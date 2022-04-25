<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sản Phẩm</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">  
    <link href="./style.css" rel="stylesheet">
</head>
<body>
    <?php include "./navbar.php";?>
    <div class="container pt-3">
        <?php
            $conn = mysqli_connect('localhost', 'root', '', 'ct275_Baocao');
            $query = mysqli_query($conn, "SELECT * FROM `sanpham`");
            if (mysqli_num_rows($query) > 0) {
                while ($row = mysqli_fetch_assoc($query)) {
        ?> 
                <div class="col-sm-4 col-12" style="height: 500px;" >
                        <div class="border ">   
                            <form action="donhang.php?add=submit_add" method="POST" >   
                            <div ></div>
                            <img src="<?php echo $row['image']; ?>" alt="" class="img_product">
                            
                            <h3 class="text-center"> <?php echo $row['name'] ?> </h3>
                            <br>
                            <h3 class="text-danger text-center"> <?php echo $row['price'] ?>đ</h3>

                            <input type="hidden" name="id" value="<?php $row['id']; ?>">
                            <input type="hidden"class=" border text-center" name="image" value="<?php echo $row['image']; ?>">
                            <input type="hidden"class=" border text-center" name="name" value="<?php echo $row['name']; ?>">
                            <input type="hidden"class=" border text-center" name="price" value="<?php echo $row['price']; ?>">
                        <div class="text-right text-center">
                                <input type="number" max='100' min='0' value='0' size='3' name="quantity">
                                <input type="submit" name="submit_add" value="+Thêm vào giỏ hàng"> 
                            </div>
                            
                        </form>

                            <br>
                            
                        </div>
                        <br>
                       
                </div>
        <?php
            };
        };
        ?>
        
    </div>
    <br><br><br>
    <?php include "./footer.php";?>
</body>

</html>