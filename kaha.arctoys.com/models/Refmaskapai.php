<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "refmaskapai".
 *
 * @property string $IDMASKAPAI
 * @property string $NAMAMASKAPAI
 *
 * @property Detailangkutan[] $detailangkutans
 */
class Refmaskapai extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'refmaskapai';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IDMASKAPAI', 'NAMAMASKAPAI'], 'required'],
            [['IDMASKAPAI'], 'string', 'max' => 10],
            [['NAMAMASKAPAI'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IDMASKAPAI' => 'Kode Maskapai',
            'NAMAMASKAPAI' => 'Nama Maskapai',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetailangkutans()
    {
        return $this->hasMany(Detailangkutan::className(), ['IDMASKAPAI' => 'IDMASKAPAI']);
    }
}
