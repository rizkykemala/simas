<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Uangkas_m extends Model
{
	protected $table = "uangkas";
	protected $primaryKey = 'id';
	protected $fillable = [
		'jumlah_uang',
		'jenis_transaksi',
		'tgl_transaksi',
		'keterangan',
	];
	protected $dates = [
		'created_at',
		'updated_at',
		'tgl_transaksi'
	];

	public function getAllTransaction(){
		$getAll = DB::table("uangkas")
					->select(DB::raw("*,CASE jenis_transaksi WHEN 'D' THEN jumlah_uang ELSE 0 END AS uang_masuk,CASE jenis_transaksi WHEN 'K' THEN jumlah_uang ELSE 0 END AS uang_keluar"))
					->get();

		return $getAll;
	}
	public function getTglTransaksiAttribute($value)
	{
		return Carbon::parse($value)->format('Y-m-d');
	}

	public function setTglTransaksiAttribute($value) 
	{
		$this->attributes['tgl_transaksi'] =Carbon::parse($value)->format('Y-m-d');
	}
}
