<?php
# app/src/controllers/MonsterController.php

namespace App\Controllers;

use SilverStripe\Control\Controller;
use SilverStripe\Control\HTTPRequest;
use App\Models\Monster;

class MonsterController extends Controller {

    public function index(HTTPRequest $request)
    {
        return [
            'Title' => 'Monsters',
            'Monsters' => Monster::get()
        ];
    }
}
