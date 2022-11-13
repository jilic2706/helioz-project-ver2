<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Requests') }}
        </h2>
    </x-slot>

    <x-card>
        @unless(count($all_leave_requests) == 0)
            @foreach($all_leave_requests as $department_name => $department_leave_requests)
                <p class="text-lg font-semibold">{{ $department_name }}</p>
                @unless(count($department_leave_requests) == 0)
                    @foreach($department_leave_requests as $leave_requests)
                        <table style="table-layout:fixed; margin: 0.5rem 0;" class="w-full rounded-sm">
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
                                <tr>
                                    <td class="px-4 py-8 border-t border-b border-gray-300 text-base">
                                        {{ $leave_request->date_from }}
                                    </td>

                                    <td class="px-4 py-8 border-t border-b border-gray-300 text-base">
                                        {{ $leave_request->date_to }}
                                    </td>

                                    <td class="px-4 py-8 border-t border-b border-gray-300 text-base">
                                        {{ $leave_request->reason }}
                                    </td>

                                    <td class="px-4 py-8 border-t border-b border-gray-300 text-base text-center">
                                        <x-request-status status="{{$leave_request->status}}">
                                            {{ $leave_request->status }}
                                        </x-request-status>
                                    </td>

                                    <td class="px-4 py-8 border-t border-b border-gray-300 text-base">
                                        <div style="gap: 0.7rem;" class="flex justify-center">
                                            <form method="POST" action="/leave-requests/{{$leave_request->id}}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="text-red-600" {{$leave_request->status == 'denied' ? 'disabled' : ''}}><i class="fa-solid fa-circle-xmark"></i></button>
                                            </form>
                                            <form method="POST" action="/leave-requests/{{$leave_request->id}}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="text-green-600" {{$leave_request->status == 'approved' ? 'disabled' : ''}}><i class="fa-solid fa-circle-check"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            <tbody>
                        </table>
                    @endforeach
                @else
                    <p class="text-center py-2">No Requests Found</p>
                @endunless
            @endforeach
        @else
            <p class="text-center py-2">No Departments Found</p>
        @endunless
    </x-card>
</x-app-layout>
