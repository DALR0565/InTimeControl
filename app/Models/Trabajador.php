<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Trabajador extends Model
{
    use HasFactory;
    protected $table = "trabajadores";
    public $timestamps = false;
    protected $fillable = [
        "id_compuesto",
        "nombre",
        "nss",
        "rfc",
        "curp",
        "telefono",
        "email",
        "direccion",
        "proyecto_id"
    ];

    /**
     *  Genera automáticamente el ID compuesto del usuario al crearlo.
     *
     *  Formato: ITC + número consecutivo de 5 dígitos (ej. ITC00001).
     *  Utiliza una transacción y bloqueo para evitar duplicados en concurrencia.
     * @return void
     */
    public static function boot()
    {
        parent::boot();

        static::creating(function ($usuario) {
            DB::transaction(function () use ($usuario) {
                $ultimoUsuario = self::where('id_compuesto', 'like', 'ITC%')
                    ->orderBy('id_compuesto', 'desc')
                    ->lockForUpdate()
                    ->first();
                if ($ultimoUsuario) {
                    $ultimoNumero = intval(substr($ultimoUsuario->id_compuesto, 3));
                } else {
                    $ultimoNumero = 0;
                }
                $nuevoNumero = $ultimoNumero + 1;
                $nuevoId = str_pad($nuevoNumero, 5, '0', STR_PAD_LEFT);
                $usuario->id_compuesto = 'ITC' . $nuevoId;
            });
        });
    }

    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class);
    }
}
