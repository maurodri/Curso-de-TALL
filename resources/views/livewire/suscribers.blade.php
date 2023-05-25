<div>
<div class="p-6 bg-white border-b border-gray-200">
    <p class="text-2xl text-gray-600 font-bold mb-6 underline">
        Subscribers
    </p>

    <div class="px-8">
        <x-input
            type="text"
            class="rounded-lg border float-right border-gray-300 mb-4 w-1/3 pl-8"
            placeholder="Search"
            wire:model="search"
        ></x-input>
        @if ($suscribers->isEmpty())
            <div class="flex w-full bg-red-100 p-5 rounded-lg">
                <p class="text-red-400">
                    No subscribers found
                </p>
            </div>
        @else
            <table class="w-full">
                <thead
                    class="border-b-2 border-gray-300 text-indigo-600"
                >
                    <tr>
                        <th class="px-6 py-3 text-left">
                            Email
                        </th>
                        <th class="px-6 py-3 text-left">
                            Verified
                        </th>
                        <th class="px-6 py-3 text-left">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($suscribers as $suscriber)
                        <tr class="text-sm text-indigo-900 border-b border-gray-400">
                            <td class="px-6 py-4">
                                {{ $suscriber->email }}
                            </td>
                            <td class="px-6 py-4">
                                {{ optional($suscriber->email_verified_at)->diffForHumans() ?? 'Never' }}
                            </td>
                            <td class="px-6 py-4">
                                <x-button
                                    class="border border-red-600 text-red-600 bg-red-60 hover:bg-red-200"
                                    wire:click="delete({{ $suscriber->id }})"
                                >
                                    Delete
                                </x-button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
</div>
