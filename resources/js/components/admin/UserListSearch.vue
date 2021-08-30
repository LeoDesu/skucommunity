<template>
    <div class="w-100 flex-column">
        <div class="row form-group">
            <input type="text" @keyup="searchUsers" v-model="search" placeholder="ຄົ້ນຫາຜູ້ໃຊ້" class="form-control offset-md-1 col-md-10">
        </div>
        <div class="row form-group justify-content-center">
            <label class="col-form-label" for="teachers">ອາຈານ</label>        
            <input @change="searchUsers" v-model="teachers" type="checkbox" id="teachers">
            <label class="ml-2 col-form-label" for="students">ນັກຮຽນ</label>
            <input @change="searchUsers" v-model="students" type="checkbox" id="students">
        </div>
        <div class="row form-group">
            <table class="table table-bordered table-striped table-hover">
                <tr v-if="users.length != 0">
                    <th>ລະຫັດ</th>
                    <th>ຊື່</th>
                    <th>ນາມສະກຸນ</th>
                    <th>ເພດ</th>
                    <th>ບົດບາດ</th>
                    <th>ສາຂາ</th>
                </tr>
                <tr v-for="user in users" :key="user.id" @click="gotoLink('/showuserinfo/'+user.id)" class="pointer">
                    <td class="pt-2 pb-2">{{ user.id }}</td>
                    <td class="pt-2 pb-2">{{ user.name }}</td>
                    <td class="pt-2 pb-2">{{ user.surname }}</td>
                    <td class="pt-2 pb-2">{{ user.gender }}</td>
                    <td class="pt-2 pb-2">{{ user.role }}</td>
                    <td class="pt-2 pb-2">{{ user.major.name }}</td>
                </tr>
            </table>
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
            users: [],
            teachers: true,
            students: true
        }
    },
    methods:{
        searchUsers: function(){
            if(this.search == '') {
                if(this.teachers && this.students)
                    axios.get('/allusers').then( res => {
                        this.users = res.data
                    }).catch( () => {
                        this.users = []
                    })
                else if(this.teachers)
                    axios.get('/allteachers').then( res => {
                        this.users = res.data
                    }).catch( () => {
                        this.users = []
                    })
                else if(this.students)
                    axios.get('/allstudents').then( res => {
                        this.users = res.data
                    }).catch( () => {
                        this.users = []
                    })
                return
            }
            if(this.teachers && this.students)
                axios.get('/searchusers/'+this.search).then( res => {
                    this.users = res.data
                }).catch( () => {
                    this.users = []
                })
            else if(this.teachers)
                axios.get('/searchteachers/'+this.search).then( res => {
                    this.users = res.data
                }).catch( () => {
                    this.users = []
                })
            else if(this.students)
                axios.get('/searchstudents/'+this.search).then( res => {
                    this.users = res.data
                }).catch( () => {
                    this.users = []
                })
        },
        gotoLink: function(url){
            window.location = url
        }
    },
    mounted(){
        axios.get('/allusers').then( res => {
                this.users = res.data
            }).catch( () => {
                this.users = []
            })
    }
}
</script>