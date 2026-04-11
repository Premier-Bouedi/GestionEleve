<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un élève</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-10">
    <div class="max-w-lg mx-auto bg-white p-8 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-6">Modifier un élève</h1>

        <form action="{{ route('eleves.update', $eleve->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-4">
                <label class="block mb-2">Nom :</label>
                <input type="text" name="nom" value="{{ $eleve->nom }}" class="w-full border p-2 rounded" required>
            </div>
            
            <div class="mb-4">
                <label class="block mb-2">Prénom :</label>
                <input type="text" name="prenom" value="{{ $eleve->prenom }}" class="w-full border p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label class="block mb-2">Email :</label>
                <input type="email" name="email" value="{{ $eleve->email }}" class="w-full border p-2 rounded" required>
            </div>
            
            <div class="mb-4">
                <label class="block mb-2">Âge :</label>
                <input type="number" name="age" value="{{ $eleve->age }}" class="w-full border p-2 rounded">
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Mettre à jour</button>
            <a href="{{ route('eleves.index') }}" class="ml-4 text-gray-600 hover:underline">Annuler</a>
        </form>
    </div>
</body>
</html>
