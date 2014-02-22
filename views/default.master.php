<?php echo '<?xml version="1.0" encoding="utf-8"?>'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-ca">
<head> <?php $this->RenderAsset('Head'); ?>
<script type="text/javascript">
 var RecaptchaOptions = {
    theme : 'blackglass'
 };
 </script> 

</head>
<body id="<?php echo $BodyIdentifier; ?>" class="<?php echo $this->CssClass; ?>">
   <div id="Frame">
      <div id="Head">
<h1><span><?php echo Gdn_Theme::Logo(); ?></span></a></h1>
         <div class="Menu">
				
            <?php
			      $Session = Gdn::Session();
					if ($this->Menu) {
						$this->Menu->AddLink('Dashboard', T('Dashboard'), '/dashboard/settings', array('Garden.Settings.Manage'));
						// $this->Menu->AddLink('Dashboard', T('Users'), '/user/browse', array('Garden.Users.Add', 'Garden.Users.Edit', 'Garden.Users.Delete'));
						  
                                                $this->Menu->AddLink('Home', T('Home'), '/');
                                                 $this->Menu->AddLink('Home', T('New Discussion'), 'post/discussion', array('target'=>'_blank'));
                                                $this->Menu->AddLink('Home', T('Activity'), '/activity');
                                                
                                                
                                                $this->Menu->AddLink('Home', T('Bonk'), 'plugin/Bonk', array('Garden.Settings.Manage'),array(),array('target'=>'_blank'));
                                                $this->Menu->AddLink('Home', T('Facebook'), 'http://www.facebook.com/DrugPossessionLaws');
                                               
                                                
                                       
                                                $this->Menu->AddLink('Home', T('Mobile View'), 'profile/mobile');
                                                $this->Menu->AddLink('Home', T('Privacy'), 'plugin/PrivacyNotice');
                                          $Authenticator = Gdn::Authenticator();
			         $Authenticator = Gdn::Authenticator();
						if ($Session->IsValid()) {
							$Name = $Session->User->Name;
							$CountNotifications = $Session->User->CountNotifications;
							if (is_numeric($CountNotifications) && $CountNotifications > 0)
								$Name .= ' <span>'.$CountNotifications.'</span>';
								
							$this->Menu->AddLink('User', $Name, '/profile/{UserID}/{Username}', array('Garden.SignIn.Allow'), array('class' => 'UserNotifications'));
							$this->Menu->AddLink('SignOut', T('Sign Out'), $Authenticator->SignOutUrl(), FALSE, array('class' => 'NonTab SignOut'));
						} else {
							$Attribs = array();
							if (C('Garden.SignIn.Popup') && strpos(Gdn::Request()->Url(), 'entry') === FALSE)
								$Attribs['class'] = 'SignInPopup';
								
							$this->Menu->AddLink('Entry', T('Sign In'), $Authenticator->SignInUrl($this->SelfUrl), FALSE, array('class' => 'NonTab'), $Attribs);
						}
						echo $this->Menu->ToString();
					}
				?>
           
         </div>
      </div>
      <div id="Body">
         <div id="Content"><?php $this->RenderAsset('Content'); ?></div>
         <div id="Panel">
<!-- Begin TranslateThis Button -->

<div id="translate-this"><a style="width:100%!important;height:25px;display:block;" class="translate-this-button" href="http://www.translatecompany.com/" title="Translate">Translate Company</a></div></br>

<script type="text/javascript" src="http://x.translateth.is/translate-this.js"></script>
<script type="text/javascript">
TranslateThis();
</script>

<!-- End TranslateThis Button -->
<div class="Search"><p><?php
					$Form = Gdn::Factory('Form');
					$Form->InputPrefix = '';
					echo 
						$Form->Open(array('action' => Url('/search'), 'method' => 'get')),
						$Form->TextBox('Search'),
						$Form->Button('Go', array('Name' => '')),
						$Form->Close();
				?></div></p>
