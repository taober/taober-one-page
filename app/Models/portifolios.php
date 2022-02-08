<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portifolios extends Model
{
    protected $table = 'portifolios';
    protected $primaryKey = 'id';

    public function imagens()
    {
        return $this->hasMany(Imagens::class, 'ref_id', 'id')
        ->where('ref_nome','portifolios');
    }
}
