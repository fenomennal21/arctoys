<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "refpropinsi".
 *
 * @property string $KDPROP
 * @property string $NMPROP
 *
 * @property Refkota[] $refkotas
 */
class Refpropinsi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'refpropinsi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['KDPROP', 'NMPROP'], 'required'],
            [['KDPROP'], 'string', 'max' => 2],
            [['NMPROP'], 'string', 'max' => 25],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'KDPROP' => 'Kode Provinsi',
            'NMPROP' => 'Nama Provinsi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRefkotas()
    {
        return $this->hasMany(Refkota::className(), ['KDPROP' => 'KDPROP']);
    }
}
