<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "detailangkutan".
 *
 * @property string $IDDETAIL
 * @property string $KDPESAN
 * @property string $KDBOOKING
 * @property string $IDMASKAPAI
 * @property string $IDKERETA
 * @property string $JAMBRGKT
 * @property string $JAMTIBA
 *
 * @property Datpemesanan $kDPESAN
 * @property Datpemesanan $kDBOOKING
 * @property Refmaskapai $iDMASKAPAI
 * @property Refkereta $iDKERETA
 */
class Detailangkutan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'detailangkutan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IDDETAIL', 'KDPESAN', 'KDBOOKING', 'JAMBRGKT', 'JAMTIBA'], 'required'],
            [['JAMBRGKT', 'JAMTIBA'], 'safe'],
            [['IDDETAIL', 'KDPESAN', 'IDMASKAPAI', 'IDKERETA'], 'string', 'max' => 10],
            [['KDBOOKING'], 'string', 'max' => 25],
            [['KDPESAN'], 'exist', 'skipOnError' => true, 'targetClass' => Datpemesanan::className(), 'targetAttribute' => ['KDPESAN' => 'KDPESAN']],
            [['KDBOOKING'], 'exist', 'skipOnError' => true, 'targetClass' => Datpemesanan::className(), 'targetAttribute' => ['KDBOOKING' => 'KDBOOKING']],
            [['IDMASKAPAI'], 'exist', 'skipOnError' => true, 'targetClass' => Refmaskapai::className(), 'targetAttribute' => ['IDMASKAPAI' => 'IDMASKAPAI']],
            [['IDKERETA'], 'exist', 'skipOnError' => true, 'targetClass' => Refkereta::className(), 'targetAttribute' => ['IDKERETA' => 'IDKERETA']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IDDETAIL' => 'Id Detail',
            'KDPESAN' => 'Kode Pesan',
            'KDBOOKING' => 'Kode Booking',
            'IDMASKAPAI' => 'Kode Maskapai',
            'IDKERETA' => 'Kode Kereta',
            'JAMBRGKT' => 'Jam Berangkat',
            'JAMTIBA' => 'Jam Tiba',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKDPESAN()
    {
        return $this->hasOne(Datpemesanan::className(), ['KDPESAN' => 'KDPESAN']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKDBOOKING()
    {
        return $this->hasOne(Datpemesanan::className(), ['KDBOOKING' => 'KDBOOKING']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDMASKAPAI()
    {
        return $this->hasOne(Refmaskapai::className(), ['IDMASKAPAI' => 'IDMASKAPAI']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDKERETA()
    {
        return $this->hasOne(Refkereta::className(), ['IDKERETA' => 'IDKERETA']);
    }
}
