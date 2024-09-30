<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-red-500 leading-tight uppercase tracking-wide">
            {{ __('VCT Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 border border-red-600 shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-300">
                    <h3 class="text-xl font-semibold mb-4">{{ __("Upcoming VCT Matches") }}</h3>

                    <table class="min-w-full bg-gray-900 border border-red-500 shadow-lg rounded-lg">
                        <thead>
                            <tr class="bg-red-600 text-white uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">Event</th>
                                <th class="py-3 px-6 text-left">Match</th>
                                <th class="py-3 px-6 text-left">Teams</th>
                                <th class="py-3 px-6 text-left">Status</th>
                                <th class="py-3 px-6 text-left">Scheduled At</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-300 text-sm font-light">
                            @foreach ($matches as $match)
                                <tr class="border-b border-gray-700 hover:bg-gray-800">
                                    <!-- イベント名 (トーナメント名) -->
                                    <td class="py-3 px-6">
                                        {{ $match['tournament']['name'] ?? 'N/A' }}
                                    </td>

                                    <!-- 試合名 (例: "Grand Final: Team A vs Team B") -->
                                    <td class="py-3 px-6">
                                        {{ $match['name'] ?? 'No match name available' }}
                                    </td>

                                    <!-- チーム名 -->
                                    <td class="py-3 px-6">
                                        @if (isset($match['opponents'][0]) && isset($match['opponents'][1]))
                                            {{ $match['opponents'][0]['opponent']['name'] ?? 'TBD' }} 
                                            vs 
                                            {{ $match['opponents'][1]['opponent']['name'] ?? 'TBD' }}
                                        @else
                                            TBD
                                        @endif
                                    </td>

                                    <!-- ステータス -->
                                    <td class="py-3 px-6">
                                        <span class="text-xs font-medium {{ $match['status'] == 'not_started' ? 'bg-blue-500' : 'bg-green-500' }} text-white py-1 px-3 rounded-full">
                                            {{ $match['status'] ?? 'Unknown' }}
                                        </span>
                                    </td>

                                    <!-- 試合の開始時刻 -->
                                    <td class="py-3 px-6">
                                        {{ \Carbon\Carbon::parse($match['scheduled_at'])->format('Y-m-d H:i') }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="p-6 mt-6 bg-gray-800 border border-red-600 text-gray-400">
                    <p>{{ __("You're logged in!") }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
