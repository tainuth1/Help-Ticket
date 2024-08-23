<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Your support Ticket') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl flex flex-col gap-4 mx-auto sm:px-6 lg:px-8">
            @forelse ($tickets as $ticket)
                <div class="bg-white flex justify-between items-center overflow-hidden shadow sm:rounded-lg p-6" style="border-left: 10px solid #ffd60a">
                    <a class="w-[200px]" href="{{ route('ticket.show', $ticket->id) }}">{{ $ticket->title }}</a>
                    @if ($ticket->status == 'Resolved')
                        <p class="text-[16px] w-[110px] rounded-md bg-[#3DC13C] text-white text-center py-1">{{ $ticket->status }}</p>
                    @elseif ($ticket->status == 'Rejected')
                        <p class="text-[16px] w-[110px] rounded-md bg-[#ff0000] text-white text-center py-1">{{ $ticket->status }}</p>
                    @elseif (ticket->status == 'Open')
                        <p class="text-[16px] w-[110px] rounded-md bg-[#B57BFF] text-white text-center py-1">{{ $ticket->status }}</p>
                    @endif
                    <p>{{ $ticket->created_at->diffForHumans() }}</p>
                </div>
            @empty
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    You doesn't have any ticket yet.
                </div>
            @endforelse
        </div>
    </div>
</x-app-layout>