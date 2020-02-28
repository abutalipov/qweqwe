<template>

    <div>
        <div class="write-post">
            <textarea class="write-post__input type-h4_m" id="writepost" name="" placeholder="Anything share?"></textarea>
            <div class="write-post__action">
                <div class="write-post__icon write-post__icon_vote"></div>
                <div class="write-post__icon write-post__icon_photo"></div>
                <div class="write-post__icon write-post__icon_video"></div>
                <div class="write-post__icon write-post__icon_file"></div>
                <div class="write-post__icon write-post__icon_text"></div>
            </div>
            <div class="write-post__smile"></div>
            <div class="write-post__footer container-mobile">
                <div class="write-post__action">
                    <div class="write-post__icon write-post__icon_vote"></div>
                    <div class="write-post__icon write-post__icon_photo"></div>
                    <div class="write-post__icon write-post__icon_video"></div>
                    <div class="write-post__icon write-post__icon_file"></div>
                    <div class="write-post__icon write-post__icon_text"></div>
                    <div class="write-post__icon write-post__icon_settings"></div>
                </div>
                <div class="write-post__btn">
                    <button class="btn btn_accent type-h3_m">Publish</button>
                </div>
            </div>
        </div>
        <div class="p-table" id="table-post">
            <div class="p-table__nav container-mobile">
                <div class="p-table__tab type-h2 type-h3_m">All posts</div>
                <div class="p-table__tab type-h2 type-h3_m p-table__tab_active">My posts</div>
                <div class="p-table-search">
                    <div class="p-table-search__write">
                        <input class="post-comments-write__input type-h4_m" name="" placeholder="Write a search...">
                    </div>
                    <div class="p-table-search__input"></div>
                </div>
            </div>
            <div class="p-table__content">
                <div class="p-table__content-item" id="allposts">
                    <div class="post-item container-mobile">
                        <div class="post-author">
                            <div class="post-author__col-info">
                                <div class="post-author__avatar"><img src="img/_src/main-page/avatar.png" alt=""></div>
                                <div class="post-author__info">
                                    <div class="post-author__name type-h2 type-h2_m c-a">Bill Edward</div>
                                    <div class="post-author__time type-h3 type-h4_m c-b">Yestarday, 10 am</div>
                                    <div class="post-author__status type-h3 type-h4_m c-b">Online</div>
                                </div>
                            </div>
                            <div class="post-author__action"><a class="post-author__edit" href="#">
                                    <div class="post-author__edit-text type-h3 c-b hidden-mobile">Edit</div>
                                    <div class="post-author__icon-edit"></div></a><a class="post-author__view" href="#">
                                    <div class="post-author__view-text type-h4_m c-b">253</div>
                                    <div class="post-author__icon-view"></div></a></div>
                        </div>
                        <div class="post-content">
                            <h2>Look at my new level skill! </h2>
                            <p>My name is Bill Edward, please listen my new song)))</p>
                            <div class="post-content__gallery">
                                <div class="post-content__gallery-accent"><img src="img/_src/main-page/post.png" alt=""><img src="img/_src/main-page/post.png" alt=""></div>
                                <div class="post-content__gallery-mini"><img src="img/_src/main-page/post.png" alt=""><img src="img/_src/main-page/post.png" alt=""><img src="img/_src/main-page/post.png" alt=""><img src="img/_src/main-page/post.png" alt=""><img src="img/_src/main-page/post.png" alt=""><img src="img/_src/main-page/post.png" alt=""><img src="img/_src/main-page/post.png" alt=""></div>
                            </div>
                        </div>
                        <div class="post-footer"><a class="post-footer__item" href="#">
                                <div class="post-footer__icon-comment"></div>
                                <div class="post-footer__count type-h4_m">112</div></a><a class="post-footer__item" href="#">
                                <div class="post-footer__icon-stars"></div>
                                <div class="post-footer__count type-h4_m">253</div></a><a class="post-footer__item" href="#">
                                <div class="post-footer__icon-repost"></div>
                                <div class="post-footer__count type-h4_m">253</div></a></div>
                    </div>
                </div>
                <div class="p-table__content-item p-table__content-item_active" id="myposts">
                    <div class="post-item container-mobile">
                        <div class="post-author">
                            <div class="post-author__col-info">
                                <div class="post-author__avatar"><img src="img/_src/main-page/avatar.png" alt=""></div>
                                <div class="post-author__info">
                                    <div class="post-author__name type-h2 type-h2_m c-a">Bill Edward</div>
                                    <div class="post-author__time type-h3 type-h4_m c-b">Yestarday, 10 am</div>
                                    <div class="post-author__status type-h3 type-h4_m c-b">Online</div>
                                </div>
                            </div>
                            <div class="post-author__action"><a class="post-author__edit" href="#">
                                    <div class="post-author__edit-text type-h3 c-b hidden-mobile">Edit</div>
                                    <div class="post-author__icon-edit"></div></a><a class="post-author__view" href="#">
                                    <div class="post-author__view-text type-h4_m c-b">253</div>
                                    <div class="post-author__icon-view"></div></a></div>
                        </div>
                        <div class="post-content">
                            <h2>Look at my new level skill! </h2>
                            <p>My name is Bill Edward, please listen my new song)))</p>
                            <div class="post-content__gallery">
                                <div class="post-content__gallery-accent"><img src="img/_src/main-page/post.png" alt=""><img src="img/_src/main-page/post.png" alt=""></div>
                                <div class="post-content__gallery-mini"><img src="img/_src/main-page/post.png" alt=""><img src="img/_src/main-page/post.png" alt=""><img src="img/_src/main-page/post.png" alt=""><img src="img/_src/main-page/post.png" alt=""><img src="img/_src/main-page/post.png" alt=""><img src="img/_src/main-page/post.png" alt=""><img src="img/_src/main-page/post.png" alt=""></div>
                            </div>
                        </div>
                        <div class="post-footer"><a class="post-footer__item" href="#">
                                <div class="post-footer__icon-comment"></div>
                                <div class="post-footer__count type-h4_m">112</div></a><a class="post-footer__item" href="#">
                                <div class="post-footer__icon-stars"></div>
                                <div class="post-footer__count type-h4_m">253</div></a><a class="post-footer__item" href="#">
                                <div class="post-footer__icon-repost"></div>
                                <div class="post-footer__count type-h4_m">253</div></a></div>
                        <div class="post-comments">
                            <div class="post-comments__item"><a class="post-comments__avatar" href="#"><img src="img/_src/main-page/avatar.png" alt=""></a>
                                <div class="post-comments__content">
                                    <div class="post-comments__info"><a class="post-comments__title type-h2 type-h2_m c-a" href="#">Bill Edward</a>
                                        <div class="post-comments__time c-g">15:35</div>
                                    </div>
                                    <div class="post-comments__text">
                                        <p>My name is Bill Edward, please listen my new song))) My name is Bill Edward, please listen my new song)))</p>
                                    </div>
                                </div>
                            </div>
                            <div class="post-comments__item"><a class="post-comments__avatar" href="#"><img src="img/_src/main-page/avatar.png" alt=""></a>
                                <div class="post-comments__content">
                                    <div class="post-comments__info"><a class="post-comments__title type-h2 type-h2_m c-a" href="#">Michael Bay</a>
                                        <div class="post-comments__time c-g">15:35</div>
                                    </div>
                                    <div class="post-comments__text">
                                        <p>My name is Bill Edward, please listen my new song))) My name is Bill Edward, please listen my new song)))</p>
                                    </div>
                                </div>
                            </div>
                            <div class="post-comments__item"><a class="post-comments__avatar" href="#"><img src="img/_src/main-page/avatar.png" alt=""></a>
                                <div class="post-comments__content">
                                    <div class="post-comments__info"><a class="post-comments__title type-h2 type-h2_m c-a" href="#">Michael Bay</a>
                                        <div class="post-comments__time c-g">15:35</div>
                                    </div>
                                    <div class="post-comments__text">
                                        <p>My name is Bill Edward, please listen my new song))) My name is Bill Edward, please listen my new song)))</p>
                                    </div>
                                </div>
                            </div>
                            <div class="post-comments__item"><a class="post-comments__avatar" href="#"><img src="img/_src/main-page/avatar.png" alt=""></a>
                                <div class="post-comments__content">
                                    <div class="post-comments__info"><a class="post-comments__title type-h2 type-h2_m c-a" href="#">Bill Edward</a>
                                        <div class="post-comments__time c-g">15:35</div>
                                    </div>
                                    <div class="post-comments__text">
                                        <p>My name is Bill Edward, please listen my new song)))</p>
                                    </div>
                                </div>
                            </div>
                            <div class="post-comments__item"><a class="post-comments__avatar" href="#"><img src="img/_src/main-page/avatar.png" alt=""></a>
                                <div class="post-comments__content">
                                    <div class="post-comments__info"><a class="post-comments__title type-h2 type-h2_m c-a" href="#">Bill Edward</a>
                                        <div class="post-comments__time c-g">15:35</div>
                                    </div>
                                    <div class="post-comments__text">
                                        <p>My name is Bill Edward, please listen my new song))) My name is Bill Edward, please listen my new song)))</p>
                                    </div>
                                </div>
                            </div>
                            <div class="post-comments-write container-mobile">
                                <div class="post-comments-write__avatar post-comments__avatar"><img src="img/_src/main-page/avatar.png" alt=""></div>
                                <div class="post-comments-write__inp-wrap">
                                    <input class="post-comments-write__input type-h4_m" name="" placeholder="Write a message...">
                                    <div class="post-comments-write__smile"></div>
                                </div>
                                <div class="post-comments-write__send"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        props: {
            user: Object,
            otheruser: Object
        },
        data() {
            return {
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                iam: false,
            }
        },
        mounted() {
            this.iam = this.user.id == this.otheruser.id
            this.load(this.otheruser.name)
        },
        methods: {
            load(username) {
                this.$http
                        .get(`/sapi/wall/${username}`)
                        .then(res => {
                            console.log(res.body);
                        });
            },
        }
    }
</script>
