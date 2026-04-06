<nav class="sidebar close">
    <header>
        <div class="image-text">
            <span class="image">
                <img src="{{url('./images/icon.png')}}" alt="Mali+">
            </span>

            <div class="text header-text">
                <span class="name">Mali+</span>
                <span class="profession">{{ session('usuario_logado', 'Usuário') }}</span>
            </div>
        </div>

        <i class="bx bx-chevron-right toogle"></i>
    </header>

    <div class="menu-bar">
        <div class="menu">
            <ul class="menu-link">
                <li class="nav-link">
                    <a href="{{ route('tasks.index') }}">
                        <i class="bx bx-home-alt icon"></i>
                        <span class="text nav-text">Home</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="{{ route('usuarios.index') }}">
                        <i class="bx bx-group icon"></i>
                        <span class="text nav-text">Clientes</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="#">
                        <i class="bx bx-book-bookmark icon"></i>
                        <span class="text nav-text">Diário</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="#">
                        <i class="bx bx-handshake icon"></i>
                        <span class="text nav-text">Reflexão</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="#">
                        <i class="bx bx-calendar-alt icon"></i>
                        <span class="text nav-text">Agenda</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="bottom-content">
            {{-- Logout via POST (seguro) --}}
            <li class="nav-link">
                <form method="POST" action="{{ route('auth.logout') }}" style="width:100%;">
                    @csrf
                    <button type="submit" style="
                        background: none;
                        border: none;
                        width: 100%;
                        cursor: pointer;
                        height: 50px;
                        display: flex;
                        align-items: center;
                        border-radius: 6px;
                        transition: all 0.4s ease;
                    " onmouseover="this.style.background='var(--pink)'"
                       onmouseout="this.style.background='none'">
                        <i class="bx bx-log-out icon" style="min-width:60px;font-size:20px;color:var(--text-color);"></i>
                        <span class="text nav-text" style="color:var(--text-color);font-size:16px;font-weight:500;">Sair</span>
                    </button>
                </form>
            </li>
        </div>
    </div>
</nav>

<script src="{{ asset('js/script.js') }}"></script>
