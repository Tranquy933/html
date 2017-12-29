
<?php 
include('inc/connect.php');
$nameErr = $addErr = $emailErr = $phoneErr = $parttenErr = "";
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $add = $_POST['address'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $partten = "/^[A-Za-z0-9_\.]{6,32}@([a-zA-Z0-9]{2,12})(\.[a-zA-Z]{2,12})+$/";
   $sql = 'INSERT INTO `customer`(name,address,email,phone) VALUES ("'.$name.'", "'.$add.'", "'.$email.'", "'.$phone.'")';
   if (trim($_POST['name'])== '') {
        $nameErr = "* Vui long nhap ten";
    }
    if (trim($_POST['address'])== '') {
        $addErr = "* Vui long nhap dia chi";
    }
    
    if (trim($_POST['phone'])== '' ) {
        $phoneErr = "* Vui long nhap so dien thoai";
    }
    if (trim($_POST['email'])== '') {
        $emailErr = "* Vui long nhap dia chi email";
    }
    else if(!preg_match($partten ,$email)){
        $parttenErr =  "* Vui long nhập đúng định dạng email";
    }
    else if(!$nameErr && !$addErr && !$emailErr && !$phoneErr && !$parttenErr){
     mysqli_query($conn,$sql);
    }
} 
?>

<div class="container wrapper">
    <div class="col-md-6">
        <form class="form-horizontal" method="post" action="">
            <div class="panel panel-info">
                <div class="panel-heading">Địa Chỉ</div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="col-md-6 col-xs-12">
                            <strong>Tên:</strong>
                            <input type="text" name="name" class="form-control" value="" />
                            <div class="help-inline text-danger"><?php echo $nameErr; ?></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12"><strong>Địa chỉ:</strong></div>
                        <div class="col-md-12">
                            <input type="text" name="address" class="form-control" value="" />
                            <div class="help-inline text-danger"><?php echo $addErr; ?></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12"><strong>Số điện thoại:</strong></div>
                        <div class="col-md-12"><input type="number" name="phone" class="form-control" value="" /></div>
                        <div class="help-inline text-danger"><?php echo $phoneErr; ?></div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12"><strong>Địa chỉ Email:</strong></div>
                        <div class="col-md-12"><input type="text" name="email" class="form-control" value="" /></div>
                         <div class="help-inline text-danger"><?php echo $emailErr; ?></div>
                          <div class="help-inline text-danger"><?php echo $parttenErr; ?></div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <button type="submit" name="submit" class="btn btn-primary btn-submit-fix">Thanh Toán</button>
                        </div>
                    </div>
                </div>
            </div> 
        </form>
    </div>
    <div class="col-md-6">
        <?php include('pay_cart.php') ?>
    </div>

</div>