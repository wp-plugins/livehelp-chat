<?php
/*

Plugin Name: Livehelp

Plugin URI: http://www.livehelp.it/index.asp?lingua=EN

Description: provide livehelp chat support

Version: 1.2.0

Author: Sostanza s.r.l

Author URI: http://www.livehelp.it/index.asp?lingua=EN

 */ 

define('LIVEHELP_LOGO',"http://vedit.sostanza.net/lh-wordpress.png");add_action('admin_enqueue_scripts', 'livehelp_style');add_action('admin_enqueue_scripts', 'livehelp_script');
//dichiaro lo script javascript
function livehelp_script(){ 
     wp_register_script('livehelp_script', plugins_url('/bootstrap.min.js', __FILE__ ));   
	 wp_enqueue_script('livehelp_script');

	 }
	 
//dichiaro lo script css
function livehelp_style() {	
	wp_register_style('bootstrap_style', plugins_url('/bootstrap.css', __FILE__));
	wp_enqueue_style('bootstrap_style');
}

function doer_of_stuff() {
    return new WP_Error( 'broke', __( "Non siamo abilitati a fare chiamate http al nostro server, contatta il tuo provider", "server.livehelp.it" ) );
}

		function string2KeyedArray($string, $delimiter = ',', $kv = '=>') {
			if ($a = explode($delimiter, $string)) { // create parts
				foreach ($a as $s) { // each part
					if ($s) {
						if ($pos = strpos($s, $kv)) { // key/value delimiter
							$ka[trim(substr($s, 0, $pos))] = trim(substr($s, $pos + strlen($kv)));
						} else { // key delimiter not found
						$ka[] = trim($s);
						}
					}
				}
				return $ka;
			}
		}
		
		
