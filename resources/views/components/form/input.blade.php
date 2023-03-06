@props(['for', 'hints' => ''])
@props(['label'])
@props(['placeholder' => ''])

<div class="form-control">
    <label class="label">
        <span class="label-text">{{ $label }}</span>
    </label>
    <input type="text" placeholder="{{ $placeholder }}" class="input @error($for) input-error @enderror input-bordered"
        wire:model.defer="{{ $for }}" />

    <x-form.errortext for="{{ $for }}" hints="{{ $hints }}" />
</div>
