<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="{{url('css/style.css')}}">
    <link rel="stylesheet" href="{{url('css/sidebar.css')}}">
    <link href="https://cdn.boxicons.com/3.0.8/fonts/basic/boxicons.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{url('./images/icon.png')}}">
</head>

<body>
    @include('components/sidebar')
    <section class="home">
        <div class="header-home">
            <a href="#" class="logo">Mali<span>+</span></a>
        </div>

        <div class="content">
            <div class="cards">
                <div class="card">
                    <div class="title">
                        <i class="bx bx-sparkles-alt icon"></i>
                        <p>. Como você está se sentindo?</p>
                    </div>

                    <div class="emojis">
                        <i class="bx bx-happy"></i>
                        <i class="bx bx-smile"></i>
                        <i class="bx bx-meh"></i>
                        <i class="bx bx-sad"></i>
                        <i class="bx bx-tired"></i>
                    </div>
                </div>

                <div class="card">
                    <div class="title">
                        <i class="bx bx-sparkles-alt icon"></i>
                        <p>. Dia da Semana</p>
                    </div>

                    <div class="dias">
                        <p>S</p>
                        <p>T</p>
                        <p>Q</p>
                        <p>Q</p>
                        <p>S</p>
                        <p>S</p>
                        <p>D</p>
                    </div>
                </div>
            </div>

            <div class="menu-home">
                <h1>Minhas Tarefas</h1>

                @if(session('success'))
                <p style="color: green;">{{ session('success') }}</p>
                @endif

                <div class="addTask">
                    <a href="{{ route('tasks.create') }}"><i class="bx bx-plus bx-remove-padding icon"></i></a>
                </div>
            </div>

            <div class="tasks">
                @forelse($tasks as $task)
                <div class="card" onclick="abrirModal('{{ $task->id }}')">
                    <div class="title" style="display:flex;align-items:center;justify-content:space-between;">
                        <h2>{{ $task->nome_tarefa }}</h2>
                        <div class="contentDate">
                            <p class="date">{{$task->data_inicio}}</p>
                            <p> - </p>
                            <p class="time">{{ $task->horario_tarefa}}</p>
                        </div>
                    </div>
                    <div class="conteudo">
                        <p>{{ $task->descricao_tarefa }}</p>
                        <p><strong>Tipo:</strong> {{ $task->tipo_tarefa }}</p>
                        <p><strong>Local:</strong> {{ $task->local_tarefa }}</p>
                    </div>

                    <div class="barra"></div>
                    <div class="rotinas"></div>
                </div>

                <!-- Modal -->
                <div id="modal-{{ $task->id }}" class="modal">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2>{{ $task->nome_tarefa }}</h2>
                            <i class="bx bx-x close-icon" onclick="fecharModal('{{ $task->id }}')"></i>
                        </div>

                        <div class="modal-info">
                            <div class="row">
                                <i class="bx bx-calendar-alt iconModal"></i>
                                <div class="row-date">
                                    <p class="date-title">Data</p>
                                    <p>{{ $task->data_inicio}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <i class="bx bx-clock iconModal"></i>
                                <div class="row-date">
                                    <p class="date-title">Horário</p>
                                    <p>{{ $task->horario_tarefa}}</p>
                                </div>
                            </div>
                        </div>

                        <div class="modal-body">
                            <div class="content-description">
                                <div class="title">
                                    <p>Descrição</p>
                                </div>
                                <p>{{ $task->descricao_tarefa }}</p>
                            </div>

                            <div class="extra">
                                <p><strong>Tipo:</strong> {{ $task->tipo_tarefa }}</p>
                                <p><strong>Local:</strong> {{ $task->local_tarefa }}</p>
                            </div>
                        </div>

                        <div class="modal-actions">
                            <a href="{{ route('tasks.edit', $task->id) }}" onclick="event.stopPropagation()" class="btn editar">
                                <i class="bx bx-edit"></i> Editar
                            </a>

                            <a href="{{ route('tasks.destroy', $task->id) }}"
                                onclick="event.stopPropagation(); event.preventDefault(); if(confirm('Tem certeza?')) { document.getElementById('delete-form-{{ $task->id }}').submit(); }"
                                class="btn excluir">
                                <i class="bx bx-trash"></i> Excluir
                            </a>

                            <form id="delete-form-{{ $task->id }}" action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>

                    </div>
                </div>
                @empty
                <p>Nenhuma tarefa cadastrada.</p>
                @endforelse
            </div>
    </section>
</body>
</html>