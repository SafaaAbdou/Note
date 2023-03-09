@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-500 focus:ring-500 rounded-md shadow-sm']) !!}>
