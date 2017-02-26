<?php

namespace app\models;

use Yii;
use yii\db\Expression;

class Laporanpemesananhotel
{
	public static function laporan_pemesanan_hotel()
	{

		$kueri = "SELECT DP.KDPESAN, DU.NAMAUSER, DP.TGLPESAN
						FROM datpemesananhotel DP, detailpesanhotel DPH, refkamar K, datuser DU
						WHERE DP.`USERID`=DU.`USERID`
						AND DPH.`KDPESAN` = DP.`KDPESAN`
						AND DPH.`KDKMR` = K.`KDKMR`
		
		";

		$laporan_hotel = Yii::$app->db->createCommand($kueri)->queryAll();
		return $laporan_hotel;
		
		
	}
}
?>
