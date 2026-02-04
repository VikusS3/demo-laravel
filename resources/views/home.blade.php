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
    class="bg-background-light font-display text-slate-900 min-h-screen overflow-x-hidden">
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
                        class="w-10 h-10 bg-primary rounded-lg flex items-center justify-center shadow-lg shadow-primary/20 shrink-0">
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
                <a class="flex items-center gap-3 px-4 py-3 rounded-xl bg-primary text-white shadow-lg shadow-primary/30 transition-all"
                    href="#">
                    <span class="material-symbols-outlined fill-1">dashboard</span>
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
            <!-- FIX: Added min-w-0 to flex-1 container to prevent search from forcing overflow -->
            <header
                class="h-16 lg:h-20 glass-effect border-b border-glass-border flex items-center justify-between px-4 lg:px-8 sticky top-0 z-40">
                <div class="flex items-center flex-1 gap-4 min-w-0">
                    <!-- Hamburger Menu Button -->
                    <button onclick="openSidebar()"
                        class="lg:hidden p-2 -ml-2 text-slate-400 hover:text-white rounded-lg hover:bg-white/5 transition-colors shrink-0">
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

                <div class="flex items-center gap-3 lg:gap-6 ml-3 shrink-0">
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
                            class="w-8 h-8 lg:w-10 lg:h-10 rounded-full border-2 border-primary/20 p-0.5 group-hover:border-primary/50 transition-all shrink-0">
                            <img class="w-full h-full rounded-full object-cover"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuBk8-97VhnukGzrKtShd-TnMfOAXrrkBj68YBrx7AYPd36rWAWUvR02l77bMN5m_9Y1dmaeyqmMjbJNZe7pzL_prhnLwNuaof0iGwx27szWMXvePuytyrJvX-GphynZWSiveFJALjPWSkfy_IcF3Rjwgf28dNhXwF6VEhweTRc9tzTA3qlkiPk36MNbb2bdaMxTVUkS1Gmdu33rrgusAEv9IEuMCjZ2dF1FJueymBlR1T81HnD6N_Qt5hjtxZVpW2dzAwidpjzgAUo"
                                alt="User Avatar" />
                        </div>
                    </div>
                </div>
            </header>

            <div class="p-4 lg:p-8 max-w-300 mx-auto w-full">
                <!-- Page Heading -->
                <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-8">
                    <div>
                        <h2 class="text-2xl lg:text-3xl font-black text-white tracking-tight">Logistics Overview</h2>
                        <p class="text-slate-400 mt-1 text-sm lg:text-base">Monitor your global shipment performance.
                        </p>
                    </div>
                    <div class="flex gap-3 w-full sm:w-auto">
                        <button
                            class="flex-1 sm:flex-none justify-center px-4 lg:px-5 py-2.5 bg-white/5 border border-glass-border rounded-lg text-white text-sm font-bold hover:bg-white/10 transition-all flex items-center gap-2">
                            <span class="material-symbols-outlined text-lg">file_download</span>
                            <span class="hidden sm:inline">Export</span>
                        </button>
                        <button
                            class="flex-1 sm:flex-none justify-center px-4 lg:px-5 py-2.5 bg-primary rounded-lg text-white text-sm font-bold shadow-lg shadow-primary/25 hover:brightness-110 transition-all flex items-center gap-2">
                            <span class="material-symbols-outlined text-lg">add</span>
                            <span>New Shipment</span>
                        </button>
                    </div>
                </div>

                <!-- Metrics Grid -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 lg:gap-6 mb-8 lg:mb-10">
                    <!-- Metric Card 1 -->
                    <div
                        class="relative overflow-hidden glass-effect p-6 rounded-xl group hover:border-primary/40 transition-all">
                        <div
                            class="absolute -right-4 -top-4 w-24 h-24 bg-primary/5 rounded-full blur-2xl group-hover:bg-primary/10 transition-all">
                        </div>
                        <div class="flex justify-between items-start mb-4">
                            <div class="w-12 h-12 bg-primary/20 rounded-lg flex items-center justify-center">
                                <span class="material-symbols-outlined text-primary">distance</span>
                            </div>
                            <span
                                class="text-[#0bda68] text-xs font-bold bg-[#0bda68]/10 px-2 py-1 rounded-md flex items-center gap-1">
                                <span class="material-symbols-outlined text-[14px]">trending_up</span> 12.5%
                            </span>
                        </div>
                        <p class="text-slate-400 text-sm font-medium">Active Shipments</p>
                        <p class="text-3xl font-black text-white mt-1">1,482</p>
                    </div>
                    <!-- Metric Card 2 -->
                    <div
                        class="relative overflow-hidden glass-effect p-6 rounded-xl group hover:border-primary/40 transition-all">
                        <div class="absolute -right-4 -top-4 w-24 h-24 bg-amber-500/5 rounded-full blur-2xl"></div>
                        <div class="flex justify-between items-start mb-4">
                            <div class="w-12 h-12 bg-amber-500/20 rounded-lg flex items-center justify-center">
                                <span class="material-symbols-outlined text-amber-500">pending_actions</span>
                            </div>
                            <span
                                class="text-amber-500 text-xs font-bold bg-amber-500/10 px-2 py-1 rounded-md">Processing</span>
                        </div>
                        <p class="text-slate-400 text-sm font-medium">Pending Orders</p>
                        <p class="text-3xl font-black text-white mt-1">294</p>
                    </div>
                    <!-- Metric Card 3 -->
                    <div
                        class="relative overflow-hidden glass-effect p-6 rounded-xl group hover:border-primary/40 transition-all">
                        <div class="absolute -right-4 -top-4 w-24 h-24 bg-[#0bda68]/5 rounded-full blur-2xl"></div>
                        <div class="flex justify-between items-start mb-4">
                            <div class="w-12 h-12 bg-[#0bda68]/20 rounded-lg flex items-center justify-center">
                                <span class="material-symbols-outlined text-[#0bda68]">task_alt</span>
                            </div>
                            <span
                                class="text-[#0bda68] text-xs font-bold bg-[#0bda68]/10 px-2 py-1 rounded-md">Live</span>
                        </div>
                        <p class="text-slate-400 text-sm font-medium">Delivered Today</p>
                        <p class="text-3xl font-black text-white mt-1">812</p>
                    </div>
                </div>

                <!-- Recent Shipments Table Section -->
                <div class="glass-effect rounded-xl overflow-hidden border border-glass-border">
                    <div
                        class="p-4 lg:p-6 border-b border-glass-border flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                        <h3 class="text-lg font-bold text-white">Recent Shipments</h3>
                        <div class="flex items-center gap-2 overflow-x-auto pb-2 sm:pb-0">
                            <button
                                class="whitespace-nowrap px-3 py-1.5 rounded-lg bg-white/5 border border-glass-border text-xs text-white hover:bg-white/10 transition-colors">All
                                Status</button>
                            <button
                                class="whitespace-nowrap px-3 py-1.5 rounded-lg bg-white/5 border border-glass-border text-xs text-white hover:bg-white/10 transition-colors">Date
                                Range</button>
                        </div>
                    </div>
                    <!-- FIX: Added max-w-full to container to ensure it doesn't overflow parent flex container -->
                    <div class="overflow-x-auto w-full max-w-full">
                        <table class="w-full text-left border-collapse min-w-200">
                            <thead class="bg-white/2">
                                <tr>
                                    <th
                                        class="px-6 py-4 text-[10px] uppercase tracking-widest text-slate-500 font-extrabold">
                                        Shipment ID</th>
                                    <th
                                        class="px-6 py-4 text-[10px] uppercase tracking-widest text-slate-500 font-extrabold">
                                        Destination</th>
                                    <th
                                        class="px-6 py-4 text-[10px] uppercase tracking-widest text-slate-500 font-extrabold">
                                        Status</th>
                                    <th
                                        class="px-6 py-4 text-[10px] uppercase tracking-widest text-slate-500 font-extrabold">
                                        Arrival ETA</th>
                                    <th
                                        class="px-6 py-4 text-[10px] uppercase tracking-widest text-slate-500 font-extrabold text-right">
                                        Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-glass-border">
                                <tr class="group hover:bg-white/5 transition-colors">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="w-8 h-8 rounded bg-primary/10 flex items-center justify-center text-primary">
                                                <span class="material-symbols-outlined text-sm">qr_code_2</span>
                                            </div>
                                            <span class="text-sm font-bold text-white tracking-wide">#LX-90231</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex flex-col">
                                            <span class="text-sm font-semibold text-slate-200">Berlin, Germany</span>
                                            <span class="text-[10px] text-slate-500">Central Distribution Hub</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="px-2 py-1 rounded-full text-[10px] font-bold bg-primary/20 text-primary uppercase border border-primary/30">In
                                            Transit</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="text-sm text-slate-300 font-medium">Today, 4:30 PM</span>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <div class="flex items-center justify-end gap-2">
                                            <button
                                                class="p-2 rounded-lg bg-white/5 text-slate-400 hover:text-white hover:bg-primary/20 transition-all">
                                                <span class="material-symbols-outlined text-[20px]">map</span>
                                            </button>
                                            <button
                                                class="p-2 rounded-lg bg-white/5 text-slate-400 hover:text-white hover:bg-primary/20 transition-all">
                                                <span class="material-symbols-outlined text-[20px]">more_vert</span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="group hover:bg-white/5 transition-colors">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="w-8 h-8 rounded bg-amber-500/10 flex items-center justify-center text-amber-500">
                                                <span class="material-symbols-outlined text-sm">qr_code_2</span>
                                            </div>
                                            <span class="text-sm font-bold text-white tracking-wide">#LX-90184</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex flex-col">
                                            <span class="text-sm font-semibold text-slate-200">Paris, France</span>
                                            <span class="text-[10px] text-slate-500">Local Fulfillment Center</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="px-2 py-1 rounded-full text-[10px] font-bold bg-amber-500/20 text-amber-500 uppercase border border-amber-500/30">Delayed</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="text-sm text-amber-200 font-medium">Tomorrow, 09:00 AM</span>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <div class="flex items-center justify-end gap-2">
                                            <button
                                                class="p-2 rounded-lg bg-white/5 text-slate-400 hover:text-white hover:bg-primary/20 transition-all">
                                                <span class="material-symbols-outlined text-[20px]">map</span>
                                            </button>
                                            <button
                                                class="p-2 rounded-lg bg-white/5 text-slate-400 hover:text-white hover:bg-primary/20 transition-all">
                                                <span class="material-symbols-outlined text-[20px]">more_vert</span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="group hover:bg-white/5 transition-colors">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="w-8 h-8 rounded bg-[#0bda68]/10 flex items-center justify-center text-[#0bda68]">
                                                <span class="material-symbols-outlined text-sm">qr_code_2</span>
                                            </div>
                                            <span class="text-sm font-bold text-white tracking-wide">#LX-89412</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex flex-col">
                                            <span class="text-sm font-semibold text-slate-200">London, UK</span>
                                            <span class="text-[10px] text-slate-500">Port of London Authority</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="px-2 py-1 rounded-full text-[10px] font-bold bg-[#0bda68]/20 text-[#0bda68] uppercase border border-[#0bda68]/30">Delivered</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="text-sm text-slate-300 font-medium">Completed 2h ago</span>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <div class="flex items-center justify-end gap-2">
                                            <button
                                                class="p-2 rounded-lg bg-white/5 text-slate-400 hover:text-white hover:bg-primary/20 transition-all">
                                                <span class="material-symbols-outlined text-[20px]">map</span>
                                            </button>
                                            <button
                                                class="p-2 rounded-lg bg-white/5 text-slate-400 hover:text-white hover:bg-primary/20 transition-all">
                                                <span class="material-symbols-outlined text-[20px]">more_vert</span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="p-4 border-t border-glass-border flex items-center justify-between">
                        <p class="text-xs text-slate-500 font-medium">Showing 10 of 1,482 shipments</p>
                        <div class="flex items-center gap-2">
                            <button
                                class="p-2 rounded-lg bg-white/5 text-slate-400 hover:text-white transition-colors disabled:opacity-30">
                                <span class="material-symbols-outlined">chevron_left</span>
                            </button>
                            <button
                                class="p-2 rounded-lg bg-white/5 text-slate-400 hover:text-white transition-colors">
                                <span class="material-symbols-outlined">chevron_right</span>
                            </button>
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
