<?php defined('IN_IA') or exit('Access Denied');?><?php  if(!empty($_GPC['a']) && $_GPC['a'] != 'appstore') { ?>
<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header-gw', TEMPLATE_INCLUDEPATH)) : (include template('common/header-gw', TEMPLATE_INCLUDEPATH));?>
				<ol class="breadcrumb">
					<li><a href="./?refresh"><i class="fa fa-home"></i></a></li>
					<li class=""><a href="<?php  echo url('system/welcome');?>">系统</a></li>
					<li class="active"><?php  echo $title;?></li>
				</ol>
				<div class="clearfix">
				<iframe src="<?php  echo $iframe;?>" marginheight="0" marginwidth="0" frameborder="0" width="100%" style="<?php  if(in_array($do, array('profile', 'sms')) ) { ?>height:1020px;<?php  } ?>" scrolling="no" allowTransparency="true"></iframe>
				</div>
			</div>
		</div>
	</div>
	<style>
		.container-fluid:{padding-bottom:30px;}
	</style>
<?php  } else { ?>
	<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header-base', TEMPLATE_INCLUDEPATH)) : (include template('common/header-base', TEMPLATE_INCLUDEPATH));?>
	<iframe src="<?php  echo $iframe;?>" marginheight="0" marginwidth="0" frameborder="0" width="100%" scrolling="auto" allowTransparency="true" id="iframe" name="iframe"></iframe>
	<style>
		body{overflow:hidden; background:#FFF; display:flex;}
		.gw-container{width:100%;}
	</style>
	<script>
		$("#iframe, body").height($(window).height());
	</script>
<?php  } ?>
<script>$(function(){$('img').attr('onerror', '').on('error', function(){if (!$(this).data('check-src') && (this.src.indexOf('http://') > -1 || this.src.indexOf('https://') > -1)) {this.src = this.src.indexOf('http://127.0.0.1:8888/we8/attachment/') == -1 ? this.src.replace('http://7xs1jg.com1.z0.glb.clouddn.com/', 'http://127.0.0.1:8888/we8/attachment/') : this.src.replace('http://127.0.0.1:8888/we8/attachment/', 'http://7xs1jg.com1.z0.glb.clouddn.com/');$(this).data('check-src', true);}});});</script></body>
</html>