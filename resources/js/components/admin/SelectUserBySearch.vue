<template>
    <div class="w-100 flex-column">
        <div class="row form-group">
            <input type="text" @keyup="searchUsers" v-model="search" placeholder="ຄົ້ນຫາຜູ້ໃຊ້" class="form-control offset-md-4 col-md-6">
        </div>
        <div class="row form-group">
            <label for="user_id" class="col-md-4 text-right col-form-label">ຜູ້ໃຊ້:</label>
            <select name="user_id" id="user_id" class="form-control col-md-6">
                <option v-for="user in users" :key="user.id" :value="user.id">
                    {{ user.id }} {{ user.name }} {{ user.surname }}
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
            users: []
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
        }
    }
}
</script>