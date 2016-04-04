<?php /* Smarty version 2.6.13, created on 2014-04-08 10:14:54
         compiled from information/in_add.html */ ?>
<!-- Background wrapper -->
<div id="bgwrap">
    <!-- Main Content -->
    <div id="content">
        <div id="main">
            <h1>Thêm tin giới thiệu</h1>
            <div class="pad20">
                <!-- Big buttons -->
                <form name="frm_information_add" method="post" enctype="multipart/form-data" onSubmit="return check_value(frm_information_add);">
                    <!-- Fieldset -->
                    <fieldset>
                        <legend>Thông tin</legend>
                        <p><label for="sf">Thuộc danh mục: </label>
                            <select id="information_category" name="information_category">
                                <option value="0">--- Chọn danh mục ---</option>
                                <?php unset($this->_sections['rs']);
$this->_sections['rs']['name'] = 'rs';
$this->_sections['rs']['loop'] = is_array($_loop=$this->_tpl_vars['rs']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['rs']['show'] = true;
$this->_sections['rs']['max'] = $this->_sections['rs']['loop'];
$this->_sections['rs']['step'] = 1;
$this->_sections['rs']['start'] = $this->_sections['rs']['step'] > 0 ? 0 : $this->_sections['rs']['loop']-1;
if ($this->_sections['rs']['show']) {
    $this->_sections['rs']['total'] = $this->_sections['rs']['loop'];
    if ($this->_sections['rs']['total'] == 0)
        $this->_sections['rs']['show'] = false;
} else
    $this->_sections['rs']['total'] = 0;
if ($this->_sections['rs']['show']):

            for ($this->_sections['rs']['index'] = $this->_sections['rs']['start'], $this->_sections['rs']['iteration'] = 1;
                 $this->_sections['rs']['iteration'] <= $this->_sections['rs']['total'];
                 $this->_sections['rs']['index'] += $this->_sections['rs']['step'], $this->_sections['rs']['iteration']++):
$this->_sections['rs']['rownum'] = $this->_sections['rs']['iteration'];
$this->_sections['rs']['index_prev'] = $this->_sections['rs']['index'] - $this->_sections['rs']['step'];
$this->_sections['rs']['index_next'] = $this->_sections['rs']['index'] + $this->_sections['rs']['step'];
$this->_sections['rs']['first']      = ($this->_sections['rs']['iteration'] == 1);
$this->_sections['rs']['last']       = ($this->_sections['rs']['iteration'] == $this->_sections['rs']['total']);
?>
                                <option value="<?php echo $this->_tpl_vars['rs'][$this->_sections['rs']['index']]['InCat_ID']; ?>
" style="background-color:#EEEEEE; font-weight:bold; font-family:Verdana, Arial, Helvetica, sans-serif;"><b><?php echo $this->_tpl_vars['rs'][$this->_sections['rs']['index']]['Name']; ?>
</b></option>
                                <?php unset($this->_sections['sub']);
$this->_sections['sub']['name'] = 'sub';
$this->_sections['sub']['loop'] = is_array($_loop=$this->_tpl_vars['sub'][$this->_sections['rs']['index']]) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['sub']['show'] = true;
$this->_sections['sub']['max'] = $this->_sections['sub']['loop'];
$this->_sections['sub']['step'] = 1;
$this->_sections['sub']['start'] = $this->_sections['sub']['step'] > 0 ? 0 : $this->_sections['sub']['loop']-1;
if ($this->_sections['sub']['show']) {
    $this->_sections['sub']['total'] = $this->_sections['sub']['loop'];
    if ($this->_sections['sub']['total'] == 0)
        $this->_sections['sub']['show'] = false;
} else
    $this->_sections['sub']['total'] = 0;
if ($this->_sections['sub']['show']):

            for ($this->_sections['sub']['index'] = $this->_sections['sub']['start'], $this->_sections['sub']['iteration'] = 1;
                 $this->_sections['sub']['iteration'] <= $this->_sections['sub']['total'];
                 $this->_sections['sub']['index'] += $this->_sections['sub']['step'], $this->_sections['sub']['iteration']++):
$this->_sections['sub']['rownum'] = $this->_sections['sub']['iteration'];
$this->_sections['sub']['index_prev'] = $this->_sections['sub']['index'] - $this->_sections['sub']['step'];
$this->_sections['sub']['index_next'] = $this->_sections['sub']['index'] + $this->_sections['sub']['step'];
$this->_sections['sub']['first']      = ($this->_sections['sub']['iteration'] == 1);
$this->_sections['sub']['last']       = ($this->_sections['sub']['iteration'] == $this->_sections['sub']['total']);
?>
                                <option value="<?php echo $this->_tpl_vars['sub'][$this->_sections['rs']['index']][$this->_sections['sub']['index']]['InCat_ID']; ?>
">&nbsp;&nbsp;&nbsp;&nbsp;&brvbar;--&nbsp;<?php echo $this->_tpl_vars['sub'][$this->_sections['rs']['index']][$this->_sections['sub']['index']]['Name']; ?>
</option>
                                <?php endfor; endif; ?>
                                <?php endfor; endif; ?>
                            </select>&nbsp;<font color="#FF0000">*</font>
                        </p>
                        <p><label for="sf">Tiêu đề: </label>
                            <input type="text" class="mf" name="title" value="" id="title" maxlength="200"/><font color="#FF0000"><b>*</b></font>
                        </p>
                        <p><label for="sf">Tiêu đề (tiếng Anh): </label>
                            <input type="text" class="mf" name="title_en" value="" id="title_en" maxlength="200"/><font color="#FF0000"><b>*</b></font>
                        </p>
                        <p><label for="sf" style="vertical-align:top" >Mô tả: </label>
                            <textarea type="text" name="summary" cols="50" rows="5" id="summary"/><?php echo $_SESSION['news']['summary']; ?>
</textarea>
                        </p>
                        <p><label for="sf" style="vertical-align:top" >Mô tả (tiếng Anh): </label>
                            <textarea type="text" name="summary_en" cols="50" rows="5" id="summary_en"/><?php echo $_SESSION['news']['summary_en']; ?>
</textarea>
                        </p>
                        <p><label for="sf" style="vertical-align:top" >Chi tiết: </label>
                            <?php echo $this->_tpl_vars['description']; ?>

                        </p>
                        <p><label for="sf" style="vertical-align:top" >Chi tiết (tiếng Anh): </label>
                            <?php echo $this->_tpl_vars['description_en']; ?>

                        </p>
                        <p><label for="sf" style="vertical-align:top" >Hình minh họa: </label>
                            <input type="file" name="filename" class="mf" />
                        </p>
                        <p><label for="sf" style="vertical-align:top" >Nguồn tin: </label>
                            <input type="text" name="source" class="mf" value="" id="source" maxlength="100"/>
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
    <script type="text/javascript" charset="utf-8">
        function check_value(form)
        {
            if(form.title.value=="")
            {
                form.onclick = $.prompt(\'Vui lòng nhập tiêu đề!!!\');
                form.title.focus();
                return false;
            }
            if(form.summary.value=="")
            {
                form.onclick = $.prompt(\'Vui lòng nhập tóm tắt nội dung!!!\');
                form.summary.focus();
                return false;
            }
            if(form.information_category.value == 0) {
                form.onclick = $.prompt(\'Vui lòng chọn danh mục giới thiệu!!!\');
                form.information_category.focus();
                return false;
            }
        }
    </script>
    '; ?>