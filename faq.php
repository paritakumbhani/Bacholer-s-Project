<?php include("header.php"); ?>

<div style="background-color:#CCC">	
		<section id="pageHeading">
			<div>
				<h1>FAQ</h1>
			</div>
		</section>
		<section id="content">
			<div class="fltLeft">
			    <div>
                                    <p><a name="overview" href="#"><b>FAQ</b></a></p>
                                    <ul class="innerList">
                                         <?php
						$query="select * from tbl_faq where status='1'";
						$r=mysqli_query($con,$query);
						while($res=mysqli_fetch_array($r))
						{?>
                                                <li><b><?php echo $res['faq_que'];?></b>
                                                    <ul>
                                                        <li style="text-align:justify">
                                                              <?php echo $res['faq_ans'];?>

                                                         </li>
                                                    </ul>

                                               </li>
                                          <?php } ?>
                                   
                                    </ul>
                            </div>
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
    
<?php include("footer.php"); ?>