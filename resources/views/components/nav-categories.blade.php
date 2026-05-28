<div>
    <ul class="flex gap-4">
        @foreach ($categories as $category)
            <li class="bg-white hover:bg-blue-100 p-6 rounded-xl shadow text-center">
                <a href="{{ route("categories.show", $category) }}">{{ $category->name }}</a>
            </li>
        @endforeach
    </ul>
</div>