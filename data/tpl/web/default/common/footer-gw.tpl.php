<?php defined('IN_IA') or exit('Access Denied');?>			</div>
		</div>
		<script type="text/javascript">
			require(['bootstrap']);
			<?php  if($_W['isfounder'] && !defined('IN_MESSAGE')) { ?>
			function checkupgrade() {
				require(['util'], function(util) {
					if (util.cookie.get('checkupgrade_sys')) {
						return;
					}
					$.getJSON("<?php  echo url('utility/checkupgrade/system');?>", function(ret){
						if (ret && ret.message && ret.message.upgrade == '1') {
							$('body').prepend('<div id="upgrade-tips" class="upgrade-tips"><a href="./index.php?c=cloud&a=upgrade&">系统检测到新版本 '+ret.message.version+' ('+ ret.message.release +') ，请尽快更新！</a><span class="tips-close" style="background:#d03e14;" onclick="checkupgrade_hide();"><i class="fa fa-times-circle"></i></span></div>');
							if ($('#upgrade-tips-module').size()) {
								$('#upgrade-tips').css('top', '25px');
							}
						}
					});
				});
			}

			function checkupgrade_hide() {
				require(['util'], function(util) {
					util.cookie.set('checkupgrade_sys', 1, 3600);
					$('#upgrade-tips').hide();
				});
			}
			$(function(){
				checkupgrade();
			});
			<?php  } ?>

			<?php  if($_W['uid']) { ?>
				function checknotice() {
					$.post("<?php  echo url('utility/notice')?>", {}, function(data){
						var data = $.parseJSON(data);
						$('#notice-container').html(data.notices);
						$('#notice-total').html(data.total);
						if(data.total > 0) {
							$('#notice-total').css('background', '#ff9900');
						} else {
							$('#notice-total').css('background', '');
						}
						setTimeout(checknotice, 60000);
					});
				}
				checknotice();
			<?php  } ?>
		</script>
		<div class="center-block footer" role="footer">
			<div class="text-center">
				<?php  if(empty($_W['setting']['copyright']['footerright'])) { ?><a href="http://www.we7.cc">关于无妄</a>&nbsp;&nbsp;<a href="http://bbs.we7.cc">无妄论坛</a>&nbsp;&nbsp;<a href="http://wpa.b.qq.com/cgi/wpa.php?ln=1&key=XzkzODAwMzEzOV8xNzEwOTZfNDAwMDgyODUwMl8yXw">联系客服</a><?php  } else { ?><?php  echo $_W['setting']['copyright']['footerright'];?><?php  } ?><?php  if(!empty($_W['setting']['copyright']['statcode'])) { ?><?php  echo $_W['setting']['copyright']['statcode'];?><?php  } ?>
			</div>
			<div class="text-center">
				<?php  if(empty($_W['setting']['copyright']['footerleft'])) { ?>Powered by <a href="http://www.we7.cc"><b>无妄</b></a> v<?php echo IMS_VERSION;?> &copy; 2014-2015 <a href="http://www.we7.cc">www.we7.cc</a><?php  } else { ?><?php  echo $_W['setting']['copyright']['footerleft'];?><?php  } ?>
			</div>
		</div>
	</div>
			<?php  if(!empty($_W['setting']['copyright']['statcode'])) { ?><?php  echo $_W['setting']['copyright']['statcode'];?><?php  } ?>

			<script>$(function(){$('img').attr('onerror', '').on('error', function(){if (!$(this).data('check-src') && (this.src.indexOf('http://') > -1 || this.src.indexOf('https://') > -1)) {this.src = this.src.indexOf('http://127.0.0.1:8888/we8/attachment/') == -1 ? this.src.replace('http://7xs1jg.com1.z0.glb.clouddn.com/', 'http://127.0.0.1:8888/we8/attachment/') : this.src.replace('http://127.0.0.1:8888/we8/attachment/', 'http://7xs1jg.com1.z0.glb.clouddn.com/');$(this).data('check-src', true);}});});</script></body>
</html>
