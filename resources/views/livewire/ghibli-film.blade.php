<div class="space-y-4">
    <h1 class="text-2xl font-bold">Liste des films Ghibli</h1>

    <ul class="list-disc pl-5 space-y-4">
        @foreach($films as $film)
            <li class="flex items-center gap-4">
                {{-- Lien vers la page détail --}}
                <a href="{{ route('ghibli.detail', $film->id) }}"
                   class="font-semibold text-indigo-600 hover:underline">
                    {{ $film->title }}
                </a>
                {{-- Extrait ou image mini --}}
                <img src="{{ $film->image }}"
                     alt="Affiche de {{ $film->title }}"
                     class="h-16 rounded">
            </li>
        @endforeach
    </ul>
</div>
