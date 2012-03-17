<?php
/*
 * Plugin Name: TwitterSignatures
 * Version: 1.8
 * Plugin URI: http://wordpress.org/extend/plugins/twitter-signature
 * Description: With twitHut Twitter Signatures Wordpress widget, you can select from more than 500+ different types of cool Twitter signature image and button to be displayed on your Wordpress website. It will display your latest twit message, followers and your friends.
 * Latest version will require you to login once using OAuth
 * Author: Sunento Agustiar Wu
 * Author URI: http://www.twithut.com
 * License: GNU/GPL http://www.gnu.org/copyleft/gpl.html
 */
class TwitterSignaturesWidget extends WP_Widget
{
	/**
	* Declares the TwitterSignaturesWidget class.
	*
	*/
	function TwitterSignaturesWidget(){
		$widget_ops = array('classname' => 'widget_TwitterSignatures', 'description' => __( "With twitHut Twitter Signatures Wordpress widget, you can select from more than 120+ different types of cool Twitter signature image and button to be displayed on your Wordpress website. It will display your latest twit message, followers and your friends.") );
		$control_ops = array('width' => 300, 'height' => 300);
		$this->WP_Widget('TwitterSignatures', __('TwitterSignatures Widget'), $widget_ops, $control_ops);
	}
	
	/**
	* Displays the Widget
	*
	*/
	function widget($args, $instance){
		extract($args);
		$title = apply_filters('widget_title', empty($instance['title']) ? 'Twitter Signatures' : $instance['title']);
		$twitterUserName = empty($instance['twitterUserName']) ? 'twithut' : $instance['twitterUserName'];
		$signatureStyle = empty($instance['signatureStyle']) ? '40' : $instance['signatureStyle'];
		$interstitial = empty($instance['interstitial']) ? 'no' : $instance['interstitial'];
				
		# Before the widget
		echo $before_widget;
		
		# The title
		if ( $title )
			echo $before_title . $title . $after_title;
		
		# Render the Widget
		if ($interstitial == 'yes') {
			echo '<a href="http://twithut.com/follow/' . $twitterUserName . '" title="Follow ' . $twitterUserName . ' "><img src="http://twithut.com/twitsigs/' . $signatureStyle . '/' . $twitterUserName . '.png' .   '" border=0></a>';
		} else {
			echo '<a href="http://twitter.com/' . $twitterUserName . '" title="Follow ' . $twitterUserName . ' "><img src="http://twithut.com/twitsigs/' . $signatureStyle . '/' . $twitterUserName . '.png' .   '" border=0></a>';
		}
		# After the widget
		echo $after_widget;
	}
	
	/**
	* Saves the widgets settings.
	*
	*/
	function update($new_instance, $old_instance){
		$instance = $old_instance;
		$instance['title'] = strip_tags(stripslashes($new_instance['title']));
		$instance['twitterUserName'] = strip_tags(stripslashes($new_instance['twitterUserName']));
		$instance['signatureStyle'] = strip_tags(stripslashes($new_instance['signatureStyle']));
		$instance['interstitial'] = strip_tags(stripslashes($new_instance['interstitial']));
		
		return $instance;
	}
	
