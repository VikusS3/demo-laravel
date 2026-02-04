<!DOCTYPE html>
<html class="dark" lang="es">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Iniciar Sesión - Logistics Pro</title>
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

        .glow-button {
            box-shadow: 0 0 20px rgba(64, 48, 232, 0.5);
            transition: all 0.3s ease;
        }

        .glow-button:hover {
            box-shadow: 0 0 30px rgba(64, 48, 232, 0.7);
            transform: translateY(-2px);
        }

        /* Animation for background elements */
        @keyframes float {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        .animate-float {
            animation: float 6s ease-in-out infinite;
        }
    </style>
</head>

<body
    class="bg-background-dark font-display text-slate-100 min-h-screen flex items-center justify-center p-4 overflow-y-auto overflow-x-hidden relative">

    <!-- Background Decor -->
    <div class="fixed inset-0 ethereal-bg -z-20"></div>
    <div class="fixed top-0 left-0 w-full h-full pointer-events-none -z-10">
        <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-primary/20 rounded-full blur-[120px] animate-pulse"></div>
        <div class="absolute bottom-1/4 right-1/4 w-[500px] h-[500px] bg-primary/10 rounded-full blur-[150px]"></div>
    </div>

    <!-- Login Container -->
    <div
        class="w-full max-w-6xl h-auto lg:h-[calc(100dvh-2rem)] glass-effect rounded-3xl shadow-2xl flex flex-col lg:flex-row overflow-hidden border border-glass-border my-8 lg:my-0">

        <!-- Left Side: Brand Visual (Hidden on mobile) -->
        <div class="hidden lg:flex w-1/2 bg-slate-900/50 relative flex-col justify-between p-12 overflow-hidden">
            <!-- Decorative Map Background -->
            <div class="absolute inset-0 bg-cover bg-center opacity-30 mix-blend-overlay"
                style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuDk9EmsSW5GMesxKwnulEAFGHYqw3gExgUdWZqwhIKA7NhvtAfqO-emo2iWD9I62ecce8TuSggEs4ASevW-XJCOIuoge5xQuLBn4VCnEVCxaSc6R1DMxZYKhtKIf4JXGSzJHpaAMPZIFTmQIjJcAtq4OTRA7I4tZpk_jT2Zq6ftgLr7LOa4r7DwkfmNGO9-Sdetk5h2zL7a9GRLqKAVTvVFrs-GD_AkbpCSbm9uFaYt7E_dTUFfzT5sUe5mizdNd4xBGWGjvfnl-NI');">
            </div>
            <!-- Gradient Overlay -->
            <div class="absolute inset-0 bg-gradient-to-t from-primary/60 via-[#0a0a0c]/50 to-[#0a0a0c]/10"></div>

            <!-- Logo Area -->
            <div class="relative z-10 flex items-center gap-3 animate-float">
                <div class="size-12 bg-white text-primary rounded-xl flex items-center justify-center shadow-lg">
                    <span class="material-symbols-outlined text-[28px]">rocket_launch</span>
                </div>
                <h1 class="text-3xl font-extrabold tracking-tight text-white">Logistics Pro</h1>
            </div>

            <!-- Quote/Testimonial -->
            <div class="relative z-10 space-y-6">
                <div class="space-y-2">
                    <h2 class="text-3xl font-bold leading-tight">Gestiona tu flota global <br />con precisión.</h2>
                    <p class="text-slate-300 text-lg">Control total desde el almacén hasta la entrega final.</p>
                </div>

                <!-- Stats Pill -->
                <div
                    class="inline-flex items-center gap-3 bg-white/10 backdrop-blur-md border border-white/10 px-4 py-2 rounded-full">
                    <div class="flex -space-x-2">
                        <div class="size-8 rounded-full bg-slate-200 border-2 border-slate-800 bg-cover"
                            style="background-image: url('https://i.pravatar.cc/100?img=1');"></div>
                        <div class="size-8 rounded-full bg-slate-200 border-2 border-slate-800 bg-cover"
                            style="background-image: url('https://i.pravatar.cc/100?img=2');"></div>
                        <div class="size-8 rounded-full bg-slate-200 border-2 border-slate-800 bg-cover"
                            style="background-image: url('https://i.pravatar.cc/100?img=3');"></div>
                    </div>
                    <span class="text-sm font-medium text-white">+2k Empresas confían en nosotros</span>
                </div>
            </div>
        </div>

        <!-- Right Side: Login Form -->
        <div class="w-full lg:w-1/2 p-6 md:p-12 flex flex-col justify-center bg-background-dark/40 backdrop-blur-xl">
            <div class="w-full max-w-md mx-auto space-y-6 lg:space-y-8">

                <!-- Mobile Logo (Visible only on small screens) -->
                <div class="lg:hidden flex items-center justify-center gap-2 mb-4">
                    <div
                        class="size-10 bg-primary rounded-xl flex items-center justify-center text-white shadow-lg shadow-primary/30">
                        <span class="material-symbols-outlined text-lg">rocket_launch</span>
                    </div>
                    <span class="text-2xl font-bold text-white">Logistics Pro</span>
                </div>

                <div class="space-y-2 text-center lg:text-left">
                    <h2 class="text-2xl lg:text-3xl font-bold text-white tracking-tight">Bienvenido de nuevo</h2>
                    <p class="text-slate-400 text-sm lg:text-base">Ingresa tus credenciales para acceder al dashboard.
                    </p>
                </div>

                <form class="space-y-5" onsubmit="event.preventDefault(); window.location.href='dashboard.html'">
                    <!-- Email Input -->
                    <div class="space-y-2">
                        <label class="text-sm font-semibold text-slate-300 ml-1">Correo Electrónico</label>
                        <div class="relative group">
                            <span
                                class="absolute left-4 top-3.5 text-slate-500 group-focus-within:text-primary transition-colors material-symbols-outlined text-[20px]">mail</span>
                            <input type="email"
                                class="w-full bg-white/5 border border-glass-border rounded-xl pl-12 pr-4 py-3 text-white placeholder:text-slate-500 focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-primary transition-all"
                                placeholder="nombre@empresa.com" required>
                        </div>
                    </div>

                    <!-- Password Input -->
                    <div class="space-y-2">
                        <div class="flex justify-between items-center ml-1">
                            <label class="text-sm font-semibold text-slate-300">Contraseña</label>
                            <a href="#"
                                class="text-xs text-primary hover:text-primary/80 font-medium transition-colors">¿Olvidaste
                                tu contraseña?</a>
                        </div>
                        <div class="relative group">
                            <span
                                class="absolute left-4 top-3.5 text-slate-500 group-focus-within:text-primary transition-colors material-symbols-outlined text-[20px]">lock</span>
                            <input type="password" id="password"
                                class="w-full bg-white/5 border border-glass-border rounded-xl pl-12 pr-12 py-3 text-white placeholder:text-slate-500 focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-primary transition-all"
                                placeholder="••••••••" required>
                            <button type="button" onclick="togglePassword()"
                                class="absolute right-4 top-3.5 text-slate-500 hover:text-white transition-colors">
                                <span class="material-symbols-outlined text-[20px]" id="eye-icon">visibility</span>
                            </button>
                        </div>
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center">
                        <input id="remember-me" type="checkbox"
                            class="w-4 h-4 text-primary bg-white/5 border-slate-600 rounded focus:ring-primary focus:ring-offset-0 focus:ring-offset-transparent">
                        <label for="remember-me" class="ml-2 block text-sm text-slate-400">Recordar dispositivo</label>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="w-full py-3.5 px-4 bg-primary hover:bg-primary/90 text-white font-bold rounded-xl glow-button flex items-center justify-center gap-2 transition-all transform active:scale-[0.98]">
                        <span>Iniciar Sesión</span>
                        <span class="material-symbols-outlined text-lg">arrow_forward</span>
                    </button>
                </form>

                <!-- Divider -->
                <div class="relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-glass-border"></div>
                    </div>
                    <div class="relative flex justify-center text-xs uppercase">
                        <span class="bg-[#0e0e12] px-2 text-slate-500">O continúa con</span>
                    </div>
                </div>

                <!-- Social Login -->
                <div class="grid grid-cols-1 gap-4">
                    <button
                        class="flex items-center justify-center gap-2 py-2.5 px-4 bg-white/5 border border-glass-border rounded-xl hover:bg-white/10 transition-all group">
                        <img src="https://www.svgrepo.com/show/475656/google-color.svg"
                            class="w-5 h-5 group-hover:scale-110 transition-transform" alt="Google">
                        <span class="text-sm font-medium text-slate-300">Google</span>
                    </button>
                </div>

                <!-- Sign Up Link -->
                <p class="text-center text-sm text-slate-400 mt-4 lg:mt-8">
                    ¿No tienes una cuenta?
                    <a href="#" class="text-primary font-bold hover:text-primary/80 transition-colors">Solicitar
                        Acceso</a>
                </p>
            </div>
        </div>
    </div>

    <!-- Toggle Password Script -->
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.innerText = 'visibility_off';
            } else {
                passwordInput.type = 'password';
                eyeIcon.innerText = 'visibility';
            }
        }
    </script>
    <script src="https://accounts.google.com/gsi/client" async defer></script>
    <script>
        function handleGoogleLogin(response) {
            fetch("/auth/google/token", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({
                    credential: response.credential
                })
            }).then(res => window.location = "/");
        }
    </script>

</body>

</html>
