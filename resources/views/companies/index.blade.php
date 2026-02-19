@extends('layouts.app')

@section('content')
<div class="p-4 lg:p-8 max-w-[1400px] mx-auto w-full">

    {{-- Contenedor de Alertas (Inyectado por JS) --}}
    <div id="alert-container"></div>

    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-8">
        <div>
            <h2 class="text-2xl lg:text-3xl font-black text-white tracking-tight">Gestión de Compañías</h2>
            <p class="text-slate-400 mt-1 text-sm lg:text-base">Administra las empresas del sistema</p>
        </div>
        <button id="btn-new-company"
            class="flex-1 sm:flex-none justify-center px-5 py-2.5 bg-primary rounded-lg text-white text-sm font-bold shadow-lg shadow-primary/25 hover:brightness-110 transition-all flex items-center gap-2">
            <span class="material-symbols-outlined text-lg">add</span>
            <span>Nueva Compañía</span>
        </button>
    </div>

    {{-- Partial: Tabla --}}
    @include('companies.partials.table')

    {{-- Partial: Modal --}}
    @include('companies.partials.create-modal')

</div>
@endsection

@section('scripts')
{{-- Configuración Global para JS --}}
<script>
    window.routes = {
        data: "{{ route('companies.data') }}",
        store: "{{ route('companies.store') }}" // Base URL para store/update/delete
    };
</script>

{{-- Cargar Script Externo --}}
<script src="{{ asset('js/companies.js') }}"></script>

{{-- Estilos Inline para Animaciones (Opcional, podría ir a CSS) --}}
<style>
    @keyframes fade-in-down {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade-in-down {
        animation: fade-in-down 0.3s ease-out;
    }
</style>
@endsection