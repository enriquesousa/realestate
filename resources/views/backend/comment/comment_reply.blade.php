{{-- Llamado por: AdminCommentReply en app/Http/Controllers/Backend/BlogController.php --}}

@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


{{-- Contenido del profile form html --}}
<div class="page-content">

    <div class="row profile-body">

        <!-- wrapper derecha datos para editar -->
        <div class="col-md-12 col-xl-12 grid-margin middle-wrapper">

            {{-- Detalles del Comentario --}}
            <div class="row">

                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title text-warning">Detalles del Comentario</h6>
                        <hr>

                        {{-- Usuario --}}
                        <div class="row mb-3">
                            <div class="col-lg-3">
                                <label for="defaultconfig" class="col-form-label">Usuario:</label>
                            </div>
                            <div class="col-lg-9">
                                <input class="form-control" maxlength="25" name="defaultconfig" id="defaultconfig" type="text"
                                    value="{{ $comment->user->name }}" readonly>
                            </div>
                        </div>

                        {{-- Titulo del Comentario --}}
                        <div class="row mb-3">
                            <div class="col-lg-3">
                                <label for="defaultconfig-2" class="col-form-label">Titulo:</label>
                            </div>
                            <div class="col-lg-9">
                                <input class="form-control" maxlength="35" name="defaultconfig-2" id="defaultconfig-2" type="text"
                                    value="{{ $comment->post->post_title }}" readonly>
                            </div>
                        </div>

                        {{-- Tema del Comentario --}}
                        <div class="row mb-3">
                            <div class="col-lg-3">
                                <label for="defaultconfig-2" class="col-form-label">Tema:</label>
                            </div>
                            <div class="col-lg-9">
                                <input class="form-control" maxlength="35" name="defaultconfig-2" id="defaultconfig-2" type="text"
                                    value="{{ $comment->subject }}" readonly>
                            </div>
                        </div>

                        {{-- Mensaje del Comentario --}}
                        <div class="row">
                            <div class="col-lg-3">
                                <label for="defaultconfig-4" class="col-form-label">Mensaje:</label>
                            </div>
                            <div class="col-lg-9">
                                <textarea id="maxlength-textarea" class="form-control" id="defaultconfig-4" maxlength="100" rows="4"
                                    readonly>{{ $comment->message }}</textarea>
                            </div>
                        </div>

                        {{-- Aprobar Checkbox y Leido Checkbox --}}
                        <div class="row p-2">

                            {{-- Guardar Banderas Label --}}
                            <div class="col-lg-3">
                                <label for="defaultconfig-4" class="col-form-label">Guardar Banderas:</label>
                            </div>

                            {{-- Aprobar Checkbox y Leido Checkbox --}}
                            <div class="col-lg-9">
                                <div class="row">

                                    {{-- Aprobar Checkbox --}}
                                    <div class="col">

                                        <input type="checkbox" onclick="chkap('{{ $comment->id }}')" class="form-check-input"
                                            id="checkApprove" {{ $comment->aprobado ? 'checked' : '' }}>
                                        <label class="form-check-label" for="exampleCheck1">Aprobar</label>

                                    </div>

                                    {{-- Mensaje leído --}}
                                    <div class="col">

                                        <input type="checkbox" onclick="leidochk('{{ $comment->id }}')" class="form-check-input"
                                            id="checkLeido" {{ $comment->leido ? 'checked' : '' }}>
                                        <label class="form-check-label" for="exampleCheck1">Leído</label>

                                    </div>

                                    {{-- Botón Guardar Aprobación --}}
                                    {{-- <div class="col d-flex justify-content-end">
                                        <a href="{{ route('update.comment.approved', [$comment->id,'true']) }}"
                                            class="btn btn-inverse-info"><i class="btn-icon-prepend" data-feather="save"></i> Guardar
                                            Aprobación</a>
                                    </div> --}}

                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            </div>


            {{-- Respuesta del Admin --}}
            <div class="row mt-2">

            <div class="card">
                <div class="card-body">

                    {{-- Contestación --}}
                    <h6 class="card-title text-warning">Añadir Respuesta del Admin</h6>
                    <hr>

                    <form method="POST" action="{{ route('reply.message') }}" class="forms-sample">
                    @csrf

                        <input type="hidden" name="id" value="{{ $comment->id }}">
                        {{-- user id es el Admin que es el que responde --}}
                        <input type="hidden" name="user_id" value="1">
                        <input type="hidden" name="post_id" value="{{ $comment->post_id }}">
                        <input type="hidden" name="leido" value="{{ $comment->leido }}">
                        <input type="hidden" name="aprobado" value="{{ $comment->aprobado }}">

                        {{-- Contestar - Tema --}}
                        <div class="mb-3">
                            <label for="subject" class="form-label">Tema</label>
                            <input type="text" class="form-control" name="subject">
                        </div>

                        {{-- Contestar - Mensaje --}}
                        <div class="mb-3">
                            <label for="message" class="form-label">Mensaje</label>
                            <textarea name="message" class="form-control" id="message" rows="3"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary me-2">Responder Comentario</button>

                    </form>

                </div>
            </div>

            </div>

            @php
                $comment_reply = App\Models\Comment::where('parent_id', $comment->id)->get();
            @endphp

            {{-- Tabla respuestas al comentario --}}
            <div class="row mt-4">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">

                        <div class="card-body">

                            <h6 class="card-title text-warning">Todas las Respuestas</h6>

                            <div class="table-responsive">
                                <table id="dataTableExample" class="table">

                                    <thead>

                                        <tr>
                                            <th>Serie</th>
                                            <th>Foto</th>
                                            <th>Nombre</th>
                                            <th>Tema</th>
                                            <th>fecha</th>
                                            <th>Aprobado</th>
                                            <th>Leído</th>
                                            <th>Acción</th>
                                        </tr>

                                    </thead>

                                    <tbody>

                                        @foreach ($comment_reply as $key => $item)
                                        <tr>
                                            {{-- serie --}}
                                            <td>{{ $key+1 }}</td>

                                            {{-- foto --}}
                                            @php
                                                if ( !empty($item->user->photo) ) {

                                                    if ($item->user->role == "admin") {
                                                        $foto = url('upload/admin_images/'.$item->user->photo);
                                                    }

                                                    if ($item->user->role == "agent") {
                                                        $foto = url('upload/agent_images/'.$item->user->photo);
                                                    }

                                                    if ($item->user->role == "user") {
                                                        $foto = url('upload/user_images/'.$item->user->photo);
                                                    }

                                                } else {
                                                    $foto = url('upload/no_image.jpg');
                                                }
                                            @endphp
                                            <td><img src="{{ $foto }}" alt="" style="width:70px; height:50px;"></td>

                                            {{-- nombre usuario --}}
                                            <td>{{ $item->user->name }}</td>

                                            {{-- Tema --}}
                                            <td>{{ $item->subject }}</td>

                                            {{-- fecha --}}
                                            <td>{{ $item->created_at->format('d M Y') }}</td>

                                            {{-- aprobado --}}
                                            <td>
                                                @if ($item->aprobado == true)
                                                    <span class="badge rounded-pill bg-success"><i data-feather="user-check"></i></span>
                                                @else
                                                    <span class="badge rounded-pill bg-danger"><i data-feather="user-x"></i></span>
                                                @endif
                                            </td>

                                            {{-- leido --}}
                                            <td>
                                                @if ($item->leido == true)
                                                    <span class="badge rounded-pill bg-success"><i data-feather="user-check"></i></span>
                                                @else
                                                    <span class="badge rounded-pill bg-danger"><i data-feather="user-x"></i></span>
                                                @endif
                                            </td>

                                            <td>

                                                <a href="{{ route('details.property',$item->id) }}" class="btn btn-inverse-info" title="Detalles"><i data-feather="eye"></i></a>

                                                <a href="{{ route('edit.property',$item->id) }}" class="btn btn-inverse-warning" title="Editar"><i data-feather="edit"></i></a>

                                                <a href="{{ route('delete.property',$item->id) }}" class="btn btn-inverse-danger" id="delete" title="Eliminar"><i data-feather="trash-2"></i></a>

                                            </td>

                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>

