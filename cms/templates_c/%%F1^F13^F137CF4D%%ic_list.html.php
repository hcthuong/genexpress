<?php /* Smarty version 2.6.13, created on 2014-04-08 08:27:48
         compiled from information/ic_list.html */ ?>
<div id="bgwrap">
    <!-- Main Content -->
    <div id="content">
        <div id="main">
            <h1>Danh sách danh mục</h1>
            <?php if ($this->_tpl_vars['res']): ?><form name="frm_information_category_manager" method="POST">
            <div style="text-align:right"><input name="btnAddNew" type="button" value="Thêm danh mục" class="button" onClick="window.location='index.php?module=information&a=icadd'"/></div>
            <table class="fullwidth" border="0" cellpadding="0" cellspacing="0"><tbody><thead><tr>
                <td><b>Tên danh mục </b></td>
                <td><b>Thao tác</b></td>
            </tr></thead>
            <?php unset($this->_sections['res']);
$this->_sections['res']['name'] = 'res';
$this->_sections['res']['loop'] = is_array($_loop=$this->_tpl_vars['res']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['res']['show'] = true;
$this->_sections['res']['max'] = $this->_sections['res']['loop'];
$this->_sections['res']['step'] = 1;
$this->_sections['res']['start'] = $this->_sections['res']['step'] > 0 ? 0 : $this->_sections['res']['loop']-1;
if ($this->_sections['res']['show']) {
    $this->_sections['res']['total'] = $this->_sections['res']['loop'];
    if ($this->_sections['res']['total'] == 0)
        $this->_sections['res']['show'] = false;
} else
    $this->_sections['res']['total'] = 0;
if ($this->_sections['res']['show']):

            for ($this->_sections['res']['index'] = $this->_sections['res']['start'], $this->_sections['res']['iteration'] = 1;
                 $this->_sections['res']['iteration'] <= $this->_sections['res']['total'];
                 $this->_sections['res']['index'] += $this->_sections['res']['step'], $this->_sections['res']['iteration']++):
$this->_sections['res']['rownum'] = $this->_sections['res']['iteration'];
$this->_sections['res']['index_prev'] = $this->_sections['res']['index'] - $this->_sections['res']['step'];
$this->_sections['res']['index_next'] = $this->_sections['res']['index'] + $this->_sections['res']['step'];
$this->_sections['res']['first']      = ($this->_sections['res']['iteration'] == 1);
$this->_sections['res']['last']       = ($this->_sections['res']['iteration'] == $this->_sections['res']['total']);
?>
            <tr >
                <td><b><?php echo $this->_tpl_vars['res'][$this->_sections['res']['index']]['Name']; ?>
</b></td>
                <td align="left" ><img border="0" src="images/icosua.gif" class="tooltip" alt="Cập nhật danh mục" title="Cập nhật danh mục"><a href="?module=information&a=icupdate&icid=<?php echo $this->_tpl_vars['res'][$this->_sections['res']['index']]['InCat_ID']; ?>
" class="tooltip" alt="Cập nhật danh mục" title="Cập nhật danh mục"> Cập nhật</a>
                    &nbsp;<img border="0" src="images/icodelete.gif" alt="Xóa danh mục" class="tooltip" title="Xóa danh mục"><a href="?module=information&a=icdelete&icid=<?php echo $this->_tpl_vars['res'][$this->_sections['res']['index']]['InCat_ID']; ?>
" class="tooltip" alt="Xóa danh mục" title="Xóa danh mục"> Xóa</a>
                </td>
            </tr>
            <?php unset($this->_sections['child']);
$this->_sections['child']['name'] = 'child';
$this->_sections['child']['loop'] = is_array($_loop=$this->_tpl_vars['child'][$this->_sections['res']['index']]) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['child']['show'] = true;
$this->_sections['child']['max'] = $this->_sections['child']['loop'];
$this->_sections['child']['step'] = 1;
$this->_sections['child']['start'] = $this->_sections['child']['step'] > 0 ? 0 : $this->_sections['child']['loop']-1;
if ($this->_sections['child']['show']) {
    $this->_sections['child']['total'] = $this->_sections['child']['loop'];
    if ($this->_sections['child']['total'] == 0)
        $this->_sections['child']['show'] = false;
} else
    $this->_sections['child']['total'] = 0;
if ($this->_sections['child']['show']):

            for ($this->_sections['child']['index'] = $this->_sections['child']['start'], $this->_sections['child']['iteration'] = 1;
                 $this->_sections['child']['iteration'] <= $this->_sections['child']['total'];
                 $this->_sections['child']['index'] += $this->_sections['child']['step'], $this->_sections['child']['iteration']++):
$this->_sections['child']['rownum'] = $this->_sections['child']['iteration'];
$this->_sections['child']['index_prev'] = $this->_sections['child']['index'] - $this->_sections['child']['step'];
$this->_sections['child']['index_next'] = $this->_sections['child']['index'] + $this->_sections['child']['step'];
$this->_sections['child']['first']      = ($this->_sections['child']['iteration'] == 1);
$this->_sections['child']['last']       = ($this->_sections['child']['iteration'] == $this->_sections['child']['total']);
?>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&brvbar;--&nbsp;<?php echo $this->_tpl_vars['child'][$this->_sections['res']['index']][$this->_sections['child']['index']]['Name']; ?>
</td>
                <td align="left"><img border="0" src="images/icosua.gif" alt="Cập nhật danh mục" title="Cập nhật danh mục"><a href="?module=information&a=icupdate&icid=<?php echo $this->_tpl_vars['child'][$this->_sections['res']['index']][$this->_sections['child']['index']]['InCat_ID']; ?>
" class="tooltip" style="text-decoration:none"> Cập nhật</a>
                    &nbsp;<img border="0" src="images/icodelete.gif" alt="Xóa danh mục" title="Xóa danh mục"><a href="?module=information&a=icdelete&icid=<?php echo $this->_tpl_vars['child'][$this->_sections['res']['index']][$this->_sections['child']['index']]['InCat_ID']; ?>
" class="tooltip" style="text-decoration:none"> Xóa</a>
                </td>
            </tr>
            <?php endfor; endif; ?>
            <?php endfor; endif; ?>
            </tbody>
            </table>
            <div style="text-align:right"><input name="btnAddNew" type="button" value="Thêm danh mục" class="button" onClick="window.location='index.php?module=information&a=icadd'"/>
            </div>
        </form>
            <?php else: ?>
            <div class="message information">
                <h2>Thông báo</h2>
                <p>Hiện tại chưa có thông tin</p>
            </div>
            <?php endif; ?>
        </div></div>