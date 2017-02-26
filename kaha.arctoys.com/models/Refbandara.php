<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "refbandara".
 *
 * @property string $KDBANDARA
 * @property string $NMBANDARA
 * @property string $KDKOTA
 *
 * @property Refkota $kDKOTA
 */
class Refbandara extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'refbandara';
    }

    /**
     * @inheritdoc
     */

    public function rules()
    {
        return [
            [['KDBANDARA', 'NMBANDARA', 'KDKOTA'], 'required'],
            [['KDBANDARA'], 'string', 'max' => 5],
            [['NMBANDARA'], 'string', 'max' => 100],
            [['KDKOTA'], 'string', 'max' => 4],
            [['KDKOTA'], 'exist', 'skipOnError' => true, 'targetClass' => Refkota::className(), 'targetAttribute' => ['KDKOTA' => 'KDKOTA']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'KDBANDARA' => 'Kdbandara',
            'NMBANDARA' => 'Nmbandara',
            'KDKOTA' => 'Kdkota',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKDKOTA()
    {
        return $this->hasOne(Refkota::className(), ['KDKOTA' => 'KDKOTA']);
    }
	
	public function getFullName() 
	{
		return $this->NMBANDARA.' ('.$this->KDBANDARA.')';
	}
}
