<main class="main-c">
    <article class="article-c">
        @foreach($cupones as $cupon)
            <section class="section-c special-c">
                <div class="container-c">
                    <div class="special-banner-c" style="background-image: url('{{ asset('storage/' . $cupon->imagen) }}');">
                        <h2 class="h3-c banner-title-c">
                            {{ $cupon->codigo }}<br>
                            <small style="font-size: 0.8em;">{{ $cupon->stock }} disponibles</small>
                        </h2>
                    </div>

                    <div class="special-product-c">
                        <h2 class="h2-c section-title-c">
                            <span class="text-c">{{ $cupon->tipoCupon->descripcion }}</span>
                            <span class="line-c"></span>
                        </h2>
                        <ul class="has-scrollbar-c product-list-c">
                            @forelse($cupon->ordenes as $orden)
                                <li class="product-item-c">
                                    <div class="product-card-c" tabindex="0">
                                        <figure class="card-banner-c">
                                            <img src="{{ asset('storage/' . $orden->imagen) }}" width="312" height="350" class="image-contain-c">

                                            <ul class="card-action-list-c">
                                                <li class="card-action-item-c">
                                                    {{-- Botón funcional para canjear --}}
                                                    <form action="{{ route('cupon.canjear') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="cupon_id" value="{{ $cupon->cupon_id }}">
                                                        <input type="hidden" name="tipo_cupon_id" value="{{ $cupon->tipo_cupon_id }}">
                                                        <input type="hidden" name="total_orden" value="{{ $orden->total_orden }}">

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
                                            <h3 class="h3-c card-title-c">
                                                <a href="#">Total: ${{ number_format($orden->total_orden, 2) }}</a>
                                                @if(session('nuevo_total'))
                                                    <br><small>Con cupón: ${{ session('nuevo_total') }}</small>
                                                @endif
                                            </h3>
                                        </div>
                                    </div>
                                </li>
                            @empty
                                <p>No hay órdenes asociadas a este cupón.</p>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </section>
        @endforeach
    </article>
</main>

@if(session('success'))
    <div class="alert alert-success" style="text-align:center; margin-top: 1rem;">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger" style="text-align:center; margin-top: 1rem;">
        {{ session('error') }}
    </div>
@endif
