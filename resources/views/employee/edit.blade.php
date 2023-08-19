<x-layout>


    <x-splade-modal>
        <h2 class="font-Nc2 text-xl leading-relaxed">
            Edit employee
        </h2>

        <x-splade-form action="{{route('employees.update',$employee)}}" :default="$employee" method="PUT" class="mt-5">
            <x-splade-input name="name" label="Name" type="text"/>
            <x-splade-input name="age" label="Age" type="text"/>
            <x-splade-input name="id_number" label="Id Number" type="text"/>
            <x-splade-input name="salary" label="Salary" type="text"/>
            <x-splade-input name="phone_number" label="Phone Number" type="text"/>
            <x-splade-submit class="mt-5"/>
        </x-splade-form>
    </x-splade-modal>


</x-layout>
