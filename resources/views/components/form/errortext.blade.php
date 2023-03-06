@props(['for', 'hints' => ''])

@error($for)
    <label class="label">
        <span class="label-text-alt text-error">{{ $message }}</span>
    </label>
@enderror

@if ($hints != '')
    <label class="label">
        <span class="label-text-alt text-gray-400">{!! $hints !!}</span>
    </label>
@endif
