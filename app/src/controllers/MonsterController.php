<?php
# app/src/controllers/MonsterController.php

namespace App\Controllers;

use SilverStripe\Control\Controller;
use SilverStripe\Control\HTTPRequest;
use App\Models\Monster;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\FileField;
use SilverStripe\Forms\Form;
use SilverStripe\Forms\FormAction;
use SilverStripe\Forms\HiddenField;
use SilverStripe\Forms\RequiredFields;
use SilverStripe\Forms\TextField;
use SilverStripe\Security\Permission;
use SilverStripe\Security\PermissionProvider;
use SilverStripe\Security\Security;

class MonsterController extends Controller implements PermissionProvider{

    private static $url_segment = "monsters";

    private static $allowed_actions = [
        "view",
        "edit",
        "EditForm"
    ];

    public function init() {
        parent::init();
        if (!Permission::check('VIEW_MONSTERS')) {
            Security::permissionFailure();
        }
    }

    public function index(HTTPRequest $request) {
        return [
            'Title' => 'Monsters',
            'Monsters' => Monster::get()
        ];
    }

    public function view(HTTPRequest $request) {
        $id = (int) $request->param("ID");
        $monster = Monster::get()->byID($id);

        return [
            'Title' => $monster->Name,
            'Monster' => $monster
        ];
    }

    public function providePermissions() {
        return [
            'VIEW_MONSTERS' => 'View Monsters'
        ];
    }

    public function EditForm()
    {
        $colors = Monster::singleton()->dbObject('Color')->enumValues();

        $fields = FieldList::create(
            TextField::create("Name", "Name"),
            TextField::create("Eyes", "Number of eyes"),
            DropdownField::create("Color", "Main color", $colors),
            FileField::create("Image", "Image"),
            HiddenField::create("ID", "ID")
        );

        $actions = FieldList::create(
            FormAction::create('save','Save')->addExtraClass('is-primary')
        );

        $validator = RequiredFields::create('Name');

        $form = Form::create(
            $this,
            'EditForm',
            $fields,
            $actions,
            $validator
        );

        return $form;
    }

    public function edit(HTTPRequest $request) {
        $form = $this->EditForm();

        $monster = null;

        if($id = (int) $request->param("ID")) {
            $monster = Monster::get()->byID($id);
            $form->loadDataFrom($monster);
        }

        return [
            'Monster' => $monster,
            'Form' => $form
        ];
    }

    public function save(array $data, Form $form) {
        if($id = $data["ID"]) {
            $monster = Monster::get()->byID($id);
        } else {
            $monster = Monster::create();
        }
        $form->saveInto($monster);
        $monster->write();
        $this->redirect($this->Link("view/$monster->ID"));
    }

}

//Example code for slide
//$monster = Monster::create();
//$monster->Name = "Red monster";
//$monster->Eyes = 3;
//$monster->Color = "red";
//$monster->write();
//
//$monsters = Monster::get();
//$lastmonster = Monster::get()->sort('Created', 'DESC')->first();
//$monsters = Monster::get()->filter(['Color', 'red']);
//$monster1 = Monster::get()->byID(1);
//
//$monsters = Monster::get()->filter([
//    'Name:StartsWith' => 'S',
//    'Eyes:GreaterThan' => 2
//]);

//// In a controller
//$request = $this->getRequest();
//
//$request->param("ID");
//
//$request->isGET();
//$request->getVar("filter");
//$request->getVars();
//
//$request->isPOST();
//$request->postVar("data");
//$request->postVars();