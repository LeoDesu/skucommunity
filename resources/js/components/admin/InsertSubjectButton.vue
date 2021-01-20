<template>
    <button class="btn btn-info w-100 text-1em" @click="show">
        ເພີ່ມວິຊາຮຽນ
    </button>
</template>
<script>
import swal from 'sweetalert';
import Swal from 'sweetalert2';
import axios from 'axios';
export default {
    props:['csrf'],
    methods:{
        show: function(){
            Swal.fire({
                title: 'ເພີ່ມວິຊາຮຽນ',
                html: '<div class="form-group row"><input id="name" class="form-control" name="name" placeholder="ວິຊາ" autocomplete="off" required></div>',
                preConfirm: () => {
                    return axios.post("/insertsubject", {_token: this.csrf, name: document.getElementById("name").value})
                        .then(() => {
                            swal({icon: "success", text: "ສໍາເລັດ", buttons: false, timer: 1300})
                        }).catch(() => {
                            swal({icon: "error", text: "ຂໍອະໄພ ມີຂໍ້ຜິດພາດເກີດຂຶ້ນ"})
                        })
                }
            });
        },
        insert: function(){

        }
    }
}
</script>