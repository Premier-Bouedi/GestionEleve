<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Élèves</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-10">
    <div class="max-w-4xl mx-auto">
        
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Gestion des Élèves</h1>
            <a href="{{ route('eleves.create') }}" class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-lg shadow-md transition font-medium">
                + Ajouter un élève
            </a>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 text-gray-600 uppercase text-sm">
                        <th class="p-4 border-b">ID</th>
                        <th class="p-4 border-b">Nom</th>
                        <th class="p-4 border-b">Prénom</th>
                        <th class="p-4 border-b">Email</th>
                        <th class="p-4 border-b">Âge</th>
                        <th class="p-4 border-b text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @forelse($eleves as $eleve)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="p-4 border-b text-gray-400">#{{ $eleve->id }}</td>
                            <td class="p-4 border-b font-bold">{{ $eleve->nom }}</td>
                            <td class="p-4 border-b">{{ $eleve->prenom }}</td>
                            <td class="p-4 border-b text-blue-600">{{ $eleve->email }}</td>
                            <td class="p-4 border-b">{{ $eleve->age }} ans</td>
                            <td class="p-4 border-b text-center flex justify-center gap-2">
                                <a href="{{ route('eleves.edit', $eleve->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 transition">
                                    Modifier
                                </a>

                                <form action="{{ route('eleves.destroy', $eleve->id) }}" method="POST" onsubmit="return confirm('Supprimer cet élève ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition">
                                        Supprimer
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="p-8 text-center text-gray-400 italic">
                                Aucun élève enregistré pour le moment.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>