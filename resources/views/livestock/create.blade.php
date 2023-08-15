<x-layout>


    <x-splade-modal>
        <h2 class="font-Nc2 text-xl leading-relaxed">
            Create new livestock
        </h2>

        <x-splade-form action="{{route('livestock.store')}}">
            <x-splade-input name="name" label="Name" type="text"/>
            <x-splade-input name="tag_no" label="Tag_no" type="text"/>
            <x-splade-select name="gender" label="Gender">
                <option value="male">Male</option>
                <option value="female">Female</option>
            </x-splade-select>
            <x-splade-input name="color" label="Color" type="text"/>
            <x-splade-input name="dob" label="DOB" type="date"/>
            <x-splade-submit class="mt-5"/>
        </x-splade-form>
    </x-splade-modal>


</x-layout>
