<template>
    <div class="w-100" :class="elementClass">
        <button class="btn" :class="buttonClass" data-toggle="modal" data-target="#manage-subject-modal">
            ຈັດການວິຊາຮຽນຂອງສາຂາ
        </button>
        <div class="modal fade" id="manage-subject-modal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header d-flex justify-content-center">
                        <h5 class="modal-title text-center">
                            ຈັດການວິຊາຮຽນຂອງສາຂາ
                        </h5>
                        <button class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row w-100">
                            <select-major @change="major_id = $event"/>
                        </div>
                        <hr>
                        <div class="row w-100">
                            <select-subject-by-search @change="subject_id = $event"/>
                        </div>
                        <div class="row form-group">
                            <label for="quota" class="col-md-4 text-right col-form-label">ຊົ່ວໂມງ</label>
                            <input v-model="quota" name="quota" id="quota" class="form-control col-md-6" placeholder="ຊົ່ວໂມງ">
                        </div>
                        <div class="row form-group">
                            <div class="col-md-8 offset-md-4">
                                <button class="btn btn-primary rounded" @click="save()">ບັນທຶກ</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: [
        'scrf',
        'elementClass',
        'buttonClass'
    ],
    data(){
        return {
            major_id: '',
            subject_id: '',
            quota: ''
        }
    },
    methods:{
        save: function(){
            axios.post("/managesubjects", {
                    _token: this.scrf,
                    major_id: this.major_id,
                    subject_id : this.subject_id,
                    quota : this.quota
                })
                .then(() => {
                    swal({icon: "success", text: "ສໍາເລັດ", buttons: false, timer: 1300})
                }).catch(() => {
                    swal({icon: "error", text: "ຂໍອະໄພ ມີຂໍ້ຜິດພາດເກີດຂຶ້ນ", buttons: false, timer: 1300})
                })
        }
    }
}
</script>