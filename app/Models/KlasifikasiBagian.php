<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SDamian\Larasort\AutoSortable;

class KlasifikasiBagian extends Model
{
    use HasFactory;
    use AutoSortable;

    protected $table = 'klasifikasi_bagian';

    protected $guarded = ['id'];

    protected $sortables = ['klasifikasi'];
}
