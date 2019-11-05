<div class="form-group row">
    <label for="example-text-input" class="offset-1 col-2 col-form-label">{{ $data['label'] }}</label>
    <div class="col-8">
        @empty ($data['static_input'])
             <input 
                {{-- begin::type --}}
                @isset($data['type'])
                    type="{{ $data['type'] }}"
                @endisset

                @empty($data['type'])
                    type="text"        
                @endempty
                {{-- end::type --}}
                
                {{-- begin::name --}}
                @isset($data['name'])
                    name="{{ $data['name'] }}"
                @endisset
                {{-- end::name --}}
                
                {{-- begin::class --}}
                @isset($data['class'])
                    class="form-control {{ $data['class'] }}"
                @endisset

                @empty($data['class'])
                    class="form-control"        
                @endempty
                    {{-- end::class --}}
                
                {{-- begin::id --}}
                @isset($data['id'])
                    id="{{ $data['id'] }}"
                @endisset

                @empty($data['id'])
                    id="{{ $data['name'] }}"        
                @endempty
                {{-- end::id --}}

                {{-- begin::placeholder --}}                    
                @isset($data['placeholder'])
                    placeholder="{{ $data['placeholder'] }}"
                @endisset

                {{-- end::placeholder --}}

                {{-- begin::value --}}
                @isset($data['value'])
                    value="{{ $data['value'] }}"
                @endisset

                @empty($data['value'])
                    value=""        
                @endempty
                {{-- end::placeholder --}}

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
