﻿<?php
ob_start();
?>
<?php

 $link = mysqli_connect("localhost","root","");
 mysqli_select_db($link, "ql_khach_san");
 mysql_query("SET NAMES 'utf8'");  
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Admin</title>
	<link rel="stylesheet" href="../css/style.css" type="text/css" media="all" />
        <script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
</head>
<body>
<!-- Header -->
<div id="header">
	<div class="shell">
		<!-- Logo + Top Nav -->
		<div id="top">
			<h1><a href="../../index.php">Victoria Hotel</a></h1>
			<div id="top-navigation">
				Welcome  <strong><?php 
session_start();
$a=$_SESSION['lg_username'];
$ss="select Quyen from admin where User='$a'";
$ss1=mysqli_query($link, $ss);
$ss2=mysqli_fetch_array($ss1);
if(!isset($_SESSION['login']) || $_SESSION['login'] != "ok")
{
    header("location:../login.php");
}
else
{
    echo $_SESSION['lg_username'];
         
}
?></strong>
                                <?php
                                $q1="select * from admin where User='$a'";
                                    $re1= mysqli_query($link, $q1) or die (mysqli_error($link));
                                    $r1= mysqli_fetch_array($re1);
                                echo"
                                <span>|</span>
                                <a href='../admin/view.php?id=$r1[0]'>View Profile</a>";?>
                                <?php $q = "select * from admin where User='$a' and Quyen=1";
                                  $re= mysqli_query($link, $q) or die (mysqli_error($link));
                                  if(mysqli_num_rows($re)>0)
                                  {       
                                  echo "<span>|</span>
                                <a href='../admin/setting-trangchu.php'>Setting</a>";
                                  }
                                ?>
				<span>|</span>
				<a href="../login.php?logout=<?php echo $a ?>">Log out</a>
			</div>
		</div>
		<!-- End Logo + Top Nav -->
		
		<!-- Main Nav -->
		<div id="navigation">
			<ul>
			    <li><a href="../../index.php" ><span>Trang chủ</span></a></li>
			    <li><a href="dondatphong.php?p=1"  class="active"><span>Đơn đặt phòng</span></a></li>
			    <li><a href="../phong/phong.php?p=1"><span>Phòng</span></a></li>
			    <li><a href="../loaiphong/loaiphong.php?p=1"><span>Loại phòng</span></a></li>
                            <li><a href="../dichvu/dichvu.php?p=1" ><span>Dịch vụ</span></a></li>
			    <li><a href="../quangcao/quangcao.php?p=1"><span>Quảng cáo</span></a></li>
                            <li><a href="../tintuc/tintuc.php?p=1"><span>Tin tức</span></a></li>
                            <li><a href="../hotro/hotro.php?p=1"><span>Hỗ trợ</span></a></li>
                            <li><a href="../lienhe/lienhe.php?p=1"><span>Liên Hệ</span></a></li>
                            <li><a href="../album/album.php?p=1"><span>Album</span></a></li>
                            <?php $q = "select * from admin where User='$a' and Quyen=1";
                                  $re= mysqli_query($link, $q) or die (mysqli_error($link));
                                  if(mysqli_num_rows($re)>0)
                                  {       
                                  echo "<li><a href='../admin/admin.php?p=1'><span>Quản lý Admin</span></a></li>";
                                  }
                            ?>
			</ul>
		</div>
		<!-- End Main Nav -->
	</div>
</div>
<!-- End Header -->

<!-- Container -->
<div id="container">
	<div class="shell">
		
		<!-- Small Nav -->
		<div class="small-nav">
			<a href="dondatphong.php?p=1">Đơn đặt phòng</a>
			<span>&gt;</span>
			Chi tiết đơn đặt phòng
		</div>
		<!-- End Small Nav -->

		<br />
		<!-- Main -->
		<div id="main">
			<div class="cl">&nbsp;</div>
			
			<!-- Content -->
			<div id="content">
				
				<!-- Box -->
                                <div class="box" style="height: 100%;">
					<!-- Box Head -->
					<div class="box-head">
						<h2 class="left">Chi tiết đơn đặt phòng</h2>
					</div>
					<!-- End Box Head -->	
<?php
if(isset($_REQUEST['id']))
{
    $id=$_REQUEST['id'];
    $query="select * from dondatphong where MaDDP='$id'";
    $query2="select Map from dondatphongct where MaDDP='$id'";
    $result1=  mysqli_query($link, $query2);
    $r2=  mysqli_fetch_array($result1);
    $result=  mysqli_query($link, $query);
    $r=  mysqli_fetch_array($result);
    $gt=0;
}

?>
     <table border="2" style="margin: auto; border-radius: 20px; margin-bottom: 10px; margin-top: 10px; " width="470px" cellspacing="20">
         <tr><td class="tdleft1" style="width: 150px">Tên khách hàng:</td><td><?php echo $r[1] ?></td></tr>
         <tr><td class="tdleft1" style="width: 150px">Số CMT:</td><td><?php echo $r[2] ?></td></tr>
         <tr><td class="tdleft1" style="width: 150px">Địa chỉ: </td><td><?php echo $r[3] ?></td></tr>
         <tr><td class="tdleft1" style="width: 150px">Điện thoại:</td><td><?php echo $r[5] ?></td></tr>
         <tr><td class="tdleft1" style="width: 150px">Email:</td><td><?php echo $r[4] ?></td></tr>
         <tr><td class="tdleft1" style="width: 150px">Phòng đặt:</td><td><?php echo $r2[0] ?></td></tr>
         <tr><td class="tdleft1" style="width: 150px">Ngày đặt:</td><td><?php echo date('d-m-Y',strtotime($r[10])) ?></td></tr>
         <tr><td class="tdleft1" style="width: 150px">Ngày đến:</td><td><?php echo date('d-m-Y',strtotime($r[8])) ?></td></tr>
         <tr><td class="tdleft1" style="width: 150px">Ngày đi:</td><td><?php echo date('d-m-Y',strtotime($r[9])) ?></td></tr>
         <tr><td class="tdleft1" style="width: 150px">Hình thức thanh toán:</td><td><?php echo $r[7] ?></td></tr>
         <tr><td class="tdleft1" style="width: 150px">Yêu cầu:</td><td><p style="width: 250px; height: 100%"><?php echo $r[6] ?></p></td></tr>
         <tr><td></td><td> <div id="spanview" style="margin-left: 15px">
            <?php echo "<a href='edit.php?id={$r[0]}'><img class='tool' title='Sửa' src='../css/images/edit.jpg' width='30px' height='30px'></a>"
                     . "<a href='dondatphong.php?p=1'><img class='tool' title='Trở lại' src='../css/images/back.jpg' width='30px' height='30px'></a>"
            ?>
            </div></td></tr>
     </table>
           
				</div>
				<!-- End Box -->
			</div>
			<!-- End Content -->
			<div class="cl">&nbsp;</div>			
		</div>
		<!-- Main -->
	</div>
</div>
<!-- End Container -->

<!-- Footer -->
<div id="footer">
	<div class="shell">
		<span class="left">&copy; 2014 - Victoria Hotel</span>
		<span class="right">
			Design by <a href="#" target="_blank" title="Kai Nguyen">celhpcney@gmail.com</a>
		</span>
	</div>
</div>
<!-- End Footer -->
	
</body>
</html>