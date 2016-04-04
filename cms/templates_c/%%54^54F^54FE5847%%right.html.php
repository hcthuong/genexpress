<?php /* Smarty version 2.6.13, created on 2014-04-08 08:24:06
         compiled from right.html */ ?>
	<!-- Sidebar -->
				<div id="sidebar">					
					<!-- Lists -->
					<h2>Danh sách chức năng</h2>
					<ul>
						<?php if ($_SESSION['logined_information_detail']['IsAdmin'] == 1): ?>
						<li>
							<a href="?module=cms"><b>Qu&#7843;n tr&#7883; h&#7879; th&#7889;ng</b></a>
							<ul>
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
								<?php echo $this->_tpl_vars['list_module']['Description']; ?>

						<?php endforeach; endif; unset($_from); ?>
						<li><a href="?module=logout"><b>Thoát</b></a></li>
					</ul>
					<!-- End of Lists -->					
				</div>
				<!-- End of Sidebar -->				
			</div>
			<!-- End of bgwrap -->
		</div>
		<!-- End of Container -->