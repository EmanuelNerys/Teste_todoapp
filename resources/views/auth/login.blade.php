<x-guest-layout>
    <div class="min-vh-100 d-flex align-items-center justify-content-center bg-light">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10">
                    <div class="card border-0 shadow-lg rounded-4 mx-auto" style="max-width: 900px;">
                        <div class="card-body p-5">
                            <h2 class="text-center fw-bold mb-2 text-primary">Bem-vindo de volta</h2>
                            <p class="text-center text-muted mb-4">Acesse sua conta para continuar</p>

                            <x-auth-session-status class="mb-3" :status="session('status')" />

                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <!-- Email -->
                                <div class="mb-3">
                                    <label for="email" class="form-label fw-semibold">Email</label>
                                    <x-text-input id="email" class="form-control form-control-lg border-secondary shadow-sm" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                                    <x-input-error :messages="$errors->get('email')" class="mt-1 small text-danger" />
                                </div>

                                <!-- Senha -->
                                <div class="mb-3">
                                    <label for="password" class="form-label fw-semibold">Senha</label>
                                    <x-text-input id="password" class="form-control form-control-lg border-secondary shadow-sm" type="password" name="password" required autocomplete="current-password" />
                                    <x-input-error :messages="$errors->get('password')" class="mt-1 small text-danger" />
                                </div>

                                <!-- Lembrar -->
                                <div class="form-check mb-4">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember_me">
                                    <label class="form-check-label text-muted" for="remember_me">
                                        Lembrar-me
                                    </label>
                                </div>

                                <!-- Ação -->
                                <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-3 mb-4">
                                    @if (Route::has('password.request'))
                                        <a class="text-decoration-none text-primary small" href="{{ route('password.request') }}">
                                            Esqueceu sua senha?
                                        </a>
                                    @endif

                                    <button type="submit" class="btn btn-primary btn-lg px-4 shadow-sm rounded-3 w-100 w-md-auto">
                                        Entrar
                                    </button>
                                </div>
                            </form>

                            <hr class="my-4">

                            <div class="text-center">
                                <p class="mb-1">Ainda não tem uma conta?</p>
                                <a href="{{ route('register') }}" class="btn btn-outline-primary rounded-pill px-4">
                                    Cadastre-se
                                </a>
                            </div>
                        </div>
                    </div>
                    <p class="text-center mt-3 text-muted small">
                        © {{ date('Y') }} SeuProjeto. Todos os direitos reservados.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .form-control:focus {
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        }

        .btn-primary {
            background-color: #0d6efd;
            border: none;
            transition: all 0.2s ease-in-out;
        }

        .btn-primary:hover {
            background-color: #004ea1;
            transform: scale(1.03);
        }

        .btn-outline-primary:hover {
            background-color: #0d6efd;
            color: white;
        }

        .card {
            animation: fadeIn 0.6s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(15px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</x-guest-layout>
