<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$plugin_info = array(
	'pi_name' => 'EditEE',
	'pi_version' => '0.0.1',
	'pi_author' => 'Caleb Pierce',
	'pi_author_url' => 'http://ridgehkr.github.io/',
	'pi_description'=> 'A shortcut generator for editing a channel entry',
	'pi_usage' => EditEE::usage(),
);

/**
 * CampMinder API Plugin
 *
 * ExpressionEngine plugin for interfacing with the CampMinder API services
 * 
 * @package   CampMinder
 * @author    Caleb Pierce <caleb@insidenewcity.com>
 * @copyright Copyright (c) NewCity
 */
class EditEE {

	private $url_base;
	
	/**
	 * Plugin constructor. Instantiates the API class.
	 *
	 **/
	public function __construct() {

		// build base URL to control panel based on settings and session data
		$this->url_base = '/' . ee()->config->default_ini['cp_url'] . '?S=' . ee()->session->userdata['session_id'];

	} // construct()


	public function url() {

		$url = $this->url_base;
		$entry_id = ee()->TMPL->fetch_param('entry');

		$url .= '&amp;D=cp&amp;C=content_publish&amp;M=entry_form&amp;entry_id=' . $entry_id;

		return $url;

	}

	
	/**
	 * Usage instructions for the control panel details of the plugin
	 *
	 **/
	public static function usage() {

		ob_start();
?>
{exp:edit-ee:url}
Returns the URL to that entry's edit page.
<?php
		$buffer = ob_get_contents();
		ob_end_clean();
		return $buffer;

	} // usage()

} // class

/* End of file pi.campminder.php */
/* Location: /system/expressionengine/third_party/campminder/pi.campminder.php */ 
