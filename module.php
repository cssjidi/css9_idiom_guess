<?php

/**
 * 成语接龙模块定义
 *
 * @author css9
 * @url
 */
defined('IN_IA') or exit('Access Denied');

class Css9_idiom_guessModule extends WeModule {
	public function settingsDisplay($settings) {
        global $_GPC, $_W;
        if (checksubmit()) {
            $cfg = array(
                'layout' => $_GPC['layout'],
                'exceptWord' => $_GPC['exceptWord'],
	            'charTotal' => $_GPC['charTotal'],
            );
            if ($this->saveSettings($cfg)) {
                message('保存成功', 'refresh');
            }
        }
        load()->func('tpl');
		include $this->template('setting');
    }
}
