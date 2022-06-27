<?php

namespace App\Http\Livewire\Admin;

use App\Models\Slider;
use Livewire\Component;
use Illuminate\Support\Carbon;
use Livewire\WithFileUploads;

class AdminEditSlideComponent extends Component
{
    use WithFileUploads;
    public $slide_id;
    public $title;
    public $image;
    public $status;

    public $newimage;

    public function mount($slide_id)
    {
        $slide = Slider::find($slide_id);
        $this->slide_id = $slide->id;
        $this->title = $slide->title;
        $this->image = $slide->image;
        $this->status = $slide->status;

    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'title'=>'required',
        ]);

        if($this->newimage)
        {
            $this->validateOnly($fields,[
                'newimage'=>'required|mimes: jpeg,png',
            ]);
        }

    }

     //Function to create a new home slide
    public function updateSlide()
    {
        $this->validate([
            'title'=>'required',
        ]);

        if($this->newimage)
        {
            $this->validate([
                'newimage'=>'required|mimes:jpeg,png',
            ]);
        }

        $slide = Slider::find($this->slide_id);
        $slide->title = $this->title;

        if($this->newimage)
        {
            //delete previous image if new one is provided
            unlink('images/slider/'.$slide->image);
            $imageName = Carbon::now()->timestamp.'.'.$this->newimage->extension();
            $this->newimage->storeAs('slider', $imageName);
            $slide->image = $imageName;
        }

        $slide->status = $this->status;
        $slide->save();
        session()->flash('message','Banniere modifier avec succes');

    }
    public function render()
    {
        return view('livewire.admin.admin-edit-slide-component')->layout('layouts.base');
    }
}
