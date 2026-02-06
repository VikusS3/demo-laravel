<!DOCTYPE html>
<html class="dark" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Business Dashboard Overview</title>
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />


    <style>
        .glass-effect {
            backdrop-filter: blur(12px);
            background-color: rgba(18, 17, 33, 0.7);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .ethereal-bg {
            background: radial-gradient(circle at 0% 0%, rgba(64, 48, 232, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 100% 100%, rgba(64, 48, 232, 0.1) 0%, transparent 50%),
                #0a0a0c;
        }

        /* Smooth transitions for sidebar */
        #sidebar {
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
    </style>
</head>

<body
    class="bg-background-light dark:bg-background-dark font-display text-slate-900 dark:text-slate-100 min-h-screen overflow-x-hidden">
    <div class="flex ethereal-bg min-h-screen relative">

        <div id="sidebar-backdrop" onclick="closeSidebar()"
            class="fixed inset-0 bg-black/60 backdrop-blur-sm z-40 hidden transition-opacity opacity-0 lg:hidden"></div>

        <aside id="sidebar"
            class="w-72 fixed inset-y-0 left-0 glass-effect border-r border-glass-border flex flex-col z-50 transform -translate-x-full lg:translate-x-0 h-full">
            <div class="p-6 lg:p-8 flex items-center justify-between gap-3">
                <div class="flex items-center gap-3">
                    <div
                        class="w-10 h-10 bg-primary rounded-lg flex items-center justify-center shadow-lg shadow-primary/20 flex-shrink-0">
                        <span class="material-symbols-outlined text-white">rocket_launch</span>
                    </div>
                    <div>
                        <h1 class="text-white text-lg font-extrabold tracking-tight">Logistics Pro</h1>
                        <p class="text-slate-400 text-xs font-medium">Business Enterprise</p>
                    </div>
                </div>
                <button onclick="closeSidebar()" class="lg:hidden text-slate-400 hover:text-white">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>

            <nav class="flex-1 px-4 space-y-2 mt-2 overflow-y-auto">
                <a class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-400 hover:bg-white/5 hover:text-white transition-all"
                    href="#">
                    <span class="material-symbols-outlined">dashboard</span>
                    <span class="text-sm font-semibold">Dashboard</span>
                </a>
                <a class="flex items-center gap-3 px-4 py-3 rounded-xl bg-primary text-white shadow-lg shadow-primary/30 transition-all"
                    href="#">
                    <span class="material-symbols-outlined">business</span>
                    <span class="text-sm font-semibold">Empresas</span>
                </a>
            </nav>

            <div class="p-6">
                <div class="bg-white/5 rounded-xl p-4 border border-glass-border">
                    <p class="text-xs text-slate-400 mb-2 uppercase tracking-widest font-bold">Estado del Sistema</p>
                    <div class="w-full bg-white/10 h-1.5 rounded-full overflow-hidden">
                        <div class="bg-emerald-500 h-full w-[90%]"></div>
                    </div>
                    <p class="text-[10px] text-slate-500 mt-2">API Online</p>
                </div>
            </div>
        </aside>

        <main class="flex-1 lg:ml-72 flex flex-col w-full min-w-0 max-w-full">

            <header
                class="h-16 lg:h-20 glass-effect border-b border-glass-border flex items-center justify-between px-4 lg:px-8 sticky top-0 z-40">
                <div class="flex items-center flex-1 gap-4 min-w-0">
                    <button onclick="openSidebar()"
                        class="lg:hidden p-2 -ml-2 text-slate-400 hover:text-white rounded-lg hover:bg-white/5 transition-colors flex-shrink-0">
                        <span class="material-symbols-outlined">menu</span>
                    </button>
                    <div class="relative w-full max-w-xl min-w-0">
                        <span
                            class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">search</span>
                        <input
                            class="w-full bg-white/5 border border-glass-border rounded-xl py-2.5 pl-12 pr-4 text-sm text-white focus:outline-none focus:ring-2 focus:ring-primary/50 transition-all placeholder:text-slate-500"
                            placeholder="Buscar empresas..." type="text" />
                    </div>
                </div>
                <div class="flex items-center gap-3 lg:gap-6 ml-3 flex-shrink-0">
                    <div class="flex items-center gap-3 cursor-pointer group">
                        <div class="text-right hidden md:block">
                            <p class="text-sm font-bold text-white leading-tight">Admin</p>
                        </div>
                        <div
                            class="w-8 h-8 lg:w-10 lg:h-10 rounded-full border-2 border-primary/20 p-0.5 group-hover:border-primary/50 transition-all flex-shrink-0">
                            <img class="w-full h-full rounded-full object-cover"
                                src="https://ui-avatars.com/api/?name=Admin&background=random" alt="User Avatar" />
                        </div>
                    </div>
                </div>
            </header>

            <div class="p-4 lg:p-8 max-w-[1400px] mx-auto w-full">
                <div class="flex items-center gap-2 mb-6 text-sm">
                    <a class="text-slate-500 hover:text-primary transition-colors" href="#">Configuración</a>
                    <span class="material-symbols-outlined text-xs text-slate-400">chevron_right</span>
                    <span class="text-slate-900 dark:text-white font-medium">Gestión de Empresas</span>
                </div>

                <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-8">
                    <div>
                        <h1 class="text-3xl lg:text-4xl font-black text-white tracking-tight mb-2">Directorio de
                            Empresas</h1>
                        <p class="text-slate-400 text-sm lg:text-base max-w-2xl">Administra las empresas clientes y sus
                            datos de facturación.</p>
                    </div>
                    <button
                        class="glow-button bg-primary text-white px-6 py-3 rounded-xl font-bold flex items-center justify-center gap-2 hover:bg-primary/90 transition-all shrink-0">
                        <span class="material-symbols-outlined">add_business</span>
                        Nueva Empresa
                    </button>
                </div>

                <div class="glass-effect rounded-2xl border border-glass-border overflow-hidden flex flex-col">

                    <div
                        class="p-5 border-b border-glass-border flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                        <form action="{{ route('companies.index') }}" method="GET"
                            class="relative w-full sm:max-w-xs">

                            <span
                                class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-lg">
                                search
                            </span>

                            <input type="text" name="search" value="{{ request('search') }}"
                                placeholder="Buscar por Nombre o RUC..."
                                class="w-full bg-slate-900/50 border border-slate-700 text-sm rounded-lg pl-10 pr-4 py-2 text-white focus:ring-1 focus:ring-primary focus:border-primary placeholder:text-slate-500 transition-all">
                        </form>
                    </div>

                    <div class="overflow-x-auto w-full">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-white/5 border-b border-glass-border">
                                    <th
                                        class="px-6 py-4 text-xs font-bold text-slate-400 uppercase tracking-wider w-16">
                                        ID</th>
                                    <th class="px-6 py-4 text-xs font-bold text-slate-400 uppercase tracking-wider">
                                        Nombre Comercial</th>
                                    <th class="px-6 py-4 text-xs font-bold text-slate-400 uppercase tracking-wider">RUC
                                        / ID</th>
                                    <th
                                        class="px-6 py-4 text-xs font-bold text-slate-400 uppercase tracking-wider hidden md:table-cell">
                                        Dirección</th>
                                    <th
                                        class="px-6 py-4 text-xs font-bold text-slate-400 uppercase tracking-wider hidden lg:table-cell">
                                        Contacto</th>
                                    <th
                                        class="px-6 py-4 text-xs font-bold text-slate-400 uppercase tracking-wider text-right">
                                        Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-glass-border">

                                {{-- INICIO DEL BUCLE FOREACH --}}
                                @forelse($companies as $company)
                                    <tr class="group hover:bg-white/5 transition-colors">
                                        {{-- ID --}}
                                        <td class="px-6 py-4 text-sm font-mono text-slate-500">
                                            #{{ str_pad($company->id, 3, '0', STR_PAD_LEFT) }}
                                        </td>

                                        {{-- NOMBRE --}}
                                        <td class="px-6 py-4">
                                            <div class="font-bold text-white">{{ $company->name }}</div>
                                            <div class="text-xs text-slate-500 md:hidden">{{ $company->ruc }}</div>
                                        </td>

                                        {{-- RUC (Estilo visual similar a los estados) --}}
                                        <td class="px-6 py-4">
                                            <span
                                                class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-purple-500/10 text-purple-400 border border-purple-500/20 font-mono">
                                                <span class="material-symbols-outlined text-[14px]">badge</span>
                                                {{ $company->ruc ?? 'S/N' }}
                                            </span>
                                        </td>

                                        {{-- DIRECCIÓN --}}
                                        <td
                                            class="px-6 py-4 text-sm text-slate-400 hidden md:table-cell truncate max-w-xs">
                                            {{ $company->address ?? 'Sin dirección registrada' }}
                                        </td>

                                        {{-- TELEFONO/CONTACTO --}}
                                        <td class="px-6 py-4 text-sm text-slate-300 hidden lg:table-cell">
                                            {{ $company->phone ?? '-' }}
                                        </td>

                                        {{-- ACCIONES --}}
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
                                @empty
                                    {{-- ESTADO VACÍO --}}
                                    <tr>
                                        <td colspan="6" class="px-6 py-12 text-center text-slate-500">
                                            <span
                                                class="material-symbols-outlined text-4xl mb-2 opacity-20">domain_disabled</span>
                                            <p>No hay empresas registradas aún.</p>
                                        </td>
                                    </tr>
                                @endforelse
                                {{-- FIN DEL BUCLE --}}

                            </tbody>
                        </table>
                    </div>

                    <div class="p-4 border-t border-glass-border bg-white/5">
                        {{ $companies->links('pagination::tailwind') }}
                    </div>
                </div>
            </div>

            <footer
                class="mt-auto p-6 lg:p-8 border-t border-glass-border glass-effect flex flex-col md:flex-row gap-4 items-center justify-between text-center md:text-left">
                <div class="text-xs text-slate-500">
                    © {{ date('Y') }} Logistics Pro Inc.
                </div>
            </footer>
        </main>
    </div>

    <script>
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
    </script>
</body>

</html>
