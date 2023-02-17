<div>
    <div class="form-check">
        <input
            class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2"
            type="checkbox" id="{{ $bindto }}" wire:model.defer="{{ $bindto }}"
            @if ($disabled) disabled @endif>
        <label class="form-check-label inline-block text-gray-800 @if ($disabled) opacity-50 @endif"
            for="{{ $bindto }}">
            {{ $label }}
        </label>
    </div>
</div>
