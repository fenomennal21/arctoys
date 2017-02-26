<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "datpemesananhotel".
 *
 * @property string $KDPESAN
 * @property string $KDBOOKING
 * @property string $USERID
 * @property string $TGLPESAN
 * @property string $HOTELID
 * @property string $TOTALHRG
 * @property string $CARABYR
 *
 * @property Datuser $uSER
 * @property Detailpesanhotel[] $detailpesanhotels
 */
class Datpemesananhotel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'datpemesananhotel';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['KDPESAN', 'KDBOOKING', 'USERID', 'TGLPESAN', 'HOTELID', 'TOTALHRG', 'CARABYR'], 'required'],
            [['TGLPESAN'], 'safe'],
            [['TOTALHRG'], 'number'],
            [['KDPESAN'], 'string', 'max' => 10],
            [['KDBOOKING', 'USERID'], 'string', 'max' => 25],
            [['HOTELID'], 'string', 'max' => 20],
            [['CARABYR'], 'string', 'max' => 50],
            [['KDBOOKING'], 'unique'],
            [['USERID'], 'exist', 'skipOnError' => true, 'targetClass' => Datuser::className(), 'targetAttribute' => ['USERID' => 'USERID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'KDPESAN' => 'Kode Pesan',
            'KDBOOKING' => 'Kode Booking',
            'USERID' => 'Userid',
            'TGLPESAN' => 'Tgl Pesan',
            'HOTELID' => 'Kode Hotel',
            'TOTALHRG' => 'Total Harga',
            'CARABYR' => 'Cara Bayar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUSER()
    {
        return $this->hasOne(Datuser::className(), ['USERID' => 'USERID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetailpesanhotels()
    {
        return $this->hasMany(Detailpesanhotel::className(), ['KDPESAN' => 'KDPESAN']);
    }
}
