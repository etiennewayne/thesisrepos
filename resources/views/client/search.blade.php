

        @foreach ($theses as $thesis)

            <div class="d-inline-block overflow-hidden">
                <div class="card float-left m-2" style="width: 18rem; height: 500px;">
                    <img src="{{ asset('img/logo.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-truncate">{{ $thesis->thesistitle }}</h5>
                        <p class="card-text text-truncate">{{ $thesis->thesisdesc }}</p>
                        <p>No of Views : {{ $thesis->noViews }}</p>
                        <a href="/client/pdfviewer/{{ $thesis->thesisfileID }}" class="btn btn-primary">View File</a>
                    </div>
                </div>

            </div>


        @endforeach


        <div class="clearfix"></div>


