<?php /* Smarty version 2.6.13, created on 2014-04-11 18:32:13
         compiled from signin.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $this->_tpl_vars['title']; ?>
</title>
<link href="css/login.css" rel="stylesheet" type="text/css">
<link href="css/examples.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../jscripts/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="../jscripts/jquery-impromptu.1.5.js"></script>
</head>
<body >
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>TERMINATOR: Login Page</title>
		<link rel="stylesheet" href="screen.css" type="text/css"/>
	</head>
	<body class="login">
		<div class="login-box">
			<div class="login-border">
				<div class="login-style">
					<div class="login-header">
						<div class="logo clear">
							<img src="images/logo_earth_bw.png" alt="" class="picture" />
							<span class="textlogo">
								<span class="title">ADMINISTRATOR LOGIN</span>
							</span>		
						</div>
					</div>
					 <form id="form1g" name="frm_login" method="post" enctype="multipart/form-data" onsubmit="return checklogin(frm_login);" >				
						<div class="login-inside">
							<div class="login-data">
								<div class="row clear">
									<label for="user">Username:</label>
										<input type="text" value="" size="25" class="text" id="username" name="username" />
									</div>
								<div class="row clear">
									<label for="password">Password:</label>
									<input type="password" value="" size="25" class="text" id="password" name="password" />
								</div>
								<input type="submit" class="button" value="Login" name="btn_submit" id="btn_submit" />
							</div>
							 	<?php if ($this->_tpl_vars['warning']): ?>
									<div id="messages"> 
										<font style="color:red;font-weight:bold;"><?php echo $this->_tpl_vars['warning']; ?>
</font>
									</div>
								<?php endif; ?>
						</div>
						<div class="login-footer clear">
							<p><strong><center>&copy; 2010 Copyright by <a href="#" >Friends Group.</a></strong> All rights reserved.</center></p> 
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>
<?php echo '
<script language="javascript">
function checklogin(form)
{
	if(form.username.value=="")
	{
		form.onclick = $.prompt(\'Vui lòng nhập tên đăng nhập\');
		form.username.focus();
		return false;
	}
	if(form.password.value=="")
	{
		form.onclick = $.prompt(\'Vui lòng nhập mật khẩu\');
		form.password.focus();
		return false;
	}	
}
</script>
'; ?>

</body>
</html>