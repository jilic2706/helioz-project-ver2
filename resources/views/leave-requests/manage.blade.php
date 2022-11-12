<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Requests') }}
        </h2>
    </x-slot>

    <table class="w-full table-auto rounded-sm">
        <tbody>
          @unless($leave_requests->isEmpty())
            @foreach($leave_requests as $leave_request)
            <tr class="border-gray-300">
                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                {{ $leave_request->date_from }}
                </td>

                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                    {{ $leave_request->date_to }}
                </td>

                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                    {{ $leave_request->reason }}
                </td>

                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                    <x-request-status status="{{$leave_request->status}}">
                        {{ $leave_request->status }}
                    </x-request-status>
                </td>
                @if($leave_request->status == 'pending')
                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                    <form method="POST" action="/leave-requests/{{$leave_request->id}}">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-600"><i class="fa-solid fa-trash"></i></button>
                    </form>
                </td>
                @endif
            </tr>
            @endforeach
          @else
          <tr class="border-gray-300">
            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
              <p class="text-center">No Requests Found</p>
            </td>
          </tr>
          @endunless

        </tbody>
      </table>
</x-app-layout>
