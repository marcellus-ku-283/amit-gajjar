@props(['disabled' => false, 'key' => null])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm',
]) !!}>

@if (!empty($key))
    @error($key)
        <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1">
            {{ $message }}
        </span>
    @enderror
@endif
