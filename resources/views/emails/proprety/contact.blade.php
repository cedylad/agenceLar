<x-mail::message>
    # Nouvelle demande de contact

    Une nouvelle demande de contact a été fait pour le bien <a href="{{ route('proprety.show', ['slug' => $proprety->getSlug(), 'proprety' => $proprety]) }}">{{ $proprety->title }}</a>

    - Nom : {{ $data['lastname'] }}
    - Prénom : {{ $data['firstname'] }}
    - Phone : {{ $data['phone'] }}
    - Email : {{ $data['email'] }}

    **Message : ** <br>
    {{ $data['message'] }}

</x-mail::message>