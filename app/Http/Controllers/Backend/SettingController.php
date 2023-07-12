<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\Carbon;
use App\Models\SmtpSetting;

class SettingController extends Controller
{
    // SmtpSetting
    public function SmtpSetting(){
        $setting = SmtpSetting::find(1);
        return view('backend.setting.smtp_update',compact('setting'));
    }

}
