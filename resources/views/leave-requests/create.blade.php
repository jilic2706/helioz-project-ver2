@php
    $min_date = date('Y-m-d');
@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Request') }}
        </h2>
    </x-slot>

    <x-card>
        <form method="POST" action="{{ route('leave-requests') }}">
            @csrf
            <!-- Date From -->
            <div class="mb-4">
                <x-input-label for="date_from" :value="__('Date From')" />

                <x-text-input
                    id="date_from"
                    class="block mt-1 w-full"
                    type="date"
                    min={{$min_date}}
                    name="date_from"
                    :value="old('date_from')"
                    required
                    autofocus />

                <x-input-error :messages="$errors->get('date_from')" class="mt-2" />
            </div>

            <!-- Date To -->
            <div class="mb-4">
                <x-input-label for="date_to" :value="__('Date To')" />

                <x-text-input
                    id="date_to"
                    class="block mt-1 w-full"
                    type="date"
                    min={{$min_date}}
                    name="date_to"
                    :value="old('date_to')"
                    required
                    autofocus />

                <x-input-error :messages="$errors->get('date_to')" class="mt-2" />
            </div>

            <!-- Reason -->
            <div class="mb-4">
                <x-input-label for="reason" :value="__('Reason')" />

                <x-text-input id="reason" class="block mt-1 w-full" type="text" name="reason" :value="old('reason')" required autofocus />

                <x-input-error :messages="$errors->get('reason')" class="mt-2" />
            </div>

            <div class="mb-4">
                <x-primary-button class="ml-4">
                    {{ __('Submit') }}
                </x-primary-button>

              <a href="{{ route('leave-requests') }}" class="text-black ml-4"> Back </a>
            </div>
          </form>
    </x-card>
</x-app-layout>
