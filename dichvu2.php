<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<?php
 ob_start();
    include_once 'config/connect.php';
    if (isset($_REQUEST['id']))
    {
    $id=$_REQUEST['id'];
 	 }
    $query="select * from dichvu order by MaDV";
    $result=  mysqli_query($link, $query);
?>
<html>
<head>
	<meta charset="UTF-8">
	<title>project khach san</title>
        <link rel="stylesheet" href="css/style-dichvu-chitiet.css" type="text/css">
		<link rel="stylesheet" type="text/css" href="css/style1.css" />
<script type="text/javascript">
	function hide_float_right() {
    var content = document.getElementById('float_content_right');
    var hide = document.getElementById('hide_float_right');
    if (content.style.display == "none")
    {content.style.display = "block"; hide.innerHTML = '<a href="javascript:hide_float_right()">Tắt quảng cáo [X]</a>'; }
        else { content.style.display = "none"; hide.innerHTML = '<a href="javascript:hide_float_right()">Xem quảng cáo...</a>';
    }
    }
</script>	        
	<script type="text/javascript">

function OpenPopup(Url,WindowName,width,height,extras,scrollbars) {
var wide = width;
var high = height;
var additional= extras;
var top = (screen.height-high)/2;
var leftside = (screen.width-wide)/2; newWindow=window.open(''+ Url + '',''+ WindowName + '','width=' + wide + ',height=' + high + ',top=' + top + ',left=' + leftside + ',features=' + additional + '' + ',scrollbars=1');
newWindow.focus();
}
	</script>
	<!--slide show news-->
<script src="http://code.jquery.com/jquery.js"></script>
<script src="js/skdslider.min.js"></script>
<link href="css/skdslider.css" rel="stylesheet">
<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery('#demo1').skdslider({'delay':5000, 'animationSpeed': 2000,'showNextPrev':true,'showPlayButton':true,'autoSlide':true,'animationType':'fading'});
			jQuery('#responsive').change(function(){
			  $('#responsive_wrapper').width(jQuery(this).val());
			});
			
		});
</script>
</head>
<body>
	<a  href="#dautrang" class="vedautrang">	Về đầu trang	</a>
		
	<div class="page">
		<div class="header">
			<a style="	margin-top: -24px;" href="#" id="logo"><img src="images/logo.png" alt="logo" width="148" height="131"></a>
			<div>
				<div>
	
				</div>
				<div>
					<ul >
						<li>
                                                    <a href="index.php"><span>Trang Chủ</span></a>
						</li>
						<li>
                                                    <a href="phongnghi.php"><span>Phòng Nghỉ</span></a>
						</li>
						<li class="selected">
                                                    <a href="dichvu.php"><span>Dịch Vụ</span></a>
						</li>
						<li>
                                                    <a href="tintuc.php"><span>Tin Tức</span></a>
						</li>
                                                <li>
							<a href="thuvien.php"><span>Thư Viện</span></a>
						</li>
                                                <li>
                                                    <a href="lienhe.php"><span>Liên Hệ</span></a>
						</li>
                        <li>
                        <a href="javascript: void(0);" onClick=" javascript:OpenPopup('support.php','WindowName','425','475','scrollbars=1');">
                        <img width="25" height="25" style="width: 25px;
                            height: 25px" src="images/yahoo-icon.png">Hỗ trợ
                    	</a>
                        </li>
					</ul>					
				</div>
			</div>
		</div>
        <!-- body -->
        <div class="body">
		<div class="slideshow">
		<!--slide-->
          
        <div id="slideshow">
<ul id="demo1">
<?php


$query4='select tieude,hinhanh,mota,matt from tintuc where trangthai=1 order by ngaydang desc limit 5';
$result4=  mysqli_query($link, $query4);
while($r4=  mysqli_fetch_array($result4))
{
echo "<li>" 
. "<a href='tintuc-hienthi.php?id={$r4[3]}#newsarea'><img src='images/tintuc/$r4[1]' style='width:864px; height:427px;'/></a>" 
. "<!--Slider Description example-->" 
. " <div class='slide-desc' style='width:600px;'>" 
.		"<a href=\"tintuc-hienthi.php?id={$r4[3]}#newsarea\">"  . $r4[0] . "</a>" 
.		"<p>" . $r4[2] . "<a class='more' href='tintuc-hienthi.php?id={$r4[3]}#newsarea'>Chi tiết</a></p>" 
. "</div>" 
. "</li> "; 
}
?> 
	
