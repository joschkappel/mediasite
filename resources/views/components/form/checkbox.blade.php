@props(['label', 'for', 'disabled' => false, 'hints' => ''])

<div class="form-control">
    <label class="label cursor-pointer justify-start">

        <input type="checkbox" class="checkbox checkbox-info" wire:model.defer="{{ $for }}"
            @if ($disabled) disabled @endif />
        <span class="label-text px-2">{{ $label }}</span>

    </label>
    <x-form.errortext for="{{ $for }}" hints="{{ $hints }}" />
</div>
