<?php

namespace App\Livewire;

use App\Jobs\Watermark;
use Livewire\Component;
use App\Models\Category;
use App\Jobs\RemoveFaces;
use App\Jobs\ResizeImage;
use App\Models\Announcement;
use Livewire\WithFileUploads;
use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CreateAnnouncement extends Component
{
    use WithFileUploads;

    public $name;
    public $description;
    public $price;
    public $category_id;
    public $images = [];
    public $temporary_images;

    public $announcement;

    protected $rules = [
        'name' => 'required',
        'description' => 'required|min:10',
        'price' => 'required|numeric|max:99999',
        'category_id' => 'required',
        'images.*' => 'image|max:1024',
        'temporary_images.*' => 'image|max:1024',
    ];

    public function updatedTemporaryImages()
    {
        if (
            $this->validate([
                'temporary_images.*' => 'image|max:1024',
            ])
        ) {
            foreach ($this->temporary_images as $image) {
                $this->images[] = $image;
            }
        }
    }

    public function removeImage($key)
    {
        if (in_array($key, array_keys($this->images))) {
            unset($this->images[$key]);
        }
    }

    public function store()
    {
        $this->validate();
        $this->announcement = Category::find($this->category_id)
            ->announcements()
            ->create($this->validate());
        $this->announcement->user()->associate(Auth::user());
        $this->announcement->save();
        if (count($this->images)) {
            foreach ($this->images as $image) {
                // $this->announcement->images()->create([
                //     'path' => $image->store('images', 'public'),
                // ]);
                $newFileName = "announcements/{$this->announcement->id}";
                $newImage = $this->announcement->images()->create([
                    'path' => $image->store($newFileName, 'public'),
                ]);

                RemoveFaces::withChain([
                    new Watermark($newImage->id),
                    new ResizeImage($newImage->path , 300 , 300),
                    new GoogleVisionSafeSearch($newImage->id),
                    new GoogleVisionLabelImage($newImage->id)

                ])->dispatch($newImage->id);
            }

            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        }
        session()->flash('status', __('ui.createAnnouncement'));
        $this->redirect('/announcement/create');
        $this->clear();
    }

    public function clear()
    {
        $this->name = '';
        $this->description = '';
        $this->price = '';
        $this->images = [];
        $this->temporary_images = [];
    }
    public function render()
    {
        return view('livewire.create-announcement');
    }
}
