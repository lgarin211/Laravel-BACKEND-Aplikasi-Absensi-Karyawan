<?php 

$a=cal_days_in_month(CAL_GREGORIAN,date('m'),date('Y'))+1;
// dump($a);
?>


<table>
    <thead>
        <tr>
            <th>data Recap Absensi {{date('m-Y')}} SMKN 4 Kota Bogor</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th>tanggal export {{date('m-D-Y')}}</th>
        </tr>
    <tr>
        <th>Name</th>

        @for ($i=0; $i < $a; $i++)
            <th>
                {{date('m-'.$i.'-Y')}}
            </th>
        @endfor
       
    </tr>
    </thead>
    <tbody>
    @foreach($data as $key=>$pin)
        <tr>
            <td>{{ $pin->name }}</td>
            @for ($i=0; $i < $a; $i++)
            @php
                $d=strlen($i);
                // dump($d);
                if ($d==1) {
                    $si='0'.$i;
                }else {
                    $si=$i;
                }
                // dd($d);
                $li=DB::table('log_absens')
                ->where('id_user',$pin->id)
                // ->where('jam_masuk','like','%'.date('-Y').'%')
                ->where('jam_masuk','like','%'.date('m-').'%')
                ->where('jam_masuk','like','%'.date('-Y').'%')
                ->where('jam_masuk','like','%'.'-'.$si.'-'.'%');
                $tr=$li->first(); 
            @endphp
            <th>
                @if ($li->count()==0)
                {{'~'}}
                @else
                    @if ($li->first()->jam_keluar==0)
                    {{$tr->keterangan.' ~TAP'}}                
                    @else
                    {{$tr->keterangan}}                                        
                    @endif    

                @endif

            </th>
            @endfor
        </tr>
    @endforeach
    </tbody>
</table>
{{-- @dd($data) --}}
