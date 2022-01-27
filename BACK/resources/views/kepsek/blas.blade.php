@extends('assetabsen/master')
@section('conten1')
<div id="page">
    
        @include('assetabsen/navbar') 
    
    <div class="page-content">
        
        <div class="page-title page-title-small">
            <h2><a href="#" data-back-button><i class="fa fa-arrow-left"></i></a>{{$listener}}</h2>
            <a href="#" data-menu="menu-main" class="bg-fade-gray1-dark shadow-xl preload-img" data-src="{{url('/storage')}}/{{Auth::user()->profile_photo_path}}"></a>
        </div>
        <div class="card header-card shape-rounded" data-card-height="150">
            <div class="card-overlay bg-highlight opacity-95"></div>
            <div class="card-overlay dark-mode-tint"></div>
            <div class="card-bg preload-img" data-src="images/pictures/20s.jpg"></div>
        </div>
        
        <div class="card card-style">
            <div class="content">
                <div class="d-flex">
                    <div>
                        <img src="{{url('/storage')}}/{{Auth::user()->profile_photo_path}}" width="50" class="mr-3 bg-highlight rounded-xl">
                    </div>
                    <div>
                        <h2 class="mb-0 pt-1">{{Auth::user()->name}}</h2>
                        <p class="color-highlight text-uppercase font-11 mt-n1 mb-3">{{Auth::user()->jabatan}} SMKN 4 Bogor</p>
                    </div>
                </div>
                <p>
                    Berikut Adalah Data Pegawai {{$listener}} Pada Tanggal {{date('d-m-Y')}}
                </p>
            </div>
        </div>
        
        <div class="card card-style">
            <div class="content">
                @foreach ($data as $key => $item)
                
                <div class="user-slider owl-carousel">
                    <div class="user-left">
                        <div class="d-flex">
                            <div><img src="{{url('/storage')}}/{{$item->profile_photo_path}}" class="mr-3 rounded-circle shadow-l bg-red2-dark" width="50"></div>
                            <div>
                                <h5 class="mt-1 mb-0">{{$item->name}}</h5>
                                <p class="font-10 mt-n1 color-red2-dark">{{$item->jabatan}} SMKN4 Kota Bogor</p>
                            </div>
                            <div class="ml-auto">
                                {{-- <span class="next-slide-user badge bg-red2-dark mt-2 p-2 font-8">TAP FOR MORE</span> --}}
                            </div>
                        </div>
                    </div>
                    <div class="user-right">
                        <div class="d-flex">
                            <div>
                                <h5 class="mt-1 mb-0">{{$item->name}}</h5>
                                <p class="font-10 mt-n1 color-red2-dark">{{$item->jabatan}} SMKN4 Kota Bogor</p>
                            </div>
                            <div class="ml-auto">
                                {{-- <a href="#" class="icon icon-xs rounded-circle shadow-l bg-phone"><i class="fa fa-phone"></i></a>
                                <a href="#" class="icon icon-xs rounded-circle shadow-l bg-facebook mr-2 ml-2"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" class="icon icon-xs rounded-circle shadow-l bg-twitter"><i class="fab fa-twitter"></i></a> --}}
                            </div>
                        </div>
                    </div>
                </div>              
                <div class="divider mt-3"></div>                    
                {{-- @dd($item) --}}
                @endforeach


            </div>
        </div>

        <!-- footer and footer card-->
        <div class="footer" data-menu-load="{{url('/foot')}}"></div>  
    </div>    
    <!-- end of page content-->
        
</div>    
@endsection