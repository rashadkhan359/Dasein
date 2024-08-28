<?php

namespace App\Livewire\Product;

use App\Actions\Product\DeleteProduct;
use App\Enums\Status;
use App\Models\Product;
use App\Models\Store;
use Livewire\Component;
use App\Filters\v1\ProductFilter;
use App\Models\ProductVariant;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $stores, $currentStore, $categories;
    public $minPrice = 0;
    public $maxPrice = INF;
    public $selectedCategories = [];
    public $search = '';
    public $openAccordions = [
        'category' => true,
        // Add other accordion items as needed
    ];
    public $showStyle = 'list';
    protected $listeners = ['deleteItem', 'confirmDelete'];

    public function mount()
    {
        $this->stores = Store::with(['categories'])->where('status', Status::ACTIVE)->get(['id', 'name']);
        $this->currentStore = $this->stores->where('name', 'Furniture')->first();
        $this->categories = $this->currentStore->categories;
        $this->maxPrice = ProductVariant::max('price');
    }
    public function render()
    {
        $query = Product::query();

        $query = $this->handleFilter($query);
        // dd($query->get());
        $products = $query->paginate(15);

        return view('livewire.product.index', compact('products'));
    }

    public function handleFilter($query)
    {
        $filterParams['sort'] = [
            'created_at' => 'desc'
        ];

        if ($this->search != '') {
            $filterParams['search'] = $this->search;
        }

        if (!empty($this->selectedCategories)) {
            $query->whereIn('category_id', $this->selectedCategories);
        }

        $filterParams['filters'] = [
            [
                'field' => 'price',
                'operator' => 'between',
                'value' => [$this->minPrice, $this->maxPrice]
            ]
        ];

        $filter = new ProductFilter();

        return $filter->apply($query, $filterParams);
    }

    public function updated($property, $value)
    {
        // dd($property, $value);
    }

    public function updatedSelectedCategories()
    {
        // Your existing logic here

        // Ensure the category accordion stays open
        $this->openAccordions['category'] = true;
    }

    public function clearAll(){
        $this->selectedCategories = [];
        $this->search = '';
        $this->minPrice = 0;
        $this->maxPrice = ProductVariant::max('price');
    }

    public function confirmDelete($itemId){
        $this->dispatch('showConfirmation', id: $itemId);
    }

    public function deleteItem($itemId){
        $product = Product::findOrFail($itemId);
        DeleteProduct::execute($product);
        $this->dispatch('itemDeleted');
    }

    public function changeStyle(){
        $this->showStyle = $this->showStyle === 'list' ? 'grid' : 'list';
    }
}
