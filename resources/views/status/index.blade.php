@extends('layouts.app')

@section('content')


<div class="flex ethereal-bg min-h-screen relative">

    <!-- Mobile Backdrop Overlay -->
    <div id="sidebar-backdrop" onclick="closeSidebar()"
        class="fixed inset-0 bg-black/60 backdrop-blur-sm z-40 hidden transition-opacity opacity-0 lg:hidden"></div>



    <!-- Main Content Area -->
    <div class="w-full">
        <!-- Top Navigation -->


        <div class="p-4 lg:p-8 max-w-[1400px] mx-auto w-full">
            <!-- Breadcrumb -->
            <div class="flex items-center gap-2 mb-6 text-sm">
                <a class="text-slate-500 hover:text-primary dark:text-slate-400 dark:hover:text-white transition-colors"
                    href="#">Configuración</a>
                <span class="material-symbols-outlined text-xs text-slate-400">chevron_right</span>
                <span class="text-slate-900 dark:text-white font-medium">Gestión de Estados</span>
            </div>

            <!-- Page Header -->
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-8">
                <div>
                    <h1 class="text-3xl lg:text-4xl font-black text-white tracking-tight mb-2">Estados de Pedidos
                    </h1>
                    <p class="text-slate-400 text-sm lg:text-base max-w-2xl">Administra los estados disponibles para
                        el flujo de trabajo de tus envíos y paquetería.</p>
                </div>
                <!-- MODIFIED: Button triggers modal now -->
                <button onclick="openModal('new-status-modal')"
                    class="glow-button bg-primary text-white px-6 py-3 rounded-xl font-bold flex items-center justify-center gap-2 hover:bg-primary/90 transition-all shrink-0">
                    <span class="material-symbols-outlined">add</span>
                    Nuevo Estado
                </button>
            </div>

            <!-- Table Container Card -->
            <div class="glass-effect rounded-2xl border border-glass-border overflow-hidden flex flex-col">

                <!-- Table Toolbar -->
                <div
                    class="p-5 border-b border-glass-border flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <div class="relative w-full sm:max-w-xs">
                        <span
                            class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-lg">search</span>
                        <input type="text" placeholder="Buscar estado..."
                            class="w-full bg-slate-900/50 border border-slate-700 text-sm rounded-lg pl-10 pr-4 py-2 text-white focus:ring-1 focus:ring-primary focus:border-primary placeholder:text-slate-500 transition-all">
                    </div>
                    <div class="flex items-center gap-3">
                        <button
                            class="flex items-center gap-2 px-4 py-2 rounded-lg border border-slate-700 bg-white/5 hover:bg-white/10 text-slate-300 text-sm font-medium transition-colors">
                            <span class="material-symbols-outlined text-lg">filter_list</span>
                            Filtros
                        </button>
                        <button
                            class="flex items-center gap-2 px-4 py-2 rounded-lg border border-slate-700 bg-white/5 hover:bg-white/10 text-slate-300 text-sm font-medium transition-colors">
                            <span class="material-symbols-outlined text-lg">download</span>
                            Exportar
                        </button>
                    </div>
                </div>

                <!-- Table Wrapper -->
                <div class="overflow-x-auto w-full">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-white/5 border-b border-glass-border">
                                <th
                                    class="px-6 py-4 text-xs font-bold text-slate-400 uppercase tracking-wider w-16">
                                    <div class="flex items-center gap-1 cursor-pointer hover:text-white">
                                        ID <span class="material-symbols-outlined text-[16px]">unfold_more</span>
                                    </div>
                                </th>
                                <th class="px-6 py-4 text-xs font-bold text-slate-400 uppercase tracking-wider">
                                    Nombre del Estado</th>
                                <th class="px-6 py-4 text-xs font-bold text-slate-400 uppercase tracking-wider">
                                    Etiqueta Visual</th>
                                <th
                                    class="px-6 py-4 text-xs font-bold text-slate-400 uppercase tracking-wider hidden md:table-cell">
                                    Descripción</th>
                                <th class="px-6 py-4 text-xs font-bold text-slate-400 uppercase tracking-wider">
                                    Orden</th>
                                <th
                                    class="px-6 py-4 text-xs font-bold text-slate-400 uppercase tracking-wider text-right">
                                    Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-glass-border">
                            <!-- Row 1 -->
                            <tr class="group hover:bg-white/5 transition-colors">
                                <td class="px-6 py-4 text-sm font-mono text-slate-500">#001</td>
                                <td class="px-6 py-4">
                                    <div class="font-bold text-white">Pendiente</div>
                                    <div class="text-xs text-slate-500 md:hidden">Recién creado</div>
                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-amber-500/10 text-amber-500 border border-amber-500/20">
                                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
                                        Pendiente
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm text-slate-400 hidden md:table-cell">El pedido ha sido
                                    creado pero no procesado.</td>
                                <td class="px-6 py-4 text-sm text-slate-300">1</td>
                                <td class="px-6 py-4 text-right">
                                    <div
                                        class="flex items-center justify-end gap-2 opacity-60 group-hover:opacity-100 transition-opacity">
                                        <button
                                            class="p-2 hover:bg-white/10 rounded-lg text-slate-400 hover:text-white transition-colors"
                                            title="Editar">
                                            <span class="material-symbols-outlined text-[20px]">edit</span>
                                        </button>
                                        <button
                                            class="p-2 hover:bg-red-500/10 rounded-lg text-slate-400 hover:text-red-500 transition-colors"
                                            title="Eliminar">
                                            <span class="material-symbols-outlined text-[20px]">delete</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Row 2 -->
                            <tr class="group hover:bg-white/5 transition-colors">
                                <td class="px-6 py-4 text-sm font-mono text-slate-500">#002</td>
                                <td class="px-6 py-4">
                                    <div class="font-bold text-white">Procesando</div>
                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-blue-500/10 text-blue-500 border border-blue-500/20">
                                        <span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span>
                                        Procesando
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm text-slate-400 hidden md:table-cell">El almacén está
                                    preparando el paquete.</td>
                                <td class="px-6 py-4 text-sm text-slate-300">2</td>
                                <td class="px-6 py-4 text-right">
                                    <div
                                        class="flex items-center justify-end gap-2 opacity-60 group-hover:opacity-100 transition-opacity">
                                        <button
                                            class="p-2 hover:bg-white/10 rounded-lg text-slate-400 hover:text-white transition-colors">
                                            <span class="material-symbols-outlined text-[20px]">edit</span>
                                        </button>
                                        <button
                                            class="p-2 hover:bg-red-500/10 rounded-lg text-slate-400 hover:text-red-500 transition-colors">
                                            <span class="material-symbols-outlined text-[20px]">delete</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Row 3 -->
                            <tr class="group hover:bg-white/5 transition-colors">
                                <td class="px-6 py-4 text-sm font-mono text-slate-500">#003</td>
                                <td class="px-6 py-4">
                                    <div class="font-bold text-white">En Tránsito</div>
                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-indigo-500/10 text-indigo-400 border border-indigo-500/20">
                                        <span class="w-1.5 h-1.5 rounded-full bg-indigo-400"></span>
                                        En Tránsito
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm text-slate-400 hidden md:table-cell">El paquete ha
                                    salido del almacén.</td>
                                <td class="px-6 py-4 text-sm text-slate-300">3</td>
                                <td class="px-6 py-4 text-right">
                                    <div
                                        class="flex items-center justify-end gap-2 opacity-60 group-hover:opacity-100 transition-opacity">
                                        <button
                                            class="p-2 hover:bg-white/10 rounded-lg text-slate-400 hover:text-white transition-colors">
                                            <span class="material-symbols-outlined text-[20px]">edit</span>
                                        </button>
                                        <button
                                            class="p-2 hover:bg-red-500/10 rounded-lg text-slate-400 hover:text-red-500 transition-colors">
                                            <span class="material-symbols-outlined text-[20px]">delete</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Row 4 -->
                            <tr class="group hover:bg-white/5 transition-colors">
                                <td class="px-6 py-4 text-sm font-mono text-slate-500">#004</td>
                                <td class="px-6 py-4">
                                    <div class="font-bold text-white">Entregado</div>
                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-emerald-500/10 text-emerald-500 border border-emerald-500/20">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                        Entregado
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm text-slate-400 hidden md:table-cell">El cliente ha
                                    recibido el paquete.</td>
                                <td class="px-6 py-4 text-sm text-slate-300">4</td>
                                <td class="px-6 py-4 text-right">
                                    <div
                                        class="flex items-center justify-end gap-2 opacity-60 group-hover:opacity-100 transition-opacity">
                                        <button
                                            class="p-2 hover:bg-white/10 rounded-lg text-slate-400 hover:text-white transition-colors">
                                            <span class="material-symbols-outlined text-[20px]">edit</span>
                                        </button>
                                        <button
                                            class="p-2 hover:bg-red-500/10 rounded-lg text-slate-400 hover:text-red-500 transition-colors">
                                            <span class="material-symbols-outlined text-[20px]">delete</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Row 5 -->
                            <tr class="group hover:bg-white/5 transition-colors">
                                <td class="px-6 py-4 text-sm font-mono text-slate-500">#005</td>
                                <td class="px-6 py-4">
                                    <div class="font-bold text-white">Cancelado</div>
                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-rose-500/10 text-rose-500 border border-rose-500/20">
                                        <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span>
                                        Cancelado
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm text-slate-400 hidden md:table-cell">Pedido cancelado
                                    por cliente o sistema.</td>
                                <td class="px-6 py-4 text-sm text-slate-300">99</td>
                                <td class="px-6 py-4 text-right">
                                    <div
                                        class="flex items-center justify-end gap-2 opacity-60 group-hover:opacity-100 transition-opacity">
                                        <button
                                            class="p-2 hover:bg-white/10 rounded-lg text-slate-400 hover:text-white transition-colors">
                                            <span class="material-symbols-outlined text-[20px]">edit</span>
                                        </button>
                                        <button
                                            class="p-2 hover:bg-red-500/10 rounded-lg text-slate-400 hover:text-red-500 transition-colors">
                                            <span class="material-symbols-outlined text-[20px]">delete</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="p-4 border-t border-glass-border flex items-center justify-between bg-white/5">
                    <div class="text-xs text-slate-400">
                        Mostrando <span class="text-white font-bold">1-5</span> de <span
                            class="text-white font-bold">12</span> estados
                    </div>
                    <div class="flex gap-2">
                        <button
                            class="px-3 py-1 rounded-lg border border-slate-700 text-slate-400 text-xs hover:bg-white/5 hover:text-white transition-colors disabled:opacity-50"
                            disabled>
                            Anterior
                        </button>
                        <button
                            class="px-3 py-1 rounded-lg border border-slate-700 text-slate-400 text-xs hover:bg-white/5 hover:text-white transition-colors">
                            Siguiente
                        </button>
                    </div>
                </div>
            </div>
        </div>



    </div>
