@props(['alpineVar' => null, 'wire' => null, 'title' => null, 'description' => null])

<div 
    @if($alpineVar) x-show="{{ $alpineVar }}" @click="{{ $alpineVar }} = false" @endif
    @if($wire) wire:click="$set('{{ $wire }}', null)" @endif
    class="fixed inset-0 z-50 bg-black bg-opacity-30"
></div>
<div @if($alpineVar) x-show="{{ $alpineVar }}" @endif class="fixed inset-0 z-50 flex flex-col items-center justify-around">
    <div @closemodal.window="{{ $alpineVar }} = false" ></div>
    <div class="w-full max-w-3xl px-8 py-6 bg-white rounded-xl">
        <div class="flex items-center justify-between">
            <div class="text-lg font-bold text-gray-600">
                {{ $title }}
            </div>
            <div>
                <button 
                    @if($alpineVar) @click="{{ $alpineVar }} = false" @endif 
                    @if($wire) wire:click="$set('{{ $wire }}', null)" @endif
                    type="button"
                    class="flex items-center justify-center w-10 h-10 text-gray-600 rounded-full opacity-50 cursor-pointer hover:bg-gray-200"
                >
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div> 
        </div>
        @if($description)
            <p class="mb-4 text-sm text-gray-500">
                {{ $description }}
            </p>
        @endif
        {{ $slot }}
    </div>
    <div></div>
    <div></div>
</div>