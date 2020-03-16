<template>

    <div class="myskills">
        <div v-for='(skill, index) in otheruser.skills.slice(0, skillMax)' class="myskills__item">
            <div class="myskills__title type-h3"><a :href="`/skills/rating/${skill.title}`">{{skill.title}}</a></div>
            <div class="myskills__content" >

                <div class="myskills__bg"></div>
                <div v-if='skill.image' class="myskills__img"  style=" ">
                    <img :src="skill.image" alt="" >
                </div>

                <div v-else class="myskills__img">
                    <img src="/images/noimage1.png" alt="">
                </div>

                <div v-if="!waitVoting" class="myskills__vote">
                    <a v-if="!iam && !skill.voted" href="#" class="myskills__vote-left" @click.prevent='vote(index)'>Vote</a>
                    <div v-else class="myskills__vote-left">
                        <template v-if="iam">&nbsp;</template>
                        <template v-else>voted</template>
                    </div>
                    <div class="myskills__vote-right">R:<span class="myskills__color">15</span></div>
                </div>
                
             <!--   <div v-else class="myskills__vote">
                    <a class="myskills__vote-left">.....</a>                    
                    <div class="myskills__vote-right">R:<span class="myskills__color">...</span></div>
                </div>-->
                
            </div>
            <!--////////////////////////-->
          <!-- <div class="myskills__content">
                <div class="myskills__vote" style="z-index: 10;">

                    @if(!$iam)
                    @if($votes->where('voting_user_id',Auth::user()->id)->count()>0)
                    <div class="myskills__vote-left">Voted</div>
                    @else
                    <div class="myskills__vote-left"><a style="z-index: 10; color:white;"
                                                        href="{{route('skills.vote',['skill'=>$skill->id,'user'=>$user->id])}}">Vote</a>
                    </div>
                    @endif
                    @else
                    <div class="myskills__vote-left"><s>Vote</s></div>
                    @endif
                    <?
                                        $sw = $skill->overall_weight;
                    $usw = $skill->pivot->weight;
                    ?>
                    <div class="myskills__vote-right">R:<span
                            class="myskills__color">{{$sw*$usw}}</span></div>
                </div>
            </div>-->
        </div>
        <div class="about-me__more type-h3" @click='changeMaxSkills'>See more</div>
    </div>
</template>

<script>

    export default {
        props: {
            otheruser: Object,
            user: Object
        },
        data() {
            return {
                waitVoting: false,
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                skillMax: 3,
                iam: false,
                count: 0,
                labels: ['Online']
            }
        },
        mounted() {
            this.iam = this.user.id == this.otheruser.id
            console.log('otheruser', this.otheruser)
            console.log('user', this.user)
            console.log(this.iam)
            //this.drawChart();
        },
        methods: {
            vote(index) {
                this.waitVoting = true

                //let skill = this.otheruser.skills[index];
                //console.log(skill)

                const postData = {user: this.otheruser.name, skill: this.otheruser.skills[index].id, _token: this.csrf};

                this.$http
                        .post(`/skills/vote`, postData)
                        .then(res => {
                            console.log(res.body);
                            
                            this.otheruser.skills[index].voted = true
                            //this.otheruser.skills = this.otheruser.skills.slice();
                            
                            let tempskillMax = this.skillMax
                            this.skillMax = 0
                            this.skillMax = tempskillMax
                            
                            this.waitVoting = false
                                                        

                            //this.$set(this.otheruser.skills[index], 'voted', true)
                            console.log('3')
                        });
            },
            changeMaxSkills() {
                if (this.skillMax == 3) {
                    this.skillMax = 99
                } else
                    [
                        this.skillMax = 3
                    ]
            },
        }
    }
</script>
