<?php /* ~~~~~~~~~~~ Cookies ~~~~~~~~~~~ */

//Usage
//global $ter_cookie; $ter_cookie->print_form('test',30,'true','submit','/');

$ter_cookie = new TerCookie();
//$ter_cookie->delete_cookie('cta');

class TerCookie{
	private $_set_cookie_url;
	public function __construct(){ $this->_set_cookie_url = get_bloginfo('template_directory') . '/set-cookie.php';	}
	
	public function print_form($id,$days,$value,$submit,$redirect = '/'){?>
		<form id="<?php echo 'ter_cookie_form_' . $id ?>" action="<?php echo $this->_set_cookie_url ?>" enctype="multipart/form-data" method="get">
			<input type="hidden" name="id" value="<?php echo $id ?>">
			<input type="hidden" name="days" value="<?php echo $days ?>">
			<input type="hidden" name="value" value="<?php echo $value ?>">
			<input type="submit" name="submit" value="<?php echo $submit ?>">
			<input type="hidden" name="redirect" value="<?php echo $redirect ?>">
		</form>
		<?php
	}
	
	public function get_set_cookie_url(){ return $this->_set_cookie_url; }	
	public function get_cookie($id){ $exploded_cookie = explode(',',$_COOKIE['ter_cookie_' . $id]);	return $exploded_cookie; }	
	public function delete_cookie($id){ unset($_COOKIE['ter_cookie_' . $id]); setcookie('ter_cookie_' . $id,'',time() -3600,'/' ); }
}
?>