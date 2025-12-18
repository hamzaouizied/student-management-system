@extends('layouts.dashboard')

@section('header', 'Users')

@section('main-content')
    <div class="bg-white">
        <table id="users-table" class="w-full text-sm">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="p-3">ID</th>
                    <th class="p-3">Name</th>
                    <th class="p-3">Email</th>
                    <th class="p-3">Created</th>
                    <th class="p-3">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($users as $user)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="p-3">{{ $user->id }}</td>
                        <td class="p-3">{{ $user->name }}</td>
                        <td class="p-3">{{ $user->email }}</td>
                        <td class="p-3">{{ $user->created_at->format('Y-m-d') }}</td>
                        <td class="p-3 space-x-2">
                            <a href="#" class="text-blue-600 hover:underline">Edit</a>
                            <a href="#" class="text-red-600 hover:underline">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            $('#users-table').DataTable({
                pageLength: 19,
                lengthChange: false,
                ordering: true,
                responsive: true,
                language: {
                    search: "Search:",
                    paginate: {
                        previous: "Prev",
                        next: "Next"
                    }
                }
            });
        });
    </script>
@endpush