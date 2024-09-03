<?php

namespace App\Livewire\Product;

use App\Enums\ProductType;
use App\Models\Product;
use App\Models\ProductVariant;
use Livewire\Component;

class Show extends Component
{
    public $product, $currentVariant;
    public function mount($id){
        $this->product = Product::with(['variants', 'variants.galleries', 'variants.attributes'])->find($id);
        $this->currentVariant = $this->product->variants()->oldest()->first();
    }
    public function render()
    {
        return view('livewire.product.show');
    }

    public function getStock($variant){
        if($variant->stock_qty === 0){
            return "Out of Stock";
        }

        return $variant->stock_qty;
    }

    public function changeVariant($id){
        $this->currentVariant = ProductVariant::with(['galleries', 'attributes'])->find($id);
        $this->dispatch('variantChanged');
    }

    public function getProductType(){
        $productType = ProductType::from($this->product->product_type);
        return $productType->getTitle();
    }
}
