@include('assetabsen/head')

@section('foot')
<div class="footer" data-menu-load="{{url('/foot')}}"></div>
@endsection

@yield('conten1')

@include('assetabsen/footer')