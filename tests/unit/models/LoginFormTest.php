<?php

namespace tests\models;

//use app\models\LoginForm;
use Codeception\Specify;
use mdm\admin\models\form\Login;

class LoginFormTest extends \Codeception\Test\Unit {
    private $model;

    protected function _after() {
        \Yii::$app->user->logout();
    }

    public function testLoginNoUser() {
        $this->model = new Login([
            'username' => 'not_existing_username',
            'password' => 'not_existing_password',
            'rememberMe' => TRUE
        ]);

        expect_not($this->model->login());
        expect_that(\Yii::$app->user->isGuest);
    }

    public function testLoginWrongPassword() {
        $this->model = new Login([
            'username' => 'demo',
            'password' => 'wrong_password',
        ]);

        expect_not($this->model->login());
        expect_that(\Yii::$app->user->isGuest);
        expect($this->model->errors)->hasKey('password');
    }

    public function testLoginCorrect() {
        $form = new Login([
            'username' => 'superuser',
            'password' => '111111',
            'rememberMe' => TRUE
        ]);

        $this->assertTrue($form->validate());

        expect_that($form->login());
        expect_not(\Yii::$app->user->isGuest);
        expect($form->errors)->hasntKey('password');
    }

}
