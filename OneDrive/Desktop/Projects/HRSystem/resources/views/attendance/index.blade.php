<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl">Attendance</h2></x-slot>

    @if(session('ok')) <div class="text-green-600 mb-4">{{ session('ok') }}</div> @endif

    <form method="GET" class="mb-4 flex items-center gap-2">
        <input type="date" name="date" value="{{ $date }}" class="border rounded p-2">
        <button class="px-3 py-2 bg-gray-200 rounded">Go</button>
        <a href="{{ route('attendance.report') }}" class="px-3 py-2 border rounded">Monthly report</a>
    </form>

    <form method="POST" action="{{ route('attendance.store') }}">
        @csrf
        <input type="hidden" name="date" value="{{ $date }}">
        <table class="w-full border">
            <thead><tr class="bg-gray-100">
                <th class="p-2 text-left">Employee</th>
                <th class="p-2">Present</th>
                <th class="p-2">Absent</th>
                <th class="p-2">Record</th>
            </tr></thead>
            <tbody>
            @foreach($employees as $e)
                @php $st = $records[$e->id]->status ?? 'present'; @endphp
                <tr class="border-t">
                    <td class="p-2">{{ $e->name }}</td>
                    <td class="p-2 text-center">
                        <input type="radio" name="status[{{ $e->id }}]" value="present" {{ $st=='present'?'checked':'' }}>
                    </td>
                    <td class="p-2 text-center">
                        <input type="radio" name="status[{{ $e->id }}]" value="absent" {{ $st=='absent'?'checked':'' }}>
                    </td>
                    <td class="p-2 text-center">
                        <a class="text-blue-600" href="{{ route('attendance.employee',$e) }}">View</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <button class="mt-4 px-4 py-2 bg-blue-600 text-white rounded">Save</button>
    </form>
</x-app-layout>
