<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - The Simple Snack</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css','resources/js/app.js'])

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- Iconify -->
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>

    <style>
        body {
            font-family: 'Poppins', Arial, sans-serif;
        }

        @keyframes pop {
            0% { transform: scale(0.5); opacity: 0; }
            70% { transform: scale(1.08); }
            100% { transform: scale(1); opacity: 1; }
        }

        .animate-pop {
            animation: pop 0.7s ease-out;
        }

        .fade-out {
            transition: opacity 0.8s ease;
        }
    </style>
</head>

<body class="bg-white min-h-screen flex items-center justify-center">

    <div class="w-full max-w-md px-6">

        <!-- Title -->
        <h1 class="text-2xl font-semibold text-center text-pink-600 mb-6">
            Login
        </h1>

        <!-- Card -->
        <div class="bg-pink-50 p-6 rounded-2xl shadow-sm border border-pink-100">

            <!-- POPUP SUCCESS -->
            @if(session('success') == 'register')
                <div id="popupSuccess"
                    class="fixed inset-0 flex items-center justify-center bg-black/40 backdrop-blur-sm z-50 fade-out">

                    <div class="bg-white rounded-3xl px-10 py-8 text-center shadow-xl w-[340px] animate-pop">

                        <!-- ICON -->
                        <div class="flex justify-center mb-4">
                            <div class="bg-green-100 w-20 h-20 flex items-center justify-center rounded-full">
                                <iconify-icon icon="mdi:check-bold"
                                 class="text-green-600 text-4xl"></iconify-icon>
                            </div>
                        </div>

                        <!-- TITLE -->
                        <h2 class="text-lg font-semibold text-gray-700">
                            Pendaftaran Berhasil!
                        </h2>

                        <!-- DESC -->
                        <p class="text-sm text-gray-500 mt-1">
                            Silakan login ke akun Anda
                        </p>
                    </div>
                </div>

                <script>
                    setTimeout(() => {
                        const popup = document.getElementById('popupSuccess');
                        popup.style.opacity = '0';

                        setTimeout(() => popup.remove(), 800);
                    }, 4000);
                </script>
            @endif

            <!-- STATUS -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf

                <!-- EMAIL -->
                <div>
                    <label class="text-sm text-gray-600">Email</label>
                    <div class="relative">
                        <input type="email" name="email" value="{{ old('email') }}"
                            class="w-full mt-1 px-4 py-2 border border-pink-200 rounded-xl bg-white
                                   focus:outline-none focus:ring-0 focus:border-pink-400 pr-10"
                            required autofocus>

                        <iconify-icon icon="mdi:email-outline"
                            class="absolute right-3 top-3 text-gray-400 text-lg"></iconify-icon>
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-1 text-sm" />
                </div>

                <!-- PASSWORD -->
                <div>
                    <label class="text-sm text-gray-600">Password</label>
                    <div class="relative">
                        <input id="password" type="password" name="password"
                            class="w-full mt-1 px-4 py-2 border border-pink-200 rounded-xl bg-white
                                   focus:outline-none focus:ring-0 focus:border-pink-400 pr-10"
                            required>

                        <button type="button" onclick="togglePassword()"
                            class="absolute right-3 top-3 text-gray-400 hover:text-pink-500">

                            <iconify-icon id="eyeIcon" icon="mdi:eye-outline" class="text-lg"></iconify-icon>
                        </button>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-1 text-sm" />
                </div>

                <!-- REMEMBER -->
                <div class="flex items-center justify-between text-sm">
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="remember" class="rounded border-gray-300">
                        <span class="text-gray-600">Remember me</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-pink-500 hover:underline">
                            Forgot?
                        </a>
                    @endif
                </div>

                <!-- BUTTON -->
                <button type="submit"
                    class="w-full bg-pink-500 text-white py-2 rounded-xl hover:bg-pink-600 transition">
                    Log in
                </button>

                <!-- REGISTER -->
                <p class="text-center text-sm text-gray-600">
                    Belum punya akun?
                    <a href="{{ route('register') }}" class="text-pink-500 hover:underline">
                        Register
                    </a>
                </p>

            </form>

        </div>
    </div>

    <!-- TOGGLE PASSWORD -->
    <script>
        function togglePassword() {
            const input = document.getElementById("password");
            const icon = document.getElementById("eyeIcon");

            if (input.type === "password") {
                input.type = "text";
                icon.setAttribute("icon", "mdi:eye-off-outline");
            } else {
                input.type = "password";
                icon.setAttribute("icon", "mdi:eye-outline");
            }
        }
    </script>

</body>
</html>