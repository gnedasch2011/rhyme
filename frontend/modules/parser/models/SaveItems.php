<?php
/**
 * Created by PhpStorm.
 * User: 2000
 * Date: 04.02.2020
 * Time: 12:05
 */

namespace app\modules\parser\models;


use app\modules\brand\models\Brand;
use app\modules\image\models\ImageBase;
use app\modules\product\models\base\ProductBase;
use app\modules\product\models\Product;
use app\modules\product\models\ProductCategory;
use app\modules\product\models\ProductVariant;
use app\modules\url\models\Url;
use yii\base\Model;
use yii\helpers\StringHelper;

class SaveItems extends Model
{
    /**
     * Сохранение товара
     * @param $itemArrAttr
     * @param $model
     * @throws \yii\db\Exception
     */

    public static function saveItem($itemArr)
    {
        $db = \Yii::$app->db;
        $transaction = $db->beginTransaction();

//        $goods = ProductBase::find()->where(['>=', "id", "8993"])->all();

//        foreach ($goods as $good) {
//            $good->delete();
//        }
//        die();


        try {
            $good = new ProductBase();
            $good->name = $itemArr['name'];
                echo "<pre>"; print_r($itemArr);die();
            $good->uri = FileHelper::renderUriNameDetailGood($itemArr['uri']);

//            if (self::uri_exist($good->uri)) {
//
//            }
            //проверка если есть такой uri
            if (self::uri_exist($good->uri)) {
                return false;
            }

//            $good->model = StringHelper::truncateWords($itemArr['model'], 5);
            $good->model = $itemArr['model'];

            //создаём привязку к бренду или бренд
            if (!empty($itemArr['brand'])) {
                $good->brandId = self::getExistBrand($itemArr['brand']);
            }

            //прикрепляем url
            $url = new Url();
            $url->route = 'product/site/view';
            $url->alias = $good->uri;

            $good->url = $url;


            //прикрепляем search
            $search = new \app\modules\search\models\Search();
            $search->keywords = 'test';

            $good->search = $search;

            //создаём вариант
            $newVariant = new ProductVariant();
            $newVariant->price = (!empty($itemArr['priceAction'])) ? $itemArr['priceAction'] : $itemArr['price'];
            $newVariant->priceAction = (empty($itemArr['price']) && !$itemArr['priceAction']) ? $itemArr['priceAction'] : 0;
            $newVariant->isDelete = 0;
            $newVariant->itemId = rand(10000, 100000);
            $newVariant->variantId = 0;

            $good->productVariants = [$newVariant];

            if (!$good->save()) {
                echo "<pre>";
                print_r($good->errors);
                die();
            }

            //новый id товара
            $newProductId = $good->id;


            //сохранить изображения

            $nameFile = FileHelper::saveRemoteImage($itemArr['host'] . $itemArr['imgMain'], "images/product/" . $good->uri);
            $image = new ImageBase();
            $image->nodeId = $newProductId;
            $image->nodeType = "product";
            $image->fileName = $nameFile;
            $image->alt = $good->name;
            $image->title = $good->name;
            $image->save();

            //прикрепляем image

            //привязываем к 1000 категории

            $productCat = new ProductCategory();
            $productCat->productId = $newProductId;
            $productCat->categoryId = 1000;
            $productCat->save();

            //работа с аттрибутами



            
            
            
//            $transaction->commit();

            return true;

        } catch (Exception $e) {
            $transaction->rollback();
        }
    }

    public static function uri_exist($goodUri)
    {
        return Product::find()->where(['uri' => $goodUri])->exists();
    }

    public static function getExistBrand($name)
    {
        $brand = Brand::find()->where(['name' => $name])->one();

        if ($brand) {
            return $brand->id;
        } else {
            $newBrand = new Brand();
            $newBrand->name = StringHelper::mb_ucfirst(mb_strtolower($name));
            $newBrand->save();

            return $newBrand->id;
        }
    }

    public static function saveRemoteImage($remoteImgLink, $pathUri)
    {

        $nameFile = basename($remoteImgLink);
        $folder = "images/product/" . $pathUri;//masssazhnoe_kreslo_kachalka_rt_5610

        $existDirectory = self::createDirectory($folder);

        if ($existDirectory) {
            $imgUrlPath = $folder . "/" . $nameFile;
            file_put_contents($imgUrlPath, file_get_contents($remoteImgLink));

            return $nameFile;
        }

        return false;
    }

    public static function createDirectory($folder)
    {
        if (!is_dir($folder)) {
            if (mkdir($folder, "0777")) {
                return true;
            }
        } else {
            return true;
        }
    }

    /**
     * @param $str
     * @return mixed
     */
    public static function renderUriNameDetailGood($str)
    {
        if (is_string($str)) {
            $arr = explode('/', $str);
            $new_arr = array_diff($arr, array(''));
            $val = array_pop($new_arr);
            $val = str_replace('-', '_', $val);
            return $val;
        }

        return "/";

    }


}