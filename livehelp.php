<?php

/*

Plugin Name: Livehelp

Plugin URI: http://www.livehelp.it/index.asp?lingua=EN

Description: provide livehelp chat support

Version: 1.0

Author: Sostanza s.r.l

Author URI: http://www.livehelp.it/index.asp?lingua=EN

 */

?>





<?

define('LIVEHELP_LOGO',"http://vedit.sostanza.net/lh-wordpress.png");



function livehelp_update_options_form()

{

    ?>

    <div class="wrap">

        <div class="icon32" id="icon-options-general"><br /></div>

        <h2>Livehelp® configuration</h2>

        <p>&nbsp;</p>

    <div style="background-color: white;border: 1px solid #000;width:1700px">

        <form method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">

			<input type="hidden" name="oscimp_hidden" value="Y"/>

			<?php settings_fields('ylb_options_group'); ?>

				<div style="position:relative; width:550px; height:450px;margin-left:40px;margin-top: 15px;">

					<table style="font-size:14px">

						<tr valign="top">

							<td colspan="2"><h1>Configure LiveHelp® widget</h1></td>

							<td rowspan="6"> </td>

						</tr>

						<tbody>

							<tr valign="top">

								<td><label for="Livehelp_ID">LiveHelp® ID<br/><a href="http://www.livehelp.it/vedit/pagina.asp?lingua=EN&pagina=1413&campagna=WPRESS" target="blank">Get one for free</a></label></td>

								<td><input type="text" id="Livehelp_ID" style="width: 300px" value="<?php echo get_option('Livehelp_ID'); ?>" name="Livehelp_ID" />

									<span class="Livehelp_ID"></span>

								</td>

								<td rowspan="5"> </td> 

							</tr>

							<tr valign="top">

								<td><label for="Livehelp_button">Button layout</label></td>

								<td>

									<select id="Livehelp_button" name="Livehelp_button" style="width: 300px">

										<option value="link" <?php selected(get_option('Livehelp_button'), "link"); ?>>text link</option>

										<option value="omino_livehelp" <?php selected(get_option('Livehelp_button'), "omino_livehelp"); ?>>livehelp mascot</option>

										<option value="bottone_rosso" <?php selected(get_option('Livehelp_button'), "bottone_rosso"); ?>>red button</option>

										<option value="bottone_con_ragazza" <?php selected(get_option('Livehelp_button'), "bottone_con_ragazza"); ?>>button with girl</option>

										<option value="bottone_con_fumetto" <?php selected(get_option('Livehelp_button'), "bottone_con_fumetto"); ?>>button with chat IT</option>

										<option value="bottone_con_fumetto_en" <?php selected(get_option('Livehelp_button'), "bottone_con_fumetto_en"); ?>>button with chat EN</option>

										<option value="bottone_rosa" <?php selected(get_option('Livehelp_button'), "bottone_rosa"); ?>>pink button</option>

										<option value="bottone_grigio_verde" <?php selected(get_option('Livehelp_button'), "bottone_grigio_verde"); ?>>green button</option>

										<option value="bottone_grigio_rosso" <?php selected(get_option('Livehelp_button'), "bottone_grigio_rosso"); ?>>grey button</option>

									</select>

									<span class="description"></span>

								</td>

							</tr>

							<tr valign="top">

								<td><label for="Livehelp_position">Button position</label></td>

								<td >

									<select id="Livehelp_position" name="Livehelp_position" style="width: 300px">

										<option value="bottom_right_fixed" <?php selected(get_option('Livehelp_position'), "bottom_right_fixed"); ?>>bottom-right fixed</option>

										<option value="bottom_left_fixed"<?php selected(get_option('Livehelp_position'), "bottom_left_fixed"); ?>>bottom-left fixed</option>

										<option value="inside"<?php selected(get_option('Livehelp_position'), "inside"); ?>>inside</option>

									</select>

									<span class="description"></span>

								</td>

							</tr>

							<tr valign="top">

								<td><label for="livehelp_advanced_content">ADVANCED<br/>In the Admin dashboard you can customize your button. Simply generate the html code in
“widget and HTML code” page, copy and paste it in this area, your button will be automatically updated in your website.</label></td>

								<td><textarea id="Livehelp_advanced_content" name="Livehelp_advanced_content" style="width: 300px;height: 150px;"><?php echo get_option('advanced'); ?></textarea>

								<span class="description"><div style="text-align:right"><a href=" http://www.livehelp.it/wordpress/livehelp_wordpress_guide.pdf"target="_blank" >download the user's guide</div></span>

								</td>

							</tr>

							<tr valign="top">

								<td colspan="2"><div style=" display: block; margin-top: 25px; text-align:right"><input type="submit" class="button-primary" id="submit" name="submit" value="Save"></div></td>

							</tr>



						</tbody>

					</table>

				</div>

		</form>

				<div style="position:relative; width:550px; height:450px;margin-left: 700px;margin-top: -445px;">

					<table border="0" style="font-size:14px">

						<tr>

							<td><h1>What is LiveHelp®?</h1>

								<span class="verde15">LiveHelp®</span>  is the <span style="font-weight:700; ">customer care service</span> easy to use and to integrate.<br><br>Website visitors can chat with an agent of your customer care service and get information about products and services in real time. Only one click to get in contact with a trusted reference.

							</td>

							<td rowspan="3"><img src="http://www.livehelp.it/vedit/15/img/business-opportunity.png"></td>

						</tr>

						<tr>

							<td>

								<div style="width:550px">

									<h1>How it works</h1>

									Generate the button with the widget and <span style="font-weight:700; ">get ready to chat with your users!</span><br><br> 

									<span style="font-weight:700; ">Agents</span> log into the operator's client from a custom URL, using their personal username and password. <br>

									<span style="font-weight:700; ">Users</span> invite operators to chat in a private browser window by clicking the LiveHelp® button or text you put into your website.<br>

									<span style="font-weight:700; ">Agents receive a sound alert</span> (customizable in the administrator panel) and a desktop notification on their monitors, from which they can accept the chat.<br>

								</div>

							</td>

						</tr>

						<tr>

						<?if(get_option('Livehelp_ID') != ''){?>

							<td><a href="http://server.livehelp.it/mobile/?id=<?echo get_option('Livehelp_ID'); ?>" target="blank"><button>Agent's login</button></a>

								<a href="http://server.livehelp.it/admin/main.asp" target="blank"><button>Dashboard</button></a>

								<a href="http://www.livehelp.it/index.asp?lingua=EN" target="blank"><button>Go to Livehelp site</button></a>

						<?}?>

							</td>

						</tr>

					</table>

				</div>

	</div>

    </div>

    <?php



}







    if($_POST['oscimp_hidden'] == 'Y') {

        //Form data sent

        

       $ID = $_POST['Livehelp_ID'];

        update_option('Livehelp_ID', $ID);

         

        $position = $_POST['Livehelp_position'];

        update_option('Livehelp_position', $position);

         

        $button = $_POST['Livehelp_button'];

        update_option('Livehelp_button', $button);

		

		$advanced = $_POST['Livehelp_advanced'];

        update_option('Livehelp_advanced', $advanced);



        ?>

        <div class="updated"><p><strong><?php _e('Options saved.' ); ?></strong></p></div>

        <?php

    } else {

        //Normal page display

    }

    

    

