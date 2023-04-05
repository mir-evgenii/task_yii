<?php

namespace app\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use app\models\Log;
use app\models\LogSearch;
use Yii;

class LogController extends Controller
{
    public function actionIndex()
    {
        $searchModel = new LogSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->get());

        $query = Log::find();

        $logs = $query->orderBy('id')
            ->with('user')
            ->all();

        return $this->render('index', [
            'logs' => $logs,
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }
}