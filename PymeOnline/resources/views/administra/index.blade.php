@extends('adminlte::page')

@section('content')
<div class="card-body table-responsive p-0" style="height: 700px;">
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0" style="height: 700px;">
        <table class="table table-head-fixed text-nowrap" id="tabla1">
            <thead>
                <tr>
                    <th>ID usuario</th>
                    <th>Email</th>
                    <th>Verificado</th>
                    <th> </th>
                    <th>Opciones</th>
                    <th> </th>               
                </tr>
            </thead>
            <tbody>
                               
                <tr>
                    @foreach ($usuarios as $usr)
                    <tr>

                        <td>
                            {{$usr->id}}
                        </td>
                        <td>
                            {{$usr->email}}
                        </td>
                        <td>
                            {{$usr->email_verified_at}}
                        </td>             
                        
                        @if (($usr->rol_id)==1)
                            <td> </td>
                            <td><h3>ADMIN</h3></td>
                            <td> </td>
                        @else

                            <td>
                                <form method="post" action="{{url('/admin/'.$usr->id)}}">
                                {{csrf_field() }}
                                {{method_field('GET')}}
                                <button type="submit" class="btn btn-block btn-success">Ver mas</button>
                
                                </form>
                            </td>
                            
                            <td>
                                <a href="{{url('/admin/'.$usr->id.'/edit')}}">
                                    <button type="submit" class="btn btn-block btn-warning"
                                        onclick="return confirm('¿Esta seguro de Editar?');">Editar</button>
                                </a>
                            </td>

                            @if (($usr->Baneado) == 0)

                                <td>
                                    <button type="submit" class="btn btn-block btn-danger" onclick="return confirm('¿Esta seguro de Banear?');">Banear</button>
                                </td>

                            @else (($usr->rol_id) == 1)
                                
                                <td>
                                    <button type="submit" class="btn btn-block btn-danger" onclick="return confirm('¿Esta seguro de Desbanear?');">Desbanear</button>
                                </td>
                                
                            @endif

                        @endif

                        
                        
                        

                        
                    </tr>
                        
                    @endforeach


                </tr>
               
            </tbody>
            
        </table>
        



    </div>
</div>
@stop