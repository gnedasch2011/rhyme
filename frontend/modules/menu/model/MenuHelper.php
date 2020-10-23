<?php
/**
 * Created by PhpStorm.
 * User: 2000
 * Date: 30.09.2020
 * Time: 9:54
 */

namespace frontend\modules\menu\model;

use frontend\modules\category\model\Category;
use frontend\modules\category\model\CategoryBase;
use yii\base\Model;

class MenuHelper extends Model
{
    public static function getItemsForMenu()
    {

        $categorys = Category::find()->where([
            'parent_id' => 0,
        ])->all();


        $templateSubCat = '<a href="{url}" class="dropdown-toggle" data-toggle="dropdown">{label}<span class="caret"></span></a>';

        foreach ($categorys as $category) {

            $subCats = [];
            $subArray = [];
            $arrayForCat = [];

            if ($category->subCat) {
                foreach ($category->subCat as $subCat) {
                    $subCats[] = [
                        'label' => $subCat->name,
                        'url' => '/' . $subCat->name_transliteration,
                    ];
                }


                $arrayForCat['template'] = $templateSubCat;
                $arrayForCat['options'] = ['class' => 'dropdown'];
                $arrayForCat['items'] = $subCats;
            }


            $mainInfo = [
                'label' => $category->name,
                'url' => '/' . $category->name_transliteration,
            ];

            $arrayForCatFull = array_merge($mainInfo, $arrayForCat);


            $items [] = $arrayForCatFull;
        }

        return $items;
    }
}