<x-layout>
    <x-slot:header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{__('Employees')}}
        </h2>
    </x-slot:header>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="justify-between flex">
                <Link slideover href="{{ route('employees.create')}}" class="bg-blue1 rounded text-white py-1 px-1.5">
                    Create Employee
                </Link>
            </div>

            <x-splade-table :for="$employees" class="mt-5">
                <x-splade-cell actions as="$employees">
                    <div class="flex space-x-1.5">
                        <Link slideover href="{{ route('employees.edit',$employees->id)}}" class="bg-blue1 rounded px-1 text-white">
                            Edit
                        </Link>
                        <x-splade-form action="{{route('employees.destroy',$employees)}}" method="DELETE" confirm>
                            <button type="submit" class="bg-red-500 rounded px-1 text-white">
                                Delete
                            </button>
                        </x-splade-form>
                    </div>
                </x-splade-cell>
            </x-splade-table>
        </div>
    </div>
</x-layout>
