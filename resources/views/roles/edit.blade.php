<x-layout>
    <x-splade-modal>
        <h2 class="font-Nc2 text-xl leading-relaxed">
            Edit Role
        </h2>

        <x-splade-form action="{{ route('roles.update', $role) }}" method="PUT" :default="$role" class="mt-5">
        <x-splade-input type="text" name="name" label="Role Name" class="w-full" />
            <x-splade-select name="permissions[]" label="Select Permissions" placeholder="Select Permissions" multiple choices
                             relation>
                @foreach ($permissions as $permission)
                    <option value="{{ $permission->id }}" @if ($role->permissions->contains($permission)) selected @endif>
                        {{ $permission->name }}
                    </option>
                @endforeach
            </x-splade-select>
            <x-splade-submit class="mt-5"/>
        </x-splade-form>
    </x-splade-modal>
</x-layout>
