<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nodes extends Model
{
    use HasFactory;

    protected $table = 'nodes';
    protected $primaryKey = 'node_id';

    public function tipo()
    {
        return $this->hasMany(NodesTipo::class, 'node_tipo', 'tipo_id');
    }

    // public function imagens()
    // {
    //     return $this->hasMany(Imagens::class, 'ref_id', 'id')
    //         ->where('ref_nome', 'portifolios');
    // }
}
