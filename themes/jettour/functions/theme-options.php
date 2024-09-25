<?php
add_action('init','weaversweb_ftn_options');
if(!function_exists('weaversweb_ftn_options')){
	function weaversweb_ftn_options(){
		// If using image radio buttons,define a directory path
		$imagepath = get_stylesheet_directory_uri().'/images/'; 
		$options = array(
		/* ---------------------------------------------------------------------------- */
		/* Header Setting */
		/* ---------------------------------------------------------------------------- */
		array("name" => "Header Section",
			  "type" => "heading"),
			  
		array("name" => "Choose Header Logo",
			  "desc" => "Optimal size: 340px width by 60px height.",
			  "id"   => "driverite_header_logo",
			  "std"  => "",
			  "type" => "upload"),
		
		// array("name" => "Header Button Text",
		// 	  "desc" => "Enter Button Text",
		// 	  "id"   => "driverite_button_text",
		// 	  "std"  => "",
		// 	  "type" => "text"),

	    // array("name" => "Header Button Link",
		// 	  "desc" => "Enter Button Link",
		// 	  "id"   => "driverite_button_link",
		// 	  "std"  => "",
		// 	  "type" => "text"),

		// array("name" => "Header Mobile Number",
		// 	  "desc" => "Enter Header Section Mobile Number",
		// 	  "id"   => "driverite_header_mobile",
		// 	  "std"  => "",
		// 	  "type" => "text"),  
		/* ---------------------------------------------------------------------------- */
		/* Footer Setting */
		/* ---------------------------------------------------------------------------- */
		array("name" => "Footer Section",
			  "type" => "heading"),

		array("name" => "Choose Site Light Logo",
			  "desc" => "Optimal size: 340px width by 60px height.",
			  "id"   => "bc_footer_logo",
			  "std"  => "",
			  "type" => "upload"),

		// array("name" => "Footer Description",
		// 	  "desc" => "Enter Footer Description",
		// 	  "id"   => "bc_footer_desc",
		// 	  "std"  => "",
		// 	  "type" => "textarea"),

		array("name" => "Footer Menu Title",
			  "desc" => "Enter Footer Menu Title",
			  "id"   => "bc_footer_menu_title",
			  "std"  => "",
			  "type" => "text"),

		array("name" => "Footer Contact Title",
			  "desc" => "Enter Footer Contact Title",
			  "id"   => "bc_footer_getin_title",
			  "std"  => "",
			  "type" => "text"),

		array("name" => "Address shown on the website",
			  "desc" => "Enter Location Title",
			  "id"   => "bc_footer_location_title",
			  "std"  => "",
			  "type" => "textarea"),

		array("name" => "Phone Number shown on the website",
			  "desc" => "Enter Phone Number",
			  "id"   => "bc_phone_number",
			  "std"  => "",
			  "type" => "text"),

		array("name" => "Email ID shown on the website",
			  "desc" => "Enter Email Address",
			  "id"   => "bc_email_address",
			  "std"  => "",
			  "type" => "text"),

		// array("name" => "Footer Newsletter Title",
		// 	  "desc" => "Enter Newsletter Title",
		// 	  "id"   => "bc_newsletter_title",
		// 	  "std"  => "",
		// 	  "type" => "text"),

		// array("name" => "Footer Newsletter Description",
		// 	  "desc" => "Enter Newsletter Description",
		// 	  "id"   => "bc_newsletter_desc",
		// 	  "std"  => "",
		// 	  "type" => "textarea"),
		
		array("name" => "Copyright Text",
			  "desc" => "Enter Copyright Text",
			  "id"   => "driverite_copyright_text",
			  "std"  => "",
			  "type" => "text"),
		/* ---------------------------------------------------------------------------- */	
		/* Icon Link */
		/*------------------------------------------------*/
			array("name"=> "Facebook Link",
				"desc"=> "Enter Facebook Link",
				"id"=> "driverite_facebook_link",
				"std"=> "",
				"type"=> "text"),

			array("name"=> "Instagram Link",
				"desc"=> "Enter Instagram Link",
				"id"=> "driverite_instagram_link",
				"std"=> "",
				"type"=> "text"),

			// array("name"=> "Twitter Link",
			// 	"desc"=> "Enter Twitter Link",
			// 	"id"=> "driverite_twitter_link",
			// 	"std"=> "",
			// 	"type"=> "text"),

			// array("name"=> "Linkdin Link",
			// 	"desc"=> "Enter Linkdin Link",
			// 	"id"=> "driverite_linkdin_link",
			// 	"std"=> "",
			// 	"type"=> "text"),

			/* Social Link End */
			/* ---------------------------------------------------------------------------- */
			);		
		weaversweb_ftn_update_option('of_template',$options);
		}
	}
?>