<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProyectoController extends Controller
{
    /**
     * Retorna los proyectos para usarse en el <x-select />
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $selected = $request->get('selected');

        $query = Proyecto::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nombre', 'like', "%{$search}%")
                    ->orWhere('id_compuesto', 'like', "%{$search}%");
            });
        } elseif ($selected) {
            $query->where('id', $selected);
        }

        $proyectos = $query->limit(20)->get()->map(function ($proyecto) {
            return [
                'id' => $proyecto->id,
                'name' => $proyecto->nombre . ' - ' . $proyecto->id_compuesto,
            ];
        });

        return response()->json($proyectos);
    }


}
