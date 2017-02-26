<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "datuser".
 *
 * @property string $USERID
 * @property string $USERPWD
 * @property string $NAMAUSER
 * @property string $JKUSER
 * @property string $TGLLHR
 * @property string $NIK
 * @property string $NOHP
 * @property string $ALAMAT
 * @property string $EMAIL
 *
 * @property Datakartu[] $datakartus
 * @property Datpemesananhotel[] $datpemesananhotels
 */
class Datuser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'datuser';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['USERID', 'USERPWD', 'NAMAUSER', 'JKUSER', 'TGLLHR', 'NOHP', 'ALAMAT', 'EMAIL'], 'required'],
            [['TGLLHR'], 'safe'],
            [['USERID', 'USERPWD', 'NIK'], 'string', 'max' => 25],
            [['NAMAUSER'], 'string', 'max' => 150],
            [['JKUSER'], 'string', 'max' => 1],
            [['NOHP'], 'string', 'max' => 20],
            [['ALAMAT', 'EMAIL'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            /*'USERID' => 'Userid',
            'USERPWD' => 'Userpwd',
            'NAMAUSER' => 'Nama User',
            'JKUSER' => 'Jns Kelamin',
            'TGLLHR' => 'Tgl Lahir',
            'NIK' => 'NIK',
            'NOHP' => 'No Hp',
            'ALAMAT' => 'Alamat',
            'EMAIL' => 'Email',*/
			
			'USERID' => 'Username',
            'USERPWD' => 'Password',
            'NAMAUSER' => 'Name',
            'JKUSER' => 'Gender',
            'TGLLHR' => 'Born Date',
            'NIK' => 'ID Number',
            'NOHP' => 'Phone',
            'ALAMAT' => 'Address',
            'EMAIL' => 'Email',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDatakartus()
    {
        return $this->hasMany(Datakartu::className(), ['USERID' => 'USERID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDatpemesananhotels()
    {
        return $this->hasMany(Datpemesananhotel::className(), ['USERID' => 'USERID']);
    }
}
