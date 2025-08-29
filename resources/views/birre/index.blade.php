@extends('layouts.app')
@section('title', 'Birre')

@section('content')

<!-- Hero Image Full Width -->
<div class="birra-hero-section d-flex align-items-center justify-content-center w-100">
    <h2 class="display-3 text-center hero-birre-title">Scopri le nostre birre artigianali</h2>
</div>

<div class="birre-page container py-5">
    <!-- Titolo "Le nostre birre" -->
    <div class="row justify-content-center mb-4">
        <div class="col-md-8 text-center">
            <h2 class="display-5 fw-bold section-title-bottiglie">Le birre</h2>
        </div>
    </div>

<div class="d-flex flex-row overflow-auto px-5 bottiglie-carousel" style="gap: 100px;">

        <!-- Egeria -->
        <div class="birra-col d-flex align-items-start transition-gap"
            onmouseenter="this.classList.add('expanded')" onmouseleave="this.classList.remove('expanded')">
            <img src="{{ asset(path: 'img/birre/egeria.png') }}" class="birra-img me-4" alt="Egeria">
            <div class="birra-info">
                <h5 class="fw-bold text-uppercase">{{ $egeria->nome }}</h5>
                <p class="text-uppercase text-muted mb-1">{{ $egeria->tipo }}</p>
                <p class="fw-semibold mb-2">
                    <strong>Alc.</strong> {{ $egeria->gradazione }}% |
                    <strong>IBU:</strong> {{ $egeria->ibu }} |
                    <strong>EBC:</strong> {{ $egeria->ebc }}
                </p>
                <p class="birra-desc">{{ $egeria->descrizione }}</p>
            </div>
        </div>

        <!-- Mithra -->
        <div class="birra-col d-flex align-items-start transition-gap"
            onmouseenter="this.classList.add('expanded')" onmouseleave="this.classList.remove('expanded')">
            <img src="{{ asset(path: 'img/birre/mithra.png') }}" class="birra-img me-4" alt="Mithra">
            <div class="birra-info">
                <h5 class="fw-bold text-uppercase">{{ $mithra->nome }}</h5>
                <p class="text-uppercase text-muted mb-1">{{ $mithra->tipo }}</p>
                <p class="fw-semibold mb-2">
                    <strong>Alc.</strong> {{ $mithra->gradazione }}% |
                    <strong>IBU:</strong> {{ $mithra->ibu }} |
                    <strong>EBC:</strong> {{ $mithra->ebc }}
                </p>
                <p class="birra-desc">{{ $mithra->descrizione }}</p>
            </div>
        </div>

        <!-- Maya -->
        <div class="birra-col d-flex align-items-start transition-gap"
            onmouseenter="this.classList.add('expanded')" onmouseleave="this.classList.remove('expanded')">
            <img src="{{ asset(path: 'img/birre/maya.png') }}" class="birra-img me-4" alt="Maya">
            <div class="birra-info">
                <h5 class="fw-bold text-uppercase">{{ $maya->nome }}</h5>
                <p class="text-uppercase text-muted mb-1">{{ $maya->tipo }}</p>
                <p class="fw-semibold mb-2">
                    <strong>Alc.</strong> {{ $maya->gradazione }}% |
                    <strong>IBU:</strong> {{ $maya->ibu }} |
                    <strong>EBC:</strong> {{ $maya->ebc }}
                </p>
                <p class="birra-desc">{{ $maya->descrizione }}</p>
            </div>
        </div>

        <div class="birra-col d-flex align-items-start transition-gap"
            onmouseenter="this.classList.add('expanded')" onmouseleave="this.classList.remove('expanded')">
            <img src="{{ asset(path: 'img/birre/apache.png') }}" class="birra-img me-4" alt="Apache">
            <div class="birra-info">
                <h5 class="fw-bold text-uppercase">{{ $apache->nome }}</h5>
                <p class="text-uppercase text-muted mb-1">{{ $apache->tipo }}</p>
                <p class="fw-semibold mb-2">
                    <strong>Alc.</strong> {{ $apache->gradazione }}% |
                    <strong>IBU:</strong> {{ $apache->ibu }} |
                    <strong>EBC:</strong> {{ $apache->ebc }}
                </p>
                <p class="birra-desc">{{ $apache->descrizione }}</p>
            </div>
        </div>

        <div class="birra-col d-flex align-items-start transition-gap"
            onmouseenter="this.classList.add('expanded')" onmouseleave="this.classList.remove('expanded')">
            <img src="{{ asset(path: 'img/birre/avus.png') }}" class="birra-img me-4" alt="Avus">
            <div class="birra-info">
                <h5 class="fw-bold text-uppercase">{{ $avus->nome }}</h5>
                <p class="text-uppercase text-muted mb-1">{{ $avus->tipo }}</p>
                <p class="fw-semibold mb-2">
                    <strong>Alc.</strong> {{ $avus->gradazione }}% |
                    <strong>IBU:</strong> {{ $avus->ibu }} |
                    <strong>EBC:</strong> {{ $avus->ebc }}
                </p>
                <p class="birra-desc">{{ $avus->descrizione }}</p>
            </div>
        </div>

        <div class="birra-col d-flex align-items-start transition-gap"
            onmouseenter="this.classList.add('expanded')" onmouseleave="this.classList.remove('expanded')">
            <img src="{{ asset(path: 'img/birre/64dc.png') }}" class="birra-img me-4" alt="64dc">
            <div class="birra-info">
                <h5 class="fw-bold text-uppercase">{{ $sessantaquattrodc->nome }}</h5>
                <p class="text-uppercase text-muted mb-1">{{ $sessantaquattrodc->tipo }}</p>
                <p class="fw-semibold mb-2">
                    <strong>Alc.</strong> {{ $sessantaquattrodc->gradazione }}% |
                    <strong>IBU:</strong> {{ $sessantaquattrodc->ibu }} |
                    <strong>EBC:</strong> {{ $sessantaquattrodc->ebc }}
                </p>
                <p class="birra-desc">{{ $sessantaquattrodc->descrizione }}</p>
            </div>
        </div>

        <div class="birra-col d-flex align-items-start transition-gap"
            onmouseenter="this.classList.add('expanded')" onmouseleave="this.classList.remove('expanded')">
            <img src="{{ asset(path: 'img/birre/alemonia.png') }}" class="birra-img me-4" alt="Alemonia">
            <div class="birra-info">
                <h5 class="fw-bold text-uppercase">{{ $alemonia->nome }}</h5>
                <p class="text-uppercase text-muted mb-1">{{ $alemonia->tipo }}</p>
                <p class="fw-semibold mb-2">
                    <strong>Alc.</strong> {{ $alemonia->gradazione }}% |
                    <strong>IBU:</strong> {{ $alemonia->ibu }} |
                    <strong>EBC:</strong> {{ $alemonia->ebc }}
                </p>
                <p class="birra-desc">{{ $alemonia->descrizione }}</p>
            </div>
        </div>

        <div class="birra-col d-flex align-items-start transition-gap"
            onmouseenter="this.classList.add('expanded')" onmouseleave="this.classList.remove('expanded')">
            <img src="{{ asset(path: 'img/birre/malmostosa.png') }}" class="birra-img me-4" alt="Malmostosa">
            <div class="birra-info">
                <h5 class="fw-bold text-uppercase">{{ $malmostosa->nome }}</h5>
                <p class="text-uppercase text-muted mb-1">{{ $malmostosa->tipo }}</p>
                <p class="fw-semibold mb-2">
                    <strong>Alc.</strong> {{ $malmostosa->gradazione }}% |
                    <strong>IBU:</strong> {{ $malmostosa->ibu }} |
                    <strong>EBC:</strong> {{ $malmostosa->ebc }}
                </p>
                <p class="birra-desc">{{ $malmostosa->descrizione }}</p>
            </div>
        </div>

        <div class="birra-col d-flex align-items-start transition-gap"
            onmouseenter="this.classList.add('expanded')" onmouseleave="this.classList.remove('expanded')">
            <img src="{{ asset(path: 'img/birre/chetipa.png') }}" class="birra-img me-4" alt="CheTipa">
            <div class="birra-info">
                <h5 class="fw-bold text-uppercase">{{ $chetipa->nome }}</h5>
                <p class="text-uppercase text-muted mb-1">{{ $chetipa->tipo }}</p>
                <p class="fw-semibold mb-2">
                    <strong>Alc.</strong> {{ $chetipa->gradazione }}% |
                    <strong>IBU:</strong> {{ $chetipa->ibu }} |
                    <strong>EBC:</strong> {{ $chetipa->ebc }}
                </p>
                <p class="birra-desc">{{ $chetipa->descrizione }}</p>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mb-4 mt-5">
    <div class="col-md-8 text-center">
        <h2 class="display-5 fw-bold section-title-lattine">Le lattine</h2>
    </div>
