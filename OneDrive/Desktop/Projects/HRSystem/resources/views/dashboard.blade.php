<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Dashboard</h2>
    </x-slot>

    <div class="py-4">
        <a href="{{ route('departments.index') }}" 
           class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
           Departments
        </a>
        <a href="{{ route('employees.index') }}" 
           class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 ml-2">
           Employees
        </a>
    </div>
</x-app-layout>
