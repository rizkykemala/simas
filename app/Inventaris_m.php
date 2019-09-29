<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Inventaris_m extends Model
{
    protected $table = "inventaris";
	protected $primaryKey = 'id';
	protected $fillable = [
		'jumlah_barang',
		'jenis_barang',
		'tgl_barang',
		'keterangan',
		'nama_barang',
	];
	protected $dates = [
		'created_at',
		'updated_at',
		'tgl_barang'
	];

	public function getTglBarangAttribute($value)
	{
		return Carbon::parse($value)->format('Y-m-d');
	}

	public function setTglBarangAttribute($value) 
	{
		$this->attributes['tgl_barang'] =Carbon::parse($value)->format('Y-m-d');
	}
}
