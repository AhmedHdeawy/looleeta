<?php 

use App\Setting;

function getSettingByKey($key) {
	
	return Setting::where('settings_key', $key)->value('settings_value');
}