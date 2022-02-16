<template>
    <div class="corp-card">
        <h5>Add new Companie</h5>
            <div class="corp-ipt">
                <input type="text" class="input" name="corp-name" id="corp-name" placeholder="Corporation name" required v-model="form.name" @focusout="checkRequired" />
            </div>
            <div class="corp-ipt">
                <input type="text" class="input" name="corp-email" id="corp-email" placeholder="Email address" required v-model="form.email" @input="checkEmail" @focusout="checkRequired" />
                <span class="error-msg" v-if="emailIncorrect">{{emailIncorrect}}</span>
            </div>
            <div class="corp-ipt">
                <input type="tel" class="input" name="corp-tel" id="corp-tel" placeholder="Phone number" required v-model="form.name" @focusout="checkRequired" />
            </div>    
            <div class="corp-ipt preview">
                <h6>Preview :</h6>
                <img v-if="url" :src="url" />
            </div>
            <label class="corp-ipt file" data-dashlane-label="true">
                <input type="file" id="file" data-dashlane-rid="45c4e6a542604611" data-form-type="other" @change="onFileChange">
                <span class="file-custom"></span>
            </label>
        
        <div class="right-align">
            <a href="./" class="btn inverted spc-btwn">
                Send
                <img src="https://cdn.loyaltycard.tech/icons/System/arrow-right-circle-light-line.svg" alt="" class="icn" draggable="false" />
            </a>
        </div>
    </div>
</template>

<script>
    export default {
        data: () => ({
            form: {
                name: "",
                email: "",
                phone: true,
            },
            nameIncorrect: null,
            emailIncorrect: null,
            phoneIncorrect: null,
            emailRegex: /^[a-zA-Z_.0-9+\-*=]+@[a-z0-9_]+?\.[a-z0-9]{2,3}$/,
            url: null,
        }),
        
        methods: {
            checkRequired(e) {
                if(e.target.value.trim().length == 0){
                    switch(e.target.id){
                        case 'email':
                            this.emailIncorrect = "Required !";
                            break;
                        case 'name':
                            this.passwordIncorrect = "Required !";
                            break;
                        case 'phone':
                            this.phoneIncorrect = "Required !";
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
            onFileChange(e) {
            const file = e.target.files[0];
            this.url = URL.createObjectURL(file);
            }
        }
    }
</script>

<style scoped>
    .corp-card {
        width: 300px;
        height: fit-content;
        padding: 32px 48px;
        border-radius: 32px;
        box-shadow: 0 5px 10px rgba(154,160,185,0.05), 0 15px 40px rgba(166,173,201,0.2);
        background: no-repeat url("https://cdn.loyaltycard.tech/attachments/auth-card-background.svg");
        background-size: cover;
        background-position: center;
        display: flex;
        flex-direction: column;
    }

    .corp-card > h5 {
        margin-bottom: 48px;
    }

    .corp-ipt {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin: 8px 0;
    }

    .corp-ipt .error-msg {
        font-style: italic;
        color: var(--invalid-color);
        margin: 6px 0 0;
        width: 90%;
    }

    .preview img {
        border: 1px solid;
        max-width: 100%;
        max-height: 100px;
    }

    .file-custom:after {
        content: "Add your logo...";
        height: 32px;
    }

    .right-align {
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        margin: 72px 16px 0;
    }
</style>