<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl">Monthly Attendance</h2></x-slot>

    <form method="GET" class="mb-4">
        <input type="month" name="month" value="{{ $month }}" class="border rounded p-2">
        <button class="px-3 py-2 bg-gray-200 rounded">Show</button>
    </form>

    <table class="w-full border">
        <thead><tr class="bg-gray-100">
            <th class="p-2 text-left">Employee</th>
            <th class="p-2 text-left">Department</th>
            <th class="p-2 text-center">Present</th>
            <th class="p-2 text-center">Absent</th>
        </tr></thead>
        <tbody>
        @foreach($employees as $e)
            @php
              $rows = $data[$e->id] ?? collect();
              $present = $rows->where('status','present')->count();
              $absent  = $rows->where('status','absent')->count();
            @endphp
            <tr class="border-t">
                <td class="p-2">{{ $e->name }}</td>
                <td class="p-2">{{ $e->department?->name }}</td>
                <td class="p-2 text-center">{{ $present }}</td>
                <td class="p-2 text-center">{{ $absent }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</x-app-layout>
