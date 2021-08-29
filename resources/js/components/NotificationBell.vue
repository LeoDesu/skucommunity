<template>
  <div class="dropdown">
      <div id="notification-dropdown" data-toggle="dropdown" class="pointer" @click="read()">
          <span v-if="notifications.length > 0">{{ notifications.length }}</span>
          <img src="/storage/img/server/bell.svg" alt="bell" style="width: 32px;">
      </div>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="min-width: 250px; min-height: 100px;">
          <a v-for="notification in notifications" :key="notification.id" :href="notification.reference" class="dropdown-item py-1">
              {{ notification.content }}<br>{{ notification.time }}
          </a>
      </div>
  </div>
</template>
<script>
export default {
    props:[
        'userId'
    ],
    data(){
        return {
            notifications: []
        }
    },
    methods:{
        pushNotification: function(e){
            var temp = this.notifications
            temp.push(e)
            this.notifications = temp
        },
        getUnread: function(){
            axios.get('/getunreadnotifications/'+this.userId)
                .then( res => {
                    this.notifications = res.data
                })
        },
        read: function(){
            for(const notification of this.notifications){
                axios.post('/readnotification', {id: notification.id})
            }
        }
    },
    mounted(){
        this.getUnread()
        Echo.channel('user-notification-'+this.userId)
            .listen('.new-notification', (e) => {
                this.pushNotification(e)
            });
    }
}
</script>