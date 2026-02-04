<!DOCTYPE html>
<html class="dark" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>{{ config('app.name', 'Logistic Pro') }}</title>
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400;500;600;700;800&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />


    <style>
        body {
            font-family: 'Manrope', sans-serif;
            background: radial-gradient(circle at 0% 0%, rgba(64, 48, 232, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 100% 100%, rgba(64, 48, 232, 0.1) 0%, transparent 50%),
                #0a0a0f;
            min-height: 100vh;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }

        .glow-dot {
            box-shadow: 0 0 15px rgba(64, 48, 232, 0.6);
        }

        .timeline-line {
            background: linear-gradient(180deg, #4030e8 0%, #4030e8 70%, rgba(62, 60, 83, 0.5) 100%);
        }

        .glass-effect {
            backdrop-filter: blur(12px);
            background-color: rgba(18, 17, 33, 0.7);
        }
    </style>
</head>

<body class="bg-background-light dark:bg-background-dark text-white font-display overflow-x-hidden">
    <div class="relative flex min-h-screen w-full flex-col">
        <!-- Top Navigation -->
        <div class="sticky top-0 z-40 glass-effect">
            <header class="flex items-center justify-between px-6 py-6 lg:px-20 max-w-300 mx-auto w-full">
                <div class="flex items-center gap-3">
                    <div
                        class="size-8 bg-primary rounded-lg flex items-center justify-center text-white shadow-lg shadow-primary/20">
                        <span class="material-symbols-outlined text-[20px]">deployed_code</span>
                    </div>
                    <h2 class="text-white text-xl font-bold tracking-tight">LogisticsPro</h2>
                </div>
                <div class="flex gap-3">
                    <button
                        class="flex items-center justify-center rounded-xl h-10 w-10 bg-white/5 border border-white/10 hover:bg-white/10 transition-all">
                        <span class="material-symbols-outlined text-white text-[20px]">language</span>
                    </button>
                </div>
            </header>
        </div>

        <!-- Main Content Area -->
        <main class="flex-1 flex flex-col items-center px-4 py-12 w-full max-w-[800px] mx-auto z-10">
            <!-- Headline -->
            <div class="text-center mb-12">
                <h1 class="text-white text-4xl lg:text-5xl font-extrabold tracking-tight mb-4">
                    Where is your package?
                </h1>
                <p class="text-gray-400 text-lg font-light">Enter your tracking number for real-time updates.</p>
            </div>
            <!-- Search Section -->
            <div class="w-full mb-16">
                <div class="glass-card p-2 rounded-2xl flex items-center gap-2 shadow-2xl">
                    <div class="flex-1 flex items-center px-4 gap-3 min-w-0">
                        <span class="material-symbols-outlined text-gray-400 flex-shrink-0">search</span>
                        <input
                            class="bg-transparent border-none focus:ring-0 text-white w-full py-4 text-lg placeholder:text-gray-600 truncate"
                            placeholder="e.g. #LXP-772390124" type="text" value="#LXP-772390124" />
                    </div>
                    <!-- CHANGED: Button is now an icon only, saving horizontal space -->
                    <button
                        class="bg-primary hover:bg-primary/90 text-white font-bold py-3 px-4 rounded-xl transition-all shadow-lg shadow-primary/30 flex items-center gap-2"
                        aria-label="Search Tracking Number">
                        <span class="material-symbols-outlined text-2xl">search</span>
                        <span class="hidden md:flex">Track Now</span>
                    </button>
                </div>
            </div>
            <!-- Tracking Details / Timeline Header -->
            <div class="w-full flex justify-between items-end mb-8 px-2">
                <div>
                    <h4 class="text-primary font-bold text-sm uppercase tracking-widest mb-1">Status: In Transit</h4>
                    <p class="text-2xl font-semibold text-white">Expected Oct 28, 2023</p>
                </div>
                <div class="text-right">
                    <p class="text-gray-400 text-sm">Last update: 2 hours ago</p>
                </div>
            </div>
            <!-- Timeline Section -->
            <div class="w-full glass-card rounded-3xl p-8 lg:p-12 mb-12">
                <div class="grid grid-cols-[40px_1fr] gap-x-6">
                    <!-- Step 1: Ordered -->
                    <div class="flex flex-col items-center pt-2">
                        <div
                            class="size-6 rounded-full bg-primary flex items-center justify-center text-white text-[14px]">
                            <span class="material-symbols-outlined scale-75">check</span>
                        </div>
                        <div class="w-[2px] bg-primary h-16 opacity-50"></div>
                    </div>
                    <div class="pb-10">
                        <h5 class="text-white text-lg font-bold">Ordered</h5>
                        <p class="text-gray-400 font-normal">Oct 24, 10:00 AM • New York Hub</p>
                        <p class="text-gray-500 text-sm mt-1">Order confirmed and waiting for processing</p>
                    </div>
                    <!-- Step 2: Processed -->
                    <div class="flex flex-col items-center">
                        <div
                            class="size-6 rounded-full bg-primary flex items-center justify-center text-white text-[14px]">
                            <span class="material-symbols-outlined scale-75">check</span>
                        </div>
                        <div class="w-[2px] bg-primary h-16"></div>
                    </div>
                    <div class="pb-10">
                        <h5 class="text-white text-lg font-bold">Processed</h5>
                        <p class="text-gray-400 font-normal">Oct 24, 02:30 PM • New York Hub</p>
                        <p class="text-gray-500 text-sm mt-1">Package has been scanned and is ready for transit</p>
                    </div>
                    <!-- Step 3: In Transit (Active) -->
                    <div class="flex flex-col items-center">
                        <div
                            class="size-8 rounded-full bg-primary glow-dot flex items-center justify-center text-white relative">
                            <span class="material-symbols-outlined scale-90">local_shipping</span>
                            <!-- Pulse Effect -->
                            <div class="absolute inset-0 rounded-full bg-primary animate-ping opacity-20"></div>
                        </div>
                        <div class="w-[2px] h-20 bg-gradient-to-b from-primary to-white/10"></div>
                    </div>
                    <div class="pb-12">
                        <h5 class="text-primary text-xl font-bold">In Transit</h5>
                        <p class="text-gray-200 font-medium">Oct 25, 09:15 AM • On the way to London</p>
                        <div class="mt-4 p-4 rounded-xl bg-white/5 border border-white/5 flex items-center gap-4">
                            <div class="size-16 rounded-lg overflow-hidden shrink-0">
                                <img alt="Map Preview" class="w-full h-full object-cover opacity-60"
                                    data-alt="Abstract dark map with location marker" data-location="London"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuCFO_BK8TCSmau7yg0StTkDGuC2FYOVxIEmjHX2SBYgiBJeXaPyeEpNCBnXPFiCmqvKJ0_UexLMSgSHBpCWLNblTM4pqSYN04L414imuoXQ9tR7HscmORT5Xc88W5sjTmv_NvocDwT3tE5mQjj8ecDcdmAGoH3quEH4W9lZjMLJayb1BuFuacjW23tTvei9n4266bmDEMAoPnvXx6y-QHtkYsKeDLnKLnCicyR6ycC0xvW4aJxdZL804WRzGVttySnr_yzjwNtPQdQ" />
                            </div>
                            <div>
                                <p class="text-xs text-primary font-bold uppercase">Current Location</p>
                                <p class="text-sm text-gray-300">Carrier Departure from International Sorting Center</p>
                            </div>
                        </div>
                    </div>
                    <!-- Step 4: Delivered -->
                    <div class="flex flex-col items-center pb-2">
                        <div
                            class="size-6 rounded-full border-2 border-white/20 flex items-center justify-center text-white/20">
                            <span class="material-symbols-outlined scale-75">home</span>
                        </div>
                    </div>
                    <div>
                        <h5 class="text-white/30 text-lg font-bold">Delivered</h5>
                        <p class="text-white/20 font-normal">Estimated Oct 28</p>
                    </div>
                </div>
            </div>
        </main>

        <!-- Business Footer Info -->
        <footer class="mt-auto w-full z-10 px-4 py-8">
            <div
                class="max-w-[1000px] mx-auto glass-card rounded-2xl p-6 flex flex-col md:flex-row items-center justify-between gap-6">
                <div class="flex items-center gap-4">
                    <div class="size-12 rounded-xl overflow-hidden bg-white/10 border border-white/10 p-2">
                        <img alt="Company Logo" class="w-full h-full object-contain"
                            data-alt="Modern abstract minimalist corporate logo"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuBOUfztqvv0iMAgV8KbF_U4ELdDTD9dXbhRfsZSgMw7kJsEwy7h7_oxjhNW4ErdAa87VPEK8luVaQEqtNa-sbwkdznLeuI81fCravXktAJKl1taHrcPUxPh2SUtDRSsiOCCbSK0eBiDO5_81iaSXamq-PYVpFa4DTd4w_fdkmbhdenJ8jysPJseoR6MOkKfIdUsRfviH15m6VRIprO8xlXe01XrbeqC4IqVtZyy8cgZKAhAlRCqsUzRegp28TtXk35Loo8HyImDRvk" />
                    </div>
                    <div>
                        <h3 class="text-white font-bold text-lg">Global Ship Co.</h3>
                        <p class="text-gray-400 text-sm">Official Logistics Partner</p>
                    </div>
                </div>
                <div class="flex flex-col sm:flex-row items-center gap-4">
                    <p class="text-gray-400 text-sm text-center md:text-right">Having issues with your
                        delivery?<br />Our team is available 24/7.</p>
                    <button
                        class="bg-[#25D366] hover:bg-[#20ba59] text-white font-bold py-3 px-6 rounded-xl flex items-center gap-3 transition-all">
                        <svg class="w-5 h-5 fill-current" viewbox="0 0 24 24">
                            <path
                                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z">
                            </path>
                        </svg>
                        Chat with Support
                    </button>
                </div>
            </div>
            <div class="text-center mt-6 text-gray-600 text-xs">
                © 2023 LogisticsPro International. All rights reserved.
            </div>
        </footer>

    </div>
    <!-- Decorative Elements -->
    <div class="fixed top-0 left-0 w-full h-full pointer-events-none -z-10">
        <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-primary/10 rounded-full blur-[120px]"></div>
        <div class="absolute bottom-1/4 right-1/4 w-[500px] h-[500px] bg-primary/5 rounded-full blur-[150px]"></div>
    </div>
</body>

</html>
