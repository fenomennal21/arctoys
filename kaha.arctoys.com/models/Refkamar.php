<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "refkamar".
 *
 * @property string $KDKMR
 * @property string $JENISKMR
 *
 * @property Detailpesanhotel[] $detailpesanhotels
 */
class Refkamar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'refkamar';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['KDKMR', 'JENISKMR'], 'required'],
            [['KDKMR'], 'string', 'max' => 10],
            [['JENISKMR'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'KDKMR' => 'Kode Kamar',
            'JENISKMR' => 'Jenis Kamar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetailpesanhotels()
    {
        return $this->hasMany(Detailpesanhotel::className(), ['KDKMR' => 'KDKMR']);
    }
}
