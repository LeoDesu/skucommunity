<template>
    <div :class="elementClass">
        <button class="btn" :class="buttonClass" data-toggle="modal" data-target="#manage-major-select-major-modal">
            ເບິ່ງ ແລະ ແກ້ໄຂຂໍ້ມູນຂອງສາຂາ
        </button>
        <div class="modal fade" id="manage-major-select-major-modal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header d-flex justify-content-center">
                        <h5 class="modal-title text-center">
                            ເລືອກສາຂາເພິ່ອເບິ່ງ ແລະ ແກ້ໄຂຂໍ້ມູນ
                        </h5>
                        <button class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row w-100">
                            <select-major @change="major_id = $event"/>
                        </div>
                        <div class="row form-group">
                            <a :href="url" class="btn btn-primary offset-md-4 rounded">ແກ້ໄຂ</a>
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
            major_id: ''
        }
    },
    computed:{
        url: function(){
            return '/managemajor/'+this.major_id
        }
    }
}
</script>