//**********************Check News letter as Email validation********************

function checkemail()
{
 
 var news_email=document.getElementById("news_email").value;
//alert(news_email); 
 var filter=/^.+@.+\..{2,3}$/;

 if (filter.test(news_email))
    {
    //alert('hello');
    window.open('fts_news_subscription?news_email='+news_email, 'width=200,height=100')
 
	document.getElementById("news_email").value="";
    return true;
     }
 else
  {
    alert("Please, enter the correct email address!")
    return false;
  }
}


//**********************Check site validation for new site********************


function checksite()
{

 if(confirm("You're moving out of this site! Click OK if you want to go to or click on Cancel"))
    {
   

    return true;
     }
 else
  {
    return false;
  }
}

//**********************Check Insert validation********************

function checkInsert()
{
 //alert('hello'); 

 if ((document.getElementById("latest_text").value=="")||(document.getElementById("last_d").value=="")||(document.getElementById("status").value==""))
    {
    alert('Please Insert the Mandatory fields');
     return false;
   
     }
 else
  {
    return true;
  }
}


//**********************Check Delete validation********************

function checkDelete()
{
 //alert('hello'); 

 if ((document.getElementById("from_date").value=="")&&(document.getElementById("to_date").value==""))
    {
    alert('Please Insert the Mandatory fields');
	
     return false;
   
     }
 else if ((document.getElementById("from_date").value!="")&&(document.getElementById("to_date").value==""))
    {
  
	 alert('Please Insert To Date');
     return false;
   
     }
  else if ((document.getElementById("from_date").value=="")&&(document.getElementById("to_date").value!=""))
    {
	 alert('Please Insert From Date');
     return false;
   
     }
 else if ((document.getElementById("from_date").value)>(document.getElementById("to_date").value))
    {
    alert('Please Insert first date lower than the second date');
     return false;
   
     }
 else
  {
    latest_eoffice_result();
    return true;
  }
}


//**********************Delete Result Of Latest Eoffice********************
 function DeleteRecord()
             {
              //alert('hello');
              var cbx_value = new Array();
              var h_length = document.getElementById("h_len").value;
                   var j = 0 ;
              		//alert(h_length );
             		 for (i=1;i<=h_length;i++)
              			 {
               				 id_name = 'cbx_'+i;
               				 // alert(id_name);
               				 if(document.getElementById(id_name).checked == true)
                				  {
                                    cbx_value[j] = document.getElementById(id_name).value;
                  					 j=j+1;
                  					//alert(document.getElementById(id_name).value);
                    			  }
                  
                 			 else
                 				 {
                					  //alert('not checked');
                				  }
                
             			  }
						  if( cbx_value=="")
			               {
			               alert('Please select data to delete');
				          return false;
				           }
						    else
			               {
              		      window.open('admin_page_delete_script1?cbx_value='+cbx_value, 'width=200,height=100')
              		      window.location='latest_in_eoffice.html';
			              }
             }



//**********************Update Search Result Of Latest Eoffice********************


function latest_eoffice_search_result(purl)
 {
  if((document.getElementById("from_date1").value=="")&&(document.getElementById("to_date1").value==""))
    {
     alert('Please Insert the Mandatory fields');
     return false;
    }
  else if((document.getElementById("from_date1").value!="")&&(document.getElementById("to_date1").value==""))
    {
     alert('Please Insert To Date');
     return false;
    }
  else if((document.getElementById("from_date1").value=="")&&(document.getElementById("to_date1").value!=""))
    {
     alert('Please Insert From Date');
     return false;
    }
   else if((document.getElementById("from_date1").value)>(document.getElementById("to_date1").value))
      {
       alert('Please Insert first date lower than the second date');
       return false;
      }
   else
      {
       var from_date=document.getElementById("from_date1").value;
       var to_date=document.getElementById("to_date1").value;
       var p_url=purl;
       var filepath=p_url+'/latest_update_search_result?from_date='+from_date+'&to_date='+to_date;
       var xmlhttp;
       if(window.XMLHttpRequest)
         {
          // code for IE7+, Firefox, Chrome, Opera, Safari
      	  xmlhttp=new XMLHttpRequest();
         }
       else if(window.ActiveXObject)
  	    {
  	     // code for IE6, IE5
  	     xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
      	    }
        else
 	    {
  	     alert("Your browser does not support XMLHTTP!");
    	    }
	xmlhttp.onreadystatechange=function()
	                                   {
                                            //alert(filepath);
		                            if(xmlhttp.readyState==4 && xmlhttp.status==200)
 			                      {
                                              // alert(filepath);
		                               document.getElementById('latest_data').innerHTML=xmlhttp.responseText;
		   			       document.getElementById('submit_update').style.display="";
                                              }
                                            else
                                              {
                                               message='Not Found:The Page or File requested is not available at the moment, kindly try after some time'
                                               document.getElementById('latest_data').innerHTML=message;
			                      }
                                            }
          }
     xmlhttp.open("GET.html",filepath,true);
     xmlhttp.send();
   
}


                function show_for_update()
                {
				 
				  document.getElementById("update_table").style.display="";
                  // var rdb_value = new Array();
                   var h_length1 = document.getElementById("h_len1").value;
                   //var j = 1 ;
                    //alert(h_length1);
            for (i=1;i<=h_length1;i++)
         {
                               rb_name = 'rb_'+i;
				lt_name= 'lt_'+i;
				ld_name= 'ld_'+i;
				sts_name= 'sts_'+i;
				 if(document.getElementById(rb_name).checked == true)
                  {         
                                   rb_value=document.getElementById(rb_name).value;
                                  lt_value=document.getElementById(lt_name).value;
				    //alert(rb_value);
				   ld_value=document.getElementById(ld_name).value;
				   sts_value=document.getElementById(sts_name).value;
				  
                                  document.getElementById("serial_n").value=rb_value ;
                                  document.getElementById("latest_update_text").value=lt_value ;
				  document.getElementById("last_update_d").value=ld_value;
				  document.getElementById("status_update").value= sts_value;
                   }
        }
}

             function Update()
                  {
                          
   
         var latest_update_t = document.getElementById("latest_update_text").value;
	 var latest_update_d = document.getElementById("last_update_d").value;
	 var latest_update_s= document.getElementById("status_update").value;
         var s_number = document.getElementById("serial_n").value;
             		
		if((latest_update_t=="")||(last_update_d=="")||(latest_update_s==""))
                    {
		  alert('Please Insert the Mandatory fields');
                   return false;
		     }
		else{
                   // alert(latest_update_s);
		     return true;
			  //window.open('admin_page_update_script?sno='+s_number+'&latest_text='+latest_update_t+'&last_d='+latest_update_d+'&status='+latest_update_s, 'width=200,height=100')
			 // alert(latest_update_d);
		
		   }
               
  }


