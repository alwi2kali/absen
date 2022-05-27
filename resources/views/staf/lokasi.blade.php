@extends('staf.index')
@section('content')
<div class="content">
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
                            <button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#mediumModal">
                                Tambah Lokasi
                            </button>
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>nama kantor</th>
                                    <th>lokasi kantor</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($lokasi as $key)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$key->nama_kantor}}</td>
                                        <td>{{$key->lokasi_kantor}}</td>
                                        <td>
                                        <a href="{{route('delete.lokasi',$key->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                                <button data-toggle="modal" data-target="#editMediumModal" class="btn btn-primary passingId"
                                                        data-id="{{$key->id}}"
                                                        data-nama_kantor="{{$key->nama_kantor}}"
                                                        data-lokasi_kantor="{{$key->lokasi_kantor}}"
                                                       >
                                                    <i class="fa fa-edit"></i></button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .animated -->

        <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="mediumModalLabel">Tambah Lokasi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{route('store.lokasi')}}">
                            @csrf
                            <div class="form-group">
                                <input type="hidden" name="Id" id="Id">
                                <label for="">Nama Kantor</label>
                                <input type="text" name="Nama_Kantor" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Lokasi Kantor</label>
                                <input type="text" name="Lokasi_Kantor" required class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <button class="btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editMediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="mediumModalLabel">Edit Lokasi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{route('update.lokasi')}}">
                            @csrf
                            <div class="form-group">
                                <input type="hidden" name="Id" id="Id">
                                <label for="">Nama Kantor</label>
                                <input type="text" name="Nama_Kantor" id="Nama_Kantor" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Lokasi Kantor</label>
                                <input type="text" name="Lokasi_Kantor" id="Lokasi_Kantor" required class="form-control">
                            </div>
                            <div class="form-group">
                                <button class="btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .content -->
@endsection
@section('script')
    <script src="{{asset('assets/js/lib/data-table/datatables.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/data-table/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/data-table/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/data-table/buttons.bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/data-table/jszip.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/data-table/vfs_fonts.jsm')}}"></script>
    <script src="{{asset('assets/js/lib/data-table/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/data-table/buttons.print.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/data-table/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('assets/js/init/datatables-init.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#bootstrap-data-table-export').DataTable();
            $('body').on('click','.passingId',function(){
               $("#Id").val($(this).attr('data-id'));
                $("#Nama_Kantor").val($(this).attr('data-nama_kantor'));
                $("#Lokasi_Kantor").val($(this).attr('data-lokasi_kantor'));
               
            });
        } );
    </script>
    
@endsection