<p><ul id="menu-bar">
 <li><a href="#">I N D E X</a>
   <ul>
 
   <li><a href="http://vanillaforums.org/" target="_blank">Vanilla</a></li>
   <li><a href="http://www.drugpossessionlaws.com/" target="_blank">Main Site</a></li>
   <li><a href="http://www.facebook.com/DrugPossessionLaws/" target="_blank">Facebook</a></li>
   <li><a href="https://www.facebook.com/DrugPossessionLaws/app_190322544333196/" target="_blank">Facebook Forum</a></li>
  </ul>
 </li>
 </ul>
</p>
<?php $this->RenderAsset('Panel'); ?>
<center><p><img src="http://www.drugpossessionlaws.com/forum/themes/GreenGlass/design/images/logo1.png" width="250" height="auto"/></p><p>
<iframe id="onlineRadioFrame" frameborder="0" width="250" height="292" scrolling="no" src="http://radiotuna.com/OnlineRadioPlayer/Player?showPopupControl=true&amp;playerParams={'styleSelection0':29,'styleSelection1':2,'styleSelection2':7,'textColor':12517120,'backgroundColor':2314512,'buttonColor':10419978,'glowColor':10419978,'playerSize':250,'playerType':'style'}&amp;linkText=internet%20radio&amp;linkDest=http://radiotuna.com/" allowtransparency="true" style="border:none;border-radius:10px;"></iframe></p>
 </center>     </div>
      <div id="Foot">
<div id="FootMenu">
				
            <?php
			      $Session = Gdn::Session();
					if ($this->Menu) {
						$this->Menu->AddLink('Categories', T('Categories'), 'categories/all');
                                                $this->Menu->AddLink('Discussions', T('Discussions'), '/discussions');
                                                $this->Menu->AddLink('Home', T('Home'), '/');
                                                $this->Menu->AddLink('New Discussion',T('New Discussion'),'/post/discussion', array('Garden.SignIn.Allow'), array(), array('target' => '_blank')); 
                                                  
                                                $this->Menu->AddLink('Mobile View', T('Mobile View'), 'profile/mobile');
                                                
                                                $this->Menu->AddLink('Facebook', T('Facebook'), 'http://www.facebook.com/DrugPossessionLaws');
                                                
                                                
			         }echo $this->Menu->ToString();?>
				
           
         </div></br>

<p id="back-top" style="float: right;top:0px; display: inline-block; position:relative;margin-right:0px;"><a href="#top" title="Back to Top"><img src="http://vrijvlinder.com/forum/themes/VrijVlinder/design/images/back-up1.png"></a></p>
   <?php $this->RenderAsset('Foot'); 
echo Wrap(Anchor(T('Vanilla Theme by VrijVlinder'), C('Garden.VanillaUrl'),array('target' => '_blank')), 'div');	
?></div>
<script type="text/javascript"> $(document).ready(function() {
    $(".Attachment a").attr("target", '_blank');
   $("#Foot #Menu a").attr("target", '_blank');
   $(".AptAdImg a").attr("target", '_blank');
  $('#Menu ul li:nth-child(9) > a').popup(); 

 $("#Foot #Menu li:last > a").popup();

});
</script>
<script type="text/javascript">
$(document).ready(function() {

	$("#back-top").hide();
	
	// fade in #back-top
	$(function () {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 100) {
				$('#back-top').fadeIn();
			} else {
				$('#back-top').fadeOut();
			}
		});

		// scroll body to 0px on click
		$('#back-top a').click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
	});

});
</script>
<script type="text/javascript">
var ddmenuitem = 0;
var menustyles = { "visibility":"visible", "display":"block", "z-index":"9"}

function Menu_close()
{  if(ddmenuitem) { ddmenuitem.css("visibility", "hidden"); } }

function Menu_open()
{  Menu_close();
   ddmenuitem = $(this).find("ul").css(menustyles);
}

jQuery(document).ready(function()
{  $("ul#Menu > li").bind("mouseover", Menu_open);
   $("ul#Menu > li").bind("mouseout", Menu_close);
});

document.onclick = Menu_close;</script>

	<?php $this->FireEvent('AfterBody'); ?>
</body>

</html>