@props(['name' => '', 'type' => 'text', 'placeholder' => '', 'id' => '', 'value' => '', 'label' => false])

<div class="form-group mt-2 mb-2">
    @if ($label)
        <label for="">{{ $label }}</label>
    @endif
    <input type="{{ $type }}" name="{{ $name }}" value="{{ old($name, $value) }}" id="{{ $name }}"
        placeholder="{{ $placeholder }}"
        {{ $attributes->class(['form-control mt-1', 'is-invalid' => $errors->has($name)]) }}>
    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
