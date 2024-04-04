<?php

namespace app\controllers;

use app\models\Vacancy;
use app\services\vacancy\Create;
use Yii;
use yii\rest\Controller;

class VacancyController extends Controller
{
    public function actionCreate()
    {
        $params = Yii::$app->request->post();
        $model = new Vacancy();

        if ($model->load($params, "") && $model->save()) {
            return $model->id;
        }

        return $model->getErrors();
    }
}