</div>


{{-- JS para el botón de checkbox id='checkApprove' --}}
<script type="text/javascript">

    function chkap(id) {

        var x = document.getElementById("checkApprove");
        if (x.checked == true) {

            var approve_status = true;
            // alert(id);

        } else {

            var approve_status = false;
            // alert(approve_status);
        }

        // alert(approve_status + ", " + id); // desplegar varios parámetros con alert()

        $.ajax({
              type: "GET",
              dataType: "json",
              url: '/changeStatusApproved',
              data: {'approve_status': approve_status, 'comment_id': id},
              success: function(data){
                //    console.log(data.success)

                // Start Message
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 2000,
                })
                if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                        type: 'success',
                        title: data.success,
                        timer: 2000,
                        })
                }else{
                        Toast.fire({
                        type: 'error',
                        title: data.error,
                        timer: 2000,
                        })
                }
                // End Message

                // para refrescar la ventana
                //   window.location.reload();

              }
          });
    }

    function leidochk(id) {

        var x = document.getElementById("checkLeido");
        if (x.checked == true) {

            var leido_status = true;
            // alert(id);

        } else {

            var leido_status = false;
            // alert(approve_status);
        }

        // alert(leido_status + ", " + id); // desplegar varios parámetros con alert()

        $.ajax({
            type: "GET",
            dataType: "json",
            url: '/changeStatusLeido',
            data: {'leido_status': leido_status, 'comment_id': id},
            success: function(data){
                // console.log(data.success)

                // Start Message
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 2000,
                })
                if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                        type: 'success',
                        title: data.success,
                        timer: 2000,
                        })
                }else{
                        Toast.fire({
                        type: 'error',
                        title: data.error,
                        timer: 2000,
                        })
                }
                // End Message

                // para refrescar la ventana
                // window.location.reload();
            }
        });
    }

</script>


@endsection
