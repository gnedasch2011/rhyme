<?php

namespace frontend\modules\items\model;

use frontend\modules\category\model\Category;
use Yii;

/**
 * This is the model class for table "items".
 *
 * @property int $id  [id] => 1\n    [qustion] => Ждали маму с молоком,<br>А пустили волка в дом…<br>Кем же были эти<br>Маленькие дети?\n    [answer] => Семеро козлят\n    [cat_ids] => 1305,669\n    [img] =>
 * @property string $qustion
 * @property string $img
 * @property string $answer
 */
class Items extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hagen_orf';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['qustion'], 'string'],
            [['img', 'answer'], 'string', 'max' => 450],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'qustion' => 'Qustion',
            'img' => 'Img',
            'answer' => 'Answer',
        ];
    }

    public function getCategories()
    {

        return $this->hasMany(Category::className(), ['id' => 'category_id'])
            ->viaTable('items_categorys', ['item_id' => 'id']);
    }

    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id'])
            ->viaTable('items_categorys', ['item_id' => 'id']);
    }


    public function getDetailUrl()
    {

        $detailUrl = "rhyme/" . $this->word;

        return $detailUrl;
    }

    public function getFullTitleName()
    {
        $str = $this->word;

        if (substr_count($str, ' ') < 30) {

            return $this->clearTitle($str);
        }

        $arrStr = explode(' ', $str);

        $res = '';

        foreach ($arrStr as $i => $item) {

            if ($i > 20 && (strpos($item, ',') || strpos($item, '.'))) {
                return $this->clearTitle($res) . ' ' . $item;
            }

            $res .= $this->clearTitle($item) . ' ';
        }

        return $res;


    }

    public function clearTitle($str)
    {
        $str = str_replace("<br />", '', $str);
        $str = str_replace("<br>", '', $str);

        return $str;
    }

    public static function searchItems($query)
    {
        $res = [];

      if($query){
          $items = self::find()
              ->where(['like', 'word',  $query, false])
              ->orWhere(['like', 'word', '%' . $query . '%', false])
              ->limit(40)
              ->orderBy('word')
              ->all();
       
          for ($i = 0; $i < count($items); $i++) {
              $item = $items[$i];
              $res[$i]['url'] = $item->getDetailUrl();
              $res[$i]['title'] = $item->getFullTitleName();
          }
      }






        return $res;
    }

    public static function getRandomItems($count = 5)
    {
        $items = self::find()
            ->orderBy('RAND()')
            ->limit($count)
            ->all();

        return $items;
    }


}
