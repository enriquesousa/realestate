<template>

    <div class="row" style="width: 873px">

        <!-- side izquierdo -->
        <div class="col-md-2 myUser">
            <ul class="user">
                <strong>Lista Chat</strong>
                <hr />

                <li v-for="(user, index) in users" :key="index">
                    <a href="" @click.prevent="userMessage(user.id)">

                        <!-- imagen si es user -->
                        <img v-if="user.role === 'user'" :src="'/upload/user_images/'+user.photo" alt="UserImage" class="userImg"/>

                        <!-- else usa agent image -->
                        <img v-else :src="'/upload/agent_images/'+user.photo" alt="UserImage" class="userImg"/>

                        <span class="username text-center">{{ user.name }}</span>
                    </a>
                </li>


            </ul>
        </div>

        <!-- side derecho -->
        <div class="col-md-10" v-if="allMessages.user">
            <div class="card">

                <!-- card-header text-center -->
                <div class="card-header text-center myrow">
                    <!-- Usuario seleccionado -->
                    <strong> {{ allMessages.user.name }} </strong>
                </div>

                <!-- card-body chat-msg -->
                <div class="card-body chat-msg">
                    <ul class="chat" v-for="(msg,index) in allMessages.messages" :key="index">

                        <!-- agent chat -->
                        <li class="sender clearfix" v-if="allMessages.user.id === msg.sender_id">

                            <!-- agent chat-img -->
                            <span class="chat-img left clearfix mx-2">
                                <img :src="'/upload/agent_images/'+msg.user.photo" class="userImg" alt="userImg"/>
                            </span>

                            <!-- chat-body2 name and time -->
                            <div class="chat-body2 clearfix">
                                <div class="header clearfix">
                                    <!-- user name -->
                                    <strong class="primary-font">{{ msg.user.name }}</strong>
                                    <!-- time -->
                                    <small class="right text-muted">{{ DateTime(msg.created_at) }}</small>
                                </div>

                                <!-- mensaje -->
                                <p>{{ msg.msg }}</p>
                            </div>

                        </li>

                        <!-- user chat -->
                        <li class="buyer clearfix" v-else>

                            <!-- agent chat-img -->
                            <span class="chat-img right clearfix mx-2">
                                <img :src="'/upload/user_images/'+msg.user.photo" class="userImg" alt="userImg"/>
                            </span>

                            <div class="chat-body clearfix">

                                <div class="header clearfix">

                                    <small class="left text-muted">{{ DateTime(msg.created_at) }}</small>
                                    <strong class="right primary-font">{{ msg.user.name }}</strong>

                                </div>
                                <p>{{ msg.msg }}</p>
                            </div>

                        </li>

                        <li class="sender clearfix">
                            <span class="chat-img left clearfix mx-2"> </span>
                        </li>

                    </ul>
                </div>

                <!-- card-footer -->
                <div class="card-footer">
                    <div class="input-group">
                        <input id="btn-input" type="text" v-model="msg" class="form-control input-sm" placeholder="Entre su mensaje aquí..."/>
                        <span class="input-group-btn">
                            <button class="btn btn-primary" @click.prevent="sendMsg()"><i class="fas fa-paper-plane"></i>&nbsp;Enviar</button>
                        </span>
                    </div>
                </div>

            </div>
        </div>

    </div>

</template>

<script>

    import moment from 'moment';

    export default {

        data(){
            return {
                users: {},
                allMessages: {},
                selectedUser: '',
			    msg:'',
                moment: moment,
            }
        },

        // Este método se ejecuta al hacer refresh de la pagina
        created(){
            this.getAllUser();

            // Refresca componente cada segundo
            setInterval(() => {
                  this.userMessage(this.selectedUser);
                },1000);
        },

        methods:{

            getAllUser(){
                axios.get('/user-all')
                .then((res) => {
                    this.users = res.data;
                }).catch((err) => {

                });
            },

            userMessage(userId){
                axios.get('/user-message/'+userId)
                .then((res) => {
                    this.allMessages = res.data;
                    this.selectedUser = userId;
                }).catch((err) => {

                });
            },

            sendMsg(){
                axios.post('/send-message',{ receiver_id:this.selectedUser,msg:this.msg })
                .then((res) => {
                    this.msg = "";
                    this.userMessage(this.selectedUser);
                    console.log(res.data);
                }).catch((err) => {
                    this.errors = err.response.data.errors;
                })
            },

            DateTime(value){
                return moment().format("D MMM YY, h:mm a");
            },

        },

    };
</script>

<style>

    .username {
        color: #000;
    }

    .myrow {
        background: #f3f3f3;
        padding: 25px;
    }

    .myUser {
        padding-top: 30px;
        overflow-y: scroll;
        height: 450px;
        background: #f2f6fa;
    }
    .user li {
        list-style: none;
        margin-top: 20px;
    }

    .user li a:hover {
        text-decoration: none;
        color: red;
    }
    .userImg {
        height: 35px;
        border-radius: 50%;
    }
    .chat {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .chat li {
        margin-bottom: 40px;
        padding-bottom: 5px;
        margin-top: 20px;
        width: 80%;
        height: 10px;
    }

    .chat li .chat-body p {
        margin: 0;
    }

    .chat-msg {
        overflow-y: scroll;
        height: 350px;
        background: #f2f6fa;
    }
    .chat-msg .chat-img {
        width: 100px;
        height: 100px;
    }
    .chat-msg .img-circle {
        border-radius: 50%;
    }
    .chat-msg .chat-img {
        display: inline-block;
    }
    .chat-msg .chat-body {
        display: inline-block;
        max-width: 45%;
        margin-right: -73px;
        background-color: #891631;
        border-radius: 12.5px;
        padding: 15px;
    }
    .chat-msg .chat-body2 {
        display: inline-block;
        max-width: 80%;
        margin-left: -64px;
        background-color: #080000;
        border-radius: 12.5px;
        padding: 15px;
    }
    .chat-msg .chat-body strong {
        color: #0169da;
    }

    .chat-msg .buyer {
        text-align: right;
        float: right;
    }
    .chat-msg .buyer p {
        text-align: left;
    }
    .chat-msg .sender {
        text-align: left;
        float: left;
    }
    .chat-msg .left {
        float: left;
    }
    .chat-msg .right {
        float: right;
    }


</style>
