<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl">Edit Employee</h2></x-slot>

    <form method="POST" action="{{ route('employees.update',$employee) }}" class="max-w-xl space-y-4">
        @csrf @method('PUT')
        <div>
            <label class="block text-sm mb-1">Name</label>
            <input name="name" class="w-full border rounded p-2" required value="{{ old('name',$employee->name) }}">
            @error('name') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
        </div>
        <div>
            <label class="block text-sm mb-1">Email</label>
            <input type="email" name="email" class="w-full border rounded p-2" required value="{{ old('email',$employee->email) }}">
            @error('email') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
        </div>
        <div>
            <label class="block text-sm mb-1">Department</label>
            <select name="department_id" class="w-full border rounded p-2" required>
                @foreach($departments as $d)
                    <option value="{{ $d->id }}" @selected(old('department_id',$employee->department_id)==$d->id)>{{ $d->name }}</option>
                @endforeach
            </select>
            @error('department_id') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
        </div>
        <div class="flex gap-2">
            <button class="px-4 py-2 bg-blue-600 text-white rounded">Update</button>
            <a href="{{ route('employees.index') }}" class="px-4 py-2 border rounded">Cancel</a>
        </div>
    </form>
</x-app-layout>
