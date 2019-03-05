<?php
/**
 * 成语接龙模块微站定义
 *
 * @author 欧阳
 * @url
 */
defined('IN_IA') or exit('Access Denied');

session_start();

class Css9_idiom_guessModuleSite extends WeModuleSite {
	public $settings;
	public function __construct() {
		global $_W;
		$sql = 'SELECT `settings` FROM ' . tablename('uni_account_modules') . ' WHERE `uniacid` = :uniacid AND `module` = :module';
		$settings = pdo_fetchcolumn($sql, array(':uniacid' => $_W['uniacid'], ':module' => 'css9_idiom_guess'));
		$this->settings = iunserializer($settings);
	}
	public function doMobileHome(){
		global $_W,$_GPC;
		$total = 9;
		$layout = $this->settings['layout'];
		switch ($this->settings['layout']) {
			case '1':
				$total = 9;
				break;
			case '2':
				$total = 12;
				break;
			case '3':
				$total = 12;
				break;
			case '4':
				$total = 16;
				break;
			default:
				$total = 9;
				break;
		}
		$exceptWord = $this->settings['exceptWord'];
		$charTotal = $this->settings['charTotal'];
		include $this->template('home');
	}
	public function doMobileGetIdiom(){
		global $_W,$_GPC;
		$response = ihttp_get('http://api.jiongxiao.com/idiom.php?first=1');
		$res = json_decode($response['content'],true);
        $reply = $res; 
        if(strlen($res['msg']) > 12){
        	$this->doMobileGetIdiom();
		}
		/*
		$reply = array(
			'code'=>1,
			'msg'	=>'七七八八'
		);
		*/
		//var_dump($response['content']);
		die(json_encode($reply));
	}

}

function tarnsferWords($str){
	var_dump($str);
  if(empty($str)){
    return $str;
  }
  $obj = json_decode('{"str":"'.$str.'"}',ture);
  return $obj['str'];
}