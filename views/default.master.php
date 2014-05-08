<?php echo '<?xml version="1.0" encoding="utf-8"?>'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-ca">
<head>  



<?php $this->RenderAsset('Head'); 
$this->AddJsFile('themes/RedWood/js/jquery.cleditor.min.js');
?>

<script type="text/javascript">
 var RecaptchaOptions = {
    theme : 'blackglass'
 };
 </script>

 
</head>
<body id="<?php echo $BodyIdentifier; ?>" class="<?php echo $this->CssClass; ?>">
   <div id="Frame">
      <div id="Head"><h1><span><?php echo Gdn_Theme::Logo(); ?></span></a></h1>
         <div class="Menu">
				
            <?php
			      $Session = Gdn::Session();
					if ($this->Menu) {
						$this->Menu->AddLink('Dashboard', T('Dashboard'), '/dashboard/settings', array('Garden.Settings.Manage'));
						// $this->Menu->AddLink('Dashboard', T('Users'), '/user/browse', array('Garden.Users.Add', 'Garden.Users.Edit', 'Garden.Users.Delete'));
						  $this->Menu->AddLink('Home', T('Home'), '/');
                                                  $this->Menu->AddLink('Home', T('Activity'), '/activity');
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
         <div id="Panel"><?php $this->AddModule('MeModule');?>
<div class="Search"><?php
					$Form = Gdn::Factory('Form');
					$Form->InputPrefix = '';
					echo 
						$Form->Open(array('action' => Url('/search'), 'method' => 'get')),
						$Form->TextBox('Search'),
						$Form->Button('Go', array('Name' => '')),
						$Form->Close();
				?></div>


<?php $this->RenderAsset('Panel'); ?>

</div>
      </div>
      
</div>

   </div>
<script type="text/javascript"> $(document).ready(function() {
   $(".Attachment a").attr("target", '_blank');
   
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
<div id="Foot">
<div id="FootMenu"></div>
<?php $this->RenderAsset('Foot'); echo Wrap(Anchor(T('Vanilla Theme by VrijVlinder'), C('Garden.VanillaUrl'),array('target' => '_blank')), 'div');?> </div>
	<?php $this->FireEvent('AfterBody'); ?>
</body>
</html>