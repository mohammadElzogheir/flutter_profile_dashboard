<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl">Departments</h2></x-slot>

    @if(session('ok')) <div class="text-green-600 mb-4">{{ session('ok') }}</div> @endif

    <a class="px-3 py-2 bg-blue-600 text-white rounded hover:bg-blue-700" href="{{ route('departments.create') }}">+ New</a>

    <table class="w-full mt-4 border">
        <thead><tr class="bg-gray-100">
            <th class="p-2 text-left">Name</th>
            <th class="p-2 text-left">Description</th>
            <th class="p-2">Actions</th>
        </tr></thead>
        <tbody>
        @forelse($departments as $d)
            <tr class="border-t">
                <td class="p-2">{{ $d->name }}</td>
                <td class="p-2">{{ $d->description }}</td>
                <td class="p-2 space-x-2">
                    <a class="text-blue-600" href="{{ route('departments.edit',$d) }}">Edit</a>
                    <form action="{{ route('departments.destroy',$d) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button class="text-red-600" onclick="return confirm('Delete?')">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td class="p-2" colspan="3">No departments yet.</td></tr>
        @endforelse
        </tbody>
    </table>

    <div class="mt-3">{{ $departments->links() }}</div>
</x-app-layout>
