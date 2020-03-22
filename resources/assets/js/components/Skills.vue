<template>

    <div v-if="skills">
        <div class="myskills">
            <div v-for='(skill, index) in this.skills.slice(0, skillMax)' class="myskills__item">
                <div class="myskills__title type-h3">{{skill.title}}</div>
                <div class="myskills__content">

                    <div class="myskills__bg"></div>
                    <div v-if='skill.image' class="myskills__img" style=" ">
                        <img :src="skill.image" alt="">
                    </div>

                    <div v-else class="myskills__img">
                        <img src="/images/noimage1.png" alt="">
                    </div>

                    <div v-if="!waitVoting" class="myskills__vote">

                        <a v-if="iam!=user_id && !skill.voted" href="#" class="myskills__vote-left"
                           @click.prevent='vote(index)'>Vote</a>
                        <div v-else class="myskills__vote-left">
                            <template v-if="iam==user_id"></template>
                            <template v-else>voted</template>
                        </div>
                        <div class="myskills__vote-right">R:<span class="myskills__color">{{skill.rating_sum}}</span>
                        </div>
                    </div>


                    <div v-else class="myskills__vote">
                        <a class="myskills__vote-left">.....</a>
                        <div class="myskills__vote-right">R:<span class="myskills__color">...</span></div>
                    </div>

                </div>
            </div>
        </div>
        <div class="about-me__more type-h3" v-if="this.skills.length>3" @click='changeMaxSkills'>{{this.togtext}}</div>
    </div>
</template>
<style>
    .myskills {
        margin-bottom: 20px;
    }
    .myskills__vote{
        z-index:100
    }
</style>
<script>

    export default {
        props: {
            user: false
        },
        data() {
            return {
                waitVoting: false,
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                skillMax: 3,
                iam: false,
                skills: false,
                user_id: false,
                togtext: "See more",
            }
        },
        mounted() {
            if(this.user){
                this.getSkills(this.user);
            }
        },
        methods: {
            getSkills(user_id) {
                this.$http
                    .get('/skills?user_id=' + user_id)
                    .then(res => {
                        console.log(res.body.skills.length);

                        this.skills = res.body.skills;
                        this.iam = res.body.iam;
                        this.user_id = res.body.user_id;
                        console.log('user', this.iam)
                        console.log('iam', this.user_id)
                    });
            },
            vote(index) {
                this.waitVoting = true

                let skill = this.skills[index];
                console.log(skill)

                const postData = {user: this.user_id, skill: skill.id, _token: this.csrf};

                this.$http
                    .post(`/skills/vote`, postData)
                    .then(res => {
                        console.log(res.body);

                        this.skills[index].voted = true

                        this.$set(this.skills[index], 'voted', true)
                    });

                this.waitVoting = false
            },
            changeMaxSkills() {
                if (this.skillMax == 3) {
                    this.togtext = "Hide"
                    this.skillMax = 99
                } else {

                    this.togtext = "See more"
                    this.skillMax = 3
                }
            },
        }
    }
</script>
