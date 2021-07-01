<template>
    <div class="w-100" :class="elementClass">
        <button :class="buttonClass" data-toggle="modal" data-target="#insert-classroom-modal">
            ເພີ່ມຫ້ອງຮຽນ
        </button>
        <div class="modal fade" id="insert-classroom-modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">ເພີ່ມຫ້ອງຮຽນ</h5>
                        <button class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <input v-model="building" class="form-control" name="building" placeholder="ຕຶກຮຽນ" required>
                        </div>
                        <div class="form-group row">
                            <input v-model="classroom" class="form-control" name="name" placeholder="ຫ້ອງຮຽນ" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-info rounded" @click="insert()">
                            ເພີ່ມ
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import swal from 'sweetalert';
import Swal from 'sweetalert2';
import axios from 'axios';
export default {
    props: [
        'scrf',
        'elementClass',
        'buttonClass'
    ],
    data(){
        return {
            building : '',
            classroom : ''
        }
    },
    methods:{
        insert: function(){
            axios.post('/insertclassroom', {_token: this.csrf, name: this.classroom, building: this.building})
                .then(() => {
                    swal({icon: "success", text: "ສໍາເລັດ", buttons: false, timer: 1300})
                }).catch(() => {
                    swal({icon: "error", text: "ຂໍອະໄພ ມີຂໍ້ຜິດພາດເກີດຂຶ້ນ", buttons: false, timer: 1300})
                });
        }
    }
}
</script>