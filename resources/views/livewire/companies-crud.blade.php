<div class="p-4 lg:p-8 max-w-[1400px] mx-auto w-full">
    {{-- Mensajes Flash --}}
    @if (session()->has('message'))
        <div class="mb-6 glass-effect border border-green-500/30 bg-green-500/10 rounded-xl p-4 flex items-center gap-3">
            <span class="material-symbols-outlined text-green-500">check_circle</span>
            <p class="text-green-500 font-semibold">{{ session('message') }}</p>
        </div>
    @endif

    @if (session()->has('error'))
        <div class="mb-6 glass-effect border border-red-500/30 bg-red-500/10 rounded-xl p-4 flex items-center gap-3">
            <span class="material-symbols-outlined text-red-500">error</span>
            <p class="text-red-500 font-semibold">{{ session('error') }}</p>
        </div>
    @endif

    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-8">
        <div>
            <h2 class="text-2xl lg:text-3xl font-black text-white tracking-tight">Gestión de Compañías</h2>
            <p class="text-slate-400 mt-1 text-sm lg:text-base">Administra las empresas del sistema</p>
        </div>
        <button wire:click="openCreateModal"
            class="flex-1 sm:flex-none justify-center px-5 py-2.5 bg-primary rounded-lg text-white text-sm font-bold shadow-lg shadow-primary/25 hover:brightness-110 transition-all flex items-center gap-2">
            <span class="material-symbols-outlined text-lg">add</span>
            <span>Nueva Compañía</span>
        </button>
    </div>

    {{-- Buscador --}}
    <div class="mb-6">
        <div class="relative max-w-md">
            <span
                class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">search</span>
            <input wire:model.live.debounce.300ms="search" type="text"
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
                        <th class="px-6 py-4 text-[10px] uppercase tracking-widest text-slate-500 font-extrabold">Logo
                        </th>
                        <th class="px-6 py-4 text-[10px] uppercase tracking-widest text-slate-500 font-extrabold">
                            Compañía</th>
                        <th class="px-6 py-4 text-[10px] uppercase tracking-widest text-slate-500 font-extrabold">
                            Contacto</th>
                        <th class="px-6 py-4 text-[10px] uppercase tracking-widest text-slate-500 font-extrabold">Plan
                        </th>
                        <th
                            class="px-6 py-4 text-[10px] uppercase tracking-widest text-slate-500 font-extrabold text-right">
                            Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-glass-border">
                    @forelse($companies as $company)
                        <tr class="group hover:bg-white/5 transition-colors">
                            <td class="px-6 py-4">
                                <div
                                    class="w-12 h-12 rounded-lg overflow-hidden bg-white/5 border border-glass-border flex items-center justify-center">
                                    @if ($company->logo_path)
                                        <img src="{{ asset('uploads/' . $company->logo_path) }}"
                                            alt="{{ $company->name }}" class="w-full h-full object-cover">
                                    @else
                                        <span class="material-symbols-outlined text-slate-400">business</span>
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex flex-col">
                                    <span class="text-sm font-bold text-white">{{ $company->name }}</span>
                                    @if ($company->ruc)
                                        <span class="text-xs text-slate-500">RUC: {{ $company->ruc }}</span>
                                    @endif
                                    @if ($company->slogan)
                                        <span class="text-xs text-slate-400 italic mt-1">{{ $company->slogan }}</span>
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex flex-col gap-1">
                                    @if ($company->email)
                                        <div class="flex items-center gap-2">
                                            <span
                                                class="material-symbols-outlined text-slate-400 text-[14px]">email</span>
                                            <span class="text-xs text-slate-300">{{ $company->email }}</span>
                                        </div>
                                    @endif
                                    @if ($company->phone)
                                        <div class="flex items-center gap-2">
                                            <span
                                                class="material-symbols-outlined text-slate-400 text-[14px]">phone</span>
                                            <span class="text-xs text-slate-300">{{ $company->phone }}</span>
                                        </div>
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-3 py-1 rounded-full text-xs font-bold uppercase
                                    {{ $company->plan === 'enterprise' ? 'bg-purple-500/20 text-purple-400 border border-purple-500/30' : '' }}
                                    {{ $company->plan === 'pro' ? 'bg-blue-500/20 text-blue-400 border border-blue-500/30' : '' }}
                                    {{ $company->plan === 'free' ? 'bg-slate-500/20 text-slate-400 border border-slate-500/30' : '' }}">
                                    {{ $company->plan }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <button wire:click="openEditModal({{ $company->id }})"
                                        class="p-2 rounded-lg bg-white/5 text-slate-400 hover:text-white hover:bg-primary/20 transition-all">
                                        <span class="material-symbols-outlined text-[20px]">edit</span>
                                    </button>
                                    <button wire:click="delete({{ $company->id }})"
                                        wire:confirm="¿Estás seguro de desactivar esta compañía?"
                                        class="p-2 rounded-lg bg-white/5 text-slate-400 hover:text-red-400 hover:bg-red-500/20 transition-all">
                                        <span class="material-symbols-outlined text-[20px]">delete</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center gap-3">
                                    <span
                                        class="material-symbols-outlined text-slate-600 text-5xl">business_center</span>
                                    <p class="text-slate-400 font-semibold">No se encontraron compañías</p>
                                    <button wire:click="openCreateModal"
                                        class="mt-2 px-4 py-2 bg-primary rounded-lg text-white text-sm font-bold hover:brightness-110 transition-all">
                                        Crear primera compañía
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Paginación --}}
        @if ($companies->hasPages())
            <div class="p-4 border-t border-glass-border">
                {{ $companies->links() }}
            </div>
        @endif
    </div>

    {{-- Modal de Crear/Editar --}}
    @if ($showModal)
        <div class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            {{-- Backdrop --}}
            <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                <div wire:click="closeModal" class="fixed inset-0 bg-black/60 backdrop-blur-sm transition-opacity"
                    aria-hidden="true"></div>

                {{-- Modal Panel --}}
                <div
                    class="inline-block align-bottom glass-effect rounded-2xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full border border-glass-border">
                    {{-- Header --}}
                    <div class="px-6 py-4 border-b border-glass-border flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-primary/20 rounded-lg flex items-center justify-center">
                                <span
                                    class="material-symbols-outlined text-primary">{{ $isEditMode ? 'edit' : 'add_business' }}</span>
                            </div>
                            <h3 class="text-xl font-bold text-white">
                                {{ $isEditMode ? 'Editar Compañía' : 'Nueva Compañía' }}
                            </h3>
                        </div>
                        <button wire:click="closeModal" class="text-slate-400 hover:text-white transition-colors">
                            <span class="material-symbols-outlined">close</span>
                        </button>
                    </div>

                    {{-- Body --}}
                    <form wire:submit.prevent="save">
                        <div class="px-6 py-6 max-h-[70vh] overflow-y-auto">
                            <div class="space-y-6">
                                {{-- Logo Upload --}}
                                <div class="space-y-2">
                                    <label class="text-sm font-semibold text-slate-300">Logo de la Compañía</label>
                                    <div class="flex items-center gap-4">
                                        <div
                                            class="w-20 h-20 rounded-lg overflow-hidden bg-white/5 border border-glass-border flex items-center justify-center">
                                            @if ($logo)
                                                <img src="{{ asset('uploads/' . $company->logo_path) }}" alt="Preview"
                                                    class="w-full h-full object-cover">
                                            @elseif($logo_path)
                                                <img src="{{ asset('uploads/' . $logo_path) }}" alt="Logo actual"
                                                    class="w-full h-full object-cover">
                                            @else
                                                <span class="material-symbols-outlined text-slate-400">business</span>
                                            @endif
                                        </div>
                                        <div class="flex-1">
                                            <input type="file" wire:model="logo" accept="image/*" class="hidden"
                                                id="logo-upload">
                                            <label for="logo-upload"
                                                class="cursor-pointer inline-flex items-center gap-2 px-4 py-2 bg-white/5 border border-glass-border rounded-lg text-sm font-bold text-white hover:bg-white/10 transition-all">
                                                <span class="material-symbols-outlined text-sm">upload</span>
                                                Subir Logo
                                            </label>
                                            <p class="text-xs text-slate-500 mt-1">PNG, JPG o SVG (máx. 2MB)</p>
                                            @error('logo')
                                                <span class="text-red-400 text-xs">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                {{-- Información Básica --}}
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="space-y-2">
                                        <label class="text-sm font-semibold text-slate-300">Nombre de la Compañía
                                            *</label>
                                        <input type="text" wire:model="name"
                                            class="w-full bg-white/5 border border-glass-border rounded-xl px-4 py-2.5 text-sm text-white focus:outline-none focus:ring-2 focus:ring-primary/50 transition-all placeholder:text-slate-500"
                                            placeholder="Ej: Logistics Pro">
                                        @error('name')
                                            <span class="text-red-400 text-xs">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="space-y-2">
                                        <label class="text-sm font-semibold text-slate-300">RUC</label>
                                        <input type="text" wire:model="ruc"
                                            class="w-full bg-white/5 border border-glass-border rounded-xl px-4 py-2.5 text-sm text-white focus:outline-none focus:ring-2 focus:ring-primary/50 transition-all placeholder:text-slate-500"
                                            placeholder="20123456789">
                                        @error('ruc')
                                            <span class="text-red-400 text-xs">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="space-y-2">
                                    <label class="text-sm font-semibold text-slate-300">Slogan</label>
                                    <input type="text" wire:model="slogan"
                                        class="w-full bg-white/5 border border-glass-border rounded-xl px-4 py-2.5 text-sm text-white focus:outline-none focus:ring-2 focus:ring-primary/50 transition-all placeholder:text-slate-500"
                                        placeholder="Ej: Entrega rápida y confiable">
                                    @error('slogan')
                                        <span class="text-red-400 text-xs">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="space-y-2">
                                    <label class="text-sm font-semibold text-slate-300">Descripción</label>
                                    <textarea wire:model="description" rows="3"
                                        class="w-full bg-white/5 border border-glass-border rounded-xl px-4 py-2.5 text-sm text-white focus:outline-none focus:ring-2 focus:ring-primary/50 transition-all placeholder:text-slate-500"
                                        placeholder="Breve descripción de la empresa..."></textarea>
                                    @error('description')
                                        <span class="text-red-400 text-xs">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Color y Plan --}}
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="space-y-2">
                                        <label class="text-sm font-semibold text-slate-300">Color Primario</label>
                                        <div class="flex items-center gap-3">
                                            <input type="color" wire:model.live="color_primary"
                                                class="w-12 h-12 rounded-lg cursor-pointer border-2 border-glass-border">
                                            <input type="text" wire:model="color_primary"
                                                class="flex-1 bg-white/5 border border-glass-border rounded-xl px-4 py-2.5 text-sm text-white font-mono uppercase focus:outline-none focus:ring-2 focus:ring-primary/50 transition-all"
                                                placeholder="#4030E8">
                                        </div>
                                        @error('color_primary')
                                            <span class="text-red-400 text-xs">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="space-y-2">
                                        <label class="text-sm font-semibold text-slate-300">Plan *</label>
                                        <select wire:model="plan"
                                            class="w-full bg-white/5 border border-glass-border rounded-xl px-4 py-2.5 text-sm text-white focus:outline-none focus:ring-2 focus:ring-primary/50 transition-all">
                                            <option value="free">Free</option>
                                            <option value="pro">Pro</option>
                                            <option value="enterprise">Enterprise</option>
                                        </select>
                                        @error('plan')
                                            <span class="text-red-400 text-xs">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Contacto --}}
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="space-y-2">
                                        <label class="text-sm font-semibold text-slate-300">Email</label>
                                        <input type="email" wire:model="email"
                                            class="w-full bg-white/5 border border-glass-border rounded-xl px-4 py-2.5 text-sm text-white focus:outline-none focus:ring-2 focus:ring-primary/50 transition-all placeholder:text-slate-500"
                                            placeholder="contacto@empresa.com">
                                        @error('email')
                                            <span class="text-red-400 text-xs">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="space-y-2">
                                        <label class="text-sm font-semibold text-slate-300">Teléfono</label>
                                        <input type="tel" wire:model="phone"
                                            class="w-full bg-white/5 border border-glass-border rounded-xl px-4 py-2.5 text-sm text-white focus:outline-none focus:ring-2 focus:ring-primary/50 transition-all placeholder:text-slate-500"
                                            placeholder="+51 999 999 999">
                                        @error('phone')
                                            <span class="text-red-400 text-xs">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="space-y-2">
                                    <label class="text-sm font-semibold text-slate-300">Dirección</label>
                                    <input type="text" wire:model="address"
                                        class="w-full bg-white/5 border border-glass-border rounded-xl px-4 py-2.5 text-sm text-white focus:outline-none focus:ring-2 focus:ring-primary/50 transition-all placeholder:text-slate-500"
                                        placeholder="Av. Principal 123, Lima">
                                    @error('address')
                                        <span class="text-red-400 text-xs">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Redes Sociales --}}
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <div class="space-y-2">
                                        <label class="text-sm font-semibold text-slate-300">Website</label>
                                        <input type="url" wire:model="website"
                                            class="w-full bg-white/5 border border-glass-border rounded-xl px-4 py-2.5 text-sm text-white focus:outline-none focus:ring-2 focus:ring-primary/50 transition-all placeholder:text-slate-500"
                                            placeholder="https://empresa.com">
                                        @error('website')
                                            <span class="text-red-400 text-xs">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="space-y-2">
                                        <label class="text-sm font-semibold text-slate-300">WhatsApp</label>
                                        <input type="text" wire:model="whatsapp"
                                            class="w-full bg-white/5 border border-glass-border rounded-xl px-4 py-2.5 text-sm text-white focus:outline-none focus:ring-2 focus:ring-primary/50 transition-all placeholder:text-slate-500"
                                            placeholder="+51999999999">
                                        @error('whatsapp')
                                            <span class="text-red-400 text-xs">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="space-y-2">
                                        <label class="text-sm font-semibold text-slate-300">Facebook</label>
                                        <input type="text" wire:model="facebook"
                                            class="w-full bg-white/5 border border-glass-border rounded-xl px-4 py-2.5 text-sm text-white focus:outline-none focus:ring-2 focus:ring-primary/50 transition-all placeholder:text-slate-500"
                                            placeholder="facebook.com/empresa">
                                        @error('facebook')
                                            <span class="text-red-400 text-xs">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="space-y-2">
                                    <label class="text-sm font-semibold text-slate-300">Instagram</label>
                                    <input type="text" wire:model="instagram"
                                        class="w-full bg-white/5 border border-glass-border rounded-xl px-4 py-2.5 text-sm text-white focus:outline-none focus:ring-2 focus:ring-primary/50 transition-all placeholder:text-slate-500"
                                        placeholder="@empresa">
                                    @error('instagram')
                                        <span class="text-red-400 text-xs">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- Footer --}}
                        <div class="px-6 py-4 border-t border-glass-border flex items-center justify-end gap-3">
                            <button type="button" wire:click="closeModal"
                                class="px-5 py-2.5 rounded-xl border border-glass-border text-slate-300 font-bold text-sm hover:bg-white/5 transition-all">
                                Cancelar
                            </button>
                            <button type="submit"
                                class="px-5 py-2.5 rounded-xl bg-primary text-white font-bold text-sm shadow-lg shadow-primary/25 hover:brightness-110 transition-all flex items-center gap-2">
                                <span
                                    class="material-symbols-outlined text-lg">{{ $isEditMode ? 'save' : 'add' }}</span>
                                {{ $isEditMode ? 'Guardar Cambios' : 'Crear Compañía' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
</div>
