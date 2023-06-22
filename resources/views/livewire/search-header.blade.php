<div class="search-style-1">
     <form action="{{route('product.search')}}" method="get">  
         <!-- // boleh buang wire:model  -->
        <input type="text" name="z" wire:model="z" placeholder="Search for items...">
        <button type="submit">Search</button>
    </form>
</div>  

