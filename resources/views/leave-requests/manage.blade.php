<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Requests') }}
        </h2>
    </x-slot>

    <x-card>
        @unless($leave_requests->isEmpty())
        <table style="table-layout:fixed;" class="w-full rounded-sm">
            <thead>
                <tr>
                    <th style="width:12rem;">Date From</th>
                    <th style="width:12rem;">Date To</th>
                    <th>Reason</th>
                    <th style="width:7rem;">Status</th>
                    <th style="width:7rem;"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($leave_requests as $leave_request)
                <tr class="border-gray-300">
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-base">
                    {{ $leave_request->date_from }}
                    </td>

                    <td class="px-4 py-8 border-t border-b border-gray-300 text-base">
                        {{ $leave_request->date_to }}
                    </td>

                    <td class="px-4 py-8 border-t border-b border-gray-300 text-base">
                        {{ $leave_request->reason }}
                    </td>

                    <td class="px-4 py-8 border-t border-b border-gray-300 text-base">
                        <x-request-status status="{{$leave_request->status}}">
                            {{ $leave_request->status }}
                        </x-request-status>
                    </td>
                    @if($leave_request->status == 'pending')
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-base">
                        <form method="POST" action="/leave-requests/{{$leave_request->id}}">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
            <p class="text-center py-2">No Requests Found</p>
        @endunless
    </x-card>
</x-app-layout>
