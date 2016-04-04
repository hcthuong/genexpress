<?php /* Smarty version 2.6.13, created on 2013-06-11 09:39:03
         compiled from default/product/cart.html */ ?>
<?php echo '
<script language="javascript">
function setCheckboxes(the_form, do_check)
{
    var elts      = (typeof(document.forms[the_form].elements[\'del_item[]\']) != \'undefined\')
                  ? document.forms[the_form].elements[\'del_item[]\']
                  : 0;
    var elts_cnt  = (typeof(elts.length) != \'undefined\')
                  ? elts.length
                  : 0;

    if (elts_cnt) {
        for (var i = 0; i < elts_cnt; i++) {
            elts[i].checked = do_check;
        }
    } else {
        elts.checked        = do_check;
    }
return true; 
}
function allcheck_uncheck(the_form){
	if (document.getElementById(\'checkall\').checked === true){
		 setCheckboxes(the_form, true);
	}
	else
	{
		setCheckboxes(the_form, false);
	}
}
var r={
  \'notnumbers\':/[^\\d]/g
}

function valid(o,w){
  o.value = o.value.replace(r[w],\'\');
}
</script>
'; ?>
		
<link href="<?php echo @URL_HOMEPAGE; ?>
/css/examples.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo @URL_HOMEPAGE; ?>
/jscripts/jquery-impromptu.1.5.js"></script>
<!-- 
<div id="content">
                	<div id="block">
           	    		<h6><img align="absmiddle" src="<?php echo @URL_HOMEPAGE; ?>
/templates/<?php echo $this->_tpl_vars['template']; ?>
/images/ico3.png" />&nbsp;&nbsp;<?php echo @_SHOPPING_CART; ?>
									</h6>
<ul id="news">
							<li>
						<table width="100%" border="0" cellspacing="0" cellpadding="0"><tbody>
                              <form name="frm_update_cart" method="post">
									<input name="numitem" value="<?php echo $this->_tpl_vars['check_cart']; ?>
" type="hidden">
                              <tr>
                             	<td colspan="5" valign="top" align="left">
                                              <table width="100%" border="1" cellpadding="0" cellspacing="0" style="border-collapse:collapse; border-color:#AAAAAA;">
                                                <tr  height="27px;" id="bg_pink">                                                 
												 <td width="15">
												 <input  type="checkbox" name="checkall" id="checkall" onclick="allcheck_uncheck('frm_update_cart');"/></td>
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
                                                <tr> 
												  <td width="15" valign="middle" align="center">
                                                     <input type="checkbox" name="del_item[]" value="<?php echo $this->_tpl_vars['incart']['ID']; ?>
"/>
                                                  </td>                                                                                                
                                                  <td width="" valign="middle" id="left_pad"><?php echo $this->_tpl_vars['incart']['Product_Name']; ?>
</td>
  												  <td width="" valign="middle" id="left_pad"><?php echo $this->_tpl_vars['incart']['Product_Code']; ?>
</td>
                                                  <td width="" valign="middle" align="right" id="right_pad"><?php if ($this->_tpl_vars['incart']['Price'] == 0): ?>Call<?php else:  echo $this->_tpl_vars['incart']['Price']; ?>
 VNĐ<?php endif; ?></td>
                                                  <td width="" valign="middle" align="center"><input value="<?php echo $this->_tpl_vars['incart']['Amount']; ?>
" name="amount<?php echo $this->_foreach['incart']['iteration']; ?>
" size="2" onkeyup="valid(this,'notnumbers')" onblur="valid(this,'notnumbers')" maxlength="4"/>
												  <input type="hidden" name="Cart_ID<?php echo $this->_foreach['incart']['iteration']; ?>
" value="<?php echo $this->_tpl_vars['incart']['ID']; ?>
" >
												  </td>
                                                  <td width="" valign="middle" align="right" id="right_pad"><?php if ($this->_tpl_vars['incart']['Money'] == 0): ?>Call<?php else:  echo $this->_tpl_vars['incart']['Money']; ?>
 VNĐ<?php endif; ?></td>                                                  
                                                </tr>
                                                <?php endforeach; endif; unset($_from); ?>   
                                                   
                                                <tr height="27px;">
                                                  
                                                    
                                                  <td colspan="4" align="right" valign="middle">
                                                        <span><b>Tổng thành tiền:&nbsp;</b></span> 
													</td>
												 <td colspan="1" align="right" valign="middle" id="right_pad" class="dausao">
												 <span>&nbsp;<?php if ($this->_tpl_vars['total_money'] == 0): ?>Call<?php else:  echo $this->_tpl_vars['total_money']; ?>
 VNĐ<?php endif; ?></span>                                    
                                                  </td>
                                                </tr>																								
                                            </table>                                     
                                </td>
                              </tr></form></tbody></table>  							  
					
					<div id="top_pad" style="text-align:center; padding-left:150px;">
							<a onClick="recalculate('frm_update_cart');" href="#" style="text-decoration:none;"><img src="<?php echo @URL_HOMEPAGE; ?>
/templates/<?php echo $this->_tpl_vars['template']; ?>
/images/capnhat.jpg" border="0" style="vertical-align:middle;"/> </a>&nbsp;
							<a onClick="del_cart('frm_update_cart');" href="#" style="text-decoration:none;"><img src="<?php echo @URL_HOMEPAGE; ?>
/templates/<?php echo $this->_tpl_vars['template']; ?>
/images/xoahet.jpg" border="0" style="vertical-align:middle;"/> </a>&nbsp;
							 <a href="<?php echo @URL_HOMEPAGE; ?>
/product.html" style="text-decoration:none;"><img src="<?php echo @URL_HOMEPAGE; ?>
/templates/<?php echo $this->_tpl_vars['template']; ?>
/images/tieptucmuahang.jpg" border="0" style="vertical-align:middle;"/></a>&nbsp;
							 <a href="<?php echo @URL_HOMEPAGE; ?>
/product/order.html" style="text-decoration:none;"><img src="<?php echo @URL_HOMEPAGE; ?>
/templates/<?php echo $this->_tpl_vars['template']; ?>
/images/thanhtoan.jpg" border="0" style="vertical-align:middle;"/></a>
					</div>
					</div>
                </li>
						</ul>
						</div>
</div>
-->
<div class="product">
				<h3><span> <?php echo @_SHOPPING_CART; ?>
 </span></h3>
				<div class="frame_product" align="center">
                	<table class="cart" border="1" align="center" width="80%" style="border-collapse:collapse;">
                    	<form name="frm_update_cart" method="post">
						<input name="numitem" value="<?php echo $this->_tpl_vars['check_cart']; ?>
" type="hidden">
                        <tr bgcolor="#96DCEB">
                        	<td width="15">
												 <input  type="checkbox" name="checkall" id="checkall" onclick="allcheck_uncheck('frm_update_cart');"/></td>
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
                        	<td><input type="checkbox" name="del_item[]" value="<?php echo $this->_tpl_vars['inncart'][$this->_sections['in']['index']]['Shopping_ID']; ?>
"/></td>
                            <td><?php echo $this->_tpl_vars['inncart'][$this->_sections['in']['index']]['Product_Name']; ?>
</td>
                            <td><?php echo $this->_tpl_vars['inncart'][$this->_sections['in']['index']]['Product_Code']; ?>
</td>
                            <td align="right"><?php echo $this->_tpl_vars['inncart'][$this->_sections['in']['index']]['Price']; ?>
 <?php echo @_CURRENCY; ?>
</td>
                            <td align="center"><input value="<?php echo $this->_tpl_vars['inncart'][$this->_sections['in']['index']]['Amount']; ?>
" name="amount<?php echo $this->_sections['in']['iteration']; ?>
" size="2" onkeyup="valid(this,'notnumbers')" onblur="valid(this,'notnumbers')" maxlength="4"/>
												  <input type="hidden" name="Cart_ID<?php echo $this->_sections['in']['iteration']; ?>
" value="<?php echo $this->_tpl_vars['inncart'][$this->_sections['in']['index']]['Shopping_ID']; ?>
" ></td>
                            <td align="right"><?php echo $this->_tpl_vars['inncart'][$this->_sections['in']['index']]['Money']; ?>
 <?php echo @_CURRENCY; ?>
</td>
                        </tr>
                        <?php endfor; endif; ?>
                        <tr>
                        	<td colspan="5" align="right"><b><?php echo @_SUM_TOTAL; ?>
</b></td>
                            <td align="right"><b><?php echo $this->_tpl_vars['total_money']; ?>
 <?php echo @_CURRENCY; ?>
</b></td>
                        </tr>
                        </form>
                    </table>
                    <div class="pro2">
                    	<a onClick="recalculate('frm_update_cart');" class="button" href="javascript:void(0);"><span><?php echo @_UPDATE; ?>
</span></a>
                        <a onClick="del_cart('frm_update_cart');" class="button" href="javascript:void(1);"><span><?php echo @_REMOVE; ?>
</span></a>
                        <a class="button" href="<?php echo @URL_HOMEPAGE; ?>
/home.html"><span><?php echo @_SHOPPING_GO_ON; ?>
</span></a>
                        <a class="button" href="<?php echo @URL_HOMEPAGE; ?>
/product/order.html"><span><?php echo @_PAYBILL; ?>
</span></a>
                    </div>
			</div>
		 </div><!--End #main-->
		 <div class="bg_bottom"></div>		
<?php echo '
<script type="text/javascript" charset="utf-8">	 
function recalculate(frmName)     	      
{
	var frm = document.forms[frmName];
	frm.action = "';  echo @URL_HOMEPAGE;  echo '/product/update_cart.html";
	frm.submit();
}
function del_cart(frmName)
{
	var frm = document.forms[frmName];
	var items = document.getElementsByName("del_item[]");
	var enable = false;	
	for (var i=0; i<items.length; i++)
	{
		if (items[i].checked==true)
		{
			enable = true;
			break;
		}
	}
	if (frm && enable)
			{
				$.prompt(\'';  echo @_MESS_DEL;  echo '\',{ 
					buttons:{Ok:true, Cancel:false},
					callback: function(v,m){
				
					if(v){
					frm.action = "';  echo @URL_HOMEPAGE;  echo '/product/removecart.html";
					frm.submit();
					}
					else{}
					}
			});
	}
	else
		frm.onclick = $.prompt(\'';  echo @_MESS_CHOOSE_DEL;  echo '\');		
	return false;	
}
</script>
'; ?>
					