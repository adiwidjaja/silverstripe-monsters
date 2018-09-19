<?php
# app/src/admin/MonsterAdmin.php

namespace App\Admin;

use App\Models\Monster;
use SilverStripe\Admin\ModelAdmin;

class MonsterAdmin extends ModelAdmin {

    private static $url_segment = "monsters";
    private static $menu_title = "Monsters";
    private static $menu_priority = 1;

    private static $managed_models = [
        Monster::class
    ];
}
