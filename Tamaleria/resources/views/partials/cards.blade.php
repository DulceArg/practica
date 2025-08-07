@if ($usuarios->count() > 0)
    <ul class="product-list-c">
        @foreach ($usuarios as $usuario)
            <li class="product-item-c">
                <div class="product-card-c" tabindex="0">
                    <figure class="card-banner-c">
                        <img src="{{ asset('media/Imagenes/persona.png') }}" width="312" height="350" class="image-contain-c">

                        <ul class="card-action-list-c">
                            <li class="card-action-item-c">
                                <a href="{{ route('usuarios.edit', $usuario) }}">
                                    <button class="card-action-btn-c" aria-labelledby="edit">
                                        <ion-icon name="create-outline"></ion-icon>
                                    </button>
                                    <div class="card-action-tooltip-c" id="edit">Editar</div>
                                </a>
                            </li>
                            <li class="card-action-item-c">
                                <form action="{{ route('usuarios.destroy', $usuario) }}" method="POST" onsubmit="return confirm('¿Deseas eliminar este usuario?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="card-action-btn-c" aria-labelledby="delete">
                                        <ion-icon name="trash-outline"></ion-icon>
                                    </button>
                                    <div class="card-action-tooltip-c" id="delete">Eliminar</div>
                                </form>
                            </li>
                            <li class="card-action-item-c">
                                <a href="{{ route('usuarios.show', $usuario) }}">
                                    <button class="card-action-btn-c" aria-labelledby="view">
                                        <ion-icon name="eye-outline"></ion-icon>
                                    </button>
                                    <div class="card-action-tooltip-c" id="view">Ver más</div>
                                </a>
                            </li>
                        </ul>
                    </figure>

                    <div class="card-content-c">
                        <div class="card-cat-c">
                            <a href="#" class="card-cat-link-c">{{ $usuario->telefono }}</a>
                        </div>
                        <h3 class="h3-c card-title-c">
                            <a href="#">{{ $usuario->nombre_usuario }} {{ $usuario->apellido_paterno_usuario }} {{ $usuario->apellido_materno_usuario }}</a>
                        </h3>
                        <data value="100" class="card-price-c">{{ $usuario->correo_electronico }}</data>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
@else
    <p>No hay usuarios registrados.</p>
@endif