</div>

<div class="d-flex flex-row overflow-auto px-5 lattine-carousel" style="gap: 100px;">

    <!-- Lattina 1 -->
    <div class="birra-col d-flex align-items-start transition-gap"
        onmouseenter="this.classList.add('expanded')" onmouseleave="this.classList.remove('expanded')">
        <img src="{{ asset('img/birre/lattina_egeria.png') }}" class="birra-img lattina-img me-4" alt="Lattina Egeria">
        <div class="birra-info">
            <h5 class="fw-bold text-uppercase">{{ $egeria->nome }}</h5>
            <p class="text-uppercase text-muted mb-1">{{ $egeria->tipo }}</p>
            <p class="fw-semibold mb-2">
                <strong>Alc.</strong> {{ $egeria->gradazione }}% |
                <strong>IBU:</strong> {{ $egeria->ibu }} |
                <strong>EBC:</strong> {{ $egeria->ebc }}
            </p>
            <p class="birra-desc">{{ $egeria->descrizione }}</p>
        </div>
    </div>

    <!-- Lattina 2 -->
    <div class="birra-col d-flex align-items-start transition-gap"
        onmouseenter="this.classList.add('expanded')" onmouseleave="this.classList.remove('expanded')">
        <img src="{{ asset('img/birre/lattina_chetipa.png') }}" class="birra-img lattina-img me-4" alt="Lattina Chetipa">
        <div class="birra-info">
            <h5 class="fw-bold text-uppercase">{{ $chetipa->nome }}</h5>
            <p class="text-uppercase text-muted mb-1">{{ $chetipa->tipo }}</p>
            <p class="fw-semibold mb-2">
                <strong>Alc.</strong> {{ $chetipa->gradazione }}% |
                <strong>IBU:</strong> {{ $chetipa->ibu }} |
                <strong>EBC:</strong> {{ $chetipa->ebc }}
            </p>
            <p class="birra-desc">{{ $chetipa->descrizione }}</p>
        </div>
    </div>

    <!-- Lattina 3 -->
    <div class="birra-col d-flex align-items-start transition-gap"
        onmouseenter="this.classList.add('expanded')" onmouseleave="this.classList.remove('expanded')">
        <img src="{{ asset('img/birre/lattina_malmostosa.png') }}" class="birra-img lattina-img me-4" alt="Lattina Malmostosa">
        <div class="birra-info">
            <h5 class="fw-bold text-uppercase">{{ $malmostosa->nome }}</h5>
            <p class="text-uppercase text-muted mb-1">{{ $malmostosa->tipo }}</p>
            <p class="fw-semibold mb-2">
                <strong>Alc.</strong> {{ $malmostosa->gradazione }}% |
                <strong>IBU:</strong> {{ $malmostosa->ibu }} |
                <strong>EBC:</strong> {{ $malmostosa->ebc }}
            </p>
            <p class="birra-desc">{{ $malmostosa->descrizione }}</p>
        </div>
    </div>

    <div class="birra-col d-flex align-items-start transition-gap"
        onmouseenter="this.classList.add('expanded')" onmouseleave="this.classList.remove('expanded')">
        <img src="{{ asset('img/birre/lattina_apache.png') }}" class="birra-img lattina-img me-4" alt="Lattina Apache">
        <div class="birra-info">
            <h5 class="fw-bold text-uppercase">{{ $apache->nome }}</h5>
            <p class="text-uppercase text-muted mb-1">{{ $apache->tipo }}</p>
            <p class="fw-semibold mb-2">
                <strong>Alc.</strong> {{ $apache->gradazione }}% |
                <strong>IBU:</strong> {{ $apache->ibu }} |
                <strong>EBC:</strong> {{ $apache->ebc }}
            </p>
            <p class="birra-desc">{{ $apache->descrizione }}</p>
        </div>
    </div>

</div>

</section>

@endsection
