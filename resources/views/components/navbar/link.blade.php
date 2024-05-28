{{-- "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" --}}

<a {{ $attributes }} class="{{ request()->fullUrlis(url($href)) ? 'bg-gray-300 text-gray-900' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900' }} block rounded-md px-3 py-2 text-base font-medium">
    {{ $slot }}
    </a>
    
    