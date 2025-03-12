@props(['disabled' => false])

<textarea @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 focus:border-dark focus:ring-dark rounded-md shadow-sm']) }}>{{ $slot ?? '' }}</textarea> 