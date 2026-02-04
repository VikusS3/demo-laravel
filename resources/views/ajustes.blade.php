<!DOCTYPE html>
<html class="dark" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Branding Settings - Logistics Pro</title>
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

        .tama-10 {
            font-size: 8px !important;
        }

        .tama-9 {
            font-size: 10px !important;
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

        /* Added glow effect for the main CTA button */
        .glow-button {
            box-shadow: 0 0 20px rgba(64, 48, 232, 0.5);
            transition: all 0.3s ease;
        }

        .glow-button:hover {
            box-shadow: 0 0 30px rgba(64, 48, 232, 0.7);
            transform: translateY(-2px);
        }
    </style>
</head>

<body
    class="bg-background-light dark:bg-background-dark font-display text-slate-900 dark:text-slate-100 min-h-screen overflow-x-hidden">
    <div class="flex ethereal-bg min-h-screen relative">

        <!-- Mobile Backdrop Overlay -->
        <div id="sidebar-backdrop" onclick="closeSidebar()"
            class="fixed inset-0 bg-black/60 backdrop-blur-sm z-40 hidden transition-opacity opacity-0 lg:hidden"></div>

        <!-- Sidebar Navigation -->
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
                <!-- Close button for mobile -->
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
                <a class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-400 hover:bg-white/5 hover:text-white transition-all"
                    href="#">
                    <span class="material-symbols-outlined">local_shipping</span>
                    <span class="text-sm font-semibold">Shipments</span>
                </a>
                <a class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-400 hover:bg-white/5 hover:text-white transition-all"
                    href="#">
                    <span class="material-symbols-outlined">inventory_2</span>
                    <span class="text-sm font-semibold">Inventory</span>
                </a>
                <a class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-400 hover:bg-white/5 hover:text-white transition-all"
                    href="#">
                    <span class="material-symbols-outlined">monitoring</span>
                    <span class="text-sm font-semibold">Analytics</span>
                </a>
                <a class="flex items-center gap-3 px-4 py-3 rounded-xl bg-primary text-white shadow-lg shadow-primary/30 transition-all"
                    href="#">
                    <span class="material-symbols-outlined">palette</span>
                    <span class="text-sm font-semibold">Branding</span>
                </a>
            </nav>

            <div class="p-6">
                <div class="bg-white/5 rounded-xl p-4 border border-glass-border">
                    <p class="text-xs text-slate-400 mb-2 uppercase tracking-widest font-bold">Storage Usage</p>
                    <div class="w-full bg-white/10 h-1.5 rounded-full overflow-hidden">
                        <div class="bg-primary h-full w-[72%]"></div>
                    </div>
                    <p class="text-[10px] text-slate-500 mt-2">720GB of 1TB used</p>
                </div>
                <button
                    class="w-full mt-6 flex items-center justify-center gap-2 px-4 py-3 rounded-xl border border-glass-border text-white text-sm font-bold hover:bg-white/5 transition-all">
                    <span class="material-symbols-outlined text-sm">logout</span>
                    Sign Out
                </button>
            </div>
        </aside>

        <!-- Main Content Area -->
        <main class="flex-1 lg:ml-72 flex flex-col w-full min-w-0 max-w-full">

            <!-- Top Navigation -->
            <header
                class="h-16 lg:h-20 glass-effect border-b border-glass-border flex items-center justify-between px-4 lg:px-8 sticky md:hidden top-0 z-40">
                <div class="flex items-center flex-1 gap-4 min-w-0">
                    <!-- Hamburger Menu Button -->
                    <button onclick="openSidebar()"
                        class="lg:hidden p-2 -ml-2 text-slate-400 hover:text-white rounded-lg hover:bg-white/5 transition-colors flex-shrink-0">
                        <span class="material-symbols-outlined">menu</span>
                    </button>

                    <!-- Search Bar -->
                    <div class="relative w-full max-w-xl min-w-0">
                        <span
                            class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">search</span>
                        <input
                            class="w-full bg-white/5 border border-glass-border rounded-xl py-2.5 pl-12 pr-4 text-sm text-white focus:outline-none focus:ring-2 focus:ring-primary/50 transition-all placeholder:text-slate-500"
                            placeholder="Search orders..." type="text" />
                    </div>
                </div>

                <div class="flex items-center gap-3 lg:gap-6 ml-3 flex-shrink-0">
                    <button class="relative p-2 text-slate-400 hover:text-white transition-colors">
                        <span class="material-symbols-outlined">notifications</span>
                        <span
                            class="absolute top-2 right-2 w-2 h-2 bg-primary rounded-full ring-2 ring-background-dark"></span>
                    </button>
                    <div class="h-8 w-px bg-glass-border hidden sm:block"></div>
                    <div class="flex items-center gap-3 cursor-pointer group">
                        <div class="text-right hidden md:block">
                            <p class="text-sm font-bold text-white leading-tight">Alex Sterling</p>
                            <p class="text-[10px] text-slate-500 uppercase tracking-tighter">Fleet Manager</p>
                        </div>
                        <div
                            class="w-8 h-8 lg:w-10 lg:h-10 rounded-full border-2 border-primary/20 p-0.5 group-hover:border-primary/50 transition-all flex-shrink-0">
                            <img class="w-full h-full rounded-full object-cover"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuBk8-97VhnukGzrKtShd-TnMfOAXrrkBj68YBrx7AYPd36rWAWUvR02l77bMN5m_9Y1dmaeyqmMjbJNZe7pzL_prhnLwNuaof0iGwx27szWMXvePuytyrJvX-GphynZWSiveFJALjPWSkfy_IcF3Rjwgf28dNhXwF6VEhweTRc9tzTA3qlkiPk36MNbb2bdaMxTVUkS1Gmdu33rrgusAEv9IEuMCjZ2dF1FJueymBlR1T81HnD6N_Qt5hjtxZVpW2dzAwidpjzgAUo"
                                alt="User Avatar" />
                        </div>
                    </div>
                </div>
            </header>

            <div class="p-4 lg:p-8 max-w-[1200px] mx-auto w-full">
                <div class="flex flex-col lg:flex-row gap-8">
                    <!-- Left Column: Settings (60%) -->
                    <div class="w-full lg:w-3/5 space-y-8">
                        <!-- Page Heading -->
                        <div class="flex flex-wrap justify-between items-end gap-4">
                            <div class="flex flex-col gap-1">
                                <h1
                                    class="text-slate-900 dark:text-white text-3xl lg:text-4xl font-black leading-tight tracking-tight">
                                    Business Branding</h1>
                                <p class="text-slate-500 dark:text-slate-400 text-base">Customize how your customers see
                                    your tracking pages.</p>
                            </div>
                            <div class="flex gap-3">
                                <button
                                    class="px-6 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 text-slate-700 dark:text-slate-300 font-bold text-sm hover:bg-slate-50 dark:hover:bg-slate-800">Discard</button>
                                <button
                                    class="px-6 py-2.5 rounded-xl bg-primary text-white font-bold text-sm shadow-lg shadow-primary/20 hover:opacity-90 transition-opacity">Save
                                    Changes</button>
                            </div>
                        </div>

                        <!-- Branding Identity Card -->
                        <div
                            class="bg-white dark:bg-slate-900/50 rounded-2xl border border-slate-200 dark:border-slate-800 p-6 space-y-6">
                            <div class="flex items-center gap-3">
                                <span class="material-symbols-outlined text-primary">palette</span>
                                <h2 class="text-slate-900 dark:text-white text-xl font-bold">Brand Identity</h2>
                            </div>

                            <!-- Logo Upload -->
                            <div class="space-y-4">
                                <label class="text-sm font-semibold text-slate-700 dark:text-slate-300">Company
                                    Logo</label>
                                <!-- Functional Logo Upload Area -->
                                <div id="logo-drop-area" onclick="document.getElementById('file-upload').click()"
                                    class="flex flex-col sm:flex-row items-center gap-6 p-6 border-2 border-dashed border-slate-200 dark:border-slate-700 rounded-xl bg-slate-50 dark:bg-slate-800/50 hover:border-primary transition-colors cursor-pointer group">
                                    <input type="file" id="file-upload" class="hidden" accept="image/*"
                                        onchange="previewLogo(event)">

                                    <div
                                        class="w-24 h-24 bg-white dark:bg-slate-700 rounded-lg flex items-center justify-center border border-slate-100 dark:border-slate-600 shadow-sm overflow-hidden relative">
                                        <img id="logo-preview-img" alt="Logo Placeholder"
                                            class="w-16 opacity-50 transition-opacity"
                                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuBNAiP5wvJTNvxiHBvdknwBowZwdPuV4CoHPp6HNKomPRE0XsF1MhGuEJK-NMCrzwiVGtpfiV3bCzGlppgu3Rnz4MEW4TX_ZPOoHIDhAmjn-yE2b4ONNS0Ii8n6z5mbGq9KP89ZYiBA7X4pYm6hDdVMHY6NY4xYTaPPgD7vVSSSCofDej1bd54rIO5gwDAcLU1MI8WyzyhFUhhL3JcdMMnztO-tcVpsJwttFvl48dqeI_AxMAdPrdPjurv0mqPLTKJrn7fp-Pp5-cY" />
                                    </div>
                                    <div class="flex-1 text-center sm:text-left">
                                        <p
                                            class="text-slate-900 dark:text-white font-bold group-hover:text-primary transition-colors">
                                            Upload new logo</p>
                                        <p class="text-slate-500 dark:text-slate-400 text-xs mt-1">PNG, SVG or JPG
                                            (max.
                                            2MB). Recommended size 512x512px.</p>
                                        <button type="button"
                                            class="mt-4 px-4 py-2 bg-white dark:bg-slate-700 border border-slate-200 dark:border-slate-600 rounded-lg text-xs font-bold text-slate-700 dark:text-white hover:bg-slate-50 pointer-events-none">Choose
                                            File</button>
                                    </div>
                                </div>
                            </div>

                            <!-- Color Picker Section -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-4">
                                <div class="space-y-4">
                                    <label
                                        class="text-sm font-semibold text-slate-700 dark:text-slate-300 flex items-center gap-2">
                                        Primary Brand Color
                                        <span class="material-symbols-outlined text-[16px] text-slate-400">info</span>
                                    </label>
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="relative size-12 rounded-xl border-4 border-white dark:border-slate-800 shadow-sm overflow-hidden">
                                            <div id="color-preview" class="w-full h-full bg-primary"></div>
                                            <!-- Native Color Input Hidden but Functional -->
                                            <input type="color" id="native-color-picker"
                                                class="absolute inset-0 w-[150%] h-[150%] -top-1/4 -left-1/4 opacity-0 cursor-pointer"
                                                value="#4030E8" oninput="updateColor(this.value)">
                                        </div>
                                        <input id="hex-input"
                                            class="flex-1 bg-white dark:bg-slate-800 border-slate-200 dark:border-slate-700 rounded-xl px-4 py-2.5 text-sm font-mono focus:ring-primary focus:border-primary uppercase"
                                            type="text" value="#4030E8" onchange="updateColor(this.value)" />
                                    </div>
                                </div>
                                <div class="space-y-4">
                                    <label class="text-sm font-semibold text-slate-700 dark:text-slate-300">Preset
                                        Palettes</label>
                                    <div class="flex gap-3">
                                        <button onclick="updateColor('#2563EB')"
                                            class="size-8 rounded-full bg-blue-600 border-2 border-transparent hover:scale-110 transition-transform"></button>
                                        <button onclick="updateColor('#059669')"
                                            class="size-8 rounded-full bg-emerald-600 border-2 border-transparent hover:scale-110 transition-transform"></button>
                                        <button onclick="updateColor('#E11D48')"
                                            class="size-8 rounded-full bg-rose-600 border-2 border-transparent hover:scale-110 transition-transform"></button>
                                        <button onclick="updateColor('#F59E0B')"
                                            class="size-8 rounded-full bg-amber-500 border-2 border-transparent hover:scale-110 transition-transform"></button>
                                        <button onclick="updateColor('#4030E8')"
                                            class="size-8 rounded-full bg-[#4030E8] border-2 border-white ring-2 ring-[#4030E8] ring-offset-2 dark:ring-offset-slate-900 hover:scale-110 transition-transform"></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Company Profile Section -->
                        <div
                            class="bg-white dark:bg-slate-900/50 rounded-2xl border border-slate-200 dark:border-slate-800 p-6 space-y-6">
                            <div class="flex items-center gap-3">
                                <span class="material-symbols-outlined text-primary">business</span>
                                <h2 class="text-slate-900 dark:text-white text-xl font-bold">Company Profile</h2>
                            </div>
                            <div class="grid grid-cols-1 gap-6">
                                <div class="space-y-2">
                                    <label class="text-sm font-semibold text-slate-700 dark:text-slate-300">Company
                                        Name</label>
                                    <!-- Added ID and oninput handler -->
                                    <input type="text" id="company-name-input"
                                        oninput="updateCompanyName(this.value)"
                                        class="w-full bg-white dark:bg-slate-800 border-slate-200 dark:border-slate-700 rounded-xl px-4 py-2.5 text-sm focus:ring-primary focus:border-primary transition-all"
                                        placeholder="e.g. Logistics Pro">
                                </div>
                                <div class="space-y-2">
                                    <label class="text-sm font-semibold text-slate-700 dark:text-slate-300">Slogan /
                                        Tagline</label>
                                    <input type="text"
                                        class="w-full bg-white dark:bg-slate-800 border-slate-200 dark:border-slate-700 rounded-xl px-4 py-2.5 text-sm focus:ring-primary focus:border-primary transition-all"
                                        placeholder="e.g. Fast & Reliable Delivery">
                                </div>
                                <div class="space-y-2">
                                    <label
                                        class="text-sm font-semibold text-slate-700 dark:text-slate-300">Description</label>
                                    <textarea
                                        class="w-full bg-white dark:bg-slate-800 border-slate-200 dark:border-slate-700 rounded-xl px-4 py-2.5 text-sm focus:ring-primary focus:border-primary transition-all"
                                        rows="3" placeholder="Brief description of your business..."></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Social & Contact Section -->
                        <div
                            class="bg-white dark:bg-slate-900/50 rounded-2xl border border-slate-200 dark:border-slate-800 p-6 space-y-6">
                            <div class="flex items-center gap-3">
                                <span class="material-symbols-outlined text-primary">share</span>
                                <h2 class="text-slate-900 dark:text-white text-xl font-bold">Social Media & Links</h2>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="space-y-2">
                                    <label
                                        class="text-sm font-semibold text-slate-700 dark:text-slate-300">Website</label>
                                    <div class="relative">
                                        <span
                                            class="absolute left-4 top-2.5 text-slate-400 material-symbols-outlined text-[18px]">language</span>
                                        <input type="url"
                                            class="w-full bg-white dark:bg-slate-800 border-slate-200 dark:border-slate-700 rounded-xl pl-10 pr-4 py-2.5 text-sm focus:ring-primary focus:border-primary transition-all"
                                            placeholder="https://example.com">
                                    </div>
                                </div>
                                <div class="space-y-2">
                                    <label
                                        class="text-sm font-semibold text-slate-700 dark:text-slate-300">WhatsApp</label>
                                    <div class="relative">
                                        <span
                                            class="absolute left-4 top-2.5 text-slate-400 material-symbols-outlined text-[18px]">chat</span>
                                        <input type="tel"
                                            class="w-full bg-white dark:bg-slate-800 border-slate-200 dark:border-slate-700 rounded-xl pl-10 pr-4 py-2.5 text-sm focus:ring-primary focus:border-primary transition-all"
                                            placeholder="+1 (555) 000-0000">
                                    </div>
                                </div>
                                <div class="space-y-2">
                                    <label
                                        class="text-sm font-semibold text-slate-700 dark:text-slate-300">Facebook</label>
                                    <div class="relative">
                                        <span
                                            class="absolute left-4 top-2.5 text-slate-400 material-symbols-outlined text-[18px]">thumb_up</span>
                                        <input type="url"
                                            class="w-full bg-white dark:bg-slate-800 border-slate-200 dark:border-slate-700 rounded-xl pl-10 pr-4 py-2.5 text-sm focus:ring-primary focus:border-primary transition-all"
                                            placeholder="facebook.com/page">
                                    </div>
                                </div>
                                <div class="space-y-2">
                                    <label
                                        class="text-sm font-semibold text-slate-700 dark:text-slate-300">Instagram</label>
                                    <div class="relative">
                                        <span
                                            class="absolute left-4 top-2.5 text-slate-400 material-symbols-outlined text-[18px]">photo_camera</span>
                                        <input type="text"
                                            class="w-full bg-white dark:bg-slate-800 border-slate-200 dark:border-slate-700 rounded-xl pl-10 pr-4 py-2.5 text-sm focus:ring-primary focus:border-primary transition-all"
                                            placeholder="@username">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Right Column: Live Preview (40%) -->
                    <div class="w-full lg:w-2/5 relative">
                        <div class="sticky top-4 lg:top-0 space-y-6">
                            <div class="flex items-center justify-between px-2">
                                <h3 class="text-sm font-bold text-slate-400 uppercase tracking-widest">Live Preview
                                </h3>
                                <div class="flex gap-2">
                                    <span
                                        class="material-symbols-outlined text-slate-400 cursor-pointer hover:text-primary transition-colors">smartphone</span>
                                    <span
                                        class="material-symbols-outlined text-slate-400 cursor-pointer hover:text-primary transition-colors">laptop_mac</span>
                                </div>
                            </div>

                            <!-- Phone Mockup Container -->
                            <div
                                class="relative mx-auto w-full max-w-[320px] aspect-[9/18.5] bg-slate-900 rounded-[3rem] border-8 border-slate-800 shadow-2xl overflow-hidden ring-4 ring-slate-800/20">
                                <!-- Screen Header -->
                                <div class="absolute top-0 w-full h-6 flex justify-center z-20">
                                    <div class="w-24 h-5 bg-slate-900 rounded-b-xl"></div>
                                </div>
                                <!-- Screen Content -->
                                <div class="h-full bg-[#0a0a0f] text-white overflow-y-auto relative font-display">
                                    <!-- Background Gradient (simplified) -->
                                    <div class="absolute inset-0 pointer-events-none">
                                        <div
                                            class="absolute top-0 left-0 w-full h-full bg-[radial-gradient(circle_at_0%_0%,rgba(64,48,232,0.15)_0%,transparent_50%)]">
                                        </div>
                                    </div>

                                    <!-- Header -->
                                    <div class="relative z-10 flex items-center justify-between p-4 pt-8">
                                        <div class="flex items-center gap-2">
                                            <div id="mock-status-icon"
                                                class="size-6 bg-primary rounded flex items-center justify-center shadow-lg shadow-primary/20 shrink-0">
                                                <div id="mock-logo-container"
                                                    class="flex items-center justify-center w-full h-full">
                                                    <span
                                                        class="material-symbols-outlined text-[14px]">deployed_code</span>
                                                </div>
                                            </div>
                                            <!-- Added ID for dynamic update -->
                                            <h2 id="mock-company-name" class="text-xs font-bold tracking-tight">
                                                LogisticsPro</h2>
                                        </div>
                                        <div
                                            class="size-6 bg-white/5 rounded-lg border border-white/10 flex items-center justify-center">
                                            <span class="material-symbols-outlined text-[14px]">language</span>
                                        </div>
                                    </div>

                                    <!-- Content -->
                                    <div class="relative z-10 px-4 pb-4">
                                        <div class="text-center mb-6 mt-2">
                                            <h1 class="text-xl font-extrabold mb-1">Where is your package?</h1>
                                            <p class="text-gray-400 text-[10px]">Enter your tracking number for
                                                real-time updates.</p>
                                        </div>

                                        <!-- Search -->
                                        <div
                                            class="bg-white/5 border border-white/10 rounded-xl p-1.5 flex items-center gap-2 mb-6">
                                            <div class="flex-1 px-2 flex items-center gap-2">
                                                <span
                                                    class="material-symbols-outlined text-gray-400 text-sm">search</span>
                                                <span class="text-xs text-white truncate">#LXP-772390124</span>
                                            </div>
                                            <div id="mock-main-btn"
                                                class="bg-primary p-2 rounded-lg text-white shadow-lg shadow-primary/30">
                                                <span class="material-symbols-outlined text-sm">search</span>
                                            </div>
                                        </div>

                                        <!-- Status Header -->
                                        <div class="flex justify-between items-end mb-4">
                                            <div>
                                                <h4 id="mock-eta-text"
                                                    class="text-primary font-bold text-[10px] uppercase tracking-widest mb-0.5">
                                                    Status: In Transit</h4>
                                                <p class="text-sm font-semibold">Exp. Oct 28</p>
                                            </div>
                                            <p class="text-gray-400 text-[10px]">2h ago</p>
                                        </div>

                                        <!-- Timeline -->
                                        <div class="bg-white/5 border border-white/10 rounded-2xl p-4">
                                            <div class="grid grid-cols-[24px_1fr] gap-x-3">
                                                <!-- Step 1 -->
                                                <div class="flex flex-col items-center pt-1">
                                                    <div
                                                        class="size-3 rounded-full bg-primary flex items-center justify-center cambiar-color">
                                                        <span
                                                            class="material-symbols-outlined tama-10 text-white">check</span>
                                                    </div>
                                                    <div class="w-px bg-primary h-8 opacity-50 cambiar-color"></div>
                                                </div>
                                                <div class="pb-4">
                                                    <h5 class="text-xs font-bold">Ordered</h5>
                                                    <p class="text-gray-500 text-[10px]">Oct 24, 10:00 AM</p>
                                                </div>

                                                <!-- Step 2 -->
                                                <div class="flex flex-col items-center">
                                                    <div
                                                        class="size-3 rounded-full bg-primary flex items-center justify-center cambiar-color">
                                                        <span
                                                            class="material-symbols-outlined tama-10 text-white">check</span>
                                                    </div>
                                                    <div class="w-[1px] bg-primary h-8 cambiar-color"></div>
                                                </div>
                                                <div class="pb-4">
                                                    <h5 class="text-xs font-bold">Processed</h5>
                                                    <p class="text-gray-500 text-[10px]">Oct 24, 2:30 PM</p>
                                                </div>

                                                <!-- Step 3 Active -->
                                                <div class="flex flex-col items-center">
                                                    <div id="mock-call-btn"
                                                        class="size-5 rounded-full bg-primary cambiar-color flex items-center justify-center relative z-10">
                                                        <span
                                                            class="material-symbols-outlined tama-9 text-white">local_shipping</span>
                                                    </div>
                                                    <!-- Use ID for color update on this line -->
                                                    <div id="mock-progress-bar"
                                                        class="w-[1px] h-full bg-primary min-h-[3rem] cambiar-color">
                                                    </div>
                                                </div>
                                                <div class="pb-6">
                                                    <h5 id="mock-estado-text" class="text-primary text-xs font-bold">
                                                        In Transit</h5>
                                                    <p class="text-gray-300 text-[10px] mb-2">On the way to London</p>

                                                    <!-- Map Snippet -->
                                                    <div
                                                        class="h-20 w-full bg-slate-800 rounded-lg overflow-hidden relative">
                                                        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuCFO_BK8TCSmau7yg0StTkDGuC2FYOVxIEmjHX2SBYgiBJeXaPyeEpNCBnXPFiCmqvKJ0_UexLMSgSHBpCWLNblTM4pqSYN04L414imuoXQ9tR7HscmORT5Xc88W5sjTmv_NvocDwT3tE5mQjj8ecDcdmAGoH3quEH4W9lZjMLJayb1BuFuacjW23tTvei9n4266bmDEMAoPnvXx6y-QHtkYsKeDLnKLnCicyR6ycC0xvW4aJxdZL804WRzGVttySnr_yzjwNtPQdQ"
                                                            class="w-full h-full object-cover opacity-60">
                                                        <div
                                                            class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                                                            <div class="relative">
                                                                <span id="mock-location-icon"
                                                                    class="material-symbols-outlined text-primary text-xl">location_on</span>
                                                                <div id="mock-location-ping"
                                                                    class="absolute top-1 left-1 size-3 bg-primary animate-ping rounded-full opacity-50">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Step 4 -->
                                                <div class="flex flex-col items-center">
                                                    <div class="size-3 rounded-full border border-white/20"></div>
                                                </div>
                                                <div>
                                                    <h5 class="text-gray-500 text-xs font-bold">Delivered</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer Meta Info -->
            <footer
                class="mt-auto p-6 lg:p-8 border-t border-glass-border glass-effect flex flex-col md:flex-row gap-4 items-center justify-between text-center md:text-left">
                <div class="flex flex-wrap justify-center gap-4 lg:gap-6">
                    <a class="text-xs text-slate-500 hover:text-white transition-colors" href="#">Privacy
                        Policy</a>
                    <a class="text-xs text-slate-500 hover:text-white transition-colors" href="#">Terms of
                        Service</a>
                    <a class="text-xs text-slate-500 hover:text-white transition-colors" href="#">Support
                        Center</a>
                </div>
                <div class="text-xs text-slate-500">
                    © 2024 Logistics Pro Inc. All systems operational.
                </div>
            </footer>
        </main>
    </div>

    <button
        class="fixed bottom-8 right-8 w-14 h-14 bg-white dark:bg-white/10 backdrop-blur-lg border border-white/20 rounded-full shadow-xl flex items-center justify-center text-primary hover:scale-110 transition-transform z-50">
        <span class="material-symbols-outlined">help_center</span>
    </button>

    <!-- Simple Script for Mobile Sidebar Toggle & Interactivity -->
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

        // --- NEW FUNCTIONALITY ---

        // 1. Logo Upload & Live Preview
        function previewLogo(event) {
            const input = event.target;
            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    // Update Settings Preview
                    const settingsPreview = document.getElementById('logo-preview-img');
                    settingsPreview.src = e.target.result;
                    settingsPreview.classList.remove('opacity-50');

                    // Update Mobile Mockup Preview
                    const mockContainer = document.getElementById('mock-logo-container');
                    mockContainer.innerHTML = `<img src="${e.target.result}" class="h-full w-auto object-contain">`;
                    // For the new design, we don't have bg-slate-200 to remove, but this is safe
                    mockContainer.classList.remove('bg-slate-200');
                    mockContainer.classList.add('bg-transparent');
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        // 2. Color Picker & Live Preview
        function updateColor(color) {
            // Update inputs
            document.getElementById('native-color-picker').value = color;
            document.getElementById('hex-input').value = color;
            document.getElementById('color-preview').style.backgroundColor = color;

            // Update Mockup Elements (Live Preview)
            // We use inline styles to override Tailwind classes instantly

            // Backgrounds
            const bgElements = [
                'mock-status-icon',
                'mock-call-btn',
                'mock-progress-bar',
                'mock-main-btn',
                'mock-location-ping'
            ];
            bgElements.forEach(id => {
                const el = document.getElementById(id);
                if (el) el.style.backgroundColor = color;
            });

            //cambiar a los que tenga la clase cambiar-color
            const elements = document.getElementsByClassName('cambiar-color');
            for (let i = 0; i < elements.length; i++) {
                elements[i].style.backgroundColor = color;
            }

            // Text Colors
            const textElements = ['mock-eta-text', 'mock-location-icon', 'mock-estado-text'];
            textElements.forEach(id => {
                const el = document.getElementById(id);
                if (el) el.style.color = color;
            });

            // Update shadow color for the main button to match
            const mainBtn = document.getElementById('mock-main-btn');
            if (mainBtn) {
                // Approximate a shadow color (generic opacity approach not easy with hex, 
                // so we just set the shadow color to the hex itself which browsers handle)
                mainBtn.style.boxShadow = `0 4px 6px -1px ${color}33, 0 2px 4px -1px ${color}1A`;
            }
        }

        // 3. Company Name Live Preview
        function updateCompanyName(name) {
            const mockName = document.getElementById('mock-company-name');
            if (mockName) {
                // If name is empty, revert to default 'LogisticsPro'
                mockName.innerText = name.trim() !== '' ? name : 'LogisticsPro';
            }
        }
    </script>
</body>

</html>