</div>

<!-- Modal Nuevo Estado -->
<div id="new-status-modal" class="fixed inset-0 z-50 hidden" aria-labelledby="modal-title" role="dialog"
    aria-modal="true">
    <!-- Backdrop with Fade -->
    <div class="fixed inset-0 bg-black/80 backdrop-blur-sm transition-opacity opacity-0" id="modal-backdrop">
    </div>

    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
            <!-- Modal Panel with Transform -->
            <div class="relative transform overflow-hidden rounded-2xl bg-[#0a0a0c] border border-white/10 text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-lg scale-95 opacity-0 glass-effect"
                id="modal-panel">

                <!-- Header -->
                <div
                    class="border-b border-white/10 px-4 py-4 sm:px-6 flex justify-between items-center bg-white/5">
                    <div class="flex items-center gap-3">
                        <div class="p-2 bg-primary/20 rounded-lg text-primary">
                            <span class="material-symbols-outlined text-xl">bookmark_add</span>
                        </div>
                        <h3 class="text-lg font-bold leading-6 text-white" id="modal-title">Crear Nuevo Estado
                        </h3>
                    </div>
                    <button type="button" onclick="closeModal('new-status-modal')"
                        class="text-slate-400 hover:text-white transition-colors rounded-lg hover:bg-white/10 p-1">
                        <span class="material-symbols-outlined">close</span>
                    </button>
                </div>

                <!-- Body -->
                <div class="px-4 py-6 sm:px-6 space-y-5">
                    <!-- Nombre -->
                    <div>
                        <label for="status-name" class="block text-sm font-semibold text-slate-300 mb-2">Nombre
                            del Estado</label>
                        <input type="text" id="status-name"
                            class="w-full bg-slate-900/50 border border-slate-700 rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-primary focus:border-transparent placeholder:text-slate-500 sm:text-sm transition-all shadow-sm"
                            placeholder="Ej: En Revisión">
                    </div>

                    <!-- Color -->
                    <div>
                        <label class="block text-sm font-semibold text-slate-300 mb-3">Etiqueta Visual</label>
                        <div class="flex gap-4">
                            <label class="cursor-pointer group relative">
                                <input type="radio" name="status-color" value="blue" class="peer sr-only"
                                    checked>
                                <div
                                    class="w-10 h-10 rounded-full bg-blue-500 border-2 border-transparent peer-checked:border-white peer-checked:ring-2 peer-checked:ring-blue-500/50 hover:scale-110 transition-all flex items-center justify-center">
                                    <span
                                        class="material-symbols-outlined text-white text-[18px] opacity-0 peer-checked:opacity-100 scale-0 peer-checked:scale-100 transition-all">check</span>
                                </div>
                                <span
                                    class="absolute -bottom-6 left-1/2 -translate-x-1/2 text-[10px] text-slate-400 opacity-0 group-hover:opacity-100 transition-opacity">Azul</span>
                            </label>
                            <label class="cursor-pointer group relative">
                                <input type="radio" name="status-color" value="emerald" class="peer sr-only">
                                <div
                                    class="w-10 h-10 rounded-full bg-emerald-500 border-2 border-transparent peer-checked:border-white peer-checked:ring-2 peer-checked:ring-emerald-500/50 hover:scale-110 transition-all flex items-center justify-center">
                                    <span
                                        class="material-symbols-outlined text-white text-[18px] opacity-0 peer-checked:opacity-100 scale-0 peer-checked:scale-100 transition-all">check</span>
                                </div>
                                <span
                                    class="absolute -bottom-6 left-1/2 -translate-x-1/2 text-[10px] text-slate-400 opacity-0 group-hover:opacity-100 transition-opacity">Verde</span>
                            </label>
                            <label class="cursor-pointer group relative">
                                <input type="radio" name="status-color" value="amber" class="peer sr-only">
                                <div
                                    class="w-10 h-10 rounded-full bg-amber-500 border-2 border-transparent peer-checked:border-white peer-checked:ring-2 peer-checked:ring-amber-500/50 hover:scale-110 transition-all flex items-center justify-center">
                                    <span
                                        class="material-symbols-outlined text-white text-[18px] opacity-0 peer-checked:opacity-100 scale-0 peer-checked:scale-100 transition-all">check</span>
                                </div>
                                <span
                                    class="absolute -bottom-6 left-1/2 -translate-x-1/2 text-[10px] text-slate-400 opacity-0 group-hover:opacity-100 transition-opacity">Ámbar</span>
                            </label>
                            <label class="cursor-pointer group relative">
                                <input type="radio" name="status-color" value="rose" class="peer sr-only">
                                <div
                                    class="w-10 h-10 rounded-full bg-rose-500 border-2 border-transparent peer-checked:border-white peer-checked:ring-2 peer-checked:ring-rose-500/50 hover:scale-110 transition-all flex items-center justify-center">
                                    <span
                                        class="material-symbols-outlined text-white text-[18px] opacity-0 peer-checked:opacity-100 scale-0 peer-checked:scale-100 transition-all">check</span>
                                </div>
                                <span
                                    class="absolute -bottom-6 left-1/2 -translate-x-1/2 text-[10px] text-slate-400 opacity-0 group-hover:opacity-100 transition-opacity">Rojo</span>
                            </label>
                            <label class="cursor-pointer group relative">
                                <input type="radio" name="status-color" value="indigo" class="peer sr-only">
                                <div
                                    class="w-10 h-10 rounded-full bg-indigo-500 border-2 border-transparent peer-checked:border-white peer-checked:ring-2 peer-checked:ring-indigo-500/50 hover:scale-110 transition-all flex items-center justify-center">
                                    <span
                                        class="material-symbols-outlined text-white text-[18px] opacity-0 peer-checked:opacity-100 scale-0 peer-checked:scale-100 transition-all">check</span>
                                </div>
                                <span
                                    class="absolute -bottom-6 left-1/2 -translate-x-1/2 text-[10px] text-slate-400 opacity-0 group-hover:opacity-100 transition-opacity">Índigo</span>
                            </label>
                        </div>
                    </div>

                    <!-- Descripción -->
                    <div>
                        <label for="status-desc"
                            class="block text-sm font-semibold text-slate-300 mb-2">Descripción</label>
                        <textarea id="status-desc" rows="3"
                            class="w-full bg-slate-900/50 border border-slate-700 rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-primary focus:border-transparent placeholder:text-slate-500 sm:text-sm resize-none shadow-sm"
                            placeholder="Describe brevemente cuándo se aplica este estado..."></textarea>
                    </div>

                    <!-- Orden -->
                    <div>
                        <label for="status-order" class="block text-sm font-semibold text-slate-300 mb-2">Orden de
                            Secuencia</label>
                        <div class="relative">
                            <input type="number" id="status-order"
                                class="w-full bg-slate-900/50 border border-slate-700 rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-primary focus:border-transparent placeholder:text-slate-500 sm:text-sm shadow-sm"
                                placeholder="Ej: 5">
                            <span
                                class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-500 text-xs">Posición</span>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <div
                    class="border-t border-white/10 px-4 py-4 sm:flex sm:flex-row-reverse sm:px-6 bg-white/5 gap-3">
                    <button type="button"
                        class="inline-flex w-full justify-center rounded-xl bg-primary px-5 py-3 text-sm font-bold text-white shadow-lg shadow-primary/20 hover:bg-primary/90 transition-all sm:w-auto glow-button">
                        Guardar Estado
                    </button>
                    <button type="button" onclick="closeModal('new-status-modal')"
                        class="mt-3 inline-flex w-full justify-center rounded-xl bg-white/5 border border-white/10 px-5 py-3 text-sm font-bold text-slate-300 shadow-sm hover:bg-white/10 transition-all sm:mt-0 sm:w-auto">
                        Cancelar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Main Scripts -->
