<?php /* Smarty version 2.6.13, created on 2014-04-08 08:24:06
         compiled from header.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<!-- Meta -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!-- End of Meta -->		
<!-- Page title -->
<title><?php echo $this->_tpl_vars['title']; ?>
</title>
<!-- End of Page title -->		
<!-- Libraries -->
<link type="text/css" href="./css/layout.css" rel="stylesheet" />
<link type="text/css" href="./css/examples.css" rel="stylesheet" />			
<script type="text/javascript" src="./jscripts/jquery-1.js"></script>
<script type="text/javascript" src="./jscripts/easyTooltip.js"></script>
<script type="text/javascript" src="./jscripts/jquery-ui-1.js"></script>
<script type="text/javascript" src="./jscripts/jquery.js"></script>
<script type="text/javascript" src="./jscripts/hoverIntent.js"></script>
<script type="text/javascript" src="./jscripts/superfish.js"></script>
<script type="text/javascript" src="./jscripts/custom.js"></script>
<script type="text/javascript" src="../jscripts/jquery-impromptu.1.5.js"></script>
<!-- End of Libraries -->	
</head>
<body>
		<div id="container">		
			<!-- Header -->
			<div id="header">				
				<!-- Top -->
				<div id="top">
					<!-- Logo -->
					<div class="logo"> 
						<a href="<?php echo @URL_HOMEPAGE; ?>
/cms" title="Administration Home" class="tooltip"><img src="images/logo.png" alt="Administrator Home"></a> 
					</div>
					<!-- End of Logo -->
<!-- Meta information -->
					<div class="meta">
						<p>Chào <?php echo $_SESSION['logined_information_detail']['Admin_Name']; ?>
! </p>
						<ul>
							<li><a href="?module=logout" title="Thoát" class="tooltip"><span class="ui-icon ui-icon-power"></span>Thoát</a></li>
							<li><a href="?module=cms&a=edit_admin&id=<?php echo $_SESSION['logined_information_detail']['Admin_ID']; ?>
" title="Th&ocirc;ng tin t&agrave;i kho&#7843;n" class="tooltip"><span class="ui-icon ui-icon-person"></span>Th&ocirc;ng tin t&agrave;i kho&#7843;n</a></li>
						</ul>	
					</div>
					<!-- End of Meta information -->
				</div>
				<!-- End of Top-->
			
				<!-- The navigation bar -->
				<div id="navbar">
					<ul class="nav sf-js-enabled sf-shadow">
						<li><a href="<?php echo @URL_HOMEPAGE; ?>
/cms">Trang chủ</a></li>
						<?php if ($_SESSION['logined_information_detail']['IsAdmin'] == 1): ?>
						<li class="">
							<a class="sf-with-ul" href="?module=cms">Qu&#7843;n tr&#7883; h&#7879; th&#7889;ng</a>
							<ul style="display: none; visibility: hidden;">
								<li><a href="?module=cms&a=admin_manager">Danh s&aacute;ch qu&#7843;n tr&#7883;</a></li>
								<li><a href="?module=cms&a=add_admin">Th&ecirc;m qu&#7843;n tr&#7883; vi&ecirc;n</a></li>
								<li><a href="?module=setting&a=setting_manager">C&#7845;u h&igrave;nh</a></li>
								<li><a href="?module=cms&a=system_diary">Nh&#7853;t k&yacute; h&#7879; th&#7889;ng</a></li>
							</ul>
						</li>
						<?php endif; ?>
						<?php $_from = $this->_tpl_vars['list_module']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['list_module'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['list_module']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['list_module']):
        $this->_foreach['list_module']['iteration']++;
?>							
								<?php echo $this->_tpl_vars['list_module']['Summary']; ?>

						<?php endforeach; endif; unset($_from); ?>
						<li><a href="?module=logout">Thoát</a></li>
					</ul>
				</div>				
			</div>
			<!-- End of Header -->