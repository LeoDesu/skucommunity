<template>
    <button class="btn btn-danger btn-c-padding bd-radius-2" @click="cancelAlert">
        ເລື່ອນການສອນ
    </button>
</template>
<script>
import axios from 'axios';
import swal from 'sweetalert';
export default {
    props: ['scheduleId'],
    methods:{
        cancelAlert: function(){
            swal({
                icon:"warning",
                text: "ທ່ານແນ່ໃຈບໍ ວ່າຕ້ອງການເລື່ອນການສອນ?",
                buttons: {
                    cancle:{
                        text: "ບໍ່",
                        value: null
                    },
                    confirm:{
                        text: "ເລື່ອນ",
                        value: true,
                        dangerMode: true
                    }
                },
                dangerMode: true
            }).then( cancel => {
                if(cancel){
                    this.cancelTeaching(this.scheduleId);
                }
            });
        },
        cancelTeaching: function(id){
            axios.post("/calcelteaching/"+id).then( response => {
                swal({
                    icon: "success",
                    text: "ເລື່ອນການສອນແລ້ວ!",
                    buttons: false,
                    timer: 2000
                    }).then(() => location.reload() );
            }).catch( response => {
                swal({
                    icon: "error",
                    text: "ຂໍອະໄພ ມີຂໍ້ຜິດພາດເກີດຂຶ້ນ"
                })
            })
        }
    }
}
</script>
<style scoped>
    
</style>