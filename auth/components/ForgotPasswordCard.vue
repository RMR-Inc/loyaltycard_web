<template>
    <div class="login-card">
        <h3>Lost it ?</h3>
        <h5>Redefine your password</h5>
        <div class="login-ipt">
            <input type="email" id="email" placeholder="Email address" required v-model="form.email" @input="checkEmail" @focusout="checkRequired">
            <span class="error-msg" v-if="emailIncorrect">{{emailIncorrect}}</span>
        </div>
        <div class="bottom-form">
            <span><nuxt-link to="/login">Finally remember it ?</nuxt-link></span>
            <span>No account ? <nuxt-link to="/signup">Signup here</nuxt-link></span>
        </div>
        <div class="right-align">
            <a @click="submitForm" class="btn inverted spc-btwn">
                Confirmer
                <img src="https://cdn.loyaltycard.tech/icons/System/arrow-right-circle-line-light.svg" alt="Connexion icon" class="icn">
            </a>
        </div>
    </div>
</template>

<script>
    export default {
        data: () => ({
            form: {
                email: "",
            },
            emailIncorrect: null,
            emailRegex: /^[a-zA-Z_.0-9+\-*=]+@[a-z0-9_]+?\.[a-z0-9]{2,3}$/,
        }),

        methods: {
            checkRequired(e) {
                if(e.target.value.trim().length == 0){
                    switch(e.target.id){
                        case 'email':
                            this.emailIncorrect = "Required !";
                            break;
                        default:
                            break;
                    }
                }
            },
            checkEmail(e){
                this.emailIncorrect = null;
                
                if(this.form.email.length == 0) return;

                if(!this.form.email.match(this.emailRegex)) this.emailIncorrect = "Bad email address !";
            },
            submitForm(e){
                if(this.emailIncorrect) return;
            },
        },
    }
</script>

<style lang="css" scoped>
    .login-card {
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

    .login-card > h5 {
        margin-bottom: 48px;
    }

    .login-ipt {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin: 8px 0;
    }

    .login-ipt .error-msg {
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
