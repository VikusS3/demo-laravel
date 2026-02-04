<!DOCTYPE html>
<html class="dark" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Create New Shipment - Logistics Pro</title>
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />

    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#4030e8",
                        "background-light": "#f6f6f8",
                        "background-dark": "#0a0a0c",
                        "glass-dark": "rgba(255, 255, 255, 0.03)",
                        "glass-border": "rgba(255, 255, 255, 0.08)",
                    },
                    fontFamily: {
                        "display": ["Manrope", "sans-serif"]
                    },
                    borderRadius: {
                        "DEFAULT": "0.5rem",
                        "lg": "1rem",
                        "xl": "1.5rem",
                        "full": "9999px"
                    },
                },
            },
        }
    </script>
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
                <a class="flex items-center gap-3 px-4 py-3 rounded-xl bg-primary text-white shadow-lg shadow-primary/30 transition-all"
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
                <a class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-400 hover:bg-white/5 hover:text-white transition-all"
                    href="#">
                    <span class="material-symbols-outlined">group</span>
                    <span class="text-sm font-semibold">Team</span>
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
                class="h-16 lg:h-20 glass-effect border-b border-glass-border flex items-center justify-between px-4 lg:px-8 sticky top-0 z-40">
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
                <!-- Removed inner px-8 to fix alignment on mobile -->
                <div class="flex items-center gap-2 mb-6 text-sm">
                    <a class="text-slate-500 hover:text-primary dark:text-slate-400 dark:hover:text-white transition-colors"
                        href="#">Shipments</a>
                    <span class="material-symbols-outlined text-xs text-slate-400">chevron_right</span>
                    <span class="text-slate-900 dark:text-white font-medium">Create New Shipment</span>
                </div>

                <!-- Header Section -->
                <!-- Removed inner px-8 -->
                <div class="mb-10">
                    <h1 class="text-3xl lg:text-4xl font-extrabold tracking-tight mb-3">Create New Shipment</h1>
                    <p class="text-slate-500 dark:text-slate-400 max-w-2xl leading-relaxed">
                        Enter the details for your new delivery order. The system will automatically generate a unique
                        tracking ID and manifest upon submission.
                    </p>
                </div>

                <!-- Form Card -->
                <!-- Changed glass-card to glass-effect and adjusted padding for mobile -->
                <div class="glass-effect rounded-xl p-4 md:p-8 shadow-2xl">
                    <form class="space-y-8 md:space-y-10">
                        <!-- Section: Tracking ID Preview -->
                        <div
                            class="bg-primary/5 border border-primary/20 rounded-xl p-6 flex flex-col md:flex-row md:items-center justify-between gap-4">
                            <div class="flex items-center gap-4">
                                <div
                                    class="w-12 h-12 rounded-full bg-primary/20 flex items-center justify-center text-primary flex-shrink-0">
                                    <span class="material-symbols-outlined">qr_code_scanner</span>
                                </div>
                                <div>
                                    <p class="text-xs uppercase tracking-widest font-bold text-primary mb-1">Automatic
                                        Tracking ID</p>
                                    <p class="text-lg md:text-xl font-mono font-semibold text-primary break-all">
                                        TRK-2941-XXXX-928</p>
                                </div>
                            </div>
                            <div class="text-xs text-slate-500 dark:text-slate-400 max-w-[200px] leading-snug italic">
                                The ID will be fully generated and activated once the form is submitted.
                            </div>
                        </div>

                        <!-- Section: Customer Information -->
                        <div>
                            <div class="flex items-center gap-2 mb-6">
                                <span class="material-symbols-outlined text-primary text-xl">person</span>
                                <h2 class="text-lg font-bold">Customer Information</h2>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="relative group">
                                    <label
                                        class="block text-xs font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400 mb-2 px-1">Full
                                        Name</label>
                                    <input
                                        class="w-full bg-slate-100 dark:bg-white/5 border border-slate-200 dark:border-white/10 rounded-lg p-4 focus:ring-2 focus:ring-primary focus:border-transparent transition-all placeholder:text-slate-400"
                                        placeholder="e.g. Alexander Pierce" type="text" />
                                </div>
                                <div class="relative group">
                                    <label
                                        class="block text-xs font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400 mb-2 px-1">Email
                                        Address</label>
                                    <input
                                        class="w-full bg-slate-100 dark:bg-white/5 border border-slate-200 dark:border-white/10 rounded-lg p-4 focus:ring-2 focus:ring-primary focus:border-transparent transition-all placeholder:text-slate-400"
                                        placeholder="alex@example.com" type="email" />
                                </div>
                                <div class="relative group md:col-span-2">
                                    <label
                                        class="block text-xs font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400 mb-2 px-1">Phone
                                        Number</label>
                                    <div class="flex gap-2">
                                        <select
                                            class="w-24 bg-slate-100 dark:bg-white/5 border border-slate-200 dark:border-white/10 rounded-lg p-4 focus:ring-2 focus:ring-primary focus:border-transparent transition-all">
                                            <option>+1</option>
                                            <option>+44</option>
                                            <option>+49</option>
                                            <option>+33</option>
                                        </select>
                                        <input
                                            class="flex-1 bg-slate-100 dark:bg-white/5 border border-slate-200 dark:border-white/10 rounded-lg p-4 focus:ring-2 focus:ring-primary focus:border-transparent transition-all placeholder:text-slate-400 min-w-0"
                                            placeholder="(555) 000-0000" type="tel" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="h-px bg-white/5"></div>

                        <!-- Section: Shipping Details -->
                        <div>
                            <div class="flex items-center gap-2 mb-6">
                                <span class="material-symbols-outlined text-primary text-xl">location_on</span>
                                <h2 class="text-lg font-bold">Shipping Details</h2>
                            </div>
                            <div class="space-y-6">
                                <div class="relative group">
                                    <label
                                        class="block text-xs font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400 mb-2 px-1">Destination
                                        Address</label>
                                    <input
                                        class="w-full bg-slate-100 dark:bg-white/5 border border-slate-200 dark:border-white/10 rounded-lg p-4 focus:ring-2 focus:ring-primary focus:border-transparent transition-all placeholder:text-slate-400"
                                        placeholder="123 Industrial Parkway, Suite 400, Chicago, IL" type="text" />
                                </div>
                                <div class="relative group">
                                    <label
                                        class="block text-xs font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400 mb-2 px-1">Special
                                        Instructions / Observations</label>
                                    <textarea
                                        class="w-full bg-slate-100 dark:bg-white/5 border border-slate-200 dark:border-white/10 rounded-lg p-4 focus:ring-2 focus:ring-primary focus:border-transparent transition-all placeholder:text-slate-400 resize-none"
                                        placeholder="Handle with care, delivery only between 9 AM and 5 PM..." rows="4"></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Action Footer -->
                        <div class="pt-6 flex flex-col sm:flex-row items-center justify-between gap-4">
                            <button
                                class="text-slate-500 hover:text-slate-900 dark:text-slate-400 dark:hover:text-white text-sm font-semibold px-6 py-3 transition-colors w-full sm:w-auto text-center"
                                type="button">
                                Clear All Fields
                            </button>
                            <div class="flex flex-col sm:flex-row gap-3 w-full sm:w-auto">
                                <button
                                    class="w-full sm:w-auto px-8 py-4 bg-white/5 hover:bg-white/10 border border-white/10 rounded-lg font-semibold transition-all"
                                    type="button">
                                    Save as Draft
                                </button>
                                <button
                                    class="w-full sm:w-auto glow-button px-10 py-4 bg-primary text-white rounded-lg font-bold text-lg flex items-center justify-center gap-2"
                                    type="submit">
                                    <span>Create Shipment</span>
                                    <span class="material-symbols-outlined text-xl">arrow_forward</span>
                                </button>
                            </div>
                        </div>
                    </form>
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

    <!-- Simple Script for Mobile Sidebar Toggle -->
    <script>
        const sidebar = document.getElementById('sidebar');
        const backdrop = document.getElementById('sidebar-backdrop');

        function openSidebar() {
            sidebar.classList.remove('-translate-x-full');
            backdrop.classList.remove('hidden');
            // Small delay to allow display:block to apply before opacity transition
            setTimeout(() => {
                backdrop.classList.remove('opacity-0');
            }, 10);
        }

        function closeSidebar() {
            sidebar.classList.add('-translate-x-full');
            backdrop.classList.add('opacity-0');
            setTimeout(() => {
                backdrop.classList.add('hidden');
            }, 300); // Wait for transition to finish
        }
    </script>
</body>

</html>
