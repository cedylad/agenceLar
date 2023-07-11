<div class="card">
    <div class="card-body">
        <h5 class="card-title">
            <a href="{{ route('proprety.show', ['slug' => $proprety->getSlug(), 'proprety' => $proprety]) }}">{{ $proprety->title }}</a>
        </h5>
        <p class="card-text"> {{ $proprety->surface }}m2 - {{ $proprety->city }} ({{ $proprety->postal_code }})</p>
        <div class="text-primary fw-bold" style="font-size:1.4rem;">
            {{ number_format($proprety->price, thousands_separator: ' ') }} €
        </div>
    </div>
</div>