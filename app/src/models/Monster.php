<?php
# app/src/models/Monster.php

namespace App\Models;

use SilverStripe\Assets\Image;
use SilverStripe\ORM\DataObject;

class Monster extends DataObject {
    private static $table_name = "Monster";

    private static $db = [
        "Name" => "Varchar(255)",
        "Eyes" => "Int",
        "CanFly" => "Boolean",
        "Color" => "Enum('red, blue, green, orange')"
    ];

    private static $has_one = [
        "Image" => Image::class
    ];

    private static $owns = [
        "Image"
    ];
}
