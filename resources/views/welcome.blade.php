<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <!-- Si tu utilises Tailwind via Vite : -->
    @vite('resources/css/app.css')
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
<a href="{{ route('ghibli') }}"
   class="px-6 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
    Voir Ghibli
</a>

<!-- Si tu as un bundle JS : -->
@vite('resources/js/app.js')
</body>
</html>
