{{-- Modal de Crear/Editar --}}
<div id="company-modal" class="fixed inset-0 z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <!-- Backdrop -->
    <div class="fixed inset-0 bg-black/80 backdrop-blur-sm transition-opacity" id="modal-backdrop"></div>

    <!-- Scroll Container -->
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">

            <!-- Modal Panel -->
            <div class="relative transform rounded-2xl glass-effect border border-glass-border text-left shadow-2xl transition-all w-full sm:max-w-4xl flex flex-col max-h-[90vh]">

                <!-- Header -->
                <div class="border-b border-glass-border px-6 py-4 flex justify-between items-center bg-white/5 shrink-0 backdrop-blur-xl rounded-t-2xl">
                    <div class="flex items-center gap-3">
                        <div class="p-2 bg-primary/20 rounded-lg text-primary">
                            <span class="material-symbols-outlined text-xl" id="modal-icon">domain_add</span>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-white" id="modal-title">Registrar Nueva Empresa</h3>
                            <p class="text-xs text-slate-400">Completa la información para dar de alta una organización.</p>
                        </div>
                    </div>
                    <button type="button" class="btn-close-modal text-slate-400 hover:text-white transition-colors rounded-lg hover:bg-white/10 p-1">
                        <span class="material-symbols-outlined">close</span>
                    </button>
                </div>

                <!-- Body -->
                <form id="company-form" class="flex flex-col flex-1 overflow-hidden" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="company_id">
                    {{-- _method es usado por Laravel para simular PUT/DELETE en forms --}}
                    <input type="hidden" name="_method" id="_method" value="POST">

                    <div class="px-6 py-6 flex-1 overflow-y-auto custom-scrollbar space-y-8">

                        <div class="grid grid-cols-1 md:grid-cols-12 gap-6">
                            {{-- Logo --}}
                            <div class="md:col-span-3 flex flex-col items-center space-y-2">
                                <div class="relative w-full aspect-square max-w-[160px] bg-white/5 rounded-2xl border-2 border-dashed border-glass-border hover:border-primary transition-all flex items-center justify-center overflow-hidden" id="logo-preview-container">
                                    <!-- Imagen o Placeholder -->
                                    <span class="material-symbols-outlined text-4xl text-slate-500" id="logo-placeholder">add_photo_alternate</span>
                                    <img src="" id="logo-img" class="w-full h-full object-contain p-2 hidden">
                                </div>
                                <input type="file" name="logo" class="hidden" id="logo-input" accept="image/*">
                                <label for="logo-input" class="cursor-pointer px-4 py-2 bg-white/5 border border-glass-border rounded-lg text-sm font-bold text-white hover:bg-white/10 transition">
                                    Subir Logo
                                </label>
                            </div>

                            {{-- Datos Básicos --}}
                            <div class="md:col-span-9 grid grid-cols-1 md:grid-cols-2 gap-5">
                                <div class="md:col-span-2 space-y-2">
                                    <label class="text-sm font-semibold text-slate-300">Nombre Comercial *</label>
                                    <input type="text" name="name" id="name" required class="form-input w-full bg-white/5 border border-glass-border rounded-xl px-4 py-2.5 text-sm text-white focus:outline-none focus:ring-2 focus:ring-primary/50">
                                </div>
                                <div class="space-y-2">
                                    <label class="text-sm font-semibold text-slate-300">RUC</label>
                                    <input type="text" name="ruc" id="ruc" class="form-input w-full bg-white/5 border border-glass-border rounded-xl px-4 py-2.5 text-sm text-white focus:outline-none focus:ring-2 focus:ring-primary/50">
                                </div>
                                <div class="space-y-2">
                                    <label class="text-sm font-semibold text-slate-300">Color Primario</label>
                                    <div class="flex items-center gap-3">
                                        <input type="color" name="color_primary" id="color_primary" class="w-12 h-12 rounded-lg cursor-pointer border border-glass-border bg-transparent p-0" value="#4030E8">
                                        <input type="text" id="color_text" class="flex-1 bg-white/5 border border-glass-border rounded-xl px-4 py-2.5 text-sm text-white font-mono uppercase focus:outline-none focus:ring-2 focus:ring-primary/50" value="#4030E8" readonly>
                                    </div>
                                </div>
                                <div class="md:col-span-2 space-y-2">
                                    <label class="text-sm font-semibold text-slate-300">Slogan</label>
                                    <input type="text" name="slogan" id="slogan" class="form-input w-full bg-white/5 border border-glass-border rounded-xl px-4 py-2.5 text-sm text-white focus:outline-none focus:ring-2 focus:ring-primary/50">
                                </div>
                                <div class="md:col-span-2 space-y-2">
                                    <label class="text-sm font-semibold text-slate-300">Descripción</label>
                                    <textarea name="description" id="description" rows="2" class="form-input w-full bg-white/5 border border-glass-border rounded-xl px-4 py-2.5 text-sm text-white resize-none focus:outline-none focus:ring-2 focus:ring-primary/50"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="h-px bg-white/10"></div>

                        {{-- Contacto y Redes --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-4">
                                <h4 class="text-white font-bold">Información de Contacto</h4>
                                <div class="space-y-3">
                                    <div>
                                        <label class="block text-xs font-bold text-slate-400 uppercase mb-1">Email</label>
                                        <input type="email" name="email" id="email" class="form-input w-full bg-white/5 border border-glass-border rounded-xl px-4 py-2.5 text-sm text-white focus:outline-none focus:ring-2 focus:ring-primary/50">
                                    </div>
                                    <div>
                                        <label class="block text-xs font-bold text-slate-400 uppercase mb-1">Teléfono</label>
                                        <input type="tel" name="phone" id="phone" class="form-input w-full bg-white/5 border border-glass-border rounded-xl px-4 py-2.5 text-sm text-white focus:outline-none focus:ring-2 focus:ring-primary/50">
                                    </div>
                                    <div>
                                        <label class="block text-xs font-bold text-slate-400 uppercase mb-1">Dirección</label>
                                        <input type="text" name="address" id="address" class="form-input w-full bg-white/5 border border-glass-border rounded-xl px-4 py-2.5 text-sm text-white focus:outline-none focus:ring-2 focus:ring-primary/50">
                                    </div>
                                    <div>
                                        <label class="block text-xs font-bold text-slate-400 uppercase mb-1">Web</label>
                                        <input type="url" name="website" id="website" class="form-input w-full bg-white/5 border border-glass-border rounded-xl px-4 py-2.5 text-sm text-white focus:outline-none focus:ring-2 focus:ring-primary/50">
                                    </div>
                                </div>
                            </div>

                            <div class="space-y-4">
                                <h4 class="text-white font-bold">Redes Sociales</h4>
                                <div class="space-y-3">
                                    <div>
                                        <label class="block text-xs font-bold text-slate-400 uppercase mb-1">Facebook</label>
                                        <div class="relative">
                                            <span class="absolute left-3 top-1/2 -translate-y-1/2 material-symbols-outlined text-slate-500 text-lg">thumb_up</span>
                                            <input type="url" name="facebook" id="facebook" class="form-input w-full bg-white/5 border border-glass-border rounded-xl pl-10 pr-4 py-2.5 text-sm text-white focus:outline-none focus:ring-2 focus:ring-primary/50">
                                        </div>
                                    </div>
                                    <div>
                                        <label class="block text-xs font-bold text-slate-400 uppercase mb-1">WhatsApp</label>
                                        <div class="relative">
                                            <span class="absolute left-3 top-1/2 -translate-y-1/2 material-symbols-outlined text-slate-500 text-lg">chat</span>
                                            <input type="text" name="whatsapp" id="whatsapp" class="form-input w-full bg-white/5 border border-glass-border rounded-xl pl-10 pr-4 py-2.5 text-sm text-white focus:outline-none focus:ring-2 focus:ring-primary/50">
                                        </div>
                                    </div>
                                    <div>
                                        <label class="block text-xs font-bold text-slate-400 uppercase mb-1">Instagram</label>
                                        <div class="relative">
                                            <span class="absolute left-3 top-1/2 -translate-y-1/2 material-symbols-outlined text-slate-500 text-lg">photo_camera</span>
                                            <input type="url" name="instagram" id="instagram" class="form-input w-full bg-white/5 border border-glass-border rounded-xl pl-10 pr-4 py-2.5 text-sm text-white focus:outline-none focus:ring-2 focus:ring-primary/50">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="h-px bg-white/10"></div>

                        {{-- Configuración --}}
                        <div class="space-y-2">
                            <label class="text-sm font-semibold text-slate-300">Plan *</label>
                            <select name="plan" id="plan" class="form-select w-full bg-[#1A1925] border border-glass-border rounded-xl px-4 py-2.5 text-sm text-white focus:outline-none focus:ring-2 focus:ring-primary/50">
                                <option value="free">Free</option>
                                <option value="pro">Pro</option>
                                <option value="enterprise">Enterprise</option>
                            </select>
                        </div>

                    </div>

                    <!-- Footer -->
                    <div class="border-t border-glass-border px-6 py-4 bg-white/5 flex justify-end gap-3 shrink-0 rounded-b-2xl">
                        <button type="button" class="btn-close-modal px-5 py-2.5 rounded-xl border border-glass-border text-slate-300 text-sm font-bold hover:bg-white/5 transition-all">
                            Cancelar
                        </button>
                        <button type="submit" id="btn-save" class="px-5 py-2.5 rounded-xl bg-primary text-white text-sm font-bold shadow-lg shadow-primary/20 hover:bg-primary/90 transition-all flex items-center gap-2">
                            <span class="material-symbols-outlined text-lg" id="btn-icon">save</span>
                            <span id="btn-text">Guardar</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>