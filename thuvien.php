<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<?php

    $link=  mysqli_connect('localhost','root', '');
    mysqli_select_db($link,'ql_khach_san');
    $q="select count(MaAlbum) from album";
    $rq= mysqli_fetch_array( mysqli_query($link, $q));
    
    $tong=$rq[0];
	 $query_setting="select content from setting where id=11 or id=12 or id=13";
    $count1=0;
    $result_setting=mysqli_query($link,$query_setting);
    while($r_setting=mysqli_fetch_array($result_setting)) 
    	{
    		if ($count1==0) $title1=$r_setting[0];
    		if ($count1==1) $des1=$r_setting[0];
    		if ($count1==2) $sodv=$r_setting[0];
    		$count1+=1;
    		
    	}
    if (!isset($sodv)) $sodv=6;
   
    $sotrang=  ceil($tong/$sodv);
    
    $start=0;$p=1;
    if (isset($_REQUEST['p']) && is_numeric($_REQUEST['p']))
        $p=$_REQUEST['p'];
    else {
    	$p=1;
    }
    $start= ($p-1)*$sodv;
    
   $query="select Album ,  AnhDaiDien, MaAlbum from album " ;
   $query.=" limit $start,$sodv";
   $result=  mysqli_query($link, $query);
?>
<html>
<head>
	<meta charset="UTF-8">
	<title>project khach san</title>
        <link rel="stylesheet" href="css/style-thuvien.css" type="text/css">
        <link rel="stylesheet" type="text/css" href="css/style1.css"/>
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
	<div class="page">
		<div class="header">
                    <a style="	margin-top: -24px;" href="#" id="logo"><img src="images/logo.png" alt="logo" width="148" height="131"></a>
			<div>
				<div>
				
				</div>
				<div>
					<ul>
						<li  >
							<a href="index.php#phantrang"><span>Trang Chủ</span></a>
						</li>
						<li>
                                                    <a href="phongnghi.php#phantrang"><span>Phòng Nghỉ</span></a>
						</li>
						<li>
                                                    <a href="dichvu.php#phantrang"><span>Dịch Vụ</span></a>
						</li>
						<li>
							<a href="tintuc.php#phantrang"><span>Tin Tức</span></a>
						</li>
                                                <li class="selected">
							<a href="thuvien.php#phantrang"><span>Thư Viện</span></a>
						</li>
                                                <li >
                                                    <a href="lienhe.php#phantrang"><span>Liên Hệ</span></a>
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
                    
			<div class="home" id="phantrang">	
            	<div style="background:url('images/border.png') repeat-x scroll left bottom transparent; width:860px; margin-top:30px; margin-left:50px;">	
                </div>					
				<div class="section">
                <div style="background:url('images/border.png') repeat-x scroll left bottom transparent">
					<div class="roomIntro">
                                            <h1 class="title" style="width: 530px;color:#B40404"><?php if (isset($title1)) echo $title1; ?></h1>
                        <div class="desroom" style="padding-bottom:20px; text-indent:20px;">
                        	<?php if (isset($des1)) echo $des1; ?>
                       </div>
                        				
					</div>
                   
                    <div  id="desImage" style="width:240px"><img src="images/beach.jpg" width="250px"  /></div>
                    
                </div>
				<div  style="margin-left:17px; margin-top:10px;">
					<?php
						$count=1;
						$array=array();
						if (mysqli_num_rows($result)>0)
						{
							while ($r=mysqli_fetch_array($result))
							{
								if (in_array($r[0], $array))
                                continue;
								if ($count%3==1)
								{
									echo "<ul>"
										."<li>"
										."<h3>{$r[0]}</h3>"
										."<a href=\"view.php?id={$r[2]}\"><img src=\"images/album/{$r[1]}\"  width='228' height='228'></a>"					
                                        ."</li>";
									$count+=1;
								}
								else if ($count%3==0)
								{
									echo 
											"<li>"
											."<h3>{$r[0]}</h3>"
											."<a href=\"view.php?id={$r[2]}\"><img src=\"images/album/{$r[1]}\" width='228' height='228'></a>"					
											."</li>"
											."</ul>";
									$count+=1;
								}
								else 
								{
									echo "<li>"
										."<h3>{$r[0]}</h3>"
										."<a href=\"view.php?id={$r[2]}\"><img src=\"images/album/{$r[1]}\"  width='228' height='228'></a>"					
                                        ."</li>";
									$count+=1;	
								}
								$array[]=$r[0];
								
							}
						}
					?>
					
					
					
                    
				</div>
				
			</div>
			<div class="phantrang" style="clear:both;margin-bottom:7px">
                        <?php
                            if ($sotrang>1)
                            {
                                if ($p!=1)
                                {
                                    echo "<a href=\"thuvien.php?p=1#phantrang\">Trang Đầu</a>";
                                }
                                if ($p>3)   										
											{
												$init=$p-3;
											}
											else {
												$init=1;
											}
											if ($p+3<$sotrang)
											{
												$end=$p+3;
											}
											else {
												$end=$sotrang;
											}                                
                                
                                for ($i=$init;$i<=$end;$i++)
                                {
                                    if ($i==$p)
                                        echo "<b>$i</b>";
                                    else
                                        echo "<a href=\"thuvien.php?p=$i#phantrang\">$i</a>";
                                }
                                if($p!=$sotrang)
                                {
                                    echo " <a href='thuvien.php?p=$sotrang#phantrang'>Trang cuối</a> ";
                                }
                            }
                        ?>
                        </div>
			
		</div>
		
        <!-- footer -->
        <div class="footer">
			<div>
				<div>
					<ul>
						<li>
							<a href="index.php#phantrang">Trang Chủ</a>
						</li>
						<li>
							<a href="phongnghi.php#phantrang">Phòng Nghỉ</a>
						</li>
						<li>
							<a href="dichvu.php#phantrang">Dịch Vụ</a>
						</li>
						<li>
							<a href="tintuc.php#phantrang">Tin Tức</a>
						</li>
                        <li>
							<a href="thuvien.php#phantrang">Thư Viện</a>
						</li>
						<li>
							<a href="thuvien.php#phantrang">Liên Hệ</a>
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