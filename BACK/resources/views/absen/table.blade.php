<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
<table class="table">
    <thead>
        <tr>
            <th scope="col">tgl</th>
            <th scope="col">Status</th>
            <th scope="col">Jam Masuk</th>
            <th scope="col">Jam Keluar</th>
            <th scope="col">akumulasi</th>
        </tr>
    </thead>
    <tbody>
        @php
        $da=0;
        $ba='';
        @endphp
        @foreach ($data as $key=>$value)
        <tr>
            <th scope="row">{{$value['tgl_masuk']}}</th>
            <td>{{$value['status']}}</td>
            <td>{{$value['jam_masuk']}}</td>
            <td>{{$value['jam_keluar']}}</td>
            <td>{{$value['akumu']}}</td>
        </tr>
        @php
        $da=$da+$value['akumu'];
        $ba=$value['tgl_masuk'];
        @endphp
        @endforeach
    </tbody>
</table>

<h2>Akumulasi lama Bekerja hingga {{$ba}} <strong>{{number_format($da, 2)}}</strong></h2>
