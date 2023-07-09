@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


{{-- Contenido del profile form html --}}
<div class="page-content">

    <div class="row profile-body">

        <!-- wrapper derecha datos para editar -->
        <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">

                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title text-warning">Contestar Comentario</h6>

                        <form method="POST" action="{{ route('reply.message') }}" class="forms-sample">
                        @csrf

                            <input type="hidden" name="id" value="{{ $comment->id }}">
                            <input type="hidden" name="user_id" value="{{ $comment->user_id }}">
                            <input type="hidden" name="post_id" value="{{ $comment->post_id }}">

                            {{-- Usuario --}}
                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <label for="defaultconfig" class="col-form-label">Usuario:</label>
                                </div>
                                <div class="col-lg-9">
                                    <input class="form-control" maxlength="25" name="defaultconfig" id="defaultconfig" type="text" value="{{ $comment->user->name }}" readonly>
                                </div>
                            </div>

                            {{-- Titulo del Comentario --}}
                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <label for="defaultconfig-2" class="col-form-label">Titulo:</label>
                                </div>
                                <div class="col-lg-9">
                                    <input class="form-control" maxlength="35" name="defaultconfig-2" id="defaultconfig-2" type="text" value="{{ $comment->post->post_title }}" readonly>
                                </div>
                            </div>

                            {{-- Tema del Comentario --}}
                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <label for="defaultconfig-2" class="col-form-label">Tema:</label>
                                </div>
                                <div class="col-lg-9">
                                    <input class="form-control" maxlength="35" name="defaultconfig-2" id="defaultconfig-2" type="text" value="{{ $comment->subject }}" readonly>
                                </div>
                            </div>

                            {{-- Mensaje del Comentario --}}
                            <div class="row">
                                <div class="col-lg-3">
                                    <label for="defaultconfig-4" class="col-form-label">Mensaje:</label>
                                </div>
                                <div class="col-lg-9">
                                    <textarea id="maxlength-textarea" class="form-control" id="defaultconfig-4" maxlength="100" rows="4" readonly>{{ $comment->message }}</textarea>
                                </div>
                            </div>

                             {{-- Aprobar comentario --}}
                             <div class="row p-2">
                                <div class="col-lg-3">
                                    <label for="defaultconfig-4" class="col-form-label">Guardar Banderas:</label>
                                </div>
                                <div class="col-lg-9">
                                    <div class="row">

                                        {{-- Aprobar Checkbox --}}
                                        <div class="col">

                                            <input type="checkbox" onclick="chkap('{{ $comment->id }}')" class="form-check-input" id="checkApprove" {{ $comment->aprobado ? 'checked' : '' }}>
                                            <label class="form-check-label" for="exampleCheck1">Aprobar</label>

                                        </div>

                                        {{-- Mensaje leído --}}
                                        <div class="col">

                                            <input type="checkbox" onclick="leidochk('{{ $comment->id }}')" class="form-check-input" id="checkLeido" {{ $comment->leido ? 'checked' : '' }}>
                                            <label class="form-check-label" for="exampleCheck1">Leído</label>

                                        </div>

                                        {{-- Botón Guardar Aprobación --}}
                                        {{-- <div class="col d-flex justify-content-end">
                                            <a href="{{ route('update.comment.approved', [$comment->id,'true']) }}" class="btn btn-inverse-info"><i class="btn-icon-prepend" data-feather="save"></i> Guardar Aprobación</a>
                                        </div> --}}

                                    </div>
                                </div>
                            </div>


                            {{-- Contestación --}}
                            <hr>
                            <h6 class="card-title text-warning">Respuestas</h6>

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

                            {{-- Aprobar Mensaje --}}
                            <div class="mb-3">
                                <label class="form-label">Aprobar</label>
                                <div>

                                    {{-- Si --}}
                                    <div class="form-check form-check-inline">
                                        <input type="radio" class="form-check-input" name="aprobar" id="gender1" value="si" checked="checked">
                                        <label class="form-check-label" for="gender1">
                                            Si
                                        </label>
                                    </div>

                                    {{-- No --}}
                                    <div class="form-check form-check-inline">
                                        <input type="radio" class="form-check-input" name="aprobar" id="gender2" value="no">
                                        <label class="form-check-label" for="gender2">
                                            No
                                        </label>
                                    </div>

                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary me-2">Contestar Comentario</button>

                        </form>

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
                      timer: 3000
                  })
                  if ($.isEmptyObject(data.error)) {
                          Toast.fire({
                          type: 'success',
                          title: data.success,
                          })
                  }else{
                          Toast.fire({
                          type: 'error',
                          title: data.error,
                          })
                  }
                  // End Message

                  // para refrescar la ventana
                  window.location.reload();
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
                    timer: 3000
                })
                if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                        type: 'success',
                        title: data.success,
                        })
                }else{
                        Toast.fire({
                        type: 'error',
                        title: data.error,
                        })
                }
                // End Message

                // para refrescar la ventana
                window.location.reload();
            }
        });
    }

</script>


@endsection
