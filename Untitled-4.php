<?php 
/*             Array Contains RB Flavours Amount                           */
$sql = "SELECT * FROM services_profile a, profile b WHERE a.profile_id = b.id AND b.state = 'active'";		
				
			$row = $wpdb->get_results($sql);
			
			$usd_rec = $wpdb->get_results("SELECT *FROM exchange_rate WHERE id='1'");
			$inr = $usd_rec[0]->inr;
			
			if(count($row)==0)
			{
				$sql = "SELECT * FROM services";		
				
				$row = $wpdb->get_results($sql);	
			}
			
			$rb_flavour = array("rb_c"=>"0", 
                    "rb_12"=>"0", 
					"rb_8_12"=>"0",
					"rb_5_8"=>"0",
					"rb_3_5"=>"0",
					"rb_1_3"=>"0",
					"rb_0_1"=>"0",
					);

						
				
			$ic = 0;
			$n = 0;
			//print_r($row);
			foreach($row as $key => $res)
			{
				$n = 0;
				foreach($res as $key1=>$res1)
				{
					if($n>=2&&$n<=13)
					{
						//echo $res->$key1." , ";											
						$row[$ic]->$key1 = round(($row[$ic]->$key1)/$inr);
						//echo $key1." , ";
					}
					$n++;									
				}
				$ic++;	
				//echo "<br>";
			}
			//print_r($row);
			$keys = array_keys($rb_flavour);						
			
			$i = 0;
			foreach($row as $key => $res)
			{
				//echo $res->rb_old." , "; 				
				
				$rb_flavour[$keys[$i]] = $res->rb_old;
				
				//$rb_flavour[$i]->$i = $res->rb_old;
				$i++;
				//echo $rb_flavour[$i]." , ";
         	}			
			$query = "SELECT *FROM flavour_content";						
			$content = $wpdb->get_results($query);
			//print_r($content);
			//echo $content[0]->resume_writing;
?> 
<div class="hori_nav">
<ul class="nav nav-tabs font_clean_hori" id="ul_tabs">
   <li class="active li-font-active" id="tab_li1"><a id="tab_li_a1" href="#tab1" data-toggle="tab" style="border-top-left-radius:5px;border-top-right-radius:5px; border-top:5px solid #FEC329; color:#5296da; font-weight:500; box-shadow:-1px -5px 8px -2px rgba(0, 0, 0, 0.6);" >Resume Writing</a></li>
    <li class="li-font" id="tab_li2" style="border-top-left-radius:5px;border-top-right-radius:5px;border:1px solid #CCC; border-bottom: none; background:#fff; "><a id="tab_li_a2" data-toggle="tab" href="#tab2" style="font-weight:500; color:#34495E">Individual Services</a></li>    
</ul>
</div>
<div class="tab-content">
    <div id="tab1" class="tab-pane active">
    <div class="row" style="color:#54536F">
    <div class="col-md-11 col-md-offset-1" style="margin-bottom:10px;">
    
    <div class="row adjust_width" style="background:#fff; margin-left:0px;">
       <div class="col-md-3 col-xs-12 panel-body steps">
       <img src="http://resumebuilder.isourcecorp.com/wp-content/themes/vantage/images/choose1.png" height="40" style="padding-left:70px" />
       <p id="step1" style="font-weight:300">Step 1 : Choose Services</p>
       </div>
            <div class="col-md-3 col-xs-12 panel-body steps">
     <img src="http://resumebuilder.isourcecorp.com/wp-content/themes/vantage/images/register1.png" height="40" style="padding-left:70px" />
     <p id="step2" style="font-weight:300; padding-left:30px;">Step 2 : Register</p>
           </div>
           <div class="col-md-3 col-xs-12 panel-body steps">
         <img src="http://resumebuilder.isourcecorp.com/wp-content/themes/vantage/images/pay1.png" height="40" style="padding-left:70px"/>
         <p id="step3" style="font-weight:300">Step 3 : Confirm By Payment</p>
           </div>
<div class="col-md-3 col-xs-12 panel-body" align="center">
        <button class="toggle" id="inr[]" name="inr[]" style="color:#646464; background:#CCC; font-size:18px; text-shadow:none; border:none;border-radius:0px "><span class="WebRupee">Rs.</span></button><button id="usd[]" name="usd[]" class="toggle" style="font-size:18px; color:#FFF; text-shadow:none; border:none;
        border-radius:0px;">$</button>
          <p id="step3" style="font-weight:300">Choose $ for international orders</p>
          
           </div> 	
       </div>
    
    <div id="parentVerticalTab">
	<ul class="resp-tabs-list hor_1">

<li class="li-font" id="rb1"  role="tab">C - Level</li>
<li class="li-font" id="rb2"  role="tab">12+ Years</li>
<li class="li-font" id="rb3"  role="tab">8 - 12 Years</li>
<li class="li-font" id="rb4"  role="tab">5 - 8 Years</li>
<li class="li-font" id="rb5"  role="tab">3 - 5 Years</li>
<li class="li-font" id="rb6"  role="tab">1 - 3 Years</li>
<li class="li-font" id="rb7"  role="tab">0 - 1 Years</li>
	</ul>
            <div class="resp-tabs-container hor_1" style="padding:10px 10px 20px 10px;">
                
            <div class="col-md-12" id="tabs" style="padding-left: 0px;">                
                <div class="col-md-7" style="padding-left: 0px;">                	 
		<div class="panel-heading">
         <p class="h4" style="font-weight: 800; color: #0a7faa; font-size: 24px;">C - Level Resume Writing</p>
     		<hr />
        </div>
       
       <div>
       	<?php echo $content[0]->resume_writing;?>
       </div>
                </div>
                <div class="col-md-5 col-sm-12" align="center" style="padding:0px; margin:0px;">
                <!-- first part of pricing modal-->
                <div class="col-md-11 col-sm-5 payment_panel" style="width:100%;">                
                 <p class = "weight6" align="center">C - Level Text Resume</p>
                <div style="height:70px;">                	
                     <span class="currency">$</span>
                    <span class="amount" id="c_level_amt"><?php echo $row[0]->rb_old;?></span>                    
                </div>
                <div class="amount_new">$<span  id="c_level_amt_original"><?php echo $row[0]->rb_new;?></span></div>
                
                 <div class="discount">You Save : $
                     <span id="c_level_amt_dis"><?php echo ($row[0]->rb_new - $row[0]->rb_old);?></span>
                     </div>
                      <div id="c_level_amt_tax">
                      <span class="discount" style="font-weight:700;color: #FFF; font-size:14px">[ Service Tax @ 14% ; Total  $<span id="tot_amount"><?php echo ($row[0]->rb_old+($row[0]->rb_old*0.14));?></span> ]</span>
                      </div>          
                </div>
                
                <!------------------------------------->
                <!-- second part of pricing modal   -->
                <div class="col-md-11 col-sm-7 payment_panel_second" style="width:100%;">
                <div class="pricing-list">
               
<ul style="padding: 0px; display: table; margin: 0px auto;">
<span style="color:#F08308;text-shadow: 0px 1px 1px #ccc; font-weight:600; font-size:14px;">Choose services</span>
<li class="style-li pay_now_btn"><div class="checkbox-style">
  <label class="style_label"><input style="padding-right:5px;" type="checkbox" name="text_resume[]" id="txtr0"> 
  Text Resume ( $<span class="old_amt"> <?php echo $row[0]->rb_new;?> </span>) $ <span class="new_amt"> <?php echo $row[0]->rb_old;?></span></label>
</div></li>
<li class="style-li pay_now_btn">
                   <div class="checkbox-style">
  <label class="style_label"><input type="checkbox" id="vr" >
  Visual Resume $<span class="new_amt"> <?php echo $row[0]->visual;?></span></label>
</div></li>
                   
<li class="style-li pay_now_btn"><div class="checkbox-style">
  <label class="style_label"><input style="padding-right:5px;" id="cl" type="checkbox"> 
  Cover Letter ( $<span class="old_amt"> <?php echo $row[0]->cl_new;?> </span>)  $ <span class="new_amt"> <?php echo $row[0]->cl_old;?></span></label>
</div></li>
<li class="style-li pay_now_btn"><div class="checkbox-style">
  <label class="style_label"><input style="padding-right:5px;" type="checkbox"  id="li"> 
  LinkedIn Update ( $<span class="old_amt"> <?php echo $row[0]->li_new;?> </span>) $ <span class="new_amt"> <?php echo $row[0]->li_old;?></span></label>
</div></li>
<li class="style-li pay_now_btn"><div class="checkbox-style">
  <label class="style_label"><input style="padding-right:5px;" type="checkbox"  id="rb"> 

Resume Broadcast ( <span id="">$<span id="" class="old_amt"> <?php echo $row[0]->rbr_new;?> </span>)$ <span class="new_amt"> <?php echo $row[0]->rbr_old;?></span> </span></label>
</div></li>
<li class="style-li pay_now_btn"><div class="checkbox-style">
  <label class="style_label"><input style="padding-right:5px;" type="checkbox"  id="sl"> 
  Secure Link ( $ <span class="old_amt"> <?php echo $row[0]->sec_link_new;?> </span>) $ <span class="new_amt"> <?php echo $row[0]->sec_link_old;?></span></label>
</div></li>


<li class="style-li pay_now_btn">
                   <div class="checkbox-style">
  <label class="style_label"><input type="checkbox" id="ed"  >
    Express Delivery $<span class="new_amt"> <?php echo $row[0]->express_delivery;?><span style="color:#F00"> * </span></span></label>
</div></li>
                </ul>    
                                  
                </div>
                <div class="form-field align-btn" style="width:100%; height:22%;">
                <button type="button" class="btn btn-default" style="width:100%; background:#F08308  none repeat scroll 0% 0%; color:#ffffff; height:80%; border:1px solid #FFF; font-size:2em" onClick="get_form()" id="c_level_btn"><span class="pay_now" >Order Now</span></button>
                </div>
                </div>
                <!------------------------------------>
                </div> 
                </div>                
            <div class="col-md-12">                
                <div class="col-md-7" style="padding-left: 0px;">
                	 
		<div class="panel-heading">
         <p class="h4" style="font-weight: 800; color: #0a7faa; font-size: 24px;">12 + Years Resume Writing</p>
     		<hr />
        </div>
        
       <div>
       	<?php echo $content[1]->resume_writing;?>
       </div>
                </div>
                <div class="col-md-5 col-sm-12" align="center" style="padding:0px; margin:0px;">
                <!-- first part of pricing modal-->
                 <div class="col-md-11 col-sm-5 payment_panel" style="width:100%;">
                
                <p class = "weight6" align="center">12 + Years Text Resume</p>
                <div style="height:70px;">
                    <span class="currency">$</span>
                    <span class="amount" id="12_amount"><?php echo $row[1]->rb_old;?></span>
                </div>
                <div class="amount_new">$<span id="12_amount_original"><?php echo $row[1]->rb_new;?></span></div>                
                 <div class="discount">You Save : $
                 <span id="12_amount_dis"><?php echo ($row[1]->rb_new - $row[1]->rb_old);?></span></div>
                 <div id="12_amount_tax">
                 <span class="discount" style="font-weight:700;color: #FFF; font-size:14px">[ Service Tax @ 14% ; Total  $<span id="tot_amount"><?php echo ($row[1]->rb_old+($row[1]->rb_old*0.14));?></span> ]</span>
                 </div> 
                </div>
                
                <!------------------------------------->
                <!-- second part of pricing modal   -->
                <div class="col-md-11 col-sm-7 payment_panel_second" style="width:100%;">
                <div class="pricing-list">
               
<ul style="padding: 0px; display: table; margin: 0px auto;">
<span style="color:#F08308;text-shadow: 0px 1px 1px #ccc; font-weight:600; font-size:14px;">Choose services</span>
<li class="style-li pay_now_btn"><div class="checkbox-style">
  <label class="style_label"><input style="padding-right:5px;" type="checkbox" name="text_resume[]" id="txtr1"> 
  Text Resume ( $<span class="old_amt"> <?php echo $row[1]->rb_new;?> </span>) $ <span class="new_amt"> <?php echo $row[1]->rb_old;?></span></label>
</div></li>
<li class="style-li pay_now_btn">
                   <div class="checkbox-style">
  <label class="style_label"><input type="checkbox" id="vr">
  Visual Resume $<span class="new_amt"> <?php echo $row[1]->visual;?></span></label>
</div></li>
                   
<li class="style-li pay_now_btn"><div class="checkbox-style">
  <label class="style_label"><input style="padding-right:5px;" type="checkbox" value="450" id="cl"> 
  Cover Letter ( $<span class="old_amt"><span class="old_amt"> <?php echo $row[1]->cl_new;?></span> </span> )$ <span class="new_amt"> <?php echo $row[1]->cl_old;?> </span></label>
</div></li>
<li class="style-li pay_now_btn"><div class="checkbox-style">
  <label class="style_label"><input style="padding-right:5px;" type="checkbox" id="li"> 
  LinkedIn Update ( $<span class="old_amt"> <?php echo $row[1]->li_new;?> </span>) $ <span class="new_amt"> <?php echo $row[1]->li_old;?></span></label>
