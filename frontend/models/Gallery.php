<?php

namespace frontend\models;

use DirectoryIterator;
use yii\base\Model;
use Yii;
use frontend\models\Categories;

use function ownsite\functions\saveDataToArrfile;

class Gallery extends Model
{
    public $front_path;
    public $web_path;
    public $arrfile_parh;
    public $arrfileName; // с расширением
    public $arrfile;

    public function __construct()
    {
        $this->front_path = '/images_gallery';
        $this->web_path = Yii::getAlias('@webroot');
        $this->arrfile_parh = dirname(dirname(__DIR__)) . '/data/arrdata';
        $this->arrfileName = 'images_gallery.php';
        $this->arrfile = $this->arrfile_parh . '/' . $this->arrfileName;
    }

    public function getImages() : array
    {
        return $this->getImagesFromArrfile();
    }

    public function getImagesFromArrfile() : array
    {
        require $this->arrfile_parh . '/' . $this->arrfileName;
        $arrName = basename($this->arrfileName, '.php');

        return $$arrName;
    }

    /**
     * 1 вариант пустой ключ - вернет все категории категория-ключ => [изображения]
     * 2 вариант есть ключ - вернет [изображения]
     */
    public function getImagesByCategoryKey(string $category_key = null) : array
    {
        $images = $this->getImages();

        $imagesByCategoryKeys = array_reduce($images, function($acc, $image) {
            $acc[$image['category_key']][] = $image;
            return $acc;
        }, []);

        return $category_key ? $imagesByCategoryKeys[$category_key] : $imagesByCategoryKeys;
    }

    public function getExistCategories() : array
    {
        $existCategoryKeys = array_keys($this->getImagesByCategoryKey());
        $categories = (new Categories)->getCategories();

        $existCategories = array_filter($categories, function($category) use($existCategoryKeys) {
            return in_array($category['key'], $existCategoryKeys);
        });

        return $existCategories;
    }

    public function pagination(array $items, $offset, $limit) : array
    {
        return array_slice($items, $offset, $limit);
    }

    public function findFoldersInFrontpath(string $own_front_path = null) : array
    {
        $front_path = $this->front_path ?? $own_front_path;
        $path = $this->web_path . '/' . $front_path;
        $categories = (new Categories())->getCategories();
        $categoryLabelsEng = array_column($categories, 'label_eng');

        $foundFolders = new DirectoryIterator($path);

        $frontfolders = [];
        foreach($foundFolders as $folder) {
            if($folder->isDot()) continue;
            if($folder->isFile()) continue;

            $folderName = $categoryKey = $folder->current()->getFilename(); // название папки как ключ категории или labelEng

            if (in_array($folderName, $categoryLabelsEng)) {
                $categoryKey = (new Categories())->getCategoryByLabelEng($folderName)['key'];
            }
    
            $frontfolders[$categoryKey] = $front_path . '/' . $folderName;
        }

        return $frontfolders;
    }

    public function findImagesInFrontpathWithSign(string $own_front_path): array
    {
        $path = $this->web_path . '/' . $own_front_path;
        $categorSign = basename($own_front_path); // Ключ или LabelEng
        $category = (new Categories())->getCategoryByLabelEng($categorSign) 
            ?? (new Categories())->getCategoryByKey($categorSign);
        $categoryKey = $category['key'] ?? 0;

        $imagesInPath = new DirectoryIterator($path);

        $images = [];
        foreach ($imagesInPath as $image) {
            if($image->isDot()) continue;
            if($image->isDir()) continue;

            // 1 вариант имена изображений любые
            // 2 вариант поиск ключевых слов в названии изображения - не разрабатывался
            $imageName = $image->current()->getFilename();

            $images[] = [
                'category_key' => $categoryKey,
                'image' => $own_front_path . '/' . $imageName,
            ];
        }
        return $images;
    }

    public function getImagesInFrontpath(string $own_front_path = null) : array
    {

        $signfolders = $own_front_path 
            ? $this->findFoldersInFrontpath($own_front_path)
            : $this->findFoldersInFrontpath();

        $images = [];
        foreach ($signfolders as $folder) {
            $imagesInfolder = $this->findImagesInFrontpathWithSign($folder);
            $images = array_merge($images, $imagesInfolder);
        }

        return $images;
    }

    public function saveImagesarrToArrfile(array $images): bool
    {
        if (empty($images)) {
            return false;
        }
    
        return saveDataToArrfile($this->arrfile, $images);
    }

}