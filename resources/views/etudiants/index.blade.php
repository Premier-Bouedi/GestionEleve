<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Étudiants</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-10">
    <div class="max-w-6xl mx-auto bg-white p-8 rounded-xl shadow-lg">
        <div class="flex items-center justify-between mb-8">
            <h1 class="text-3xl font-extrabold text-gray-800">Liste des étudiants</h1>
            <a href="{{ route('etudiants.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg shadow transition">
                + Ajouter un étudiant
            </a>
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
                        <th class="p-4 font-semibold text-gray-600 uppercase text-xs">Nom & Prénom</th>
                        <th class="p-4 font-semibold text-gray-600 uppercase text-xs">Email</th>
                        <th class="p-4 font-semibold text-gray-600 uppercase text-xs">Téléphone</th>
                        <th class="p-4 font-semibold text-gray-600 uppercase text-xs">Niveau</th>
                        <th class="p-4 font-semibold text-gray-600 uppercase text-xs">Filière</th>
                        <th class="p-4 font-semibold text-gray-600 uppercase text-xs text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($etudiants as $etudiant)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="p-4">
                                <span class="font-medium text-gray-900">{{ $etudiant->nom }}</span>
                                <span class="text-gray-500">{{ $etudiant->prenom }}</span>
                            </td>
                            <td class="p-4 text-gray-600">{{ $etudiant->email }}</td>
                            <td class="p-4 text-gray-600">{{ $etudiant->tel }}</td>
                            <td class="p-4 text-gray-600">{{ $etudiant->niveau_etude }}</td>
                            <td class="p-4 text-gray-600">
                                <span class="px-2 py-1 bg-blue-100 text-blue-800 text-xs rounded-full">
                                    {{ $etudiant->filiere->nom_filiere ?? 'N/A' }}
                                </span>
                            </td>
                            <td class="p-4 text-center">
                                <div class="flex justify-center space-x-2">
                                    <a href="{{ route('etudiants.show', $etudiant) }}" class="text-gray-400 hover:text-blue-600">
                                        👁️
                                    </a>
                                    <a href="{{ route('etudiants.edit', $etudiant) }}" class="text-gray-400 hover:text-green-600">
                                        ✏️
                                    </a>
                                    <form action="{{ route('etudiants.destroy', $etudiant) }}" method="POST" onsubmit="return confirm('Supprimer cet étudiant ?')">
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
                            <td colspan="6" class="p-8 text-center text-gray-500">
                                Aucun étudiant trouvé. <a href="{{ route('etudiants.create') }}" class="text-blue-500 hover:underline">Ajoutez-en un !</a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