</div></li>
<li class="style-li pay_now_btn"><div class="checkbox-style">
  <label class="style_label"><input style="padding-right:5px;" type="checkbox"  id="rb"> 
Resume Broadcast ( <span id="">$<span id="" class="old_amt"> <?php echo $row[1]->rbr_new;?> </span>) $ <span class="new_amt"> <?php echo $row[1]->rbr_old;?> </span></span></label>
</div></li>
<li class="style-li pay_now_btn"><div class="checkbox-style">
  <label class="style_label"><input style="padding-right:5px;" type="checkbox"  id="sl"> 
  Secure Link ( $ <span class="old_amt"> <?php echo $row[1]->sec_link_new;?> </span>) $ <span class="new_amt"> <?php echo $row[1]->sec_link_old;?></span></label>
</div></li>

<li class="style-li pay_now_btn">
                   <div class="checkbox-style">
  <label class="style_label"><input type="checkbox" id="ed" >
    Express Delivery $ <span class="new_amt"> <?php echo $row[1]->express_delivery;?><span style="color:#F00"> * </span></span></label>
</div></li>
                </ul>                      
                </div>
                <div class="form-field align-btn" style="width:100%; height:22%;">
                <button type="button" class="btn btn-default" style="width:100%; background:#F08308  none repeat scroll 0% 0%; color:#ffffff; height:80%; border:1px solid #FFF; font-size:2em" onClick="get_form()" id="12_level_btn"><span class="pay_now" >Order Now</span></button>
                </div>
                </div>
                <!------------------------------------>
                </div> 
                </div>
                
            <div class="col-md-12">                
                <div class="col-md-7" style="padding-left: 0px;">
                	 
		<div class="panel-heading">
         <p class="h4" style="font-weight: 800; color: #0a7faa; font-size: 24px;">8 - 12 Years Resume Writing</p>
     		<hr />
        </div>
        
       <div>
       	<?php echo $content[2]->resume_writing;?>
       </div>
                </div>
                <div class="col-md-5 col-sm-12" align="center" style="padding:0px; margin:0px;">
                <!-- first part of pricing modal-->
                 <div class="col-md-11 col-sm-5 payment_panel" style="width:100%;">
                
                <p class = "weight6" align="center">8 - 12 Years Text Resume</p>
                <div style="height:70px;">
                    <span class="currency">$</span>
                    <span class="amount" id="8_12_amount"><?php echo $row[2]->rb_old;?></span>
                </div>
                <div class="amount_new">$<span id="8_12_amount_original"><?php echo $row[2]->rb_new;?></span></div>
                
                 <div class="discount">You Save : $
                 <span id="8_12_amount_dis"><?php echo ($row[2]->rb_new - $row[2]->rb_old);?></span></div>
                <div id="8_12_amount_tax">
                <span class="discount" style="font-weight:700;color: #FFF; font-size:14px">[ Service Tax @ 14% ; Total  $<span id="tot_amount"><?php echo ($row[2]->rb_old+($row[2]->rb_old*0.14));?></span> ]</span>
                </div>
                </div>
                <!------------------------------------->
                <!-- second part of pricing modal   -->
                <div class="col-md-11 col-sm-7 payment_panel_second" style="width:100%;">
                <div class="pricing-list">
               
<ul style="padding: 0px; display: table; margin: 0px auto;">
<span style="color:#F08308;text-shadow: 0px 1px 1px #ccc; font-weight:600; font-size:14px;">Choose services</span>
<li class="style-li pay_now_btn"><div class="checkbox-style">
  <label class="style_label"><input style="padding-right:5px;" type="checkbox" name="text_resume[]" id="txtr2"> 
  Text Resume ( $<span class="old_amt"> <?php echo $row[2]->rb_new;?> </span>) $ <span class="new_amt"> <?php echo $row[2]->rb_old;?></span></label>
</div></li>
<li class="style-li pay_now_btn">
                   <div class="checkbox-style">
  <label class="style_label"><input type="checkbox" id="vr">
  Visual Resume $<span class="new_amt"> <?php echo $row[2]->visual;?></span></label>
</div></li>
                   
<li class="style-li pay_now_btn"><div class="checkbox-style">
  <label class="style_label"><input style="padding-right:5px;" type="checkbox" id="cl"> 
  Cover Letter ( $<span class="old_amt"> <?php echo $row[2]->cl_new;?> </span>) $ <span class="new_amt"> <?php echo $row[2]->cl_old;?></span></label>
</div></li>
<li class="style-li pay_now_btn"><div class="checkbox-style">
  <label class="style_label"><input style="padding-right:5px;" type="checkbox"  id="li"> 
  LinkedIn Update ( $<span class="old_amt"> <?php echo $row[2]->li_new;?> </span>) $ <span class="new_amt"> <?php echo $row[2]->li_old;?></span></label>
</div></li>
<li class="style-li pay_now_btn"><div class="checkbox-style">
  <label class="style_label"><input style="padding-right:5px;" type="checkbox" id="rb"> 
Resume Broadcast ( <span id="">$<span id="" class="old_amt"> <?php echo $row[2]->rbr_new;?> </span>) $ <span class="new_amt"> <?php echo $row[2]->rbr_old;?> </span></span></label>
</div></li>
<li class="style-li pay_now_btn"><div class="checkbox-style">
  <label class="style_label"><input style="padding-right:5px;" type="checkbox" id="sl"> 
  Secure Link ( $ <span class="old_amt"> <?php echo $row[2]->sec_link_new;?> </span>) $ <span class="new_amt"> <?php echo $row[2]->sec_link_old;?></span></label>
</div></li>
<li class="style-li pay_now_btn">
                   <div class="checkbox-style">
  <label class="style_label"><input type="checkbox" id="ed">
    Express Delivery $ <span class="new_amt"> <?php echo $row[2]->express_delivery;?><span style="color:#F00"> * </span></span></label>
</div></li>
                </ul>                      
                </div>
                <div class="form-field align-btn" style="width:100%; height:22%;">
                <button type="button" class="btn btn-default" style="width:100%; background:#F08308  none repeat scroll 0% 0%; color:#ffffff; height:80%; border:1px solid #FFF; font-size:2em" onClick="get_form()" id="8-12_level_btn"><span class="pay_now" >Order Now</span></button>
                </div>
                </div>
                <!------------------------------------>
                </div>                 
                </div>
                
            <div class="col-md-12">                
                <div class="col-md-7" style="padding-left: 0px;">
                	 
		<div class="panel-heading">
         <p class="h4" style="font-weight: 800; color: #0a7faa; font-size: 24px;">5 - 8 Years Resume Writing</p>
     		<hr />
        </div>
        
        <div>
       	<?php echo $content[3]->resume_writing;?>
       </div>
                </div>
                <div class="col-md-5 col-sm-12" align="center" style="padding:0px; margin:0px;">
                <!-- first part of pricing modal-->
                 <div class="col-md-11 col-sm-5 payment_panel" style="width:100%;">
                
                <p class = "weight6" align="center">5 - 8 Years Text Resume</p>
                <div style="height:70px;">
                    <span class="currency">$</span>
                    <span class="amount" id="5_8_amount"><?php echo $row[3]->rb_old;?></span>
                </div>
                <div class="amount_new">$<span id="5_8_amount_original"><?php echo $row[3]->rb_new;?></span></div>
                
                 <div class="discount">You Save : $
                 <span id="5_8_amount_dis"><?php echo ($row[3]->rb_new - $row[3]->rb_old); ?></span></div>
                 <div id="5_8_amount_tax">
                 <span class="discount" style="font-weight:700;color: #FFF; font-size:14px">[ Service Tax @ 14% ; Total  $<span id="tot_amount"><?php echo ($row[3]->rb_old+($row[3]->rb_old*0.14));?></span> ]</span>
                 </div>  
                </div>
                <!------------------------------------->
                <!-- second part of pricing modal   -->
                <div class="col-md-11 col-sm-7 payment_panel_second" style="width:100%;">
                <div class="pricing-list">
              
<ul style="padding: 0px; display: table; margin: 0px auto;">
<span style="color:#F08308;text-shadow: 0px 1px 1px #ccc; font-weight:600; font-size:14px;">Choose services</span> 
<li class="style-li pay_now_btn"><div class="checkbox-style">
  <label class="style_label"><input style="padding-right:5px;" type="checkbox" name="text_resume[]" id="txtr3"> 
  Text Resume ( $<span class="old_amt"> <?php echo $row[3]->rb_new;?> </span>) $ <span class="new_amt"> <?php echo $row[3]->rb_old;?></span></label>
</div></li>
<li class="style-li pay_now_btn">
                   <div class="checkbox-style">
  <label class="style_label"><input type="checkbox" id="vr">
  Visual Resume $<span class="new_amt"> <?php echo $row[3]->visual;?></span></label>
</div></li>
                   
<li class="style-li pay_now_btn"><div class="checkbox-style">
  <label class="style_label"><input style="padding-right:5px;" type="checkbox" id="cl"> 
  Cover Letter ( $<span class="old_amt"> <?php echo $row[3]->cl_new;?> </span>) $ <span class="new_amt"> <?php echo $row[3]->cl_old;?></span></label>
</div></li>
<li class="style-li pay_now_btn"><div class="checkbox-style">
  <label class="style_label"><input style="padding-right:5px;" type="checkbox" id="li"> 
  LinkedIn Update ( $<span class="old_amt"> <?php echo $row[3]->li_new;?> </span>) $<span class="new_amt"> <?php echo $row[3]->li_old;?></span></label>
</div></li>
<li class="style-li pay_now_btn"><div class="checkbox-style">
  <label class="style_label"><input style="padding-right:5px;" type="checkbox" id="rb"> 
Resume Broadcast ( <span id="">$<span id="" class="old_amt"> <?php echo $row[3]->rbr_new;?> </span>) $ <span class="new_amt"> <?php echo $row[3]->rbr_old;?> </span></span></label>
</div></li>
<li class="style-li pay_now_btn"><div class="checkbox-style">
  <label class="style_label"><input style="padding-right:5px;" type="checkbox" id="sl"> 
  Secure Link ( $ <span class="old_amt"> <?php echo $row[3]->sec_link_new;?> </span>) $ <span class="new_amt"> <?php echo $row[3]->sec_link_old;?></span></label>
</div></li>
<li class="style-li pay_now_btn">
                   <div class="checkbox-style">
  <label class="style_label"><input type="checkbox" id="ed">
    Express Delivery $ <span class="new_amt"> <?php echo $row[3]->express_delivery;?><span style="color:#F00"> * </span></span></label>
</div></li>
                </ul>                      
                </div>
                <div class="form-field align-btn" style="width:100%; height:22%;">
                <button type="button" class="btn btn-default" style="width:100%; background:#F08308  none repeat scroll 0% 0%; color:#ffffff; height:80%; border:1px solid #FFF; font-size:2em" onClick="get_form()" id="5-8_level_btn"><span class="pay_now" >Order Now</span></button>
                </div>
                </div>
                <!------------------------------------>
                </div>                 
                </div>
                
            <div class="col-md-12">                
                <div class="col-md-7" style="padding-left: 0px;">
                	 
		<div class="panel-heading">
         <p class="h4" style="font-weight: 800; color: #0a7faa; font-size: 24px;">3 - 5 Years Resume Writing</p>
     		<hr />
        </div>
        
        <div>
       	<?php echo $content[4]->resume_writing;?>
       </div>
                </div>
                <div class="col-md-5 col-sm-12" align="center" style="padding:0px; margin:0px;">
                <!-- first part of pricing modal-->
                 <div class="col-md-11 col-sm-5 payment_panel" style="width:100%;">
                
                <p class = "weight6" align="center">3 - 5 Years Text Resume</p>
                <div style="height:70px;">
                    <span class="currency">$</span>
                    <span class="amount" id="3_5_amount"><?php echo $row[4]->rb_old;?></span>
                </div>
                <div class="amount_new">$<span id="3_5_amount_original"><?php echo $row[4]->rb_new;?></span></div>
                
                 <div class="discount">You Save : $
                 <span id="3_5_amount_dis"><?php echo ($row[4]->rb_new - $row[4]->rb_old);?></span></div>
                 <div id="3_5_amount_tax">
                 <span class="discount" style="font-weight:700;color: #FFF; font-size:14px">[ Service Tax @ 14% ; Total  $<span id="tot_amount"><?php echo ($row[4]->rb_old+($row[4]->rb_old*0.14));?></span> ]</span>
                 </div>  
                </div>
                <!------------------------------------->
                <!-- second part of pricing modal   -->
                <div class="col-md-11 col-sm-7 payment_panel_second" style="width:100%;">

                <div class="pricing-list">
               
