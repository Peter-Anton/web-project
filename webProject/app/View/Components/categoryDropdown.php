<?php

namespace App\View\Components;

use App\Models\Category;
use Illuminate\View\Component;

class categoryDropdown extends Component
{

    public function render()
    {
        return view('components.category-dropdown',[
            'categories'=>Category::all(),
            'current_category'=>Category::query()->firstwhere('slug',request('category'))
        ]);
    }
}
