@props(['for', 'hints' => ''])
@props(['label'])
@props(['placeholder' => ''])
@props(['rows' => 10])


<div class="form-control">
    <label class="label">
        <span class="label-text">{{ $label }}</span>
    </label>
    <textarea rows="{{ $rows }}" placeholder="{{ $placeholder }}"
        class="textarea textarea-bordered @error($for) textarea-error @enderror" wire:model.defer="{{ $for }}">
    </textarea>

    <x-form.errortext for="{{ $for }}" hints="{{ $hints }}" />
</div>
