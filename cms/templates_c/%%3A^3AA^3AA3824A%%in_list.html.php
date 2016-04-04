<?php /* Smarty version 2.6.13, created on 2014-04-08 12:10:54
         compiled from information/in_list.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'information/in_list.html', 19, false),)), $this); ?>
<div id="bgwrap">
    <!-- Main Content -->
    <div id="content">
        <div id="main">
            <h1>Quản lý tin giới thiệu</h1>
            <?php if ($this->_tpl_vars['rs']): ?>
            <form name="frm_information" method="POST">
                <div style="text-align:right"><input type="button" name="btn_del" class="button" value="Xóa" onClick="del_information('frm_information');" />
                    <input name="btnAddNew" type="button" value="Thêm" class="button" onclick="window.location='index.php?module=information&a=add'"/>
                </div>
                <table class="fullwidth" border="0" cellpadding="0" cellspacing="0"><tbody>
                <thead><tr>
                    <td width="15" align="center"><input type="checkbox" class="checkall" name="all" id="all"></td>
                    <td width="150"><b>Hình minh họa</b></td>
                    <td align=""><b>Tiêu đề</b></td>
                    <td align="center"><b>Thao tác</b></td>
                </tr></thead>
                <?php $_from = $this->_tpl_vars['rs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['rs'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['rs']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['rs']):
        $this->_foreach['rs']['iteration']++;
?>
                <tr bgcolor=<?php echo smarty_function_cycle(array('values' => "#FFFFFF,#EEEEEE"), $this);?>
>
                <td width="15" align="center"><input type="checkbox" class="checkboxnut"name="check_del[]" value="<?php echo $this->_tpl_vars['rs']['Information_ID']; ?>
" /></td>
                <td><img src="<?php if ($this->_tpl_vars['rs']['Image'] != ''):  echo @URL_NEWS_THUMB;  echo $this->_tpl_vars['rs']['Image'];  else:  echo @URL_HOMEPAGE; ?>
/upload/no_image_50.jpg<?php endif; ?>" width="72" /></td>
                <td><?php echo $this->_tpl_vars['rs']['Title']; ?>
</td>
                <td align="center" width="150"><a href="?module=information&a=update&id=<?php echo $this->_tpl_vars['rs']['Information_ID']; ?>
" title="Cập nhật thông tin" alt="Cập nhật thông tin" class="tooltip">Cập nhật</a></td>
                </tr>
                <?php endforeach; endif; unset($_from); ?>
                <?php if ($this->_tpl_vars['paging']): ?>
                <tr><td align="center" colspan="9"><?php echo $this->_tpl_vars['paging']; ?>
</td></tr>
                <?php endif; ?>
                </tbody>
                </table>
                <div style="text-align:right"><input type="button" name="btn_del" class="button" value="Xóa" onClick="del_information('frm_information');" />
                    <input name="btnAddNew" type="button" value="Thêm" class="button" onclick="window.location='index.php?module=information&a=add'"/>
                </div></form>
            <?php else: ?>
            <div class="message information">
                <h2>Thông báo</h2>
                <p>Hiện tại chưa có thông tin</p>
            </div>
            <?php endif; ?>
        </div></div>
    <?php echo '
    <script type="text/javascript" charset="utf-8">

        function del_information(frmName)
        {
            var frm = document.forms[frmName];
            var items = document.getElementsByName("check_del[]");
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
                $.prompt(\'Bạn muốn xóa thông tin này?\',{
                    buttons:{Ok:true, Cancel:false},
                    callback: function(v,m){

                        if(v){
                            frm.action = "?module=information&a=delete";
                            frm.submit();
                        }
                        else{}
                    }
                });
            }
            else
                frm.onclick = $.prompt(\'Vui lòng chọn thông tin bạn muốn xóa!!!\');
            return false;
        }
    </script>
    '; ?>