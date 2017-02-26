<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "detailpesanhotel".
 *
 * @property string $DEATILID
 * @property string $KDPESAN
 * @property string $CHECKIN
 * @property string $CHECKOUT
 * @property string $KDKMR
 * @property integer $JMLKMR
 *
 * @property Datpemesananhotel $kDPESAN
 * @property Refkamar $kDKMR
 */
class Detailpesanhotel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'detailpesanhotel';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DEATILID', 'KDPESAN', 'CHECKIN', 'CHECKOUT', 'KDKMR', 'JMLKMR'], 'required'],
            [['CHECKIN', 'CHECKOUT'], 'safe'],
            [['JMLKMR'], 'integer'],
            [['DEATILID', 'KDPESAN', 'KDKMR'], 'string', 'max' => 10],
            [['KDPESAN'], 'exist', 'skipOnError' => true, 'targetClass' => Datpemesananhotel::className(), 'targetAttribute' => ['KDPESAN' => 'KDPESAN']],
            [['KDKMR'], 'exist', 'skipOnError' => true, 'targetClass' => Refkamar::className(), 'targetAttribute' => ['KDKMR' => 'KDKMR']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'DEATILID' => 'Id Detail',
            'KDPESAN' => 'Kode Pesan',
            'CHECKIN' => 'Checkin',
            'CHECKOUT' => 'Checkout',
            'KDKMR' => 'Kode Kamar',
            'JMLKMR' => 'Jml Kamar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKDPESAN()
    {
        return $this->hasOne(Datpemesananhotel::className(), ['KDPESAN' => 'KDPESAN']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKDKMR()
    {
        return $this->hasOne(Refkamar::className(), ['KDKMR' => 'KDKMR']);
    }
}
