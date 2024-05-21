
<x-layout>
    <x-slot:header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{__('Users')}}
        </h2>
    </x-slot:header>


    <div class="py-12">
        <div class="mx-auto px-8 flex space-x-5">
            <div class="bg-white shadow-xl rounded-lg p-4 space-y-4 flex-1">
                <apexchart series="series" v-bind="@js($chart)"></apexchart>
            </div>
            <div class="bg-white shadow-xl rounded-lg p-4 space-y-4 flex-1">
                <apexchart series="series" v-bind="@js($lineChart)"></apexchart>
            </div>
        </div>
    </div>

</x-layout>
