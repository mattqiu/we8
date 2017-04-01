<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<ul class="nav nav-tabs">
	<li><a href="<?php  echo url('activity/coupon/display', array());?>">卡券列表</a></li>
	<li class="active"><a href="javascript:;">卡券详情</a></li>
</ul>
<div class="main">
	<form action="" method="post" id="form-location" class="form-horizontal" enctype="multipart/form-data">
		<div class="panel panel-default" id="step1">
			<div class="panel-heading">
				<?php  echo $coupon_title;?>
			</div>
			<div class="panel-body">
				<div class="pull-left" style="width:320px;background:#F4F5F9;margin-right:20px;border:1px solid #E7E7EB">
					<div class="card-title"><?php  echo $coupon_title;?></div>
					<div class="card_section" style="position: relative">
						<div class="shop-panel" id="color-purview" style="background:<?php  echo $colors[$coupon['color']];?>">
							<div class="logo-area">
								<span class="logo pull-left"><img src="<?php  echo $coupon['logo_url'];?>" alt=""/></span>
								<div class="pull-left" style="height:38px;line-height:38px"><?php  echo $coupon['brand_name'];?></div>
								<div class="clear"></div>
							</div>
							<div class="msg-area">
								<div class="tick-msg">
									<p><b id="title-purview"><?php  echo $coupon['title'];?></b></p>
									<p id="sub-title-purview"><?php  echo $coupon['sub_title'];?></p>
								</div>
								<p id="sub-time-purview" style="text-align: center">
									<?php  echo $coupon['extra_date_info'];?>
								</p>
							</div>
							<div class="deco"></div>
							<div class="cicon">
								<a href="javascript:;" data-id="form1"><i class="fa fa-pencil"></i></a>
							</div>
						</div>
					</div>
					<div class="card-dispose">
						<div class="destroy_type_preview">
							<?php  if($coupon['code_type'] == 3) { ?>
							<div class="barcode-area code_preview_3">
								<div class="barcode"></div>
								<p class="code_num">1513-2290-1878</p>
							</div>
							<?php  } else if($coupon['code_type'] == 2) { ?>
							<div class="qrcode-area code_preview_2">
								<div class="qrcode"></div>
								<p class="code_num">1513-2290-1878</p>
							</div>
							<?php  } else { ?>
							<div class="sn-area code_preview_1">1513-2290-1878</div>
							<?php  } ?>
							<p style="text-align: center" id="notice-purview"><?php  echo $coupon['notice'];?></p>
						</div>
						<div class="cicon">
							<a href="javascript:;" data-id="form2"><i class="fa fa-pencil"></i></a>
						</div>
					</div>
					<div class="shop-detail">
						<ul class="list">
							<li>
								<div class="li-panel">
									<div class="li-content"><?php  echo $coupon_title;?>设置</div>
									<span class="ricon fa fa-angle-right"></span>
									<div class="cicon">
										<a href="javascript:;" data-id="form3"><i class="fa fa-pencil"></i></a>
									</div>
								</div>
							</li>
							<li>
								<div class="li-panel">
									<div class="li-content">适用门店</div>
									<span class="ricon"><?php  echo $coupon['location_count'];?>家</span>
									<div class="cicon">
										<a href="javascript:;" data-id="form4"><i class="fa fa-pencil"></i></a>
									</div>
								</div>
							</li>
						</ul>
					</div>
					<div class="shop-detail">
						<ul class="list">
							<li>
								<div class="li-panel">
									<div class="li-content">立即使用</div>
									<span class="ricon">系统已实现</span>
								</div>
							</li>
							<?php  if(!empty($coupon['promotion_url_name'])) { ?>
							<li>
								<div class="li-panel" style="border-bottom: none">
									<div class="li-content"><?php  echo $coupon['promotion_url_name'];?></div>
									<div class="ricon"><span><?php  echo $coupon['promotion_url_sub_title'];?></span><i class="fa fa-angle-right"></i></div>
									<div class="cicon">
										<a href="javascript:;" data-id="form6"><i class="fa fa-pencil"></i></a>
									</div>
								</div>
							</li>
							<?php  } ?>
						</ul>
					</div>
				</div>
				<div class="pull-left alert form" style="width:700px;position:relative;display:block;" id="form1">
					<h4>券面信息</h4>
					<div class="form-group marbot0">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class="text-danger"></span> 卡券类型</label>
						<div class="col-sm-9 col-xs-12">
							<p class="form-control-static"><?php  echo $coupon_title;?></p>
						</div>
					</div>
					<div class="form-group marbot0">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class="text-danger"></span> 卡券id</label>
						<div class="col-sm-9 col-xs-12">
							<p class="form-control-static"><?php  echo $coupon['card_id'];?></p>
						</div>
					</div>
					<div class="form-group marbot0">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class="text-danger"></span> 适用模块</label>
						<div class="col-sm-9 col-xs-12">
							<p class="form-control-static">
								<?php  if(!empty($coupon['modules'])) { ?>
									<?php  if(is_array($coupon['modules'])) { foreach($coupon['modules'] as $module) { ?>
										<?php  echo $module['title'];?>&nbsp;
									<?php  } } ?>
								<?php  } else { ?>
									所有模块适用
								<?php  } ?>
							</p>
						</div>
					</div>
					<div class="form-group marbot0">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class="text-danger"></span> 卡券标题</label>
						<div class="col-sm-9 col-xs-12">
							<p class="form-control-static"><?php  echo $coupon['title'];?></p>
						</div>
					</div>
					<div class="form-group marbot0">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class="text-danger"></span> 卡券副标题</label>
						<div class="col-sm-9 col-xs-12">
							<p class="form-control-static"><?php  if(!empty($coupon['sub_title'])) { ?><?php  echo $coupon['sub_title'];?><?php  } else { ?>无<?php  } ?></p>
						</div>
					</div>
					<?php  if($coupon['type'] == COUPON_TYPE_DISCOUNT) { ?>
					<div class="form-group marbot0">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class="text-danger"></span> 卡券额度</label>
						<div class="col-sm-9 col-xs-12">
							<p class="form-control-static"><?php  echo $coupon['extra_instruction'];?></p>
						</div>
					</div>
					<?php  } else if($coupon['type'] == COUPON_TYPE_CASH) { ?>
					<div class="form-group marbot0">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class="text-danger"></span> 减免金额</label>
						<div class="col-sm-9 col-xs-12">
							<p class="form-control-static"><?php  echo $coupon['detail']['reduce_cost'];?>元</p>
						</div>
					</div>
					<div class="form-group marbot0">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class="text-danger"></span> 抵扣条件</label>
						<div class="col-sm-9 col-xs-12">
							<p class="form-control-static">满<?php  echo $coupon['detail']['least_cost'];?>元可用</p>
						</div>
					</div>
					<?php  } ?>
					<div class="form-group marbot0">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class="text-danger"></span> 有效期</label>
						<div class="col-sm-9 col-xs-12">
							<p class="form-control-static">
							<?php  echo $coupon['extra_date_info'];?>
							</p>
						</div>
					</div>
					<div class="form-group marbot0">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class="text-danger"></span> 商户名称</label>
						<div class="col-sm-9 col-xs-12">
							<p class="form-control-static">
								<?php  echo $coupon['brand_name'];?>
							</p>
						</div>
					</div>
					<h4>投放信息</h4>
					<div class="form-group marbot0">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class="text-danger"></span> 库存</label>
						<div class="col-sm-9 col-xs-12">
							<p class="form-control-static">
								<?php  echo $coupon['quantity'];?>
							</p>
						</div>
					</div>
					<div class="form-group marbot0">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class="text-danger"></span> 领取限制</label>
						<div class="col-sm-9 col-xs-12">
							<p class="form-control-static">
								每个用户限领<?php  echo $coupon['get_limit'];?>张
							</p>
						</div>
					</div>
					<div class="form-group marbot0">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class="text-danger"></span> 销券条码</label>
						<div class="col-sm-9 col-xs-12">
							<p class="form-control-static">
								<?php  if($coupon['code_type'] == 1) { ?>
								卡号
								<?php  } else if($coupon['code_type'] == 2) { ?>
								二维码
								<?php  } else { ?>
								条形码
								<?php  } ?>
							</p>
						</div>
					</div>
					<?php  if(COUPON_TYPE == WECHAT_COUPON) { ?>
					<div class="form-group marbot0">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class="text-danger"></span> 操作提示</label>
						<div class="col-sm-9 col-xs-12">
							<p class="form-control-static">
								<?php  echo $coupon['notice'];?>
							</p>
						</div>
					</div>
					
					<div class="form-group marbot0">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class="text-danger"></span> 分享设置</label>
						<div class="col-sm-9 col-xs-12">
							<p class="form-control-static">
								<?php  if($coupon['can_share']) { ?>用户可以分享领券链接<?php  } else { ?>用户不能分享领券链接<?php  } ?>
							</p>
						</div>
					</div>
					<div class="form-group marbot0">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class="text-danger"></span> 转赠设置</label>
						<div class="col-sm-9 col-xs-12">
							<p class="form-control-static">
								<?php  if($coupon['can_give_friend']) { ?>用户领券后可转赠其他好友<?php  } else { ?>用户领券后不能转赠其他好友<?php  } ?>
							</p>
						</div>
					</div>
					<?php  } ?>
					<h4><?php  echo $coupon_title;?>详情</h4>
					<div class="form-group marbot0">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class="text-danger"></span> 使用须知</label>
						<div class="col-sm-9 col-xs-12">
							<p class="form-control-static">
								<?php  echo $coupon['description'];?>
							</p>
						</div>
					</div>
					<div class="form-group marbot0">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class="text-danger"></span> 客服电话</label>
						<div class="col-sm-9 col-xs-12">
							<p class="form-control-static">
								<?php  echo $coupon['service_phone'];?>
							</p>
						</div>
					</div>
					<h4>适用门店</h4>
					<?php  if(!empty($coupon['location_id_list'])) { ?>
						<?php  if(is_array($coupon['location_id_list'])) { foreach($coupon['location_id_list'] as $location) { ?>
							<?php  echo $location['business_name'];?>
						<?php  } } ?>
					<?php  } else { ?>
					适用于全部门店
					<?php  } ?>
				</div>
			</div>
		</div>
		<div class="form-group col-sm-12">
			<span class="btn btn-primary col-lg-1" onclick="javascript:history.go(-1)">返回</span>
		</div>
	</form>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>