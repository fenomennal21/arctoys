<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "datakartu".
 *
 * @property integer $IDKARTU
 * @property string $USERID
 * @property string $NOKARTU
 * @property string $NAMAKARTU
 * @property string $VALID
 * @property string $CVV
 * @property string $JNSKARTU
 *
 * @property Datuser $uSER
 */
class Datakartu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'datakartu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['USERID', 'NOKARTU', 'NAMAKARTU', 'VALID', 'CVV', 'JNSKARTU'], 'required'],
            [['USERID'], 'string', 'max' => 25],
            [['NOKARTU'], 'string', 'max' => 16],
            [['NAMAKARTU'], 'string', 'max' => 150],
            [['VALID'], 'string', 'max' => 5],
            [['CVV'], 'string', 'max' => 3],
            [['JNSKARTU'], 'string', 'max' => 10],
            [['USERID'], 'exist', 'skipOnError' => true, 'targetClass' => Datuser::className(), 'targetAttribute' => ['USERID' => 'USERID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IDKARTU' => 'ID Kartu',
            'USERID' => 'User',
            'NOKARTU' => 'Nomor kartu',
            'NAMAKARTU' => 'Nama kartu',
            'VALID' => 'Valid',
            'CVV' => 'CVV',
            'JNSKARTU' => 'Jenis Kartu',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUSER()
    {
        return $this->hasOne(Datuser::className(), ['USERID' => 'USERID']);
    }
}
