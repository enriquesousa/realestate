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
                                <div class="col-lg-8">
                                    <input class="form-control" maxlength="25" name="defaultconfig" id="defaultconfig" type="text" value="{{ $comment->user->name }}" readonly>
                                </div>
                            </div>

                            {{-- Titulo del Comentario --}}
                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <label for="defaultconfig-2" class="col-form-label">Titulo:</label>
                                </div>
                                <div class="col-lg-8">
                                    <input class="form-control" maxlength="35" name="defaultconfig-2" id="defaultconfig-2" type="text" value="{{ $comment->post->post_title }}" readonly>
                                </div>
                            </div>

                            {{-- Tema del Comentario --}}
                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <label for="defaultconfig-2" class="col-form-label">Tema:</label>
                                </div>
                                <div class="col-lg-8">
                                    <input class="form-control" maxlength="35" name="defaultconfig-2" id="defaultconfig-2" type="text" value="{{ $comment->subject }}" readonly>
                                </div>
                            </div>

                            {{-- Mensaje del Comentario --}}
                            <div class="row">
                                <div class="col-lg-3">
                                    <label for="defaultconfig-4" class="col-form-label">Mensaje:</label>
                                </div>
                                <div class="col-lg-8">
                                    <textarea id="maxlength-textarea" class="form-control" id="defaultconfig-4" maxlength="100" rows="8" readonly>{{ $comment->message }}</textarea>
                                </div>
                            </div>


                            {{-- Contestación --}}

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


@endsection
