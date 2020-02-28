
@csrf
<div class="form-row">
    <div class="form-group col-md-3">
        <label for="">
            Nombre
        </label>
        <input class="form-control" id="name" name="name" type="text" value="{{ $coordinacion->name or old('name')}}">
        @if ($errors->has('name'))
            <p style="color:red">
                {{$errors->first('name')}}
            </p>
            @endif
            </input>
    </div>
    <div class="form-group col-md-3">
        <label for="">
            Slug
        </label>
        <input class="form-control" id="phone" name="slug" type="text" value="{{$coordinacion->slug or old('slug')}}">
        @if ($errors->has('slug'))
            <p style="color:red">
                {{$errors->first('slug')}}
            </p>
            @endif
            </input>
    </div>
    <div class="form-group col-md-3">
        <label for="">
            Telefono
        </label>
        <input class="form-control" id="phone" name="phone" type="text" value="{{$coordinacion->phone or old('phone')}}">
        @if ($errors->has('phone'))
            <p style="color:red">
                {{$errors->first('phone')}}
            </p>
            @endif
            </input>
    </div>
    <div class="form-group col-md-4">
        <label for="">Coordinador</label>
        <select class="form-control" id="inputState" name="user_id">
            <option disabled="" selected="">Elige un coordinador</option>
            @foreach ($users as $user)
                @foreach ($user->user as $role)
                <option value="{{ $role->id }}">
                   {{$role->profession}}. {{ $role->name }} {{$role->paterno}} {{$role->materno}}
                </option>
                    @endforeach
            @endforeach
        </select>@if ($errors->has('user_id'))
            <p style="color:red">
                {{$errors->first('user_id')}}
            </p>
        @endif
    </div>
</div>

<div class="form-group col-md-4">
    <label for="">Departamentos</label>
    @foreach($departments as $id=>$name)

        <ul class="list-group">
            <li class="list-group-item"><input class="form-check-input"
                                                 name="departments[]"
                                                 type="checkbox"
                                                 value="{{ $id }}"
                    {{ $coordinacion->departments->pluck('id')->contains($id) ? 'checked' : ''}}>
                <label class="form-check-label" for="defaultCheck1">
                    {{$name}}
                </label></li>
        </ul>
    @endforeach
    @if ($errors->has('departments'))
        <p style="color:red">
            {{$errors->first('departments')}}
        </p>
    @endif
</div>
