<x-layout>
    <x-slot:header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{__('Users')}}
        </h2>
    </x-slot:header>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="justify-between flex">
                <Link slideover href="{{ route('users.create')}}" class="bg-blue1 rounded text-white py-1 px-1.5">
                    Create User
                </Link>
            </div>

            <x-splade-table :for="$users" class="mt-5">
                <x-splade-cell actions as="$users">
                    <div class="flex space-x-1.5">
                        <Link slideover href="{{ route('users.edit',$users->id)}}" class="bg-blue1 rounded px-1 text-white">
                            Edit
                        </Link>
                        <x-splade-form action="{{route('users.destroy',$users)}}" method="DELETE" confirm>
                            <button type="submit" class="bg-red-500 rounded px-1 text-white">
                                Delete
                            </button>
                        </x-splade-form>
                    </div>
                </x-splade-cell>
                <x-splade-cell role as="$user">
                    @foreach ($user->roles as $role)
                        <span class="text-white bg-blue1 rounded px-2 mr-1">
                        {{ $role->name }}
                    </span>
                    @endforeach
                </x-splade-cell>
            </x-splade-table>
        </div>
    </div>
</x-layout>
