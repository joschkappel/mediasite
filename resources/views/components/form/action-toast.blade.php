@props(['on'])

<div class="toast toast-top toast-end" x-data="{ shown: false, timeout: null }" x-init="@this.on('{{ $on }}', () => {
    clearTimeout(timeout);
    shown = true;
    timeout = setTimeout(() => { shown = false }, 2000);
})"
    x-show.transition.out.opacity.duration.1500ms="shown" x-transition:leave.opacity.duration.1500ms
    style="display: none;" {{ $attributes->merge(['class' => 'text-sm text-gray-600']) }}>
    <div class="alert alert-success">
        <div>
            <span> {{ $slot->isEmpty() ? 'Saved.' : $slot }} </span>
        </div>
    </div>
</div>
