<x-admin-layout :breadcrumbs="[
    ['name' => 'Dashboard', 'route' => route('admin.dashboard')],
    ['name' => 'Inicio']
]"> 

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Tarjeta: Usuario -->
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold mb-2 text-gray-900 dark:text-white">Usuario</h2>
            
            <div class="flex items-center gap-4">
                <img class="w-14 h-14 rounded-full object-cover border border-gray-300 dark:border-gray-600"
                    src="{{ Auth::user()->profile_photo_url ?? '/default-profile.png' }}" alt="Foto de perfil">

                <div class="font-medium dark:text-white">
                    <div class="text-lg"> Bienvenido {{ Auth::user()->name }}</div>
                    <div class="text-sm text-gray-500 dark:text-gray-400">
                        Miembro desde {{ Auth::user()->created_at->format('F Y') }}
                    </div>
                </div>
            </div>

            <!-- Botón cerrar sesión -->
            <form method="POST" action="{{ route('logout') }}" class="mt-4">
                @csrf
                <button type="submit"
                    class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-800">
                    Cerrar sesión
                </button>
            </form>
        </div>

        <!-- Tarjeta: Empresa -->
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold mb-2 text-gray-900 dark:text-white">Empresa</h2>
            <p class="text-gray-600 dark:text-gray-400">
                Nombre de la empresa: <span class="font-medium text-blue-600 dark:text-blue-400">Mi Empresa S.R.L.</span>
            </p>
            <p class="text-gray-500 dark:text-gray-300 mt-2">
                Gestión de productos, usuarios y configuración general.
            </p>
        </div>
    </div>


</x-admin-layout>
