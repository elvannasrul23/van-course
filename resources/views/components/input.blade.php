@props(['label', 'name', 'type' => 'text', 'value' => '', 'required' => false, 'options' => []])

<div class="mb-3">
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    @if($type === 'select')
        <select name="{{ $name }}" class="form-select" id="{{ $name }}" {{ $required ? 'required' : '' }}>
            <option value="">-- Pilih {{ $label }} --</option>
            @foreach($options as $option)
                <option value="{{ $option->id }}" {{ (old($name, isset($value->id) ? $value->id : '') == $option->id) ? 'selected' : '' }}>
                    {{ $option->name }}
                </option>
            @endforeach
        </select>
    @elseif($type === 'textarea')
        <textarea name="{{ $name }}" class="form-control" id="{{ $name }}" rows="4" {{ $required ? 'required' : '' }}>{{ old($name, $value) }}</textarea>
    @elseif($type === 'file')
        <input type="file" name="{{ $name }}" class="form-control" id="{{ $name }}" accept="image/*" {{ $required ? 'required' : '' }}>
    @else
        <input type="{{ $type }}" name="{{ $name }}" class="form-control" id="{{ $name }}" value="{{ old($name, $value) }}" {{ $required ? 'required' : '' }}>
    @endif
</div>
