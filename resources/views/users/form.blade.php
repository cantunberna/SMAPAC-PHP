@csrf
<div class="form-row">
  <div class="form-group col-md-4">
    <label for="">Nombre(s)</label>
    <input type="text" name="name" class="form-control" id="code" value="{{ $user->name or old('name')}}">
    @if ($errors->has('name'))
    <p style="color:red">  {{$errors->first('name')}} </p>
   @endif
  </div>
  <div class="form-group col-md-4">
    <label for="">Apellido Paterno</label>
    <input type="text" name="paterno" class="form-control" id="name" value="{{old('paterno')}}">
  </div>
  <div class="form-group col-md-4">
    <label for="">Apellido Materno</label>
    <input type="text" name="materno" class="form-control" id="name" value="{{ old('materno')}}">
  </div>
</div>

<div class="form-row">
    <div class="form-group col-md-4">
      <label for="">CURP</label>
      <input type="text" name="curp" class="form-control" id="code" value="{{ old('curp')}}">

      {{-- @if ($errors->has('code'))
       <p style="color:red">  {{$errors->first('code')}} </p>
      @endif --}}
    </div>
    <div class="form-group col-md-4">
      <label for="">RFC</label>
      <input type="text" name="rfc" class="form-control" id="name" value="{{ old('rfc')}}">
    </div>
    <div class="form-group col-md-4">
        <label for="">Telefono</label>
        <input type="text" name="phone" class="form-control" id="name" value="{{ old('phone')}}">
      </div>
  </div>

<div class="form-row">
  <div class="form-group col-md-3">
    <label for="">Fecha de Nacimiento</label>
    <input type="date" name="birthday" class="form-control" id="amount" value="{{ old('birthday')}}">
  </div>

  <div class="form-group col-md-3">
    <label for="">Genero</label>
    <select id="inputState" name="gender" class="form-control">
      <option selected disabled>Elige una opción</option>
      <option>Masculino</option>
      <option>Femenino</option>
    </select>
  </div>
  <div class="form-group col-md-2">
    <label for="">Edad</label>
    <input type="text" name="age" class="form-control" id="inputCity" value="{{ old('age')}} ">
  </div>
    <div class="form-group col-md-2">
        <label for="">Profesion</label>
        <input type="text" name="profession" class="form-control" id="inputCity" value="{{ old('profession')}} ">
    </div>
  <div class="form-group col-md-4">
    <label for="">Correo</label>
    <input type="email" name="email" class="form-control" id="inputCity" value="{{ $user->email or old('email')}}">
    @if ($errors->has('email'))
         <p style="color:red">  {{$errors->first('email')}} </p>
        @endif
  </div>

  @unless($user->id)
  {{--  a menos que   --}}
    <div class="form-group col-md-4">
        <label for="">Contraseña</label>
        <input type="password" name="password" class="form-control" id="inputCity">
        @if ($errors->has('password'))
            <p style="color:red">  {{$errors->first('password')}} </p>
            @endif
    </div>
    <div class="form-group col-md-4">
        <label for="">Confirmar Contraseña</label>
        <input type="password" name="password_confirmation" class="form-control" id="inputCity" value="">
        @if ($errors->has('password_confirmation'))
            <p style="color:red">  {{$errors->first('password_confirmation')}} </p>
            @endif
    </div>
  @endunless

</div>

<div class="form-group">
  <label for="">Dirección</label>
  <textarea class="form-control" name="address" id="description">{{ old('direction')}}</textarea>
  {{-- @if ($errors->has('description'))
     <p style="color:red">  {{$errors->first('description')}} </p>
    @endif --}}
</div>

<div class="form-group">
    <label for="">Roles</label>

      @foreach ($roles as $id => $name)
        <input type="checkbox"
        name="roles[]"
        value="{{ $id  }}"
        {{ $user->roles->pluck('id')->contains($id) ? 'checked' : '' }}
        > {{ $name   }}
      @endforeach
      @if ($errors->has('roles'))
      <p style="color:red">  {{$errors->first('roles')}} </p>
     @endif

  </div>
