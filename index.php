 <?php include_once("header.php"); ?>
	
<div>	
	<section id="flaBanner">
                    <div>
                        <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http:///StaticFiles/swflash.cab#version=7,0,19,0"  width="1000" height="311">
                            <param name="movie" value="StaticFiles/banner.swf"/>
                            <param name="quality" value="high"/>
                            <param name="wmode" value="transparent"/>
                            <embed src="StaticFiles/banner.swf" wmode="transparent" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="1000" height="311"></embed>
                        </object>
                    </div>
    </section>
    <section class="doYouKnow fltClear">

                    <input type="hidden" id="length_latest_eoffice" value="0" />
    </section>
	<br/>
	
    <section style="font-size: 16px; background-color:#C0C0C0; marquee:left; margin: 1 auto; width: 40%; border-radius:10px;">
	<label style="color:990000;">&nbsp;&nbsp; Latest News : </label>	
	<marquee>
	
                     <ul>
                       <?php
						$query="select * from tbl_news where status =1";
						$r=mysqli_query($con,$query);
						while($result=mysqli_fetch_array($r))
						{?>
                             <li class="news-item"><?php echo $result['news_title'];?> <strong>:-</strong> <?php echo $result['news_content'];?> </li>
                  <?php } ?>
                     </ul>
					 </marquee>
					
    </section>
	
    <section id="boxes">
                     
                   
                     <br/>

                   
                    
	<br><br><br><br><br>
      
</div>	
	
<?php include_once("footer.php"); ?>

<script type="text/javascript">
    $('#widget').newsScroll({
        speed: 2000,
        delay: 5000
    });
</script>