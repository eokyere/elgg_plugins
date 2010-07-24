<?php
	/**
	 * Elgg Recaptcha plugin input/captcha view override.
	 * 
	 * @package Recaptcha
	 * @license www.apache.org/licenses/LICENSE-2.0.html Apache License, Version 2.0
	 * @author Emmanuel Okyere
	 * @copyright Emmanuel Okyere 2010
	 * @link http://www.hutspace.net/elgg/
	 */

	global $CONFIG;
	require_once($CONFIG->pluginspath . "recaptcha/lib/recaptchalib.php");

	$publickey = get_plugin_setting('publickey', 'recaptcha');
	$theme = 'clean'; //get_plugin_setting('theme', 'recaptcha'); // 'red, white, blackglass, clean'
	$customize_clean = true;	
	
	$widget_bg_color = '#97e2f6';
	$widget_border_color = '#72DCFA';
	$input_border_color = '#DFF5FF';
	$input_bg_color = '#FFFFFF';
	
?>

<script type="text/javascript">
var RecaptchaOptions = {
   theme : '<?php echo $theme; ?>'
};
</script>

<?php 
if ($customize_clean) {
	$out  = '<style type="text/css" media="screen">';
	$out .= '.recaptchatable .recaptcha_image_cell, #recaptcha_table {';
	$out .=	'  background-color: ' . $widget_bg_color . ' !important;'; //reCaptcha widget background color
	$out .= '} ';
	$out .= '#recaptcha_table {';
	$out .= '  border-color: ' . $widget_border_color . ' !important;'; //reCaptcha widget border color
	$out .= '} ';
	$out .= '#recaptcha_response_field {';
	$out .= '  border-color: ' . $input_border_color . ' !important;'; //Text input field border color
	$out .= '  background-color: ' . $input_bg_color . ' !important;'; //Text input field background color
	$out .= '} ';
	$out .= '</style> ';
	
	echo $out;
}
?>
<div id="recaptcha_div">
	<?php echo recaptcha_get_html($publickey, $error); ?>
</div>

	