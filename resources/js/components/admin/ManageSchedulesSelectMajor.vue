<template>
    <div>
        <div class="card-header d-flex justify-content-center">
            <div class="col-4 text-center">
                <h4>ເລືອກສາຂາເພິ່ອແກ້ໄຂຕາຕະລາງ</h4>
            </div>
        </div>
        <div class="card-body">
            <div class="row w-100">
                <select-major @change="major_id = $event"/>
            </div>
            <div class="row form-group">
                <a :href="url" class="btn btn-primary offset-md-4">ແກ້ໄຂ</a>
            </div>
        </div>
    </div>
</template>
<script>
import swal from 'sweetalert';
import Swal from 'sweetalert2';
import axios from 'axios';
export default {
    props:['csrf'],
    data(){
        return {
            major_id: ''
        }
    },
    computed:{
        url: function(){
            return '/manageschedules/'+this.major_id
        }
    }
}
</script>