<ul style="padding: 0px; display: table; margin: 0px auto;">
<span style="color:#F08308;text-shadow: 0px 1px 1px #ccc; font-weight:600; font-size:14px;">Choose services</span>
<li class="style-li pay_now_btn"><div class="checkbox-style">
  <label class="style_label"><input style="padding-right:5px;" type="checkbox" name="text_resume[]" id="txtr4"> 
  Text Resume ( $<span class="old_amt"> <?php echo $row[4]->rb_new;?> </span>) $ <span class="new_amt"> <?php echo $row[4]->rb_old;?></span></label>
</div></li>
<li class="style-li pay_now_btn">
                   <div class="checkbox-style">
  <label class="style_label"><input type="checkbox" id="vr">
  Visual Resume $<span class="new_amt"> <?php echo $row[4]->visual;?></span></label>
</div></li>
                   
<li class="style-li pay_now_btn"><div class="checkbox-style">
  <label class="style_label"><input style="padding-right:5px;" type="checkbox" id="cl"> 
  Cover Letter ( $<span class="old_amt"> <?php echo $row[4]->cl_new;?> </span>) $ <span class="new_amt"> <?php echo $row[4]->cl_old;?></span></label>
</div></li>
<li class="style-li pay_now_btn"><div class="checkbox-style">
  <label class="style_label"><input style="padding-right:5px;" type="checkbox" id="li"> 
  LinkedIn Update ( $<span class="old_amt"> <?php echo $row[4]->li_new;?> </span>) $ <span class="new_amt"><?php echo $row[4]->li_old;?></span></label>
</div></li>
<li class="style-li pay_now_btn"><div class="checkbox-style">
  <label class="style_label"><input style="padding-right:5px;" type="checkbox" id="rb"> 
Resume Broadcast ( <span id="">$<span id="" class="old_amt"> <?php echo $row[4]->rbr_new;?> </span>) $ <span class="new_amt"> <?php echo $row[4]->rbr_old;?> </span></span></label>
</div></li>
<li class="style-li pay_now_btn"><div class="checkbox-style">
  <label class="style_label"><input style="padding-right:5px;" type="checkbox" id="sl"> 
  Secure Link ( $<span class="old_amt"> <?php echo $row[4]->sec_link_new;?> </span>) $ <span class="new_amt"> <?php echo $row[4]->sec_link_old;?></span></label>
</div></li>
<li class="style-li pay_now_btn">
                   <div class="checkbox-style">
  <label class="style_label"><input type="checkbox" id="ed">
    Express Delivery $ <span class="new_amt"> <?php echo $row[4]->express_delivery;?><span style="color:#F00"> * </span></span></label>
</div></li>
                </ul>                      
                </div>
                <div class="form-field align-btn" style="width:100%; height:22%;">
                <button type="button" class="btn btn-default" style="width:100%; background:#F08308  none repeat scroll 0% 0%; color:#ffffff; height:80%; border:1px solid #FFF; font-size:2em" onClick="get_form()" id="3-5_level_btn"><span class="pay_now" >Order Now</span></button>
                </div>
                </div>
                <!------------------------------------>
                </div> 
                </div>
                
            <div class="col-md-12">                
                <div class="col-md-7" style="padding-left: 0px;">
                	 
		<div class="panel-heading">
        <p class="h4" style="font-weight: 800; color: #0a7faa; font-size: 24px;">1 - 3 Years Resume Writing</p>
     		<hr />
        </div>
        
       <div>
       	<?php echo $content[5]->resume_writing;?>
       </div>
	
                </div>
                <div class="col-md-5 col-sm-12" align="center" style="padding:0px; margin:0px;">
                <!-- first part of pricing modal-->
                 <div class="col-md-11 col-sm-5 payment_panel" style="width:100%;">
                
                <p class = "weight6" align="center">1 - 3 Years Text Resume</p>
                <div style="height:70px;">
                    <span class="currency">$</span>
                    <span class="amount" id="1_3_amount"><?php echo $row[5]->rb_old;?></span>
                </div>
               <div class="amount_new">$<span id="1_3_amount_original"><?php echo $row[5]->rb_new;?></span></div>
                
                 <div class="discount">You Save : $
                 <span id="1_3_amount_dis"><?php echo ($row[5]->rb_new - $row[5]->rb_old);?></span></div>
                 <div id="1_3_amount_tax">
                 <span class="discount" style="font-weight:700;color: #FFF; font-size:14px">[ Service Tax @ 14% ; Total  $<span id="tot_amount"><?php echo ($row[5]->rb_old+($row[5]->rb_old*0.14));?></span> ]</span>
                 </div>  
                </div>
                <!------------------------------------->
                <!-- second part of pricing modal   -->
                <div class="col-md-11 col-sm-7 payment_panel_second" style="width:100%;">
                <div class="pricing-list">
               
<ul style="padding: 0px; display: table; margin: 0px auto;">
<span style="color:#F08308;text-shadow: 0px 1px 1px #ccc; font-weight:600; font-size:14px;">Choose services</span>
<li class="style-li pay_now_btn"><div class="checkbox-style">
  <label class="style_label"><input style="padding-right:5px;" type="checkbox" name="text_resume[]" id="txtr5"> 
  Text Resume ( $<span class="old_amt"> <?php echo $row[5]->rb_new;?> </span>) $ <span class="new_amt"> <?php echo $row[5]->rb_old;?></span></label>
</div></li>
<li class="style-li pay_now_btn">
                   <div class="checkbox-style">
  <label class="style_label"><input type="checkbox" id="vr">
  Visual Resume $<span class="new_amt"> <?php echo $row[5]->visual;?></span></label>
</div></li>
                   
<li class="style-li pay_now_btn"><div class="checkbox-style">
  <label class="style_label"><input style="padding-right:5px;" type="checkbox" id="cl"> 
  Cover Letter ( $<span class="old_amt"> <?php echo $row[5]->cl_new;?> </span>) $ <span class="new_amt"> <?php echo $row[5]->cl_old;?></span></label>
</div></li>
<li class="style-li pay_now_btn"><div class="checkbox-style">
  <label class="style_label"><input style="padding-right:5px;" type="checkbox" id="li"> 
  LinkedIn Update ( $<span class="old_amt"> <?php echo $row[5]->li_new;?> </span>) $<span class="new_amt"> <?php echo $row[5]->li_old;?></span></label>
</div></li>
<li class="style-li pay_now_btn"><div class="checkbox-style">
  <label class="style_label"><input style="padding-right:5px;" type="checkbox" id="rb"> 
Resume Broadcast ( <span id="">$<span id="" class="old_amt"> <?php echo $row[5]->rbr_new;?> </span>) $ <span class="new_amt"> <?php echo $row[5]->rbr_old;?> </span></span></label>
</div></li>
<li class="style-li pay_now_btn"><div class="checkbox-style">
  <label class="style_label"><input style="padding-right:5px;" type="checkbox" id="sl"> 
  Secure Link ( $ <span class="old_amt"> <?php echo $row[5]->sec_link_new;?> </span>) $ <span class="new_amt"> <?php echo $row[5]->sec_link_old;?></span></label>
</div></li>
<li class="style-li pay_now_btn">
                   <div class="checkbox-style">
  <label class="style_label"><input type="checkbox" id="ed">
    Express Delivery $ <span class="new_amt"> <?php echo $row[5]->express_delivery;?><span style="color:#F00"> * </span></span></label>
</div></li>
                </ul>                      
                </div>
                <div class="form-field align-btn" style="width:100%; height:22%;">
                <button type="button" class="btn btn-default" style="width:100%; background:#F08308  none repeat scroll 0% 0%; color:#ffffff; height:80%; border:1px solid #FFF; font-size:2em" onClick="get_form()" id="1-3_level_resume"><span class="pay_now" >Order Now</span></button>
                </div>
                </div>
                <!------------------------------------>
                </div> 
                </div>            
                
            <div class="col-md-12">                
                <div class="col-md-7" style="padding-left: 0px;">
                	 
		<div class="panel-heading">
         <p class="h4" style="font-weight: 800; color: #0a7faa; font-size: 24px;">0 - 1 Years Resume Writing</p>
     		<hr />
        </div>
        
       <div>
       	<?php echo $content[6]->resume_writing;?>
       </div>
                </div>
                <div class="col-md-5 col-sm-12" align="center" style="padding:0px; margin:0px;">
                <!-- first part of pricing modal-->
                 <div class="col-md-11 col-sm-5 payment_panel" style="width:100%;">
                
                <p class = "weight6" align="center">0 - 1 Years Text Resume</p>
                <div style="height:70px;">
                    <span class="currency">$</span>
                    <span class="amount" id="0_1_amount"><?php echo $row[6]->rb_old;?></span>
                </div>
                <div class="amount_new">$<span id="0_1_amount_original"><?php echo $row[6]->rb_new;?></span></div>
                
                 <div class="discount">You Save : $
                 <span id="0_1_amount_dis"><?php echo ($row[6]->rb_new - $row[6]->rb_old);?></span></div>
                 <div id="0_1_amount_tax">
                <span class="discount" style="font-weight:700;color: #FFF; font-size:14px">[ Service Tax @ 14% ; Total  $<span id="tot_amount"><?php echo ($row[6]->rb_old+($row[6]->rb_old*0.14));?></span> ]</span>
                 </div> 
                </div>
                <!------------------------------------->
                <!-- second part of pricing modal   -->
                <div class="col-md-11 col-sm-7 payment_panel_second" style="width:100%;">
                <div class="pricing-list">
               
<ul style="padding: 0px; display: table; margin: 0px auto;">
<span style="color:#F08308;text-shadow: 0px 1px 1px #ccc; font-weight:600; font-size:14px;">Choose services</span>
<li class="style-li pay_now_btn"><div class="checkbox-style">
  <label class="style_label"><input style="padding-right:5px;" type="checkbox" name="text_resume[]" id="txtr6"> 
  Text Resume ( $<span class="old_amt"> <?php echo $row[6]->rb_new;?> </span>) $ <span class="new_amt"> <?php echo $row[6]->rb_old;?></span></label>
</div></li>
<li class="style-li pay_now_btn">
                   <div class="checkbox-style">
  <label class="style_label"><input type="checkbox" id="vr">
  Visual Resume $<span class="new_amt"> <?php echo $row[6]->visual;?></span></label>
</div></li>
                   
<li class="style-li pay_now_btn"><div class="checkbox-style">
  <label class="style_label"><input style="padding-right:5px;" type="checkbox" id="cl"> 
  Cover Letter ( $<span class="old_amt"> <?php echo $row[6]->cl_new;?> </span>) $ <span class="new_amt"> <?php echo $row[6]->cl_old;?></span></label>
</div></li>
<li class="style-li pay_now_btn"><div class="checkbox-style">
  <label class="style_label"><input style="padding-right:5px;" type="checkbox" id="li"> 
  LinkedIn Update ( $<span class="old_amt"> <?php echo $row[6]->li_new;?> </span>) $ <span class="new_amt"> <?php echo $row[6]->li_old;?></span></label>
</div></li>
<li class="style-li pay_now_btn"><div class="checkbox-style">

  <label class="style_label"><input style="padding-right:5px;" type="checkbox" id="rb"> 
Resume Broadcast ( <span id="">$<span id="" class="old_amt"> <?php echo $row[6]->rbr_new;?></span>) $ <span class="new_amt"> <?php echo $row[6]->rbr_old;?> </span></span></label>
</div></li>
<li class="style-li pay_now_btn"><div class="checkbox-style">
  <label class="style_label"><input style="padding-right:5px;" type="checkbox" id="sl"> 
  Secure Link ( $ <span class="old_amt"> <?php echo $row[6]->sec_link_new;?></span>) $ <span class="new_amt"> <?php echo $row[6]->sec_link_old;?></span></label>
</div></li>
<li class="style-li pay_now_btn">
                   <div class="checkbox-style">
  <label class="style_label"><input type="checkbox" id="ed">
    Express Delivery $ <span class="new_amt"> <?php echo $row[6]->express_delivery;?><span style="color:#F00"> * </span></span></label>
</div></li>
                </ul>                      
                </div>
                <div class="form-field align-btn" style="width:100%; height:22%;">
                <button type="button" class="btn btn-default" style="width:100%; background:#F08308  none repeat scroll 0% 0%; color:#ffffff; height:80%; border:1px solid #FFF; font-size:2em" onClick="get_form()" id="0-1_level_btn"><span class="pay_now" >Order Now</span></button>
                </div>
                </div>
                <!------------------------------------>
                </div> 
                </div>    
                <span>
        <img src="<?php echo get_template_directory_uri();?>/images/mastercard-visa-logo-2-50-1px.png" alt="Pay securely using Visa, Master Card, American express and PayPal using our secure payment gateway"/>
        </span>
                <span style="color:#D20D12; font-size:12px; float:right; margin-right:130px;">* Resume Delivery within 48 hours</span>
            </div>
            
        </div>
       
        </div><!--col-md-8 end-->        
        </div>
   
    <!-- row end -->
    </div>        
            
    <div id="tab2" class="tab-pane">
    <div class="row" style="color:#54536F">
        <div class="col-md-11 col-md-offset-1">
        <div class="row adjust_width" style="background:#fff; margin-left:0px;">
       <div class="col-md-3 col-xs-12 panel-body steps">
       <img src="http://resumebuilder.isourcecorp.com/wp-content/themes/vantage/images/choose1.png" height="40" style="padding-left:70px" />
       <p id="step1" style="font-weight:300">Step 1 : Choose Services</p>
       </div>
            <div class="col-md-3 col-xs-12 panel-body steps">
     <img src="http://resumebuilder.isourcecorp.com/wp-content/themes/vantage/images/register1.png" height="40" style="padding-left:70px" />
     <p id="step2" style="font-weight:300; padding-left:30px;">Step 2 : Register</p>
           </div>
           <div class="col-md-3 col-xs-12 panel-body steps">
         <img src="http://resumebuilder.isourcecorp.com/wp-content/themes/vantage/images/pay1.png" height="40" style="padding-left:70px"/>
         <p id="step3" style="font-weight:300">Step 3 : Confirm By Payment</p>
           </div> 
