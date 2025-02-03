<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('users.update', $user) }}">
                        @csrf
                        @method('PUT')
                        <div>
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" value="{{ $user->name }}" required>
                        </div>
                        <div>
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" value="{{ $user->email }}" required>
                        </div>
                        <div>
                            <label for="email">Role</label>
                            <input type="text" id="usertype" name="usertype" value="{{ $user->usertype }}" required>
                        </div>
                        <div>
                            <label for="password">Password (leave blank to keep current)</label>
                            <input type="password" id="password" name="password">
                        </div>
                        <div>
                            <button type="submit">Update User</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
