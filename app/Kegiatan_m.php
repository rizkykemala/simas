<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Kegiatan_m extends Model
{
    protected $table = "kegiatans";
	protected $primaryKey = 'id';
	protected $fillable = [
		'jenis_kegiatan',
        'nama_kegiatan',
        'narasumber',
        'tgl_kegiatan',
        'jam',
        'harga_tiket',
        'keterangan',
        'ket_photo',    
	];
	protected $dates = [
		'created_at',
		'updated_at',
		'tgl_kegiatan'
	];

	public function getTglKegiatanAttribute($value)
	{
		return Carbon::parse($value)->format('Y-m-d');
	}

	public function setTglKegiatanAttribute($value) 
	{
		$this->attributes['tgl_kegiatan'] =Carbon::parse($value)->format('Y-m-d');
	}
}
