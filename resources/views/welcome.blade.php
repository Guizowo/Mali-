<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mali+ | Entrar</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.boxicons.com/3.0.8/fonts/basic/boxicons.min.css" rel="stylesheet">
    <style>
        :root {
            --pink:       #e84393;
            --pink-light: #FF9AB8;
            --pink-pale:  #FFF5F8;
            --pink-mid:   #FF6B9D;
            --text:       #333;
            --text-muted: #9B8FA8;
            --white:      #fff;
            --error-bg:   #fee2e2;
            --error-text: #991b1b;
            --success-bg: #d1fae5;
            --success-text:#065f46;
        }

        * {
            margin: 0; padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
            text-decoration: none;
        }

        body {
            min-height: 100vh;
            background: var(--pink-pale);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* ── Card central ── */
        .container {
            background: var(--white);
            border-radius: 28px;
            padding: 40px 36px;
            width: 100%;
            max-width: 420px;
            box-shadow: 0 20px 60px rgba(232, 67, 147, 0.12);
            animation: fadeUp 0.4s ease;
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(20px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* ── Cabeçalho ── */
        .logoContainer {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 28px;
        }

        .logo {
            width: 64px;
            height: 64px;
            object-fit: contain;
            margin-bottom: 10px;
        }

        .brand {
            font-size: 2rem;
            font-weight: 700;
            color: var(--text);
        }

        .brand span { color: var(--pink); }

        .subtitle {
            font-size: 0.9rem;
            color: var(--text-muted);
            margin-top: 4px;
            transition: 0.3s;
        }

        /* ── Abas Login / Cadastro ── */
        .tabsWrapper {
            display: flex;
            background: var(--pink-pale);
            border-radius: 14px;
            padding: 4px;
            margin-bottom: 24px;
        }

        .tabButton {
            flex: 1;
            padding: 10px;
            border: none;
            background: transparent;
            border-radius: 11px;
            font-size: 0.9rem;
            font-weight: 500;
            color: var(--text-muted);
            cursor: pointer;
            transition: 0.25s;
        }

        .tabButton.activeTab {
            background: var(--white);
            color: var(--pink);
            box-shadow: 0 2px 8px rgba(232, 67, 147, 0.15);
        }

        /* ── Alertas ── */
        .alert {
            padding: 10px 14px;
            border-radius: 10px;
            font-size: 0.85rem;
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .alert-success { background: var(--success-bg); color: var(--success-text); }
        .alert-error   { background: var(--error-bg);   color: var(--error-text);   }

        /* ── Validação Laravel ── */
        .alert-validation {
            background: var(--error-bg);
            color: var(--error-text);
            padding: 10px 14px;
            border-radius: 10px;
            font-size: 0.85rem;
            margin-bottom: 16px;
        }

        .alert-validation ul { padding-left: 18px; }

        /* ── Campos ── */
        .fieldGroup {
            margin-bottom: 16px;
        }

        .label {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 0.8rem;
            font-weight: 500;
            color: var(--text-muted);
            margin-bottom: 6px;
        }

        .label i { font-size: 16px; color: var(--pink-light); }

        .input {
            width: 100%;
            padding: 12px 14px;
            border: 1.5px solid #f0e6f0;
            border-radius: 12px;
            font-size: 0.9rem;
            color: var(--text);
            background: var(--pink-pale);
            outline: none;
            transition: 0.2s;
        }

        .input:focus {
            border-color: var(--pink-light);
            background: var(--white);
            box-shadow: 0 0 0 3px rgba(255, 154, 184, 0.15);
        }

        .input::placeholder { color: #c9b8d0; }

        /* Campo oculto (nome só aparece no cadastro) */
        .hidden { display: none; }

        /* ── Botão principal ── */
        .button {
            width: 100%;
            padding: 13px;
            background: linear-gradient(135deg, var(--pink-mid), var(--pink));
            border: none;
            border-radius: 14px;
            color: var(--white);
            font-size: 0.95rem;
            font-weight: 600;
            cursor: pointer;
            margin-top: 8px;
            transition: 0.25s;
            box-shadow: 0 6px 18px rgba(232, 67, 147, 0.3);
        }

        .button:hover {
            transform: translateY(-1px);
            box-shadow: 0 8px 22px rgba(232, 67, 147, 0.4);
        }

        .button:active { transform: scale(0.98); }

        /* ── Divisor social ── */
        .divider {
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 20px 0 16px;
            color: var(--text-muted);
            font-size: 0.8rem;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: #f0e6f0;
        }

        /* ── Botões sociais ── */
        .socialContainer {
            display: flex;
            gap: 10px;
        }

        .socialBtn {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 11px;
            border: 1.5px solid #f0e6f0;
            border-radius: 12px;
            background: var(--white);
            color: var(--text);
            font-size: 0.85rem;
            font-weight: 500;
            cursor: pointer;
            transition: 0.2s;
        }

        .socialBtn:hover {
            border-color: var(--pink-light);
            background: var(--pink-pale);
        }

        .socialBtn img {
            width: 18px;
            height: 18px;
            object-fit: contain;
        }
    </style>
</head>
<body>

<div class="container">

    {{-- Logo --}}
    <div class="logoContainer">
        <img src="/images/IconMali.png" class="logo" alt="Mali+ logo"
             onerror="this.style.display='none'">
        <div class="brand">Mali<span>+</span></div>
        <div class="subtitle" id="subtitle">Bem-vindo de volta!</div>
    </div>

    {{-- Abas --}}
    <div class="tabsWrapper">
        <button id="loginTab"    class="tabButton activeTab">Login</button>
        <button id="registerTab" class="tabButton">Cadastro</button>
    </div>

    {{-- Alertas de sessão --}}
    @if(session('sucesso'))
        <div class="alert alert-success">
            <i class="bx bx-check-circle"></i>
            {{ session('sucesso') }}
        </div>
    @endif

    @if(session('erro'))
        <div class="alert alert-error">
            <i class="bx bx-error-circle"></i>
            {{ session('erro') }}
        </div>
    @endif

    {{-- Erros de validação do Laravel --}}
    @if($errors->any())
        <div class="alert-validation">
            <ul>
                @foreach($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Formulário --}}
    <form method="POST" action="/auth" id="authForm">
        @csrf

        {{-- Campo nome (só aparece no cadastro) --}}
        <div class="fieldGroup hidden" id="nameField">
            <label class="label">
                <i class="bx bx-user"></i> Nome
            </label>
            <input type="text" name="name" class="input"
                   placeholder="Seu nome completo"
                   value="{{ old('name') }}">
        </div>

        <div class="fieldGroup">
            <label class="label">
                <i class="bx bx-envelope"></i> E-mail
            </label>
            <input type="email" name="email" class="input"
                   placeholder="seu@email.com"
                   value="{{ old('email') }}">
        </div>

        <div class="fieldGroup">
            <label class="label">
                <i class="bx bx-lock-alt"></i> Senha
            </label>
            <input type="password" name="password" class="input"
                   placeholder="••••••••">
        </div>

        <button type="submit" class="button" id="submitBtn">Entrar</button>
    </form>

    {{-- Divisor --}}
    <div class="divider">ou continue com</div>

    {{-- Redes sociais (decorativo) --}}
    <div class="socialContainer">
        <button class="socialBtn" type="button">
            <img src="/images/iconGoogle.png" alt="Google"
                 onerror="this.outerHTML='<i class=\'bx bxl-google\'></i>'">
            Google
        </button>
        <button class="socialBtn" type="button">
            <img src="/images/facebook.png" alt="Facebook"
                 onerror="this.outerHTML='<i class=\'bx bxl-facebook\'></i>'">
            Facebook
        </button>
    </div>

</div>

<script>
    const loginTab    = document.getElementById('loginTab')
    const registerTab = document.getElementById('registerTab')
    const nameField   = document.getElementById('nameField')
    const submitBtn   = document.getElementById('submitBtn')
    const subtitle    = document.getElementById('subtitle')
    const authForm    = document.getElementById('authForm')

    // Se o Laravel retornou erros de validação e o campo "name" tinha valor,
    // significa que veio do formulário de cadastro — mantém aba de cadastro ativa.
    const hadNameField = {{ old('name') ? 'true' : 'false' }};

    let isLogin = !hadNameField

    function updateUI() {
        if (isLogin) {
            nameField.classList.add('hidden')
            nameField.querySelector('input').removeAttribute('required')
            loginTab.classList.add('activeTab')
            registerTab.classList.remove('activeTab')
            submitBtn.textContent = 'Entrar'
            subtitle.textContent  = 'Bem-vindo de volta!'
            authForm.action       = '/login'
        } else {
            nameField.classList.remove('hidden')
            nameField.querySelector('input').setAttribute('required', 'required')
            registerTab.classList.add('activeTab')
            loginTab.classList.remove('activeTab')
            submitBtn.textContent = 'Criar Conta'
            subtitle.textContent  = 'Comece sua jornada!'
            authForm.action       = '/auth'
        }
    }

    loginTab.onclick    = () => { isLogin = true;  updateUI() }
    registerTab.onclick = () => { isLogin = false; updateUI() }

    updateUI()
</script>

</body>
</html>
