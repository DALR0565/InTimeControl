<?php

namespace App\Livewire\Tables;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Trabajador;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
class TrabajadoresTable extends DataTableComponent
{
    protected $model = Trabajador::class;
    protected $listeners = [
        'refreshDatatable' => '$refresh',
    ];

    /**
     * Configura la clave primaria y selecciona el ID del trabajador.
     * @return void
     */
    public function configure(): void
    {
        $this->setPrimaryKey('id')
        ->addAdditionalSelects(['trabajadores.id as id']);
    }

    /**
     * Consulta a los trabajadores activos con información del proyecto asociado.
     * @return Builder
     */
    public function builder(): Builder
    {
        return Trabajador::query()
            ->leftJoin('proyectos', 'proyectos.id', '=', 'trabajadores.proyecto_id')
            ->whereNull('trabajadores.deleted_at')
            ->select('trabajadores.*', 'proyectos.nombre as proyecto_nombre', 'proyectos.id_compuesto as proyecto_id');
    }

    public function delete($id)
    {
        if($trabajador = Trabajador::findOrFail($id)){
            $trabajador->deleted_at = now();
            $trabajador->save();
        }
        $this->dispatch('refreshDatatable');
    }

    public function columns(): array
    {
        return [
            Column::make("ID", "id_compuesto")
                ->sortable()
                ->searchable(),
            Column::make("Nombre", "nombre")
                ->sortable()
                ->searchable(),
            Column::make("NSS", "nss")
                ->sortable()
                ->searchable(),
            Column::make("RFC", "rfc")
                ->sortable()
                ->searchable(),
            Column::make("CURP", "curp")
                ->sortable(),
            Column::make("Teléfono", "telefono")
                ->sortable()
                ->searchable(),
            Column::make("Email", "email")
                ->sortable()
                ->searchable(),
            Column::make("Dirección", "direccion")
                ->sortable(),
            Column::make("Proyecto","proyecto.id_compuesto")
                ->sortable()
                ->searchable()
                ->format(fn($value, $row) => $row->proyecto_nombre ? "{$row->proyecto_nombre} - {$row->proyecto_id}":"Sin proyecto"),
            ButtonGroupColumn::make('Acciones')
                ->attributes(function($row) {
                    return [
                        'class' => 'space-x-2',
                    ];
                })
                ->buttons([
                    LinkColumn::make('Editar')
                        ->title(fn($row) => 'Editar')
                        ->location(fn($row) => route('trabajadores.edit', $row->id))
                        ->attributes(function($row) {
                            return [
                                'class' => 'underline text-blue-500 hover:no-underline',
                            ];
                        }),
                    LinkColumn::make('Eliminar')
                        ->title(fn($row) => 'Eliminar')
                        ->location(fn($row) => '#')
                        ->attributes(fn($row) => [
                            'wire:click.prevent' => 'delete('.$row->id.')',
                            'wire:confirm' => "Estas seguro de eliminar al trabajador:\n {$row->id_compuesto}/{$row->nombre}",
                            'class' => 'text-red-600 underline cursor-pointer',
                        ])
                ]),
        ];
    }
}
