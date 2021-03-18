<x-app-layout>
    @if (session()->has('notice'))
        <div class="bg-pink-300">
            {{ session()->get('notice') }}
        </div>
    @endif
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('文章列表') }}
        </h2>
    </x-slot>
    @if (auth()->user())
        <a href="{{ route('articles.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold px-4">新增文章</a>
    @endif
    @foreach ($articles as $article)
        <div class="border-t border-gray-300 my-1 p-2">
            <h2 class="font-bold text-lg">
                <a href="{{ route('articles.show', $article) }}"> {{ $article->title }}</a>
            </h2>
            <p>{{ $article->created_at }} 由 {{ $article->user->name }} 建立</p>
            @if (auth()->user() && auth()->user()->id == $article->user->id)
                <div class="flex">
                    <a class="mr-4 bg-blue-500 hover:bg-blue-700 text-white font-bold px-4" href="{{ route('articles.edit', $article) }}">編輯</a>
                    <form action="{{ route('articles.destroy', $article) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="px-2 bg-red-500 text-red-100">刪除</button>
                    </form>
                </div>
            @endif
        </div>
    @endforeach
    {{ $articles->links() }}
</x-app-layout>
