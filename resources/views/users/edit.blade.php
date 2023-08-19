<x-layout>
    <x-splade-modal>
        <h2 class="font-Nc2 text-xl leading-relaxed">
            Edit User
        </h2>
        <x-splade-form action="{{route('users.update',$user)}}" method="PUT" :default="$user" class="mt-5">
            <x-splade-input name="name" label="Name" type="text"/>
            <x-splade-input name="email" label="Email" type="text"/>
            <x-splade-input name="password" label="Password" type="password"/>
            <x-splade-input name="password_confirmation" label="Confirm Password" type="password"/>
            <x-splade-select name="roles[]" label="Roles" :options="$roles" multiple choices realation >
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}">
                        {{ $role->name }}
                    </option>
                @endforeach
            </x-splade-select>
            <x-splade-submit class="mt-5"/>
        </x-splade-form>
    </x-splade-modal>
</x-layout>
