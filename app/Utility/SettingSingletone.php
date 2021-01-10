<?php
namespace App\Utility;

use App\Repository\SettingRepository;

class SettingSingletone{

    private static $settingData;
    private static $settingRepository;

    private function __construct(SettingRepository $repository)
    {
        static::$settingRepository = $repository;
    }

    public static function get()
    {
        if (!isset(self::$settingData)) {

            new SettingSingletone(new SettingRepository());
            $settings = self::$settingRepository->getAll();
            $newSettings = [];

            foreach ($settings as $setting) {
                $newSettings[$setting->key] = $setting->default_value;
            }
            self::$settingData = $newSettings;
        }

        return self::$settingData;
    }

    private static function set($key, $value) {
        self::$settingRepository->saveSetting([
            'key' => $key,
            'value' => $value
        ]);
    }
}



?>