<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "refkereta".
 *
 * @property string $IDKERETA
 * @property string $NMKERETA
 *
 * @property Detailangkutan[] $detailangkutans
 */
class Refkereta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'refkereta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IDKERETA', 'NMKERETA'], 'required'],
            [['IDKERETA'], 'string', 'max' => 10],
            [['NMKERETA'], 'string', 'max' => 50],
            [['IDKERETA'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IDKERETA' => 'Kode Kereta',
            'NMKERETA' => 'Nama Kereta',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetailangkutans()
    {
        return $this->hasMany(Detailangkutan::className(), ['IDKERETA' => 'IDKERETA']);
    }
}
