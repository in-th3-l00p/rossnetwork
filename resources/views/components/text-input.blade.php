@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 focus:border-dark focus:ring-dark rounded-md shadow-sm']) }}>
