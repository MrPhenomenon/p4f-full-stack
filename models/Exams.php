<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\NotFoundHttpException;

class Exams extends ActiveRecord
{
   
    public static function getExamsByVendor($vendorId)
    {
        $exams = self::find()
            ->where(['id' => $vendorId])
            ->all();

        if (empty($exams)) {
            throw new NotFoundHttpException("No exams found for this Vendor");
        }

        return $exams;
    }

    public function getVendor()
    {
        return $this->hasOne(Vendor::class, ['id' => 'id']);
    }
}
