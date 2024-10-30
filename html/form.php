<?php
global $wpdb, $grtr;
$ops = get_option('cf_24_settings', array());
?>
<script>
	jQuery(document).ready(function() {
	    jQuery(".cf_clickme").click(function () {
         jQuery(".cf_wrapper").toggle("fast");
		 jQuery(this).toggleClass("cf_active");
        });

		jQuery("#form1").validationEngine({
			ajaxSubmit: true,
			ajaxSubmitFile: cf_url + '/Submit.php',
			ajaxSubmitMessage: "Thank you! We will answer to your letter!",
			success :  false,
			failure : function() {}
			})
		});
</script>
<style>


.cf_wrapper { 
   position: absolute;
   display: none;
   width:395px;
   height: auto;   
   padding:15px;  
   top: <?php print  @$ops['form_top_inset']; ?>px;
   left: <?php print  @$ops['form_left_inset']; ?>px;
   color:#<?php print  @$ops['color_tex_form']; ?>;
   background-color:#<?php print  @$ops['color_form']; ?>;
   filter: alpha(opacity=85);
   opacity: .85;
   border: solid 1px #<?php print  @$ops['color_form']; ?>;
   border-radius: 12px;
   -webkit-border-radius: 12px 12px 12px 12px;
   z-index:9999;
   }

.cf_wrapper input, textarea { 
    color:#<?php print  @$ops['color_text_input']; ?>;
	padding: 8px;
	margin-top:15px;
	border: solid 1px #<?php print  @$ops['color_form']; ?>;
	font: normal 12px Verdana, Tahoma, sans-serif;
	background:#e2e2e2;
	background: -webkit-gradient(linear, left top, left 25, from(#<?php print  @$ops['color_input_from']; ?>), to(#<?php print  @$ops['color_input_to']; ?>));
	background: -moz-linear-gradient(top, #FFFFFF, #<?php print  @$ops['color_input_from']; ?> 1px, #<?php print  @$ops['color_input_to']; ?> 25px);
	width: 200px;
	height:15px;	
	
	}

.cf_wrapper textarea { 

	height: 150px;
	width: 377px !important;
	max-width: 380px;
	}

.cf_wrapper .submit input {
	margin-top:15px;
    width:395px;
	height:50px;
    color:#<?php print  @$ops['color_tex_submit']; ?>;
	font-size: 16px;
	font-weight: 700;
  	border-radius: 5px;
	-webkit-border-radius: 5px;
	cursor:pointer; 
    }
	
.cf_wrapper .form label { 
	margin-left: 12px; 
	}
	
.cf_wrapper .form p { 
    background:#<?php print  @$ops['color_form']; ?>;

	}	

a.cf_clickme{
position: absolute;
text-decoration: none;
top: <?php print  @$ops['tab_top_inset']; ?>px; left: 0;
font-size: 16px;
letter-spacing:-1px;
font-family: verdana, helvetica, arial, sans-serif;
color:#<?php print  @$ops['color_tex_tab']; ?>;
padding: 5px 40px 5px 5px;
font-weight: 700;
background:#<?php print $ops['color_tab']; ?> url(<?php echo CF_PLUGIN_URL;?>/img/plus.png) 85% 55% no-repeat;
border:1px solid #<?php print  @$ops['color_form']; ?>;
border-radius: 0 20px 20px 0;
-webkit-border-top-right-radius: 20px;
-webkit-border-bottom-right-radius: 20px;
display: block;
z-index:10000;

}

a.cf_clickme:hover{
position: absolute;
text-decoration: none;
top: <?php print  @$ops['tab_top_inset']; ?>px; left: 0;
font-size: 16px;
letter-spacing:-1px;
font-family: verdana, helvetica, arial, sans-serif;
color:#<?php print  @$ops['color_tex_tab']; ?>;
padding: 5px 40px 5px 8px;
font-weight: 700;
background:#<?php print  @$ops['color_tab']; ?> url(<?php echo CF_PLUGIN_URL;?>/img/plus.png) 85% 55% no-repeat;
border:1px solid #<?php print  @$ops['color_form']; ?>;
border-radius: 0 20px 20px 0;
-webkit-border-top-right-radius: 20px;
-webkit-border-bottom-right-radius: 20px;
display: block;
z-index:10000;

}

a.cf_active.cf_clickme{
background:#<?php print  @$ops['color_tab']; ?> url(<?php echo CF_PLUGIN_URL;?>/img/minus.png) 85% 55% no-repeat;
z-index:10000;
}

</style>


<a class="cf_clickme" href="#">Contact</a>

<div class="cf_wrapper">
    <form class="form" id="form1">
      <p>
        <input name="name" type="text" class="validate[required,custom[onlyLetter],length[0,100]] text-input" id="name" value="My Name" />
        <label for="name">Name</label>
      </p>
      <p>
        <input name="email" type="text" class="validate[required,custom[cf_email]] text-input" id="cf_email" value="email@email.com" />
        <label for="email">E-mail</label>
      </p>
      <p>
        <input type="text" name="web" id="web" />
        <label for="web">Website</label>
      </p>
      <p>
        <textarea name="text" class="validate[required,length[6,300]] text-input" id="cf_comment">Your message...</textarea>
      </p>
	  <input type="hidden" name="your_email" value="<?php print  @$ops['your_email'];?>" />
      <p  class="submit">
        <input  type="submit" value="              Send               ">
      </p>
    </form>
</div>