</ul>
</div>
        <!--end-->
                    </div>
                    <div class="float-ck" style="right: 0px" >
                <div id="hide_float_right">
                <a href="javascript:hide_float_right()">Tắt Quảng Cáo [X]</a></div>
                <div id="float_content_right">
                <!-- Start quang cao-->
                <?php
                    $link= mysqli_connect('localhost', 'root', '');
        mysqli_select_db($link, 'ql_khach_san');
        $queryqc="select * from quangcao group by maqc desc limit 1" ;
        $resultqc=  mysqli_query($link, $queryqc);
        $rqc=  mysqli_fetch_array($resultqc);
        echo "<a href='h$rqc[2]'><img src='images/quangcao/$rqc[3]' width='180' height='300' quality='high' href='#' pluginspage='http://www.macromedia.com/go/getflashplayer' type='application/x-shockwave-flash' menu='false' wmode='transparent' allowScriptAccess='always'/>
                 </a>";
?>
                     <!-- End quang cao -->
                </div>
            </div>
                    <div class="dichvu2" id="dautrang">
                    
                    <div class="home" id="phantrang">
					<div style="background:url('images/border.png') repeat-x scroll left bottom transparent; width:860px; margin-top:10px; margin-left:50px;">
        </div>
            </div>
                    <?php
                    if (isset($_REQUEST['id']))
                    {
                    
                    ?>
			
		<!-- Phan dich vu thay doi-->                
			
				<ul>
                                    <?php 
                                        if (mysqli_num_rows($result)>0)
                                        {
                                            while ($r=  mysqli_fetch_array($result))
                                            {
                                                if ($r[0]==$id)
                                                {
                                                    echo "<li  class=\"selected\">";
                                                    echo "<a style=\"color:black\" href=\"dichvu2.php?id={$r[0]}#content\">{$r[1]}</a>";
                                                    $info=$r;
                                                }
                                                else{
                                                    echo "<li><a href=\"dichvu2.php?id={$r[0]}#content\">{$r[1]}</a></li>";
                                                     }
                                            }
                                        }
                                        ?>
                                        <li style="background:none" ></li>
                                        <a href="dichvu.php#phantrang" style="width: 200px;text-align: center;" class="phantrang" >quay về trang dịch vụ</a>		
				</ul>
			
				
					<?php if (isset($info) && isset($_REQUEST['id'])) 
					{					
					?>				
				
				<div id="content">
					<div>
                                            <img style="margin-top: 35px;float:left" width="240px" src="images/dichvu/<?php echo $info[2] ?>" alt="">
                                                
					</div>
                                        <div class="dichvu_des">
                                            <?php echo $info[5];?>
                                            <div style="color:#B40404; ">Giá: <?php echo number_format($info[4]); ?> đ</div>
                                        </div>
                                        <div class="noidung_dichvu">
						<?php echo $info[3];?>
						<a href="dichvu.php#phantrang" class="phantrang" >quay về trang dịch vụ</a>		
					</div>
					
					
			</div>
			
			<?php
			}
			
			else {
				
				echo "<div style=\"margin-top:20px;color:red\">Không tồn tại dịch vụ </div>";				
				header ("Location: $URL");
				}
			?>
		
		
		<?php
		}
		else 
		{
			echo "<div style=\"margin-top:20px;color:red;margin-left:100px\">không tồn tại id này</div>";		
			$URL="dichvu.php";
			header ("Location: $URL");
		}
		?>
				
		

		</div>
        <!-- footer -->
        <div class="footer">
			<div>
				<div>
					<ul>
						<li>
							<a href="index.php">Trang Chủ</a>
						</li>
						<li>
							<a href="phongnghi.php">Phòng Nghỉ</a>
						</li>
						<li>
							<a href="dichvu.php">Dịch Vụ</a>
						</li>
						<li>
							<a href="tintuc.php">Tin Tức</a>
						</li>
                        <li>
							<a href="thuvien.php">Thư Viện</a>
						</li>
						<li>
							<a href="lienhe.php">Liên Hệ</a>
						</li>
					</ul>
					<p>
					
					</p>
					<div class="connect">
			<a href="https://www.facebook.com/khachsan" id="fb" target="_blank">facebook</a> 
                        <a href="https://twitter.com/khachsan " id="twitter">twitter</a> 
                        <a href="https://plus.google.com/khachsan" id="googleplus">googleplus</a> 
                        <a href="https://vimeo.com/khachsan" id="vimeo">vimeo</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>