@props(['type' => 'primary'])

<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-' . $type]) }}>
    {{ $slot }}
</button>
