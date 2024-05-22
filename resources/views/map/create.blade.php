<x-layout>
    <x-splade-modal>
        <h2 class="font-Nc2 text-xl leading-relaxed">
            Create new location
        </h2>
        <x-splade-form action="{{route('map.store')}}" class="mt-5">
            <x-splade-input name="latitude" label="Latitude" type="text"/>
            <x-splade-input name="longitude" label="Longitude" type="text"/>
            <x-splade-submit class="mt-5"/>
        </x-splade-form>
    </x-splade-modal>
</x-layout>
