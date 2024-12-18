@extends('admin.admin')

@section('title', 'Contact Us Message')

@section('content')
<div class="flex-1 p-6">
    <!-- Card -->
    <div class="bg-white shadow-lg rounded-lg p-6 max-w-3xl mx-auto">
        <!-- Heading -->
        <h2 class="text-3xl font-bold text-gray-800 mb-4">Message Details</h2>

        <!-- Full Name -->
        <div class="mb-4">
            <h3 class="text-lg font-semibold text-gray-700">Full Name</h3>
            <p class="text-gray-600">Chantikka Riffka</p>
        </div>

        <!-- Email -->
        <div class="mb-4">
            <h3 class="text-lg font-semibold text-gray-700">Email</h3>
            <p class="text-gray-600">cacabuyer@email.com</p>
        </div>

        <!-- Phone -->
        <div class="mb-4">
            <h3 class="text-lg font-semibold text-gray-700">Phone</h3>
            <p class="text-gray-600">084346522357</p>
        </div>

        <!-- Message -->
        <div class="mb-4">
            <h3 class="text-lg font-semibold text-gray-700">Message</h3>
            <p class="text-gray-600 leading-relaxed">
                Can you help me to inactive my account? i'm sorry if i have made some mistake in my artwork content
            </p>
        </div>

        <!-- Back Button -->
        <div class="flex justify-end">
            <a href="{{ route('admin.contact.show') }}" 
               class="px-4 py-2 bg-gray-300 text-gray-800 rounded-md hover:bg-gray-400">
                Back
            </a>
        </div>
    </div>
</div>
@endsection
