<?php /* Smarty version 2.6.13, created on 2014-04-17 13:27:52
         compiled from default/header.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script language="JavaScript" type="text/javascript" src="<?php echo @URL_HOMEPAGE; ?>
/templates/<?php echo $this->_tpl_vars['template']; ?>
/jscripts/jquery-1.7.1.min.js" ></script>
<link href="<?php echo @URL_HOMEPAGE; ?>
/templates/<?php echo $this->_tpl_vars['template']; ?>
/css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo @URL_HOMEPAGE; ?>
/templates/<?php echo $this->_tpl_vars['template']; ?>
/css/carousel.css" media="screen" />
<script language="JavaScript" type="text/javascript" src="<?php echo @URL_HOMEPAGE; ?>
/templates/<?php echo $this->_tpl_vars['template']; ?>
/jscripts/jquery.myjcarousel.js" ></script>


<title>Phu Quoc Taste</title>
</head>

<body>
	<div class="page">
	   <div class="header">
			<a class="header_logo" href="#" title="">
				Biên hải quán
			</a>
			<div class="header_right">
				<div class="cart">	
					<a href="<?php echo @URL_HOMEPAGE; ?>
/product/cart.html" class="cart_bg"><span><span>Có <b><?php echo $this->_tpl_vars['slincart']; ?>
</b> sản phẩm </span></span></a>
				</div>
				<div class="language">	
					<a href="<?php echo @URL_HOMEPAGE; ?>
/home/lang/vi.html"><img src="<?php echo @URL_HOMEPAGE; ?>
/templates/<?php echo $this->_tpl_vars['template']; ?>
/images/flag_03.png" /></a>
					<!--<a href="<?php echo @URL_HOMEPAGE; ?>
/home/lang/en.html"><img src="<?php echo @URL_HOMEPAGE; ?>
/templates/<?php echo $this->_tpl_vars['template']; ?>
/images/flag_05.png" /></a>-->
				</div>
			</div> <!-- end header_right-->
		</div> <!-- end header-->
		<div class="menu">
			<ul>
			   <li class="children"><a href="<?php echo @URL_HOMEPAGE; ?>
/home.html"><?php echo @_HOME; ?>
</a> </li>
                <li class=""><a href="#"><?php echo @_ABOUTUS; ?>
</a>
                    <div class="sub_menu" style="">
                        <ul>
                            <?php unset($this->_sections['incat']);
$this->_sections['incat']['name'] = 'incat';
$this->_sections['incat']['loop'] = is_array($_loop=$this->_tpl_vars['incat']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['incat']['show'] = true;
$this->_sections['incat']['max'] = $this->_sections['incat']['loop'];
$this->_sections['incat']['step'] = 1;
$this->_sections['incat']['start'] = $this->_sections['incat']['step'] > 0 ? 0 : $this->_sections['incat']['loop']-1;
if ($this->_sections['incat']['show']) {
    $this->_sections['incat']['total'] = $this->_sections['incat']['loop'];
    if ($this->_sections['incat']['total'] == 0)
        $this->_sections['incat']['show'] = false;
} else
    $this->_sections['incat']['total'] = 0;
if ($this->_sections['incat']['show']):

            for ($this->_sections['incat']['index'] = $this->_sections['incat']['start'], $this->_sections['incat']['iteration'] = 1;
                 $this->_sections['incat']['iteration'] <= $this->_sections['incat']['total'];
                 $this->_sections['incat']['index'] += $this->_sections['incat']['step'], $this->_sections['incat']['iteration']++):
$this->_sections['incat']['rownum'] = $this->_sections['incat']['iteration'];
$this->_sections['incat']['index_prev'] = $this->_sections['incat']['index'] - $this->_sections['incat']['step'];
$this->_sections['incat']['index_next'] = $this->_sections['incat']['index'] + $this->_sections['incat']['step'];
$this->_sections['incat']['first']      = ($this->_sections['incat']['iteration'] == 1);
$this->_sections['incat']['last']       = ($this->_sections['incat']['iteration'] == $this->_sections['incat']['total']);
?>
                            <li><a href="<?php echo @URL_HOMEPAGE; ?>
/information/view/<?php echo $this->_tpl_vars['incat'][$this->_sections['incat']['index']]['InCat_ID']; ?>
/view.html"><?php echo $this->_tpl_vars['incat'][$this->_sections['incat']['index']]['Name']; ?>
</a></li>
                            <?php endfor; endif; ?>
                        </ul>
                    </div>
                </li>
				<li class=""><a href="#"><?php echo @_PRODUCTS; ?>
</a>
					<div class="sub_menu" style="">
						<ul>
							<?php unset($this->_sections['cat']);
$this->_sections['cat']['name'] = 'cat';
$this->_sections['cat']['loop'] = is_array($_loop=$this->_tpl_vars['cat']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['cat']['show'] = true;
$this->_sections['cat']['max'] = $this->_sections['cat']['loop'];
$this->_sections['cat']['step'] = 1;
$this->_sections['cat']['start'] = $this->_sections['cat']['step'] > 0 ? 0 : $this->_sections['cat']['loop']-1;
if ($this->_sections['cat']['show']) {
    $this->_sections['cat']['total'] = $this->_sections['cat']['loop'];
    if ($this->_sections['cat']['total'] == 0)
        $this->_sections['cat']['show'] = false;
} else
    $this->_sections['cat']['total'] = 0;
if ($this->_sections['cat']['show']):

            for ($this->_sections['cat']['index'] = $this->_sections['cat']['start'], $this->_sections['cat']['iteration'] = 1;
                 $this->_sections['cat']['iteration'] <= $this->_sections['cat']['total'];
                 $this->_sections['cat']['index'] += $this->_sections['cat']['step'], $this->_sections['cat']['iteration']++):
$this->_sections['cat']['rownum'] = $this->_sections['cat']['iteration'];
$this->_sections['cat']['index_prev'] = $this->_sections['cat']['index'] - $this->_sections['cat']['step'];
$this->_sections['cat']['index_next'] = $this->_sections['cat']['index'] + $this->_sections['cat']['step'];
$this->_sections['cat']['first']      = ($this->_sections['cat']['iteration'] == 1);
$this->_sections['cat']['last']       = ($this->_sections['cat']['iteration'] == $this->_sections['cat']['total']);
?>
                            <li><a href="<?php echo @URL_HOMEPAGE; ?>
/product/cat/<?php echo $this->_tpl_vars['cat'][$this->_sections['cat']['index']]['Category_ID']; ?>
/cat.html"><?php echo $this->_tpl_vars['cat'][$this->_sections['cat']['index']]['Category_Name']; ?>
</a></li>
                            <?php endfor; endif; ?>
						</ul>
					</div>
				</li>
				<li class="children "><a href="<?php echo @URL_HOMEPAGE; ?>
/news.html"><?php echo @_NEWS; ?>
</a></li>
				<li class="children "><a href="<?php echo @URL_HOMEPAGE; ?>
/contact.html"><?php echo @_CONTACT; ?>
</a></li>
			</ul>
		<div class="search_block_top">
			<form method="post" action="<?php echo @URL_HOMEPAGE; ?>
/search/search.html" id="searchbox">
				<input class="search_query" type="text" id="search_query_top" name="Search" value="<?php echo @_SEARCH; ?>
" onFocus="if(this.value=='<?php echo @_SEARCH; ?>
')this.value='';" onBlur="if(this.value=='')this.value='<?php echo @_SEARCH; ?>
';" />
				<a href="javascript:document.getElementById('searchbox').submit();">Go!</a>
			</form>
		</div>
		</div>
        <?php if ($_GET['mod'] == "" || $_GET['mod'] == 'home'): ?>
        <div class="main">
        <?php else: ?>
        <div class="main2">
        <?php endif; ?>
			<div class="content">
				<div class="banner">
					<a href="#"><img src="<?php echo @URL_HOMEPAGE; ?>
/templates/<?php echo $this->_tpl_vars['template']; ?>
/images/slide_03.jpg" /> </a>
				</div>
			</div><!--End #content-->