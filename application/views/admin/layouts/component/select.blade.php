<div class="form-group row">
    <label class="offset-1 col-2 col-form-label">{{ $data['label'] }}</label>
    <div class="col-8">
        <select class="form-control selectlist2 {{$data['class'] ??'' }}" id='{{$data['id'] ?? ''}}' name="{{$data['name'] ?? ''}}">
            {!! $data['option'] !!}
        </select>
    </div>
</div>

