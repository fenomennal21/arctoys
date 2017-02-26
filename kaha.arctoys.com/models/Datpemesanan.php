<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "datpemesanan".
 *
 * @property string $KDPESAN
 * @property string $KDBOOKING
 * @property string $USERID
 * @property string $TGLPESAN
 * @property string $TGLBRGKT
 * @property string $TGLPLG
 * @property integer $JMLPENUMPANG
 * @property string $KOTAASAL
 * @property string $KOTATUJUAN
 * @property string $TOTALHRG
 * @property string $CARABYR
 *
 * @property Detailangkutan[] $detailangkutans
 * @property Detailangkutan[] $detailangkutans0
 * @property Detailpenumpang[] $detailpenumpangs
 */
class Datpemesanan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'datpemesanan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['KDPESAN', 'KDBOOKING', 'USERID', 'TGLPESAN', 'TGLBRGKT', 'JMLPENUMPANG', 'KOTAASAL', 'KOTATUJUAN', 'TOTALHRG', 'CARABYR'], 'required'],
            [['TGLPESAN', 'TGLBRGKT', 'TGLPLG'], 'safe'],
            [['JMLPENUMPANG'], 'integer'],
            [['TOTALHRG'], 'number'],
            [['KDPESAN'], 'string', 'max' => 10],
            [['KDBOOKING', 'USERID'], 'string', 'max' => 25],
            [['KOTAASAL', 'KOTATUJUAN'], 'string', 'max' => 4],
            [['CARABYR'], 'string', 'max' => 50],
            [['KDBOOKING'], 'unique'],
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
            'USERID' => 'Username',
            'TGLPESAN' => 'Tgl Pesan',
            'TGLBRGKT' => 'Tgl Berangkat',
            'TGLPLG' => 'Tgl Pulang',
            'JMLPENUMPANG' => 'Jml Penumpang',
            'KOTAASAL' => 'Kota Asal',
            'KOTATUJUAN' => 'Kota Tujuan',
            'TOTALHRG' => 'Total Harga',
            'CARABYR' => 'Cara Bayar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetailangkutans()
    {
        return $this->hasMany(Detailangkutan::className(), ['KDPESAN' => 'KDPESAN']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetailangkutans0()
    {
        return $this->hasMany(Detailangkutan::className(), ['KDBOOKING' => 'KDBOOKING']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetailpenumpangs()
    {
        return $this->hasMany(Detailpenumpang::className(), ['KDPESAN' => 'KDPESAN']);
    }
}
