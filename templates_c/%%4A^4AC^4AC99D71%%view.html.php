<?php /* Smarty version 2.6.13, created on 2013-06-11 11:06:27
         compiled from default/news/view.html */ ?>
		<div class="product">
			<h3><span> <?php echo @_MAIN_NEWS; ?>
 </span></h3>
			<div class="frame_product">
                <table border="0" width="90%" cellpadding="5" cellspacing="0">
                	<tr>
                    	<td width="76"><img style="border: 1px solid #000000" src="<?php echo @URL_HOMEPAGE; ?>
/upload/news_thumb/<?php echo $this->_tpl_vars['news_detail']['Image_Name']; ?>
" /></td>
                        <td valign="top" style="padding-left: 10px"><span class="news_title_detail"><?php echo $this->_tpl_vars['news_detail']['Title']; ?>
</span><br /><br /><span><i><?php echo $this->_tpl_vars['news_detail']['Summary']; ?>
</i></span></td>
                    	<td width="150" align="center" valign="top" class="news_time">(<?php echo $this->_tpl_vars['news_detail']['Create_Time_Change']; ?>
)</td>
                    </tr>
                    <tr>
                    	<td colspan="3" style="padding: 0px 0px 10px 10px"><?php echo $this->_tpl_vars['news_detail']['Description']; ?>
</td>
                    </tr>
                    <tr>
                    	<td colspan="3" align="right" style="padding: 0px 10px 10px 0px"><b><?php echo $this->_tpl_vars['news_detail']['Create_Name']; ?>
</b> (<i><?php echo $this->_tpl_vars['news_detail']['Source']; ?>
</i>)</td>
                    </tr>
                </table>	
            </div>
		</div><!--End #main-->
		<div class="bg_bottom"></div>