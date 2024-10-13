@props(['name', 'value' => '', 'rows' => 3, 'cols' => 30])

<textarea name="{{ $name }}" rows="{{ $rows }}"
    cols="{{ $cols }}"
    {{ $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) }}
>{{ old($name, $value) }}</textarea>
