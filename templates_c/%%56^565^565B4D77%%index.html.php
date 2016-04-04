<?php /* Smarty version 2.6.13, created on 2014-03-25 06:12:13
         compiled from default/contact/index.html */ ?>
<script type="text/javascript" src="<?php echo @URL_HOMEPAGE; ?>
/jscripts/jquery-impromptu.1.5.js"></script>
<link href="<?php echo @URL_HOMEPAGE; ?>
/css/examples.css" rel="stylesheet" type="text/css">
	<div class="product">
		<h3><span> <?php echo @_CONTACT; ?>
 </span></h3>
		<div class="frame_product" align="center">
			<form name="frm_contact" method="post" enctype="multipart/form-data" onSubmit="return check_contact(frm_contact);">
                        	<table width="100%" border="0" cellspacing="0" cellpadding="0">                              
                              <tr>
                             	<td colspan="5" valign="top" align="left">                                	
                                      <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                          <tr>
                                            <td colspan="2" height="20" valign="middle" align="left" class="link_dathang">
                                                <p style="font-weight:bold; padding-left:15px;">
                                                Hãy điền tất cả các mục có đánh dấu sao (<span class="dausao"> *</span> ) 
                                                để chúng tôi trả lời các thắc mắc của bạn !                                                </p>                                            </td>
                                          </tr>                                                                                   
                                          <tr>
                                            <td  colspan="2" height="10" style="border-top:#CCCCCC solid 1px;"></td>
                                          </tr>
                                          <tr>
                                            <td align="right" valign="middle"><b><?php echo @_FULL_NAME; ?>
:</b><span class="dausao">*</span>&nbsp;</td>
                                            <td><input name="fullname" id="fullname" type="text" class="textbox_dh" maxlength="100"/></td>
                                          </tr>                                          
                                           <tr><td colspan="2" height="5"></td></tr>                                          
                                          <tr>                                            
                                            <td align="right" valign="middle"><b><?php echo @_EMAIL; ?>
:</b><span class="dausao">*</span>&nbsp;</td>
                                            <td><input name="email" id="email" type="text" class="textbox_dh" maxlength="50"/></td>
                                          </tr>                                          
                                          <tr><td colspan="2" height="5"></td></tr>
                                          <tr>
                                            <td align="right" valign="top"><b><?php echo @_CONTENT; ?>
:</b><span class="dausao">*</span>&nbsp;</td>
                                            <td>
						                     <textarea name="description" id="description" cols="45" rows="10"></textarea></td>
                                          </tr>                                          
                                          <tr><td colspan="2" height="5"></td></tr>                                          
                                          <tr>
                                            <td align="right" valign="middle"><b><?php echo @_VERIFY_CODE; ?>
:</b><span class="dausao">*</span>&nbsp;</td>
                                            <td>
												<table width="235" border="0" cellpadding="0" cellspacing="0">
												  <tr>
													<td width="10"><input type="text" name="txt_verify_register" id="txt_verify_register" maxlength="6" size="4"></td>
													<td width="225"><img src="<?php echo @URL_HOMEPAGE; ?>
/antiflood.php" ></td>
												  </tr>
												</table>                                           
                                           </td>
                                          </tr>                                          
                                          <tr><td colspan="2" height="10"></td></tr>                                          
                                          <tr>
                                            <td>&nbsp;</td>
                                            <td><input type="submit" name="submit" value="<?php echo @_SEND; ?>
" class="btn_sm" /></td>
                                          </tr>
                                          <tr>
                                            <td colspan="2">&nbsp;</td>
                                          </tr>
                                                                       
                                      </table>
                                </td>
                              </tr>                                                            
                          </table>
						  </form>
		</div>
	</div>
</div><!--End #main-->
<div class="bg_bottom"></div>
<?php echo '
<script language="javascript">
function checkMail(field){
   var filter = /^([a-zA-Z0-9_\\.\\-])+\\@(([a-zA-Z0-9\\-])+\\.)+([a-zA-Z0-9]{2,4})+$/;
   if (filter.test(field))
      return true;
   return false;
}		
function check_contact(form)
{
	if(form.fullname.value=="")
	{
		form.onclick = $.prompt(\'';  echo @_ERR_NAME;  echo '\');
		form.fullname.focus();
		return false;
	}	
	if(form.email.value=="")
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
	if(form.description.value=="")
	{
		form.onclick = $.prompt(\'';  echo @_ERR_DESCRIPTION;  echo '\');
		form.description.focus();
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
	return true;
}

function frm_submit(frmName) {
	var frm = document.forms[frmName];
	frm.action = "';  echo @URL_HOMEPAGE;  echo '/contact.html";
	frm.submit();
}
</script> 
'; ?>
                    