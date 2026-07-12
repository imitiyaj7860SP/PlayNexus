@extends('layouts.app')
@section('title', 'My Profile')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-12">

    {{-- Header --}}
    <div class="flex items-center justify-between mb-10">
        <div>
            <h1 class="font-gaming text-3xl font-black text-white">
                MY <span class="bg-gradient-to-r from-purple-400 to-cyan-400 bg-clip-text text-transparent">PROFILE</span>
            </h1>
            <p class="text-gray-400 mt-1">Manage your account settings</p>
        </div>

        {{-- Logout Button --}}
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                    class="flex items-center gap-2 bg-red-600/20 hover:bg-red-600/40 border border-red-500/40 hover:border-red-500/70 text-red-400 hover:text-red-300 px-5 py-2.5 rounded-xl text-sm font-bold transition-all duration-300 hover:-translate-y-0.5">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                </svg>
                Logout
            </button>
        </form>
    </div>

    {{-- User Info Card --}}
    <div class="bg-gray-900/60 border border-gray-800/60 rounded-3xl p-6 mb-6 flex items-center gap-5">
        <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-purple-500 to-cyan-400 flex items-center justify-center text-2xl font-black shrink-0">
            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
        </div>
        <div>
            <div class="font-gaming text-xl font-black text-white">{{ auth()->user()->name }}</div>
            <div class="text-gray-400 text-sm">{{ auth()->user()->email }}</div>
            <div class="text-gray-500 text-xs mt-1">Member since {{ auth()->user()->created_at->format('M Y') }}</div>
        </div>
    </div>

    {{-- Update Profile Info --}}
    <div class="bg-gray-900/60 border border-gray-800/60 rounded-3xl p-8 mb-6">
        <h2 class="font-gaming text-sm font-bold text-white mb-6 flex items-center gap-2">
            ✏️ UPDATE PROFILE INFORMATION
        </h2>

        <form method="POST" action="{{ route('profile.update') }}" class="space-y-5">
            @csrf
            @method('patch')

            {{-- Name --}}
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Full Name</label>
                <input type="text" name="name" value="{{ old('name', auth()->user()->name) }}" required
                       class="w-full bg-gray-800/60 border border-gray-700/50 text-gray-100 placeholder-gray-500 rounded-xl px-4 py-3 text-sm focus:border-purple-500 focus:ring-1 focus:ring-purple-500 outline-none transition-colors">
                @error('name')
                    <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Email --}}
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Email Address</label>
                <input type="email" name="email" value="{{ old('email', auth()->user()->email) }}" required
                       class="w-full bg-gray-800/60 border border-gray-700/50 text-gray-100 placeholder-gray-500 rounded-xl px-4 py-3 text-sm focus:border-purple-500 focus:ring-1 focus:ring-purple-500 outline-none transition-colors">
                @error('email')
                    <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            @if (auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! auth()->user()->hasVerifiedEmail())
                <div class="bg-yellow-900/30 border border-yellow-700/40 rounded-xl px-4 py-3">
                    <p class="text-yellow-300 text-xs">
                        Your email is unverified.
                        <button form="send-verification" class="underline hover:text-yellow-200 transition-colors">Click here to re-send verification.</button>
                    </p>
                </div>
            @endif

            @if (session('status') === 'profile-updated')
                <div class="bg-green-900/40 border border-green-500/30 text-green-300 px-4 py-3 rounded-xl text-sm">
                    ✅ Profile updated successfully!
                </div>
            @endif

            <button type="submit"
                    class="bg-gradient-to-r from-purple-600 to-cyan-500 hover:from-purple-500 hover:to-cyan-400 text-white px-8 py-3 rounded-xl font-bold text-sm transition-all duration-300 hover:-translate-y-0.5 shadow-lg shadow-purple-500/20">
                Save Changes
            </button>
        </form>
    </div>

    {{-- Update Password --}}
    <div class="bg-gray-900/60 border border-gray-800/60 rounded-3xl p-8 mb-6">
        <h2 class="font-gaming text-sm font-bold text-white mb-6 flex items-center gap-2">
            🔐 UPDATE PASSWORD
        </h2>

        <form method="POST" action="{{ route('password.update') }}" class="space-y-5">
            @csrf
            @method('put')

            {{-- Current Password --}}
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Current Password</label>
                <input type="password" name="current_password" autocomplete="current-password"
                       class="w-full bg-gray-800/60 border border-gray-700/50 text-gray-100 placeholder-gray-500 rounded-xl px-4 py-3 text-sm focus:border-purple-500 focus:ring-1 focus:ring-purple-500 outline-none transition-colors">
                @error('current_password', 'updatePassword')
                    <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- New Password --}}
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">New Password</label>
                <input type="password" name="password" autocomplete="new-password"
                       class="w-full bg-gray-800/60 border border-gray-700/50 text-gray-100 placeholder-gray-500 rounded-xl px-4 py-3 text-sm focus:border-purple-500 focus:ring-1 focus:ring-purple-500 outline-none transition-colors">
                @error('password', 'updatePassword')
                    <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Confirm Password --}}
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Confirm New Password</label>
                <input type="password" name="password_confirmation" autocomplete="new-password"
                       class="w-full bg-gray-800/60 border border-gray-700/50 text-gray-100 placeholder-gray-500 rounded-xl px-4 py-3 text-sm focus:border-purple-500 focus:ring-1 focus:ring-purple-500 outline-none transition-colors">
                @error('password_confirmation', 'updatePassword')
                    <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            @if (session('status') === 'password-updated')
                <div class="bg-green-900/40 border border-green-500/30 text-green-300 px-4 py-3 rounded-xl text-sm">
                    ✅ Password updated successfully!
                </div>
            @endif

            <button type="submit"
                    class="bg-gradient-to-r from-purple-600 to-cyan-500 hover:from-purple-500 hover:to-cyan-400 text-white px-8 py-3 rounded-xl font-bold text-sm transition-all duration-300 hover:-translate-y-0.5 shadow-lg shadow-purple-500/20">
                Update Password
            </button>
        </form>
    </div>

    {{-- Delete Account --}}
    <div class="bg-gray-900/60 border border-red-900/30 rounded-3xl p-8">
        <h2 class="font-gaming text-sm font-bold text-red-400 mb-2 flex items-center gap-2">
            ⚠️ DELETE ACCOUNT
        </h2>
        <p class="text-gray-400 text-sm mb-6">Once deleted, all your data will be permanently removed. This action cannot be undone.</p>

        <button onclick="document.getElementById('confirm-delete-modal').classList.remove('hidden')"
                class="bg-red-600/20 hover:bg-red-600/40 border border-red-500/40 hover:border-red-500 text-red-400 hover:text-red-300 px-6 py-3 rounded-xl text-sm font-bold transition-all duration-300">
            Delete My Account
        </button>
    </div>

