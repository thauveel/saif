<x-front-layout>

  <div class="container m-auto px-6 text-gray-600 md:px-12 xl:px-6">
    <div class="mb-12 space-y-2 text-center">
      <h2 class="text-3xl font-bold text-gray-800 md:text-4xl">Explore Upcoming Tournaments</h2>
      <p class="text-gray-600 lg:mx-auto lg:w-6/12">Discover upcoming tournaments and register your team for the next big challenge. Stay updated on key dates and details!</p>
    </div>

    <div class="lg:w-full xl:w-3/4 lg:mx-auto">

      @foreach ($tournaments as $tournament )
        <livewire:tournament-card :tournament="$tournament"/>
      @endforeach
    
    
      
    </div>
  </div>
</x-front-layout>
