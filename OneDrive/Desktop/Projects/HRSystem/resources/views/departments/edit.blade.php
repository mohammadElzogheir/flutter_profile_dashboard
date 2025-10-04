<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl">Edit Department</h2></x-slot>

    <form method="POST" action="{{ route('departments.update',$department) }}" class="max-w-xl space-y-4">
        @csrf @method('PUT')
        <div>
            <label class="block text-sm mb-1">Name</label>
            <input name="name" class="w-full border rounded p-2" required value="{{ old('name',$department->name) }}">
            @error('name') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
        </div>
        <div>
            <label class="block text-sm mb-1">Description</label>
            <textarea name="description" class="w-full border rounded p-2" rows="4">{{ old('description',$department->description) }}</textarea>
        </div>
        <div class="flex gap-2">
            <button class="px-4 py-2 bg-blue-600 text-white rounded">Update</button>
            <a href="{{ route('departments.index') }}" class="px-4 py-2 border rounded">Cancel</a>
        </div>
    </form>
</x-app-layout>
