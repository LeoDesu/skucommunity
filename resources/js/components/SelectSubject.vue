<template>
    <div class="row w-100 form-group">
        <label for="subject" class="col-md-4 col-form-label text-md-right">ວິຊາ:</label>
        <div class="col-md-6">
            <select id="subject" name="subject_id" class="form-control" v-model="selectedSubject" @focus="subjects = getSubjects(majors)" required autofocus>
                <option v-for="subject in subjects" :key="subject.id" :value="subject.id">{{ subject.name }}</option>
            </select>
        </div>
    </div>
</template>
<script>
    import axios from "axios";
    export default {
        name: 'SelectSubject',
        props:{
            "majors": Array
        },
        data(){
            return{
                selectedSubject: '',
                subjects: []
            }
        },
        methods:{
            getSubjects:  (majors) => {
                var subjectlists = [];
                // console.log("majors is: "+majors);

                majors.forEach((i, k) => console.log(k));
                majors.forEach((value, key) => {
                    console.log("sending resquests..."+'/getsubjects/'+value)
                    axios.get('/getsubjects/'+value).then( response => {
                        console.log("subjectlist["+key+"] = "+response.data)
                        subjectlists[key] = response.data;
                    });
                });

                // var result = subjectlists[0];
                // for(var i = 1; i < subjectlists.length; i++){
                //     result = result.filter(element => subjectlists[i].includes(element));
                // }
                console.log("subjectlist[0] is "+subjectlists[0]);
                return subjectlists[0];
            }

        },
        created() {
            console.log("majros is "+this.majors);
            // axios.get('/getsubjects/1').then( response => {
            //     this.subjects = response.data;
            // });
        }
    }
</script>
