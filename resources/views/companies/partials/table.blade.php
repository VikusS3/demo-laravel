{{-- Buscador --}}
<div class="mb-6">
    <div class="relative max-w-md">
        <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">search</span>
        <input id="search-input" type="text"
            class="w-full bg-white/5 border border-glass-border rounded-xl py-2.5 pl-12 pr-4 text-sm text-white focus:outline-none focus:ring-2 focus:ring-primary/50 transition-all placeholder:text-slate-500"
            placeholder="Buscar por nombre, RUC o email...">
    </div>
</div>

{{-- Tabla de Compañías --}}
<div class="glass-effect rounded-xl overflow-hidden border border-glass-border">
    <div class="overflow-x-auto w-full max-w-full">
        <table class="w-full text-left border-collapse min-w-[800px]">
            <thead class="bg-white/2">
                <tr>
                    <th class="px-6 py-4 text-[10px] uppercase tracking-widest text-slate-500 font-extrabold">Logo</th>
                    <th class="px-6 py-4 text-[10px] uppercase tracking-widest text-slate-500 font-extrabold">Compañía</th>
                    <th class="px-6 py-4 text-[10px] uppercase tracking-widest text-slate-500 font-extrabold">Contacto</th>
                    <th class="px-6 py-4 text-[10px] uppercase tracking-widest text-slate-500 font-extrabold">Plan</th>
                    <th class="px-6 py-4 text-[10px] uppercase tracking-widest text-slate-500 font-extrabold text-right">Acciones</th>
                </tr>
            </thead>
            <tbody id="companies-table-body" class="divide-y divide-glass-border">
                <!-- Filas renderizadas por JS -->
                <tr>
                    <td colspan="5" class="px-6 py-12 text-center text-slate-400">
                        Cargando datos...
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    {{-- Paginación --}}
    <div id="pagination-container" class="p-4 border-t border-glass-border flex justify-end gap-2 text-sm text-slate-400">
        <!-- Paginación renderizada por JS -->
    </div>
</div>