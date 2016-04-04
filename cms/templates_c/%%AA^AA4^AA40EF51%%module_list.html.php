<?php /* Smarty version 2.6.13, created on 2014-04-08 09:27:17
         compiled from module/module_list.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'module/module_list.html', 18, false),)), $this); ?>
<div id="bgwrap">
    <!-- Main Content -->
    <div id="content">
        <div id="main">
            <h1>Quản lý Module</h1>
            <form name="frm_module" method="POST">
                <div style="text-align:right">
                    <input name="btnAddModule" type="button" value="Thêm" class="button" onclick="window.location='index.php?module=module&a=add'"/>
                </div>
                <table class="fullwidth" border="0" cellpadding="0" cellspacing="0"><tbody>
                <thead><tr>
                    <td width="15" align="center"><input type="checkbox" class="checkall" name="all" id="all"></td>
                    <td align=""><b>Tên Module</b></td>
                    <td width=""><b>Mã Module</b></td>
                    <td align="center"><b>Thao tác</b></td>
                </tr></thead>
                <?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['rs'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['rs']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['rs']):
        $this->_foreach['rs']['iteration']++;
?>
                <tr bgcolor=<?php echo smarty_function_cycle(array('values' => "#FFFFFF,#EEEEEE"), $this);?>
>
                <td width="15" align="center"><input type="checkbox" class="checkboxnut"name="check_del[]" value="<?php echo $this->_tpl_vars['rs']['Module_ID']; ?>
" /></td>
                <td><?php echo $this->_tpl_vars['rs']['Module_Name']; ?>
</td>
                <td><?php echo $this->_tpl_vars['rs']['Module_Code']; ?>
</td>
                <td align="center" width="150"><a href="?module=module&a=update&id=<?php echo $this->_tpl_vars['rs']['Module_ID']; ?>
" title="Cập nhật" alt="Cập nhật" class="tooltip">Cập nhật</a></td>
                </tr>
                <?php endforeach; endif; unset($_from); ?>
                </tbody>
                </table>
                <div style="text-align:right"><input type="button" name="btn_del" class="button" value="Xóa" onClick="del_module('frm_module');" />
                </div></form>
        </div></div>
    <?php echo '
    <script type="text/javascript" charset="utf-8">

        function del_module(frmName)
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
                $.prompt(\'Bạn muốn xóa module này?\',{
                    buttons:{Ok:true, Cancel:false},
                    callback: function(v,m){

                        if(v){
                            frm.action = "?module=module&a=delete";
                            frm.submit();
                        }
                        else{}
                    }
                });
            }
            else
                frm.onclick = $.prompt(\'Vui lòng chọn module bạn muốn xóa!!!\');
            return false;
        }
    </script>
    '; ?>