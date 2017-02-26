<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "refkota".
 *
 * @property string $KDKOTA
 * @property string $NMKOTA
 * @property string $KDPROP
 *
 * @property Refpropinsi $kDPROP
 */
class Refkota extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'refkota';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['KDKOTA', 'NMKOTA', 'KDPROP'], 'required'],
            [['KDKOTA'], 'string', 'max' => 4],
            [['NMKOTA'], 'string', 'max' => 100],
            [['KDPROP'], 'string', 'max' => 2],
            [['KDPROP'], 'exist', 'skipOnError' => true, 'targetClass' => Refpropinsi::className(), 'targetAttribute' => ['KDPROP' => 'KDPROP']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'KDKOTA' => 'Kode Kota',
            'NMKOTA' => 'Nama Kota',
            'KDPROP' => 'Kode Provinsi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKDPROP()
    {
        return $this->hasOne(Refpropinsi::className(), ['KDPROP' => 'KDPROP']);
    }
}