//**************************************Load Image Java Script*********************************

function loadnewimage(photo_gallery_script, file)
{
var fpath1='photo_gallery_script?file='+file+'&timestamp=' + new Date().getTime();
alert(fpath1);
var xmlhttp;
document.getElementById('new_image').style.display="block";
document.getElementById('new_image').innerHTML="<div align=center><img src='StaticFiles/images/loading.html'></div>";
if (window.XMLHttpRequest)
  {
  // code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else if (window.ActiveXObject)
  {
  // code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
else
  {
  alert("Your browser does not support XMLHTTP!");
  }
xmlhttp.onreadystatechange=function()
{
if(xmlhttp.readyState==4)
  {
if (xmlhttp.status==200)
    {
     document.getElementById('new_image').innerHTML=xmlhttp.responseText;

    }
else
   {
    message='KMS-Error/Not Found:The Page or File requested is not available at the moment, kindly try after some time'
    document.getElementById('new_image').innerHTML=message;
   }

  }
}
xmlhttp.open("GET.html",fpath1,true);
xmlhttp.send();

}
function create_album()
{ 
  document.getElementById("a_name").value=""
  document.getElementById("a_desc").value=""
  document.getElementById('m_file').value=""
  popup('popUpDiv');   
} 




  



//************Code for multiple file selection********************


function loadnewimage_more(photo_gallery_script,file,div_id)
{
var fpath1='photo_gallery_script?file='+file+'&timestamp=' + new Date().getTime();
//alert(div_id);
var xmlhttp;
document.getElementById(div_id).style.display="block";
//document.getElementById(div_id).innerHTML="<div align=center><img src='StaticFiles/images/loading.gif'></div>";
if (window.XMLHttpRequest)
  {
  // code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else if (window.ActiveXObject)
  {
  // code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
else
  {
  alert("Your browser does not support XMLHTTP!");
  }
xmlhttp.onreadystatechange=function()
{
if(xmlhttp.readyState==4)
  {
if (xmlhttp.status==200)
    {
     document.getElementById(div_id).innerHTML=xmlhttp.responseText;

    }
else
   {
    message='KMS-Error/Not Found:The Page or File requested is not available at the moment, kindly try after some time'
    document.getElementById(div_id).innerHTML=message;
   }

  }
}
xmlhttp.open("GET.html",fpath1,true);
xmlhttp.send();

}


//******************Check Album***********************

function checkAlbum()
         {
      
             if(document.getElementById("a_name").value=="")
              {
               alert('Please fill album name');
               return false;  
              }
              else if(document.getElementById("a_desc").value=="")
              {
               alert('Please fill album description');
               return false;  
              }
              else if(document.getElementById('m_file').value=="")
              {
                alert('Please select photos');
                return false; 
              }
            else
             {
          
              var fileInput = document.getElementById("m_file");
              var message = "";
              if ('files' in fileInput)
              {
                   for (var i = 0; i < fileInput.files.length; i++)
                   {
                        var file = fileInput.files[i];                                            
                        //alert(file.size);
                        
                    }
                  }
            
             
             
            
             document.getElementById('p_path').value=(document.getElementById('m_file').value);
             return true;
             }
        }
//***********************Only Show Photo******************

function show_photo(id)
{ 
 album_id = id;
 //alert(album_id);
 //popup('popUpDiv_photo');
 window.open('photo_gallery_edit?album_id1='+album_id, '_self',false);
 //album_photo();
}


//*************Ajax For Photo********************


function album_photo()
{
 album_id = document.getElementById('photo_album_id').value;

var fpath1='photo_gallery_getresult?album_id1='+album_id+'&timestamp=' + new Date().getTime();
  
var xmlhttp;
if (window.XMLHttpRequest)
  {
  // code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
   
  }
else if (window.ActiveXObject)
  {
  // code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
else
  {
  alert("Your browser does not support XMLHTTP!");
  }
xmlhttp.onreadystatechange=function()
{
if(xmlhttp.readyState==4)
  {
if (xmlhttp.status==200)
    { 
     document.getElementById('album_photo_div').innerHTML=xmlhttp.responseText;
    //alert(fpath1);
    }
else
   {
    message='KMS-Error/Not Found:The Page or File requested is not available at the moment, kindly try after some time'
    document.getElementById('album_photo_div').innerHTML=message;
   }

  }
}
xmlhttp.open("GET.html",fpath1,true);
xmlhttp.send();
 
}

function add_to_album()
{
popup('popUpDiv');
}

function set_pref(p_id)
{
 document.getElementById('hdn_pref').value=p_id;
}

//**************** Delete Photo*********************
function delete_photo(album_id1,photo_id1,f)
       { 
         var agree = confirm("Are you sure! Click Ok if you want to delete or click on cancel");
          if(agree)
          {
         cvr_id=document.getElementById('hdn_pref_new').value;
         if(cvr_id == photo_id1)
         {
          alert('Please update new cover photo before deleting.');
          return false;
         }
         else
         {
         album_id=album_id1;
         photo_id=photo_id1;
         del_flag=f;         
         window.open('photo_gallery_delete?album_id='+album_id+'&photo_id='+photo_id+'&del_flag='+del_flag)
         } 
        }
        else{
              return false;
             }
        }

function delete_album(album_id1,photo_id1,f)
       { 
          var agree = confirm("Are you sure! Click Ok if you want to delete or click on cancel");
          if(agree)
          {
           album_id=album_id1;
           photo_id=photo_id1;
           del_flag=f;         
           window.open('photo_gallery_delete?album_id='+album_id+'&photo_id='+photo_id+'&del_flag='+del_flag);
           }
          else
          {
            return false;
           }
        }


//******************************Client_get_info*****************88888

function create_div(id)
{ 
  
 
 //alert(id);
   client_info(id);
  popup('popUpDiv_exp'); return false; 
   
} 



function client_info(client_id)
{
 //album_id = document.getElementById('photo_album_id').value;

var fpath1='client_get_result?client_id1='+client_id+'&timestamp=' + new Date().getTime();
  
var xmlhttp;
if (window.XMLHttpRequest)
  {
  // code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
   
  }
else if (window.ActiveXObject)
  {
  // code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
else
  {
  alert("Your browser does not support XMLHTTP!");
  }
xmlhttp.onreadystatechange=function()
{
if(xmlhttp.readyState==4)
  {
if (xmlhttp.status==200)
    { 
     document.getElementById('client_info_div').innerHTML=xmlhttp.responseText;
    //alert(fpath1);
    }
else
   {
    message='KMS-Error/Not Found:The Page or File requested is not available at the moment, kindly try after some time'
    document.getElementById('client_info_div').innerHTML=message;
   }

  }
}
xmlhttp.open("GET.html",fpath1,true);
xmlhttp.send();
 
}

//*****************Check Preferences*********************
  function check_preferences(pref,albumid,c_value)
  {
    if(pref!='0')
    {
   p_pref=pref;
   var c=0;
   var id1='';
   album_ids=document.getElementById('album_id_hidden').value;
   rep=album_ids.replace(albumid+':','');     
   var album_id_value = rep.split(":");
     for(var i = 0; i< album_id_value.length; i++)
      {
       if(p_pref==(document.getElementById('album_pref'+album_id_value[i]).value))
         {
          c=c+1;                        
          if(c>0)
            {
             var r=confirm("you've already selected this preference! Click OK if you want to change or click on Cancel");
             if(r==true)
               {
                //alert('123');
                id='album_pref'+album_id_value[i];
                //alert(id);
                document.getElementById(id).innerHTML="<select id='$id' name='$id'><option selected='selected' value='0'>Select</option><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option></select>";
               break;
               }
              else
                {  
                   id='album_pref'+albumid;
                  //document.getElementById(id).innerHTML="<select id='$id' name='$id'><option value=albumid selected='selected'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option></select>";
                 var desiredValue = c_value
                 var el = document.getElementById(id);
                 for(var i=0; i<el.options.length; i++) {
                   if ( el.options[i].text == desiredValue ) {
                        el.selectedIndex = i;
                           break;
                                                             }
                                                          }
                 
                    return false;
                }
             }
          }
       } 

}
 
   }//
   
   
   ////*****************Check Preferences of Photo*********************
   
   function check_preferences_photo()
  {
   alert('hello');
 
   }//
   
   
     