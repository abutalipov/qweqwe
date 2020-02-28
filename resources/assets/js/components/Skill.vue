<template>
    <div class="myskills__item">
        <div class="myskills__title type-h3">{{j.title}}</div>
        <div class="myskills__content">
            <div class="myskills__img">
                <img src="" alt="">
            </div>
            
            <div class="myskills__img">
                <img src="/images/noimage1.png" alt="">
            </div>
            
            <div class="myskills__vote">
                <a href='#' class="myskills__vote-left">Vote</a>
                <div class="myskills__vote-right">R:<span class="myskills__color">15</span></div>
            </div>
        </div>
    </div>   
</template>

<script>

    export default {
        props: {
            otheruser: Object,
            user: Object,
            iam: false
        },
        data() {
            return {
                count: 0,
                labels: ['Online']
            }
        },
        mounted() {
            this.iam = this.user.id == this.otheruser.id
            console.log('otheruser',this.otheruser)
            console.log('user',this.user)
            console.log(this.iam)
            //this.drawChart();
        },
        methods: {

        }
    }
</script>
