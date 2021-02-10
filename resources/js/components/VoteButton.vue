<template>
    <div>
        <button @click="upvote" class="btn btn-success mr-1 btn-c-padding" type="submit">ໃຫ້ຄະແນນ: </button>
        {{ upvotes }}
        <button @click="downvote" class="btn btn-danger ml-1 mr-1 btn-c-padding" type="submit">ລົບຄະແນນ: </button>
        {{ downvotes }}
        
    </div>
</template>
<script>
import axios from 'axios';
import swal from 'sweetalert';
export default {
    props: ['blogId'],
    data(){
        return{
            upvotes: 0,
            downvotes: 0
        }
    },
    methods:{
        upvote: function(){
            axios.post('/upvote', {blog_id:this.blogId})
                .then(() => {
                    this.getVotes()
                })
        },
        downvote: function(){
            axios.post('/downvote', {blog_id:this.blogId})
                .then(() => {
                    this.getVotes()
                })
        },
        getVotes: function(){
            axios.get('/getupvotes/'+this.blogId)
                .then( res => {
                    this.upvotes = res.data
                })
            axios.get('/getdownvotes/'+this.blogId)
                .then( res => {
                    this.downvotes = res.data
                })
        }
    },
    mounted(){
        this.getVotes()
    }
}
</script>
<style scoped>
    
</style>