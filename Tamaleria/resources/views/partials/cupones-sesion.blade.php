<main class="main-c">
    {{-- Mensajes arriba del contenido --}}
    @if(session('success'))
        <div class="alert alert-success" style="text-align:center; font-size:1.2rem; margin: 1rem auto; max-width:600px;">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger" style="text-align:center; font-size:1.2rem; margin: 1rem auto; max-width:600px;">
            {{ session('error') }}
        </div>
    @endif

    <article class="article-c">
        @foreach($cupones as $cupon)
            @php
                $hoy = now();
                $activo = $cupon->estatus === 'activo';
                $vigente = $cupon->fecha_inicio <= $hoy && $cupon->fecha_expiracion >= $hoy;
                $disponible = $cupon->stock > 0;
            
                // Evaluamos si hay alguna orden que todavía se puede canjear
                $ordenesDisponibles = $cupon->ordenes->filter(function ($orden) use ($cupon) {
                    return !\App\Models\ContadorCupon::where('usuario_id', session('usuario_id'))
                        ->where('cupon_id', $cupon->cupon_id)
                        ->where('orden_id', $orden->orden_id)
                        ->exists();
                });
            
                // Si NO hay órdenes disponibles, ya lo canjeó completamente
                $cuponYaCanjeadoTotalmente = $ordenesDisponibles->isEmpty();
            @endphp
            
            @if(!$cuponYaCanjeadoTotalmente)
                @php
                    $canjear = $activo && $vigente && $disponible;
                @endphp

                <section class="section-c special-c">
                    <div class="container-c">
                        {{-- Banner con información visible --}}
                        <div class="special-banner-c" style="
                            background-image: url('{{ asset('storage/' . $cupon->imagen) }}');
                            filter: {{ $canjear ? 'none' : 'grayscale(100%)' }};
                            position: relative;">

                            <div style="
                                background-color: rgba(0, 0, 0, 0.5);
                                color: white;
                                padding: 1rem;
                                position: absolute;
                                top: 0;
                                left: 0;
                                right: 0;
                                text-align: center;
                                font-size: 1.2rem;">
                                Código: <strong>{{ $cupon->codigo }}</strong> <br>
                                Stock: {{ $cupon->stock }} disponibles <br>
                                Estatus: {{ ucfirst($cupon->estatus) }} <br>
                                Vigencia: {{ \Carbon\Carbon::parse($cupon->fecha_inicio)->format('d/m/Y') }}
                                -
                                {{ \Carbon\Carbon::parse($cupon->fecha_expiracion)->format('d/m/Y') }}
                            </div>
                        </div>

                        {{-- Detalle del cupón y órdenes --}}
                        <div class="special-product-c">
                            <h2 class="h2-c section-title-c">
                                <span class="text-c">{{ $cupon->tipoCupon->descripcion }}</span>
                                <span class="line-c"></span>
                            </h2>

                            <ul class="has-scrollbar-c product-list-c">
                                @forelse($cupon->ordenes as $orden)
                            
                                    @php
                                        $hoy = now();
                                        $activo = $cupon->estatus === 'activo';
                                        $vigente = $cupon->fecha_inicio <= $hoy && $cupon->fecha_expiracion >= $hoy;
                                        $disponible = $cupon->stock > 0;
                            
                                        $yaCanjeado = \App\Models\ContadorCupon::where('usuario_id', session('usuario_id'))
                                            ->where('cupon_id', $cupon->cupon_id)
                                            ->where('orden_id', $orden->orden_id)
                                            ->exists();                        
                                        $mostrarCupon = $activo && $vigente && $disponible && !$yaCanjeado;
                                    @endphp

                                    @if($mostrarCupon)
                                        <li class="product-item-c">
                                            <div class="product-card-c" tabindex="0">
                                                <figure class="card-banner-c">
                                                    <img src="{{ asset('storage/' . $orden->imagen) }}" width="312" height="350" class="image-contain-c">
                                                
                                                    <ul class="card-action-list-c">
                                                        <li class="card-action-item-c">
                                                            <form action="{{ route('cupon.canjear') }}" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="cupon_id" value="{{ $cupon->cupon_id }}">
                                                                <input type="hidden" name="tipo_cupon_id" value="{{ $cupon->tipo_cupon_id }}">
                                                                <input type="hidden" name="total_orden" value="{{ $orden->total_orden }}">
                                                                <input type="hidden" name="orden_id" value="{{ $orden->orden_id }}">
                                                            
                                                                <button type="submit" class="card-action-btn-c">
                                                                    <ion-icon name="checkmark-done-outline"></ion-icon>
                                                                </button>
                                                                <div class="card-action-tooltip-c">Canjear ahora</div>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </figure>
                                            
                                                <div class="card-content-c">
                                                    <p class="card-cat-c">Este pedido aplica para canje del cupón.</p>
                                                    <p style="margin: 0.3rem 0; font-style: italic; font-weight: bold;">{{ $orden->descripcion }}</p>
                                                    <h3 class="h3-c card-title-c">
                                                        <a href="#">Total: ${{ number_format($orden->total_orden, 2) }}</a>
                                                        @if(session('nuevo_total') && (int)session('orden_canjeada') === (int)$orden->orden_id)
                                                            <br><small>Con cupón: ${{ session('nuevo_total') }}</small>
                                                        @endif
                                                    </h3>
                                                </div>
                                            </div>
                                        </li>
                                    @endif
                                @empty
                                    <p>No hay órdenes asociadas a este cupón.</p>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </section>
            
            @endif
        @endforeach
    </article>
</main>
