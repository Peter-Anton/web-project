<?php

namespace App\View\Components;

use App\Models\OfferCategory;
use Illuminate\View\Component;

class categoryDropdown extends Component
{

    public function render()
    {
        return view('components.category-dropdown',[
            'categories'=>OfferCategory::all(),
            'current_category'=>OfferCategory::query()->firstwhere('slug',request('category'))


        ]);
    }
}
