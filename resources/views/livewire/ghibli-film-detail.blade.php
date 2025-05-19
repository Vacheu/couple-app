
<div class="space-y-6 p-4">
    <h1 class="text-3xl font-bold">{{ $film->title }}</h1>

    <img src="{{ $film->movie_banner }}"
         alt="Bannière de {{ $film->title }}"
         class="w-full h-64 object-cover rounded">

    <div class="flex flex-col md:flex-row gap-4">
        <img src="{{ $film->image }}"
             alt="Affiche de {{ $film->title }}"
             class="h-48 rounded shadow">

        <div class="prose">
            <p><strong>Date de sortie :</strong> {{ $film->release_date }}</p>
            <p>{{ $film->description }}</p>
            <p><strong>Réalisateur :</strong> {{ $film->director }}</p>
            <p><strong>Producteur :</strong> {{ $film->producer }}</p>
            <p><strong>Temps :</strong> {{ $film->running_time   }} heures</p>
            <p><strong>Score : </strong> {{ $film->rt_score }} / 100 </p>

        </div>
    </div>

    <section class="mt-8">
        <h2 class="text-xl font-semibold">Personnages</h2>

        @if($film->people->isEmpty())
            <p>Aucun personnage listé pour ce film.</p>
        @else
            <table class="min-w-full border-collapse">
                <thead>
                <tr class="bg-purple-950">
                    <th class="px-4 py-2 text-left">Nom</th>
                    <th class="px-4 py-2 text-left">Genre</th>
                    <th class="px-4 py-2 text-left">Âge</th>
                    <th class="px-4 py-2 text-left">Espèce</th>
                </tr>
                </thead>
                <tbody>
                @foreach($film->people as $person)
                    <tr class="border-t">
                        <td class="px-4 py-2"> <a href="{{ route('ghibli.person', $person->id) }}"
                                                  class="text-indigo-500 hover:underline">
                                {{ $person->name }}
                            </a></td>
                        <td class="px-4 py-2">{{ $person->gender }}</td>
                        <td class="px-4 py-2">{{ $person->age }}</td>
                        <td class="px-4 py-2">
                            @if($person->species)
                                <a href="{{ route('ghibli.species', $person->species->id) }}"
                                   class="text-indigo-500 hover:underline">
                                    {{ $person->species->name }}
                                </a>
                            @else
                                –
                            @endif
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </section>

    <a href="{{ route('ghibli') }}"
       class="inline-block mt-4 text-indigo-600 hover:underline">
         Retour à la liste
    </a>
</div>
