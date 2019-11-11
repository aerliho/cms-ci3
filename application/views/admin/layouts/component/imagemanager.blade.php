<div class="form-group row">
    <label for="example-text-input" class="offset-1 col-2 col-form-label">{{ $data['label'] }}</label>
    <div class="col-8">
        <div class="kt-panel">
            <input type="text" id="diff_{{$data['name']}}" value="" class="kt-hide">
            
        <input 
            type="text" 
            name="{{$data['name']}}" 
            class="my_imagemanager kt-hide" 
            id="{{$data['name']}}" 
            value="@isset($data['value']){{$data['value']}}@endisset"
            >
            <a class="btn btn-label-brand btn-bold btn-sm dz-clickable kt_hidden-input" id="{{'btn_'.$data['name']}}">Choose Image</a>
        </div>
        <div class="kt-widget4 kt-panel kt-margin-t-20 kt-margin-b-20" id="list_{{$data['name']}}">
        </div>
        @isset($data['note'])
            <span class="form-text text-muted">{{$data['note']}}</span>
        @endisset
    </div>
</div>