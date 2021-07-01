<template>
  <div :class="elementClass">
      <button class="btn" :class="buttonClass" data-toggle="modal" data-target="#insert-schedule-modal">
          ເພີ່ມຊົ່ວໂມງຮຽນ
      </button>
      <div class="modal fade" id="insert-schedule-modal">
          <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">ເພີ່ມຊົ່ວໂມງຮຽນ</h5>
                        <button class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
    
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="date" class="col-md-4 col-form-label text-md-right">ວັນທີ: </label>

                            <div class="col-md-6">
                                <input id="date" type="date" pattern="\d{4}-\d{2}-\d{2}" class="form-control" v-model="form.date" @change="setFormDateTo()" required autocomplete="date" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="starttime" class="col-md-4 col-form-label text-md-right">ເວລາ: </label>

                            <div class="col-md-6">
                                <select class="form-control" name="starttime" id="starttime" v-model="form.from">
                                    <option v-for="time in times" :key="time" :value="time.from">{{ time.from+' ເຖິງ '+time.to }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <select-classroom @change-classroom="form.classroom_id = $event"/>
                        </div>

                        <div class="row">
                            <major-data @change-majors="form.majors = $event"
                                        @change-subject="form.subject_id = $event"
                                        @change-teacher="form.user_id = $event"/>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button @click="add()" class="btn btn-success rounded">
                                    ເພີ່ມ
                                </button>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
      </div>
  </div>
</template>
<script>
import swal from 'sweetalert'
export default {
    props: [
        'scrf',
        'elementClass',
        'buttonClass'
    ],
    data(){
        return{
            times: undefined,
            form: {}
        }
    },
    methods: {
        setFormDateTo: function(){
            this.form.to = this.times.filter( i => i.from == this.form.from )[0].to
        },
        add: function(){
            axios.post('/insertschedule', {
                    _token : this.scrf,
                    date : this.form.date,
                    starttime : this.form.from,
                    endtime : this.form.to,
                    subject_id : this.form.subject_id,
                    user_id : this.form.user_id,
                    classroom_id : this.form.classroom_id,
                    major_id : this.form.majors
                })
                .then( res => {
                    swal({text: "ເພີ່ມຊົ່ວໂມງຮຽນສໍາເລັດແລ້ວ", icon: "success", buttons: false, timer: 1300})
                })
                .catch( res => {
                    swal({text: "ມີຂໍ້ຜິດພາດເກີດຂຶ້ນ", icon: "error", buttons: false, timer: 1300})
                })
        }
    },
    mounted(){
        axios.post('/api/scheduletime')
            .then( res => {
                this.times = res.data
            })
            .catch( res => {
                
            })
    }
}
</script>