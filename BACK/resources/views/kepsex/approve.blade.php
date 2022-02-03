@extends('assetabsen/master')
@section('conten1')
<div id="page">
    
    <!-- header and footer bar go here-->
    @include('assetabsen/navbar') 
    
    <div class="page-content">
        
        <div class="page-title page-title-small">
            <h2><a href="#" data-back-button><i class="fa fa-arrow-left"></i></a>Pengajuan</h2>
            <a href="#" data-menu="menu-main" class="bg-fade-gray1-dark shadow-xl preload-img" data-src="{{url('/azure')}}/images/avatars/5s.png"></a>
        </div>
        <div class="card header-card shape-rounded" data-card-height="150">
            <div class="card-overlay bg-highlight opacity-95"></div>
            <div class="card-overlay dark-mode-tint"></div>
            <div class="card-bg preload-img" data-src="{{url('/azure')}}/images/pictures/20s.jpg"></div>
        </div>
        
        
        <div class="card card-style">
            <div class="content">

                @foreach ($wfh as $w)
                @if ($w->appv == 0)
    
                <div class="user-slider owl-carousel">
                    <div class="user-left">
                        <div class="d-flex">
                            <div><img src="{{url('/storage')}}/{{$w->profile_photo_path}}" class="mr-3 rounded-circle shadow-l bg-red2-dark" style="height: 100px;
                                width: 100px;object-fit:cover;"></div>
                            <div>
                                <h5 class="mt-1 mb-0">{{$w->name}}</h5>
                                <p class="font-10 mt-n1 color-red2-dark">{{$w->jabatan}}</p>
                                
                            </div>
                            <div class="ml-auto"><span class="next-slide-user badge bg-red2-dark mt-2 p-2 font-8">Aksi</span></div>
                        </div>
                    </div>
                    <div class="user-right">
                        <div class="d-flex">
                            <div>
                                <h5 class="mt-1 mb-0">Pengajuan </h5>
                                <p class="font-10 mt-n1 color-dark">{{$w->deskripsi}}</p>
                                <p class="mt-0 mb-0">({{$w->mulai ." s.d ".$w->akhir}})</p>
                                

                            </div>
                            <div class="ml-auto">
                                {{-- {!! Form::open(['method' => 'GET', 'route' => 'yes2', {{$w->id_user}}]) !!}
                                <button name="f1" type="submit"><i class="fas fa-check">Delete</i></button>
                                {!! Form::close() !!} --}}
                                
                                <a href="{{route('aksi') . '?id=' . $w->id_user}}" class="icon icon-xs rounded-circle shadow-l bg-facebook"><i class="fas fa-check"></i></a>
                                <a href="{{route('aksi2') . '?id=' . $w->id_user}}" class="icon icon-xs rounded-circle shadow-l bg-twitter mr-2 ml-2"><i class="fas fa-times"></i></a>
                                <a href="https://wa.me/{{$w->notel}}" class="icon icon-xs rounded-circle shadow-l bg-phone"><i class="fa fa-phone"></i></a>
                            </div>
                        </div>
                    </div>
                </div>              
                
                <div class="divider mt-3"></div>
                
                @endif
                @endforeach
                
                
            </div>
        </div>

       

       
        <!-- footer and footer card-->
        <div class="footer" data-menu-load="menu-footer.html"></div>  
    </div>    
    <!-- end of page content-->
    
    
</div>    
@endsection

<script>
    function Nope() {
      confirm("Apakah Anda yakin?");
    }
    </script>