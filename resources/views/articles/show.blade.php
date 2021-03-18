<x-app-layout>
    <div>
        <a href="{{ route('articles.index') }}">回文章列表</a>
    </div>
    標題:
    <p class="text-lg text-gray-700 p-2">
        {{ $article->title }}
    </p>
    內文:
    <p class="text-lg text-gray-700 p-2">
        {{ $article->content }}
    </p>
</x-app-layout>
