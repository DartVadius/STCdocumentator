<?php
/**
 * Created by PhpStorm.
 * User: dartvadius
 * Date: 29.08.17
 * Time: 21:06
 */

namespace app\modules\repositories;

use app\modules\product\models\admin\CategoryProduct;
use yii\base\Model;

class CategoryProductRepository extends Model {

    public function getAll() {
        return CategoryProduct::find()->all();
    }

}