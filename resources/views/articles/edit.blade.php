<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('文章 > 編輯文章') }}
        </h2>
    </x-slot>
    @if (session()->has('notice'))
        <div class="bg-pink-300">
            {{ session()->get('notice') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="errors p-3 bg-red-500 text-red-100 font-thin rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>

    @endif

    <form action="{{ route('articles.update', $article) }}" method="post">
        @csrf
        @method('patch')
        <div class="field my-2">
            <label for="">標題</label>
            <input type="text" name="title" class="border border-gray-300 p-2" value="{{ $article->title }}" />
        </div>

        <div class="field my-2">
            <label for="">內文</label>
            <textarea name="content" cols="30" rows="10"
                class="border border-gray-300 p-2">{{ $article->content }}</textarea>
        </div>

        <div class="actions">
            <button type="submit" class=" px-3 py-1 rounded bg-gray-200 hover:bg-gray-300">編輯文章</button>
        </div>
    </form>
</x-app-layout>
