<template>
    <div class="modal fade" id="modalcenter" tabindex="-1" role="dialog" aria-labelledby="modalcenter"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100"><i class="fas fa-heartbeat"></i> Emotification: <span
                            id="emotion">{{emotion}}</span></h5>
                </div>
                <div class="modal-body">
                    <p>{{quote}}</p>
                </div>
                <div class="modal-footer">
                    <button @click="close" type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['event'],
        data() {
            return {
                emotion: this.event.emotion_name,
                quote: this.event.notifiable_message
            }
        },
        mounted() {
            $(".modal").modal();
        },
        methods: {
            close() {
                this.$store.commit("CLOSE_EMOTIFICATION");
            }
        }
    }

</script>

<style scoped>
    #emotion {
        color: #00adb5;
        font-weight: bold;
    }

    p {
        color: #685206;
        font-family: 'Helvetica Neue', sans-serif;
        font-size: 16px;
        line-height: 24px;
        text-align: justify;
        text-justify: inter-word;
    }

</style>
