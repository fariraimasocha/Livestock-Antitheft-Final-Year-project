<x-layout>
    <x-splade-modal>
        <h2 class="font-Nc2 text-xl leading-relaxed">
            Create new Role
        </h2>

        <x-splade-form action="{{route('roles.store')}}" class="mt-5">
            <x-splade-input type="text" name="name" label="Role Name" class="w-full" />
            <x-splade-select name="permissions[]" label="Select Permissions" placeholder="Select Permissions" multiple choices realation>
                @foreach ($permissions as $permission)
                    <option value="{{ $permission->id }}">
                        {{ $permission->name }}
                    </option>
                @endforeach
            </x-splade-select>
            <x-splade-submit class="mt-5"/>
        </x-splade-form>
    </x-splade-modal>
</x-layout>
