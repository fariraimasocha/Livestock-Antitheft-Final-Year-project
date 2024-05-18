
<x-layout>
    <x-slot:header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{__('Users')}}
        </h2>
    </x-slot:header>


    <div class="py-12">
        <div class="max-w-7xl mx-auto px-8">
            <div class="bg-white shadow-xl rounded-lg p-4 space-y-4">
                <apexchart series="series" v-bind="@js($chart)"></apexchart>
            </div>
        </div>
    </div>

</x-layout>
