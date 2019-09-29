<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Imam_m extends Model
{
    protected $table = "imam";
	protected $primaryKey = 'id';
	protected $fillable = [
		'nama_imam',
		'usia_imam',
		'tempat_lahir',
		'tgl_lahir',
		'alamat_imam',
		'no_hp',
		'keterangan',
		
	];
	protected $dates = [
		'created_at',
		'updated_at',
		'tgl_lahir'
	];

	public function getTglLahirAttribute($value)
	{
		return Carbon::parse($value)->format('Y-m-d');
	}

	public function setTglLahirAttribute($value) 
	{
		$this->attributes['tgl_lahir'] =Carbon::parse($value)->format('Y-m-d');
	}
}
