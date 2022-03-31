<x-filament::page>

    <div class="p-6 max-w-lg mx-auto bg-white rounded-xl shadow-lg flex items-center space-x-4">
        <div>
            <div class="text-xl font-medium">
                <p class="flex items-center gap-3 font-medium transition text-slate-500">
                    <x-heroicon-o-film class="w-6 h-6 shrink-0"/>
                    <span> {{ $film->title }} </span></p>
            </div>
            <p class="flex items-center gap-3 transition text-slate-500">
                <x-heroicon-o-information-circle class="w-6 h-6 shrink-0"/> {{ $film->description }}</p>
            <p class="flex items-center gap-3 transition text-slate-500">
                <x-heroicon-o-calendar class="w-6 h-6 shrink-0"/> {{ $film->release_year }}</p>
            <p class="flex items-center gap-3 transition text-slate-500">
                <x-heroicon-o-speakerphone class="w-6 h-6 shrink-0"/> {{ $film->language->name }}</p>
            <p class="flex items-center gap-3 transition text-slate-500">
                <x-heroicon-o-clock class="w-6 h-6 shrink-0"/> {{ $film->rental_duration }}</p>
            <p class="flex items-center gap-3 transition text-slate-500">
                <x-heroicon-o-currency-pound class="w-6 h-6 shrink-0"/> {{ $film->rental_rate }}</p>
            <p class="flex items-center gap-3 transition text-slate-500">
                <x-heroicon-o-arrow-narrow-right class="w-6 h-6 shrink-0"/> {{ $film->length }}</p>
            <p class="flex items-center gap-3 transition text-slate-500">
                <x-heroicon-o-x-circle class="w-6 h-6 shrink-0"/> {{ $film->replacement_cost }}</p>
            <p class="flex items-center gap-3 transition text-slate-500">
                <x-heroicon-o-trending-up class="w-6 h-6 shrink-0"/> {{ $film->rating }}</p>
            <p class="flex items-center gap-3 transition text-slate-500">
                <x-heroicon-o-clipboard-list class="w-6 h-6 shrink-0"/> {{ $film->special_features }}</p>
        </div>
    </div>
    <div class="p-6 max-w-lg mx-auto bg-white rounded-xl shadow-lg flex items-center space-x-4">
        <div>
            <div class="text-xl font-medium">
                <p class="flex items-center gap-3 font-medium transition text-slate-500">
                    <x-heroicon-o-user class="w-6 h-6 shrink-0"/>
                    <span>Staring</span></p>
            </div>
            @if($film->actors)
                <ul>
                    @foreach($film->actors as $actor)
                        <p class="flex items-center gap-3 transition text-slate-500">
                            <x-heroicon-o-star class="w-6 h-6 shrink-0"/> {{ $actor->first_name }} {{ $actor->last_name }}</p>
                    @endforeach
                </ul>
            @else
                <p class="flex items-center gap-3 transition text-slate-500">
                    <x-heroicon-o-ban class="w-6 h-6 shrink-0"/>
                    No actors
                </p>
            @endif

        </div>
    </div>

    <div class="p-6 max-w-lg mx-auto bg-white rounded-xl shadow-lg flex items-center space-x-4">
        <div>
            <div class="text-xl font-medium">
                <p class="flex items-center gap-3 font-medium transition text-slate-500">
                    <x-heroicon-o-collection class="w-6 h-6 shrink-0"/>
                    <span>Categories</span></p>
            </div>
            @if($film->categories)
                <ul>
                    @foreach($film->categories as $category)
                        <p class="flex items-center gap-3 transition text-slate-500">
                            <x-heroicon-o-badge-check class="w-6 h-6 shrink-0"/> {{ $category->name }} </p>
                    @endforeach
                </ul>
            @else
                <p class="flex items-center gap-3 transition text-slate-500">
                    <x-heroicon-o-ban class="w-6 h-6 shrink-0"/>
                    No categories
                </p>
            @endif

        </div>
    </div>
</x-filament::page>
