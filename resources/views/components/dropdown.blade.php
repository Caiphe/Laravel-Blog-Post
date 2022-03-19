@props(['trigger', 'categories'])

<div x-data="{ show:false }" @click.away="show = false" class="relative">
    {{-- Trigger --}}
   <div  @click="show = ! show">
       {{ $trigger }}
   </div>

    {{-- Links --}}
    <div x-show="show" class="py-2 absolute bg-gray-100 w-32 mt-4 r-10 rounded-xl overflow-auto max-h-300" style="display: none;">
      {{ $slot }}
    </div>
</div>
