<template>
    <div class="card">
        <h3>Lost it ?</h3>
        <h5>Redefine your password</h5>
        <div class="ipt">
            <input type="email" id="email" placeholder="Email address" required v-model="form.email.content" @input="checkEmail" @focusout="checkRequired">
            <span class="error-msg" v-if="form.email.error">{{form.email.error}}</span>
        </div>
        <div class="bottom-form">
            <span><nuxt-link to="/login">Finally remember it ?</nuxt-link></span>
            <span>No account ? <nuxt-link to="/signup">Signup here</nuxt-link></span>
        </div>
        <div class="right-align">
            <a @click="submitForm" class="btn inverted spc-btwn">
                Confirmer
                <img src="https://cdn.loyaltycard.tech/icons/System/arrow-right-circle-light-line.svg" alt="Confirm icon" class="icn">
            </a>
        </div>
    </div>
</template>

<script>
    export default {
        data: () => ({
            form: {
                email: {
                    content: "",
                    error: null,
                },
            },
            emailRegex: /^[a-zA-Z_.0-9+\-*=]+@[a-z0-9_]+?\.[a-z0-9]{2,3}$/,
        }),

        methods: {
            checkRequired(e) {
                if(e.target.value.trim().length == 0){
                    if(this.form[e.target.id]) this.form[e.target.id].error = "Required !";
                }
            },
            checkEmail(e){
                this.form.email.error = null;

                if(this.form.email.content.length == 0) return;

                if(!this.form.email.content.match(this.emailRegex)) this.form.email.error = "Bad email address !";
            },
            submitForm(e){
                for(let c in this.form) if(this.form[c].error) return;
            },
        },
    }
</script>

<style lang="css" scoped>
    .card {
        display: flex;
        flex-direction: column;
        width: 300px;
        height: fit-content;
        border-radius: 32px;
        padding: 32px 48px;
        box-shadow: 0 5px 10px rgba(154,160,185,0.05), 0 15px 40px rgba(166,173,201,0.2);
        background: no-repeat url("https://cdn.loyaltycard.tech/attachments/auth-card-background.svg");
        background-size: cover;
        background-position: center;
    }

    .card > h5 {
        margin-bottom: 48px;
    }

    .ipt {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin: 8px 0;
    }

    .ipt .error-msg {
        font-style: italic;
        color: var(--invalid-color);
        margin: 6px 0 0;
        width: 90%;
    }

    .bottom-form {
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        margin: 32px 4px 0;
    }

    .bottom-form > * {
        margin-bottom: 4px;
    }

    .right-align {
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        margin: 72px 16px 0;
    }
</style>
