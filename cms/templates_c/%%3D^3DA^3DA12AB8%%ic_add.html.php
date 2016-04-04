<?php /* Smarty version 2.6.13, created on 2014-04-08 08:28:49
         compiled from information/ic_add.html */ ?>
<!-- Background wrapper -->
<div id="bgwrap">
    <!-- Main Content -->
    <div id="content">
        <div id="main">
            <h1>Thêm danh mục giới thiệu</h1>
            <div class="pad20">
                <!-- Big buttons -->
                <form name="frm_information_category_add" method="post" onSubmit="return check_value(frm_information_category_add);">
                    <!-- Fieldset -->
                    <fieldset>
                        <legend>Thông tin</legend>
                        <p><label for="sf">Tên danh mục: </label>
                            <input type="text" class="mf" name="name" value="" id="name" maxlength="200"/><font color="#FF0000"><b>*</b></font>
                        </p>
                        <p><label for="sf">Tên danh mục (tiếng Anh): </label>
                            <input type="text" class="mf" name="name_en" value="" id="name_en" maxlength="200"/><font color="#FF0000"><b>*</b></font>
                        </p>
                        <p><label for="sf" style="vertical-align:top" >Thuộc danh mục: </label>
                            <select id="cat" name="cat">
                                <option value="0">--- Chọn danh mục ---</option>
                                <?php if ($this->_tpl_vars['list_category_parent'] != ''): ?>
                                <?php $_from = $this->_tpl_vars['list_category_parent']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['list_category_parent'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['list_category_parent']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['list_category_parent']):
        $this->_foreach['list_category_parent']['iteration']++;
?>
                                <option value="<?php echo $this->_tpl_vars['list_category_parent']['InCat_ID']; ?>
"><?php echo $this->_tpl_vars['list_category_parent']['Name']; ?>
</option>
                                <?php endforeach; endif; unset($_from); ?>
                                <?php endif; ?>
                            </select>
                        </p>
                        <p>
                            <input type="submit" class="button"  name="btn_submit" value="Lưu"/>
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
                form.onclick = $.prompt(\'Vui lòng nhập tên danh mục!!!\');
                form.category_name.focus();
                return false;
            }
        }
    </script>
    '; ?>