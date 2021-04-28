<div class="flex items-center justify-between w-full h-20 px-6 bg-white">
    <p class="pl-2 text-lg font-bold text-gray-700">Hlavní stránka</p>
    <div class="flex items-center space-x-4">
        <div class="relative">
            <button @click="langModal = !langModal" class="space-x-2 transition duration-300 bg-white btn group hover:shadow-sm">
                <div class="px-2 py-1 text-light-blue-500 group-hover:text-light-blue-600">
                    {{ config('option.langs.' . $lang) }}
                </div>
                <svg class="w-5 h-5 text-gray-400 group-hover:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>
            <div 
                @click.away="langModal = false" 
                x-show="langModal"
                style="display: none" 
                class="absolute right-0 w-56 p-6 space-y-3 bg-white rounded-lg shadow-sm top-20"
            >
                @foreach (config('option.langs', []) as $key => $label)
                    <button 
                        :class="{ 'text-light-blue-500 font-semibold': lang == '{{ $key }}' }" 
                        class="block text-sm text-gray-700 hover:text-light-blue-500" 
                        @click="lang = '{{ $key }}', langModal = false" 
                        type="button"
                    >
                        {{ $label }}
                    </button>
                @endforeach
            </div>
        </div>
        <div class="w-px h-6 bg-gray-300"></div>
        <button class="transition duration-300 bg-light-blue-100 text-light-blue-500 btn hover:text-light-blue-600">
            <span class="px-3 py-1">Zrušit</span>
        </button>
        <button wire:click="submit" type="button" class="transition duration-300 bg-green-500 btn hover:bg-green-600 text-green-50 hover:text-white">
            <span class="px-3 py-1">Uložit</span>
            <svg class="hidden w-6 h-6 animate-spin" wire:loading.class.remove="hidden" wire:target="submit" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                <path d="M13.75 22c0 .966-.783 1.75-1.75 1.75s-1.75-.784-1.75-1.75.783-1.75 1.75-1.75 1.75.784 1.75 1.75zm-1.75-22c-1.104 0-2 .896-2 2s.896 2 2 2 2-.896 2-2-.896-2-2-2zm10 10.75c.689 0 1.249.561 1.249 1.25 0 .69-.56 1.25-1.249 1.25-.69 0-1.249-.559-1.249-1.25 0-.689.559-1.25 1.249-1.25zm-22 1.25c0 1.105.896 2 2 2s2-.895 2-2c0-1.104-.896-2-2-2s-2 .896-2 2zm19-8c.551 0 1 .449 1 1 0 .553-.449 1.002-1 1-.551 0-1-.447-1-.998 0-.553.449-1.002 1-1.002zm0 13.5c.828 0 1.5.672 1.5 1.5s-.672 1.501-1.502 1.5c-.826 0-1.498-.671-1.498-1.499 0-.829.672-1.501 1.5-1.501zm-14-14.5c1.104 0 2 .896 2 2s-.896 2-2.001 2c-1.103 0-1.999-.895-1.999-2s.896-2 2-2zm0 14c1.104 0 2 .896 2 2s-.896 2-2.001 2c-1.103 0-1.999-.895-1.999-2s.896-2 2-2z"/>
            </svg>
        </button>
        <div class="w-px h-6 bg-gray-300"></div>
        <div class="relative">
            <button @click="moreModal = !moreModal" class="py-2.5 text-gray-500 transition duration-300 hover:text-gray-900">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
            <div @click.away="moreModal = false" x-show="moreModal" style="display: none" class="absolute right-0 px-6 py-4 bg-white rounded-lg shadow-sm top-20 w-72">
                <p class="mb-4 text-sm text-blue-gray-500">Poslední úprava: 17:54 27.7.2020</p>
                <label class="flex items-center justify-start mb-2">
                    <div class="flex items-center justify-center flex-none w-5 h-5 mr-2 bg-white border-2 border-gray-200 rounded-full">
                        <input wire:model="developer" type="checkbox" class="absolute opacity-0 radio" name="radio" value="1" />
                        <div class="w-2 h-2 transition duration-200 ease-in-out transform rounded-full opacity-0 bg-light-blue-400"></div>
                    </div>
                    <div class="flex-none text-sm font-semibold text-blue-gray-500">Mód správce</div>
                </label>
            </div>
        </div>
    </div>
</div>