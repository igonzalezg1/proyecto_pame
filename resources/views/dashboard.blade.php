<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            Datos del sensor
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Barra de búsqueda -->
                    <input type="text" id="myInput" placeholder="Buscar por valor"
                        class="w-full p-2 mb-4 border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-100"
                        value="{{ request('filter') }}">
                    <button type="button" onclick="myFunction()"
                        class="px-4 py-2 text-sm font-medium">Buscar</button>

                    <!-- Tabla para mostrar los datos -->
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    ID
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Valor
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Fecha de creación
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($data as $item)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $item->id }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $item->value }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $item->created_at->format('d/m/Y H:i:s') }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Paginación -->
                    <div class="mt-4">
                        {{ $data->appends(['filter' => request('filter')])->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Función para buscar por valor
        function myFunction() {
            var input = document.getElementById("myInput");
            var filter = input.value;
            // Redireccionar a la ruta con el filtro
            window.location.href = "/dashboard?filter=" + filter;
        }
    </script>
</x-app-layout>