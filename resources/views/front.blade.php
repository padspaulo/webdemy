@extends('layouts.app')

@section('content')

    <div class="container">
        <section>
            <div>
                <b-jumbotron header="Desprogramar" lead="Aprenda passo a passo em cada curso e desenvolva os seus conhecimentos." style="text-align: center;">
                <figure>
                    <img src="assets/img/tic.jpg" alt="Minha Figura">
                </figure>
                    <p>Para mais informação visite o site</p>
                    <b-button variant="primary" href="{{route('series.index')}}">Procurar cursos</b-button>
                </b-jumbotron>
            </div>
        </section>

        <section class="mb-5">
            <div>
                <h3 class="mb-3 text-center">Cursos Disponíveis</h3>

                <b-card-group deck>
                    @foreach($featuredSeries as $series)
                        <b-card class="text-center" title="{{$series->title}}" img-src="{{asset('storage/'.$series->image)}}" img-alt="Image" img-top>
                            <b-card-text>
                                @php $excerpt = \Str::words($series->description, 10) @endphp

                                {!! $excerpt !!}
                            </b-card-text>
                            <template v-slot:footer>
                                <b-button  href="{{route('series.show', $series)}}" variant="primary">Play</b-button>
                            </template>
                        </b-card>
                    @endforeach
                    </b-card-group>
            </div>
        </section>

        <section>
            <h3 class="mb-3 text-center">Escolhe o plano que melhor se adapta as tuas necessidades</h3>

            <pricing></pricing>

        </section>




    </div>


@endsection