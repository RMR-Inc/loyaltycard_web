<template>
    <div class="card">
        <h3>Hi !</h3>
        <h5>Sign in to your account</h5>
        <div class="ipt">
            <input type="email" id="email" placeholder="Email address" required v-model="form.email.content" @input="checkEmail" @focusout="checkRequired">
            <span class="error-msg" v-if="form.email.error">{{form.email.error}}</span>
        </div>
        <div class="ipt">
            <label class="password-input">
                <input type="password" id="password" placeholder="Password" required v-model="form.password.content" @input="checkPassword" @focusout="checkRequired">
                <img src="https://cdn.loyaltycard.tech/icons/hide-password.svg" class="input-icn">
            </label>
            <span class="error-msg" v-if="form.password.error">{{form.password.error}}</span>
        </div>
        <div class="bottom-form">
            <label class="control checkbox">
                <input type="checkbox" checked v-model="form.rememberme">
                <span class="control-indicator"></span>
                Remember me
            </label>
            <span><nuxt-link to="/forgot-password">Forgot password ?</nuxt-link></span>
        </div>
        <div class="right-align">
            <a @click="submitForm" class="btn inverted spc-btwn">
                Login
                <img src="https://cdn.loyaltycard.tech/icons/System/arrow-right-circle-light-line.svg" alt="Login icon" class="icn">
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
                password: {
                    content: "",
                    error: null,
                },
                rememberme: true,
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
            checkPassword(e){
                this.form[e.target.id].error = null;
                this.form[e.target.id].content = this.form[e.target.id].content.trim();
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
        justify-content: space-between;
        align-items: center;
        margin: 32px 4px 0;
    }

    .right-align {
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        margin: 72px 16px 0;
    }
</style>
