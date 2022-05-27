@extends('staf.index')
@section('content')
<div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Data Shift</strong>
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
                                Tambah shift
                            </button>
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Shift</th>
                                    <th>Jam datang</th>
                                    <th>Jam Pulang</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($shift as $key)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$key->nama_shift}}</td>
                                        <td>{{$key->jam_datang}}</td>
                                        <td>{{$key->jam_pulang}}</td>
                                        <td>
                                        <a href="{{route('delete.shift',$key->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                                <button data-toggle="modal" data-target="#editMediumModal" class="btn btn-primary passingId"
                                                        data-id="{{$key->id}}"
                                                        data-nama_shift="{{$key->nama_shift}}"
                                                        data-jam_datang="{{$key->jam_datang}}"
                                                        data-jam_pulang="{{$key->jam_pulang}}">
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
                        <h5 class="modal-title" id="mediumModalLabel">Tambah Shift Baru</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{route('store.shift')}}">
                            @csrf
                            <div class="form-group">
                                <label for="">Nama Shift</label>
                                <input type="text" name="Nama_Shift" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Jam datang</label>
                                <input type="time" name="Jam_Datang" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">jam Pulang</label>
                                <input type="time" name="Jam_Pulang" required class="form-control">
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
                        <h5 class="modal-title" id="mediumModalLabel">Edit Shift</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="get" action="{{route('update.shift')}}">
                            @csrf
                            <div class="form-group">
                                <input type="hidden" name='id' id="id">
                                <label for="">Nama Shift</label>
                                <input type="text" name="Nama_Shift" id="Nama_Shift" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Jam datang</label>
                                <input type="time" name="Jam_Datang" id="Jam_Datang"  required class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">jam Pulang</label>
                                <input type="time" name="Jam_Pulang" id="Jam_Pulang" required class="form-control">
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
               $("#id").val($(this).attr('data-id'));
                $("#Nama_Shift").val($(this).attr('data-nama_Shift'));
                $("#Jam_Datang").val($(this).attr('data-jam_datang'));
                $("#Jam_Pulang").val($(this).attr('data-jam_pulang'));
              
            });
        } );
    </script>
    
@endsection
