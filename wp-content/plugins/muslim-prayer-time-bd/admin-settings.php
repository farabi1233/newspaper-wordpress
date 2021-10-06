<?php
/**
 * Adding a submenu page in Settings menu for prayer timetable plugin.
 *
 * @uses  add_options_page() - Add sub menu page to the Settings menu.
 *
 * @uses  register_setting() - Register a setting and its data.
 *
 * Muslim Prayer Time BD - v2.3 - 5th April, 2021
 * by @realwebcare - https://www.realwebcare.com/
 */
add_action('admin_menu', 'register_mptb_menu_page');
function register_mptb_menu_page() {
	add_options_page('Muslim Prayer Time BD', __('Prayer Settings', 'mptb'), 'manage_options', __FILE__, 'mptb_plugin_menu');
	add_action( 'admin_init', 'register_mptb_settings' );
}
function register_mptb_settings() {
	//register our settings
	register_setting( 'mptb-settings-group', 'mptb_option' );
	register_setting( 'mptb-settings-group', 'ampm_option' );
}
function mptb_plugin_menu() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
?>
	<div class="wrap">
		<h1><?php _e('Muslim Prayer Time BD Settings', 'mptb'); ?></h1>
		<hr>
		<div class="postbox-container prayer-time-settings">
			<form method="post" action="options.php"><?php
				settings_fields( 'mptb-settings-group' );
				$city_states = district_lists();
				$prayer_ln = get_option('prayer_ln') != '' ? get_option('prayer_ln') : 'bn'; ?>
				<div class="prayer-options">
					<label class="input-title"><?php _e('Select the Default District', 'mptb'); ?>:</label>
					<select name="default_city" id="default_city">
						<option value="" selected="selected"><?php
							if(isset($_POST['default_city'])) {
								echo $_POST['default_city'];
							} else {
								if($prayer_ln == 'bn') { echo 'ঢাকা'; }
								else { echo 'Dhaka'; }
							} ?>
						</option><?php
						foreach($city_states as $key => $city) { ?>
							<option value="<?php echo $key; ?>" <?php if(get_option('default_city') == $key) {echo "selected=selected";} ?>><?php echo $city; ?></option><?php
						} ?>
					</select>
				</div>
                <div class="prayer-options">
                    <label class="input-title"><?php _e('Adjust Prayer Time (+/-)', 'mptb'); ?>:</label>
                    <input type="number" name="adj_prayer_time" id="adj_prayer_time" value="<?php echo get_option('prayer_adjust'); ?>" min="-1440" max="1440" step="any" />
                </div>
                <div class="prayer-options">
                    <label class="input-title"><?php _e('Enter Prayer Name', 'mptb'); ?>:</label>
                    <span class="prayer_note">e.g. Fajr, Duhr, Asr, Maghrib, Isha, Sunrise</span>
                    <textarea name="prayer_names" id="prayer_names" cols="50" rows="2" placeholder="<?php _e('Enter Prayer Name', 'mptb'); ?>"><?php echo get_option('pr_names'); ?></textarea>
                </div>
                <div class="prayer-options">
                    <label class="input-title"><?php _e('Enter Period of Time Name', 'mptb'); ?>:</label>
                    <span class="prayer_note">e.g. Dawn, Noon, Afternoon, Evening, Night, Dawn</span>
                    <textarea name="period_times" id="period_times" cols="50" rows="2" placeholder="<?php _e('Enter Period of Time Name', 'mptb'); ?>"><?php echo get_option('pr_times'); ?></textarea>
                </div>
				<div class="prayer-options">
					<label class="input-title"><?php _e('Show Prayer Time in', 'mptb'); ?>:</label>
					<select name="prayer_time_ln" id="prayer_time_ln">
						<?php if(get_option('prayer_ln') == 'en') { ?>
						<option value="bn"><?php _e('Bangla', 'mptb'); ?></option>
						<option value="en" selected="selected"><?php _e('English', 'mptb'); ?></option>
						<?php } else { ?>
						<option value="bn" selected="selected"><?php _e('Bangla', 'mptb'); ?></option>
						<option value="en"><?php _e('English', 'mptb'); ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="prayer-options">
					<label class="input-title"><?php _e('Time Format', 'mptb'); ?>:</label>
					<select name="time_format" id="time_format">
						<?php if(get_option('time_fm') == '24') { ?>
						<option value="12"><?php _e('12 Hours', 'mptb'); ?></option>
						<option value="24" selected="selected"><?php _e('24 Hours', 'mptb'); ?></option>
						<?php } else { ?>
						<option value="12" selected="selected"><?php _e('12 Hours', 'mptb'); ?></option>
						<option value="24"><?php _e('24 Hours', 'mptb'); ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="prayer-options">
					<label class="input-check" id="am-pm"><?php _e('Display AM/PM', 'mptb'); ?>:</label>
					<label for="am-pm" class="enable_check">
						<span><?php //_e('Ramadan', 'mptb'); ?></span>
						<input type="checkbox" name="ampm_option" class="tickbox" id="ampm_option" value="Yes" <?php if(get_option('ampm_option')=="Yes") echo('checked="checked"'); ?>/>
					</label>
				</div>
				<div class="prayer-color">
					<label class="input-title"><?php _e('District List Box Color', 'mptb'); ?>:</label>
					<input type="text" name="district_bg_color" class="district_bg_color" id="district_bg_color" value="<?php echo get_option('dist_bg'); ?>" />
				</div>
				<div class="prayer-color">
					<label class="input-title"><?php _e('District List Font Color', 'mptb'); ?>:</label>
					<input type="text" name="district_font_color" class="district_font_color" id="district_bg_color" value="<?php echo get_option('dist_font'); ?>" />
				</div>
				<div class="prayer-color">
					<label class="input-title"><?php _e('Prayer Name Background Color', 'mptb'); ?>:</label>
					<input type="text" name="prayer_name_bg" class="prayer_name_bg" id="prayer_name_bg" value="<?php echo get_option('mptbg_one'); ?>" />
				</div>
				<div class="prayer-color">
					<label class="input-title"><?php _e('Prayer Name Font Color', 'mptb'); ?>:</label>
					<input type="text" name="prayer_name_font" class="prayer_name_font" id="prayer_name_font" value="<?php echo get_option('prayer_name'); ?>" />
				</div>
				<div class="prayer-options">
					<label class="input-title"><?php _e('Prayer Name Font Weight', 'mptb'); ?>:</label>
					<select name="prayer_name_weight" id="prayer_name_weight">
						<?php if(get_option('pname_weight') == 'normal') { ?>
						<option value="bold"><?php _e('Bold', 'mptb'); ?></option>
						<option value="normal" selected="selected"><?php _e('Normal', 'mptb'); ?></option>
						<?php } else { ?>
						<option value="bold" selected="selected"><?php _e('Bold', 'mptb'); ?></option>
						<option value="normal"><?php _e('Normal', 'mptb'); ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="prayer-options">
					<label class="input-title"><?php _e('Prayer Name Text Align', 'mptb'); ?>:</label>
					<select name="prayer_name_align" id="prayer_name_align">
						<?php if(get_option('pname_align') == 'left') { ?>
						<option value="left" selected="selected"><?php _e('Left', 'mptb'); ?></option>
						<option value="right"><?php _e('Right', 'mptb'); ?></option>
						<option value="center"><?php _e('Center', 'mptb'); ?></option>
						<?php } elseif(get_option('pname_align') == 'right') { ?>
						<option value="left"><?php _e('Left', 'mptb'); ?></option>
						<option value="right" selected="selected"><?php _e('Right', 'mptb'); ?></option>
						<option value="center"><?php _e('Center', 'mptb'); ?></option>
						<?php } else { ?>
						<option value="left"><?php _e('Left', 'mptb'); ?></option>
						<option value="right"><?php _e('Right', 'mptb'); ?></option>
						<option value="center" selected="selected"><?php _e('Center', 'mptb'); ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="prayer-color">
					<label class="input-title"><?php _e('Prayer Time Background Color', 'mptb'); ?>:</label>
					<input type="text" name="prayer_time_bg" class="prayer_time_bg" id="prayer_time_bg" value="<?php echo get_option('mptbg_two'); ?>" />
				</div>
				<div class="prayer-color">
					<label class="input-title"><?php _e('Prayer Time Font Color', 'mptb'); ?>:</label>
					<input type="text" name="prayer_time_font" class="prayer_time_font" id="prayer_time_font" value="<?php echo get_option('prayer_time'); ?>" />
				</div>
				<div class="prayer-options">
					<label class="input-title"><?php _e('Prayer Time Font Weight', 'mptb'); ?>:</label>
					<select name="prayer_time_weight" id="prayer_time_weight">
						<?php if(get_option('ptime_weight') == 'bold') { ?>
						<option value="normal"><?php _e('Normal', 'mptb'); ?></option>
						<option value="bold" selected="selected"><?php _e('Bold', 'mptb'); ?></option>
						<?php } else { ?>
						<option value="normal" selected="selected"><?php _e('Normal', 'mptb'); ?></option>
						<option value="bold"><?php _e('Bold', 'mptb'); ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="prayer-options">
					<label class="input-title"><?php _e('Prayer Time Text Align', 'mptb'); ?>:</label>
					<select name="prayer_time_align" id="prayer_time_align">
						<?php if(get_option('ptime_align') == 'left') { ?>
						<option value="left" selected="selected"><?php _e('Left', 'mptb'); ?></option>
						<option value="right"><?php _e('Right', 'mptb'); ?></option>
						<option value="center"><?php _e('Center', 'mptb'); ?></option>
						<?php } elseif(get_option('ptime_align') == 'right') { ?>
						<option value="left"><?php _e('Left', 'mptb'); ?></option>
						<option value="right" selected="selected"><?php _e('Right', 'mptb'); ?></option>
						<option value="center"><?php _e('Center', 'mptb'); ?></option>
						<?php } else { ?>
						<option value="left"><?php _e('Left', 'mptb'); ?></option>
						<option value="right"><?php _e('Right', 'mptb'); ?></option>
						<option value="center" selected="selected"><?php _e('Center', 'mptb'); ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="prayer-options">
					<label class="input-check" id="enable-sehri"><?php _e('Enable to Show Sehri &amp; Iftar Time', 'mptb'); ?>:</label>
					<label for="enable-sehri" class="enable_check">
						<span><?php _e('Ramadan', 'mptb'); ?></span>
						<input type="checkbox" name="mptb_option" class="tickbox" id="mptb_option" value="Enabled" <?php if(get_option('mptb_option')=="Enabled") echo('checked="checked"'); ?>/>
					</label>
				</div>
				<div id="sehri_enable">
					<div class="prayer-options">
						<label class="input-title"><?php _e('Adjust Sehri Time (+/-)', 'mptb'); ?>:</label>
						<input type="number" name="adj_sehri_time" id="adj_sehri_time" value="<?php echo get_option('sehri_adjust'); ?>" min="-1440" max="1440" step="any" />
					</div>
					<div class="prayer-options">
						<label class="input-title"><?php _e('Sehri Card Title', 'mptb'); ?>:</label>
						<input type="text" name="sehri_title" id="sehri_title" value="<?php echo get_option('sehri_title'); ?>" size="40" />
					</div>
					<div class="prayer-options">
						<label class="input-title"><?php _e('Iftar Card Title', 'mptb'); ?>:</label>
						<input type="text" name="iftar_title" id="iftar_title" value="<?php echo get_option('iftar_title'); ?>" size="40" />
					</div>
					<div class="prayer-color">
						<label class="input-title"><?php _e('Sehri Time Background Color', 'mptb'); ?>:</label>
						<input type="text" name="sehri_time_bg" class="sehri_time_bg" id="sehri_time_bg" value="<?php echo get_option('sehri_bg'); ?>" />
					</div>
					<div class="prayer-color">
						<label class="input-title"><?php _e('Iftar Time Background Color', 'mptb'); ?>:</label>
						<input type="text" name="iftar_time_bg" class="iftar_time_bg" id="iftar_time_bg" value="<?php echo get_option('iftar_bg'); ?>" />
					</div>
					<div class="prayer-color">
						<label class="input-title"><?php _e('Sehri &amp; Iftar Font Color', 'mptb'); ?>:</label>
						<input type="text" name="sehri_time_font" class="sehri_time_font" id="sehri_time_font" value="<?php echo get_option('sehri_font'); ?>" />
					</div>
					<div class="prayer-options">
						<label class="input-title"><?php _e('Sehri &amp; Iftar Font Weight', 'mptb'); ?>:</label>
						<select name="sehri_time_weight" id="sehri_time_weight">
							<?php if(get_option('sehri_weight') == 'bold') { ?>
							<option value="normal"><?php _e('Normal', 'mptb'); ?></option>
							<option value="bold" selected="selected"><?php _e('Bold', 'mptb'); ?></option>
							<?php } else { ?>
							<option value="normal" selected="selected"><?php _e('Normal', 'mptb'); ?></option>
							<option value="bold"><?php _e('Bold', 'mptb'); ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="prayer-options">
						<label class="input-title"><?php _e('Sehri &amp; Iftar Text Align', 'mptb'); ?>:</label>
						<select name="sehri_time_align" id="sehri_time_align">
							<?php if(get_option('sehri_align') == 'left') { ?>
							<option value="left" selected="selected"><?php _e('Left', 'mptb'); ?></option>
							<option value="right"><?php _e('Right', 'mptb'); ?></option>
							<option value="center"><?php _e('Center', 'mptb'); ?></option>
							<?php } elseif(get_option('sehri_align') == 'right') { ?>
							<option value="left"><?php _e('Left', 'mptb'); ?></option>
							<option value="right" selected="selected"><?php _e('Right', 'mptb'); ?></option>
							<option value="center"><?php _e('Center', 'mptb'); ?></option>
							<?php } else { ?>
							<option value="left"><?php _e('Left', 'mptb'); ?></option>
							<option value="right"><?php _e('Right', 'mptb'); ?></option>
							<option value="center" selected="selected"><?php _e('Center', 'mptb'); ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				<?php submit_button(); ?>
                <input type="submit" class="button button-secondary right" name="clear_all" id="clear_all" value="Reset">
			</form>
		</div>
		<div class="postbox-container" style="width:30%;">
			<div class="card">
				<h2 class="mpt-title"><?php _e('Prayer Time Using Widget', 'mptb'); ?></h2>
				<p>
					<?php _e('You can display the prayer time and/or sehri time using the WordPress widget in your sidebar.', 'mptb'); ?><br/>
					<?php _e('&nbsp;', 'mptb'); ?><br/>
					<?php _e('Go to <strong>Appearance >> Widgets</strong>. Drag and drop the <strong>Muslim Prayer Time BD</strong> widget to the sidebar you want to display prayer time and/or sehri time.', 'mptb'); ?><br/>
					<?php _e('&nbsp;', 'mptb'); ?><br/>
					<?php _e('From the widget, you will have the option to show both Prayer and Sehri time, or you can display them individually.', 'mptb'); ?>
				</p>
			</div>
		</div>
		<div class="postbox-container" style="width:30%;">
			<div class="card">
				<h2 class="mpt-title"><?php _e('Prayer Time Using Shortcode', 'mptb'); ?></h2>
				<p>
					<?php _e('You can display the prayer time and/or sehri time using the WordPress SHORTCODE in your page or post.', 'mptb'); ?><br/>
					<?php _e('&nbsp;', 'mptb'); ?><br/>
					<?php _e('Copy &amp; paste the below shortcode into the posts/pages you want to show prayer time and/or sehri time.', 'mptb'); ?><br/>
                    <input type="text" class="t4bnt-shortcode" value="[prayer_time]" size="10"><br/>
					<?php _e('&nbsp;', 'mptb'); ?><br/>
					<?php _e('In the shortcode, you will have the option to show both Prayer and Sehri time, or you can display them individually. To do this follow the below procedure in the shortcode:', 'mptb'); ?>
                    <input type='text' class='t4bnt-shortcode' value='[prayer_time pt="on" sc="off"]' size="30"><br/>
					<?php _e('&nbsp;', 'mptb'); ?><br/>
					<?php _e('<strong>pt</strong> means Prayer Time and <strong>sc</strong> means Sehri card. Using <strong>ON/OFF</strong>, you can decide which to display and/or which not to display.', 'mptb'); ?>
				</p>
			</div>
		</div>
		<div class="postbox-container" style="width:30%;">
			<div class="card">
				<h2 class="mpt-title"><?php _e('Plugin Info', 'mptb'); ?></h2>
				<p>
					<?php _e('Version: 2.3', 'mptb'); ?><br/>
					<?php _e('Scripts: PHP + CSS + JS', 'mptb'); ?><br/>
					<?php _e('Requires: Wordpress 3.0', 'mptb'); ?>+<br/>
					<?php _e('First release: 23 January, 2014', 'mptb'); ?><br/>
					<?php _e('Last update: 5 April, 2021', 'mptb'); ?><br/>
					<?php _e('By', 'mptb'); ?>: <a href="https://www.realwebcare.com/" target="_blank"><?php _e('Realwebcare', 'mptb'); ?></a><br/>
					<?php _e('Author', 'mptb'); ?>: <a href="https://facebook.com/IKIAlam" target="_blank"><?php _e('Iftekhar', 'mptb'); ?></a><br/>
					<?php _e('Need Help', 'mptb'); ?>? <a href="https://wordpress.org/support/plugin/muslim-prayer-time-bd/" target="_blank">Support</a><br/>
                    <?php _e('Like it? Please leave us a', 'mptb'); ?> <a target="_blank" href="https://wordpress.org/support/plugin/muslim-prayer-time-bd/reviews/?filter=5/#new-post">&#9733;&#9733;&#9733;&#9733;&#9733;</a> <?php _e('rating. We highly appreciate your support!', 'mptb'); ?><br/>
					<?php _e('Published under', 'mptb'); ?>: <a href="http://www.gnu.org/licenses/gpl.txt"><?php _e('GNU General Public License', 'mptb'); ?></a>
				</p>
			</div>
		</div>
		<div class="postbox-container" style="width:30%;">
			<a href="https://www.realwebcare.com/" target="_blank"><div class="card rwc-ads"></div></a>
		</div>
	</div>
	<?php
}
$prayer_time_options = array( 'dist_bg' => 'district_bg_color', 'prayer_adjust' => 'adj_prayer_time', 'pr_names' => 'prayer_names', 'pr_times' => 'period_times', 'prayer_ln' => 'prayer_time_ln', 'time_fm' => 'time_format', 'dist_font' => 'district_font_color', 'sehri_weight' => 'sehri_time_weight', 'sehri_align' => 'sehri_time_align', 'sehri_adjust' => 'adj_sehri_time', 'sehri_title' => 'sehri_title', 'iftar_title' => 'iftar_title', 'sehri_bg' => 'sehri_time_bg', 'iftar_bg' => 'iftar_time_bg', 'sehri_font' => 'sehri_time_font', 'default_city' => 'default_city', 'mptbg_one' => 'prayer_name_bg', 'mptbg_two' => 'prayer_time_bg', 'prayer_name' => 'prayer_name_font', 'prayer_time' => 'prayer_time_font', 'pname_weight' => 'prayer_name_weight', 'ptime_weight' => 'prayer_time_weight', 'pname_align' => 'prayer_name_align', 'ptime_align' => 'prayer_time_align' );
foreach($prayer_time_options as $key => $option) {
	if( isset( $_POST[$option] ) ) {
		update_option( $key, sanitize_text_field( $_POST[$option] ) );
	}
}
if( isset( $_POST['clear_all'] ) ) { clear_muslim_prayer_time_bd($prayer_time_options); }

function clear_muslim_prayer_time_bd($prayer_options) {
	foreach($prayer_options as $option => $value) {
		delete_option($option);
	}
}
?>