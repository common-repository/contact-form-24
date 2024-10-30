<?php
global $wpdb, $grtr;
$ops = get_option('cf_24_settings', array());
?>
<div class="wrap">
	<h2><?php _e('Contact Form 24 Settings'); ?></h2>
	<form action="" method="post">
		<input type="hidden" name="task" value="save_cf_24_settings" />
		<table>
		<br/>
		<tr>
			<td><?php _e('Your E-mail'); ?></td>
			<td><input type="text" name="settings[your_email]" value="<?php print  @$ops['your_email']; ?>" /></td>

		</tr>		
		<br/>
		<tr>
			<td><?php _e('Tab Top inset'); ?></td>
			<td><input type="text" name="settings[tab_top_inset]" value="<?php print  @$ops['tab_top_inset']; ?>" /></td>
		</tr>

		<tr>
			<td><?php _e('Form Top inset'); ?></td>
			<td><input type="text" name="settings[form_top_inset]" value="<?php print  @$ops['form_top_inset']; ?>" /></td>
		</tr>
		
		<tr>
			<td><?php _e('Form Left inset'); ?></td>
			<td><input type="text" name="settings[form_left_inset]" value="<?php print  @$ops['form_left_inset']; ?>" /></td>
		</tr>		

		</tr>
		<tr>
			<td><?php _e('Color Tab'); ?></td>
			<td><input type="text" name="settings[color_tab]" class="color {hash:false,caps:true}"  value="<?php print  @$ops['color_tab']; ?>" /></td>
		</tr>
		
		<tr>
			<td><?php _e('Color Form'); ?></td>
			<td><input type="text" name="settings[color_form]" class="color {hash:false,caps:true}"  value="<?php print  @$ops['color_form']; ?>" /></td>
		</tr>

		<tr>
			<td><?php _e('Color Input From'); ?></td>
			<td><input type="text" name="settings[color_input_from]" class="color {hash:false,caps:true}"  value="<?php print  @$ops['color_input_from']; ?>" /></td>
		</tr>

		<tr>
			<td><?php _e('Color Input To'); ?></td>
			<td><input type="text" name="settings[color_input_to]" class="color {hash:false,caps:true}"  value="<?php print  @$ops['color_input_to']; ?>" /></td>
		</tr>

		<tr>
			<td><?php _e('Color Text Form'); ?></td>
			<td><input type="text" name="settings[color_tex_form]" class="color {hash:false,caps:true}"  value="<?php print  @$ops['color_tex_form']; ?>" /></td>
		</tr>
		
		<tr>
			<td><?php _e('Color Text Tab'); ?></td>
			<td><input type="text" name="settings[color_tex_tab]" class="color {hash:false,caps:true}"  value="<?php print  @$ops['color_tex_tab']; ?>" /></td>
		</tr>	

		<tr>
			<td><?php _e('Color Text Submit'); ?></td>
			<td><input type="text" name="settings[color_tex_submit]" class="color {hash:false,caps:true}"  value="<?php print  @$ops['color_tex_submit']; ?>" /></td>
		</tr>
		
		<tr> 

		</table>
	<p><button type="submit" class="button-primary"><?php _e('Save Config'); ?></button></p>
	</form>
</div>
