<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "detailpenumpang".
 *
 * @property string $DETAILID
 * @property string $KDPESAN
 * @property string $NMPENUMPANG
 *
 * @property Datpemesanan $kDPESAN
 */
class Detailpenumpang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'detailpenumpang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DETAILID', 'KDPESAN', 'NMPENUMPANG'], 'required'],
            [['DETAILID', 'KDPESAN'], 'string', 'max' => 10],
            [['NMPENUMPANG'], 'string', 'max' => 150],
            [['KDPESAN'], 'exist', 'skipOnError' => true, 'targetClass' => Datpemesanan::className(), 'targetAttribute' => ['KDPESAN' => 'KDPESAN']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'DETAILID' => 'Kode Detail',
            'KDPESAN' => 'Kode Pesan',
            'NMPENUMPANG' => 'Nama Penumpang',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKDPESAN()
    {
        return $this->hasOne(Datpemesanan::className(), ['KDPESAN' => 'KDPESAN']);
    }
}
