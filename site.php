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
		$settings = pdo_fetchcolumn($sql, array(':uniacid' => $_W['uniacid'], ':module' => 'css9_image_recognition'));
		$this->settings = iunserializer($settings);
	}
	public function doMobileHome(){
		global $_W,$_GPC;
		include $this->template('home');
	}

}