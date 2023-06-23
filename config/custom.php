<?php

// lo saque de https://stackoverflow.com/questions/39563042/laravel-dynamic-config-settings
// para ver dato: echo Config::get('filename.arraykey');
// Config::get('custom.display_preload')
// y Para set value usar: Config::set('custom.my_val', 'mysinglelue');
// Config::set('custom.display_preload', false)
// Y como usarlo en blade
// @php
//     Config::set('custom.display_preload', false)
// @endphp
// @dd(Config::get('custom.display_preload'))
// Lo use en resources/views/frontend/frontend_dashboard.blade.php
return array(
    'display_preload' => true,
    'my_arr_val' => array('1', '2', '3'),
  );