//funzione che stampa la form nel cms
function livehelp_update_options_form()
{

echo $theBody;


//$return = doer_of_stuff();
$url = "http://server.livehelp.it/admin/widget_elenco_ajax.asp?idgruppo=".get_option('Livehelp_ID');
$response=wp_remote_get( $url, $args );
$response=wp_remote_retrieve_body($response);
$response=string2KeyedArray($response);


?>
			<div class="icon32" id="icon-options-general"><br /></div>
			<h1>Livehelp configuration</h1>
			<div>							

			<div class="page-header">
			<?if(get_option('Livehelp_ID') != ''){?>								
			<a href="http://server.livehelp.it/mobile/?id=<?echo get_option('Livehelp_ID'); ?>" target="blank"><button class="btn btn-success">Agent's login</button></a>
			<a href="http://server.livehelp.it/admin/main.asp" target="blank"><button class="btn btn-primary">Admin Dashboard</button></a>							
			<a href="http://server.livehelp.it/admin/conferma.asp" target="blank"><button class="btn btn-danger">Buy NOW</button></a>							
			<?}?>			
			</div>				
			<div class="row-fluid">								 
				<div class="colsm-edit-6"> 						
					<div class="list-group">										
					<!-- CONTENUTO -->								
						<form method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">									
						<input type="hidden" name="conferma" value="Y"/><?php settings_fields('ylb_options_group'); ?>
							<div class="form-group">
								<label for="Livehelp_ID">LiveHelp ID <a href="http://www.livehelp.it/vedit/15/registrazione_form_LH.asp?pagina=1539&campagna=WPRESS" target="blank">Get one for free</a></label>
								<input type="text" name="Livehelp_ID" class="form-control" id="Livehelp_ID" value="<?php echo get_option('Livehelp_ID'); ?>" placeholder="il tuo ID" name="Livehelp_ID" />									
							</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading"><h3>The easy way</h3></div>
							<div class="panel-body">
								<div class="form-group">							
									<label for="Livehelp_button">Choose a Button layout</label>									
									<select id="Livehelp_button"  class="form-control" name="Livehelp_button">
										<option value="bottone_rosso_EN" <?php selected(get_option('Livehelp_button'), "bottone_rosso_EN"); ?>>Need help button EN</option>																
										<option value="non_perdere_tempo_EN" <?php selected(get_option('Livehelp_button'), "non_perdere_tempo_EN"); ?>>Don't loose time EN</option>																
										<option value="bottone_con_fumetto_EN" <?php selected(get_option('Livehelp_button'), "bottone_con_fumetto_EN"); ?>>button with chat EN</option>																
										<option value="bottone_grigio_verde_EN" <?php selected(get_option('Livehelp_button'), "bottone_grigio_verde_EN"); ?>>green button EN</option>																
										<option value="bottone_grigio_rosso_EN" <?php selected(get_option('Livehelp_button'), "bottone_grigio_rosso_EN"); ?>>red button EN</option>																
										<option value="bottone_con_ragazza_green" <?php selected(get_option('Livehelp_button'), "bottone_con_ragazza_green"); ?>>button with girl green EN</option>																
										<option value="bottone_con_ragazza_red" <?php selected(get_option('Livehelp_button'), "bottone_con_ragazza_red"); ?>>button with girl red EN</option>																
										<option value="link" <?php selected(get_option('Livehelp_button'), "link"); ?>>text link</option>						<option value="omino_livehelp" <?php selected(get_option('Livehelp_button'), "omino_livehelp"); ?>>livehelp mascot</option>
										<option value="bottone_grigio_verde" <?php selected(get_option('Livehelp_button'), "bottone_grigio_verde"); ?>>green button IT</option>
										<option value="bottone_rosso" <?php selected(get_option('Livehelp_button'), "bottone_rosso"); ?>>red button IT</option>
										<option value="bottone_rosa" <?php selected(get_option('Livehelp_button'), "bottone_rosa"); ?>>pink button IT</option>
										<option value="bottone_con_ragazza" <?php selected(get_option('Livehelp_button'), "bottone_con_ragazza"); ?>>button with girl IT</option>
										<option value="bottone_con_fumetto" <?php selected(get_option('Livehelp_button'), "bottone_con_fumetto"); ?>>Cartoon button IT</option>
										<option value="bottone_grigio_rosso" <?php selected(get_option('Livehelp_button'), "bottone_grigio_rosso"); ?>>grey button IT</option>
									</select>
							</div>					
							<div class="form-group">					
								<label for="Livehelp_position">Choose a Button position</label>					
								<select id="Livehelp_position" name="Livehelp_position"  class="form-control">
									<option value="bottom_right_fixed" <?php selected(get_option('Livehelp_position'), "bottom_right_fixed"); ?>>bottom-right fixed</option>
									<option value="bottom_left_fixed"<?php selected(get_option('Livehelp_position'), "bottom_left_fixed"); ?>>bottom-left fixed</option>
									<option value="inside"<?php selected(get_option('Livehelp_position'), "inside"); ?>>inside the layout</option>
								</select>
							</div>	
						</div>		
					</div><br><br>
					<div class="panel panel-default">
						<div class="panel-heading"><h3>The cool way (customizable dynamic widget with activation rules)</h3></div>
							<div class="panel-body">
								<div class="form-group">
									<label for="Widget">Choose a Dynamic Widget <a href="http://server.livehelp.it/admin/widget_elenco.asp&campagna=WPRESS" target="blank">create one here</a></label>
									<div class="control-group">
									
										<select name="widget" id="widget" class="form-control">
										<option value="0">select...</option>
                                         <?php if(get_option('Livehelp_ID')!=""){?>
											<?php foreach( $response as $key => $value ) {?>
											<option value="<?php echo $key ?>" <?php if (get_option('widget')==$key) echo "selected"?>><?php echo $value ?></option>
											<?}}?>
										</select>
									</div>
								</div>	
							</div>
					</div>
							<div>
								<input type="submit" class="btn btn-info  btn-sm" id="submit" name="submit" value="Save"/>
							</div>								
						</form>																
					</div>						  
																			 
				<div class="colsm-edit-6"> 						  
					<div class="list-group">						  
						<h1>What is LiveHelp<sup>&reg;</sup>?</h1>								
						<span class="verde15">LiveHelp<sup>&reg;</sup></span>  is the <span style="font-weight:700; ">chat for customer care</span> easy to use and to integrate.<br><br>Website visitors can chat with an agent of your customer care service and get information about products and services in real time. Only one click to get in contact with a trusted reference.<br><h3><b>15-days free trial!</b></h3>
						<div>										
							<h1>How it works</h1>
							<ol>
							<li><a href="http://www.livehelp.it/vedit/15/registrazione_form_LH.asp?pagina=1539&campagna=WPRESS" target="_blank">Sign up</a> to get your Livehelp<sup>&reg;</sup> ID.</li> 
							<li><b>Fast setup</b>: insert your Livehelp ID, choose a button layout and its position in the website, click <b>SAVE</b> and the button will immediately appear in your website!</li>
							<li><b>Advanced setup</b> (customizable dynamic widget with activation rules): Log in your <a href="http://server.livehelp.it/" target="blank">admin dashboard</a> with login data you received by e-mail, go to <a href="http://server.livehelp.it/admin/widget_elenco.asp">Dynamic JS Widget</a>, add your widget and choose the layout and activation rules. Refresh this page to save the dynamic widget and activate it. </li>
							<li><b>log in as agent</b> by clicking the first button on top left. Just for the first time enable the desktop notification.</li>
							<li>
							<span style="font-weight:700; ">Web Users</span> invite operators to chat in a private browser window by clicking the LiveHelp button.</li>
							<li>
							<span style="font-weight:700; ">Agents receive a sound alert</span> (customizable in the admin dashboard) and a desktop notification on their monitors, from which they can accept the chat.</li>
							</ol><br>
							<!-- Start LiveHelp Code Copyright 1997 - 2015 www.livehelp.it Sostanza srl  -->
<SCRIPT language=javascript> function apri_livehelp() {var d=new Date(); nuovo_LiveHelp_29244=window.open('http://server.livehelp.it/client_user_resp/?provenienza='+ escape(document.location.href) +'&info=&template=10314&stanza=Assistenza+Prodotti%2D29244&ID=29244&gruppo=Assistenza&nick=&x=' + d.valueOf(),'LiveHelpwin1_29244', 'status=no,location=no,toolbar=no,width=500,height=600,resizable=yes'); nuovo_LiveHelp_29244.focus();} </SCRIPT>

<span  id="LH2013"><A HREF="#" OnClick="apri_livehelp(); return(false);"><button class="btn btn-default">Need HELP?</button></A></span>
<!-- End LiveHelp code -->
						</div>
					</div>
				</div>
				</div>
			</div>
		<?php
}
if (!isset($_POST['conferma'])){
$conferma="";
}else{
$conferma=$_POST['conferma'];
}
//salvo i dati della form in variabili
if($conferma == 'Y') {
     //Form data sent
    $ID = $_POST['Livehelp_ID'];
    update_option('Livehelp_ID', $ID);
    $position = $_POST['Livehelp_position'];
    update_option('Livehelp_position', $position);
    $button = $_POST['Livehelp_button'];
    update_option('Livehelp_button', $button);
	 $widget = $_POST['widget'];
     update_option('widget', $widget);
?>

<!-- alert di azione riuscita-->
<div class="alert alert-success alert-dismissible" role="alert"> 
	<button type="button" class="close" data-dismiss="alert">
		<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
	</button>
	<?php _e('Options saved.' );?>
</div>
<!-- <div class="updated"><p><strong><?php _e('Options saved.' );?></strong></p></div>--></div>
        <?php
} else {
        //Normal page display
}

