<div class="col-md-3">
    <label for="validationCustom04" class="form-label">Red Social</label>
    <select class="form-select" id="validationCustom04" name="network" value="{{ old('network', $socialNetwork->network ?? "") }}" >
     
     
  <option selected disabled value="">Elegir...</option>
    @foreach ($social_network as $red)
        <option value="{{ $red['nombre'] }}">{{ $red['nombre'] }}</option>
    @endforeach 
      

    </select>
    <div class="invalid-feedback">
      Por favor eliga una Red Social valida.
    </div>
  </div>

<div class="mb-3">
    <label for="url" class="form-label">Enlace al Perfil</label>
    <input type="url" class="form-control" id="url" name="url" value="{{ old('url', $socialNetwork->url ?? "") }}">
</div>  
