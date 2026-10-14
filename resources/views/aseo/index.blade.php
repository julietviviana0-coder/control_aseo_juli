
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Control de Aseo Escolar | Alessandro Volta</title>

    <style>
        :root {
            --azul: #17366d;
            --azul-oscuro: #0c1d3c;
            --azul-claro: #eaf1ff;
            --amarillo: #ffd84d;
            --fondo: #f3f6fc;
            --texto: #24334d;
            --gris: #7a879e;
            --verde: #16845b;
            --rojo: #bc3549;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            background: var(--fondo);
            color: var(--texto);
            font-family: "Segoe UI", Arial, sans-serif;
        }

        header {
            color: white;
            padding: 25px 20px 32px;
            background:
                radial-gradient(circle at 95% 0%, #315a9b 0, transparent 32%),
                linear-gradient(120deg, var(--azul-oscuro), var(--azul));
        }

        .contenedor {
            max-width: 1160px;
            margin: auto;
        }

        .colegio {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 28px;
        }

        .logo {
            width: 76px;
            height: 76px;
            object-fit: contain;
            background: white;
            border: 3px solid var(--amarillo);
            border-radius: 50%;
            padding: 3px;
        }

        .nombre-colegio {
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 2px;
            line-height: 1.8;
        }

        .hero {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        h1 {
            font-size: clamp(28px, 4vw, 42px);
            margin: 0;
            letter-spacing: -1px;
        }

        .subtitulo {
            color: #dbe6ff;
            margin: 10px 0 0;
        }

        .insignia {
            border: 1px solid #ffffff50;
            background: #ffffff12;
            padding: 17px 20px;
            border-radius: 15px;
            font-size: 13px;
            line-height: 1.8;
        }

        .insignia strong { color: var(--amarillo); }

        main {
            max-width: 1160px;
            margin: 30px auto;
            padding: 0 20px;
        }

        .bienvenida {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 15px;
        }

        h2 { margin: 0 0 6px; }

        .muted {
            color: var(--gris);
            font-size: 14px;
        }

        .fecha {
            background: white;
            border: 1px solid #e2e8f3;
            border-radius: 12px;
            padding: 13px 16px;
            font-size: 13px;
        }

        .mensaje {
            margin: 18px 0;
            background: #dcf8e9;
            color: #126541;
            border-radius: 12px;
            padding: 14px 17px;
        }

        .estadisticas {
            display: grid;
            grid-template-columns: repeat(5, minmax(0, 1fr));
            gap: 14px;
            margin: 25px 0 30px;
        }

        .estadistica {
            background: white;
            border: 1px solid #e6ebf4;
            border-radius: 16px;
            padding: 18px;
            box-shadow: 0 5px 18px #17366d0a;
        }

        .etiqueta {
            font-size: 12px;
            color: var(--gris);
        }

        .numero {
            display: block;
            color: var(--azul);
            font-size: 30px;
            font-weight: 800;
            margin-top: 8px;
        }

        .barra {
            height: 7px;
            background: #e8edf7;
            border-radius: 20px;
            overflow: hidden;
            margin-top: 13px;
        }

        .barra div {
            height: 100%;
            background: var(--verde);
            border-radius: 20px;
        }

        .titulo-seccion {
            font-size: 20px;
            margin: 28px 0 14px;
        }

        .dias {
            display: flex;
            gap: 9px;
            overflow-x: auto;
            padding: 3px 1px 15px;
        }

        .dia {
            white-space: nowrap;
            text-decoration: none;
            background: white;
            color: #40516f;
            border: 1px solid #dfe6f2;
            border-radius: 11px;
            padding: 12px 20px;
            font-weight: 700;
            transition: .2s;
        }

        .dia:hover {
            border-color: var(--azul);
            transform: translateY(-2px);
        }

        .dia.activo {
            background: var(--azul);
            color: white;
            border-color: var(--azul);
            box-shadow: 0 5px 12px #17366d25;
        }

        .tarjetas {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 20px;
            margin-top: 12px;
        }

        .tarjeta {
            background: white;
            border: 1px solid #e5ebf5;
            border-radius: 18px;
            padding: 22px;
            box-shadow: 0 7px 22px #18315b0a;
        }

        .cabecera-tarjeta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            padding-bottom: 17px;
            border-bottom: 1px solid #edf0f7;
        }

        .cabecera-tarjeta h3 {
            color: var(--azul);
            margin: 0 0 5px;
            font-size: 20px;
        }

        .icono {
            width: 44px;
            height: 44px;
            display: grid;
            place-items: center;
            border-radius: 13px;
            background: var(--azul-claro);
            color: #245ac4;
            font-size: 23px;
        }

        .pista {
            margin: 0;
            color: var(--gris);
            font-size: 13px;
        }

        .estudiante {
            padding: 17px 0;
            border-bottom: 1px solid #edf0f7;
        }

        .estudiante:last-child { border-bottom: 0; }

        .persona {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 12px;
        }

        .lista {
            width: 36px;
            height: 36px;
            flex-shrink: 0;
            display: grid;
            place-items: center;
            border-radius: 11px;
            background: #eef3ff;
            color: var(--azul);
            font-size: 12px;
            font-weight: 800;
        }

        .nombre {
            font-size: 13px;
            font-weight: 700;
            overflow-wrap: anywhere;
        }

        .estado {
            margin-left: auto;
            white-space: nowrap;
            font-size: 10px;
            padding: 6px 8px;
            border-radius: 20px;
            background: #eff2f7;
            color: #637086;
        }

        .estado.cumplio {
            background: #dcf7e9;
            color: #137548;
        }

        .estado.no_cumplio {
            background: #ffeaec;
            color: #ad3545;
        }

        .estado.ausente {
            background: #fff2d9;
            color: #9c6411;
        }

        .acciones {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
            margin-left: 46px;
        }

        .acciones form { margin: 0; }

        .boton {
            cursor: pointer;
            border: 1px solid #dfe6f2;
            background: white;
            border-radius: 8px;
            padding: 8px 9px;
            color: #53617a;
            font-size: 11px;
            font-weight: 700;
            transition: .2s;
        }

        .boton:hover {
            border-color: var(--azul);
            color: var(--azul);
        }

        .boton.seleccionado {
            background: var(--azul);
            color: white;
            border-color: var(--azul);
        }

        .vacio {
            padding: 22px 0;
            color: var(--gris);
            font-size: 14px;
        }

        footer {
            text-align: center;
            padding: 28px 15px;
            color: var(--gris);
            font-size: 12px;
        }

        .pie-destacado {
            color: var(--azul);
            font-weight: 700;
        }

        @media (max-width: 850px) {
            .estadisticas {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .tarjetas { grid-template-columns: 1fr; }
            .hero { align-items: flex-start; }
        }

        @media (max-width: 450px) {
            .acciones { margin-left: 0; }
            .persona { flex-wrap: wrap; }
            .estado { margin-left: 46px; }
            .logo { width: 62px; height: 62px; }
            .nombre-colegio { font-size: 10px; }
            .tarjeta { padding: 16px; }
        }
    </style>
</head>

<body>

<header>
    <div class="contenedor">
        <div class="colegio">
            <img
                class="logo"
                src="{{ asset('images/logo-volta.png') }}"
                alt="Escudo de la Unidad Educativa Alessandro Volta"
            >

            <div class="nombre-colegio">
                UNIDAD EDUCATIVA<br>
                ALESSANDRO VOLTA
            </div>
        </div>

        <div class="hero">
            <div>
                <h1>Control de Aseo Escolar</h1>
                <p class="subtitulo">
                    3ro Informática A · Organización semanal de limpieza
                </p>
            </div>

            <div class="insignia">
                31 estudiantes<br>
                <strong>Orden · Responsabilidad · Limpieza</strong>
            </div>
        </div>
    </div>
</header>

<main>
    <div class="bienvenida">
        <div>
            <h2>Panel de control</h2>
            <div class="muted">
                Consulta los turnos y registra el cumplimiento del día.
            </div>
        </div>

        <div class="fecha">
            📅 Fecha del turno:
            {{ \Carbon\Carbon::parse($fecha)->format('d/m/Y') }}
        </div>
    </div>

    @if (session('mensaje'))
        <div class="mensaje">
            ✓ {{ session('mensaje') }}
        </div>
    @endif

    <section class="estadisticas">
        <div class="estadistica">
            <div class="etiqueta">Estudiantes asignados</div>
            <strong class="numero">{{ $total }}</strong>
        </div>

        <div class="estadistica">
            <div class="etiqueta">Cumplieron</div>
            <strong class="numero">{{ $cumplidos }}</strong>
        </div>

        <div class="estadistica">
            <div class="etiqueta">Pendientes</div>
            <strong class="numero">{{ $pendientes }}</strong>
        </div>

        <div class="estadistica">
            <div class="etiqueta">Ausentes</div>
            <strong class="numero">{{ $ausentes }}</strong>
        </div>

        <div class="estadistica">
            <div class="etiqueta">Avance del día</div>
            <strong class="numero">{{ $porcentaje }}%</strong>

            <div class="barra">
                <div style="width: {{ max(0, min(100, (float) $porcentaje)) }}%"></div>
            </div>
        </div>
    </section>

    <h2 class="titulo-seccion">📅 Turnos de la semana</h2>

    <nav class="dias">
        @foreach ($dias as $dia)
            <a
                href="{{ route('aseo.index', ['dia' => $dia]) }}"
                class="dia {{ $diaActual === $dia ? 'activo' : '' }}"
            >
                {{ $dia }}
            </a>
        @endforeach
    </nav>

    <div class="tarjetas">
        @foreach (['aula' => 'Aula de clases', 'laboratorio' => 'Laboratorio'] as $area => $titulo)
            <section class="tarjeta">
                <div class="cabecera-tarjeta">
                    <div>
                        <h3>{{ $titulo }}</h3>
                        <p class="pista">
                            {{ $area === 'aula'
                                ? '3 responsables asignados'
                                : '2 responsables en días programados' }}
                        </p>
                    </div>

                    <div class="icono">
                        {{ $area === 'aula' ? '▤' : '⌘' }}
                    </div>
                </div>

                @forelse ($areas[$area] as $item)
                    @php
                        $estudiante = $item['estudiante'];
                        $registro = $item['registro'];

                        $etiquetasEstado = [
                            'cumplio' => 'Cumplió',
                            'no_cumplio' => 'No cumplió',
                            'ausente' => 'Ausente',
                            'pendiente' => 'Pendiente',
                        ];

                        $textoEstado = $etiquetasEstado[$registro->estado]
                            ?? 'Pendiente';
                    @endphp

                    <div class="estudiante">
                        <div class="persona">
                            <div class="lista">
                                {{ str_pad($estudiante->numero_lista, 2, '0', STR_PAD_LEFT) }}
                            </div>

                            <div class="nombre">
                                {{ $estudiante->nombre }}
                            </div>

                            <span class="estado {{ $registro->estado }}">
                                {{ $textoEstado }}
                            </span>
                        </div>

                        <div class="acciones">
                            @foreach ([
                                'cumplio' => '✓ Cumplió',
                                'no_cumplio' => '✕ No cumplió',
                                'ausente' => '⊘ Ausente',
                                'pendiente' => '◷ Pendiente',
                            ] as $estado => $texto)
                                <form
                                    method="POST"
                                    action="{{ route('aseo.actualizar') }}"
                                >
                                    @csrf

                                    <input
                                        type="hidden"
                                        name="registro_id"
                                        value="{{ $registro->id }}"
                                    >

                                    <input
                                        type="hidden"
                                        name="dia"
                                        value="{{ $diaActual }}"
                                    >

                                    <input
                                        type="hidden"
                                        name="estado"
                                        value="{{ $estado }}"
                                    >

                                    <button
                                        type="submit"
                                        class="boton {{ $registro->estado === $estado ? 'seleccionado' : '' }}"
                                        aria-pressed="{{ $registro->estado === $estado ? 'true' : 'false' }}"
                                    >
                                        {{ $texto }}
                                    </button>
                                </form>
                            @endforeach
                        </div>
                    </div>
                @empty
                    <div class="vacio">
                        No hay turno de laboratorio este día.
                    </div>
                @endforelse
            </section>
        @endforeach
    </div>
</main>

<footer>
    <div class="pie-destacado">
        Unidad Educativa Alessandro Volta
    </div>
    Control de Aseo Escolar · 3ro Informática A<br>
    Proyecto estudiantil
</footer>

</body>
</html>
