<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Attributes\Url;
use Livewire\Component;

class ProductGrid extends Component
{
    #[Url(except: '')]
    public string $search = '';

    #[Url(except: '')]
    public string $category = '';

    public ?int $categoryId = null;

    public bool $showCategory = true;

    public int $perPage = 12;

    public int $page = 1;

    public array $products = [];

    public int $total = 0;

    public bool $hasMorePages = true;

    public bool $loading = false;

    public function mount(?int $categoryId = null, bool $showCategory = true, int $perPage = 12): void
    {
        $this->categoryId = $categoryId;
        $this->showCategory = $showCategory;
        $this->perPage = $perPage;
        $this->loadInitialProducts();
    }

    public function loadInitialProducts(): void
    {
        $this->page = 1;
        $this->products = [];
        $this->loadMore();
    }

    public function loadMore(): void
    {
        if (! $this->hasMorePages) {
            return;
        }

        $this->loading = true;

        $query = Product::with(['category'])
            ->active()
            ->ordered();

        // Filter by specific category (for category page)
        if ($this->categoryId) {
            $query->where('category_id', $this->categoryId);
        }

        // Filter by category slug (for products page)
        if ($this->category && ! $this->categoryId) {
            $query->whereHas('category', fn ($q) => $q->where('slug', $this->category));
        }

        // Search
        if ($this->search) {
            $query->where(function ($q) {
                $q->where('name', 'like', "%{$this->search}%")
                    ->orWhere('name_ar', 'like', "%{$this->search}%")
                    ->orWhere('description', 'like', "%{$this->search}%")
                    ->orWhere('description_ar', 'like', "%{$this->search}%");
            });
        }

        $this->total = $query->count();

        $newProducts = $query
            ->skip(($this->page - 1) * $this->perPage)
            ->take($this->perPage)
            ->get()
            ->toArray();

        $this->products = array_merge($this->products, $newProducts);
        $this->hasMorePages = count($this->products) < $this->total;
        $this->page++;
        $this->loading = false;
    }

    public function updatedSearch(): void
    {
        $this->resetAndReload();
    }

    public function updatedCategory(): void
    {
        $this->resetAndReload();
    }

    public function resetAndReload(): void
    {
        $this->page = 1;
        $this->products = [];
        $this->hasMorePages = true;
        $this->loadMore();
    }

    public function clearFilters(): void
    {
        $this->search = '';
        $this->category = '';
        $this->resetAndReload();
    }

    public function getCategories()
    {
        return Category::active()
            ->ordered()
            ->withCount(['products' => fn ($q) => $q->active()])
            ->get();
    }

    public function render()
    {
        return view('livewire.product-grid', [
            'categories' => $this->categoryId ? null : $this->getCategories(),
        ]);
    }
}
