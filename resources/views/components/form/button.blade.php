@props(['type' => 'btn-primary'])
@props(['submit' => false])

<div class="px-2">
    <button {{ $attributes->merge(['type' => $submit ? 'submit' : 'button', 'class' => 'btn ' . $type]) }}>
        {{ $slot }}
    </button>
</div>
