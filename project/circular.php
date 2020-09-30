<?php include("header.php"); ?>

     
 <div style="background-color:#CCC">	             
		<section id="pageHeading">
			<div>
				<h1>Circular</h1>
			</div>
		</section>
		<section id="content">
			<div class="fltLeft">
			    <div>
                                    <p><a name="overview" href="#"><b>Circular</b></a></p>
                                    <ul class="innerList">
                                        <?php
						$query="select * from circuler";
						$r=mysqli_query($con,$query);
						while($res=mysqli_fetch_array($r))
						{?>
                                            <li><b><?php echo $res['title'];?></b>
                                                <ul>
                                                    <li style="text-align:justify">
                                                    <?php echo $res['description'];?>
                                                            
                                                             <br /><br />
                                                             <b>Syndicate</b> :  <?php echo $res['cyndicate'];?> 
                                                              <br /><br />
                                                             <b>Department</b> :  <?php echo $res['department'];?>
                                                             <br /><br />
                                                             <?php if($res['file']!="") { ?>
															 <img src="img/Junior Icon 25.ico" style="height:50px;width:40px;">&nbsp;&nbsp;
                                                             File : <a href="../eoffice/admin/uploads/<?php echo $res['file'] ?>" target="_blanck" style="color: blue">Download</a><br /><br />
                                                             <?php }?>
                                                              <?php if($res['audio']!="") { ?>
															  <img src="img/Trayse101-Basic-Filetypes-2-Mp3.ico" style="height:50px;width:40px;">&nbsp;&nbsp;
                                                             Audio : <a href="../eoffice/admin/uploads/<?php echo $res['audio'] ?>" target="_blanck" style="color: blue">Download</a><br /><br />
                                                             <?php }?>
                                                             <?php if($res['video']!="") { ?>
															 <img src="img/Hadezign-Hobbies-Movies.ico" style="height:50px;width:40px;">&nbsp;&nbsp;
                                                             Video : <a href="../eoffice/admin/uploads/<?php echo $res['video'] ?>" target="_blanck" style="color: blue">Download</a><br /><br />
                                                             <?php }?>
                                                             <?php if($res['image']!="") { ?>
															 <img src="img/Flash Live Icon 60.ico" style="height:50px;width:40px;">&nbsp;&nbsp;
                                                             Image : <a href="../eoffice/admin/uploads/<?php echo $res['image'] ?>" target="_blanck" style="color: blue">Download</a><br /><br /><br /><br />
                                                             <?php }?>
                                                             
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
   
<?php 
include("footer.php");
?>