<template>
<div>

    <!-- Ventana Modal de Bootstrap 5.3 ver docs (https://getbootstrap.com/docs/5.3/components/modal/) -->
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#chat">
        <i class="fas fa-comments"></i>&nbsp;&nbsp; | &nbsp; Chat Ahora!
    </button>

    <!-- Modal -->
    <div class="modal fade" id="chat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title fs-5" id="exampleModalLabel">Chat con </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form action="">

            <!-- body - textarea para el escribir el mensaje -->
            <div class="modal-body">
                <div class="form-group">
                    <textarea class="form-control" name="" id="" rows="3" placeholder="Escribe tu mensaje ..."></textarea>
                </div>
            </div>

            <!-- Botón Cerrar y mandar Mensaje -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-success">Mandar Mensaje</button>
            </div>

        </form>

        </div>
    </div>
    </div>

</div>
</template>
