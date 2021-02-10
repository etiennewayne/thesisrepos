

        @foreach ($theses as $thesis)


            <div class="" style="border-bottom: 1px solid #a9a5a5;">

                <div style="display: flex; justify-content: center;" class="mb-2 p-2">
                    <div style="flex: 1;">
                        <h5 class="">{{ $thesis->thesistitle }}</h5>
                    </div>

                    <div style="flex: 2">
                        <p class="">{{ $thesis->thesisdesc }}</p>
                    </div>

                    <div style="margin: auto;">
                        <a href="/client/pdfviewer/{{ $thesis->thesisfileID }}" class="btn btn-primary">View File</a>
                    </div>



                </div>

                <div class="d-flex">
                    <div style="flex: 1;">
                        CATEGORY: {{ $thesis->category }}
                    </div>

                    <div style="flex: 1;">
                        PROGRAM: {{ $thesis->programCode }}
                    </div>

                </div>
            </div>
        @endforeach



