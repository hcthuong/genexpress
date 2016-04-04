<?php /* Smarty version 2.6.13, created on 2014-04-21 08:31:14
         compiled from default/information/view.html */ ?>
<div class="product">
    <h3><span> <?php echo @_ABOUTUS; ?>
 </span></h3>
    <div class="infor_samecat" style="padding-left: 30px">&raquo; <?php echo $this->_tpl_vars['catname']['Name']; ?>
</div>
    <div class="frame_product" align="center">
        <table border="0" width="90%" cellpadding="10" cellspacing="5" style="border-collapse:collapse; font-size: 12px;">
            <?php unset($this->_sections['n']);
$this->_sections['n']['name'] = 'n';
$this->_sections['n']['loop'] = is_array($_loop=$this->_tpl_vars['list']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['n']['show'] = true;
$this->_sections['n']['max'] = $this->_sections['n']['loop'];
$this->_sections['n']['step'] = 1;
$this->_sections['n']['start'] = $this->_sections['n']['step'] > 0 ? 0 : $this->_sections['n']['loop']-1;
if ($this->_sections['n']['show']) {
    $this->_sections['n']['total'] = $this->_sections['n']['loop'];
    if ($this->_sections['n']['total'] == 0)
        $this->_sections['n']['show'] = false;
} else
    $this->_sections['n']['total'] = 0;
if ($this->_sections['n']['show']):

            for ($this->_sections['n']['index'] = $this->_sections['n']['start'], $this->_sections['n']['iteration'] = 1;
                 $this->_sections['n']['iteration'] <= $this->_sections['n']['total'];
                 $this->_sections['n']['index'] += $this->_sections['n']['step'], $this->_sections['n']['iteration']++):
$this->_sections['n']['rownum'] = $this->_sections['n']['iteration'];
$this->_sections['n']['index_prev'] = $this->_sections['n']['index'] - $this->_sections['n']['step'];
$this->_sections['n']['index_next'] = $this->_sections['n']['index'] + $this->_sections['n']['step'];
$this->_sections['n']['first']      = ($this->_sections['n']['iteration'] == 1);
$this->_sections['n']['last']       = ($this->_sections['n']['iteration'] == $this->_sections['n']['total']);
?>
            <tr>
                <td width="76" style="padding-bottom:7px"><a href="<?php echo @URL_HOMEPAGE; ?>
/information/detail/<?php echo $this->_tpl_vars['list'][$this->_sections['n']['index']]['Information_ID']; ?>
/<?php echo $this->_tpl_vars['list'][$this->_sections['n']['index']]['Title_r']; ?>
.html"><img style="border: 1px solid #000000" src="<?php echo @URL_HOMEPAGE; ?>
/upload/news_thumb/<?php echo $this->_tpl_vars['list'][$this->_sections['n']['index']]['Image']; ?>
" /></a></td>
                <td valign="top" style="padding-left: 10px"><span class="news_title" style="padding-bottom: 3px;"><a href="<?php echo @URL_HOMEPAGE; ?>
/information/detail/<?php echo $this->_tpl_vars['list'][$this->_sections['n']['index']]['Information_ID']; ?>
/<?php echo $this->_tpl_vars['list'][$this->_sections['n']['index']]['Title_r']; ?>
.html"><?php echo $this->_tpl_vars['list'][$this->_sections['n']['index']]['Title']; ?>
</a></span><br /><?php echo $this->_tpl_vars['list'][$this->_sections['n']['index']]['Summary']; ?>
</td>
            </tr>
            <?php endfor; endif; ?>
        </table>
    </div>
    <div style="padding-bottom: 5px;" align="center"><?php echo $this->_tpl_vars['paging']; ?>
</div>
</div>
</div><!--End #main-->
<div class="bg_bottom"></div>