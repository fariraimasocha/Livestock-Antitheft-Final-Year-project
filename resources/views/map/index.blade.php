<x-layout>

    <div class="py-6">
    <div id="app" class=" w-11/12 justify-center mx-auto rounded-lg">
        <Link slideover href="{{ route('map.create')}}" class="bg-blue1 rounded text-white py-2 px-1.5">
        Create Location
        </Link>
        <Counter :initialMarkers='@json($initialMarkers)' class="mt-4"></Counter>
    </div>
    </div>
</x-layout>
