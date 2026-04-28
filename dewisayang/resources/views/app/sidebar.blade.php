<div class="list-group list-group-flush">
    <a href ="/" class = "list-group-item list-group-item-action {{ request()->path() === '/' ? 
    active' : ''}}"> Dashboard</a>
    <a href ="/produk/" class = "list-group-item list-group-item-action active {{ request()->is('produk') || request() -> isz('produk/ === '/' ? 
    active' : ''}}"> Produk</a>
    <a href ="#" class = "list-group-item list-group-item-action"> Supplier</a>
</div>
//php make artisan make controlller productController -- resource
