<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register - The Simple Snack</title>
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
    </style>
</head>

<body class="bg-white min-h-screen flex items-center justify-center">

    <div class="w-full max-w-md px-6 py-10">

        <!-- Title -->
        <h1 class="text-2xl font-semibold text-center text-pink-600 mb-6">
            Create Account
        </h1>

        <!-- Card -->
        <div class="bg-pink-50 p-6 rounded-2xl shadow-sm border border-pink-100">

            <form method="POST" action="{{ route('register') }}" class="space-y-4">
                @csrf

                <!-- Name -->
                <div>
                    <label class="text-sm text-gray-600">Name</label>
                    <div class="relative">
                        <input type="text" name="name" value="{{ old('name') }}"
                            class="w-full mt-1 px-4 py-2 border border-pink-200 rounded-xl bg-white
                                   focus:outline-none focus:ring-0 focus:border-pink-400 pr-10"
                            required autofocus>

                        <iconify-icon icon="mdi:account-outline"
                            class="absolute right-3 top-3 text-gray-400 text-lg"></iconify-icon>
                    </div>
                    <x-input-error :messages="$errors->get('name')" class="mt-1 text-sm" />
                </div>

                <!-- Email -->
                <div>
                    <label class="text-sm text-gray-600">Email</label>
                    <div class="relative">
                        <input type="email" name="email" value="{{ old('email') }}"
                            class="w-full mt-1 px-4 py-2 border border-pink-200 rounded-xl bg-white
                                   focus:outline-none focus:ring-0 focus:border-pink-400 pr-10"
                            required>

                        <iconify-icon icon="mdi:email-outline"
                            class="absolute right-3 top-3 text-gray-400 text-lg"></iconify-icon>
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-1 text-sm" />
                </div>

                <!-- Password -->
                <div>
                    <label class="text-sm text-gray-600">Password</label>
                    <div class="relative">
                        <input id="password" type="password" name="password"
                            class="w-full mt-1 px-4 py-2 border border-pink-200 rounded-xl bg-white
                                   focus:outline-none focus:ring-0 focus:border-pink-400 pr-10"
                            required>

                        <button type="button" onclick="togglePassword('password','eye1')"
                            class="absolute right-3 top-3 text-gray-400 hover:text-pink-500">
                            <iconify-icon id="eye1" icon="mdi:eye-outline" class="text-lg"></iconify-icon>
                        </button>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-1 text-sm" />
                </div>

                <!-- Confirm Password -->
                <div>
                    <label class="text-sm text-gray-600">Confirm Password</label>
                    <div class="relative">
                        <input id="password_confirmation" type="password" name="password_confirmation"
                            class="w-full mt-1 px-4 py-2 border border-pink-200 rounded-xl bg-white
                                   focus:outline-none focus:ring-0 focus:border-pink-400 pr-10"
                            required>

                        <button type="button" onclick="togglePassword('password_confirmation','eye2')"
                            class="absolute right-3 top-3 text-gray-400 hover:text-pink-500">
                            <iconify-icon id="eye2" icon="mdi:eye-outline" class="text-lg"></iconify-icon>
                        </button>
                    </div>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-sm" />
                </div>

                <!-- Button -->
                <button type="submit"
                    class="w-full bg-pink-500 text-white py-2 rounded-xl hover:bg-pink-600 transition">
                    Register
                </button>

                <!-- Login -->
                <p class="text-center text-sm text-gray-600">
                    Sudah punya akun?
                    <a href="{{ route('login') }}" class="text-pink-500 hover:underline">
                        Login
                    </a>
                </p>

            </form>

        </div>
    </div>

    <!-- Toggle Script -->
    <script>
        function togglePassword(inputId, iconId) {
            const input = document.getElementById(inputId);
            const icon = document.getElementById(iconId);

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