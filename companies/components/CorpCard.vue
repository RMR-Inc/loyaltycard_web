<template>
    <div class="corp-card">
        <h5>Add new Companie</h5>
            <div class="ipt">
                <input type="text" id="name" placeholder="Corporation name" required @focusout="checkRequired" />
                <span class="error-msg" v-if="form.name.error">{{form.name.error}}</span>
            </div>
            <div class="ipt">
                <input type="email" id="email" placeholder="Email address" required v-model="form.email.content" @input="checkEmail" @focusout="checkRequired" />
                <span class="error-msg" v-if="form.email.error">{{form.email.error}}</span>
            </div>
            <div class="ipt">
                <input type="tel" id="phone" placeholder="Phone number" required v-model="form.phone.content" @input="checkPhone" @focusout="checkRequired" />
                <span class="error-msg" v-if="form.phone.error">{{form.phone.error}}</span>
            </div>    
            <div class="ipt preview">
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
                name: {
                    content: "",
                    error: null,
                },
                email: {
                    content: "",
                    error: null,
                },
                phone: {
                    content: "",
                    error: null,
                },
            },
            url: null,
            req: {
                status: "",
            },
            emailRegex: /^[a-zA-Z_.0-9+\-*=]+@[a-z0-9_]+?\.[a-z0-9]{2,3}$/,
            phoneRegex: /\+(9[976]\d|8[987530]\d|6[987]\d|5[90]\d|42\d|3[875]\d|2[98654321]\d|9[8543210]|8[6421]|6[6543210]|5[87654321]|4[987654310]|3[9643210]|2[70]|7|1)\d{3,14}$/,
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

            checkPhone(e){
                this.form.phone.error = null;

                if(this.form.phone.content.length == 0) return;

                if(!this.form.phone.content.match(this.phoneRegex)) this.form.phone.error = "Bad phone format !";
            },

             onFileChange(e) {
                const file = e.target.files[0];
                
                this.url = URL.createObjectURL(file);
            }
        },
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

    .preview {
        margin-bottom: 20px;
    }

    .preview h6 {
        margin-bottom: 10px;
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