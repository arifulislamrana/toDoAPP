<?php
namespace App\Repository;

use App\Models\Setting;
use \App\Traits\AuthTrait;
use Hamcrest\Core\Set;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;

class SettingRepository{
    use AuthTrait;

    public function __construct()
    {
        # code...
    }

    public function getAll()
    {
        return Setting::all();
    }

    public function existsByKey($key)
    {
        $setting = Setting::where('key', $key)->first();
        return $setting ? true : false;
    }

    public function saveSetting($setting)
    {
        return Setting::firstOrCreate($setting);
    }


}

?>