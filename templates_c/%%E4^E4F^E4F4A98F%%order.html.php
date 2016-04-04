<?php /* Smarty version 2.6.13, created on 2013-06-14 08:21:08
         compiled from default/product/order.html */ ?>
<link href="<?php echo @URL_HOMEPAGE; ?>
/css/examples.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo @URL_HOMEPAGE; ?>
/jscripts/jquery-impromptu.1.5.js"></script>
<?php echo '
<script language="javascript">
var r={
  \'notnumbers\':/[^\\d\\.\\-]/g
}

function valid(o,w){
  o.value = o.value.replace(r[w],\'\');
}
</script>
'; ?>

<!--	
<div id="content">
                	<div id="block">
           	    		<h6><img align="absmiddle" src="<?php echo @URL_HOMEPAGE; ?>
/templates/<?php echo $this->_tpl_vars['template']; ?>
/images/ico3.png" />&nbsp;&nbsp;<?php echo @_ORDER; ?>
									</h6>
<ul id="news">
							<li>
						<table width="100%" border="0" cellspacing="0" cellpadding="0"><tbody>                             
                              <tr>
                             	<td colspan="5" valign="top" align="left">
                                              <table width="100%" border="1" cellpadding="0" cellspacing="0" style="border-collapse:collapse; border-color:#000;">
                                               <tr  height="27px;" id="bg_pink">                                               												
                                                  <td width="" style="text-align:center"><?php echo @_PRODUCT_NAME; ?>
</td>
                                                  <td width="" style="text-align:center"><?php echo @_PRODUCT_CODE; ?>
</td>											
                                                  <td width="" style="text-align:center"><?php echo @_PRICE; ?>
</td>
                                                  <td width="" style="text-align:center"><?php echo @_AMOUNT; ?>
</td>
                                                  <td width="" style="text-align:center"><?php echo @_TOTAL; ?>
</td>
                                                </tr>
                                                 <?php $_from = $this->_tpl_vars['incart']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['incart'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['incart']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['incart']):
        $this->_foreach['incart']['iteration']++;
?>  
                                                <tr  height="20px;"> 
                                                  <td width="" valign="middle" id="left_pad"><?php echo $this->_tpl_vars['incart']['Product_Name']; ?>
</td>
												  <td width="" valign="middle" id="left_pad"><?php echo $this->_tpl_vars['incart']['Product_Code']; ?>
</td>
                                                  <td width="" valign="middle" align="right" id="right_pad"><?php if ($this->_tpl_vars['incart']['Price'] == 0): ?>Call<?php else:  echo $this->_tpl_vars['incart']['Price']; ?>
 VNĐ<?php endif; ?></td>
                                                  <td width="" valign="middle" align="center"><?php echo $this->_tpl_vars['incart']['Amount']; ?>

												  </td>
                                                  <td width="" valign="middle" align="right" id="right_pad"><?php if ($this->_tpl_vars['incart']['Money'] == 0): ?>Call<?php else:  echo $this->_tpl_vars['incart']['Money']; ?>
 VNĐ<?php endif; ?></td>                                                  
                                                </tr>
                                                <?php endforeach; endif; unset($_from); ?>                                                      
                                                <tr height="27px;">
                                                  <td colspan="4" align="right" valign="middle">
                                                        <span><b><?php echo @_SUM_TOTAL; ?>
:&nbsp;</b></span> 
													</td>
												 <td colspan="1" align="right" valign="middle" id="right_pad" class="dausao">
												 <span>&nbsp;<?php if ($this->_tpl_vars['total_money'] == 0): ?>Call<?php else:  echo $this->_tpl_vars['total_money']; ?>
 VNĐ<?php endif; ?></span>                                    
                                                  </td>
                                                </tr>																								
                                            </table>                                     
                                </td>
                              </tr></tbody></table><br />				
					  <table width="100%" border="0" cellspacing="0" cellpadding="0">                             
							 <tr>
                              	<td colspan="5" valign="top" align="left" width="">
                                	<table width="550px" border="0" cellpadding="0" cellspacing="0">                                                                           
                                       <form method="post" name="frm_order" enctype="multipart/form-data" onSubmit="return check_value(frm_order);"> 
                                      <tr>
                                        <td width="11"></td>
                                        <td width="151" align="left" valign="middle" class="link_dathang"><?php echo @_FULL_NAME; ?>
:<span class="dausao">*</span></td>
                                        <td colspan="4"><input name="fullname" id="fullname" value="<?php echo $_SESSION['order']['fullname']; ?>
" type="text" class="textbox_dh" maxlength="100"/></td>
                                      </tr>                                     
                                      
                                      <tr><td colspan="6" height="5"></td></tr>
                                      
                                      <tr>
                                        <td width="11">&nbsp;</td>
                                        <td width="151" align="left" valign="middle" class="link_dathang"><?php echo @_ADDRESS; ?>
:<span class="dausao">*</span></td>
                                        <td colspan="4"><input name="address" id="address" value="<?php echo $_SESSION['order']['address']; ?>
" type="text" class="textbox_diachi" maxlength="255"/></td>
                                      </tr>
                                      
                                      <tr><td colspan="6" height="5"></td></tr>
                                      
                                      <tr>
                                        <td width="11">&nbsp;</td>
                                        <td width="151" align="left" valign="middle" class="link_dathang"><?php echo @_EMAIL; ?>
:<span class="dausao">*</span></td>
                                        <td colspan="4"><input name="email" id="email" value="<?php echo $_SESSION['order']['email']; ?>
" type="text" class="textbox_dh" maxlength="50"/></td>
                                      </tr>
                                      
                                      <tr><td colspan="6" height="5"></td></tr>
                                      
                                      <tr>
                                        <td width="11">&nbsp;</td>
                                        <td width="151" align="left" valign="middle" class="link_dathang"><?php echo @_PHONE; ?>
:<span class="dausao">*</span>                                                        </td>
                                        <td colspan="4"><input name="phone" id="phone" value="<?php echo $_SESSION['order']['phone']; ?>
" type="text" class="textbox_dh" onkeyup="valid(this,'notnumbers')" onblur="valid(this,'notnumbers')" maxlength="20"/></td>
                                      </tr>                                                                                                                                                    
                                      <tr><td colspan="6" height="5"></td></tr>                                         
                                                      <tr><td colspan="6" height="10"></td></tr>
                                                      
                                                      <tr>
                                                        <td width="11">&nbsp;</td>
                                                        <td width="151" align="left" valign="top" class="link_dathang"><?php echo @_REQUIRES; ?>
: </td>
                                       				  <td colspan="">
                                                            <textarea name="content_1" id="content_1" cols="45" rows="3"><?php echo $_SESSION['order']['requirements']; ?>
</textarea>
                                                        </td>
                                                      </tr>
                                                      
                                                      <tr><td colspan="6" height="5"></td></tr>
                                                      
                                                      <tr>
                                                        <td width="11" align="left" valign="top">&nbsp;</td>
                                                        <td width="151" align="left" valign="middle" class="link_dathang"><?php echo @_VERIFY_CODE; ?>
:<span class="dausao">*</span>                                                        </td>
                                                        <td colspan="4" align="left" valign="middle">
                                                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                          <tr>
                                                            <td width="100"><input type="text" name="txt_verify_register" id="txt_verify_register" maxlength="6" size="4"></td>
															<td width="780"><img src="<?php echo @URL_HOMEPAGE; ?>
/antiflood.php" ></td>
                                                          </tr>
                                                        </table>                                    	
                                                       </td>
                                                      </tr>
                                                      
                                                      <tr><td colspan="6" height="5"></td></tr>
                                                      
                                                      <tr>
                                                        <td width="11">&nbsp;</td>
                                                        <td width="151">&nbsp;</td>
                                                        <td colspan="4">                                                        	
                                                        		<input type="image" src="<?php echo @URL_HOMEPAGE; ?>
/templates/<?php echo $this->_tpl_vars['template']; ?>
/images/gui_bnt.jpg" width="46" height="23" />
																<input type="hidden" value="1" name="send" id="send" />
                                                        </td>
                                                      </tr>
                                                      </form>
                                                      <tr><td colspan="6" height="10"></td></tr>
                                                  </table>
                                </td>
                              </tr>                                                   
                            </table>           
					</div>
                </li>
						</ul>
						</div>
</div>
-->
<div class="product">
	<h3><span> <?php echo @_ORDER; ?>
 </span></h3>
	<div class="frame_product" align="center">
    	<table width="100%" border="0" cellspacing="0" cellpadding="0"><tbody>                             
                              <tr>
                             	<td colspan="5" valign="top" align="center">
                                              <table width="80%" border="1" cellpadding="0" cellspacing="0" style="border-collapse:collapse; border-color:#000;">
                                               <tr bgcolor="#96DCEB">                                               												
                                                  <td width="10"><b><?php echo @_STT; ?>
</b></td>
                                                  <td width="" style="text-align:center"><b><?php echo @_PRODUCT_NAME; ?>
</b></td>
                                                  <td width="" style="text-align:center"><b><?php echo @_PRODUCT_CODE; ?>
</b></td>											
                                                  <td width="" style="text-align:center"><b><?php echo @_PRICE; ?>
</b></td>
                                                  <td width="" style="text-align:center"><b><?php echo @_AMOUNT; ?>
</b></td>
                                                  <td width="" style="text-align:center"><b><?php echo @_TOTAL; ?>
</b></td>
                                                </tr>
                                                <?php unset($this->_sections['in']);
$this->_sections['in']['name'] = 'in';
$this->_sections['in']['loop'] = is_array($_loop=$this->_tpl_vars['inncart']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['in']['show'] = true;
$this->_sections['in']['max'] = $this->_sections['in']['loop'];
$this->_sections['in']['step'] = 1;
$this->_sections['in']['start'] = $this->_sections['in']['step'] > 0 ? 0 : $this->_sections['in']['loop']-1;
if ($this->_sections['in']['show']) {
    $this->_sections['in']['total'] = $this->_sections['in']['loop'];
    if ($this->_sections['in']['total'] == 0)
        $this->_sections['in']['show'] = false;
} else
    $this->_sections['in']['total'] = 0;
if ($this->_sections['in']['show']):

            for ($this->_sections['in']['index'] = $this->_sections['in']['start'], $this->_sections['in']['iteration'] = 1;
                 $this->_sections['in']['iteration'] <= $this->_sections['in']['total'];
                 $this->_sections['in']['index'] += $this->_sections['in']['step'], $this->_sections['in']['iteration']++):
$this->_sections['in']['rownum'] = $this->_sections['in']['iteration'];
$this->_sections['in']['index_prev'] = $this->_sections['in']['index'] - $this->_sections['in']['step'];
$this->_sections['in']['index_next'] = $this->_sections['in']['index'] + $this->_sections['in']['step'];
$this->_sections['in']['first']      = ($this->_sections['in']['iteration'] == 1);
$this->_sections['in']['last']       = ($this->_sections['in']['iteration'] == $this->_sections['in']['total']);
?>
                                                <tr>
                                                	<td align="center"><?php echo $this->_sections['in']['iteration']; ?>
</td>
                                                    <td><?php echo $this->_tpl_vars['inncart'][$this->_sections['in']['index']]['Product_Name']; ?>
</td>
                                                    <td><?php echo $this->_tpl_vars['inncart'][$this->_sections['in']['index']]['Product_Code']; ?>
</td>
                                                    <td align="right"><?php echo $this->_tpl_vars['inncart'][$this->_sections['in']['index']]['Price']; ?>
 <?php echo @_CURRENCY; ?>
</td>
                                                    <td align="center"><?php echo $this->_tpl_vars['inncart'][$this->_sections['in']['index']]['Amount']; ?>
</td>
                                                    <td align="right"><?php echo $this->_tpl_vars['inncart'][$this->_sections['in']['index']]['Money']; ?>
 <?php echo @_CURRENCY; ?>
</td>
                                                </tr>                                                    
                                                <?php endfor; endif; ?>
                                                <tr height="27px;">
                                                  <td colspan="5" align="right" valign="middle">
                                                        <span><b><?php echo @_SUM_TOTAL; ?>
:&nbsp;</b></span> 
													</td>
												 <td align="right" valign="middle" id="right_pad" class="dausao"><b>
												 <span>&nbsp;<?php if ($this->_tpl_vars['total_money'] == 0): ?>Call<?php else:  echo $this->_tpl_vars['total_money']; ?>
 VNĐ<?php endif; ?></span>
                                                  </b></td>
                                                </tr>																								
                                            </table>                                     
                                </td>
                              </tr></tbody></table><br />
<table width="60%" border="0" cellspacing="0" cellpadding="0">                             
							 <tr>
                              	<td colspan="5" valign="top" align="left" width="">
                                	<table width="550px" border="0" cellpadding="0" cellspacing="0">                                                                           
                                       <form method="post" name="frm_order" enctype="multipart/form-data" onSubmit="return check_value(frm_order);"> 
                                      <tr>
                                      	<td width="11"></td>
                                        <td valign="top"><?php echo @_PAY_TYPE; ?>
:</td>
                                        <td><input id="pay_type" type="radio" class="radioBtnClass" name="pay_type" value="1" /> <?php echo @_PAY_DIRECT; ?>

                                        	<br/><br/><input id="pay_type" checked="checked" type="radio" class="radioBtnClass" name="pay_type" value="2" /> <?php echo @_PAY_NGANLUONG; ?>

                                        </td>
                                      </tr> 
                                      <tr>
                                        <td width="11"></td>
                                        <td width="151" align="left" valign="middle" class="link_dathang"><?php echo @_FULL_NAME; ?>
:<span class="dausao">*</span></td>
                                        <td colspan="4"><input name="fullname" id="fullname" value="<?php echo $_SESSION['order']['fullname']; ?>
" type="text" class="textbox_dh" maxlength="100"/></td>
                                      </tr>                                     
                                      
                                      <tr><td colspan="6" height="5"></td></tr>
                                      
                                      <tr>
                                        <td width="11">&nbsp;</td>
                                        <td width="151" align="left" valign="middle" class="link_dathang"><?php echo @_ADDRESS; ?>
:<span class="dausao">*</span></td>
                                        <td colspan="4"><input name="address" id="address" value="<?php echo $_SESSION['order']['address']; ?>
" type="text" class="textbox_diachi" maxlength="255"/></td>
                                      </tr>
                                      
                                      <tr><td colspan="6" height="5"></td></tr>
                                      
                                      <tr>
                                        <td width="11">&nbsp;</td>
                                        <td width="151" align="left" valign="middle" class="link_dathang"><?php echo @_EMAIL; ?>
:<span class="dausao">*</span></td>
                                        <td colspan="4"><input name="email" id="email" value="<?php echo $_SESSION['order']['email']; ?>
" type="text" class="textbox_dh" maxlength="50"/></td>
                                      </tr>
                                      
                                      <tr><td colspan="6" height="5"></td></tr>
                                      
                                      <tr>
                                        <td width="11">&nbsp;</td>
                                        <td width="151" align="left" valign="middle" class="link_dathang"><?php echo @_PHONE; ?>
:<span class="dausao">*</span>                                                        </td>
                                        <td colspan="4"><input name="phone" id="phone" value="<?php echo $_SESSION['order']['phone']; ?>
" type="text" class="textbox_dh" onkeyup="valid(this,'notnumbers')" onblur="valid(this,'notnumbers')" maxlength="20"/></td>
                                      </tr>                                                                                                                                                    
                                      <tr><td colspan="6" height="5"></td></tr>                                         
                                                      <tr><td colspan="6" height="10"></td></tr>
                                                      
                                                      <tr>
                                                        <td width="11">&nbsp;</td>
                                                        <td width="151" align="left" valign="top" class="link_dathang"><?php echo @_REQUIRES; ?>
: </td>
                                       				  <td colspan="">
                                                            <textarea name="content_1" id="content_1" cols="45" rows="3"><?php echo $_SESSION['order']['requirements']; ?>
</textarea>
                                                        </td>
                                                      </tr>
                                                      
                                                      <tr><td colspan="6" height="5"></td></tr>
                                                      
                                                      <tr>
                                                        <td width="11" align="left" valign="top">&nbsp;</td>
                                                        <td width="151" align="left" valign="middle" class="link_dathang"><?php echo @_VERIFY_CODE; ?>
:<span class="dausao">*</span>                                                        </td>
                                                        <td colspan="4" align="left" valign="middle">
                                                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                          <tr>
                                                            <td width="100"><input type="text" name="txt_verify_register" id="txt_verify_register" maxlength="6" size="4"></td>
															<td width="780"><img src="<?php echo @URL_HOMEPAGE; ?>
/antiflood.php" ></td>
                                                          </tr>
                                                        </table>                                    	
                                                       </td>
                                                      </tr>
                                                      
                                                      <tr><td colspan="6" height="5"></td></tr>
                                                      
                                                      <tr>
                                                        <td width="11">&nbsp;</td>
                                                        <td width="151">&nbsp;</td>
                                                        <td colspan="4">                                                        	
                                                        	<input type="image" value="<?php echo @_ORDER; ?>
&nbsp;&nbsp;&nbsp;" class="btn_sm"/>
															<input type="hidden" value="1" name="send" id="send" />
                                                        </td>
                                                      </tr>
                                                      </form>
                                                      <tr><td colspan="6" height="10"></td></tr>
                                                  </table>
                                </td>
                              </tr>                                                   
                            </table>                               
    </div>
</div>		
<?php echo '
<script type="text/javascript" charset="utf-8">	 
function checkMail(field){
   var filter = /^([a-zA-Z0-9_\\.\\-])+\\@(([a-zA-Z0-9\\-])+\\.)+([a-zA-Z0-9]{2,4})+$/;
   if (filter.test(field))
      return true;
   return false;
}	
function check_value(form)
{
	if(form.fullname.value=="")
	{
		form.onclick = $.prompt(\'';  echo @_ERR_FULLNAME;  echo '\');
		form.fullname.focus();
		return false;
	}		
	if(form.address.value==0)
	{
		form.onclick = $.prompt(\'';  echo @_ERR_ADDRESS;  echo '\');
		form.address.focus();
		return false;
	}	
	if(form.email.value==\'\')
	{
		form.onclick = $.prompt(\'';  echo @_ERR_EMAIL;  echo '\');
		form.email.focus();
		return false;
	}	
	if(checkMail(form.email.value)==false)
	{
		form.onclick = $.prompt(\'';  echo @_ERR_EMAIL_VALUE;  echo '\');
		form.email.focus();
		return false;
	}
	if(form.phone.value=="")
	{
		form.onclick = $.prompt(\'';  echo @_ERR_PHONE;  echo '\');
		form.phone.focus();
		return false;
	}	
	if(form.txt_verify_register.value=="")
	{
		form.onclick = $.prompt(\'';  echo @_ERR_VERIFY;  echo '\');
		form.txt_verify_register.focus();
		return false;
	}
	if(form.txt_verify_register.value!=\'';  echo $_SESSION['code_verify'];  echo '\'){
		form.onclick = $.prompt(\'';  echo @_ERR_VERIFY_DIFF;  echo '\');
		form.txt_verify_register.focus();
		return false;
	}
		form.action = "';  echo @URL_HOMEPAGE;  echo '/product/order_detail.html";

}
</script>
'; ?>
				