<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $ticket->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl flex flex-col gap-4 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white flex justify-between items-center overflow-hidden shadow sm:rounded-lg p-6" style="border-left: 10px solid #ffd60a">
                <a class="w-[150px]" href="{{ route('ticket.show', $ticket->id) }}">{{ $ticket->description }}</a>
                <p>{{ $ticket->created_at->diffForHumans() }}</p>
                @if ($ticket->status == 'Resolved')
                    <p class="text-[16px] w-[110px] rounded-md bg-[#3DC13C] text-white text-center py-1">{{ $ticket->status }}</p>
                @elseif ($ticket->status == 'Rejected')
                    <p class="text-[16px] w-[110px] rounded-md bg-[#ff0000] text-white text-center py-1">{{ $ticket->status }}</p>
                @elseif (ticket->status == 'Open')
                    <p class="text-[16px] w-[110px] rounded-md bg-[#B57BFF] text-white text-center py-1">{{ $ticket->status }}</p>
                @endif
                <div class="flex gap-3">
                    <a href="{{ route('ticket.edit', $ticket->id) }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                        Edit
                    </a>
                    <form action="{{ route('ticket.destroy', $ticket->id) }}" method="post">
                        @method('delete')
                        @csrf
                        <button class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150" type="submit">
                            Delete
                        </button>
                    </form>
                    @if (auth()->user()->isAdmin)
                        
                        <form action="{{ route('ticket.update', $ticket->id) }}" method="post">
                            @method('patch')
                            @csrf
                            <input type="hidden" name="status" value="Resolved">
                            <button class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150" type="submit">
                                Approve
                            </button>
                        </form>
                        <form action="{{ route('ticket.update', $ticket->id) }}" method="post">
                            @method('patch')
                            @csrf
                            <input type="hidden" name="status" value="Rejected">
                            <button class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150" type="submit">
                                Reject
                            </button>
                        </form>
                    @endif
                </div>
                
            </div>
            <h2 class="mt-4 text-[24px] font-bold">
                Attachment
            </h2>
            <div class="bg-white w-full h-[500px] flex justify-center items-center overflow-hidden shadow sm:rounded-lg ">
                @if ($ticket->attachment)
                    <img class="h-full" src="/storage/{{ $ticket->attachment }}" alt="attachment">
                @else
                    <p>This Ticket Don't have any attachment yet</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>