<div class="col-md-3 col-xs-12 panel-body" align="center">
        <button class="toggle" id="inr[]" name="inr[]" style="color:#646464; background:#CCC; font-size:18px; text-shadow:none; border:none;border-radius:0px; "><span class="WebRupee">Rs.</span></button><button id="usd[]" name="usd[]" class="toggle" style="font-size:18px; color:#FFF; text-shadow:none; border:none; border-radius:0px;">$</button>
          <p id="step3" style="font-weight:300">Choose $ for international orders</p>
          
           </div>
       </div>
        <div id="parentVerticalTab1">
        <ul class="resp-tabs-list hor_1">
    
    <li class="li-font" id="ser1" onClick="get_service_Flavour(this.id);">C - Level</li>
    <li class="li-font" id="ser2" onClick="get_service_Flavour(this.id);">12+ Years</li>
    <li class="li-font" id="ser3" onClick="get_service_Flavour(this.id);">8 - 12 Years</li>
    <li class="li-font" id="ser4" onClick="get_service_Flavour(this.id);">5 - 8 Years</li>
    <li class="li-font" id="ser5" onClick="get_service_Flavour(this.id);">3 - 5 Years</li>
    <li class="li-font" id="ser6" onClick="get_service_Flavour(this.id);">1 - 3 Years</li>
    <li class="li-font" id="ser7" onClick="get_service_Flavour(this.id);">0 - 1 Years</li>
        </ul>
                <div class="resp-tabs-container hor_1" style="padding:10px 10px 10px 10px; ">              
                <div class="col-md-12" id="tabs" style="padding-left: 0px;">                
                    <div class="col-md-7" style="padding-left: 0px;">
                         
            <div class="panel-heading">
             <p class="h4" style="font-weight: 800; color: #0a7faa; font-size: 24px;">C - Level Resume Writing</p>
                <hr />
            </div>
            
                <div>
            <?php echo $content[0]->individual_service;?>
           </div>        
                    </div>
                    <div class="col-md-5 col-sm-12" align="center" style="padding:0px; margin:0px;">
                    <!-- first part of pricing modal-->
                    <div class="col-md-11 col-sm-5" style="height:150px; background:#34495e; border-top-left-radius:4px; width:90%; border-top-right-radius:4px;box-shadow: 1px 1px 9px rgba(0, 0, 0, 0.6);box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.6); 
        text-shadow: 3px 2px 5px #050505; width:100%;">
                    
                    <p class = "weight6" align="center">C - Level Text Resume</p>
                    <div style="height:70px;">                	
                        <span class="currency">$</span>
                        <span class="amount" id="c_level_amt_ser">0</span>                    
                    </div>   
                    <div id="c_level_amt_ser_tax">
                <span class="discount" style="font-weight:700;color: #FFF; font-size:14px">[ Service Tax @ 14% ; Total  $<span id="tot_amount">0</span> ]</span>
                 </div>                             
                    </div>
                    <!------------------------------------->
                    <!-- second part of pricing modal   -->
                    <div class="col-md-11 col-sm-7" style="height:340px; background:#ffffff;border-bottom-left-radius:4px;width:90%; border-bottom-right-radius:4px;box-shadow: 1px 1px 9px rgba(0, 0, 0, 0.6); width:100%;">
                    <div class="pricing-list">
                   
    <ul style="padding: 0px; display: table; margin: 0px auto;">
    <li class="style-li pay_now_btn">
                       <div class="checkbox-style">
      <label class="style_label"><input type="checkbox" name="services[]" id="vr">
      Visual Resume $<span class="new_amt"> <?php echo $row[0]->visual;?></span></label>
    </div></li>
                       
    <li class="style-li pay_now_btn"><div class="checkbox-style">
      <label class="style_label"><input style="padding-right:5px;" type="checkbox" name="services[]" id="cl"> 
      Cover Letter $<span class="new_amt"> <?php echo $row[0]->cl_new;?> </span></label>
    </div></li>
    <li class="style-li pay_now_btn"><div class="checkbox-style">
      <label class="style_label"><input style="padding-right:5px;" type="checkbox" name="services[]" id="li"> 
      LinkedIn Update $ <span class="new_amt"> <?php echo $row[0]->li_new;?> </span></label>
    </div></li>
    <li class="style-li pay_now_btn"><div class="checkbox-style">
      <label class="style_label"><input style="padding-right:5px;" type="checkbox" name="services[]" id="rb"> 
    Resume Broadcast $ <span class="new_amt"> <?php echo $row[0]->rbr_new;?> </span></label>
    </div></li>
    <li class="style-li pay_now_btn"><div class="checkbox-style">
      <label class="style_label"><input style="padding-right:5px;" type="checkbox" name="services[]" id="sl"> 
      Secure Link $ <span class="new_amt"><?php echo $row[0]->sec_link_new;?></span> </label>
    </div></li>
    <li class="style-li pay_now_btn">
                       <div class="checkbox-style">
      <label class="style_label"><input type="checkbox" name="services[]" id="ed">
        Express Delivery $ <span class="new_amt"> <?php echo $row[0]->express_delivery;?><span style="color:#F00"> * </span></span></label>
    </div></li>
                    </ul>    
                                      
                    </div>
                    <div class="form-field align-btn " style="width:100%; height:22%;">
                    <button type="button" class="btn btn-default" style="width:100%; background:#F08308  none repeat scroll 0% 0%; color:#ffffff; height:100%; border:1px solid #FFF; font-size:2em" onclick="get_form()" id="c_level_btn"><span class="pay_now">Order Now</span></button>
                    
                    </div>
                    </div>
                    <!------------------------------------>
                    </div> 
                    </div>
                    
                <div class="col-md-12">                
                    <div class="col-md-7" style="padding-left: 0px;">
                         
            <div class="panel-heading">
             <p class="h4" style="font-weight: 800; color: #0a7faa; font-size: 24px;">12 + Years Resume Writing</p>
                <hr />
            </div>
            
            	 <div>
           		 <?php echo $content[1]->individual_service;?>
           		</div>
                    </div>
                    <div class="col-md-5 col-sm-12" align="center" style="padding:0px; margin:0px;">
                    <!-- first part of pricing modal-->
                    <div class="col-md-11 col-sm-8" style="height:150px; background:#34495e; border-top-left-radius:4px; width:90%; border-top-right-radius:4px;box-shadow: 1px 1px 9px rgba(0, 0, 0, 0.6);box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.6); 
        text-shadow: 3px 2px 5px #050505;width:100%;">
                    
                    <p class = "weight6" align="center">12 + Years Text Resume</p>
                    <div style="height:70px;">
                        <span class="currency">$</span>
                        <span class="amount" id="12_amount_ser">0</span>   
                    </div>    
                    <div id="12_amount_ser_tax">
                <span class="discount" style="font-weight:700;color: #FFF; font-size:14px">[ Service Tax @ 14% ; Total  $<span id="tot_amount">0</span> ]</span>
                 </div>           
                    </div>
                    <!------------------------------------->
                    <!-- second part of pricing modal   -->
                    <div class="col-md-11 col-sm-7" style="height:340px; background:#ffffff;border-bottom-left-radius:4px;width:90%; border-bottom-right-radius:4px;box-shadow: 1px 1px 9px rgba(0, 0, 0, 0.6); width:100%;">
                    <div class="pricing-list">
                   
    <ul style="padding: 0px; display: table; margin: 0px auto;">
    <li class="style-li pay_now_btn">
                       <div class="checkbox-style">
      <label class="style_label"><input type="checkbox" name="services[]" id="vr">
      Visual Resume $<span class="new_amt"> <?php echo $row[1]->visual;?></span></label>
    </div></li>
                       
    <li class="style-li pay_now_btn"><div class="checkbox-style">
      <label class="style_label"><input style="padding-right:5px;" type="checkbox" name="services[]" id="cl"> 
      Cover Letter $<span class="new_amt"> <?php echo $row[1]->cl_new;?> </span></label>
    </div></li>
    <li class="style-li pay_now_btn"><div class="checkbox-style">
      <label class="style_label"><input style="padding-right:5px;" type="checkbox" name="services[]" id="li"> 
      LinkedIn Update $ <span class="new_amt"> <?php echo $row[1]->li_new;?> </span></label>
    </div></li>
    <li class="style-li pay_now_btn"><div class="checkbox-style">
      <label class="style_label"><input style="padding-right:5px;" type="checkbox" name="services[]" id="rb"> 
    Resume Broadcast $ <span class="new_amt"> <?php echo $row[1]->rbr_new;?> </span></label>
    </div></li>
    <li class="style-li pay_now_btn"><div class="checkbox-style">
      <label class="style_label"><input style="padding-right:5px;" type="checkbox" name="services[]" id="sl"> 
      Secure Link $ <span class="new_amt"><?php echo $row[1]->sec_link_new;?></span> </label>
    </div></li>
    <li class="style-li pay_now_btn">
                       <div class="checkbox-style">
      <label class="style_label"><input type="checkbox" name="services[]" id="ed">
        Express Delivery $ <span class="new_amt"> <?php echo $row[1]->express_delivery;?><span style="color:#F00"> * </span></span></label>
    </div></li>
                    </ul>    
                                      
                    </div>
                    <div class="form-field align-btn " style="width:100%; height:22%;">
                    <button type="button" class="btn btn-default" style="width:100%; background:#F08308  none repeat scroll 0% 0%; color:#ffffff; height:100%; border:1px solid #FFF; font-size:2em" onClick="get_form()" id="c_level_btn"><span class="pay_now">Order Now</span></button>
                    
                    </div>
                    </div>
                    <!------------------------------------>
                    </div> 
                    </div>                                   
                    
                <div class="col-md-12">                
                    <div class="col-md-7" style="padding-left: 0px;">
                         
            <div class="panel-heading">
             <p class="h4" style="font-weight: 800; color: #0a7faa; font-size: 24px;">8 - 12 Years Resume Writing</p>
                <hr />
            </div>
            
            	 <div>
           			 <?php echo $content[2]->individual_service;?>

           		</div>
        
                    </div>
                    <div class="col-md-5 col-sm-12" align="center" style="padding:0px; margin:0px;">
                    <!-- first part of pricing modal-->
                    <div class="col-md-11 col-sm-8" style="height:150px; background:#34495e; border-top-left-radius:4px; width:90%; border-top-right-radius:4px;box-shadow: 1px 1px 9px rgba(0, 0, 0, 0.6);box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.6); 
        text-shadow: 3px 2px 5px #050505; width:100%;">
                    
                    <p class = "weight6" align="center">8 - 12 Years Text Resume</p>
                    <div style="height:70px;">
                        <span class="currency">$</span>
                        <span class="amount" id="8_12_amount_ser">0</span>
                    </div>
                   <div id="8_12_amount_ser_tax">
                <span class="discount" style="font-weight:700;color: #FFF; font-size:14px">[ Service Tax @ 14% ; Total  $<span id="tot_amount">0</span> ]</span>
                 </div>
                    </div>
                    <!------------------------------------->
                    <!-- second part of pricing modal   -->
                    <div class="col-md-11 col-sm-7" style="height:340px; background:#ffffff;border-bottom-left-radius:4px;width:90%; border-bottom-right-radius:4px;box-shadow: 1px 1px 9px rgba(0, 0, 0, 0.6); width:100%;">
                    <div class="pricing-list">
                   
    <ul style="padding: 0px; display: table; margin: 0px auto;">
    <li class="style-li pay_now_btn">
                       <div class="checkbox-style">
      <label class="style_label"><input type="checkbox" name="services[]" id="vr">
      Visual Resume $<span class="new_amt"> <?php echo $row[2]->visual;?></span></label>
    </div></li>
                       
    <li class="style-li pay_now_btn"><div class="checkbox-style">
      <label class="style_label"><input style="padding-right:5px;" type="checkbox" name="services[]" id="cl"> 
      Cover Letter $<span class="new_amt"> <?php echo $row[2]->cl_new;?> </span></label>
    </div></li>
    <li class="style-li pay_now_btn"><div class="checkbox-style">
      <label class="style_label"><input style="padding-right:5px;" type="checkbox" name="services[]" id="li"> 
      LinkedIn Update $ <span class="new_amt"> <?php echo $row[2]->li_new;?> </span></label>
    </div></li>
    <li class="style-li pay_now_btn"><div class="checkbox-style">
      <label class="style_label"><input style="padding-right:5px;" type="checkbox" name="services[]" id="rb"> 
    Resume Broadcast $ <span class="new_amt"> <?php echo $row[2]->rbr_new;?> </span></label>
    </div></li>
    <li class="style-li pay_now_btn"><div class="checkbox-style">
      <label class="style_label"><input style="padding-right:5px;" type="checkbox" name="services[]" id="sl"> 
      Secure Link $ <span class="new_amt"><?php echo $row[2]->sec_link_new;?></span></label>
    </div></li>
    <li class="style-li pay_now_btn">
                       <div class="checkbox-style">
      <label class="style_label"><input type="checkbox" name="services[]" id="ed">
        Express Delivery $ <span class="new_amt"> <?php echo $row[2]->express_delivery;?><span style="color:#F00"> * </span></span></label>
    </div></li>
                    </ul>    
                                      
                    </div>
                    <div class="form-field align-btn " style="width:100%; height:22%;">
                    <button type="button" class="btn btn-default" style="width:100%; background:#F08308  none repeat scroll 0% 0%; color:#ffffff; height:100%; border:1px solid #FFF; font-size:2em" onClick="get_form()" id="c_level_btn"><span class="pay_now">Order Now</span></button>
                    
                    </div>
                    </div>
                    <!------------------------------------>
                    </div>                 
                    </div>
                
                <div class="col-md-12">                
                    <div class="col-md-7" style="padding-left: 0px;">
                         
            <div class="panel-heading">
             <p class="h4" style="font-weight: 800; color: #0a7faa; font-size: 24px;">5 - 8 Years Resume Writing</p>
                <hr />
            </div>
            
             <div>
            <?php echo $content[3]->individual_service;?>
           </div>
        
                    </div>
                    <div class="col-md-5 col-sm-12" align="center" style="padding:0px; margin:0px;">
                    <!-- first part of pricing modal-->
                    <div class="col-md-11 col-sm-8" style="height:150px; background:#34495e; border-top-left-radius:4px; width:90%; border-top-right-radius:4px;box-shadow: 1px 1px 9px rgba(0, 0, 0, 0.6);box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.6); 
        text-shadow: 3px 2px 5px #050505; width:100%;">
                    
                    <p class = "weight6" align="center">5 - 8 Years Text Resume</p>
                    <div style="height:70px;">
                        <span class="currency">$</span>
                        <span class="amount" id="5_8_amount_ser">0</span>
                    </div>       
                    <div id="5_8_amount_ser_tax">
                <span class="discount" style="font-weight:700;color: #FFF; font-size:14px">[ Service Tax @ 14% ; Total  $<span id="tot_amount">0</span> ]</span>
                 </div>         
                    </div>
                    <!------------------------------------->
                    <!-- second part of pricing modal   -->
                    <div class="col-md-11 col-sm-7" style="height:340px; background:#ffffff;border-bottom-left-radius:4px;width:90%; border-bottom-right-radius:4px;box-shadow: 1px 1px 9px rgba(0, 0, 0, 0.6); width:100%;">
                    <div class="pricing-list">
                   
    <ul style="padding: 0px; display: table; margin: 0px auto;">
    <li class="style-li pay_now_btn">
                       <div class="checkbox-style">
      <label class="style_label"><input type="checkbox" name="services[]" id="vr">
      Visual Resume $<span class="new_amt"> <?php echo $row[3]->visual;?></span></label>
    </div></li>
                       
    <li class="style-li pay_now_btn"><div class="checkbox-style">
      <label class="style_label"><input style="padding-right:5px;" type="checkbox" name="services[]" id="cl"> 
      Cover Letter $<span class="new_amt"> <?php echo $row[3]->cl_new;?> </span></label>
    </div></li>
    <li class="style-li pay_now_btn"><div class="checkbox-style">
      <label class="style_label"><input style="padding-right:5px;" type="checkbox" name="services[]" id="li"> 
      LinkedIn Update $ <span class="new_amt"> <?php echo $row[3]->li_new;?> </span></label>
    </div></li>
    <li class="style-li pay_now_btn"><div class="checkbox-style">
      <label class="style_label"><input style="padding-right:5px;" type="checkbox" name="services[]" id="rb"> 
    Resume Broadcast $ <span class="new_amt"> <?php echo $row[3]->rbr_new;?> </span></label>
    </div></li>
    <li class="style-li pay_now_btn"><div class="checkbox-style">
      <label class="style_label"><input style="padding-right:5px;" type="checkbox" name="services[]" id="sl"> 
      Secure Link $ <span class="new_amt"><?php echo $row[3]->sec_link_new;?></span></label>
    </div></li>
    <li class="style-li pay_now_btn">
                       <div class="checkbox-style">
      <label class="style_label"><input type="checkbox" name="services[]" id="ed">
        Express Delivery $ <span class="new_amt"> <?php echo $row[3]->express_delivery;?><span style="color:#F00"> * </span></span></label>
    </div></li>
                    </ul>    
                                      
                    </div>
                    <div class="form-field align-btn " style="width:100%; height:22%;">
                    <button type="button" class="btn btn-default" style="width:100%; background:#F08308  none repeat scroll 0% 0%; color:#ffffff; height:100%; border:1px solid #FFF; font-size:2em" onClick="get_form()" id="c_level_btn"><span class="pay_now">Order Now</span></button>
                    
                    </div>
                    </div>
                    <!------------------------------------>
                    </div>                 
                    </div>
                                                     
                <div class="col-md-12">                
                    <div class="col-md-7" style="padding-left: 0px;">
                         
            <div class="panel-heading">
             <p class="h4" style="font-weight: 800; color: #0a7faa; font-size: 24px;">3 - 5 Years Resume Writing</p>
                <hr />
            </div>
            
             <div>
            	<?php echo $content[4]->individual_service;?>
          	 </div>
        
                    </div>
                    <div class="col-md-5 col-sm-12" align="center" style="padding:0px; margin:0px;">
                    <!-- first part of pricing modal-->
                    <div class="col-md-11 col-sm-8" style="height:150px; background:#34495e; border-top-left-radius:4px; width:90%; border-top-right-radius:4px;box-shadow: 1px 1px 9px rgba(0, 0, 0, 0.6);box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.6); 
        text-shadow: 3px 2px 5px #050505; width:100%;">
                    
                    <p class = "weight6" align="center">3 - 5 Years Text Resume</p>
                    <div style="height:70px;">
                        <span class="currency">$</span>
                        <span class="amount" id="3_5_amount_ser">0</span>
                    </div>
                    <div id="3_5_amount_ser_tax">
                <span class="discount" style="font-weight:700;color: #FFF; font-size:14px">[ Service Tax @ 14% ; Total  $<span id="tot_amount">0</span> ]</span>
                 </div>
                    </div>
                    <!------------------------------------->
                    <!-- second part of pricing modal   -->
                    <div class="col-md-11 col-sm-7" style="height:340px; background:#ffffff;border-bottom-left-radius:4px;width:90%; border-bottom-right-radius:4px;box-shadow: 1px 1px 9px rgba(0, 0, 0, 0.6); width:100%;">
                    <div class="pricing-list">
                   
    <ul style="padding: 0px; display: table; margin: 0px auto;">
    <li class="style-li pay_now_btn">
                       <div class="checkbox-style">
      <label class="style_label"><input type="checkbox" name="services[]" id="vr">
      Visual Resume $<span class="new_amt"> <?php echo $row[4]->visual;?></span></label>
    </div></li>
                       
    <li class="style-li pay_now_btn"><div class="checkbox-style">
      <label class="style_label"><input style="padding-right:5px;" type="checkbox" name="services[]" id="cl"> 
      Cover Letter $<span class="new_amt"> <?php echo $row[4]->cl_new;?> </span></label>
    </div></li>
    <li class="style-li pay_now_btn"><div class="checkbox-style">
      <label class="style_label"><input style="padding-right:5px;" type="checkbox" name="services[]" id="li"> 
      LinkedIn Update $ <span class="new_amt"> <?php echo $row[4]->li_new;?> </span></label>
    </div></li>
    <li class="style-li pay_now_btn"><div class="checkbox-style">
      <label class="style_label"><input style="padding-right:5px;" type="checkbox" name="services[]" id="rb"> 
    Resume Broadcast $ <span class="new_amt"> <?php echo $row[4]->rbr_new;?> </span></label>
    </div></li>
    <li class="style-li pay_now_btn"><div class="checkbox-style">
      <label class="style_label"><input style="padding-right:5px;" type="checkbox" name="services[]" id="sl"> 
      Secure Link $ <span class="new_amt"><?php echo $row[4]->sec_link_new;?></span> </label>
    </div></li>
    <li class="style-li pay_now_btn">
                       <div class="checkbox-style">
      <label class="style_label"><input type="checkbox" name="services[]" id="ed">
        Express Delivery $ <span class="new_amt"> <?php echo $row[4]->express_delivery;?><span style="color:#F00"> * </span></span></label>
    </div></li>
                    </ul>    
                                      
                    </div>
                    <div class="form-field align-btn " style="width:100%; height:22%;">
                    <button type="button" class="btn btn-default" style="width:100%; background:#F08308  none repeat scroll 0% 0%; color:#ffffff; height:100%; border:1px solid #FFF; font-size:2em" onClick="get_form()" id="c_level_btn"><span class="pay_now">Order Now</span></button>
                    
                    </div>
                    </div>
                    <!------------------------------------>
                    </div> 
                    </div>
                        
                <div class="col-md-12">                
                    <div class="col-md-7" style="padding-left: 0px;">
                         
            <div class="panel-heading">
             <p class="h4" style="font-weight: 800; color: #0a7faa; font-size: 24px;">1 - 3 Years Resume Writing</p>
                <hr />
            </div>
            
            <div>
            	<?php echo $content[5]->individual_service;?>
           </div>
    
        
                    </div>
                    <div class="col-md-5 col-sm-12" align="center" style="padding:0px; margin:0px;">
                    <!-- first part of pricing modal-->
                    <div class="col-md-11 col-sm-8" style="height:150px; background:#34495e; border-top-left-radius:4px; width:90%; border-top-right-radius:4px;box-shadow: 1px 1px 9px rgba(0, 0, 0, 0.6);box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.6); 
        text-shadow: 3px 2px 5px #050505; width:100%;">
                    
                    <p class = "weight6" align="center">1 - 3 Years Text Resume</p>
                    <div style="height:70px;">
                        <span class="currency">$</span>
                        <span class="amount" id="1_3_amount_ser">0</span>
                    </div>
                   <div id="1_3_amount_ser_tax">
                <span class="discount" style="font-weight:700;color: #FFF; font-size:14px">[ Service Tax @ 14% ; Total  $<span id="tot_amount">0</span> ]</span>
                 </div>
                    </div>
                    <!------------------------------------->
                    <!-- second part of pricing modal   -->
                    <div class="col-md-11 col-sm-7" style="height:340px; background:#ffffff;border-bottom-left-radius:4px;width:90%; border-bottom-right-radius:4px;box-shadow: 1px 1px 9px rgba(0, 0, 0, 0.6); width:100%;">
                    <div class="pricing-list">
                   
    <ul style="padding: 0px; display: table; margin: 0px auto;">
    <li class="style-li pay_now_btn">
                       <div class="checkbox-style">
      <label class="style_label"><input type="checkbox" name="services[]" id="vr">
      Visual Resume $<span class="new_amt"> <?php echo $row[5]->visual;?></span></label>
    </div></li>
                       
    <li class="style-li pay_now_btn"><div class="checkbox-style">
      <label class="style_label"><input style="padding-right:5px;" type="checkbox" name="services[]" id="cl"> 
      Cover Letter $<span class="new_amt"> <?php echo $row[5]->cl_new;?> </span></label>
    </div></li>
    <li class="style-li pay_now_btn"><div class="checkbox-style">
      <label class="style_label"><input style="padding-right:5px;" type="checkbox" name="services[]" id="li"> 
      LinkedIn Update $ <span class="new_amt"> <?php echo $row[5]->li_new;?> </span></label>
    </div></li>
    <li class="style-li pay_now_btn"><div class="checkbox-style">
      <label class="style_label"><input style="padding-right:5px;" type="checkbox" name="services[]" id="rb"> 
    Resume Broadcast $ <span class="new_amt"> <?php echo $row[5]->rbr_new;?> </span></label>
    </div></li>
    <li class="style-li pay_now_btn"><div class="checkbox-style">
      <label class="style_label"><input style="padding-right:5px;" type="checkbox" name="services[]" id="sl"> 
      Secure Link $ <span class="new_amt"><?php echo $row[5]->sec_link_new;?></span> </label>
    </div></li>
    <li class="style-li pay_now_btn">
                       <div class="checkbox-style">
      <label class="style_label"><input type="checkbox" name="services[]" id="ed">
        Express Delivery $ <span class="new_amt"> <?php echo $row[5]->express_delivery;?><span style="color:#F00"> * </span></span></label>
    </div></li>
                    </ul>    
                                      
                    </div>
                    <div class="form-field align-btn " style="width:100%; height:22%;">
                    <button type="button" class="btn btn-default" style="width:100%; background:#F08308  none repeat scroll 0% 0%; color:#ffffff; height:100%; border:1px solid #FFF; font-size:2em" onClick="get_form()" id="c_level_btn"><span class="pay_now">Order Now</span></button>
                    
                    </div>
                    </div>
                    <!------------------------------------>
                    </div> 
                    </div> 
                    
                <div class="col-md-12">                
                    <div class="col-md-7" style="padding-left: 0px;">
                         
            <div class="panel-heading">


             <p class="h4" style="font-weight: 800; color: #0a7faa; font-size: 24px;">0 - 1 Years Resume Writing</p>
                <hr />
            </div>

            
            <div>
            <?php echo $content[6]->individual_service;?>
           </div>
        
                    </div>
                    <div class="col-md-5 col-sm-12" align="center" style="padding:0px; margin:0px;">
                    <!-- first part of pricing modal-->
                    <div class="col-md-11 col-sm-8" style="height:150px; background:#34495e; border-top-left-radius:4px; width:90%; border-top-right-radius:4px;box-shadow: 1px 1px 9px rgba(0, 0, 0, 0.6);box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.6); 
        text-shadow: 3px 2px 5px #050505; width:100%;">
                    
                    <p class = "weight6" align="center">0 - 1 Years Text Resume</p>
                    <div style="height:70px;">
                        <span class="currency">$</span>
                        <span class="amount" id="0_1_amount_ser">0</span>
                    </div>   
                        <div id="0_1_amount_ser_tax">
                <span class="discount" style="font-weight:700;color: #FFF; font-size:14px">[ Service Tax @ 14% ; Total  $<span id="tot_amount">0</span> ]</span>
                 </div>         
                    </div>
                    <!------------------------------------->
                    <!-- second part of pricing modal   -->
                    <div class="col-md-11 col-sm-7" style="height:340px; background:#ffffff;border-bottom-left-radius:4px;width:90%; border-bottom-right-radius:4px;box-shadow: 1px 1px 9px rgba(0, 0, 0, 0.6); width:100%;">
                    <div class="pricing-list">
                   
    <ul style="padding: 0px; display: table; margin: 0px auto;">
    <li class="style-li pay_now_btn">
                       <div class="checkbox-style">
      <label class="style_label"><input type="checkbox" name="services[]" id="vr">
      Visual Resume $<span class="new_amt"> <?php echo $row[6]->visual;?></span></label>
    </div></li>
                       
    <li class="style-li pay_now_btn"><div class="checkbox-style">
      <label class="style_label"><input style="padding-right:5px;" type="checkbox" name="services[]" id="cl"> 
      Cover Letter $<span class="new_amt"> <?php echo $row[6]->cl_new;?> </span></label>
    </div></li>
    <li class="style-li pay_now_btn"><div class="checkbox-style">
      <label class="style_label"><input style="padding-right:5px;" type="checkbox" name="services[]" id="li"> 
      LinkedIn Update $ <span class="new_amt"> <?php echo $row[6]->li_new;?> </span></label>
    </div></li>
    <li class="style-li pay_now_btn"><div class="checkbox-style">
      <label class="style_label"><input style="padding-right:5px;" type="checkbox" name="services[]" id="rb"> 
    Resume Broadcast $ <span class="new_amt"> <?php echo $row[6]->rbr_new;?> </span></label>
    </div></li>
    <li class="style-li pay_now_btn"><div class="checkbox-style">
      <label class="style_label"><input style="padding-right:5px;" type="checkbox" name="services[]" id="sl"> 
      Secure Link $ <span class="new_amt"><?php echo $row[6]->sec_link_new;?></span> </label>
    </div></li>
    <li class="style-li pay_now_btn">
                       <div class="checkbox-style">
      <label class="style_label"><input type="checkbox" name="services[]" id="ed">
        Express Delivery $ <span class="new_amt"> <?php echo $row[6]->express_delivery;?><span style="color:#F00"> * </span></span></label>
    </div></li>
                    </ul>    
                                      
                    </div>
                    <div class="form-field align-btn " style="width:100%; height:22%;">
                    <button type="button" class="btn btn-default" style="width:100%; background:#F08308  none repeat scroll 0% 0%; color:#ffffff; height:100%; border:1px solid #FFF; font-size:2em" onClick="get_form()" id="c_level_btn"><span class="pay_now">Order Now</span></button>
                    
                    </div>
                    </div>
                    
                    <!------------------------------------>
                    </div> 
                    </div> 
                         <span>
        <img src="<?php echo get_template_directory_uri();?>/images/mastercard-visa-logo-2-50-1px.png" alt="Pay securely using Visa, Master Card, American express and PayPal using our secure payment gateway"/>
        </span>
                <span style="color:#D20D12; font-size:12px; float:right; margin-right:130px;">* Resume Delivery within 48 hours</span> 
                </div>
                
                <p  style="color:#ffffff; display:"></p>
                
            </div>
            </div><!--col-md-8 end-->
            </div>
            
	</div> 
  </div>       

		<span id="ser_name" style="display:none">Resume Writing</span>
        <a data-toggle="modal" data-target="#myModal" id="popup" style="display:none">Open Modal</a> 
         <a data-toggle="modal" data-target="#myModal_spin" id="popup_spin" style="display:none">spin</a> 
        <a name="reg_form"></a>
  <?php get_template_part('reg_form_paypal'); $_POST = array();?>
   
  
     
   <!----------------------------------------------------------------------------->
   <!------------------------ Modal Dialog -------------------------------->
   
   		<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">       
        <h4 class="modal-title">Resume Builder</h4>
      </div>
      <div class="modal-body">
        <h3>Please Wait You Are being Redirected to Our Payment Gateway...</h3>
        <div class="panel-body">
        	<h3 style="color:#006">Please note final price includes Service Tax @ 14%</h3>
        </div>
        <div style="color:#C00; padding:20px 20px 20px 20px; ">Please Don't Refresh Page or Go Back</div>
           <div class="progress">
          <div class="progress-bar progress-bar-success progress-bar-striped active"
           role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:100%">
            
          </div>
        </div>
        
      </div>
      
    </div>

  </div>
