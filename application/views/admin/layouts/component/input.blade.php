<div class="form-group row">
    <label for="example-text-input" class="offset-1 col-2 col-form-label">{{ $data['label'] }}</label>
    <div class="col-8">
        @empty ($data['static_input'])
             <input 
                name="{{ $data['name'] }}"
                value="{{ isset($data['value']) ? $data['value'] : ''}}"
                type="{{ isset($data['type']) ? $data['type']  : 'text'}}"
                id="{{ isset($data['id']) ? $data['id'] : $data['name'] }}"
                class="form-control {{ isset($data['class']) ? $data['class'] : '' }}"
                placeholder="{{ isset($data['placeholder']) ? $data['placeholder'] : '' }}"

                @isset($data['readonly'])
                    readonly
                @endisset

                @isset($data['disabled'])
                    disabled="disabled"
                @endisset

                @isset($data['required'])
                    required
                @endisset
            >
        @endempty
        
        @isset($data['note'])
            <span class="form-text text-muted">{{$data['note']}}</span>
        @endisset

    </div>
</div>