function livehelp_print_widget($content)

{

global $wpdb;

$output=$content;

//$result = mysql_query("select * from avwp_options");



$ID = $wpdb->get_var( "SELECT option_value FROM $wpdb->options where option_name='Livehelp_ID'" );

$user_BUTTON= $wpdb->get_var( "SELECT option_value FROM $wpdb->options where option_name='Livehelp_button'" );

$user_POSITION= $wpdb->get_var( "SELECT option_value FROM $wpdb->options where option_name='Livehelp_position'" );

$user_ADVANCED= $wpdb->get_var( "SELECT option_value FROM $wpdb->options where option_name='Livehelp_advanced'" );

if($user_ADVANCED==""){

if ($user_BUTTON=='link'){

			$href="<A HREF='#' OnClick='apri_livehelp(); return(false);'><font face=verdana size=2><B><u>Richiedi ASSISTENZA in chat</u></B></font></A>";

			}

if ($user_BUTTON=='omino_livehelp'){

			$href='<A HREF="#" OnClick="apri_livehelp(); return(false);"><img border="0" src="http://server.livehelp.it/admin/logo_livehelp.asp?bottone=12&gruppo='.$ID.'&stanza="></A>';

			}

if ($user_BUTTON=='bottone_rosso'){

			$href="<A HREF='#' OnClick='apri_livehelp(); return(false);'><img border='0' src='http://server.livehelp.it/admin/logo_livehelp.asp?bottone=1&gruppo=".$ID."&stanza='></A>";

			}

if ($user_BUTTON=='bottone_con_ragazza'){

			$href = "<A HREF='#' OnClick='apri_livehelp(); return(false);'><img border='0' src='http://server.livehelp.it/admin/logo_livehelp.asp?bottone=9&gruppo=".$ID."&stanza='></A>";

			}

if ($user_BUTTON=='bottone_con_fumetto'){

			$href = "<A HREF='#' OnClick='apri_livehelp(); return(false);'><img border='0' src='http://server.livehelp.it/admin/logo_livehelp.asp?bottone=3&gruppo=".$ID."&stanza='></A>";

			}

if ($user_BUTTON=='bottone_con_fumetto_en'){

			$href = "<A HREF='#' OnClick='apri_livehelp(); return(false);'><img border='0' src='http://server.livehelp.it/admin/logo_livehelp.asp?bottone=7&gruppo=".$ID."&stanza='></A>";

			}

if ($user_BUTTON=='bottone_rosa'){

			$href = "<A HREF='#' OnClick='apri_livehelp(); return(false);'><img border='0' src='http://server.livehelp.it/admin/logo_livehelp.asp?bottone=8&gruppo=".$ID."&stanza='></A>";

			}

if ($user_BUTTON=='bottone_grigio_verde'){

			$href = "<A HREF='#' OnClick='apri_livehelp(); return(false);'><img border='0' src='http://server.livehelp.it/admin/logo_livehelp.asp?bottone=9&gruppo=".$ID."&stanza='></A>";

			}

if ($user_BUTTON=='bottone_grigio_rosso'){

			$href = "<A HREF='#' OnClick='apri_livehelp(); return(false);'><img border='0' src='http://server.livehelp.it/admin/logo_livehelp.asp?bottone=10&gruppo=".$ID."&stanza='></A>";

			}



if ($user_POSITION=='bottom_left_fixed'){

			$span='<span style="display:block; bottom:0px; left:0px;   position:fixed;z-index:15000;" id="LH2013">';

			}

if ($user_POSITION=='bottom_right_fixed'){

			$span='<span style="display:block; bottom:0px; right:0px;  position:fixed;z-index:15000;" id="LH2013">';

			}	

if ($user_POSITION=='inside'){

			$span='<span  id="LH2013">';			

			}				

			

$output="<!-- INIZIO CODICE LiveHelp Copyright 1997 - 2014 www.livehelp.it Sostanza srl  -->

					<SCRIPT language=javascript> function apri_livehelp() {var d=new Date(); nuovo_LiveHelp_".$ID."=window.open

					('http://server.livehelp.it/client_user/default.asp?provenienza='+ escape(document.location.href) 

					+'&info=&template=&stanza=".$stanza."&ID=".$ID."&gruppo=Assistenza&nick=&x=' + d.valueOf(),'LiveHelpwin1_".$ID."', 

					'status=no,location=no,toolbar=no,width=600,height=465,resizable=yes'); nuovo_LiveHelp_".$ID.".focus();} </SCRIPT>

					".$span.$href."</span>

					<!-- FINE CODICE LiveHelp -->";

					}

else $output = $user_ADVANCED;

echo $output;		

    

}

  add_action('wp_footer', 'livehelp_print_widget');





// diciamo a WordPress di eseguire la nostra funzione

// nell’header della pagina







function livehelp_add_option_page()

{

	add_menu_page('livehelp Options', 'Livehelp® chat', 'administrator', 'livehelp-options-page', 'livehelp_update_options_form', LIVEHELP_LOGO);



}

 

add_action('admin_menu', 'livehelp_add_option_page');

?>
