<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\RegistroAseo;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AseoController extends Controller
{
    public function index(Request $request)
    {
        $asignaciones = [
            'Lunes' => ['aula' => [0, 1, 2], 'laboratorio' => [15, 16]],
            'Martes' => ['aula' => [3, 4, 5], 'laboratorio' => []],
            'Miércoles' => ['aula' => [6, 7, 8], 'laboratorio' => [17, 18]],
            'Jueves' => ['aula' => [9, 10, 11], 'laboratorio' => []],
            'Viernes' => ['aula' => [12, 13, 14], 'laboratorio' => [19, 20]],
        ];

        $diaActual = $request->query('dia', 'Lunes');

        if (!array_key_exists($diaActual, $asignaciones)) {
            $diaActual = 'Lunes';
        }

        $estudiantes = Estudiante::orderBy('numero_lista')->get();
        $numeroDia = array_search($diaActual, array_keys($asignaciones), true);

        // En fin de semana, mostrar los turnos de la próxima semana escolar.
        $hoy = Carbon::now();
        $inicioSemana = $hoy->copy()->startOfWeek(Carbon::MONDAY);

        if ($hoy->isWeekend()) {
            $inicioSemana->addWeek();
        }

        $fecha = $inicioSemana->copy()->addDays($numeroDia)->toDateString();
        $areas = [];

        foreach (['aula', 'laboratorio'] as $area) {
            $areas[$area] = [];

            foreach ($asignaciones[$diaActual][$area] as $indice) {
                $estudiante = $estudiantes->get($indice);

                if (!$estudiante) {
                    continue;
                }

                $registro = RegistroAseo::firstOrCreate(
                    [
                        'estudiante_id' => $estudiante->id,
                        'fecha' => $fecha,
                        'area' => $area,
                    ],
                    ['estado' => 'pendiente']
                );

                $areas[$area][] = [
                    'estudiante' => $estudiante,
                    'registro' => $registro,
                ];
            }
        }

        $registros = collect($areas)->flatMap(
            fn ($items) => collect($items)->pluck('registro')
        );

        $total = $registros->count();
        $cumplidos = $registros->where('estado', 'cumplio')->count();
        $noCumplieron = $registros->where('estado', 'no_cumplio')->count();
        $ausentes = $registros->where('estado', 'ausente')->count();
        $pendientes = $registros->where('estado', 'pendiente')->count();
        $porcentaje = $total ? (int) round($cumplidos * 100 / $total) : 0;
        $dias = array_keys($asignaciones);

        return view('aseo.index', compact(
            'areas', 'diaActual', 'dias', 'fecha',
            'total', 'cumplidos', 'noCumplieron',
            'ausentes', 'pendientes', 'porcentaje'
        ));
    }

    public function actualizar(Request $request)
    {
        $datos = $request->validate([
            'registro_id' => 'required|integer|exists:registro_aseos,id',
            'estado' => 'required|in:pendiente,cumplio,no_cumplio,ausente',
            'dia' => 'required|in:Lunes,Martes,Miércoles,Jueves,Viernes',
        ]);

        $registro = RegistroAseo::findOrFail($datos['registro_id']);
        $registro->update(['estado' => $datos['estado']]);

        return redirect()
            ->route('aseo.index', ['dia' => $datos['dia']])
            ->with('mensaje', '¡Registro guardado correctamente!');
    }
}