</div>

{{-- Delete Confirmation Modal --}}
<div id="confirm-delete-modal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/70 backdrop-blur-sm px-4">
    <div class="bg-gray-900 border border-red-900/50 rounded-3xl p-8 max-w-md w-full shadow-2xl">
        <div class="text-4xl mb-4 text-center">⚠️</div>
        <h3 class="font-gaming text-xl font-black text-white text-center mb-2">Are you sure?</h3>
        <p class="text-gray-400 text-sm text-center mb-8">This will permanently delete your account and all your gaming data.</p>

        <form method="POST" action="{{ route('profile.destroy') }}">
            @csrf
            @method('delete')

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-300 mb-2">Enter your password to confirm</label>
                <input type="password" name="password" placeholder="Your password" required
                       class="w-full bg-gray-800 border border-gray-700 text-gray-100 placeholder-gray-500 rounded-xl px-4 py-3 text-sm focus:border-red-500 outline-none transition-colors">
                @error('password', 'userDeletion')
                    <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-3">
                <button type="button"
                        onclick="document.getElementById('confirm-delete-modal').classList.add('hidden')"
                        class="flex-1 border border-gray-700 hover:border-gray-500 text-gray-300 hover:text-white py-3 rounded-xl text-sm font-bold transition-all">
                    Cancel
                </button>
                <button type="submit"
                        class="flex-1 bg-red-600 hover:bg-red-500 text-white py-3 rounded-xl text-sm font-bold transition-all">
                    Yes, Delete
                </button>
            </div>
        </form>
    </div>
</div>

@endsection