<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de la Filière - {{ $filiere->nom_filiere }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-10">
    <div class="max-w-5xl mx-auto bg-white p-8 rounded-xl shadow-lg">
        <div class="flex items-center justify-between mb-8 border-b pb-6">
            <div>
                <h1 class="text-4xl font-extrabold text-gray-800">{{ $filiere->nom_filiere }}</h1>
                <p class="text-gray-500 mt-2">Niveau : <span class="font-semibold">{{ $filiere->niveau_education }}</span></p>
            </div>
            <div class="space-x-2">
                <a href="{{ route('filieres.index') }}" class="text-blue-600 hover:underline">← Retour aux filières</a>
                <a href="{{ route('filieres.edit', $filiere) }}" class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-200 transition">Modifier</a>
            </div>
        </div>

        <div class="mt-8">
            <h2 class="text-2xl font-bold text-gray-700 mb-6 flex items-center">
                👨‍🎓 Étudiants inscrits
                <span class="ml-3 bg-blue-100 text-blue-800 text-sm px-3 py-1 rounded-full">
                    {{ $filiere->etudiants->count() }}
                </span>
            </h2>

            @if($filiere->etudiants->isEmpty())
                <div class="bg-blue-50 text-blue-700 p-6 rounded-lg text-center">
                    Il n'y a pas encore d'étudiants inscrits dans cette filière.
                    <br>
                    <a href="{{ route('etudiants.create') }}" class="inline-block mt-4 font-bold hover:underline">Inscrire un étudiant →</a>
                </div>
            @else
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50 border-b">
                                <th class="p-4 font-semibold text-gray-600 text-xs uppercase">Nom & Prénom</th>
                                <th class="p-4 font-semibold text-gray-600 text-xs uppercase">Email</th>
                                <th class="p-4 font-semibold text-gray-600 text-xs uppercase">Téléphone</th>
                                <th class="p-4 font-semibold text-gray-600 text-xs uppercase text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach($filiere->etudiants as $e)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="p-4">
                                        <div class="font-medium text-gray-900">{{ $e->nom }} {{ $e->prenom }}</div>
                                    </td>
                                    <td class="p-4 text-gray-600">{{ $e->email }}</td>
                                    <td class="p-4 text-gray-600">{{ $e->tel }}</td>
                                    <td class="p-4 text-center">
                                        <div class="flex justify-center space-x-3">
                                            <a href="{{ route('etudiants.show', $e) }}" title="Voir" class="text-gray-400 hover:text-blue-600">👁️</a>
                                            <a href="{{ route('etudiants.edit', $e) }}" title="Modifier" class="text-gray-400 hover:text-green-600">✏️</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</body>
</html>
