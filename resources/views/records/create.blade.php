<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('試合記録作成') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          <form method="POST" action="{{ route('records.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
              <label for="opponent" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">対戦相手</label>
              <input type="text" name="opponent" id="opponent" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            
            <div class="mb-4">
              <label for="record" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">振り返り</label>
              <textarea name="record" id="record" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
            </div>
            
            <div class="mb-4">
              <label for="video" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">動画をアップロード (最長1時間)</label>
              <input type="file" name="video" id="video" accept="video/*" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">記録する</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
5