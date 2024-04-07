<?php

namespace app\commands;
use app\models\Vacancy;
use yii\console\Controller;

class VacancyController extends Controller
{
    public function actionIndex()
    {
        for ($i = 0; $i < 16; $i++) {
            $model = new Vacancy();
            $model->name = "Vacancy $i";
            $model->salary = 1000 * ($i + 1);
            $model->description = "Some vacancy with number $i";
            $model->save();
        }
    }
}