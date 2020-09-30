<?php include_once("header.php"); ?>
	
<div style="background-color:#CCC">		
		<section id="pageHeading">
			
		</section>
		<section id="content">
			<div class="fltLeft">
				<div class="content-topLinks">
					<ul>
						<li class="selected" style="font-size:30px;"><a href="#overview">About us</a></li>
						
					</ul>
				</div>
                            <?php
						$query="select * from tbl_cms  where cms_title='about us' and cms_status='1'";
						$r=mysqli_query($con,$query);
						while($res=mysqli_fetch_array($r))
						{?>
                                         <?php echo $res['cms_description'];?>
                        <?php } ?>
				
				
				<div class="goToTop">
					<div class="fltRight"><a href="#">Go to Top</a></div>
					<div class="fltRight"><img src="StaticFiles/images/ico_top.png" width="16" height="16" border="0" alt="" /></div>
				</div>
				<br/>
			</div>
			<div class="fltRight">
       
				    <div class="services" style="background:url(StaticFiles/images/bg_services_inner.png) no-repeat;">
                        <h2><a href="#">SERVICES</a></h2>
                        <ul>
                            <li> <a href="#">Cloud Services</a> </li>
                            <li> <a href="#">Software as a Service (SaaS)</a> </li>
                            <li> <a href="#">Mobile Services</a> </li>
                        </ul>
                       <br /><br/>
                      
                    </div>
                    <div class="implementation" style="background:url(StaticFiles/images/bg_implementation_inner.png) no-repeat;">
                        <h2><a href="implementation_more.html">IMPLEMENTATION</a></h2>
                        <ul>
                            <li> <a href="#">Register for Implementation</a> </li>
                            <li> <a href="#">Principle Guidelines</a> </li>
                            <li> <a href="#">Pre-requisites</a> </li>
                            <li> <a href="#">Approach  Methodology</a> </li>
                            <li> <a href="#" target="_blank">Check Status</a> </li>
                        </ul>
                      
                    </div>
				
			</div>
		</section>
</div>		
		<?php include_once("footer.php"); ?>