<x-card title="Editar trabajador" class="w-full max-w-2xl mx-auto" rounded="3xl">
    <form wire:submit="save">
        <x-input
            label="Nombre"
            wire:model.blur="form.nombre"
            placeholder="Nombre"
            class="mb-4" />
        <x-input
            label="NSS"
            wire:model.blur="form.nss"
            placeholder="NSS"
            class="mb-4" />
        <x-input
            label="RFC"
            wire:model.blur="form.rfc"
            placeholder="RFC"
            class="mb-4" />
        <x-input
            label="CURP"
            wire:model.blur="form.curp"
            placeholder="CURP"
            class="mb-4" />
        <x-phone
            wire:model.blur="form.telefono"
            label="Telefono"
            placeholder="+52 96 1111-1111"
            class="mb-4" />
        <x-input
            label="Email"
            placeholder="email"
            suffix="@mail.com"
            wire:model.blur="form.email"
            class="mb-4" />
        <x-select
            label="Buscar proyecto"
            placeholder="Selecciona un proyecto"
            :async-data="route('proyectos.index')"
            option-label="name"
            option-value="id"
            wire:model="form.proyecto_id"
            class="mb-4" />
        <x-input
            label="Direccion"
            wire:model.blur="form.direccion"
            placeholder="Direccion"
            class="mb-6" />

        <div class="flex flex-col md:flex-row justify-between gap-2">
            <x-link
                label="Regresar"
                href="{{ route('trabajadores.index') }}"
                secondary
                class="md:order-1" />
            <x-button
                rounded="md"
                positive
                type="submit"
                class="md:order-2"
                wire:loading.attr="disabled"
                wire:target="save">
                <span wire:loading wire:target="save">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 200 200">
                        <radialGradient id="a10" cx=".66" fx=".66" cy=".3125" fy=".3125" gradientTransform="scale(1.5)">
                            <stop offset="0" stop-color="#08FF0F"></stop>
                            <stop offset=".3" stop-color="#08FF0F" stop-opacity=".9"></stop>
                            <stop offset=".6" stop-color="#08FF0F" stop-opacity=".6"></stop>
                            <stop offset=".8" stop-color="#08FF0F" stop-opacity=".3"></stop>
                            <stop offset="1" stop-color="#08FF0F" stop-opacity="0"></stop>
                        </radialGradient>
                        <circle transform-origin="center" fill="none" stroke="url(#a10)" stroke-width="15" stroke-linecap="round"
                            stroke-dasharray="200 1000" stroke-dashoffset="0" cx="100" cy="100" r="70">
                            <animateTransform type="rotate" attributeName="transform" calcMode="spline" dur="2"
                                values="360;0" keyTimes="0;1" keySplines="0 0 1 1" repeatCount="indefinite" />
                        </circle>
                        <circle transform-origin="center" fill="none" opacity=".2" stroke="#08FF0F" stroke-width="15"
                            stroke-linecap="round" cx="100" cy="100" r="70" />
                    </svg>
                </span>
                <span wire:loading.remove wire:target="save">
                    Crear trabajador
                </span>
                <span wire:loading wire:target="save">
                    Cargando...
                </span>
            </x-button>
        </div>
    </form>
</x-card>