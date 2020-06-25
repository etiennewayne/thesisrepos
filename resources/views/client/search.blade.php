
<div class="card-deck">
        @foreach ($theses as $thesis)

        <div class="card" style="width: 18rem;">
                <img src="{{ asset('img/logo.png') }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{ $thesis->thesistitle }}</h5>
                <p class="card-text">{{ $thesis->thesisdesc }}</p>
                 <p>No of Views : {{ $thesis->noViews }}</p>
                <a href="/client/pdfviewer/{{ $thesis->thesisfileID }}/{{ $thesis->abstractfile }}" class="btn btn-primary">View File</a>

            </div>
        </div>

    @endforeach

</div>

