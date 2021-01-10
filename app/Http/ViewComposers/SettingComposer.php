<?php
namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Utility\SettingSingletone;

class SettingComposer {

    public function compose(View $view)
    {
        $settings = SettingSingletone::get();
        $view->with('settings', $settings);
    }
}

?>