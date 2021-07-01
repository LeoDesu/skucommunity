<template>
    <div class="w-100 flex-column">
        <div class="row form-group">
            <input type="text" @keyup="searchUsers" v-model="search" placeholder="ຄົ້ນຫາວິຊາ" class="form-control offset-md-4 col-md-6">
        </div>
        <div class="row form-group">
            <label for="subject_id" class="col-md-4 text-right col-form-label">ວິຊາ:</label>
            <select name="subject_id" id="subject_id" class="form-control col-md-6" v-model="selectedSubjects" @change="$emit('change', selectedSubjects)">
                <option v-for="subject in subjects" :key="subject.id" :value="subject.id">
                    {{ subject.id }} {{ subject.name }}
                </option>
            </select>
        </div>
    </div>
</template>
<script>
import axios from 'axios';
export default {
    props:['csrf'],
    data(){
        return {
            search: '',
            subjects: [],
            selectedSubjects: []
        }
    },
    methods:{
        searchUsers: function(){
            if(this.search != '')
                axios.get('/searchsubjects/'+this.search).then( res => {
                    this.subjects = res.data
                }).catch( () => {
                    this.subjects = []
                })
            else this.subjects = []
        }
    }
}
</script>