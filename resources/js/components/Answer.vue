<template>
    <div class="media post">
       <vote :model="answer" name="answer"></vote>
        <div class="media-body">
            <form v-show="authorize('modify', answer) && editing" @submit.prevent="update">
                <div class="form-group">
                    <m-editor :body="body" :name="unique">
                        <textarea rows="10" v-model="body" class="form-control" required></textarea>
                    </m-editor>
                </div>
                <button class="btn btn-primary" type="submit" :disabled="isInvalid">Update</button>
                <button class="btn btn-outline-secondary" type="submit" @click.prevent="cancel">Cancel</button>
            </form>
            <div v-show="!editing">
                <div :id="unique" v-html="bodyHtml" ref="bodyHtml"></div>
                <div class="row">
                    <div class="col-4">
                        <div class="ml-auto">
                                <a v-if="authorize('modify', answer) " @click.prevent="edit" class="btn btn-sm btn-outline-info">Edit</a>
                            
                                <button v-if="authorize('modify', answer)" @click="destroy" class="btn btn-sm btn-outline-danger">Delete</button>
                        </div>
                    </div>
                    <div class="col-4">
                    </div>
                    <div class="col-4">
                        <user-info :model="answer" label="Asked"></user-info>
                    </div>
                </div>    
            </div>                        
        </div>
    </div>
</template>

<script>
import Vote from './Vote'
import UserInfo from './UserInfo'
import Modification from '../mixins/Modification'
import MEditor from './MEditor'
export default {
    props: ['answer'],

    mixins: [
        Modification
    ],

    data () {
        return {
            body: this.answer.body,
            bodyHtml: this.answer.body_html,
            id: this.answer.id,
            questionId: this.answer.question_id,
            beforeEditCache: null,
        }
    },
    components: {
        Vote,
        UserInfo,
        MEditor
    },
    methods: {
        setEditCache () {
            this.beforeEditCache = this.body;
        },

        restoreFromCache () {
            this.body = this.beforeEditCache;
        },
        payload() {
            return {
                body: this.body
            }
        },
        delete() {
            axios.delete(this.endpoint)
                    .then((res) => {
                        this.$toast.success(res.data.message, "Success", {timeout:2000})
                        this.$emit('deleted')
                    });
        }   
    },
    computed: {
        isInvalid () {
            return this.body.length < 10;
        },
        endpoint () {
            return `/questions/${this.questionId}/answers/${this.id}`;
        },
        unique() {
            return `answer-${this.id}`
        }
    }
}
</script>