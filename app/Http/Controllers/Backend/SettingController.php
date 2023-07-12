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

    // UpdateSmtpSetting
    public function UpdateSmtpSetting(Request $request){

        $smtp_id = $request->id;

        SmtpSetting::findOrFail($smtp_id)->update([

            'mailer' => $request->mailer,
            'host' => $request->host,
            'port' => $request->port,
            'username' => $request->username,
            'password' => $request->password,
            'encryption' => $request->encryption,
            'from_address' => $request->from_address,

        ]);

        $notification = array(
            'message' => 'Configuración Smtp actualizada con éxito!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }

}
