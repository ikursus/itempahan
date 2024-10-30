<ul>
    @foreach ($child as $subKategori)
        <li>{{ $subKategori->name }}</li>

        @if ($kategori->child->isNotEmpty())
            @include('kategori.template-sub-kategori', ['child' => $subKategori->childRecursive])
        @endif
    @endforeach
</ul>


