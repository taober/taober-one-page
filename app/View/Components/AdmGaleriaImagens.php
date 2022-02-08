<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AdmGaleriaImagens extends Component
{

    public $imagens;
    public $titulo;
    public $xref_id;
    public $xref_nome;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($titulo, $xrefid, $xrefnome, $imagens )
    {
        $this->titulo = $titulo;
        $this->xref_id = $xrefid;
        $this->xref_nome = $xrefnome;
        $this->imagens = $imagens;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.adm-galeria-imagens');
    }
}
