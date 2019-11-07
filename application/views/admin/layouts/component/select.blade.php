<div class="form-group row">
    <label class="offset-1 col-2 col-form-label">{{ $data['label'] }}</label>
    <div class="col-8">
        <select 
        name="{{$data['name'] }}"
        id="{{ isset($data['id']) ? $data['id'] : $data['name'] }}"
        class="form-control my_select {{ isset($data['class']) ? $data['class'] : '' }}"        

        @isset($data['readonly'])
            readonly
        @endisset

        @isset($data['required'])
            required
        @endisset
        
        @isset($data['disabled'])
            disabled="disabled"
        @endisset
        >
            {!! $data['option'] ?? '' !!}
        </select>
    </div>
</div>

