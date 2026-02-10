<?php

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Company;

new class extends Component {
    use WithPagination;

    public $search = '';
    public $company_id = null;
    public $name, $ruc, $email, $phone, $address, $plan;
    public $slogan, $description, $website, $whatsapp;
    public $facebook, $instagram, $logo_path, $color_primary;
    public $active = true;

    protected $rules = [
        'name' => 'required|string|max:255',
        'ruc' => 'nullable|string|max:20',
        'slogan' => 'nullable|string',
        'description' => 'nullable|string',
        'website' => 'nullable|url',
        'whatsapp' => 'nullable|string',
        'facebook' => 'nullable|string',
        'instagram' => 'nullable|string',
        'logo_path' => 'nullable|string',
        'color_primary' => 'nullable|string',
        'email' => 'nullable|email',
        'phone' => 'nullable|string',
        'address' => 'nullable|string',
        'plan' => 'required|in:free,pro,enterprise',
        'active' => 'boolean',
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function resetForm()
    {
        $this->reset(['company_id', 'name', 'ruc', 'email', 'phone', 'address', 'plan']);
        $this->resetErrorBag();
    }

    public function save()
    {
        $this->validate();

        Company::updateOrCreate(
            ['id' => $this->company_id],
            [
                'name' => $this->name,
                'ruc' => $this->ruc,
                'slogan' => $this->slogan,
                'description' => $this->description,
                'website' => $this->website,
                'whatsapp' => $this->whatsapp,
                'facebook' => $this->facebook,
                'instagram' => $this->instagram,
                'logo_path' => $this->logo_path,
                'color_primary' => $this->color_primary,
                'email' => $this->email,
                'phone' => $this->phone,
                'address' => $this->address,
                'plan' => $this->plan,
                'active' => $this->active,
            ],
        );

        session()->flash('success', $this->company_id ? 'Compañía actualizada' : 'Compañía creada');

        $this->resetForm();
    }

    public function edit($id)
    {
        $c = Company::findOrFail($id);

        $this->company_id = $c->id;
        $this->name = $c->name;
        $this->ruc = $c->ruc;
        $this->email = $c->email;
        $this->phone = $c->phone;
        $this->address = $c->address;
        $this->plan = $c->plan;
    }

    public function delete($id)
    {
        Company::where('id', $id)->update(['active' => false]);
        session()->flash('success', 'Compañía desactivada');
    }

    public function render()
    {
        $companies = Company::where('active', true)
            ->when($this->search, function ($q) {
                $q->where(function ($sub) {
                    $sub->where('name', 'like', "%{$this->search}%")->orWhere('ruc', 'like', "%{$this->search}%");
                });
            })
            ->orderBy('id', 'desc')
            ->paginate(10);

        return $this->view(compact('companies'));
    }
};
?>

<div>
    <!-- Modal Nueva Empresa -->
    <!-- FIX: Updated classes for better responsive layout and height management -->
    <div id="new-company-modal" class="fixed inset-0 z-50 hidden" aria-labelledby="modal-title" role="dialog"
        aria-modal="true">
        <!-- Backdrop with Fade -->
        <div class="fixed inset-0 bg-black/80 backdrop-blur-sm transition-opacity opacity-0" id="modal-backdrop"></div>

        <!-- Scroll container for the modal -->
        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
                <!-- Modal Panel with Transform & Flex Column -->
                <!-- Changes: Added flex flex-col, max-h constraints, and removed generic overflow-hidden to control it in body -->
                <div class="relative transform rounded-2xl bg-[#0a0a0c] border border-white/10 text-left shadow-2xl transition-all w-full sm:max-w-4xl flex flex-col max-h-[90vh] glass-effect opacity-0 scale-95"
                    id="modal-panel">

                    <!-- Header (Fixed) -->
                    <div
                        class="border-b border-white/10 px-6 py-4 flex justify-between items-center bg-white/5 shrink-0 backdrop-blur-xl rounded-t-2xl">
                        <div class="flex items-center gap-3">
                            <div class="p-2 bg-primary/20 rounded-lg text-primary">
                                <span class="material-symbols-outlined text-xl">domain_add</span>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold leading-6 text-white" id="modal-title">Registrar Nueva
                                    Empresa</h3>
                                <p class="text-xs text-slate-400">Completa la información para dar de alta una
                                    organización.</p>
                            </div>
                        </div>
                        <button type="button" onclick="closeModal('new-company-modal')"
                            class="text-slate-400 hover:text-white transition-colors rounded-lg hover:bg-white/10 p-1">
                            <span class="material-symbols-outlined">close</span>
                        </button>
                    </div>

                    <!-- Scrollable Body (Flexible) -->
                    <!-- Changes: overflow-y-auto, flex-1, removed max-h-75vh -->
                    <div class="px-6 py-6 flex-1 overflow-y-auto custom-scrollbar">
                        <form class="space-y-8">

                            <!-- Sección 1: Identidad -->
                            <div class="grid grid-cols-1 md:grid-cols-12 gap-6">
                                <!-- Logo Upload -->
                                <div class="md:col-span-3 flex flex-col items-center">
                                    <div class="relative group cursor-pointer w-full aspect-square max-w-[180px] bg-slate-800/50 rounded-2xl border-2 border-dashed border-slate-700 hover:border-primary transition-all flex items-center justify-center overflow-hidden"
                                        onclick="document.getElementById('company-logo').click()">
                                        <input type="file" id="company-logo" class="hidden" accept="image/*"
                                            onchange="previewImage(event)">
                                        <img id="logo-preview" class="w-full h-full object-contain p-2 hidden"
                                            alt="Preview">
                                        <div id="logo-placeholder" class="text-center p-4">
                                            <span
                                                class="material-symbols-outlined text-3xl text-slate-500 mb-2 group-hover:text-primary transition-colors">add_photo_alternate</span>
                                            <p class="text-xs text-slate-400 font-medium">Subir Logo</p>
                                        </div>
                                    </div>
                                    <p class="text-[10px] text-slate-500 mt-2 text-center">Recomendado: 512x512px (PNG)
                                    </p>
                                </div>

                                <!-- Datos Principales -->
                                <div class="md:col-span-9 grid grid-cols-1 md:grid-cols-2 gap-5">
                                    <div class="md:col-span-2">
                                        <label
                                            class="block text-xs font-bold text-slate-400 uppercase mb-1.5 ml-1">Nombre
                                            Comercial <span class="text-red-500">*</span></label>
                                        <input type="text" name="name" wire:model.defer="name"
                                            class="w-full bg-slate-900/50 border border-slate-700 rounded-xl px-4 py-2.5 text-white focus:ring-2 focus:ring-primary focus:border-transparent placeholder:text-slate-600 text-sm"
                                            placeholder="Ej. Logistics Pro S.A.C." required>
                                    </div>

                                    <div>
                                        <label class="block text-xs font-bold text-slate-400 uppercase mb-1.5 ml-1">RUC
                                            <span class="text-red-500">*</span></label>
                                        <input type="text" name="ruc" wire:model.defer="ruc"
                                            class="w-full bg-slate-900/50 border border-slate-700 rounded-xl px-4 py-2.5 text-white focus:ring-2 focus:ring-primary focus:border-transparent placeholder:text-slate-600 text-sm font-mono"
                                            placeholder="20123456789">
                                    </div>

                                    <div>
                                        <label
                                            class="block text-xs font-bold text-slate-400 uppercase mb-1.5 ml-1">Color
                                            Primario</label>
                                        <div class="flex items-center gap-2">
                                            <div class="relative w-full">
                                                <div id="color-box"
                                                    class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 rounded-full border border-white/20 bg-[#4030e8]">
                                                </div>
                                                <input type="text" id="color-hex" name="color_primary"
                                                    wire:model.defer="color_primary" value="#4030e8"
                                                    oninput="updateColorPreview(this.value)"
                                                    class="w-full bg-slate-900/50 border border-slate-700 rounded-xl pl-10 pr-4 py-2.5 text-white focus:ring-2 focus:ring-primary focus:border-transparent placeholder:text-slate-600 text-sm uppercase font-mono">
                                            </div>
                                            <input type="color" wire:model.defer="color_primary"
                                                class="h-10 w-10 p-0 border-0 rounded-xl bg-transparent cursor-pointer"
                                                value="#4030e8" oninput="updateColorInput(this.value)">
                                        </div>
                                    </div>

                                    <div class="md:col-span-2">
                                        <label
                                            class="block text-xs font-bold text-slate-400 uppercase mb-1.5 ml-1">Eslogan</label>
                                        <input type="text" name="slogan" wire:model.defer="slogan"
                                            class="w-full bg-slate-900/50 border border-slate-700 rounded-xl px-4 py-2.5 text-white focus:ring-2 focus:ring-primary focus:border-transparent placeholder:text-slate-600 text-sm"
                                            placeholder="Ej. Tu carga segura a tiempo">
                                    </div>

                                    <div class="md:col-span-2">
                                        <label
                                            class="block text-xs font-bold text-slate-400 uppercase mb-1.5 ml-1">Descripción</label>
                                        <textarea name="description" wire:model.defer="description" rows="2"
                                            class="w-full bg-slate-900/50 border border-slate-700 rounded-xl px-4 py-2.5 text-white focus:ring-2 focus:ring-primary focus:border-transparent placeholder:text-slate-600 text-sm resize-none"
                                            placeholder="Breve descripción de la empresa..."></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="h-px bg-white/5 w-full"></div>

                            <!-- Sección 2: Contacto y Redes -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Contacto -->
                                <div class="space-y-4">
                                    <h4 class="text-white font-bold flex items-center gap-2"><span
                                            class="material-symbols-outlined text-primary">contact_mail</span>
                                        Información de Contacto</h4>

                                    <div>
                                        <label
                                            class="block text-xs font-bold text-slate-400 uppercase mb-1.5 ml-1">Email</label>
                                        <input type="email" name="email" wire:model.defer="email"
                                            class="w-full bg-slate-900/50 border border-slate-700 rounded-xl px-4 py-2.5 text-white focus:ring-2 focus:ring-primary focus:border-transparent placeholder:text-slate-600 text-sm"
                                            placeholder="contacto@empresa.com">
                                    </div>

                                    <div>
                                        <label
                                            class="block text-xs font-bold text-slate-400 uppercase mb-1.5 ml-1">Teléfono</label>
                                        <input type="tel" name="phone" wire:model.defer="phone"
                                            class="w-full bg-slate-900/50 border border-slate-700 rounded-xl px-4 py-2.5 text-white focus:ring-2 focus:ring-primary focus:border-transparent placeholder:text-slate-600 text-sm"
                                            placeholder="+51 ...">
                                    </div>

                                    <div>
                                        <label
                                            class="block text-xs font-bold text-slate-400 uppercase mb-1.5 ml-1">Dirección</label>
                                        <input type="text" name="address" wire:model.defer="address"
                                            class="w-full bg-slate-900/50 border border-slate-700 rounded-xl px-4 py-2.5 text-white focus:ring-2 focus:ring-primary focus:border-transparent placeholder:text-slate-600 text-sm"
                                            placeholder="Av. Principal 123">
                                    </div>

                                    <div>
                                        <label
                                            class="block text-xs font-bold text-slate-400 uppercase mb-1.5 ml-1">Sitio
                                            Web</label>
                                        <div class="relative">
                                            <span
                                                class="absolute left-3 top-1/2 -translate-y-1/2 material-symbols-outlined text-slate-500 text-lg">language</span>
                                            <input type="url" name="website" wire:model.defer="website"
                                                class="w-full bg-slate-900/50 border border-slate-700 rounded-xl pl-10 pr-4 py-2.5 text-white focus:ring-2 focus:ring-primary focus:border-transparent placeholder:text-slate-600 text-sm"
                                                placeholder="https://...">
                                        </div>
                                    </div>
                                </div>

                                <!-- Redes Sociales -->
                                <div class="space-y-4">
                                    <h4 class="text-white font-bold flex items-center gap-2"><span
                                            class="material-symbols-outlined text-primary">share</span> Redes Sociales
                                    </h4>

                                    <div>
                                        <label
                                            class="block text-xs font-bold text-slate-400 uppercase mb-1.5 ml-1">WhatsApp</label>
                                        <div class="relative">
                                            <span
                                                class="absolute left-3 top-1/2 -translate-y-1/2 material-symbols-outlined text-slate-500 text-lg">chat</span>
                                            <input type="text" name="whatsapp" wire:model.defer="whatsapp"
                                                class="w-full bg-slate-900/50 border border-slate-700 rounded-xl pl-10 pr-4 py-2.5 text-white focus:ring-2 focus:ring-primary focus:border-transparent placeholder:text-slate-600 text-sm"
                                                placeholder="Número para link directo">
                                        </div>
                                    </div>

                                    <div>
                                        <label
                                            class="block text-xs font-bold text-slate-400 uppercase mb-1.5 ml-1">Facebook</label>
                                        <div class="relative">
                                            <span
                                                class="absolute left-3 top-1/2 -translate-y-1/2 material-symbols-outlined text-slate-500 text-lg">thumb_up</span>
                                            <input type="url" name="facebook" wire:model.defer="facebook"
                                                class="w-full bg-slate-900/50 border border-slate-700 rounded-xl pl-10 pr-4 py-2.5 text-white focus:ring-2 focus:ring-primary focus:border-transparent placeholder:text-slate-600 text-sm"
                                                placeholder="URL del perfil">
                                        </div>
                                    </div>

                                    <div>
                                        <label
                                            class="block text-xs font-bold text-slate-400 uppercase mb-1.5 ml-1">Instagram</label>
                                        <div class="relative">
                                            <span
                                                class="absolute left-3 top-1/2 -translate-y-1/2 material-symbols-outlined text-slate-500 text-lg">photo_camera</span>
                                            <input type="text" name="instagram" wire:model.defer="instagram"
                                                class="w-full bg-slate-900/50 border border-slate-700 rounded-xl pl-10 pr-4 py-2.5 text-white focus:ring-2 focus:ring-primary focus:border-transparent placeholder:text-slate-600 text-sm"
                                                placeholder="@usuario">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="h-px bg-white/5 w-full"></div>

                            <!-- Sección 3: Configuración -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-center">
                                <div>
                                    <label class="block text-xs font-bold text-slate-400 uppercase mb-1.5 ml-1">Plan de
                                        Suscripción</label>
                                    <div class="relative">
                                        <select name="plan" wire:model.defer="plan"
                                            class="w-full bg-slate-900/50 border border-slate-700 rounded-xl px-4 py-2.5 text-white focus:ring-2 focus:ring-primary focus:border-transparent text-sm appearance-none cursor-pointer">
                                            <option value="free">free</option>
                                            <option value="pro" selected>Pro</option>
                                            <option value="enterprise">Entreprise</option>
                                        </select>
                                        <span
                                            class="absolute right-4 top-1/2 -translate-y-1/2 material-symbols-outlined text-slate-500 pointer-events-none">expand_more</span>
                                    </div>
                                </div>

                                <div
                                    class="flex items-center justify-between bg-slate-900/30 p-3 rounded-xl border border-slate-800">
                                    <div>
                                        <p class="text-sm font-bold text-white">Estado de la Cuenta</p>
                                        <p class="text-xs text-slate-500">Desactiva para suspender acceso</p>
                                    </div>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" name="active" wire:model.defer="active"
                                            class="sr-only peer" checked>
                                        <div
                                            class="w-11 h-6 bg-slate-700 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-emerald-500">
                                        </div>
                                    </label>
                                </div>
                            </div>

                        </form>
                    </div>

                    <!-- Footer (Fixed) -->
                    <div
                        class="border-t border-white/10 px-6 py-4 bg-white/5 flex flex-col-reverse sm:flex-row sm:justify-end gap-3 shrink-0 backdrop-blur-xl rounded-b-2xl">
                        <button type="button" onclick="closeModal('new-company-modal')"
                            class="px-5 py-2.5 rounded-xl border border-white/10 text-slate-300 text-sm font-bold hover:bg-white/5 transition-all">
                            Cancelar
                        </button>
                        <button type="button" wire:click="save" data-modal-hide="new-company-modal"
                            class="glow-button px-5 py-2.5 rounded-xl bg-primary text-white text-sm font-bold shadow-lg shadow-primary/20 hover:bg-primary/90 transition-all">
                            Registrar Empresa
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (session()->has('success'))
        <div class="bg-green-100 text-green-700 p-2 rounded mb-3">
            {{ session('success') }}
        </div>
    @endif

    <div class="glass-effect rounded-2xl border border-glass-border overflow-hidden flex flex-col">

        <div class="p-5 border-b border-glass-border flex flex-col sm:flex-row sm:items-center justify-between gap-4">

            <div class="relative w-full sm:max-w-xs">

                <span
                    class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-lg">
                    search
                </span>

                <input type="text" name="search" wire:model.live.debounce.400ms="search"
                    placeholder="Buscar por Nombre o RUC..."
                    class="w-full bg-slate-900/50 border border-slate-700 text-sm rounded-lg pl-10 pr-4 py-2 text-white focus:ring-1 focus:ring-primary focus:border-primary placeholder:text-slate-500 transition-all">
            </div>
        </div>


        <div class="overflow-x-auto w-full">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-white/5 border-b border-glass-border">
                        <th class="px-6 py-4 text-xs font-bold text-slate-400 uppercase tracking-wider w-16">
                            ID
                        </th>
                        <th class="px-6 py-4 text-xs font-bold text-slate-400 uppercase tracking-wider">
                            Nombre Comercial
                        </th>
                        <th class="px-6 py-4 text-xs font-bold text-slate-400 uppercase tracking-wider">
                            RUC
                        </th>
                        <th
                            class="px-6 py-4 text-xs font-bold text-slate-400 uppercase tracking-wider hidden md:table-cell">
                            Plan
                        </th>
                        <th
                            class="px-6 py-4 text-xs font-bold text-slate-400 uppercase tracking-wider hidden lg:table-cell">
                            Contacto
                        </th>
                        <th class="px-6 py-4 text-xs font-bold text-slate-400 uppercase tracking-wider text-right">
                            Acciones
                        </th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-glass-border">

                    @forelse ($companies as $c)
                        <tr class="group hover:bg-white/5 transition-colors">

                            {{-- ID --}}
                            <td class="px-6 py-4 text-sm font-mono text-slate-500">
                                #{{ str_pad($c->id, 3, '0', STR_PAD_LEFT) }}
                            </td>

                            {{-- NOMBRE --}}
                            <td class="px-6 py-4">
                                <div class="font-bold text-white">{{ $c->name }}</div>
                                <div class="text-xs text-slate-500 md:hidden">{{ $c->ruc }}</div>
                            </td>

                            {{-- RUC --}}
                            <td class="px-6 py-4">
                                <span
                                    class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold
                        bg-purple-500/10 text-purple-400 border border-purple-500/20 font-mono">
                                    <span class="material-symbols-outlined text-[14px]">badge</span>
                                    {{ $c->ruc ?? 'S/N' }}
                                </span>
                            </td>

                            {{-- PLAN --}}
                            <td class="px-6 py-4 hidden md:table-cell">
                                <span
                                    class="px-3 py-1 rounded-full text-xs font-bold
                        @if ($c->plan === 'free') bg-gray-500/10 text-gray-400 border
                        @elseif($c->plan === 'pro') bg-blue-500/10 text-blue-400 border border-blue-500/20
                        @else bg-green-500/10 text-green-400 border @endif">
                                    {{ ucfirst($c->plan) }}
                                </span>
                            </td>

                            {{-- CONTACTO --}}
                            <td class="px-6 py-4 text-sm text-slate-300 hidden lg:table-cell">
                                {{ $c->phone ?? '-' }}
                            </td>

                            {{-- ACCIONES --}}
                            <td class="px-6 py-4 text-right">
                                <div
                                    class="flex items-center justify-end gap-2 opacity-60 group-hover:opacity-100 transition-opacity">

                                    <button wire:click="edit({{ $c->id }})"
                                        class="p-2 hover:bg-white/10 rounded-lg text-slate-400 hover:text-white transition-colors"
                                        title="Editar">
                                        <span class="material-symbols-outlined text-[20px]">edit</span>
                                    </button>

                                    <button wire:click="delete({{ $c->id }})"
                                        class="p-2 hover:bg-red-500/10 rounded-lg text-slate-400 hover:text-red-500 transition-colors"
                                        title="Eliminar">
                                        <span class="material-symbols-outlined text-[20px]">delete</span>
                                    </button>

                                </div>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center text-slate-500">
                                <span class="material-symbols-outlined text-4xl mb-2 opacity-20">
                                    domain_disabled
                                </span>
                                <p>No hay empresas registradas aún.</p>
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>

            <div class="p-4 border-t border-glass-border bg-white/5">
                {{ $companies->links() }}
            </div>

        </div>
    </div>
</div>
