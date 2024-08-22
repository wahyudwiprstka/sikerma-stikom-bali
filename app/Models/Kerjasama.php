<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SDamian\Larasort\AutoSortable;

class Kerjasama extends Model
{
    use HasFactory;
    use AutoSortable;

    protected $table = 'kerjasama';

    protected $guarded = ['id'];

    public function mitra()
    {
        return $this->belongsTo(Mitra::class, 'id_mitra');
    }

    public function mou()
    {
        return $this->belongsTo(Dokumen::class, 'id_mou');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function bagians()
    {
        return $this->belongsTo(Bagian::class, 'bagian');
    }

    public function dokumen()
    {
        return $this->belongsTo(Dokumen::class, 'id_dokumen');
    }

    protected $sortables = [
        'id',
        'judul',
        'jenis',
        'durasi',
    ];
}
