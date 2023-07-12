<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Blade;
use App\Models\SmtpSetting;
use Config;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // inicializar datos de smtp en .env al iniciar boot
        if (\Schema::hasTable('smtp_settings')) {

            $smtp_settings = SmtpSetting::first();
            if ($smtp_settings) {
                $data = [
                    'driver' => $smtp_settings->mailer,
                    'host' => $smtp_settings->host,
                    'port' => $smtp_settings->port,
                    'username' => $smtp_settings->username,
                    'password' => $smtp_settings->password,
                    'encryption' => $smtp_settings->encryption,
                    'from' => [
                        'address' => $smtp_settings->from_address,
                        'name' => 'EasyRealState',
                    ],
                ];
                Config::set('mail', $data);
            }

        }

        // Para convertir a formato money
        // To use it in Blade: @convert($var)
        Blade::directive('convert', function ($money) {
            return "<?php echo number_format($money, 2); ?>";
        });
    }
}
