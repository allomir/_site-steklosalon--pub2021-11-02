<?php

namespace frontend\controllers;

use yii\web\Controller;
use frontend\models\ImporterCsvdata;

/**
 * Содержит ссылки на все реализованные контроллеры для загрузки данных
 * 1 импортер списка статей и их харектеристик из папки /articles
 * 2 импортер изображений для продукции из главной директории или продуктовых категорий
 * 3 импортер данных из файлов в папке csvdata в файлы с аналогичным именем в папку arrdata (по умолчанию), можно указать другое имя папки в data
 */
class ImportersController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionCsvdata(string $csvfile = null)
    {
        $prog = new ImporterCsvdata();
        if ($csvfile) {
            $savers = [$csvfile => $prog->createArrfileFromCsvfile($csvfile)];
        } else {
            $savers = $prog->createArrfilesFromCsvfiles();
        }

        return  $this->render('csvdata', ['savers' => $savers]);
    }

}