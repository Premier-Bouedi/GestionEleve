<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Filières</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-10">
    <div class="max-w-4xl mx-auto bg-white p-8 rounded-xl shadow-lg">
        <div class="flex items-center justify-between mb-8">
            <h1 class="text-3xl font-extrabold text-gray-800">Liste des filières</h1>
            <div class="space-x-4">
                <a href="{{ route('etudiants.index') }}" class="text-blue-600 hover:underline">Gérer les étudiants</a>
                <a href="{{ route('filieres.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg shadow transition">
                    + Ajouter une filière
                </a>
            </div>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded shadow-sm" role="alert">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 border-b">
                        <th class="p-4 font-semibold text-gray-600 uppercase text-xs">ID</th>
                        <th class="p-4 font-semibold text-gray-600 uppercase text-xs">Nom de la Filière</th>
                        <th class="p-4 font-semibold text-gray-600 uppercase text-xs">Niveau d'Éducation</th>
                        <th class="p-4 font-semibold text-gray-600 uppercase text-xs text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($filieres as $filiere)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="p-4 text-gray-500 text-sm">{{ $filiere->id }}</td>
                            <td class="p-4">
                                <span class="font-medium text-gray-900">{{ $filiere->nom_filiere }}</span>
                            </td>
                            <td class="p-4 text-gray-600">{{ $filiere->niveau_education }}</td>
                            <td class="p-4 text-center">
                                <div class="flex justify-center space-x-2">
                                    <a href="{{ route('filieres.edit', $filiere) }}" class="text-gray-400 hover:text-green-600">
                                        ✏️
                                    </a>
                                    <form action="{{ route('filieres.destroy', $filiere) }}" method="POST" onsubmit="return confirm('Attention : Supprimer cette filière supprimera également tous les étudiants associés ! Continuer ?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-gray-400 hover:text-red-600">
                                            🗑️
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="p-8 text-center text-gray-500">
                                Aucune filière trouvée. <a href="{{ route('filieres.create') }}" class="text-blue-500 hover:underline">Ajoutez-en une !</a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
