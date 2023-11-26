<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Selector extends Component
{
    public string $value;
    /**
     * Create a new component instance.
     */
    public function __construct(public string $number)
    {
        switch (str_split($number)[1]) {
            case 1:
                $this->value = 'ASC';
                break;
            
            default:
            $this->value = 'DESC';
                break;
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.selector');
    }
}
