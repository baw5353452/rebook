<?php
include_once('conn.php');
$query="select bottom_image,bottom_link from bottom order by bottom_order asc limit 1";
$res=mysql_query($query);
$row=mysql_fetch_array($res);
?>
<footer>
	<div class="container">
    	<a href="<?php echo $row['bottom_link'];?>" target="_blank"><img src="<?php echo "Admin/files/".$row['bottom_image'];?>" alt=""></a>
        <div class="footer_nav">
        	<a rel="nofollow" target="_blank" href="http://static.dangdang.com/topic/2227/176801.shtml">公司简介</a>
            <span class="sep">|</span>
            <a rel="nofollow" target="_blank" href="http://static.dangdang.com/topic/contents/1119/2263.shtml">诚征英才</a>
            <span class="sep">|</span>
            <a target="_blank" href="http://emkt.dangdang.com">广告服务</a>
            <span class="sep">|</span>
            <a target="_blank" href="http://blog.dangdang.com/">官方Blog</a>
         </div> 
		 <div class="footer_copyright02"><span>Copyright (C) Rebook 2004-2013, All Rights Reserved</span></div>         
               
    </div>
</footer>
<script src="asset/lib/bootstrap/js/bootstrap.js"></script>
<script src="asset/holder.min.js"></script>
<script src="asset/script.js"></script>
</body>
</html>