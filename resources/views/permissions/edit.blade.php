<x-layout>
    <x-splade-modal>
        <h2 class="font-Nc2 text-xl leading-relaxed">
            Edit Permission
        </h2>

        <x-splade-form action="{{route('permissions.update', $permission)}}" method="PUT" :default="$permission" class="mt-5">
            <x-splade-input type="text" name="name" label="Permission Name" class="w-full" />
            <x-splade-submit class="mt-5"/>
        </x-splade-form>
    </x-splade-modal>
</x-layout>
