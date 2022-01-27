
    @extends('assetabsen/master')
    @section('conten1')
<div id="preloader"><div class="spinner-border color-highlight" role="status"></div></div>
    
<div id="page">
    @include('assetabsen/navbar')
    <!-- header and footer bar go here-->  
    <div class="page-content">
        
        <div class="page-title page-title-small">
            <h2><a href="#" data-back-button></a>SIK-K4</h2>
            <a href="#" data-menu="menu-main" class="bg-fade-gray1-dark shadow-xl preload-img" data-src="https://i.ibb.co/2qrYpQL/Whats-App-Image-2022-01-26-at-10-56-08-removebg-preview.png"></a>
        </div>
        <div class="card header-card shape-rounded" data-card-height="180">
            <div class="card-overlay bg-highlight opacity-95"></div>
            <div class="card-overlay dark-mode-tint"></div>
            <div class="card-bg preload-img" data-src="images/pictures/20s.jpg"></div>
        </div>
        
        <div class="card card-style">
            <div class="content">
                <h4 class="font-600">Pengajuan</h4>
                <p>
                    Silahkan Pilih Pengajuan
                </p>
            </div>
        </div>

        <?php
        $loop=[
            "WFH"=>['fas fa-home','red','Work Form Home'],
            "CUTI"=>['fas fa-briefcase','red','CUTI'],
            "Dinas"=>['fas fa-couch','red','Dinas'],
            "Sakit"=>['fas fa-ambulance','red','Sakit'],
        ];

        ?>

        <div class="row text-center mb-3 ml-1 mr-1">
            @foreach ($loop as $key=> $item)
            <a href="{{url('/pengajuan?to='.$key)}}" class="col-6 pr-2">
                <div class="card card-style mr-0 ml-0  pt-4 mb-3">
                    <h1 class="center-text pt-4">
                        <i class="{{$item[0]}}" style="color: {{$item[1]}};">
                        </i>
                    </h1>
                    <h4 class="color-theme font-600">{{$key}}</h4>
                    <p class="mt-n2 font-11 color-highlight">
                        {{$item [2]}}
                    </p>
                    <p class="font-10 opacity-30 mb-1">Tap to View</p>
                </div>
            </a>

            @endforeach        


            
        </div>
        
        
        <!-- footer and footer card-->
        <div class="footer" data-menu-load="{{url('/foot')}}"></div>

    </div>    
    <!-- end of page content-->
@endsection