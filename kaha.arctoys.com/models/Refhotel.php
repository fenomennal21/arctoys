<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "refhotel".
 *
 * @property string $HOTELID
 * @property string $NAMAHOTEL
 * @property string $ALAMATHTL
 * @property string $NOTLPHTL
 */
class Refhotel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'refhotel';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['HOTELID', 'NAMAHOTEL', 'ALAMATHTL', 'NOTLPHTL'], 'required'],
            [['HOTELID'], 'string', 'max' => 20],
            [['NAMAHOTEL', 'ALAMATHTL'], 'string', 'max' => 100],
            [['NOTLPHTL'], 'string', 'max' => 25],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'HOTELID' => 'Kode Hotel',
            'NAMAHOTEL' => 'Nama Hotel',
            'ALAMATHTL' => 'Alamat Hotel',
            'NOTLPHTL' => 'Telpon Hotel',
        ];
    }
}
