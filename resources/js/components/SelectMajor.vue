<template>
    <div class="w-100">

        <div class="row w-100 form-group">
            <label for="faculty" class="col-md-4 col-form-label text-md-right">ຄະນະ:</label>
            <div class="col-md-6">
                <select id="faculty" class="form-control" v-model="selectedFaculty" @change="requestMajors(selectedFaculty)" :required="required" autofocus>
                    <option v-for="(faculty, index) in faculties" :key="index">{{ faculty.faculty }}</option>
                </select>
            </div>
        </div>
        <div class="row w-100 form-group" v-if="selectedFaculty != undefined">
            <label for="major_id" class="col-md-4 col-form-label text-md-right">ສາຂາ:</label>
            <div class="col-md-6">
                <select :name="multiple ? 'major_id[]':'major_id'" id="major_id" v-model="selectedMajors" @change="$emit('change',selectedMajors)" class="form-control" :required="required" :multiple="multiple" autofocus>
                    <option v-for="(major, index) in majors" :key="index" :value="major.id">{{ major.name }}</option>
                </select>
            </div>
        </div>
        <div v-if="error != undefined" class="row w-100">
            <span class="invalid-feedback offset-4" role="alert">
                <strong>{{ error }}</strong>
            </span>
        </div>
    </div>
</template>
<script>
    import axios from "axios";
    export default {
        props: {
            required: Boolean,
            multiple: Boolean,
            error: String
        },
        data(){
            return{
                faculties: [],
                selectedFaculty: undefined,
                majors: [],
                selectedMajors: undefined
            }
        },
        methods:{
            requestMajors(faculty){
                axios.get('/getmajors/'+faculty).then( response => {
                    this.majors = response.data;
                })
            }
        },
        mounted() {
            axios.get('/getfaculties').then( response => {
                this.faculties = response.data;
            })
        }
    }
</script>
