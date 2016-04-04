<?php /* Smarty version 2.6.13, created on 2013-07-16 09:49:37
         compiled from default/product/confirm_payment.html */ ?>
<link href="<?php echo @URL_HOMEPAGE; ?>
/css/examples.css" rel="stylesheet" type="text/css">
<div class="product">
	<h3><span> <?php echo @_PAYMENT_NGANLUONG; ?>
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
                                                <?php $_from = $this->_tpl_vars['detail']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['detail'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['detail']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['detail']):
        $this->_foreach['detail']['iteration']++;
?>
                                                <tr>
                                                	<td align="center"><?php echo $this->_foreach['detail']['iteration']; ?>
</td>
                                                    <td><?php echo $this->_tpl_vars['detail']['Product_Name']; ?>
</td>
                                                    <td><?php echo $this->_tpl_vars['detail']['Product_Code']; ?>
</td>
                                                    <td align="right"><?php echo $this->_tpl_vars['detail']['Price']; ?>
 <?php echo @_CURRENCY; ?>
</td>
                                                    <td align="center"><?php echo $this->_tpl_vars['detail']['Amount']; ?>
</td>
                                                    <td align="right"><?php echo $this->_tpl_vars['detail']['Money']; ?>
 <?php echo @_CURRENCY; ?>
</td>
                                                </tr>                                                    
                                                <?php endforeach; endif; unset($_from); ?>
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
                                      <tr>
                                      	<td width="11"></td>
                                        <td valign="top"><?php echo @_PAY_TYPE; ?>
:</td>
                                        <td><input id="pay_type" checked="checked" type="radio" class="radioBtnClass" name="pay_type" value="2" /> <?php echo @_PAY_NGANLUONG; ?>

                                        </td>
                                      </tr> 
                                      <tr>
                                        <td width="11"></td>
                                        <td width="151" align="left" valign="middle" class="link_dathang"><?php echo @_FULL_NAME; ?>
:<span class="dausao">*</span></td>
                                        <td colspan="4"><input name="fullname" id="fullname" value="<?php echo $this->_tpl_vars['rs']['Full_Name']; ?>
" type="text" class="textbox_dh" maxlength="100" readonly /></td>
                                      </tr>                                     
                                      
                                      <tr><td colspan="6" height="5"></td></tr>
                                      
                                      <tr>
                                        <td width="11">&nbsp;</td>
                                        <td width="151" align="left" valign="middle" class="link_dathang"><?php echo @_ADDRESS; ?>
:<span class="dausao">*</span></td>
                                        <td colspan="4"><input name="address" id="address" value="<?php echo $this->_tpl_vars['rs']['Address']; ?>
" type="text" class="textbox_diachi" maxlength="255" readonly /></td>
                                      </tr>
                                      
                                      <tr><td colspan="6" height="5"></td></tr>
                                      
                                      <tr>
                                        <td width="11">&nbsp;</td>
                                        <td width="151" align="left" valign="middle" class="link_dathang"><?php echo @_EMAIL; ?>
:<span class="dausao">*</span></td>
                                        <td colspan="4"><input name="email" id="email" value="<?php echo $this->_tpl_vars['rs']['Email']; ?>
" type="text" readonly class="textbox_dh" maxlength="50"/></td>
                                      </tr>
                                      
                                      <tr><td colspan="6" height="5"></td></tr>
                                      
                                      <tr>
                                        <td width="11">&nbsp;</td>
                                        <td width="151" align="left" valign="middle" class="link_dathang"><?php echo @_PHONE; ?>
:<span class="dausao">*</span>                                                        </td>
                                        <td colspan="4"><input name="phone" id="phone" value="<?php echo $this->_tpl_vars['rs']['Phone']; ?>
" type="text" class="textbox_dh" readonly  maxlength="20"/></td>
                                      </tr>                                                                                                                                                    
                                      <tr><td colspan="6" height="5"></td></tr>                                         
                                                      <tr><td colspan="6" height="10"></td></tr>
                                                      
                                                      <tr>
                                                        <td width="11">&nbsp;</td>
                                                        <td width="151" align="left" valign="top" class="link_dathang"><?php echo @_REQUIRES; ?>
: </td>
                                       				  <td colspan="">
                                                            <textarea name="content_1" id="content_1" cols="45" rows="3" readonly><?php echo $this->_tpl_vars['rs']['Requirement']; ?>
</textarea>
                                                        </td>
                                                      </tr>
                                                      
                                                      <tr><td colspan="6" height="5"></td></tr>                                                  
                                                      <tr><td colspan="6" height="5"></td></tr>
                                                      
                                                      <tr>
                                                        <td width="11">&nbsp;</td>
                                                        <td width="151">&nbsp;</td>
                                                        <td colspan="4">                                                        	
                                                        	<!--<input type="image" value="<?php echo @_ORDER; ?>
&nbsp;&nbsp;&nbsp;" class="btn_sm"/>
															<input type="hidden" value="1" name="send" id="send" />-->
                                                            <div class="pro2">
                                                            <a href="<?php echo $this->_tpl_vars['url']; ?>
" class="button"><span><?php echo @_PAYMENT_NGANLUONG; ?>
</span></a>
                                                            </div>
                                                        </td>
                                                      </tr>
                                                      <tr><td colspan="6" height="10"></td></tr>
                                                  </table>
                                </td>
                              </tr>                                                   
                            </table>                               
    </div>
</div>						