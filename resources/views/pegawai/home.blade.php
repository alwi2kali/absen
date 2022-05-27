@extends('pegawai.index')
@section('content')



        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Data Pegawai</strong>
                        </div>
                        <div class="card-body">
                            @if(\Illuminate\Support\Facades\Session::has('berhasil'))
                                <div class="alert alert-primary text-black">
                                    <h4>{{\Illuminate\Support\Facades\Session::get('berhasil')}}</h4>
                                </div>
                            @elseif(\Illuminate\Support\Facades\Session::has('gagal'))
                                <div class="alert alert-danger text-black">
                                    <h4>{{\Illuminate\Support\Facades\Session::get('gagal')}}</h4>
                                </div>
                            @endif

                            <form method="post" action="{{route('user.absen_masuk')}}">
                            @csrf
                              <div class="row">
                            <button class="btn-primary">absen masuk</button>
                           
                        </form>
                        <form method="post" action="{{route('user.absen_pulang')}}">
                            @csrf
                            
                            <button class="btn-primary">absen pulang</button>
                           
                        </form>
                        </div>
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>tanggal</th>
                                    <th>keterangan masuk</th>
                                    <th>keterangan pulang</th>
                                </tr>
                                </thead>
                                <tbody>
                                   @foreach($absen as $key)
                                   <tr>
                                       <td>{{$loop->iteration}}</td>
                                       <td>{{$key->tanggal}}</td>
                                       <td>{{$key->keterangan}}</td>
                                       <td>{{$key->keterangan_pulang}}</td>
                                   </tr>
                                   @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .animated -->
@endsection
