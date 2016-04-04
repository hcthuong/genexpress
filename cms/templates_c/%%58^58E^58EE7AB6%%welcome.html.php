<?php /* Smarty version 2.6.13, created on 2014-04-08 11:05:54
         compiled from welcome.html */ ?>
<!-- Background wrapper -->
			<div id="bgwrap">
		
				<!-- Main Content -->
				<div id="content">
					<div id="main">
					<h1>Chào, <span><?php echo $_SESSION['logined_information_detail']['Admin_Name']; ?>
</span>!</h1>
					<p>Bạn muốn bắt đầu từ chức năng nào?</p>
					
					<div class="pad20">
					<!-- Big buttons -->
						<?php if ($this->_tpl_vars['list_module']): ?>
						<ul class="dash">
							<?php if ($_SESSION['logined_information_detail']['IsAdmin'] == 1): ?>
							<li>
								<a href="?module=cms" title="Danh s&aacute;ch qu&#7843;n tr&#7883;" class="tooltip">
									<img src="images/16_48x48.png" alt="">
									<span>Danh s&aacute;ch qu&#7843;n tr&#7883;</span>
								</a>
							</li>
							<li>
								<a href="?module=cms&a=add_admin" title="Th&ecirc;m qu&#7843;n tr&#7883; vi&ecirc;n" class="tooltip">
									<img src="images/users_add.png" alt="">
									<span>Th&ecirc;m qu&#7843;n tr&#7883;</span>
								</a>
							</li>
							<li>
								<a href="?module=cms&a=system" title="Nh&#7853;t k&yacute; h&#7879; th&#7889;ng" class="tooltip">
									<img src="images/accessories-text-editor.png" alt="">
									<span>Nh&#7853;t k&yacute; h&#7879; th&#7889;ng</span>
								</a>
							</li>
							<li>
								<a href="?module=setting&a=setting_manager" title="C&#7845;u h&igrave;nh" class="tooltip">
									<img src="images/preferences-system.png" alt="">
									<span>C&#7845;u h&igrave;nh</span>
								</a>
							</li>
							<?php endif; ?>
							<?php $_from = $this->_tpl_vars['list_module']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['list_module_content'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['list_module_content']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['list_module_content']):
        $this->_foreach['list_module_content']['iteration']++;
?>							
								<?php echo $this->_tpl_vars['list_module_content']['Act']; ?>

							<?php endforeach; endif; unset($_from); ?>
							<li>
								<a href="?module=logout" title="Tho&aacute;t" class="tooltip">
									<img src="images/Exit.png" alt="">
									<span>Tho&aacute;t</span>
								</a>
							</li>
						</ul>
						<!-- End of Big buttons -->
						<?php else: ?>
						<div class="message warning">
							<h2>Thông báo!</h2>
							<p>Bạn chưa được cấp quyền quản trị chức năng của Website</p>
						</div>
						<?php endif; ?>
					</div>				
					<hr>					
					<div class="pad20">
									<table class="fullwidth" border="0" cellpadding="0" cellspacing="0">
										<tbody>
										<thead><tr><td colspan="2">Thông tin</td></tr></thead>
										<tr><td colspan="2"> </td></tr>
									  	<tr class="odd"><td >IP Server:</td><td><?php echo $this->_tpl_vars['ip_server']; ?>
</td></tr>
										<tr class="odd"><td>IP truy cập:</td><td><?php echo $this->_tpl_vars['ip']; ?>
</td></tr>
										<tr class="odd"><td>Tên miền:</td><td><?php echo $this->_tpl_vars['domain']; ?>
</td></tr>
										<tr class="odd"><td>Đường dẫn website:</td><td><?php echo $this->_tpl_vars['path_site']; ?>
</td></tr>
										<tr class="odd"><td>Đường dẫn tuyệt đối:</td><td><?php echo $this->_tpl_vars['path_physical']; ?>
</td></tr>
										<tr class="odd"><td>Giao thức giữa máy chủ và PHP:</td><td><?php echo $this->_tpl_vars['protocol']; ?>
</td></tr>
										<tr class="odd"><td>Hệ điều hành máy chủ:</td><td><?php echo $this->_tpl_vars['os']; ?>
</td></tr>
										<tr class="odd"><td>Phiên bản PHP:</td><td><?php echo $this->_tpl_vars['apache_version']; ?>
</td></tr>
										<tr class="odd"><td>Tên website:</td><td><?php echo $this->_tpl_vars['sitename']; ?>
</td></tr>		
										<tr class="odd"><td>Tổng quản trị viên:</td><td><?php echo $this->_tpl_vars['numadmin']; ?>
</td></tr>	  	
										</tbody>
									</table>
					</div>					
					</div>
				</div>
				<!-- End of Main Content -->