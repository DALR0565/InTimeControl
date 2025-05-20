<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Proyecto extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        "id_compuesto",
        "nombre",
        "registro_patronal",
        "categoria",
        "direccion",
        "fecha_inicio",
        "fecha_fin",
        "monto_contrato",
    ];

    /**
     *  Genera automáticamente el ID compuesto del proyecto al crearlo.
     *
     *  Formato: P + últimos 2 dígitos del año + número consecutivo (ej. P2501).
     *  Usa una transacción y bloqueo para evitar duplicados en concurrencia.
     * @return void
     */
    public static function boot()
    {
        parent::boot();

        static::creating(function ($proyecto) {
            DB::transaction(function () use ($proyecto) {
                $anioActual = date('y');
                $ultimoProyecto = self::where('id_compuesto', 'like', 'P' . $anioActual . '%')
                    ->lockForUpdate()
                    ->orderBy('id_compuesto', 'desc')
                    ->first();
                if ($ultimoProyecto) {
                    $ultimoNumero = intval(substr($ultimoProyecto->id_compuesto, 3));
                } else {
                    $ultimoNumero = 0;
                }
                $nuevoNumero = str_pad($ultimoNumero + 1, 2, '0', STR_PAD_LEFT);
                $proyecto->id_compuesto = 'P' . $anioActual . $nuevoNumero;
            });
        });
    }

    public function trabajadores()
    {
        return $this->hasMany(Trabajador::class);
    }

}
