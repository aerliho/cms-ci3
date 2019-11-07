<div class="form-group row">
    <label class="offset-1 col-2 col-form-label">{{ $data['label'] }}</label>
    <div class="col-8">
        <textarea 
        class="my_ckeditor"
        name="{{$data['name'] ?? ''}}" 
        id="{{$data['id'] ?? $data['name']}}"

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
        {!! isset($data['value']) ?$data['value']: '' !!}
        </textarea>
    </div>
</div>