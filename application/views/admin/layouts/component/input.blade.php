
<div class="form-group row">
    <label for="example-text-input" class="offset-1 col-2 col-form-label">{{ $input['label'] }}</label>
    <div class="col-8">
        @empty ($input['static_input'])
             <input 
                {{-- begin::type --}}
                @isset($input['type'])
                    type="{{ $input['type'] }}"
                @endisset

                @empty($input['type'])
                    type="text"        
                @endempty
                {{-- end::type --}}
                
                {{-- begin::name --}}
                @isset($input['name'])
                    name="{{ $input['name'] }}"
                @endisset
                {{-- end::name --}}
                
                {{-- begin::class --}}
                @isset($input['class'])
                    class="form-control {{ $input['class'] }}"
                @endisset

                @empty($input['class'])
                    class="form-control"        
                @endempty
                    {{-- end::class --}}
                
                {{-- begin::id --}}
                @isset($input['id'])
                    id="{{ $input['id'] }}"
                @endisset

                @empty($input['id'])
                    id="{{ $input['name'] }}"        
                @endempty
                {{-- end::id --}}

                {{-- begin::placeholder --}}                    
                @isset($input['placeholder'])
                    placeholder="{{ $input['placeholder'] }}"
                @endisset

                {{-- end::placeholder --}}

                {{-- begin::value --}}
                @isset($input['value'])
                    value="{{ $input['value'] }}"
                @endisset

                @empty($input['value'])
                    value=""        
                @endempty
                {{-- end::placeholder --}}

                @isset($input['readonly'])
                    readonly
                @endisset

                @isset($input['disabled'])
                    disabled="disabled"
                @endisset

                @isset($input['required'])
                    required
                @endisset

            >
        @endempty
        
        @isset($input['note'])
            <span class="form-text text-muted">{{$input['note']}}</span>
        @endisset

    </div>
</div>
