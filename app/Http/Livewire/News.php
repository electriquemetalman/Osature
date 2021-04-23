<?php

namespace App\Http\Livewire;

use App\models\News as ModelsNews;
use Livewire\Component;

class News extends Component
{
    public function getNewsListProperty()
    {
        return ModelsNews::orderBy('created_at', 'DESC')->get();
    }

    public function render()
    {
        return view('livewire.news.index');
    }
}
