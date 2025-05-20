<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <img class="mx-auto h-auto w-auto" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS5qxnW1gVLNqPHurfouPTxHlNwe3BKm2A5Jg&s" alt="Your Company">
        <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900 text-white">Ingresa tus credenciales</h2>
        <p class="mt-4">Email: <strong>test@example.com</strong></p>
        <p>Contraseña: <strong>password</strong></p>
    </div>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <form class="space-y-6" wire:submit="save">
            <div>
                <x-input
                    label="Email"
                    placeholder="your email"
                    suffix="@mail.com"
                    wire:model.blur="form.email" />
            </div>
            <div>
                <div class="mt-2">
                    <x-password
                        label="Contraseña"
                        placeholder="**********"
                        wire:model.blur="form.password" />
                </div>
            </div>

            <x-button
                rounded="md"
                positive
                type="submit"
                class="md:order-2 flex items-center gap-2"
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
                    Iniciar sesión
                </span>
                <span wire:loading wire:target="save">
                    Cargando...
                </span>
            </x-button>

        </form>

    </div>
</div>