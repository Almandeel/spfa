<template>
    <div class="comments">
        <h4 class="title">التعليقات</h4>

        <div class="comment" v-for="(comment, index) in comments" :key="index">
            <div class="row">
                <div class="col-md-10">
                    <i class="fa fa-user"></i> <h4 class="user-name">{{ comment.user.name }}</h4> 
                    <p class="comment">{{ comment.comment }}</p>
                </div>
            </div>
        </div>


        <form action="#" >
            <textarea v-model="comment" name="comment" cols="30" rows="7" v-text="comment" class="form-control form-group"></textarea>
            <div class="form-group">
                <input type="hidden" name="news_id" value="">
                <button type="button" class="btn btn-primary btn-sm" @click="storeComment()" >Send</button>
            </div>
        </form>
    </div>
</template>

<script>
import axios from "axios";

export default {
    props : ['user_id', 'post_id'],
    data () {
        return {
            comments : [],
            comment : null,
            post : this.user_id,
            user : this.post_id,
        }
    },
    mounted () {
        window.Echo.channel("new-comment").listen("CommentEvent", e => {
            this.getComments();
        })
    },

    methods : {
        storeComment() {
            if(this.comment != null) {
                axios.post('/comments', {
                    user_id: this.user_id,
                    post_id: this.post_id,
                    comment : this.comment
                })
                .then(function () {
                    
                })
                .catch(function (error) {
                    console.log(error);
                });
            }
            this.comment = '';
            this.getComments();
        },
        getComments() {
            axios.get("/get/comments/" + this.post_id).then((result) => {
                this.comments = result.data
            });
        }
    },
    beforeMount() {
        this.getComments()
    }
}
</script>

<style>

</style>