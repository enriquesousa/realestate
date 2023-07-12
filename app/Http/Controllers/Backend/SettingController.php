<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\Carbon;
use App\Models\SmtpSetting;
use App\Models\SiteSetting;
use Intervention\Image\Facades\Image;

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

    // SiteSetting
    public function SiteSetting(){
        $site_setting = SiteSetting::find(1);
        return view('backend.setting.site_update',compact('site_setting'));
    }

    // UpdateSiteSetting
    public function UpdateSiteSetting(Request $request){

        $site_id = $request->id;

        // Si hay imagen la salvamos
        if ($request->file('logo')) {

            // Preparar imagen para guardarla
            $image = $request->file('logo');

            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension(); // crear un unique id para la imagen
            Image::make($image)->resize(1500,386)->save('upload/logo/'.$name_gen);
            $save_url = 'upload/logo/'.$name_gen;

            SiteSetting::findOrFail($site_id)->update([
                'support_phone' => $request->support_phone,
                'company_address' => $request->company_address,
                'email' => $request->email,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'copyright' => $request->copyright,
                'logo' => $save_url,
            ]);

            $notification = array(
                'message' => 'Configuración con Logo actualizada con éxito!',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);

        }else{

            SiteSetting::findOrFail($site_id)->update([
                'support_phone' => $request->support_phone,
                'company_address' => $request->company_address,
                'email' => $request->email,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'copyright' => $request->copyright,
            ]);

            $notification = array(
                'message' => 'Configuración actualizada con éxito!',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);

        }
    }

}
