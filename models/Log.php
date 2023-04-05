<?php

namespace app\models;

use yii\db\ActiveRecord;
use app\models\SiteUser;

class Log extends ActiveRecord
{
    public static function tableName()
    {
        return 'user_log';
    }

    public function getUser()
    {
        return $this->hasOne(SiteUser::className(),
            ['id' => 'user_id']);
    }

    public function attributes()
    {
        return array_merge(parent::attributes(), ['user.name', 'user.email']);
    }
}