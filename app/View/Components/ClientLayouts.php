<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ClientLayouts extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $title;
    public $descartikel;
    public $titleartikel;
    public function __construct($title = null, $descartikel = null, $titleartikel = null)
    {
        $this->title                = "HMTI UIS | $title" ?? "HMTI UIS";
        $this->descartikel          = $descartikel ?? "HMTI Universitas Ibnu Sina sebagai wadah dari mahasiswa teknik informatika yang sadar akan hak dan kewajibannya sebagai unit kegiatan kampus berusaha memberikan dharma bhaktinya untuk mewujudkan nilai-nilai kebenaran demi terwujudnya mahasiswa program studi teknik informatika yang cerdas, adil dan berjiwa pemimpin.";
        $this->titleartikel         = $titleartikel ?? "HMTI Universitas Ibnu Sina";
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('frontend.layouts.index');
    }
}
