<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl">Employees</h2></x-slot>

    @if(session('ok')) <div class="text-green-600 mb-4">{{ session('ok') }}</div> @endif

    <a class="px-3 py-2 bg-blue-600 text-white rounded hover:bg-blue-700" href="{{ route('employees.create') }}">+ New</a>

    <table class="w-full mt-4 border">
        <thead><tr class="bg-gray-100">
            <th class="p-2 text-left">Name</th>
            <th class="p-2 text-left">Email</th>
            <th class="p-2 text-left">Department</th>
            <th class="p-2">Actions</th>
        </tr></thead>
        <tbody>
        @forelse($employees as $e)
            <tr class="border-t">
                <td class="p-2">{{ $e->name }}</td>
                <td class="p-2">{{ $e->email }}</td>
                <td class="p-2">{{ $e->department?->name }}</td>
                <td class="p-2 space-x-2">
                    <a class="text-blue-600" href="{{ route('employees.edit',$e) }}">Edit</a>
                    <form action="{{ route('employees.destroy',$e) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button class="text-red-600" onclick="return confirm('Delete?')">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td class="p-2" colspan="4">No employees yet.</td></tr>
        @endforelse
        </tbody>
    </table>

    <div class="mt-3">{{ $employees->links() }}</div>
</x-app-layout>
