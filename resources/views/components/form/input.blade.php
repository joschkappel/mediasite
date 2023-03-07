@props(['for', 'hints' => ''])
@props(['label'])
@props(['placeholder' => ''])
@props(['disabled' => false])

<div class="form-control">
    <label class="label">
        <span class="label-text">{{ $label }}</span>
    </label>
    <input type="text" placeholder="{{ $placeholder }}" class="input @error($for) input-error @enderror input-bordered"
        wire:model.defer="{{ $for }}" @if ($disabled) disabled @endif />

    <x-form.errortext for="{{ $for }}" hints="{{ $hints }}" />
</div>
