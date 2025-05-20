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
                    wire:model.blur="form.email"
                />
            </div>
            <div>
                <div class="mt-2">
                    <x-password
                        label="Contraseña"
                        placeholder="**********"
                        wire:model.blur="form.password"
                    />
                </div>
            </div>

            <div>
                <x-button
                    rounded="md"
                    positive
                    label="Iniciar sesión"
                    type="submit"
                    class="md:order-2"
                />
            </div>
        </form>

    </div>
</div>