</div>

<div id="myModal_spin" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">       
        <h4 class="modal-title">Resume Builder</h4>
      </div>
      <div class="modal-body" align="center">
       	<i class="fa fa-refresh fa-spin fa-3x fa-fw margin-bottom"></i>
        <p>Please Wait......</p>
      </div>
      
    </div>

  </div>
</div>

<script language="javascript">
<?php 
include_once TEMPLATEPATH."/custom_offers_usd.js";
?>
</script>



<script language="javascript">
jQuery(document).ready(function() {
        //Horizontal Tab
        
		var arr = document.getElementsByName("usd[]");
		
		for (i=0; i<arr.length; i++)
      	{											
			var $this = arr[i];
			$($this).prop("disabled", true);
			$($this).css("background","#841617");
		}
		
		
		var arr1 = document.getElementsByName("inr[]");
		for (i=0; i<arr1.length; i++)
      	{											
			var $this = arr1[i];
			$($this).on("click",function(){			
			window.location="http://resumebuilder.isourcecorp.com/resume-writing"; 				
			});
			
		}
				
		var sURLVariables = sPageURL.split('?');
		
		//alert(sURLVariables);	
		
		if(sURLVariables=="id=ser")
		{						
			
			$(function() {		
				$("#tab_li2").click();
				$("#tab1").removeClass("tab-pane active");
				$("#tab2").addClass("tab-pane active");
				$("#tab1").addClass("tab-pane");			
			});						
		}
		
		
		$("#tab_li1").on("click", function(){
			
			$("#vr_hidden").val("0");
			$("#ed_hidden").val("0");
			$("#cl_hidden").val("0");
			$("#li_hidden").val("0");

			$("#rb_hidden").val("0");
			$("#sl_hidden").val("0");		
			
			jQuery("#register").hide();
			$("#tab_li2").removeClass('active li-font-active');
			$("#tab_li2").addClass('li-font');
			$('#tab_li_a2').removeAttr('style');
			$("#tab_li_a2").css("color","#34495E");
			
			$("#tab_li_a1").css("border-radius","0px 0px 0px 0px");
			
			
			$("#ser_name").html("resume writing");
			//$("#tab_li1").css("border-radius","0px 0px 0px 0px");
			
			$("#tab_li_a1").css("border-top","5px solid #FEC329");
			
			$("#tab_li_a1").css("color","#5296da");
			
			//$("#tab_li2").css("border","2px solid #266B82");
			
			$("#tab_li_a1").css("font-weight","500");
			
			$("#tab_li_a1").css("box-shadow","-1px -5px 8px -2px rgba(0, 0, 0, 0.6)");
			
			$("#final_amount").val("<?php echo ($rb_flavour['rb_c'] + ($rb_flavour['rb_c']*0.14));?>");
			$("#ser_amt").val("<?php echo $rb_flavour['rb_c'];?>");
			$("#ser_type").val("resume writing");
			$("input[id='ed']").prop("disabled", false);
			$("#rb1").click();
			
	
			$('div input[type=checkbox]').attr('checked',false);			
			
			/*$('div').find(':checkbox[name^="text_resume"]').each(function () {
                    $(this).prop("checked",true);
					
                });*/
				
			$("#tab_li_a1").css("border-top-left-radius","5px");
			$("#tab_li_a1").css("border-top-right-radius","5px");
			
			$("#tab_li_a2").css("border-top-left-radius","5px");
			$("#tab_li_a2").css("border-top-right-radius","5px");
			
			$("#tab_li1").css("background","none");
			
			
			$('#txtr0').prop('checked', true);
						
		});
	
		$("#tab_li2").on("click", function(){	
		
		$("#vr_hidden").val("0");
			$("#ed_hidden").val("0");
			$("#cl_hidden").val("0");
			$("#li_hidden").val("0");
			$("#rb_hidden").val("0");
			$("#sl_hidden").val("0");		
									
			jQuery("#register").hide();
			$("#tab_li1").removeClass('active li-font-active');
			$("#tab_li1").addClass('li-font');
			$("#tab_li1").css("background","#FFF");
			
			$('#tab_li_a1').removeAttr('style');
			$("#ser_name").html("Individual Services");			 
			$("#tab_li_a1").css("border-radius","0px 0px 0px 0px");
			$("#tab_li_a1").css("color","#34495E");
			
			$("#tab_li_a2").css("border-radius","0px 0px 0px 0px");
			
			$("#tab_li_a2").css("border-top","5px solid #FEC329");
			
			$("#tab_li_a2").css("color","#5296da");
			
			$("#tab_li_a1").css("border-top-left-radius","5px");
			$("#tab_li_a1").css("border-top-right-radius","5px");
			
			$("#tab_li_a2").css("border-top-left-radius","5px");
			$("#tab_li_a2").css("border-top-right-radius","5px");
			$("#tab_li1").css("border-top-left-radius","5px");
			$("#tab_li1").css("border-top-right-radius","5px");
			
			$("#tab_li_a2").css("font-weight","500");
			
			$("#tab_li_a2").css("box-shadow","-1px -5px 8px -2px rgba(0, 0, 0, 0.6)");
			
			$("#final_amount").val('0');
			
			$("#final_amount").val("<?php echo ($rb_services['rb_c'] + ($rb_services['rb_c']*0.14));?>");
			$("#ser_amt").val("<?php echo $rb_services['rb_c'];?>");
			$("#ser_type").val("Individual Services");
			
			$("#ser1").click();
								
			$("input[id='ed']").prop("disabled", true);
			
			
						
		});
		$('div input[type=checkbox]').attr('checked',false);
		$('div input[type=checkbox]').prop('disabled',false);
		/*$('div').find(':checkbox[name^="text_resume"]').each(function () {
                    $(this).prop("checked",true);
					
                });
		*/
		
		$("ul.resp-tabs-list li").on('click',function(){ 
    
			//event.preventDefault();
			$("#vr_hidden").val("0");
			$("#ed_hidden").val("0");
			$("#cl_hidden").val("0");
			$("#li_hidden").val("0");
			$("#rb_hidden").val("0");
			$("#sl_hidden").val("0");								
			
			/*$("input[name='text_resume[]']").on('change', function() {
				$("input[name='text_resume[]']").not(this).prop('checked', false);  
			});*/
			$('div input[type=checkbox]').attr('checked',false);
			$('div input[type=checkbox]').prop('disabled',false);
						
			switch(this.id)
			{
				case 'rb1':
					$("#rb_flavour").val("C - Level");
					$("#ser_amt").val("<?php echo $rb_flavour['rb_c'];?>");
					$("#final_amount").val("<?php echo ($rb_flavour['rb_c']+($rb_flavour['rb_c']*0.14));?>");	
					$('#txtr0').prop('checked', true);											
					break;
					
				case 'rb2':
					$("#rb_flavour").val("12+ Years");
					$("#ser_amt").val("<?php echo $rb_flavour['rb_12'];?>");
					$("#final_amount").val("<?php echo ($rb_flavour['rb_12']+($rb_flavour['rb_12']*0.14));?>");
					$('#txtr1').prop('checked', true);	
					break;
					
				case 'rb3':
					$("#rb_flavour").val("8 - 12 Years");
					$("#ser_amt").val("<?php echo $rb_flavour['rb_8_12'];?>");
					$("#final_amount").val("<?php echo ($rb_flavour['rb_8_12']+($rb_flavour['rb_8_12']*0.14));?>");
					$('#txtr2').prop('checked', true);		
					break;
					
				case 'rb4':
					$("#rb_flavour").val("5 - 8 Years");
					$("#ser_amt").val("<?php echo $rb_flavour['rb_5_8'];?>");
					$("#final_amount").val("<?php echo ($rb_flavour['rb_5_8']+($rb_flavour['rb_5_8']*0.14));?>");
					$('#txtr3').prop('checked', true);		
					break;
					
				case 'rb5':
					$("#rb_flavour").val("3 - 5 Years");
					$("#ser_amt").val("<?php echo $rb_flavour['rb_3_5'];?>");
					$("#final_amount").val("<?php echo ($rb_flavour['rb_3_5']+($rb_flavour['rb_3_5']*0.14));?>");
					$('#txtr4').prop('checked', true);		
					break;
					
				case 'rb6':
					$("#rb_flavour").val("1 - 3 Years");
					$("#ser_amt").val("<?php echo $rb_flavour['rb_1_3'];?>");
					$("#final_amount").val("<?php echo ($rb_flavour['rb_1_3']+($rb_flavour['rb_1_3']*0.14));?>");
					$('#txtr5').prop('checked', true);		
					break;
					
				case 'rb7':
					$("#rb_flavour").val("0 - 1 Years");
					$("#ser_amt").val("<?php echo $rb_flavour['rb_0_1'];?>");
					$("#final_amount").val("<?php echo ($rb_flavour['rb_0_1']+($rb_flavour['rb_0_1']*0.14));?>");
					$('#txtr6').prop('checked', true);		
					break;
					
				
				
				
				case 'ser1':
					$("#rb_flavour").val("C - Level");
					$("#final_amount").val("<?php echo ($rb_services['rb_c']+($rb_services['rb_c']*0.14));?>");
					break;
					
				case 'ser2':
					$("#rb_flavour").val("12+ Years");
					$("#final_amount").val("<?php echo ($rb_services['rb_12']+($rb_services['rb_12']*0.14));?>");
					break;
					
				case 'ser3':
					$("#rb_flavour").val("8 - 12 Years");
					$("#final_amount").val("<?php echo ($rb_services['rb_8_12']+($rb_services['rb_8_12']*0.14));?>");
					break;					
					
				case 'ser4':
					$("#rb_flavour").val("5 - 8 Years");
					$("#final_amount").val("<?php echo ($rb_services['rb_5_8']+($rb_services['rb_5_8']*0.14));?>");
					break;
					
				case 'ser5':
					$("#rb_flavour").val("3 - 5 Years");
					$("#final_amount").val("<?php echo ($rb_services['rb_3_5']+($rb_services['rb_3_5']*0.14));?>");
					break;
					
				case 'ser6':
					$("#rb_flavour").val("1 - 3 Years");
					$("#final_amount").val("<?php echo ($rb_services['rb_1_3'] + ($rb_services['rb_1_3']*0.14));?>");
					break;
					
				case 'ser7':
					$("#rb_flavour").val("0 - 1 Years");
					$("#final_amount").val("<?php echo ($rb_services['rb_0_1'] + ($rb_services['rb_0_1']*0.14));?>");
					break;

			}
			
			
			/*$('div').find(':checkbox[name^="text_resume"]').each(function () {
                    $(this).prop("checked",true);
					
                });*/
	
			$("#c_level_amt").html("<?php echo $rb_flavour['rb_c'];?>");
			$("#12_amount").html("<?php echo $rb_flavour['rb_12'];?>");
			$("#8_12_amount").html("<?php echo $rb_flavour['rb_8_12'];?>");
			$("#5_8_amount").html("<?php echo $rb_flavour['rb_5_8'];?>");
			$("#3_5_amount").html("<?php echo $rb_flavour['rb_3_5'];?>");
			$("#1_3_amount").html("<?php echo $rb_flavour['rb_1_3'];?>");
			$("#0_1_amount").html("<?php echo $rb_flavour['rb_0_1'];?>");
			
			set_default_amt();
			//set_finalAmount(this.id);
		
		});
		
		$("div input[type=checkbox]").on('click',function(){ 					
			//alert("<?php echo $row[$n]->li_new;?>");			
			
			var val = $("#rb_flavour").val();	
			var ser_type = $("#ser_type").val();		
			var amt = '';
			var i = 0; 
						
			var row = new Array();
			row['visual']       = 0;
			row['cl_old']       = 0; 
			row['cl_new']       = 0;
			row['li_old']       = 0;
			row['li_new']       = 0; 
			row['rbr_new']      = 0; 
			row['rbr_old']      = 0;
			row['sec_link_new'] = 0;
			row['sec_link_old'] = 0;
			
			switch(val)
			{
				case 'C - Level':
						
						amt = 'c_level_amt';
						row['visual']       = <?php echo $row[0]->visual;?>;
						row['cl_old']       = <?php echo $row[0]->cl_old;?>;
						row['cl_new']       = <?php echo $row[0]->cl_new;?>;
						row['li_old']       = <?php echo $row[0]->li_old;?>;
						row['li_new']       = <?php echo $row[0]->li_new;?>; 
						row['rbr_new']      = <?php echo $row[0]->rbr_new;?>; 
						row['rbr_old']      = <?php echo $row[0]->rbr_old;?>;
						row['sec_link_new'] = <?php echo $row[0]->sec_link_new;?>;
						row['sec_link_old'] = <?php echo $row[0]->sec_link_old;?>;
						row['express_delivery'] = <?php echo $row[0]->express_delivery;?>;		
						row['text_resume_old'] = <?php echo $row[0]->rb_old;?>;	
						row['text_resume_new'] = <?php echo $row[0]->rb_new;?>;					
						break;
				case '12+ Years':
						amt = '12_amount';		
						row['visual']       = <?php echo $row[1]->visual;?>;
						row['cl_old']       = <?php echo $row[1]->cl_old;?>;
						row['cl_new']       = <?php echo $row[1]->cl_new;?>;
						row['li_old']       = <?php echo $row[1]->li_old;?>;
						row['li_new']       = <?php echo $row[1]->li_new;?>; 
						row['rbr_new']      = <?php echo $row[1]->rbr_new;?>; 
						row['rbr_old']      = <?php echo $row[1]->rbr_old;?>;
						row['sec_link_new'] = <?php echo $row[1]->sec_link_new;?>;
						row['sec_link_old'] = <?php echo $row[1]->sec_link_old;?>;
						row['express_delivery'] = <?php echo $row[1]->express_delivery;?>;	
						row['text_resume_old'] = <?php echo $row[1]->rb_old;?>;	
						row['text_resume_new'] = <?php echo $row[1]->rb_new;?>;									
						break;
				case '8 - 12 Years':
						amt = '8_12_amount';
						row['visual']       = <?php echo $row[2]->visual;?>;
						row['cl_old']       = <?php echo $row[2]->cl_old;?>;
						row['cl_new']       = <?php echo $row[2]->cl_new;?>;
						row['li_old']       = <?php echo $row[2]->li_old;?>;
						row['li_new']       = <?php echo $row[2]->li_new;?>; 
						row['rbr_new']      = <?php echo $row[2]->rbr_new;?>; 
						row['rbr_old']      = <?php echo $row[2]->rbr_old;?>;
						row['sec_link_new'] = <?php echo $row[2]->sec_link_new;?>;
						row['sec_link_old'] = <?php echo $row[2]->sec_link_old;?>;
						row['express_delivery'] = <?php echo $row[2]->express_delivery;?>;
						row['text_resume_old'] = <?php echo $row[2]->rb_old;?>;	
						row['text_resume_new'] = <?php echo $row[2]->rb_new;?>;
						i = 2;
						break;
				case '5 - 8 Years':
						amt = '5_8_amount';
						row['visual']       = <?php echo $row[3]->visual;?>;
						row['cl_old']       = <?php echo $row[3]->cl_old;?>;
						row['cl_new']       = <?php echo $row[3]->cl_new;?>;
						row['li_old']       = <?php echo $row[3]->li_old;?>;
						row['li_new']       = <?php echo $row[3]->li_new;?>; 
						row['rbr_new']      = <?php echo $row[3]->rbr_new;?>; 
						row['rbr_old']      = <?php echo $row[3]->rbr_old;?>;
						row['sec_link_new'] = <?php echo $row[3]->sec_link_new;?>;
						row['sec_link_old'] = <?php echo $row[3]->sec_link_old;?>;
						row['express_delivery'] = <?php echo $row[3]->express_delivery;?>;
						row['text_resume_old'] = <?php echo $row[3]->rb_old;?>;	
						row['text_resume_new'] = <?php echo $row[3]->rb_new;?>;
						i = 3;
						break;
				case '3 - 5 Years':
						amt = '3_5_amount';
						row['visual']       = <?php echo $row[4]->visual;?>;
						row['cl_old']       = <?php echo $row[4]->cl_old;?>;
						row['cl_new']       = <?php echo $row[4]->cl_new;?>;
						row['li_old']       = <?php echo $row[4]->li_old;?>;
						row['li_new']       = <?php echo $row[4]->li_new;?>; 
						row['rbr_new']      = <?php echo $row[4]->rbr_new;?>; 
						row['rbr_old']      = <?php echo $row[4]->rbr_old;?>;
						row['sec_link_new'] = <?php echo $row[4]->sec_link_new;?>;
						row['sec_link_old'] = <?php echo $row[4]->sec_link_old;?>;
						row['express_delivery'] = <?php echo $row[4]->express_delivery;?>;
						row['text_resume_old'] = <?php echo $row[4]->rb_old;?>;	
						row['text_resume_new'] = <?php echo $row[4]->rb_new;?>;

						i = 4;
						break;
				case '1 - 3 Years':
						amt = '1_3_amount';
						row['visual']       = <?php echo $row[5]->visual;?>;
						row['cl_old']       = <?php echo $row[5]->cl_old;?>;
						row['cl_new']       = <?php echo $row[5]->cl_new;?>;
						row['li_old']       = <?php echo $row[5]->li_old;?>;
						row['li_new']       = <?php echo $row[5]->li_new;?>; 
						row['rbr_new']      = <?php echo $row[5]->rbr_new;?>; 
						row['rbr_old']      = <?php echo $row[5]->rbr_old;?>;
						row['sec_link_new'] = <?php echo $row[5]->sec_link_new;?>;
						row['sec_link_old'] = <?php echo $row[5]->sec_link_old;?>;
						row['express_delivery'] = <?php echo $row[5]->express_delivery;?>;
						row['text_resume_old'] = <?php echo $row[5]->rb_old;?>;	
						row['text_resume_new'] = <?php echo $row[5]->rb_new;?>;
						i = 5;
						break;
				case '0 - 1 Years':
						amt = '0_1_amount';
						row['visual']       = <?php echo $row[6]->visual;?>;
						row['cl_old']       = <?php echo $row[6]->cl_old;?>;
						row['cl_new']       = <?php echo $row[6]->cl_new;?>;
						row['li_old']       = <?php echo $row[6]->li_old;?>;
						row['li_new']       = <?php echo $row[6]->li_new;?>; 
						row['rbr_new']      = <?php echo $row[6]->rbr_new;?>; 
						row['rbr_old']      = <?php echo $row[6]->rbr_old;?>;
						row['sec_link_new'] = <?php echo $row[6]->sec_link_new;?>;
						row['sec_link_old'] = <?php echo $row[6]->sec_link_old;?>;
						row['express_delivery'] = <?php echo $row[6]->express_delivery;?>;
						row['text_resume_old'] = <?php echo $row[6]->rb_old;?>;	
						row['text_resume_new'] = <?php echo $row[6]->rb_new;?>;
						i = 6;
						break;
			}
			//alert(row['visual']);
			//addAmount(this,this.value,'c_level_amt_ser',0,0,this.id);
			
			switch(this.id)
			{
				case 'vr':
					if(ser_type=="Individual Services")					
						addAmount(this,row['visual'],amt+"_ser",0,0,this.id);					
					else
						addAmount(this,row['visual'],amt,0,row['visual'],this.id);					
					break;
				case 'cl':
					if(ser_type=="Individual Services")					
						addAmount(this,row['cl_new'],amt+"_ser",0,0,this.id);					
					else
						addAmount(this,row['cl_old'],amt,(row['cl_new'] - row['cl_old']),row['cl_new'],this.id);
					break;
					//addAmount(this,this.value,'c_level_amt',400,950,this.id);
				case 'li':
					if(ser_type=="Individual Services")					
						addAmount(this,row['li_new'],amt+"_ser",0,0,this.id);					
					else
						addAmount(this,row['li_old'],amt,(row['li_new'] - row['li_old']),row['li_new'],this.id);
					break;
				case 'rb':
					if(ser_type=="Individual Services")					
						addAmount(this,row['rbr_new'],amt+"_ser",0,0,this.id);					
					else
						addAmount(this,row['rbr_old'],amt,(row['rbr_new'] - row['rbr_old']),row['rbr_new'],this.id);
					break;
				case 'sl':
					if(ser_type=="Individual Services")					
						addAmount(this,row['sec_link_new'],amt+"_ser",0,0,this.id);					
					else
						addAmount(this,row['sec_link_old'],amt,(row['sec_link_new'] - row['sec_link_old']),row['sec_link_new'],this.id);
					break;
				case 'ed':
					if(ser_type=="Individual Services")					
						addAmount(this,row['express_delivery'],amt+"_ser",0,0,this.id);					
					else
						addAmount(this,row['express_delivery'],amt,0,row['express_delivery'],this.id);	
						break;
				default:
						addAmount(this,row['text_resume_old'],amt,(row['text_resume_new'] - row['text_resume_old']),row['text_resume_new'],this.id);				
			}	
			
			/*$('div').find(':checkbox[name^="text_resume"]').each(function () {
                    $(this).prop("checked",true);
					
                });*/
		});					
});

