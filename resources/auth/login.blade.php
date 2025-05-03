<form method="POST" action="{{ route('login') }}">
    @csrf
    <!-- Campos do formulário de login aqui... -->
    
    <button type="submit">Entrar</button>

    <!-- Botão de cadastrar -->
    <div class="mt-4 text-center">
    <a href="{{ route('register') }}" class="inline-block px-6 py-2 text-white bg-blue-500 hover:bg-blue-700 rounded-md">
    Cadastre-se
</a>

    </div>
</form>
