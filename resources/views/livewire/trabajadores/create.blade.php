<x-card title="Editar trabajador" class="w-full max-w-2xl mx-auto" rounded="3xl">
    <form wire:submit="save">
        <x-input
            label="Nombre"
            wire:model.blur="form.nombre"
            placeholder="Nombre"
            class="mb-4"
        />
        <x-input
            label="NSS"
            wire:model.blur="form.nss"
            placeholder="NSS"
            class="mb-4"
        />
        <x-input
            label="RFC"
            wire:model.blur="form.rfc"
            placeholder="RFC"
            class="mb-4"
        />
        <x-input
            label="CURP"
            wire:model.blur="form.curp"
            placeholder="CURP"
            class="mb-4"
        />
        <x-phone
            wire:model.blur="form.telefono"
            label="Telefono"
            placeholder="+52 96 1111-1111"
            class="mb-4"
        />
        <x-input
            label="Email"
            placeholder="email"
            suffix="@mail.com"
            wire:model.blur="form.email"
            class="mb-4"
        />
        <x-select
            label="Buscar proyecto"
            placeholder="Selecciona un proyecto"
            :async-data="route('proyectos.index')"
            option-label="name"
            option-value="id"
            wire:model="form.proyecto_id"
            class="mb-4"
        />
        <x-input
            label="Direccion"
            wire:model.blur="form.direccion"
            placeholder="Direccion"
            class="mb-6"
        />

        <div class="flex flex-col md:flex-row justify-between gap-2">
            <x-link
                label="Regresar"
                href="{{ route('trabajadores.index') }}"
                secondary
                class="md:order-1"
            />
            <x-button
                rounded="md"
                positive
                label="Crear trabajador"
                type="submit"
                class="md:order-2"
            />
        </div>
    </form>
</x-card>
