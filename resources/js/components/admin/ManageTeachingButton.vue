<template>
    <button class="btn btn-info w-100 text-1em" @click="show">
        ຈັດການການສອນ
    </button>
</template>
<script>
import swal from 'sweetalert';
import Swal from 'sweetalert2';
import axios from 'axios';
export default {
    props:['csrf'],
    methods:{
        show: function(){
            Swal.fire({
                title: 'ຈັດການການສອນ',
                html: '<div id="manage-teaching">{{bruh}}</div>',
                preConfirm: () => {
                    return new Vue({
                        el: "#manage-teaching",
                        data(){
                            return {
                                bruh: "Hello World!"
                            }
                        }
                    });
                }
            });
        }
    }
}
</script>