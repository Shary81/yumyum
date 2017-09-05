<?php
/**
 * Template name: Contact Page
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 */

get_header(); 
	$errorMSG = '';
	$successMSG = '';
	if(isset($_POST['contactMSG'])){
		$uname = $_POST['uname'];
		$uemail = $_POST['uemail'];
		$usubject = $_POST['usubject'];
		$umessage = $_POST['umessage'];
		
		
		if(empty($uname) || empty($uemail) || empty($umessage) ){
			$errorMSG = esc_html__('Required : ', 'listingpro');
			if(empty($uname)){
				$errorMSG .= esc_html__('Name', 'listingpro');
			}
			if(empty($uemail)){
				$errorMSG .= esc_html__('Email', 'listingpro');
			}
			if(empty($umessage)){
				$errorMSG .= esc_html__('Message', 'listingpro');
			}
			
		}
		else{
			$successMSG = esc_html__('Your message send seccessfuly', 'listingpro');
			
			$admin_email = '';
			$admin_email = get_option( 'admin_email' );
			if(empty($usubject)){
				$usubject = esc_html__('Contact Us Email', 'listingpro');
			}
			$formated_mail_content = '<h3>'.esc_html__('Details : ', 'listingpro').'</h3>';
			$formated_mail_content .= '<p>'.esc_html__('Name : '.$uname, 'listingpro').'</p>';
			$formated_mail_content .= '<p>'.esc_html__('Email : '.$uemail, 'listingpro').'</p>';
			$formated_mail_content .= '<p>'.esc_html__('Message : '.$umessage, 'listingpro').'</p>';
			
			$headers[] = 'Content-Type: text/html; charset=UTF-8';
			$headers[] = 'From: '.$uname.' <'.$uemail.'>';
			wp_mail( $admin_email, $usubject, $formated_mail_content, $headers);
			
		}
	}


	
	global $listingpro_options;
	$addressTitle = $listingpro_options['Address'];
	$cp_address = $listingpro_options['cp-address'];
	$cp_number = $listingpro_options['cp-number'];
	$cp_email = $listingpro_options['cp-email'];
	$cp_social_links = $listingpro_options['cp-social-links'];
	$formTitle = $listingpro_options['form-title'];
	$cpSuccessMessage = $listingpro_options['cp-success-message'];
	$cpFailedMessage = $listingpro_options['cp-failed-message'];
	$cpLat = $listingpro_options['cp-lat'];
	$cpLan = $listingpro_options['cp-lan'];

?>
		<!--==================================Section Open=================================-->
	<section class="clearfix">
		<div class="contact-left">
			<div class="cp-lat" data-lat="<?php echo esc_attr($cpLat); ?>"></div>
			<div class="cp-lan" data-lan="<?php echo esc_attr($cpLan); ?>"></div>
			<div id="map" class="contactmap">
			</div>
		</div>
		<div  class=" padding-top-60 padding-bottom-70 contact-right">
			<h3 class=" lp-border-bottom padding-bottom-20 margin-bottom-20"><?php echo esc_attr($addressTitle); ?></h3>
			<div class="address-box mr-bottom-30">
				<p>
					<i class="fa fa-map-marker"></i>
					<span><?php echo esc_attr($cp_address); ?></span>
				</p>
				<p>
					<i class="fa fa-phone"></i>
					<span><?php echo esc_attr($cp_number); ?></span>
				</p>
				<p>
					<i class="fa fa-envelope"></i>
					<span><?php echo esc_attr($cp_email); ?></span>
				</p>
				<?php if($cp_social_links == 1){ ?>
					<ul class="social-icons post-socials contact-social">
						<li>
							<a href="#"><!-- Facebook icon by Icons8 -->
								<?php echo listingpro_icons('fb'); ?>
							</a>
						</li>
						<li>
							<a href="#"><!-- Google Plus icon by Icons8 -->
								<?php echo listingpro_icons('gp'); ?>
							</a>
						</li>
						<li>
							<a href="#"><!-- LinkedIn icon by Icons8 -->
								<?php echo listingpro_icons('lnk'); ?>
							</a>
						</li>
						<li>
							<a href="#"><!-- Instagram icon by Icons8 -->
								<?php echo listingpro_icons('insta'); ?>
							</a>
						</li>
						<li>
							<a href="#"><!-- Tumblr icon by Icons8 -->
								<?php echo listingpro_icons('tw'); ?>
							</a>
						</li>
					</ul><!-- ../social-icons-->
				<?php } ?>
			</div>
			<h3 class="margin-top-60 margin-bottom-30 lp-border-bottom padding-bottom-20"><?php echo esc_attr($formTitle); ?></h3>
				
			<form class="form-horizontal" id="contactMSG" name="contactMSG" method="post" novalidate="novalidate" action="">
				<div class="form-group">
				  <div class="col-sm-6">
					<input class="form-control nameform" id="name" name="uname" placeholder="<?php esc_html_e('Name:','listingpro'); ?>" type="text" value="" required="">
				  </div>
				  <div class="col-sm-6">          
					<input class="form-control" id="email" name="uemail" placeholder="<?php esc_html_e('Email:','listingpro'); ?>" type="email" required="">
				  </div>
				</div>
				<div class="form-group">
				  <div class="col-sm-12">          
					<input class="form-control" id="subject" name="usubject" placeholder="<?php esc_html_e('Subject:','listingpro'); ?>" type="text">
				  </div>
				</div>
				<div class="form-group mr-bottom-20">
				  <div class="col-sm-12">          
				<textarea class="form-control" rows="5" id="message" name="umessage" placeholder="<?php esc_html_e('Message:','listingpro'); ?>"></textarea>
				  </div>
				</div>
				<div class="form-group">        
				  <div class="col-sm-12">							
					<input type="submit" id="contactMSG" name="contactMSG" value="<?php esc_html_e('Send Message','listingpro'); ?>" class="lp-review-btn btn-second-hover">

				  </div>
				</div>
			
			<div id="success">
				<span class="green textcenter">
					<p><?php echo esc_html($successMSG); ?></p>
				</span>
			</div>

			<div id="error">
				<span>
					<p><?php echo esc_html($errorMSG); ?></p>
				</span>
			</div>
			</form>
		</div>
	</section>
	<!--==================================Section Close=================================-->
	
			
<?php 
get_footer();
?>