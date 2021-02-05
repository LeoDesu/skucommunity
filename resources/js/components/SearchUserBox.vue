<template>
    <div class="row flex-column">
        <div class="row form-group"><input v-model="search" @keyup="searchUsers" type="text" class="form-control" placeholder="ຄົ້ນຫາຜູ້ໃຊ້"></div>
        <div class="row">
            <ul class="position-absolute list-unstyled bg-secondary">
                <li v-for="user in users" :key="user" @click="select(user.id, user.name)" class="pt-1 pb-1 pl-3 pr-3 border">
                    {{ user.name }}
                </li>
            </ul>
        </div>
        <div class="row">
            <label class="col-md-4 text-right col-form-label">ຜູ້ໃຊ້:</label>
            <input type="text" disabled :value="selected_name" class="form-control col-md-6">
            <input type="hidden" :value="selected_id">
        </div>
    </div>
</template>
<script>
import axios from 'axios';
export default {
    props:['csrf'],
    data(){
        return {
            users: [],
            search: '',
            selected_id: '',
            selected_name: ''
        }
    },
    methods:{
        searchUsers: function(){
            if(this.search != '')
                axios.get('/searchusers/'+this.search).then( res => {
                    this.users = res.data
                }).catch( () => {
                    this.users = []
                })
            else this.users = []
        },
        select: function(id, name){
            this.selected_id = id
            this.selected_name = name
            this.search = ''
            this.users = []
        }
    }
}
</script>