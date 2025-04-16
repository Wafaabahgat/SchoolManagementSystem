@props(['name' => '', 'options' => [], 'label' => false, 'selected' => null])

<div class="form-group mb-3">
    @if ($label)
        <label>{{ $label }}</label>
    @endif
    <select name="{{ $name }}" {{ $attributes->class(['form-control', 'is-invalid' => $errors->has($name)]) }}>
        @foreach ($options as $value => $text)
            <option value="{{ $value }}" @selected(old($name, $selected) == $value)>
                {{ $text }}
            </option>
        @endforeach
    </select>
    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

{{-- <x-form.validation-feedback :name="$name" /> --}}
