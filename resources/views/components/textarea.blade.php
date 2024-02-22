@props(['disabled' => false, 'key' => null, 'row' => 10])

<textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm',
    'row' => $row
]) !!}>

</textarea>

@if (!empty($key))
    @error($key)
        <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1">
            {{ $message }}
        </span>
    @enderror
@endif
