<?php

namespace App\Http\Livewire\Tags;
use Illuminate\Support\Str;
use Livewire\Component;
use App\Models\Tag;

class Create extends Component
{

    public $name;
    public $slug;
    public $version;

    protected $rules = [
        'name' => ['required', 'unique:tags,name', 'min:2', 'max:10']
        // 'slug' => ['required', 'slug']
    ];

    public function storeTagData() 
    {

        $tag = new Tag();

        $tag->name= $this->name;
        $tag->version = $this->version;
        $tag->slug = Str::slug($this->name . '-' . $this->version.'-' );

        $tag->save();  
        // dd($tag);   

        session()->flash('success', 'New Tag Created! Successfully');

        $this->reset();


    }


    public function render()
    {
        return view('livewire.tags.create');
    }
}
