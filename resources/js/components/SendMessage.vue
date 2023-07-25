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
            <h5 class="modal-title fs-5" id="exampleModalLabel">Chat With {{ receptor_id }} {{ receptor_name }} </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form @submit.prevent="sendMsg()">

            <!-- body - textarea para el escribir el mensaje -->
            <div class="modal-body">
                <div class="form-group">
                    <textarea class="form-control" v-model="form.msg" name="" id="" rows="3" placeholder="Escribe tu mensaje ..."></textarea>
                </div>
            </div>

            <!-- Botón Cerrar y mandar Mensaje -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-success">Mandar Mensaje</button>
            </div>

        </form>

        </div>
    </div>
    </div>

</div>
</template>

<!-- Aquí recibimos los parámetros -->
<script>
export default {
	props: ['receptor_id','receptor_name'],

	data(){
		return{
			form: {
				msg:""
			}
		}
	},

	methods: {
		sendMsg(){
			alert(this.form.msg)
		}
	}
}
</script>
