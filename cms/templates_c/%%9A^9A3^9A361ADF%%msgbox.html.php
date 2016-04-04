<?php /* Smarty version 2.6.13, created on 2014-04-08 08:28:02
         compiled from msgbox.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="refresh" content="<?php echo $this->_tpl_vars['time']; ?>
;url=<?php echo $this->_tpl_vars['goto']; ?>
" />
<title>Thông báo</title>
</head>
<!-- Background wrapper -->
<body>
			<div id="bgwrap">		
				<!-- Main Content -->
				<div id="content">
					<div id="main">
						<h1>Thông báo từ hệ thống</span>!</h1>
						<?php if ($this->_tpl_vars['type'] == 1): ?>
							<div class="message success">
							<h2>Thành công!</h2>							
						<?php elseif ($this->_tpl_vars['type'] == 2): ?>
							<div class="message warning">
							<h2>Cảnh báo!</h2>							
						<?php elseif ($this->_tpl_vars['type'] == 3): ?>
							<div class="message error">
							<h2>Lỗi!</h2>							
						<?php else: ?>
							<div class="message information">							
							<h2>Thông tin!</h2>
						<?php endif; ?>
						<p><?php echo $this->_tpl_vars['thongbao']; ?>
</p>
						</div>
        	</div>
				</div>
				<!-- End of Main Content -->		
</body>
</html>