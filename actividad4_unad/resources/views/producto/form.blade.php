<h2>{{ $modo }} Producto</h2>
@if(count($errors)>0)
    <div class="alert alert-danger alert-dismissible">
        <ul>
            @foreach( $errors->all() as $error )
                <li>
                    {{ $error }}
                </li>
            @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
        </button>
    </div>  
@endif
<div class="form-group">
    <label for="codifo">Código</label>
    <input type="text" name="codigo" id="codigo" 
        value="{{isset( $producto->codigo )?$producto->codigo:old('codigo') }}" class="form-control" require>
</div>
<div class="form-group">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" id="nombre"
        value="{{ isset($producto->nombre)?$producto->nombre:old('nombre') }}" class="form-control">
</div>
<div class="form-group">
    <label for="marco">Marca</label>
    <input type="text" name="marca" id="marca" 
        value="{{ isset($producto->marca )?$producto->marca:old('marca') }}" class="form-control">    
</div>
<div class="form-group">
    <label for="precioCompra">Precio Compra</label>
    <input type="text" name="precio_compra" id="precio_compra" 
        value="{{ isset($producto->precio_compra)?$producto->precio_compra:old('precio_compra') }}" class="form-control">
</div>
<div class="form-group">
    <label for="cantidadCompra">Cantidad Compra</label>
    <input type="text" name="cantidad_compra" id="cantidad_compra" 
        value="{{ isset($producto->cantidad_compra)?$producto->cantidad_compra:old('cantidad_compra') }}" class="form-control">
</div>

<input type="submit" id="guardar" value="{{$modo}} producto" class="btn btn-success">
<a href="{{ url('producto/') }}" class="btn btn-primary">Regresar</a>
<br>