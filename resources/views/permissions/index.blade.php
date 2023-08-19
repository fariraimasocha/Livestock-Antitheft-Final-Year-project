<x-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="justify-between flex">
                <h2 class="font-Nc2 text-xl leading-relaxed">
                    {{ __('Permissions list') }}
                </h2>
                <Link slideover href="{{ route('permissions.create')}}" class="bg-blue1 rounded text-white py-1 px-1.5">
                    Create Permission
                </Link>
            </div>

            <x-splade-table :for="$permissions" class="mt-5">
                <x-splade-cell actions as="$permissions">
                    <div class="flex space-x-1.5">
                        <Link slideover href="{{ route('permissions.edit',$permissions->id)}}" class="bg-blue1 rounded px-1 text-white">
                            Edit
                        </Link>
                        <x-splade-form action="{{route('permissions.destroy',$permissions)}}" method="DELETE" confirm>
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

