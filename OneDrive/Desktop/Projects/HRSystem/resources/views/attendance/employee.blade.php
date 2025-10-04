<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl">Attendance – {{ $employee->name }}</h2></x-slot>

    <form method="GET" class="mb-4">
        <input type="month" name="month" value="{{ $month }}" class="border rounded p-2">
        <button class="px-3 py-2 bg-gray-200 rounded">Show</button>
    </form>

    <table class="w-full border">
        <thead><tr class="bg-gray-100">
            <th class="p-2 text-left">Date</th>
            <th class="p-2 text-left">Status</th>
        </tr></thead>
        <tbody>
        @forelse($rows as $row)
            <tr class="border-t">
                <td class="p-2">{{ $row->date }}</td>
                <td class="p-2">{{ ucfirst($row->status) }}</td>
            </tr>
        @empty
            <tr><td class="p-2" colspan="2">No records for this month.</td></tr>
        @endforelse
        </tbody>
    </table>
</x-app-layout>
