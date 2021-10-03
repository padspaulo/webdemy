@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <span style="font-size:25px">Login iniciado</span><br><br>
                    <a href="{{ route('front') }}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Seguir para cursos</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
