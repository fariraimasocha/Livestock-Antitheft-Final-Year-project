<x-layout>
    <x-slot:header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{__('Roles')}}
        </h2>
    </x-slot:header>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="justify-between flex">
                <Link slideover href="{{ route('roles.create')}}" class="bg-blue1 rounded text-white py-1 px-1.5">
                    Create Role
                </Link>
            </div>

            <x-splade-table :for="$roles" class="mt-5">
                <x-splade-cell actions as="$roles">
                    <div class="flex space-x-1.5">
                        <Link slideover href="{{ route('roles.edit',$roles->id)}}" class="bg-blue1 rounded px-1 text-white">
                            Edit
                        </Link>
                        <x-splade-form action="{{route('roles.destroy',$roles)}}" method="DELETE" confirm>
                            <button type="submit" class="bg-red-500 rounded px-1 text-white">
                                Delete
                            </button>
                        </x-splade-form>
                    </div>
                </x-splade-cell>
                <x-splade-cell permission as="$role">
                    @foreach ($role->permissions as $permission)
                        <span class="text-white bg-blue1 rounded px-2 mr-1">
                        {{ $permission->name }}
                    </span>
                    @endforeach
                </x-splade-cell>
            </x-splade-table>
        </div>
    </div>
</x-layout>
