<?php

namespace App\Http\Livewire\Content;

use App\Models\ContentVersion;
use App\Models\Content;

use App\Actions\Content\Sort;
use App\Actions\Content\Create;
use App\Actions\Content\Submit;

use Livewire\WithFileUploads;
use Livewire\Component;

class Visual extends Component
{
    use WithFileUploads;
    use Sort, Create, Submit;

    public $page, $version;

    public $developer = false;
    public $group = null;
    public $lang = 'cs';
    public $modal;

    public $state = [];

    public function mount($page, $version)
    {
        $this->page = $page;
        
        $this->version = ContentVersion::where('page_id', $page)->findOrFail($version)->id;

        $this->state = Content::where('page_id', $this->version)->where('status', 'production')->get(['id','type','name','label','value','parent_id','order'])->keyBy('id')->toArray();
    }

    public function render()
    {
        return view('livewire.content.visual')->layout('layouts.app', ['fullscreen' => true,]);
    }
}