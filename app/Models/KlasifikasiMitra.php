<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SDamian\Larasort\AutoSortable;

class KlasifikasiMitra extends Model
{
    use HasFactory;
    use AutoSortable;

    protected $table = 'klasifikasi_mitra';
    protected $guarded = ['id'];
    protected $sortables = ['klasifikasi'];
}
