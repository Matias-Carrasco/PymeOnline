APARECE LUEGO CTM
@extends('adminlte::page')
APARECE LUEGO CTM
@section('content')

<div class="bg-gray-50 py-16-px-4 sm_grid sm_grid-cels-12">
    <div class="sm:col-start-4 sm:col-span-6">
    
    <h2 class="mt-6 text-4xl leading-10 tracking-tight font-bold text-gray-900 text-center"> Preguntas</h2>
    <div>
        <form action="/pregunta/{{ $publicacion_id }}/" method="POST" class="mb-0">
            @csrf
            <label for="pregunta_id" class="tm-6 text-sm font-medium text-gray-700">Pregunta</label>
            <textarea name="pregunta_texto" class="mt-1 py-2 px-3 block w-full borded border-gray-400 shadow-sm" required></textarea>
            <button type="submit" class="mt-6 py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo"></button>
        </form>
    </div>
    </div>
</div>