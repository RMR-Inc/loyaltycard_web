<template>
    <div class="card" v-if="verifyingEmail">
        <h3>Well done !</h3>
        <h5>Now please check your inbox to verify your email address</h5>
        <a @click="resentEmail" class="btn" :disabled="resentTimeout.time > 0">
            <img src="https://cdn.loyaltycard.tech/icons/Device/restart-light-fill.svg" alt="Resent icon" class="icn">
            Resent verification mail
        </a>
        <span class="left-time">{{resentTimeout.time > 0 ? `(Available in: ${resentTimeout.timeStr})` : ``}}</span>
    </div>
    <div class="card" v-else>
        <h3>Welcome !</h3>
        <h5>Create your referent account</h5>
        <div class="ipt">
            <input type="text" id="firstname" :disabled="req.status == `loading`" placeholder="Firstname" required v-model="form.firstname.content" @input="checkName" @focusout="checkRequired" max="100" autocomplete="off">
            <span class="error-msg" v-if="form.firstname.error">{{form.firstname.error}}</span>
        </div>
        <div class="ipt">
            <input type="text" id="lastname" :disabled="req.status == `loading`" placeholder="Lastname" required v-model="form.lastname.content" @input="checkName" @focusout="checkRequired" max="100" autocomplete="off">
            <span class="error-msg" v-if="form.lastname.error">{{form.lastname.error}}</span>
        </div>
        <div class="ipt">
            <input type="email" id="email" :disabled="req.status == `loading`" placeholder="Email address" required v-model="form.email.content" @input="checkEmail" @focusout="checkRequired">
            <span class="error-msg" v-if="form.email.error">{{form.email.error}}</span>
        </div>
        <div class="ipt">
            <label class="password-input">
                <input type="password" id="password" :disabled="req.status == `loading`" placeholder="Password" required v-model="form.password.content" @input="checkPassword" @focusout="checkRequired" autocomplete="off">
                <img src="https://cdn.loyaltycard.tech/icons/hide-password.svg" class="input-icn">
            </label>
            <span class="error-msg" v-if="form.password.error">{{form.password.error}}</span>
        </div>
        <div class="ipt">
            <label class="password-input">
                <input type="password" id="passwordConfirm" :disabled="req.status == `loading`" placeholder="Password Confirmation" required v-model="form.passwordConfirm.content" @input="checkPassword" @focusout="checkRequired" autocomplete="off">
                <img src="https://cdn.loyaltycard.tech/icons/hide-password.svg" class="input-icn">
            </label>
            <span class="error-msg" v-if="form.passwordConfirm.error">{{form.passwordConfirm.error}}</span>
        </div>
        <div class="bottom-form">
            <span>Already signup ? <nuxt-link to="/login">Login here</nuxt-link></span>
        </div>
        <div class="right-align">
            <a class="btn icn-only valid" v-if="req.status == `success`">
                <img src="https://cdn.loyaltycard.tech/icons/System/check-double-light-line.svg" alt="Valid icon" class="icn">
            </a>
            <a class="btn icn-only invalid" v-else-if="req.status == `error`">
                <img src="https://cdn.loyaltycard.tech/icons/System/error-light-line.svg" alt="Invalid icon" class="icn">
            </a>
            <a class="btn icn-only" v-else-if="req.status == `loading`">
                <img src="https://cdn.loyaltycard.tech/icons/System/refresh-light-fill.svg" alt="Loading icon" class="icn loading">
            </a>
            <a @click="submitForm" class="btn inverted spc-btwn" v-else>
                Sign Up
                <img src="https://cdn.loyaltycard.tech/icons/System/arrow-right-circle-light-line.svg" alt="Signup icon" class="icn">
            </a>
        </div>
    </div>
</template>

<script>
    export default {
        data: () => ({
            form: {
                firstname: {
                    content: "",
                    error: null,
                },
                lastname: {
                    content: "",
                    error: null,
                },
                email: {
                    content: "",
                    error: null,
                },
                password: {
                    content: "",
                    error: null,
                },
                passwordConfirm: {
                    content: "",
                    error: null,
                },
            },
            req: {
                status: "",
            },
            resentTimeout: {
                time: 120,
                timeStr: "",
            },
            emailRegex: /^[a-zA-Z_.0-9+\-*=]+@[a-z0-9_]+?\.[a-z0-9]{2,3}$/,
            verifyingEmail: false,
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

                if(this.form[e.target.id].content.length < 7) this.form[e.target.id].error = "Too short !";
                if(this.form[e.target.id].content.length > 255) this.form[e.target.id].error = "Too long !";

                if(this.form.password.content != this.form.passwordConfirm.content) this.form.passwordConfirm.error = "Passwords do not match :/";
            },
            checkName(e){
                this.form[e.target.id].error = null;

                if(this.form[e.target.id].content.length < 3) this.form[e.target.id].error = "Too short !";
                if(this.form[e.target.id].content.length > 100) this.form[e.target.id].error = "Too long !";

                if(e.target.id == "firstname"){
                    let splitFn = this.form[e.target.id].content.split(" ");
                    for (let i = 0; i < splitFn.length; i++)
                        if(splitFn[i]) splitFn[i] = splitFn[i][0].toUpperCase() + splitFn[i].substr(1);

                    this.form[e.target.id].content = splitFn.join(" ");
                }
                if(e.target.id == "lastname") this.form[e.target.id].content = this.form[e.target.id].content.toUpperCase();
            },
            submitForm(e){
                for(let c in this.form){
                    if(this.form[c].content.length == 0) this.form[c].error = "Required !";
                    if(this.form[c].error) return;
                }

                this.req.status = "loading";

                this.$axios.post(`https://api.loyaltycard.tech/auth/register`, {
                    name: `${this.form.lastname.content} ${this.form.firstname.content}`,
                    email: this.form.email.content,
                    password: this.form.password.content,
                }).then(res => {
                    console.log(res)
                    if(!res.data.success){
                        let notification = { type: 'error', content: 'Invalid fields ! Email maybe already assign to an account', displayTime: 5000 };
                        this.$store.dispatch('notifications/add', notification);
                        this.req.status = "error";

                        setTimeout(() => { this.req.status = null; }, 1000);

                        return;
                    }

                    let notification = { type: 'success', content: 'Successfully register !', displayTime: 5000};
                    this.$store.dispatch('notifications/add', notification);
                    this.req.status = "success";

                    setTimeout(() => {
                        this.verifyingEmail = true;

                        let minutes = Math.floor(this.resentTimeout.time/60);
                        let seconds = ((this.resentTimeout.time*1000%60000)/1000).toFixed(0);

                        this.resentTimeout.timeStr = (minutes < 10 ? '0' + minutes : minutes) + ":" + (seconds < 10 ? '0' + seconds : seconds);

                        setInterval(() => {
                            this.resentTimeout.time--;

                            minutes = Math.floor(this.resentTimeout.time/60);
                            seconds = ((this.resentTimeout.time*1000%60000)/1000).toFixed(0);

                            this.resentTimeout.timeStr = (minutes < 10 ? '0' + minutes : minutes) + ":" + (seconds < 10 ? '0' + seconds : seconds);
                        }, 1000);

                    }, 1000);
                }).catch(err => {
                    let notification = { type: 'error', content: 'An error occured !' };
                    this.$store.dispatch('notifications/add', notification);
                    this.req.status = "error";

                    setTimeout(() => { this.req.status = null; }, 1000);
                });
            },
            resentEmail(e){
                if(this.resentTimeout.time > 0) return;

                this.resentTimeout.time = 120;
            }
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

    .left-time {
        margin-top: 8px;
        text-align: center;
    }
</style>
