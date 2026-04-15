<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier l'Étudiant</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-10">
    <div class="max-w-2xl mx-auto bg-white p-8 rounded-xl shadow-lg">
        <div class="flex items-center justify-between mb-8">
            <h1 class="text-3xl font-extrabold text-gray-800">Modifier l'étudiant</h1>
            <a href="{{ route('etudiants.index') }}" class="text-blue-600 hover:underline">← Retour à la liste</a>
        </div>

        <form action="{{ route('etudiants.update', $etudiant) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Nom :</label>
                    <input type="text" name="nom" value="{{ old('nom', $etudiant->nom) }}" class="w-full border-gray-300 border p-3 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition" placeholder="Ex: Dupont" required>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Prénom :</label>
                    <input type="text" name="prenom" value="{{ old('prenom', $etudiant->prenom) }}" class="w-full border-gray-300 border p-3 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition" placeholder="Ex: Jean" required>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Email :</label>
                    <input type="email" name="email" value="{{ old('email', $etudiant->email) }}" class="w-full border-gray-300 border p-3 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition" placeholder="jean.dupont@example.com" required>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Téléphone :</label>
                    <input type="text" name="tel" value="{{ old('tel', $etudiant->tel) }}" class="w-full border-gray-300 border p-3 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition" placeholder="06 01 02 03 04" required>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Niveau d'étude :</label>
                    @php
                        $niveaux = ['Licence 1', 'Licence 2', 'Licence 3', 'Master 1', 'Master 2'];
                    @endphp
                    <select name="niveau_etude" class="w-full border-gray-300 border p-3 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition" required>
                        <option value="">Sélectionner un niveau</option>
                        @foreach($niveaux as $niveau)
                            <option value="{{ $niveau }}" {{ old('niveau_etude', $etudiant->niveau_etude) == $niveau ? 'selected' : '' }}>{{ $niveau }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Date de naissance :</label>
                    <input type="date" name="date_naissance" value="{{ old('date_naissance', $etudiant->date_naissance) }}" class="w-full border-gray-300 border p-3 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition" required>
                </div>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Filière :</label>
                <select name="filiere_id" class="w-full border-gray-300 border p-3 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition" required>
                    <option value="">Sélectionner une filière</option>
                    @foreach($filieres as $filiere)
                        <option value="{{ $filiere->id }}" {{ old('filiere_id', $etudiant->filiere_id) == $filiere->id ? 'selected' : '' }}>
                            {{ $filiere->nom_filiere }} ({{ $filiere->niveau_education }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="pt-4">
                <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-4 rounded-lg shadow-lg transform active:scale-95 transition-all">
                    Mettre à jour l'étudiant
                </button>
            </div>
        </form>
    </div>
</body>
</html>