//funzione che stampa il widget sul frontend
function livehelp_print_widget($content)
{
	global $wpdb;
	$output=$content;
	//$result = mysql_query("select * from avwp_options");
	$ID = $wpdb->get_var( "SELECT option_value FROM $wpdb->options where option_name='Livehelp_ID'" );
	$user_BUTTON= $wpdb->get_var( "SELECT option_value FROM $wpdb->options where option_name='Livehelp_button'" );
	$user_POSITION= $wpdb->get_var( "SELECT option_value FROM $wpdb->options where option_name='Livehelp_position'" );
	$user_WIDGET= $wpdb->get_var( "SELECT option_value FROM $wpdb->options where option_name='widget'" );
	if($ID!=""){
    if($user_WIDGET=="0"){
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
			if ($user_BUTTON=='bottone_con_fumetto_EN'){
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
			if ($user_BUTTON=='bottone_rosso_EN'){
						$href = "<A HREF='#' OnClick='apri_livehelp(); return(false);'><img border='0' src='http://server.livehelp.it/admin/logo_livehelp.asp?bottone=17&gruppo=".$ID."&stanza='></A>";
						}
			if ($user_BUTTON=='bottone_grigio_verde_EN'){
						$href = "<A HREF='#' OnClick='apri_livehelp(); return(false);'><img border='0' src='http://server.livehelp.it/admin/logo_livehelp.asp?bottone=14&gruppo=".$ID."&stanza='></A>";
						}
			if ($user_BUTTON=='bottone_grigio_rosso_EN'){
						$href = "<A HREF='#' OnClick='apri_livehelp(); return(false);'><img border='0' src='http://server.livehelp.it/admin/logo_livehelp.asp?bottone=20&gruppo=".$ID."&stanza='></A>";
						}	
			if ($user_BUTTON=='bottone_con_ragazza_green'){
						$href = "<A HREF='#' OnClick='apri_livehelp(); return(false);'><img border='0' src='http://server.livehelp.it/admin/logo_livehelp.asp?bottone=18&gruppo=".$ID."&stanza='></A>";
						}
			if ($user_BUTTON=='bottone_con_ragazza_red'){
						$href = "<A HREF='#' OnClick='apri_livehelp(); return(false);'><img border='0' src='http://server.livehelp.it/admin/logo_livehelp.asp?bottone=19&gruppo=".$ID."&stanza='></A>";
						}
			if ($user_BUTTON=='non_perdere_tempo_EN'){
						$href = "<A HREF='#' OnClick='apri_livehelp(); return(false);'><img border='0' src='http://server.livehelp.it/admin/logo_livehelp.asp?bottone=15&gruppo=".$ID."&stanza='></A>";
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
							
	}else{
	$output="<!-- Start LiveHelp activation widget Default - http://www.livehelp.it --><script type='text/javascript'>function LHready(){if(document.readyState == 'complete') {(function(){var lh=document.createElement('script');lh.type='text/javascript'; lh.async=true;lh.src='//server.livehelp.it/widgetjs/".$ID."/".$user_WIDGET.";.js?x=' + 1*new Date();var node=document.getElementsByTagName('script')[0];node.parentNode.insertBefore(lh,node);})();} else {setTimeout('LHready()',150);}} LHready();</script><!-- End LiveHelp widget -->";
	}
	echo $output;		
}
}

//aggiungo al footer la funzione di stampa widget
add_action('wp_footer', 'livehelp_print_widget');

//funzione che raggruppa le altre funzioni dichiarate e inserisce il logo per il menu
function livehelp_add_option_page()
{
	add_menu_page('livehelp Options', 'Livehelp chat', 'administrator', 'livehelp-options-page', 'livehelp_update_options_form', LIVEHELP_LOGO);
}

//aggiunge al menu il mio widget
add_action('admin_menu', 'livehelp_add_option_page');
?>