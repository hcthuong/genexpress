<?php /* Smarty version 2.6.13, created on 2014-04-08 09:27:20
         compiled from module/module_update.html */ ?>
<!-- Background wrapper -->
<div id="bgwrap">
    <!-- Main Content -->
    <div id="content">
        <div id="main">
            <h1>Sửa thông tin Module</h1>
            <div class="pad20">
                <!-- Big buttons -->
                <form name="frm_module_upd" method="post" onSubmit="return check_value(frm_module_upd);">
                    <!-- Fieldset -->
                    <fieldset>
                        <legend>Thông tin</legend>
                        <p><label for="sf">Tên module: </label>
                            <input type="text" class="mf" name="module_name" value="<?php echo $this->_tpl_vars['detail']['Module_Name']; ?>
" id="name" maxlength="200"/><font color="#FF0000"><b>*</b></font>
                        </p>
                        <p><label for="sf">Mã module: </label>
                            <input type="text" class="mf" name="module_code" value="<?php echo $this->_tpl_vars['detail']['Module_Code']; ?>
" id="code" maxlength="200"/><font color="#FF0000"><b>*</b></font>
                        </p>
                        <p><label for="sf" style="vertical-align:top" >Cột phải: </label>
                            <textarea type="text" name="description" cols="50" rows="5" id="description"/><?php echo $this->_tpl_vars['detail']['Description']; ?>
</textarea>
                        </p>
                        <p><label for="sf" style="vertical-align:top" >Thanh menu trên: </label>
                            <textarea type="text" name="summary" cols="50" rows="5" id="summary"/><?php echo $this->_tpl_vars['detail']['Summary']; ?>
</textarea>
                        </p>
                        <p><label for="sf" style="vertical-align:top" >Act: </label>
                            <textarea type="text" name="act" cols="50" rows="5" id="act"/><?php echo $this->_tpl_vars['detail']['Act']; ?>
</textarea>
                        </p>
                        <p>
                            <input type="hidden" name="mid" value="<?php echo $this->_tpl_vars['detail']['Module_ID']; ?>
" />
                            <input type="submit" class="button"  name="btn_submit" value="Lưu"/>
                        </p>
                    </fieldset>
                    <!-- End of fieldset -->
                </form>
            </div>
        </div>
    </div>
    <?php echo '
    <script type="text/javascript" charset="utf-8">
        function check_value(form)
        {
            if(form.name.value=="")
            {
                form.onclick = $.prompt(\'Vui lòng nhập tên module!!!\');
                form.title.focus();
                return false;
            }
            if(form.code.value=="")
            {
                form.onclick = $.prompt(\'Vui lòng nhập mã module!!!\');
                form.summary.focus();
                return false;
            }
        }
    </script>
    '; ?>