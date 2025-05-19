<div class="p-4 space-y-4">
    <h1 class="text-2xl font-bold">{{ $species->name }}</h1>
    <p><strong>Classification :</strong> {{ $species->classification }}</p>
    <p><strong>Couleurs des yeux :</strong> {{ $species->eye_colors }}</p>
    <p><strong>Couleur des cheveux :</strong> {{ $species->hair_colors }}</p>


    <section class="mt-6">
        <h2 class="text-xl font-semibold">Personnes</h2>
        @if($species->people->isEmpty())
            <p>Pas de personne référencé.</p>
        @else
            <ul class="list-disc pl-5">
                @foreach($species->people as $person)
                    <li>
                        <a href="{{ route('ghibli.person', $person->id) }}"
                           class="text-indigo-500 hover:underline">
                            {{ $person->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        @endif
    </section>

    <section class="mt-6">
        <h2 class="text-xl font-semibold">Films</h2>
        @if($species->films->isEmpty())
            <p>Pas de film référencé.</p>
        @else
            <ul class="list-disc pl-5">
                @foreach($species->films as $film)
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

    <a href="{{ url()->previous() }}"
       class="inline-block mt-4 text-indigo-600 hover:underline">
        Retour
    </a>

</div>
