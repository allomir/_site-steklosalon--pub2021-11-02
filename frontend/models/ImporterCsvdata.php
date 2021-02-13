<?php

namespace frontend\models;

use yii\base\Model;
use function ownsite\functions\saveDataToArrfile;

use DirectoryIterator as Explorer;

// базовые свойства items
// структура дерева соответствует категориям и продуктовым категориям
    // categoryLabelEng
        // productCategoryLabelEng1
        // productCategoryLabelEng2
// images название определяется при чтении файлов с фото
    // номер фото в папках соответствует номеру item после первого -тире, в виде $productCategoryLabelEng-$productItemKey--$anyDescAlt, 
    // продуктовые категории может отсутствовать, тогда первое слово как category сайта или фото начинается с тире
// frontpath определяется с помощью модели
class Importercsvdata extends model
{
    public $csvdataPath;
    public $arrdataPath;

    public $intKeys;

    public function __construct(string $arrdataPath = null)
    {
        // Стандартные настройки
        $this->csvdataPath = dirname(dirname(__DIR__)) . '/data/csvdata';
        $this->arrdataPath = dirname(dirname(__DIR__)) . '/data/arrdata';
        $this->intKeys = ['key', 'price', 'product_category_key'];
    }

    public function createArrfilesFromCsvfiles() : array
    {
        $csvfilesList = $this->searchfilesInCsvdataPath($this->csvdataPath);

        $result = [];
        foreach ($csvfilesList as $csvfile) {
            
            $result[$csvfile] = $this->createArrfileFromCsvfile($csvfile);
        }

        return $result;
    }

    public function createArrfileFromCsvfile(string $csvfileName) : bool
    {
        $csvfile = $this->csvdataPath . '/' . $csvfileName;
        $arrfile = $this->arrdataPath . '/' . basename($csvfile, '.csv') . '.php';

        $arrdata = $this->csvfileConverter($csvfile);
// print_r($arrdata); die;
        if (!saveDataToArrfile($arrfile, $arrdata)) {

            return false;
        }

        return true;
    }

    /**
     * Просматривает папку csvdataPath и находим все файлы
     * Возвращает массив ввиде ключ-директория продуктовых категории по label_eng одного вида продукта
     */
    public function searchfilesInCsvdataPath(string $path): array
    {
        $csvfiles = new Explorer($path);

        $csvfilesList = [];
        foreach ($csvfiles as $csvfile) {
            if($csvfile->isDot()) continue;
            if($csvfile->isDir()) continue;

            $csvfileName = $csvfile->current()->getFilename();

            $csvfilesList[] =  $csvfileName;
        }

        return $csvfilesList;
    }

    public function csvfileConverter(string $csvfile) : ?array
    {
        $resurse = fopen($csvfile, 'r');

        $arrdata = [];
        $fields = fgetcsv($resurse, 0, "|"); // первая итерация с названиями полей
        while ($arrdataRow = fgetcsv($resurse, 0, "|")) {
            $arrdataRowWithKeys = array_combine($fields, $arrdataRow);

            // проверка и преобразование к integer по назанию ключей
            foreach ($arrdataRowWithKeys as $key => $value) {
                if (in_array($key, $this->intKeys)) {
                    $arrdataRowWithKeys[$key] = (int) $value;
                }
            }

            $arrdata[] = $arrdataRowWithKeys;
        }

        return $arrdata;
    }

}