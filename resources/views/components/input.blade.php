@php
 $id = isset($id)?$id:$name;
 $type = isset($type)?$type:'text';
@endphp
<div class="form-group">
        <label class="label-control" for="{{$id}}">{{$label}}</label>
        <input type="{{$type}}"
               class="form-control   {{$errors->has($name)?'is-invalid':''}}"
               name="{{$name}}"
               id="{{$id}}"
               value="{{old($name,'')}}"
               >

                @if ($errors->has($name))
                    <div class="invalid-feedback">
                            {{$errors->first($name)}}
                    </div>
                @endif

               @isset($help)
                <small class="form-text text-muted">
                    {{$help}}
                </small>
               @endisset
</div>
