<?php

namespace App\View\Components;

use Illuminate\View\Component;

class cardVueloInfo extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($nroVuelo, $origen, $destino, $fechaVuelo, $horaVuelo, $clase, $tarifa, $cantAdultos, $cantMenores, $cantBebes)
    {
        $this->nroVuelo = $nroVuelo;
        $this->origen = $origen;
        $this->destino = $destino;
        $this->fechaVuelo = $fechaVuelo;
        $this->horaVuelo = $horaVuelo;
        $this->clase = $clase;
        $this->cantAdultos = $cantAdultos;
        $this->cantMenores = $cantMenores;
        $this->cantBebes = $cantBebes;
        $this->tarifa = $tarifa;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $nroVuelo = $this->nroVuelo;
        $origen = $this->origen;
        $destino = $this->destino;
        $fechaVuelo = $this->fechaVuelo;
        $horaVuelo = $this->horaVuelo;
        $clase = $this->clase;
        $cantAdultos = $this->cantAdultos;
        $cantMenores = $this->cantMenores;
        $cantBebes = $this->cantBebes;
        $tarifa = $this->tarifa;

        return view('components.cardVueloInfo', compact('nroVuelo', 'origen', 'destino', 'fechaVuelo', 'horaVuelo', 'clase', 'tarifa', 'cantAdultos', 'cantMenores', 'cantBebes'));
    }
}
