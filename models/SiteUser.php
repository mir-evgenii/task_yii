<?php

namespace app\models;

use yii\db\ActiveRecord;
use app\models\Log;

class SiteUser extends ActiveRecord
{
    public static function tableName() {
        return 'user';
    }

    public function getLog(){
        return $this->hasMany(Log::className(),
            ['user_id' => 'id']);
    }
}