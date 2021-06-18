<?php 

function add_theme_styles()
				{
					//For style
                    $version = wp_get_theme()->get('Version');
					wp_enqueue_style('masterstyle', get_template_directory_uri() . '/dist/styles/master.css', array(), $version, 'all');
                    wp_enqueue_style('menustyle', get_template_directory_uri() . '/dist/styles/stylemenu.css', array(), $version, 'all');
                    
                }
                add_action('wp_enqueue_scripts', 'add_theme_styles');
function add_theme_scripts()
{
    //For scripts
    wp_enqueue_script('jquery-validate',get_template_directory_uri() . '/dist/scripts/jquery.validate.min.js', array('jquery'), 1.1, true);
    wp_enqueue_script('customscript', get_template_directory_uri() . '/dist/scripts/main.js', array('jquery'), 1.1, true);
}

add_action('wp_enqueue_scripts', 'add_theme_scripts');
add_action('wp_ajax_nopriv_addresslookup', 'addresslookup_function');
add_action('wp_ajax_addresslookup', 'addresslookup_function');
function addresslookup_function(){
$url  = "https://registration-api.vanzelf.nl/api/address/lookup/";
$data = array(
		$_POST["postcode"],
		$_POST["housenumber"],
		$_POST["addition"],
	);
$query = implode("/", $data);
$url  .= $query;
$json = callAPI($url);
$result = json_decode($json);
if(json_last_error() === JSON_ERROR_NONE ){
	$base64 = base64_encode ( $json );
	$redirecturl = "https://aanmelden.vanzelf.nl/verbruik?o=".$base64;
	echo json_encode(array("status" => 1 , "redirecturl" => $redirecturl ));  							
}else{
	echo json_encode(array("status" => 0 , "message" => $json ));
}

exit();
}

function callAPI($url){
   
   $curl = curl_init();
   
   // OPTIONS:
   curl_setopt($curl, CURLOPT_URL, $url);
   curl_setopt($curl, CURLOPT_HTTPHEADER, array(
      'X-ClientKey: e693415a360cd35b328b782ac55450e1a5a6afa1',
      'Content-Type: application/json',
   ));
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
   // EXECUTE:
   $result = curl_exec($curl);
   if(!$result){die("Connection Failure");}
   curl_close($curl);
   return $result;

}

add_filter('get_the_date', function ($post_date) {
return date('d M', strtotime($post_date)).' . '.do_shortcode('[rt_reading_time label="Leestijd" postfix="min" postfix_singular="min]');
  });