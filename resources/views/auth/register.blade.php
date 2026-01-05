<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Register' }} | Ghazi Lab</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Inter:wght@400;500&display=swap" rel="stylesheet">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="/assets/dist/css/style.css">

    <style>
        .form-input.invalid {
            border-color: #dc2626;
        }
        .form-input.valid {
            border-color: #16a34a;
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center hero-bg relative">

    <!-- overlay -->
    <div class="absolute inset-0 bg-black/50"></div>

    @include('sweetalert::alert')

    <!-- REGISTER CARD -->
    <div class="relative z-10 w-full max-w-lg bg-white/95 backdrop-blur-xl rounded-3xl shadow-custom p-8">

        <!-- LOGO -->
        <div class="text-center mb-8">
            <div class="w-16 h-16 mx-auto bg-gradient-to-br from-red-600 to-blue-600 rounded-full flex items-center justify-center mb-4">
                <i class="fas fa-microscope text-white text-2xl"></i>
            </div>
            <h1 class="font-poppins font-bold text-2xl text-slate-800">
                Ghazi Lab
            </h1>
            <p class="text-slate-600 text-sm">
                Create Admin Account
            </p>
        </div>

        <!-- FORM -->
        <form action="/register"
              method="POST"
              class="needs-validation space-y-6"
              novalidate>
            @csrf

            <!-- NAME -->
            <div>
                <label class="block text-slate-700 font-medium mb-2">Full Name</label>
                <div class="relative">
                    <input type="text"
                           name="name"
                           value="{{ old('name') }}"
                           required
                           class="form-input w-full pl-12 pr-4 py-3 rounded-xl border border-slate-300 focus:ring-2 focus:ring-red-500 focus:outline-none"
                           placeholder="Enter full name">
                    <i class="fas fa-user absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                </div>
                <p class="error-text hidden text-sm text-red-600 mt-1">
                    Full name is required
                </p>
            </div>

            <!-- EMAIL -->
            <div>
                <label class="block text-slate-700 font-medium mb-2">Email Address</label>
                <div class="relative">
                    <input type="email"
                           name="email"
                           value="{{ old('email') }}"
                           required
                           class="form-input w-full pl-12 pr-4 py-3 rounded-xl border border-slate-300 focus:ring-2 focus:ring-red-500 focus:outline-none"
                           placeholder="admin@example.com">
                    <i class="fas fa-envelope absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                </div>
                <p class="error-text hidden text-sm text-red-600 mt-1">
                    Please enter a valid email
                </p>
            </div>

            <!-- PASSWORD -->
            <div>
                <label class="block text-slate-700 font-medium mb-2">Password</label>
                <div class="relative">
                    <input type="password"
                           name="password"
                           id="password"
                           required
                           minlength="6"
                           class="form-input w-full pl-12 pr-4 py-3 rounded-xl border border-slate-300 focus:ring-2 focus:ring-red-500 focus:outline-none"
                           placeholder="••••••••">
                    <i class="fas fa-lock absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                </div>
                <p class="error-text hidden text-sm text-red-600 mt-1">
                    Password must be at least 6 characters
                </p>
            </div>

            <!-- CONFIRM PASSWORD -->
            <div>
                <label class="block text-slate-700 font-medium mb-2">Confirm Password</label>
                <div class="relative">
                    <input type="password"
                           name="passwordConfirm"
                           id="passwordConfirm"
                           required
                           class="form-input w-full pl-12 pr-4 py-3 rounded-xl border border-slate-300 focus:ring-2 focus:ring-red-500 focus:outline-none"
                           placeholder="••••••••">
                    <i class="fas fa-lock absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                </div>
                <p class="error-text hidden text-sm text-red-600 mt-1">
                    Passwords do not match
                </p>
            </div>

            <!-- SUBMIT -->
            <button type="submit"
                class="btn-primary-custom w-full text-white py-4 rounded-full font-semibold text-lg inline-flex items-center justify-center pulse-glow">
                <i class="fas fa-user-plus mr-2"></i>
                Register Account
            </button>

            <!-- LOGIN LINK -->
            <p class="text-center text-slate-600 text-sm">
                Already have an account?
                <a href="/login" class="text-red-600 font-semibold hover:underline">
                    Login
                </a>
            </p>
        </form>
    </div>

    <!-- ================= JS VALIDATION ================= -->
    <script>
        (function () {
            'use strict';

            const form = document.querySelector('.needs-validation');
            const password = document.getElementById('password');
            const confirmPassword = document.getElementById('passwordConfirm');

            form.addEventListener('submit', function (event) {
                let isValid = true;

                const inputs = form.querySelectorAll('.form-input');

                inputs.forEach(input => {
                    const errorText = input.parentElement.parentElement.querySelector('.error-text');

                    if (!input.checkValidity()) {
                        isValid = false;
                        input.classList.add('invalid');
                        input.classList.remove('valid');
                        errorText.classList.remove('hidden');
                    } else {
                        input.classList.remove('invalid');
                        input.classList.add('valid');
                        errorText.classList.add('hidden');
                    }
                });

                // Password match validation
                if (password.value !== confirmPassword.value) {
                    isValid = false;
                    confirmPassword.classList.add('invalid');
                    confirmPassword.classList.remove('valid');
                    confirmPassword.parentElement.parentElement
                        .querySelector('.error-text')
                        .classList.remove('hidden');
                }

                if (!isValid) {
                    event.preventDefault();
                    event.stopPropagation();
                }
            });
        })();
    </script>

</body>
</html>
