<template>
    <button class="btn btn-info w-100 text-1em" @click="show">
        ເພີ່ມຫ້ອງຮຽນ
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
                title: 'ເພີ່ມຫ້ອງຮຽນ',
                html: '<div class="form-group row"><input id="building" class="form-control" name="building" placeholder="ຕຶກຮຽນ" required></div>'
                    +'<div class="form-group row"><input id="name" class="form-control" name="name" placeholder="ຫ້ອງຮຽນ" autocomplete="off" required></div>',
                preConfirm: () => {
                    return axios.post('/insertclassroom', {_token: this.csrf, name: document.getElementById("name").value, building: document.getElementById("building").value})
                        .then(() => {
                            swal({icon: "success", text: "ສໍາເລັດ", buttons: false, timer: 1300})
                        }).catch(() => {
                            swal({icon: "error", text: "ຂໍອະໄພ ມີຂໍ້ຜິດພາດເກີດຂຶ້ນ"})
                        });
                }
            });
        }
    }
}
</script>