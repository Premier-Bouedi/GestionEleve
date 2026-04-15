<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Étudiant</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-10">
    <div class="max-w-2xl mx-auto bg-white p-8 rounded-xl shadow-lg">
        <div class="flex items-center justify-between mb-8">
            <h1 class="text-3xl font-extrabold text-gray-800">Ajouter un étudiant</h1>
            <a href="{{ route('etudiants.index') }}" class="text-blue-600 hover:underline">← Retour à la liste</a>
        </div>

        <form action="{{ route('etudiants.store') }}" method="POST" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Nom :</label>
                    <input type="text" name="nom" class="w-full border-gray-300 border p-3 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition" placeholder="Ex: Dupont" required>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Prénom :</label>
                    <input type="text" name="prenom" class="w-full border-gray-300 border p-3 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition" placeholder="Ex: Jean" required>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Email :</label>
                    <input type="email" name="email" class="w-full border-gray-300 border p-3 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition" placeholder="jean.dupont@example.com" required>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Téléphone :</label>
                    <input type="text" name="tel" class="w-full border-gray-300 border p-3 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition" placeholder="06 01 02 03 04" required>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Niveau d'étude :</label>
                    <select name="niveau_etude" class="w-full border-gray-300 border p-3 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition" required>
                        <option value="">Sélectionner un niveau</option>
                        <option value="Licence 1">Licence 1</option>
                        <option value="Licence 2">Licence 2</option>
                        <option value="Licence 3">Licence 3</option>
                        <option value="Master 1">Master 1</option>
                        <option value="Master 2">Master 2</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Date de naissance :</label>
                    <input type="date" name="date_naissance" class="w-full border-gray-300 border p-3 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition" required>
                </div>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Filière :</label>
                <select name="filiere_id" class="w-full border-gray-300 border p-3 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition" required>
                    <option value="">Sélectionner une filière</option>
                    @foreach($filieres as $filiere)
                        <option value="{{ $filiere->id }}">{{ $filiere->nom_filiere }} ({{ $filiere->niveau_education }})</option>
                    @endforeach
                </select>
            </div>

            <div class="pt-4">
                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg shadow-lg transform active:scale-95 transition-all">
                    Enregistrer l'étudiant
                </button>
            </div>
        </form>
    </div>
</body>
</html>
