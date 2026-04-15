<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier la Filière</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-10">
    <div class="max-w-xl mx-auto bg-white p-8 rounded-xl shadow-lg">
        <div class="flex items-center justify-between mb-8">
            <h1 class="text-3xl font-extrabold text-gray-800">Modifier la filière</h1>
            <a href="{{ route('filieres.index') }}" class="text-blue-600 hover:underline">← Retour à la liste</a>
        </div>

        <form action="{{ route('filieres.update', $filiere) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Nom de la Filière :</label>
                <input type="text" name="nom_filiere" value="{{ old('nom_filiere', $filiere->nom_filiere) }}" class="w-full border-gray-300 border p-3 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition" placeholder="Ex: Informatique de Gestion" required>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Niveau d'Éducation :</label>
                @php
                    $niveaux = ['BTS', 'Licence', 'Master', 'Doctorat', 'Ingénierie'];
                @endphp
                <select name="niveau_education" class="w-full border-gray-300 border p-3 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition" required>
                    <option value="">Sélectionner un niveau</option>
                    @foreach($niveaux as $niveau)
                        <option value="{{ $niveau }}" {{ old('niveau_education', $filiere->niveau_education) == $niveau ? 'selected' : '' }}>{{ $niveau }}</option>
                    @endforeach
                </select>
            </div>

            <div class="pt-4">
                <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-4 rounded-lg shadow-lg transform active:scale-95 transition-all">
                    Mettre à jour la filière
                </button>
            </div>
        </form>
    </div>
</body>
</html>