<script>
    // Sidebar Logic
    const sidebar = document.getElementById('sidebar');
    const backdrop = document.getElementById('sidebar-backdrop');

    function openSidebar() {
        sidebar.classList.remove('-translate-x-full');
        backdrop.classList.remove('hidden');
        setTimeout(() => {
            backdrop.classList.remove('opacity-0');
        }, 10);
    }

    function closeSidebar() {
        sidebar.classList.add('-translate-x-full');
        backdrop.classList.add('opacity-0');
        setTimeout(() => {
            backdrop.classList.add('hidden');
        }, 300);
    }

    // Modal Logic
    function openModal(modalId) {
        const modal = document.getElementById(modalId);
        const modalBackdrop = modal.querySelector('#modal-backdrop');
        const modalPanel = modal.querySelector('#modal-panel');

        modal.classList.remove('hidden');

        // Allow transition to happen after display block
        setTimeout(() => {
            modalBackdrop.classList.remove('opacity-0');
            modalPanel.classList.remove('opacity-0', 'scale-95');
            modalPanel.classList.add('opacity-100', 'scale-100');
        }, 10);
    }

    function closeModal(modalId) {
        const modal = document.getElementById(modalId);
        const modalBackdrop = modal.querySelector('#modal-backdrop');
        const modalPanel = modal.querySelector('#modal-panel');

        modalBackdrop.classList.add('opacity-0');
        modalPanel.classList.remove('opacity-100', 'scale-100');
        modalPanel.classList.add('opacity-0', 'scale-95');

        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);
    }

    // Close modal on backdrop click
    window.onclick = function(event) {
        const modal = document.getElementById('new-status-modal');
        const modalBackdrop = document.getElementById('modal-backdrop');
        if (event.target === modalBackdrop && !modal.classList.contains('hidden')) {
            closeModal('new-status-modal');
        }
    }
</script>

@endsection