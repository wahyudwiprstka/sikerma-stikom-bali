<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SDamian\Larasort\AutoSortable;

class Bagian extends Model
{
    use HasFactory;
    use AutoSortable;

    protected $table = 'bagian';

    protected $guarded = ['id'];

    public function klasifikasi()
    {
        return $this->belongsTo(KlasifikasiBagian::class, 'id_klasifikasi_bagian');
    }

    protected $sortables = [
        'id',
        'nama_bagian',
        'id_klasifikasi_bagian',
    ];
}
