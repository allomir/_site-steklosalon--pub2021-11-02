<?php

namespace frontend\controllers;

use yii\web\Controller;
use frontend\models\CompanyInfo as Company;

class ContactsController extends Controller
{
    public function actionIndex()
    {
        $contacts = (new Company)->getInfo();
        $companyDesc = $contacts['desc'];

        return $this->render('index', [
            'contacts' => $contacts,
            'companyDesc' => $companyDesc,
        ]);
    }
}