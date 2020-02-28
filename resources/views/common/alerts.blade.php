{{-- alerta para actualizar --}}
@if(session('status'))
  <div class="alert alert-primary" id="alert">
    {{ session('status') }}
  </div>
@endif

{{-- alerta para eliminar --}}
@if(session('message'))
  <div class="alert alert-danger" id="alert">
    {{ session('message') }}
  </div>
@endif

{{-- alerta para agregar --}}
@if(session('success'))
  <div class="alert alert-success" id="alert">
    {{ session('success') }}
  </div>
@endif