{{--<div class="col-12 mt-4 d-flex justify-content-between" >
    <ul class="pagination">
        @foreach($data->data->links as $ind => $link)
            <li class="page-item {{ ($data->data->current_page==$link->label)?'active':'' }}"><a class="page-link" href="{{ $link->url }}">{!! $link->label !!}</a></li>
        @endforeach
    </ul>
    <p class="font-size-13 text-gray">
        Showing {{ $data->data->from }} to {{ $data->data->to }} of {{ $data->data->total }} entries
    </p>
</div>--}}

<div class="row paginationDiv">
    <div class="col-12 col-md-6">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                @foreach($data->data->links as $ind => $link)
                    <li class="page-item {{ ($data->data->current_page==$link->label)?'active':'' }}"><a class="page-link" href="{{ $link->url }}">{!! $link->label !!}</a></li>
                @endforeach
            </ul>
        </nav>
    </div>
    <div class="col-12 col-md-6">
        <div class="showingEntries">
            <p class="showOutof">
                Showing {{ $data->data->from }} to {{ $data->data->to }} of {{ $data->data->total }} entries
            </p>

        </div>
    </div>
</div>
