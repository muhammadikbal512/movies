<template>
<div class="row mt-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h3>Your Answer</h3>
                </div>
                <hr>
                <form @submit.prevent="create">
                    <div class="form-group">
                        <m-editor :body="body" name="new-answer">
                            <textarea class="form-control" required name="body" v-model="body" id="body" rows="10"></textarea>
                        </m-editor>
                    </div>
                    <div class="form-group">
                        <button :disabled="isInvalid" class="btn btn-lg btn-outline-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import MEditor from './MEditor'
export default {
    props:['questionId'],
    data() {
        return {
            body : '',

        }
    },

    components:{
        MEditor
    },

    methods: {
        create () {
            axios.post(`/questions/${this.questionId}/answers`, {
                body: this.body
            })
            .catch(error => {
                this.$toast.error(error.response.data.message, "Error");
            })
            .then(({data}) => {
                this.$toast.success(data.message, "Success");
                this.body = '';
                this.$emit('created', data.answer);
            })
        }
    },

    computed: {
        isInvalid() {
            return !this.signedIn || this.body.length <10;
        }
    }
}
</script>