function get_info(id)
{
	///alert("in");
	
	$("#vr_hidden").val("0");
	$("#ed_hidden").val("0");
	$("#cl_hidden").val("0");
	$("#li_hidden").val("0");
	$("#rb_hidden").val("0");
	$("#sl_hidden").val("0");
	
	
	$('div input[type=checkbox]').attr('checked',false);
	$('div input[type=checkbox]').prop('disabled',false);	
	/*$('div').find(':checkbox[name^="text_resume"]').each(function () {
                    $(this).prop("checked",true);
					
                });*/
	
	$("#c_level_amt").html("<?php echo $rb_flavour['rb_c'];?>");
	$("#12_amount").html("<?php echo $rb_flavour['rb_12'];?>");
	$("#8_12_amount").html("<?php echo $rb_flavour['rb_8_12'];?>");
	$("#5_8_amount").html("<?php echo $rb_flavour['rb_5_8'];?>");
	$("#3_5_amount").html("<?php echo $rb_flavour['rb_3_5'];?>");
	$("#1_3_amount").html("<?php echo $rb_flavour['rb_1_3'];?>");
	$("#0_1_amount").html("<?php echo $rb_flavour['rb_0_1'];?>");	
	
	$('div input[type=checkbox]').attr('checked',false);
	/*$('div').find(':checkbox[name^="text_resume"]').each(function () {
                    $(this).prop("checked",true);
					
                });
	*/
	$("#c_level_amt_ser").html("<?php echo $rb_services['rb_c'];?>");
	$("#12_amount_ser").html("<?php echo $rb_services['rb_12'];?>");
	$("#8_12_amount_ser").html("<?php echo $rb_services['rb_8_12'];?>");
	$("#5_8_amount_ser").html("<?php echo $rb_services['rb_5_8'];?>");
	$("#3_5_amount_ser").html("<?php echo $rb_services['rb_3_5'];?>");
	$("#1_3_amount_ser").html("<?php echo $rb_services['rb_1_3'];?>");
	$("#0_1_amount_ser").html("<?php echo $rb_services['rb_0_1'];?>");
	
	
	var ser_name = $("#ser_name").html();
	
	//alert("id : "+id+"\nser_name : "+ser_name);		
	if(ser_name == "Resume Writing")
	{		
		//alert("id : "+id+"\nser_name : "+ser_name);		
		if(id=='0')
		{
				//alert("in");
				$("#final_amount").val("<?php echo ($rb_flavour['rb_c'] + ($rb_flavour['rb_c']*0.14));?>");
				$("#rb_flavour").val("C - Level");
				$("#ser_type").val("resume writing");
				$("#ser_amt").val("<?php echo $rb_flavour['rb_c'];?>");
				$('#txtr0').prop('checked', true);
		}
		if(id=='1')	
		{			
				$("#final_amount").val("<?php echo ($rb_flavour['rb_12'] + ($rb_flavour['rb_12']*0.14));?>");
				$("#rb_flavour").val("12+ Years");
				$("#ser_type").val("resume writing");
				$("#ser_amt").val("<?php echo $rb_flavour['rb_12'];?>");
				$('#txtr1').prop('checked', true);
		}
		if(id=='2')	
		{					
				$("#final_amount").val("<?php echo ($rb_flavour['rb_8_12'] + ($rb_flavour['rb_8_12']*0.14));?>");
				$("#rb_flavour").val("8 - 12 Years");
				$("#ser_type").val("resume writing");
				$("#ser_amt").val("<?php echo $rb_flavour['rb_8_12'];?>");
				$('#txtr2').prop('checked', true);
		}
		if(id=='3')
		{
				$("#final_amount").val("<?php echo ($rb_flavour['rb_5_8'] + ($rb_flavour['rb_5_8']*0.14));?>");
				$("#rb_flavour").val("5 - 8 Years");
				$("#ser_type").val("resume writing");
				$("#ser_amt").val("<?php echo $rb_flavour['rb_5_8'];?>");
				$('#txtr3').prop('checked', true);
		}
		if(id=='4')		
		{
				$("#final_amount").val("<?php echo ($rb_flavour['rb_3_5'] + ($rb_flavour['rb_3_5']*0.14));?>");
				$("#rb_flavour").val("3 - 5 Years");
				$("#ser_type").val("resume writing");
				$("#ser_amt").val("<?php echo $rb_flavour['rb_3_5'];?>");
				$('#txtr4').prop('checked', true);
		}
		if(id=='5')	
		{
				$("#final_amount").val("<?php echo ($rb_flavour['rb_1_3'] + ($rb_flavour['rb_1_3']*0.14));?>");
				$("#rb_flavour").val("1 - 3 Years");
				$("#ser_type").val("resume writing");
				$("#ser_amt").val("<?php echo $rb_flavour['rb_1_3'];?>");
				$('#txtr5').prop('checked', true);
		}
		if(id=='6')
		{
				$("#final_amount").val("<?php echo ($rb_flavour['rb_0_1'] + ($rb_flavour['rb_0_1']*0.14));?>");		
				$("#rb_flavour").val("0 - 1 Years");
				$("#ser_type").val("resume writing");
				$("#ser_amt").val("<?php echo $rb_flavour['rb_0_1'];?>");
				$('#txtr6').prop('checked', true);
		}
	}
	else
	{
	
		switch(id)
		{
			case '0':
				$("#final_amount").val("<?php echo ($rb_services['rb_c'] + ($rb_services['rb_c']*0.14));?>");
				$("#rb_flavour").val("C - Level");
				$("#ser_type").val("Individual Services");
				$("#ser_amt").val("<?php echo $rb_services['rb_c'];?>");
				break;
			case '1':				
				$("#final_amount").val("<?php echo ($rb_services['rb_12'] + ($rb_services['rb_12']*0.14));?>");
				$("#rb_flavour").val("12+ Years");
				$("#ser_type").val("Individual Services");
				$("#ser_amt").val("<?php echo $rb_services['rb_12'];?>");
				break;
			case '2':			
				$("#final_amount").val("<?php echo ($rb_services['rb_8_12'] + ($rb_services['rb_8_12']*0.14));?>");
				$("#rb_flavour").val("8 - 12 Years");
				$("#ser_type").val("Individual Services");
				$("#ser_amt").val("<?php echo $rb_services['rb_8_12'];?>");
				break;
			case '3':
				$("#final_amount").val("<?php echo ($rb_services['rb_5_8'] + ($rb_services['rb_5_8']*0.14));?>");
				$("#rb_flavour").val("5 - 8 Years");
				$("#ser_type").val("Individual Services");
				$("#ser_amt").val("<?php echo $rb_services['rb_5_8'];?>");
				break;
			case '4':
				$("#final_amount").val("<?php echo ($rb_services['rb_3_5'] + ($rb_services['rb_3_5']*0.14));?>");
				$("#rb_flavour").val("3 - 5 Years");
				$("#ser_type").val("Individual Services");
				$("#ser_amt").val("<?php echo $rb_services['rb_3_5'];?>");
				break;
			case '5':	
				$("#final_amount").val("<?php echo ($rb_services['rb_1_3'] + ($rb_services['rb_1_3']*0.14));?>");
				$("#rb_flavour").val("1 - 3 Years");
				$("#ser_type").val("Individual Services");
				$("#ser_amt").val("<?php echo $rb_services['rb_1_3'];?>");
				break;
			case '6':
				$("#final_amount").val("<?php echo ($rb_flavour['rb_0_1'] + ($rb_flavour['rb_0_1']*0.14));?>");
				$("#rb_flavour").val("0 - 1 Years");
				$("#ser_type").val("Individual Services");
				$("#ser_amt").val("<?php echo $rb_services['rb_0_1'];?>");
				break;
		}
	}
	
	set_default_amt();
	
}

	function set_default_amt()
{
		$("#c_level_amt_original").html("<?php echo $row[0]->rb_new;?>");
		$("#12_amount_original").html("<?php echo $row[1]->rb_new;?>");
		$("#8_12_amount_original").html("<?php echo $row[2]->rb_new;?>");
		$("#5_8_amount_original").html("<?php echo $row[3]->rb_new;?>");
		$("#3_5_amount_original").html("<?php echo $row[4]->rb_new;?>");
		$("#1_3_amount_original").html("<?php echo $row[5]->rb_new;?>");
		$("#0_1_amount_original").html("<?php echo $row[6]->rb_new;?>");
		
		$("#c_level_amt_tax").find("#tot_amount").html("<?php echo ($row[0]->rb_old+($row[0]->rb_old*0.14));?>");
		$("#12_amount_tax").find("#tot_amount").html("<?php echo ($row[1]->rb_old+($row[1]->rb_old*0.14));?>");
		$("#8_12_amount_tax").find("#tot_amount").html("<?php echo ($row[2]->rb_old+($row[2]->rb_old*0.14));?>");
		$("#5_8_amount_tax").find("#tot_amount").html("<?php echo ($row[3]->rb_old+($row[3]->rb_old*0.14));?>");
		$("#3_5_amount_tax").find("#tot_amount").html("<?php echo ($row[4]->rb_old+($row[4]->rb_old*0.14));?>");
		$("#1_3_amount_tax").find("#tot_amount").html("<?php echo ($row[5]->rb_old+($row[5]->rb_old*0.14));?>");
		$("#0_1_amount_tax").find("#tot_amount").html("<?php echo ($row[6]->rb_old+($row[6]->rb_old*0.14));?>");
		
		$("#c_level_amt_dis").html("<?php echo ($row[0]->rb_new - $row[0]->rb_old);?>");
		$("#12_amount_dis").html("<?php echo ($row[1]->rb_new - $row[1]->rb_old);?>");
		$("#8_12_amount_dis").html("<?php echo ($row[2]->rb_new - $row[2]->rb_old);?>");
		$("#5_8_amount_dis").html("<?php echo ($row[3]->rb_new - $row[3]->rb_old);?>");
		$("#3_5_amount_dis").html("<?php echo ($row[4]->rb_new - $row[4]->rb_old);?>");
		$("#1_3_amount_dis").html("<?php echo ($row[5]->rb_new - $row[5]->rb_old);?>");
		$("#0_1_amount_dis").html("<?php echo ($row[6]->rb_new - $row[6]->rb_old);?>");
		
		$("#c_level_amt_ser_tax").find("#tot_amount").html(0);
		$("#12_amount_ser_tax").find("#tot_amount").html(0);
		$("#8_12_amount_ser_tax").find("#tot_amount").html(0);
		$("#5_8_amount_ser_tax").find("#tot_amount").html(0);
		$("#3_5_amount_ser_tax").find("#tot_amount").html(0);
		$("#1_3_amount_ser_tax").find("#tot_amount").html(0);
		$("#0_1_amount_ser_tax").find("#tot_amount").html(0);
}
	
</script>

<script language="javascript">

jQuery(document).ready(function() {
        //Horizontal Tab
        jQuery('#parentVerticalTab1').easyResponsiveTabs({
			
            type: 'vertical', //Types: default, vertical, accordion
            width: 'auto', //auto or any width like 600px
            fit: true, // 100% fit in a container
            tabidentify: 'hor_1', // The tab groups identifier
            activate: function(event) { // Callback function if tab is switched
                var $tab = $(this);
                var $info = $('#nested-tabInfo');
                var $name = $('span', $info);
                $name.text($tab.text());
                $info.show();
            }
        });
		
});


	

</script>