<template>
    <div class="w-100">
        <div class="row w-100 form-group">
            <label for="building" class="col-md-4 col-form-label text-md-right">ຕຶກຮຽນ:</label>
            <div class="col-md-6">
                <select id="building" class="form-control" v-model="selectedBuilding" @change="requestClassrooms()" required autofocus>
                    <option v-for="(building, index) in buildings" :key="index">{{ building.building }}</option>
                </select>
            </div>
        </div>
        <div class="row w-100 form-group"  v-if="showOptions">
            <label for="classroom_id" class="col-md-4 col-form-label text-md-right">ຫ້ອງຮຽນ:</label>
            <div class="col-md-6">
                <select name="classroom_id" id="classroom_id" class="form-control" @change="$emit('change-classroom', selectedClassroom)" v-model="selectedClassroom" required autofocus>
                    <option v-for="(classroom, index) in classrooms" :key="index" :value="classroom.id">{{ classroom.name }}</option>
                </select>
            </div>
        </div>
    </div>
</template>
<script>
    import axios from "axios";
    export default {
        props: [
            'building',
            'classroom'
        ],
        data(){
            return{
                buildings: [],
                selectedBuilding: undefined,
                classrooms: [],
                selectedClassroom: undefined,
                showOptions: false
            }
        },
        methods:{
            requestClassrooms(){
                this.$emit('change-building', this.selectedBuilding)
                axios.get('/getclassrooms/'+this.selectedBuilding).then( response => {
                    this.classrooms = response.data;
                    this.showOptions = true;
                })
            }
        },
        mounted() {
            axios.get('/getbuildings').then( response => {
                this.buildings = response.data;
                if(this.building){
                    this.selectedBuilding = this.building
                    this.requestClassrooms()
                    if(this.classroom){
                        this.selectedClassroom = this.classroom
                    }
                }
            })
        }
    }
</script>
