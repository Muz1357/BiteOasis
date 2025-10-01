<?php

namespace App\Livewire;
use Livewire\WithFileUploads;
use Livewire\Component;
use App\Models\Product;

class ProductImageUpload extends Component
{

    use WithFileUploads;

    public $productId;
    public $photo;
    public $currentImage;

    protected $rules = [
        'photo' => 'required|image|max:2048',
    ];

    public function save(){
        $this->validate();
    $path = $this->photo->store('products', 'public'); //storage/app/public/products
    $product = Product::findOrFail($this->productId);
    $product->image = str_replace('public/', 'storage', $path);
    $product->save();
        
        $this->reset('photo');
        session()->flash('success', 'Image uploaded');
        $this->dispatch('image-updated');
    }

    public function render()
    {
        $product = Product::findOrFail($this->productId);
        return view('livewire.product-image-upload', compact('product'));
    }
}
