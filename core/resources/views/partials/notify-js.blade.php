
@if($general->alert == 1)
    <script src="{{ asset('assets/admin/js/iziToast.min.js') }}"></script>
    @if(session()->has('notify'))
        @foreach(session('notify') as $msg)
            <script type="text/javascript">  iziToast.{{ $msg[0] }}({message:"{{ $msg[1] }}", position: "topRight"}); </script>
        @endforeach
        @php
            Session::forget('notify');
        @endphp
    @endif
    @if ($errors->any())
        <script>
            @foreach ($errors->all() as $error)
            iziToast.error({
                message: '{{ $error }}',
                position: "topRight"
            });
            @endforeach
        </script>
    @endif


    @if (Session::has('invest'))
        <script type="text/javascript">  iziToast.success({message:"{{ __(Session::get('invest')) }}", position: "topRight"}); </script>
    @endif


@elseif($general->alert == 2)
    <!-- Toastr -->
    <script src="{{ asset('assets/admin/js/toastr.min.js') }}"></script>
    @if(session()->has('notify'))
        @foreach(session('notify') as $msg)
            <script type="text/javascript">  toastr.{{ $msg[0] }}("{{ $msg[1] }}"); </script>
        @endforeach
    @endif
    @if ($errors->any())
        <script>

            @foreach ($errors->all() as $error)
            toastr.error('{{ $error }}');
            @endforeach
        </script>

    @endif


    @if (Session::has('invest'))
        <script type="text/javascript">  toastr.success("{{ __(Session::get('invest')) }}"); </script>
    @endif

@endif
