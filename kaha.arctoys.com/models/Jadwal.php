<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jadwal".
 *
 * @property integer $ID
 * @property string $KDPENERB
 * @property string $NMMASKAPAI
 * @property string $TGLBRGKT
 * @property string $JAMBRGKT
 * @property string $JAMTIBA
 * @property string $KOTAASAL
 * @property string $KOTATUJUAN
 * @property string $ASALBANDARA
 * @property string $TUJUANBANDARA
 * @property string $KELAS
 * @property string $HARGA
 */
class Jadwal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jadwal';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['KDPENERB', 'NMMASKAPAI', 'TGLBRGKT', 'JAMBRGKT', 'JAMTIBA', 'KOTAASAL', 'KOTATUJUAN', 'ASALBANDARA', 'TUJUANBANDARA', 'KELAS', 'HARGA'], 'required'],
            [['TGLBRGKT', 'JAMBRGKT', 'JAMTIBA'], 'safe'],
            [['KDPENERB'], 'string', 'max' => 15],
            [['NMMASKAPAI', 'KOTAASAL', 'KOTATUJUAN', 'ASALBANDARA', 'TUJUANBANDARA', 'HARGA'], 'string', 'max' => 100],
            [['KELAS'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'KDPENERB' => 'Kdpenerb',
            'NMMASKAPAI' => 'Nmmaskapai',
            'TGLBRGKT' => 'Tglbrgkt',
            'JAMBRGKT' => 'Jambrgkt',
            'JAMTIBA' => 'Jamtiba',
            'KOTAASAL' => 'Kotaasal',
            'KOTATUJUAN' => 'Kotatujuan',
            'ASALBANDARA' => 'Asalbandara',
            'TUJUANBANDARA' => 'Tujuanbandara',
            'KELAS' => 'Kelas',
            'HARGA' => 'Harga',
        ];
    }
}
