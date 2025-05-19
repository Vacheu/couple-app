<div class="p-4 space-y-4">
    <h1 class="text-2xl font-bold">{{ $person->name }}</h1>
    <p><strong>Genre :</strong> {{ $person->gender }}</p>
    <p><strong>Âge :</strong> {{ $person->age }}</p>
    <p><strong>Espèce :</strong>
        <a href="{{ route('ghibli.species', $person->species) }}"
           class="text-indigo-500 hover:underline">
            {{ $person->species?->name ?? '–' }}
        </a></p>
    <p><strong>Couleur des yeux :</strong> {{ $person->eye_color }}</p>
    <p><strong>Couleur des cheveux :</strong> {{ $person->hair_color }}</p>

    <section class="mt-6">
        <h2 class="text-xl font-semibold">Apparitions</h2>
        @if($person->films->isEmpty())
            <p>Pas de film référencé.</p>
        @else
            <ul class="list-disc pl-5">
                @foreach($person->films as $film)
                    <li>
                        <a href="{{ route('ghibli.detail', $film->id) }}"
                           class="text-indigo-500 hover:underline">
                            {{ $film->title }}
                        </a>
                    </li>
                @endforeach
            </ul>
        @endif
    </section>

    <a href="{{ route('ghibli.detail', $person->films->first()->id ?? '') }}"
       class="inline-block mt-4 text-indigo-600 hover:underline">
        Retour au film
    </a>
</div>
