<div class="form-group row">
    <label for="example-text-input" class="offset-1 col-2 col-form-label">{{ $data['label'] }}</label>
    {{-- <div class="col-8">
        <div class="kt-uppy" id="my_upload">
            <a class="btn btn-label-brand btn-bold btn-sm dz-clickable">Attach files</a>
        </div>
        @isset($data['note'])
            <span class="form-text text-muted">{{$data['note']}}</span>
        @endisset
        <input type="file" name="my_upload" class="kt-hide" id="my_upload">

    </div> --}}

    <div class="col-8">
        <div class="kt-panel">
            <a class="btn btn-label-brand btn-bold btn-sm dz-clickable kt_hidden-input">Attach files</a>


        </div>
        <div class="kt-widget4 kt-panel kt-margin-t-20 kt-margin-b-20">
            <div class="kt-widget4__item">
                <div class="kt-widget4__pic kt-widget4__pic--icon">
                    <img src="https://keenthemes.com/metronic/themes/metronic/theme/default/demo1/dist/assets/media/files/doc.svg" alt="">
                </div>
                <a href="#" class="kt-widget4__title">
                    Metronic Documentation<b> (12181 kb)</b>
                </a>
                <div class="kt-widget4__tools">
                    <a href="#" class="btn btn-clean btn-icon btn-sm">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
        </div>
        <span class="form-text text-muted">Max file size is 1MB and max number of files is 5.</span>
    </div>
</div>