	/**
	* Creates the edit form for the widget.
	*
	*/
	function form($instance){
		//Defaults
		$instance = wp_parse_args( (array) $instance, array('title'=>'', 'twitterUserName'=>'twithut', 'interstitial'=>'no', 'signatureStyle'=>'70') );
		
		$title = htmlspecialchars($instance['title']);
		$twitterUserName = htmlspecialchars($instance['twitterUserName']);
		$signatureStyle = htmlspecialchars($instance['signatureStyle']);
		
		
		#Some intro for this widget
		echo '<p style="text-align:left;">Please visit <a href="http://www.twithut.com" target="_blank">our main website</a> and login once using Twitter OAuth before you start using this plugin. (You need to follow Step 1 and Step 2 and you do not have to register to start using it.)</p><hr/>';
		
		# Output the options
		echo '<p style="text-align:right;"><label for="' . $this->get_field_name('title') . '">' . __('Title:') . ' <input style="width: 250px;" id="' . $this->get_field_id('title') . '" name="' . $this->get_field_name('title') . '" type="text" value="' . $title . '" /></label></p>';
		# Fill TwitterSignatures ID
		echo '<p style="text-align:right;"><label for="' . $this->get_field_name('twitterUserName') . '">' . __('Twitter Username:') . ' <input style="width: 100px;" id="' . $this->get_field_id('twitterUserName') . '" name="' . $this->get_field_name('twitterUserName') . '" type="text" value="' . $twitterUserName . '" /></label></p>';
		
		# Interstitial Feature : option to select YEs or No 
		echo '<p style="text-align:right;"><label for="' . $this->get_field_name('interstitial') . '">' . __('Turn On Interstitial Feature (Premium Member)') . ' <select name="' . $this->get_field_name('interstitial')  . '" id="' . $this->get_field_id('interstitial')  . '">"';
?>
		<option value="no" <?php if ($interstitial == 'no') echo 'selected="yes"'; ?> >No</option>
		<option value="yes" <?php if ($interstitial == 'yes') echo 'selected="yes"'; ?> >Yes</option>			 
<?php
		echo '</select></label>';
		
		# Fill Twitter Signatures Style Selection
		echo '<p style="text-align:right;"><label for="' . $this->get_field_name('signatureStyle') . '">' . __('Signature Style:') . ' <select name="' . $this->get_field_name('signatureStyle')  . '" id="' . $this->get_field_id('signatureStyle')  . '">"';
?>
		<option value="121" <?php if ($signatureStyle == '121') echo 'selected="yes"'; ?> >Counter 1 (150x90)</option>
		<option value="122" <?php if ($signatureStyle == '122') echo 'selected="yes"'; ?> >Counter 2 (150x90)</option>
		<option value="123" <?php if ($signatureStyle == '123') echo 'selected="yes"'; ?> >Counter 3 (150x90)</option>
		<option value="124" <?php if ($signatureStyle == '124') echo 'selected="yes"'; ?> >Counter 4 (150x90)</option>
		<option value="125" <?php if ($signatureStyle == '125') echo 'selected="yes"'; ?> >Counter 5 (150x90)</option>
		<option value="126" <?php if ($signatureStyle == '126') echo 'selected="yes"'; ?> >Counter 6 (150x90)</option>
		<option value="127" <?php if ($signatureStyle == '127') echo 'selected="yes"'; ?> >Counter 7 (150x90) - Free</option>
		<option value="128" <?php if ($signatureStyle == '128') echo 'selected="yes"'; ?> >Counter 8 (150x90)</option>
		<option value="129" <?php if ($signatureStyle == '129') echo 'selected="yes"'; ?> >Counter 9 (150x90)</option>
		<option value="130" <?php if ($signatureStyle == '130') echo 'selected="yes"'; ?> >Counter 10 (150x90)</option>
		<option value="131" <?php if ($signatureStyle == '131') echo 'selected="yes"'; ?> >Counter 11 (150x90)</option>
		<option value="132" <?php if ($signatureStyle == '132') echo 'selected="yes"'; ?> >Counter 12 (150x90)</option>
		<option value="40" <?php if ($signatureStyle == '40') echo 'selected="yes"'; ?> >Special 1 (160x200) - Free</option>
		<option value="42" <?php if ($signatureStyle == '42') echo 'selected="yes"'; ?> >Special 2 (160x200)</option>
		 <option value="43" <?php if ($signatureStyle == '43') echo 'selected="yes"'; ?> >Special 3 (160x200)</option>
		 <option value="44" <?php if ($signatureStyle == '44') echo 'selected="yes"'; ?> >Special 4 (160x200)</option>
		 <option value="45" <?php if ($signatureStyle == '45') echo 'selected="yes"'; ?> >Special 5 (160x200)</option>
		 <option value="46" <?php if ($signatureStyle == '46') echo 'selected="yes"'; ?> >Special 6 (160x200)</option>
		 <option value="47" <?php if ($signatureStyle == '47') echo 'selected="yes"'; ?> >Special 7 (160x200)</option>
		 <option value="48" <?php if ($signatureStyle == '48') echo 'selected="yes"'; ?> >Special 8 (160x200)</option>
		 <option value="49" <?php if ($signatureStyle == '49') echo 'selected="yes"'; ?> >Special 9 (160x200)</option>
		 <option value="50" <?php if ($signatureStyle == '50') echo 'selected="yes"'; ?> >Special 10 (160x200)</option>
		 <option value="51" <?php if ($signatureStyle == '51') echo 'selected="yes"'; ?> >Special 11 (160x200)</option>
		 <option value="52" <?php if ($signatureStyle == '52') echo 'selected="yes"'; ?> >Special 12 (160x200)</option>
		 <option value="53" <?php if ($signatureStyle == '53') echo 'selected="yes"'; ?> >Special 13 (160x200)</option>
		 <option value="54" <?php if ($signatureStyle == '54') echo 'selected="yes"'; ?> >Special 14 (160x200)</option>
		 <option value="55" <?php if ($signatureStyle == '55') echo 'selected="yes"'; ?> >Special 15 (160x200)</option>
		 <option value="56" <?php if ($signatureStyle == '56') echo 'selected="yes"'; ?> >Special 16 (160x200)</option>
		 <option value="57" <?php if ($signatureStyle == '57') echo 'selected="yes"'; ?> >Special 17 (160x200)</option>
		 <option value="58" <?php if ($signatureStyle == '58') echo 'selected="yes"'; ?> >Special 18 (160x200)</option>
		 <option value="59" <?php if ($signatureStyle == '59') echo 'selected="yes"'; ?> >Special 19 (160x200)</option>
		 <option value="60" <?php if ($signatureStyle == '60') echo 'selected="yes"'; ?> >Special 20 (160x200)</option>
		 <option value="61" <?php if ($signatureStyle == '61') echo 'selected="yes"'; ?> >Special 21 (160x200)</option>
		 <option value="62" <?php if ($signatureStyle == '62') echo 'selected="yes"'; ?> >Special 22 (160x200)</option>
		 <option value="63" <?php if ($signatureStyle == '63') echo 'selected="yes"'; ?> >Special 23 (160x200)</option>
		 <option value="64" <?php if ($signatureStyle == '64') echo 'selected="yes"'; ?> >Special 24 (160x200)</option>
		 <option value="65" <?php if ($signatureStyle == '65') echo 'selected="yes"'; ?> >Special 25 (160x200)</option>
		 <option value="66" <?php if ($signatureStyle == '66') echo 'selected="yes"'; ?> >Special 26 (160x200)</option>
		 <option value="67" <?php if ($signatureStyle == '67') echo 'selected="yes"'; ?> >Special 27 (160x200)</option>
		 <option value="68" <?php if ($signatureStyle == '68') echo 'selected="yes"'; ?> >Special 28 (160x200)</option>
		 <option value="69" <?php if ($signatureStyle == '69') echo 'selected="yes"'; ?> >Special 29 (160x200)</option>
		 <option value="70" <?php if ($signatureStyle == '70') echo 'selected="yes"'; ?> >Special 30 (160x200)</option>
		 <option value="71" <?php if ($signatureStyle == '71') echo 'selected="yes"'; ?> >Special 31 (160x200)</option>
		 <option value="72" <?php if ($signatureStyle == '72') echo 'selected="yes"'; ?> >Special 32 (160x200)</option>
		 <option value="73" <?php if ($signatureStyle == '73') echo 'selected="yes"'; ?> >Special 33 (160x200)</option>
		 <option value="74" <?php if ($signatureStyle == '74') echo 'selected="yes"'; ?> >Special 34 (160x200)</option>
		 <option value="75" <?php if ($signatureStyle == '75') echo 'selected="yes"'; ?> >Special 35 (160x200)</option>
		 <option value="76" <?php if ($signatureStyle == '76') echo 'selected="yes"'; ?> >Special 36 (160x200)</option>
		 <option value="77" <?php if ($signatureStyle == '77') echo 'selected="yes"'; ?> >Special 37 (160x200)</option>
		 <option value="78" <?php if ($signatureStyle == '78') echo 'selected="yes"'; ?> >Special 38 (160x200)</option>
		 <option value="79" <?php if ($signatureStyle == '79') echo 'selected="yes"'; ?> >Special 39 (160x200)</option>
		 <option value="80" <?php if ($signatureStyle == '80') echo 'selected="yes"'; ?> >Special 40 (160x200)</option>
		 <option value="81" <?php if ($signatureStyle == '81') echo 'selected="yes"'; ?> >Special 41 (160x200)</option>
		 <option value="82" <?php if ($signatureStyle == '82') echo 'selected="yes"'; ?> >Special 42 (160x200)</option>
		 <option value="83" <?php if ($signatureStyle == '83') echo 'selected="yes"'; ?> >Special 43 (160x200)</option>
		 <option value="84" <?php if ($signatureStyle == '84') echo 'selected="yes"'; ?> >Special 44 (160x200)</option>
		 <option value="85" <?php if ($signatureStyle == '85') echo 'selected="yes"'; ?> >Special 45 (160x200)</option>
		 <option value="86" <?php if ($signatureStyle == '86') echo 'selected="yes"'; ?> >Special 46 (160x200)</option>
		 <option value="87" <?php if ($signatureStyle == '87') echo 'selected="yes"'; ?> >Special 47 (160x200)</option>
		 <option value="88" <?php if ($signatureStyle == '88') echo 'selected="yes"'; ?> >Special 48 (160x200)</option>
		 <option value="89" <?php if ($signatureStyle == '89') echo 'selected="yes"'; ?> >Special 49 (160x200)</option>
		 <option value="90" <?php if ($signatureStyle == '90') echo 'selected="yes"'; ?> >Special 50 (160x200)</option>
		 <option value="93" <?php if ($signatureStyle == '93') echo 'selected="yes"'; ?> >Modern 1 (400x150)</option>
		 <option value="94" <?php if ($signatureStyle == '94') echo 'selected="yes"'; ?> >Modern 2 (400x150)</option>
		 <option value="95" <?php if ($signatureStyle == '95') echo 'selected="yes"'; ?> >Modern 3 (400x150)</option>
		 <option value="96" <?php if ($signatureStyle == '96') echo 'selected="yes"'; ?> >Modern 4 (400x150)</option>
		 <option value="97" <?php if ($signatureStyle == '97') echo 'selected="yes"'; ?> >Modern 5 (400x150)</option>
		 <option value="98" <?php if ($signatureStyle == '98') echo 'selected="yes"'; ?> >Modern 6 (400x150)</option>
		 <option value="99" <?php if ($signatureStyle == '99') echo 'selected="yes"'; ?> >Modern 7 (400x150)</option>
		 <option value="100" <?php if ($signatureStyle == '100') echo 'selected="yes"'; ?> >Modern 8 (400x150)</option>
		 <option value="101" <?php if ($signatureStyle == '101') echo 'selected="yes"'; ?> >Modern 9 (400x150)</option>
		 <option value="102" <?php if ($signatureStyle == '102') echo 'selected="yes"'; ?> >Modern 10 (400x150)</option>
		 <option value="103" <?php if ($signatureStyle == '103') echo 'selected="yes"'; ?> >Modern 11 (400x150)</option>
		 <option value="104" <?php if ($signatureStyle == '104') echo 'selected="yes"'; ?> >Modern 12 (400x150)</option>
		 <option value="105" <?php if ($signatureStyle == '105') echo 'selected="yes"'; ?> >Modern 13 (400x150)</option>
		 <option value="106" <?php if ($signatureStyle == '106') echo 'selected="yes"'; ?> >Modern 14 (400x150)</option>
		 <option value="107" <?php if ($signatureStyle == '107') echo 'selected="yes"'; ?> >Modern 15 (400x150)</option>
		 <option value="108" <?php if ($signatureStyle == '108') echo 'selected="yes"'; ?> >Modern 16 (400x150)</option>
		 <option value="109" <?php if ($signatureStyle == '109') echo 'selected="yes"'; ?> >Modern 17 (400x150)</option>
		 <option value="110" <?php if ($signatureStyle == '110') echo 'selected="yes"'; ?> >Modern 18 (400x150)</option>
		 <option value="111" <?php if ($signatureStyle == '111') echo 'selected="yes"'; ?> >Modern 19 (400x150)</option>
		 <option value="112" <?php if ($signatureStyle == '112') echo 'selected="yes"'; ?> >Modern 20 (400x150)</option>
		 <option value="113" <?php if ($signatureStyle == '113') echo 'selected="yes"'; ?> >Modern 21 (400x150)</option>
		 <option value="115" <?php if ($signatureStyle == '114') echo 'selected="yes"'; ?> >Modern 22 (400x150)</option>
		 <option value="116" <?php if ($signatureStyle == '116') echo 'selected="yes"'; ?> >Modern 23 (400x150)</option>
		 <option value="117" <?php if ($signatureStyle == '117') echo 'selected="yes"'; ?> >Modern 24 (400x150)</option>
		 <option value="118" <?php if ($signatureStyle == '118') echo 'selected="yes"'; ?> >Modern 25 (400x150)</option>
		 <option value="119" <?php if ($signatureStyle == '119') echo 'selected="yes"'; ?> >Modern 26 (400x150)</option>
		 <option value="120" <?php if ($signatureStyle == '120') echo 'selected="yes"'; ?> >Modern 27 (400x150)</option>
		 <option value="1" <?php if ($signatureStyle == '1') echo 'selected="yes"'; ?> >Medium 1 (312x92)</option>
		 <option value="2" <?php if ($signatureStyle == '2') echo 'selected="yes"'; ?> >Medium 2 (312x92)</option>
		 <option value="3" <?php if ($signatureStyle == '3') echo 'selected="yes"'; ?> >Medium 3 (312x92)</option>
		 <option value="4" <?php if ($signatureStyle == '4') echo 'selected="yes"'; ?> >Medium 4 (312x92)</option>
		 <option value="5" <?php if ($signatureStyle == '5') echo 'selected="yes"'; ?> >Medium 5 (312x92)</option>
		 <option value="6" <?php if ($signatureStyle == '6') echo 'selected="yes"'; ?> >Medium 6 (312x92)</option>
		 <option value="7" <?php if ($signatureStyle == '7') echo 'selected="yes"'; ?> >Medium 7 (312x92)</option>
		 <option value="8" <?php if ($signatureStyle == '8') echo 'selected="yes"'; ?> >Medium 8 (312x92)</option>
		 <option value="9" <?php if ($signatureStyle == '9') echo 'selected="yes"'; ?> >Medium 9 (312x92)</option>
		 <option value="10" <?php if ($signatureStyle == '10') echo 'selected="yes"'; ?> >Medium 10 (312x92)</option>
		 <option value="11" <?php if ($signatureStyle == '11') echo 'selected="yes"'; ?> >Medium 11 (312x92)</option>
		 <option value="12" <?php if ($signatureStyle == '12') echo 'selected="yes"'; ?> >Medium 12 (312x92)</option>
		 <option value="13" <?php if ($signatureStyle == '13') echo 'selected="yes"'; ?> >Medium 13 (312x92)</option>
		 <option value="14" <?php if ($signatureStyle == '14') echo 'selected="yes"'; ?> >Medium 14 (312x92)</option>
		 <option value="15" <?php if ($signatureStyle == '15') echo 'selected="yes"'; ?> >Medium 15 (312x92)</option>
		 <option value="16" <?php if ($signatureStyle == '16') echo 'selected="yes"'; ?> >Medium 16 (312x92)</option>
		 <option value="17" <?php if ($signatureStyle == '17') echo 'selected="yes"'; ?> >Medium 17 (312x92)</option>
		 <option value="18" <?php if ($signatureStyle == '18') echo 'selected="yes"'; ?> >Medium 18 (312x92)</option>
		 <option value="19" <?php if ($signatureStyle == '19') echo 'selected="yes"'; ?> >Medium 19 (312x92)</option>
		 <option value="20" <?php if ($signatureStyle == '20') echo 'selected="yes"'; ?> >Medium 20 (312x92)</option>
		 <option value="21" <?php if ($signatureStyle == '21') echo 'selected="yes"'; ?> >Medium 21 (312x92)</option>
		 <option value="22" <?php if ($signatureStyle == '22') echo 'selected="yes"'; ?> >Medium 22 (312x92)</option>
		 <option value="23" <?php if ($signatureStyle == '23') echo 'selected="yes"'; ?> >Medium 23 (312x92)</option>
		 <option value="24" <?php if ($signatureStyle == '24') echo 'selected="yes"'; ?> >Medium 24 (312x92)</option>
		 <option value="25" <?php if ($signatureStyle == '25') echo 'selected="yes"'; ?> >Medium 25 (312x92)</option>
		<option value="26" <?php if ($signatureStyle == '26') echo 'selected="yes"'; ?> >Medium 26 (312x92)</option>
		 <option value="27" <?php if ($signatureStyle == '27') echo 'selected="yes"'; ?> >Medium 27 (312x92)</option>
		 <option value="28" <?php if ($signatureStyle == '28') echo 'selected="yes"'; ?> >Medium 28 (312x92)</option>
		 <option value="29" <?php if ($signatureStyle == '29') echo 'selected="yes"'; ?> >Medium 29 (312x92)</option>
		 <option value="30" <?php if ($signatureStyle == '30') echo 'selected="yes"'; ?> >Medium 30 (312x92)</option>		 
		 <option value="223" <?php if ($signatureStyle == '223') echo 'selected="yes"'; ?> >Premium Badge 1(131x182)</option>
		 <option value="224" <?php if ($signatureStyle == '224') echo 'selected="yes"'; ?> >Premium Badge 2(131x182)</option>
		 <option value="225" <?php if ($signatureStyle == '225') echo 'selected="yes"'; ?> >Premium Badge 3(131x182)</option>
		 <option value="226" <?php if ($signatureStyle == '226') echo 'selected="yes"'; ?> >Premium Badge 4(131x182)</option>
		 <option value="227" <?php if ($signatureStyle == '227') echo 'selected="yes"'; ?> >Premium Badge 5(131x182)</option>
		 <option value="228" <?php if ($signatureStyle == '228') echo 'selected="yes"'; ?> >Premium Badge 6(131x182)</option>
		 <option value="229" <?php if ($signatureStyle == '229') echo 'selected="yes"'; ?> >Premium Badge 7(131x182)</option>
		 <option value="230" <?php if ($signatureStyle == '230') echo 'selected="yes"'; ?> >Premium Badge 8(131x182)</option>
		 <option value="231" <?php if ($signatureStyle == '231') echo 'selected="yes"'; ?> >Premium Badge 9(131x182)</option>
		 <option value="232" <?php if ($signatureStyle == '232') echo 'selected="yes"'; ?> >Premium Badge 10(131x182)</option>
		<option value="220" <?php if ($signatureStyle == '220') echo 'selected="yes"'; ?> >Premium (iPhone Model)</option>
		<option value="211" <?php if ($signatureStyle == '211') echo 'selected="yes"'; ?> >Premium (iPOD Model 1)</option>
		<option value="212" <?php if ($signatureStyle == '212') echo 'selected="yes"'; ?> >Premium (iPOD Model 2)</option>
		<option value="213" <?php if ($signatureStyle == '213') echo 'selected="yes"'; ?> >Premium (iPOD Model 3)</option>
		<option value="214" <?php if ($signatureStyle == '214') echo 'selected="yes"'; ?> >Premium (iPOD Model 4)</option>
		<option value="215" <?php if ($signatureStyle == '215') echo 'selected="yes"'; ?> >Premium (iPOD Model 5)</option>
		<option value="216" <?php if ($signatureStyle == '216') echo 'selected="yes"'; ?> >Premium (iPOD Model 6)</option>
		<option value="217" <?php if ($signatureStyle == '217') echo 'selected="yes"'; ?> >Premium (iPOD Model 7)</option>
		<option value="218" <?php if ($signatureStyle == '218') echo 'selected="yes"'; ?> >Premium (iPOD Model 8)</option>
		<option value="219" <?php if ($signatureStyle == '219') echo 'selected="yes"'; ?> >Premium (iPOD Model 9)</option>		
		<option value="233" <?php if ($signatureStyle == '233') echo 'selected="yes"'; ?> >Premium Bubble Up 1(248x220)</option>
		<option value="234" <?php if ($signatureStyle == '234') echo 'selected="yes"'; ?> >Premium Bubble Up 2(248x220)</option>
		<option value="235" <?php if ($signatureStyle == '235') echo 'selected="yes"'; ?> >Premium Bubble Up 3(248x220)</option>
		<option value="236" <?php if ($signatureStyle == '236') echo 'selected="yes"'; ?> >Premium Bubble Up 4(248x220)</option>		 
		<option value="164" <?php if ($signatureStyle == '164') echo 'selected="yes"'; ?> >Premium (172x326)</option>
		<option value="165" <?php if ($signatureStyle == '165') echo 'selected="yes"'; ?> >Premium (172x326)</option>
		<option value="166" <?php if ($signatureStyle == '166') echo 'selected="yes"'; ?> >Premium (172x326)</option>
		<option value="167" <?php if ($signatureStyle == '167') echo 'selected="yes"'; ?> >Premium (172x326)</option>
		<option value="168" <?php if ($signatureStyle == '168') echo 'selected="yes"'; ?> >Premium (172x326)</option>
		<option value="169" <?php if ($signatureStyle == '169') echo 'selected="yes"'; ?> >Premium (172x326)</option>
		<option value="170" <?php if ($signatureStyle == '170') echo 'selected="yes"'; ?> >Premium (172x326)</option>
		<option value="171" <?php if ($signatureStyle == '171') echo 'selected="yes"'; ?> >Premium (172x326)</option>
		<option value="172" <?php if ($signatureStyle == '172') echo 'selected="yes"'; ?> >Premium (172x326)</option>
		<option value="173" <?php if ($signatureStyle == '173') echo 'selected="yes"'; ?> >Premium (172x326)</option>
		<option value="174" <?php if ($signatureStyle == '174') echo 'selected="yes"'; ?> >Premium (172x326)</option>
		<option value="176" <?php if ($signatureStyle == '176') echo 'selected="yes"'; ?> >Premium (172x326)</option>
		<option value="177" <?php if ($signatureStyle == '177') echo 'selected="yes"'; ?> >Premium (172x326)</option>
		<option value="178" <?php if ($signatureStyle == '178') echo 'selected="yes"'; ?> >Premium (172x326)</option>
		<option value="179" <?php if ($signatureStyle == '179') echo 'selected="yes"'; ?> >Premium (172x326)</option>
		<option value="180" <?php if ($signatureStyle == '180') echo 'selected="yes"'; ?> >Premium (172x326)</option>
		<option value="181" <?php if ($signatureStyle == '181') echo 'selected="yes"'; ?> >Premium (172x326)</option>
		<option value="182" <?php if ($signatureStyle == '182') echo 'selected="yes"'; ?> >Premium (172x326)</option>
		<option value="183" <?php if ($signatureStyle == '183') echo 'selected="yes"'; ?> >Premium (172x326)</option>
		<option value="184" <?php if ($signatureStyle == '184') echo 'selected="yes"'; ?> >Premium (172x326)</option>
		<option value="185" <?php if ($signatureStyle == '185') echo 'selected="yes"'; ?> >Premium (172x326)</option>
		<option value="186" <?php if ($signatureStyle == '186') echo 'selected="yes"'; ?> >Premium (320x252)</option>
		<option value="187" <?php if ($signatureStyle == '187') echo 'selected="yes"'; ?> >Premium (320x252)</option>
		<option value="188" <?php if ($signatureStyle == '188') echo 'selected="yes"'; ?> >Premium (320x252)</option>
		<option value="189" <?php if ($signatureStyle == '189') echo 'selected="yes"'; ?> >Premium (320x252)</option>
		<option value="190" <?php if ($signatureStyle == '190') echo 'selected="yes"'; ?> >Premium (320x252)</option>
		<option value="191" <?php if ($signatureStyle == '191') echo 'selected="yes"'; ?> >Premium (320x252)</option>
		<option value="192" <?php if ($signatureStyle == '192') echo 'selected="yes"'; ?> >Premium (320x252)</option>
		<option value="193" <?php if ($signatureStyle == '193') echo 'selected="yes"'; ?> >Premium (320x252)</option>
		<option value="194" <?php if ($signatureStyle == '194') echo 'selected="yes"'; ?> >Premium (320x252)</option>
		<option value="195" <?php if ($signatureStyle == '195') echo 'selected="yes"'; ?> >Premium (320x252)</option>
		<option value="196" <?php if ($signatureStyle == '196') echo 'selected="yes"'; ?> >Premium (320x252)</option>
		<option value="197" <?php if ($signatureStyle == '197') echo 'selected="yes"'; ?> >Premium (320x252)</option>
		<option value="198" <?php if ($signatureStyle == '198') echo 'selected="yes"'; ?> >Premium (320x252)</option>
		<option value="199" <?php if ($signatureStyle == '199') echo 'selected="yes"'; ?> >Premium (320x252)</option>
		<option value="200" <?php if ($signatureStyle == '200') echo 'selected="yes"'; ?> >Premium (320x252)</option>
		<option value="201" <?php if ($signatureStyle == '201') echo 'selected="yes"'; ?> >Premium (320x252)</option>
		<option value="202" <?php if ($signatureStyle == '202') echo 'selected="yes"'; ?> >Premium (320x252)</option>
		<option value="203" <?php if ($signatureStyle == '203') echo 'selected="yes"'; ?> >Premium (320x252)</option>
		<option value="204" <?php if ($signatureStyle == '204') echo 'selected="yes"'; ?> >Premium (320x252)</option>
		<option value="205" <?php if ($signatureStyle == '205') echo 'selected="yes"'; ?> >Premium (320x252)</option>
		<option value="206" <?php if ($signatureStyle == '206') echo 'selected="yes"'; ?> >Premium (320x252)</option>
		<option value="207" <?php if ($signatureStyle == '207') echo 'selected="yes"'; ?> >Premium (320x252)</option>
		<option value="208" <?php if ($signatureStyle == '208') echo 'selected="yes"'; ?> >Premium (320x252)</option>
		<option value="209" <?php if ($signatureStyle == '209') echo 'selected="yes"'; ?> >Premium (320x252)</option>
		<option value="210" <?php if ($signatureStyle == '210') echo 'selected="yes"'; ?> >Premium (320x252)</option>
				 
<?php
		echo '</select></label>';
			
	}

}// END class
	
	/**
	* Register  widget.
	*
	* Calls 'widgets_init' action after widget has been registered.
	*/
	function TwitterSignaturesInit() {
	register_widget('TwitterSignaturesWidget');
	}	
	add_action('widgets_init', 'TwitterSignaturesInit');
?>