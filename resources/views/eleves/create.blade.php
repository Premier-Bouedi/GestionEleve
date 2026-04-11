<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un élève</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-10">
    <div class="max-w-lg mx-auto bg-white p-8 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-6">Ajouter un nouvel élève</h1>

        <form action="{{ route('eleves.store') }}" method="POST">
            @csrf <div class="mb-4">
                <label class="block mb-2">Nom :</label>
                <input type="text" name="nom" class="w-full border p-2 rounded" required>
            </div>
            <div class="mb-4">
                <label class="block mb-2">Prénom :</label>
                <input type="text" name="prenom" class="w-full border p-2 rounded" required>
            </div>
            <div class="mb-4">
                <label class="block mb-2">Email :</label>
                <input type="email" name="email" class="w-full border p-2 rounded" required>
            </div>
            <div class="mb-4">
                <label class="block mb-2">Âge :</label>
                <input type="number" name="age" class="w-full border p-2 rounded">
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded shadow">Enregistrer</button>
        </form>
    </div>
</body>
</html>