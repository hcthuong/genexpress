<?php /* Smarty version 2.6.13, created on 2014-04-11 19:18:28
         compiled from product/product_category_edit.html */ ?>
<!-- Background wrapper -->
			<div id="bgwrap">		
				<!-- Main Content -->
				<div id="content">
					<div id="main">
						<h1>Cập nhật thông tin danh mục</h1>
							<div class="pad20">
					<!-- Big buttons -->
							<form name="frm_product_category_edit" method="post" enctype="multipart/form-data" onSubmit="return check_value(frm_product_category_edit);">
							<!-- Fieldset -->
							<fieldset>   
							<legend>Thông tin</legend>
								<p><label for="sf">Tên danh mục: </label>
									<input type="text" class="mf"  name="category_name" id="category_name" value="<?php echo $this->_tpl_vars['show_category']['Category_Name']; ?>
" maxlength="200"/><font color="#FF0000"><b>*</b></font>
								</p>
                                <p><label for="sf">Tên danh mục (tiếng Anh): </label>
									<input type="text" class="mf"  name="category_name_en" id="category_name_en" value="<?php echo $this->_tpl_vars['show_category']['Category_Name_EN']; ?>
" maxlength="200"/><font color="#FF0000"><b>*</b></font>
								</p>
								<p><label for="sf" style="vertical-align:top" >Thuộc danh mục sản phẩm: </label>
									<select id="cat" name="cat">
									<option value="0">--- Chọn danh mục ---</option>
									 <?php $_from = $this->_tpl_vars['list_category_parent']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['list_category_parent'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['list_category_parent']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['list_category_parent']):
        $this->_foreach['list_category_parent']['iteration']++;
?>
									<option value="<?php echo $this->_tpl_vars['list_category_parent']['Category_ID']; ?>
" <?php if ($this->_tpl_vars['show_category']['Parent_ID'] == $this->_tpl_vars['list_category_parent']['Category_ID']): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['list_category_parent']['Category_Name']; ?>
</option>										
									<?php endforeach; endif; unset($_from); ?>
								</select>
								</p>
                                <p><label for="sf" style="vertical-align:top" >Thuộc danh mục giới thiệu: </label>
                                    <select name="infor_prodcat" id="infor_prodcat">
                                        <option value="0">--- Chọn danh mục ---</option>
                                        <?php unset($this->_sections['inc']);
$this->_sections['inc']['name'] = 'inc';
$this->_sections['inc']['loop'] = is_array($_loop=$this->_tpl_vars['list_infor_cat']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['inc']['show'] = true;
$this->_sections['inc']['max'] = $this->_sections['inc']['loop'];
$this->_sections['inc']['step'] = 1;
$this->_sections['inc']['start'] = $this->_sections['inc']['step'] > 0 ? 0 : $this->_sections['inc']['loop']-1;
if ($this->_sections['inc']['show']) {
    $this->_sections['inc']['total'] = $this->_sections['inc']['loop'];
    if ($this->_sections['inc']['total'] == 0)
        $this->_sections['inc']['show'] = false;
} else
    $this->_sections['inc']['total'] = 0;
if ($this->_sections['inc']['show']):

            for ($this->_sections['inc']['index'] = $this->_sections['inc']['start'], $this->_sections['inc']['iteration'] = 1;
                 $this->_sections['inc']['iteration'] <= $this->_sections['inc']['total'];
                 $this->_sections['inc']['index'] += $this->_sections['inc']['step'], $this->_sections['inc']['iteration']++):
$this->_sections['inc']['rownum'] = $this->_sections['inc']['iteration'];
$this->_sections['inc']['index_prev'] = $this->_sections['inc']['index'] - $this->_sections['inc']['step'];
$this->_sections['inc']['index_next'] = $this->_sections['inc']['index'] + $this->_sections['inc']['step'];
$this->_sections['inc']['first']      = ($this->_sections['inc']['iteration'] == 1);
$this->_sections['inc']['last']       = ($this->_sections['inc']['iteration'] == $this->_sections['inc']['total']);
?>
                                        <option value="<?php echo $this->_tpl_vars['list_infor_cat'][$this->_sections['inc']['index']]['InCat_ID']; ?>
" <?php if ($this->_tpl_vars['list_infor_cat'][$this->_sections['inc']['index']]['InCat_ID'] == $this->_tpl_vars['show_category']['Information_ProductCat']): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['list_infor_cat'][$this->_sections['inc']['index']]['Name']; ?>
</option>
                                        <?php endfor; endif; ?>
                                    </select>
                                    <font color="#FF0000"><b>*</b></font>
                                </p>
								<p>								
									<input type="submit" class="button"  name="submit" value="Cập nhật"/>
								</p>		  
							</fieldset>
								<!-- End of fieldset -->		
							</form>
							</div> 
					</div>
				</div>
<?php echo '
<script language="javascript">
function check_value(form)
{
	if(form.category_name.value=="")
	{
		form.onclick = $.prompt(\'Vui l&ograve;ng nh&#7853;p tên danh mục!!!\');
		form.category_name.focus();
		return false;
	}
    if(form.infor_prodcat.value== 0)
    {
        form.onclick = $.prompt(\'Vui lòng cho biết danh mục sản phẩm này thuộc về danh mục giới thiệu nào???\');
        form.infor_prodcat.focus();
        return false;
    }
}
</script> 
'; ?>