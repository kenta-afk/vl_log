<x-app-layout>
  <x-slot name="header">
    <h2 class="font-bold text-2xl text-red-600 leading-tight">
      {{ __('試合記録詳細') }}
    </h2>
  </x-slot>

  <div class="py-12 bg-gray-900">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-gray-800 border border-red-600 shadow-lg sm:rounded-lg">
        <div class="p-6 text-gray-300">
          <!-- 一覧に戻るリンク -->
          <a href="{{ route('records.index') }}" class="text-blue-400 hover:text-blue-600 mr-2">一覧に戻る</a>

          <!-- 対戦相手、記録情報、投稿者名 -->
          <p class="text-lg text-red-500 mt-4">vs {{ $record->opponent }}</p>
          <p class="text-lg text-gray-300">{{ $record->record }}</p>
          <p class="text-sm text-gray-400">投稿者: {{ $record->user->name }}</p>

          <!-- 作成日と更新日 -->
          <div class="text-sm text-gray-400">
            <p>作成日時: {{ $record->created_at->format('Y-m-d H:i') }}</p>
            <p>更新日時: {{ $record->updated_at->format('Y-m-d H:i') }}</p>
          </div>

          <!-- 編集・削除ボタン (投稿者のみ表示) -->
          @if (auth()->id() == $record->user_id)
          <div class="flex mt-4 space-x-4">
            <a href="{{ route('records.edit', $record) }}" class="text-blue-400 hover:text-blue-600">編集</a>
            <form action="{{ route('records.destroy', $record) }}" method="POST" onsubmit="return confirm('本当に削除しますか？');">
              @csrf
              @method('DELETE')
              <button type="submit" class="text-red-500 hover:text-red-700">削除</button>
            </form>
          </div>
          @endif

          <!-- コメント入力フォーム -->
          <form method="POST" action="{{ route('records.comment', $record->id) }}" class="mt-6">
            @csrf
            <label for="comment" class="block text-sm font-bold text-gray-400 mb-2">コメント</label>
            <input type="text" name="comment" id="comment" class="w-full p-2 rounded-lg border border-red-600 bg-gray-700 text-gray-300 focus:outline-none focus:ring-2 focus:ring-red-600">

            <button type="submit" class="mt-4 bg-red-600 hover:bg-red-800 text-white font-bold py-2 px-4 rounded-lg">コメントする</button>
          </form>

          <!-- 動画がある場合に表示 -->
          @if ($record->video)
            <div class="record-video mt-6">
              <video controls class="w-full rounded-lg border border-red-600">
                <source src="{{ asset('storage/' . $record->video) }}" type="video/mp4">
                お使いのブラウザは動画タグをサポートしていません。
              </video>
            </div>
          @endif

          <!-- コメント一覧 -->
          <div class="mt-8">
            <h3 class="text-xl text-red-500 mb-4">コメント</h3>
            @foreach($record->users as $user)
              <div class="mb-4 p-4 bg-gray-700 border border-gray-600 rounded-lg">
                <p class="text-red-500">@ {{ $user->name }}</p>
                <p class="text-gray-400 text-sm">{{ $user->pivot->comment }}</p>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
