<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SDamian\Larasort\AutoSortable;

class Mitra extends Model
{
    use HasFactory;
    use AutoSortable;

    protected $table = 'mitra';

    protected $guarded = ['id'];

    public function dokumenKerjasama()
    {
        return $this->hasMany(Kerjasama::class);
    }

    public function klasifikasiMitra()
    {
        return $this->belongsTo(KlasifikasiMitra::class, 'id_klasifikasi_mitra');
    }

    protected $sortables = [
        'id',
        'nama',
        'klasifikasi',
        'country',
    ];
}
