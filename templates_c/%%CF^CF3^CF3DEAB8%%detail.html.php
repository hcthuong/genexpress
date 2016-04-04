<?php /* Smarty version 2.6.13, created on 2014-04-21 05:51:16
         compiled from default/information/detail.html */ ?>
<div class="product">
    <h3><span> <?php echo @_ABOUTUS; ?>
 </span></h3>
    <div class="frame_product">
        <div class="infor_samecat"><?php if ($this->_tpl_vars['namecat']['Parent_ID'] != 0): ?> &raquo; <a href="<?php echo @URL_HOMEPAGE; ?>
/information/view/<?php echo $this->_tpl_vars['namecat']['Parent_ID']; ?>
/view.html"><?php echo $this->_tpl_vars['namecat']['Parent_Name']; ?>
</a><?php endif; ?> &raquo; <?php echo $this->_tpl_vars['namecat']['Name']; ?>
</div>
        <table border="0" width="90%" cellpadding="5" cellspacing="0" style="font-size: 12px;">
            <tr>
                <td width="76"><img style="border: 1px solid #000000" src="<?php echo @URL_HOMEPAGE; ?>
/upload/news_thumb/<?php echo $this->_tpl_vars['detail']['Image']; ?>
" /></td>
                <td valign="top" style="padding-left: 10px"><span class="news_title_detail"><?php echo $this->_tpl_vars['detail']['Title']; ?>
</span><br /><br /><span><i><?php echo $this->_tpl_vars['detail']['Summary']; ?>
</i></span></td>
                <td width="150" align="center" valign="top" class="news_time"></td>
            </tr>
            <tr>
                <td colspan="3" style="padding: 0px 0px 10px 10px"><?php echo $this->_tpl_vars['detail']['Description']; ?>
</td>
            </tr>
            <tr>
                <td colspan="3" align="right" style="padding: 0px 10px 10px 0px"><b><?php echo $this->_tpl_vars['detail']['Create_Name']; ?>
</b> (<i><?php echo $this->_tpl_vars['detail']['Source']; ?>
</i>)</td>
            </tr>
        </table>
        <br />
        <?php if ($this->_tpl_vars['list']): ?>
        <div class="infor_same">
            <div class="infor_same2"><?php echo @_INFORMATION_SAMECAT; ?>
</div>
            <ul>
                <?php unset($this->_sections['l']);
$this->_sections['l']['name'] = 'l';
$this->_sections['l']['loop'] = is_array($_loop=$this->_tpl_vars['list']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['l']['show'] = true;
$this->_sections['l']['max'] = $this->_sections['l']['loop'];
$this->_sections['l']['step'] = 1;
$this->_sections['l']['start'] = $this->_sections['l']['step'] > 0 ? 0 : $this->_sections['l']['loop']-1;
if ($this->_sections['l']['show']) {
    $this->_sections['l']['total'] = $this->_sections['l']['loop'];
    if ($this->_sections['l']['total'] == 0)
        $this->_sections['l']['show'] = false;
} else
    $this->_sections['l']['total'] = 0;
if ($this->_sections['l']['show']):

            for ($this->_sections['l']['index'] = $this->_sections['l']['start'], $this->_sections['l']['iteration'] = 1;
                 $this->_sections['l']['iteration'] <= $this->_sections['l']['total'];
                 $this->_sections['l']['index'] += $this->_sections['l']['step'], $this->_sections['l']['iteration']++):
$this->_sections['l']['rownum'] = $this->_sections['l']['iteration'];
$this->_sections['l']['index_prev'] = $this->_sections['l']['index'] - $this->_sections['l']['step'];
$this->_sections['l']['index_next'] = $this->_sections['l']['index'] + $this->_sections['l']['step'];
$this->_sections['l']['first']      = ($this->_sections['l']['iteration'] == 1);
$this->_sections['l']['last']       = ($this->_sections['l']['iteration'] == $this->_sections['l']['total']);
?>
                <li><a href="<?php echo @URL_HOMEPAGE; ?>
/information/detail/<?php echo $this->_tpl_vars['list'][$this->_sections['l']['index']]['Information_ID']; ?>
/<?php echo $this->_tpl_vars['list'][$this->_sections['l']['index']]['Title_r']; ?>
.html"><?php echo $this->_tpl_vars['list'][$this->_sections['l']['index']]['Title']; ?>
</a></li>
                <?php endfor; endif; ?>
            </ul>
        </div>
        <?php endif; ?>
    </div>
</div><!--End #main-->
<div class="bg_bottom"></div>