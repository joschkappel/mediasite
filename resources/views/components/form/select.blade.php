@props(['for'])
@props(['label'])

<div class="form-control">
    <label class="label">
        <span class="label-text">{{ $label }}</span>
    </label>
    <select class="select select-bordered @error($for) select-error @enderror" wire:model.defer="{{ $for }}">
        {{ $slot }}
    </select>
    <x-form.errortext for="{{ $for }}" />
</div>
