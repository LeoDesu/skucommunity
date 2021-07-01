<template>
    <div class="w-100">

        <div class="row w-100 form-group">
            <label for="faculty" class="col-md-4 col-form-label text-md-right">ຄະນະ:</label>
            <div class="col-md-6">
                <select id="faculty" class="form-control" v-model="selectedFaculty" @change="requestMajors(selectedFaculty)" required autofocus>
                    <option v-for="faculty in faculties" :key="faculty">{{ faculty.faculty }}</option>
                </select>
            </div>
        </div>
        <div class="row w-100 form-group" v-if="showOptions">
            <label for="major_id" class="col-md-4 col-form-label text-md-right">ສາຂາ:</label>
            <div class="col-md-6">
                <select name="major_id[]" id="major_id" class="form-control p-0" v-model="selectedMajors" @mouseenter="requestSubjects()" @click="requestSubjects()" required multiple autofocus>
                    <option v-for="major in majors" :key="major" :value="major.id">{{ major.name }}</option>
                </select>
            </div>
        </div>
        <div class="row w-100 form-group" v-if="selectedMajors != undefined">
            <label for="subject" class="col-md-4 col-form-label text-md-right">ວິຊາ:</label>
            <div class="col-md-6">
                <select id="subject" name="subject_id" class="form-control" @change="requestTeachers()" v-model="selectedSubject" required autofocus>
                    <option v-for="subject in subjectOptions" :key="subject.id" :value="subject.id">{{ subject.name }}</option>
                </select>
            </div>
        </div>
        <div class="row w-100 form-group" v-if="selectedSubject != undefined">
            <label for="teacher" class="col-md-4 col-form-label text-md-right">ອາຈານ:</label>
            <div class="col-md-6">
                <select @change="$emit('change-teacher', selectedTeacher)" id="teacher" name="user_id" class="form-control" v-model="selectedTeacher" required autofocus>
                    <option v-for="teacher in teachers" :key="teacher.id" :value="teacher.id">{{ teacher.name }}</option>
                </select>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data(){
            return{
                faculties: [],
                majors: [],
                subjects: [],
                teachers: [],
                showOptions: false,
                selectedFaculty: undefined,
                selectedMajors: undefined,
                selectedSubject: undefined,
                selectedTeacher: undefined
            }
        },
        computed:{
            subjectOptions: function(){
                var result = this.subjects.filter(subject => subject.id == this.selectedMajors[0])[0].subjects;
                if(this.selectedMajors.length > 1){
                    this.selectedMajors.forEach(id => {
                        if(id != this.selectedMajors[0]){
                            result = result.filter(element => {
                                return this.subjects.filter(subject => subject.id == id)[0].subjects.some(subject => {
                                    console.log("filtering: subject.name:"+subject.id+" is option.name"+element.id);
                                    return subject.id == element.id;
                                });
                            });
                        }
                    });
                }
                this.selectedSubject = undefined;
                return result;
            }
        },
        methods:{
            requestMajors: function(faculty){
                axios.get('/getmajors/'+faculty).then( response => {
                    this.majors = response.data;
                    this.showOptions = true;
                })
            },
            requestSubjects: function(){
                this.$emit('change-majors', this.selectedMajors)
                this.majors.forEach((value, key) => {
                    axios.get('/getsubjects/'+value.id).then( response => {
                        this.subjects[key] = {id: value.id, subjects: response.data};
                    });
                });
            },
            requestTeachers: function(){
                this.$emit('change-subject', this.selectedSubject)
                axios.get('/getteachers/'+this.selectedSubject).then( response => {
                    this.teachers = response.data;
                });
            }
        },
        mounted() {
            axios.get('/getfaculties').then( response => {
                this.faculties = response.data;
            })
        }
    }
</script>
