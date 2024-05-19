<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class products implements FromView
{
    protected $products;

    public function __construct(array $products)
    {
        $this->products = $products[0];
    }

    public function view(): View
    {
        return view('exports.products', [
            'products' => $this->products,
        ]);
    }
}
