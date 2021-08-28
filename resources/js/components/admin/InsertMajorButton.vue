<template>
    <div class="w-100" :class="elementClass">
        <button class="btn" :class="buttonClass" data-toggle="modal" data-target="#insert-major-modal">
            ເພີ່ມຄະນະ ແລະ ສາຂາວິຊາຮຽນ
        </button>
        <div class="modal fade" id="insert-major-modal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header d-flex justify-content-center">
                        <h5 class="modal-title text-center">
                            ເພີ່ມຄະນະ ແລະ ສາຂາວິຊາຮຽນ
                        </h5>
                        <button class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">ສາຂາ: </label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" v-model="name" required autofocus placeholder="ສາຂາ">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="faculty" class="col-md-4 col-form-label text-md-right">ຄະນະ: </label>

                            <div class="col-md-6">
                                <input id="faculty" type="text" class="form-control" v-model="faculty" required autofocus placeholder="ຄະນະ">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-8 offset-md-4">
                                <button class="btn btn-success rounded" @click="insert()">ເພີ່ມ</button>
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
            name: '',
            faculty: ''
        }
    },
    methods:{
        insert: function(){
            axios.post("/insertmajor", {
                    _token: this.scrf,
                    name: this.name,
                    faculty : this.faculty
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