<?php
	if (empty($_GPC['id'])) {
        message('抱歉，参数错误！', '', 'error');
    }
	$sid = intval($_GPC['id']);
	$record = pdo_fetch("SELECT * FROM ".tablename('auction_record')." WHERE uniacid = '{$weid}' and from_user ='{$_W['fans']['from_user']}' and sid= '{$sid}' ");
	$proplemess = pdo_fetch("SELECT * FROM ".tablename('auction_member')." WHERE uniacid = '{$weid}' and from_user ='{$_W['fans']['from_user']}' ");
	$goods = pdo_fetch("SELECT * FROM ".tablename('auction_goodslist')." WHERE id= '{$sid}' ");
	if (empty($proplemess)) {
		message('请先填写您的资料！', $this->createMobileUrl('prodata'), 'warning');
	}
	$ordersn=date('Ymd').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);
	$nowrecord = pdo_fetch("SELECT * FROM ".tablename('auction_record')." WHERE uniacid = '{$weid}' and from_user ='{$_W['fans']['from_user']}' and sid= '{$sid}' and price = '{$_GPC['count']}' ");
	if ($nowrecord) {
		message('您已出价，请勿重复出价！',$this->createMobileUrl('record'),'success');
	}else{
		if ($record) {
			$data=array(
				'from_user'=>$_W['fans']['from_user'],
				'nickname'=>$proplemess['nickname'],
				'uniacid'=>$weid,
				'sid'=>$sid,
				'uid'=>$proplemess['id'],
				'ordersn'=>$ordersn,
				'price'=>$_GPC['count'],
				'createtime' => TIMESTAMP,
				);
			$s_data=array(
				'st_price'=>$_GPC['count'],
				'pos' => $goods['pos'] + 1,
				);
			if(pdo_insert('auction_record',$data)){
				pdo_update('auction_goodslist', $s_data, array('id' => $_GPC['id']));
				$records = pdo_fetchall("SELECT * FROM ".tablename('auction_record')." WHERE uniacid = '{$weid}' and sid= '{$sid}' order by id desc LIMIT 0,2 ");
				load()->model('account');
				$sendinfo = '您参与的拍品：\n';
				$sendinfo .= $goods['title'].'\n';
				$sendinfo .= '出价被超越，您可以重新出价！\n';
				$send['msgtype'] = 'text';
				$send['text'] = array('content' => urlencode($sendinfo));
				$acc = WeAccount::create($_W['acid']);
				$send['touser'] = trim($records[1]['from_user']);
				$s_mess = $acc->sendCustomNotice($send);
				message('出价成功！',$this->createMobileUrl('record'),'success');
			}else{
				message('出价失败！');
			}
		}else{
			if ($_GPC['bond'] <= $proplemess['balance']) {
				$proplemess['balance']=$proplemess['balance']-intval($_GPC['bond']);
			}else{
				message('余额不足以支付保证金，请及时充值！',$this->createMobileUrl('recharge'),'warning');
			}
			
			$data=array(
				'from_user'=>$_W['fans']['from_user'],
				'nickname'=>$proplemess['nickname'],
				'uniacid'=>$weid,
				'sid'=>$sid,
				'uid'=>$proplemess['id'],
				'ordersn'=>$ordersn,
				'price'=>$_GPC['count'],
				'bond'=>$_GPC['bond'],
				'createtime' => TIMESTAMP,
				);

			$s_data=array(
				'st_price'=>$_GPC['count'],
				'pos' => $goods['pos'] + 1,
				);

			$m_data=array(
				'balance' => $proplemess['balance'],
				);

			if(pdo_insert('auction_record',$data)){
				pdo_update('auction_goodslist', $s_data, array('id' => $_GPC['id']));
				pdo_update('auction_member', $m_data, array('id' => $proplemess['id']));
				$records = pdo_fetchall("SELECT * FROM ".tablename('auction_record')." WHERE uniacid = '{$weid}' and sid= '{$sid}' order by id desc LIMIT 0,2 ");
				load()->model('account');
				$sendinfo = '您参与的拍品：\n';
				$sendinfo .= $goods['title'].'\n';
				$sendinfo .= '出价被超越，您可以重新出价！\n';
				$send['msgtype'] = 'text';
				$send['text'] = array('content' => urlencode($sendinfo));
				$acc = WeAccount::create($_W['acid']);
				$send['touser'] = trim($records[1]['from_user']);
				$s_mess = $acc->sendCustomNotice($send);
				message('出价成功！',$this->createMobileUrl('record'),'success');
			}else{
				message('出价失败！');
			}
		}
	}
?>