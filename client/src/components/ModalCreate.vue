<template>
    <div class="modal-wrapper">
        <div class="bg-dark" @click="closeModal"></div>
        <div class="modal">
            <div class="modal-form-group">
                <label>
                    Name
                    <span class="validation-error" v-if="validationError['name'] !== undefined">
                        {{ validationError['name'][0] }}
                    </span>
                </label>
                <input type="text" placeholder="Enter the name..." v-model="name">
            </div>
            <div class="modal-form-group">
                <label>
                    Surname
                    <span class="validation-error" v-if="validationError['surname'] !== undefined">
                        {{ validationError['surname'][0] }}
                    </span>    
                </label>
                <input type="text" placeholder="Enter the surname..." v-model="surname">
            </div>
            <div class="modal-form-group">
                <label>
                    Phone
                    <span class="validation-error" v-if="validationError['phone'] !== undefined">
                        {{ validationError['phone'][0] }}
                    </span>
                </label>
                <input type="text" placeholder="Enter the phone..." v-model="phone">
            </div>
            <div class="modal-form-group">
                <label>
                    Email
                    <span class="validation-error" v-if="validationError['email'] !== undefined">
                        {{ validationError['email'][0] }}
                    </span>    
                </label>
                <input type="text" placeholder="Enter the email..." v-model="email">
            </div>
            <div class="modal-form-group">
                <label>
                    Profile Image
                    <span class="validation-error" v-if="validationError['profile_image'] !== undefined">
                        {{ validationError['profile_image'][0] }}
                    </span>    
                </label>
                <div class="input-file-button">
                    Upload
                </div>
                <input type="file" class="input-file" :disabled="isUseDefault === true" @change="fileUploadHandler">
            </div>
            <div class="modal-form-group modal-form-group-checkbox">
                <label class="checkbox-label">Use placeholder image</label>
                <input type="checkbox" class="input-checkbox" v-model="isUseDefault" />
            </div>
            <div class="modal-form-group">
                <label>
                    Title
                    <span class="validation-error" v-if="validationError['title'] !== undefined">
                        {{ validationError['title'][0] }}
                    </span>    
                </label>
                <select class="select-input" v-model="title">
                    <option disabled value="">Select one of title</option>
                    <option value="Mr.">Mr.</option>
                    <option value="Mrs.">Mrs.</option>
                </select>
            </div>
            <div class="modal-form-group">
                <button class="modal-form-submit" @click="submitHandler">
                    Submit
                </button>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data(){
        return{
            name: '',
            surname: '',
            phone: '',
            email: '',
            image: '',
            title: '',
            isUseDefault: false,
            validationError: {}
        }
    },
    methods: {
        closeModal(){
            this.$emit('closeModal', true);
        },
        fileUploadHandler(e){
            this.image = e.target.files[0];
        },
        async submitHandler(){
            let formData = new FormData();
            formData.append('title', this.title);
            formData.append('name', this.name);
            formData.append('surname', this.surname);
            formData.append('phone', this.phone);
            formData.append('email', this.email);
            formData.append('profile_image', this.image);
            formData.append('use_placeholder', this.isUseDefault === false ? 0 : 1);

            try {
                const response = await axios.post(import.meta.env.VITE_SERVER_HOST + '/api/customers/create', formData);
                this.$emit('addNewCustomer', response.data);
                this.$emit('closeModal', true);
            } catch (error) {
                this.validationError = error.response.data;
                if(error.response.status === 500){
                    this.$router.push('/error/500');
                }
            }

        }
    }
}
</script>

<style>
    .modal-wrapper{
        width: 100%;
        height: 100vh;
        position: fixed;
        left: 0px;
        top: 0px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .bg-dark{
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.248);
        position: absolute;
    }

    .modal{
        width: 450px;
        height: 60vh;
        background: #fff;
        border-radius: 10px;
        padding: 20px;
        z-index: 10;
        overflow-y: auto;
    }

    .modal::-webkit-scrollbar {
    width: 0px;
    }

    .modal::-webkit-scrollbar-track {
    background: #f1f1f1;
    }

    .modal::-webkit-scrollbar-thumb {
    background: #888;
    border-radius: 3px;
    }

    .modal-form-group{
        display: flex;
        flex-direction: column;
        width: 75%;
        margin: 0px auto;
        margin-bottom: 5px;
        position: relative;
    }

    .modal-form-group label{
        font-size: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .modal-form-group input{
        border: none;
        border-radius: 7px;
        background: rgb(248, 248, 248);
        width: 100%;
        height: 40px;
        padding: 0px 10px;
        margin-top: 5px;
        font-size: 18px;
        transition: .3s linear;
    }

    .modal-form-group input:focus{
        outline: 0;
        -webkit-box-shadow: 0px 5px 24px -13px rgba(66, 68, 90, 1);
        -moz-box-shadow: 0px 5px 24px -13px rgba(66, 68, 90, 1);
        box-shadow: 0px 5px 24px -13px rgba(66, 68, 90, 1);
    }

    .input-file{
        opacity: 0;
        z-index: 10;
        cursor: pointer;
    }

    .input-file-button{
        position: absolute;
        left: 0px;
        bottom: 0px;
        width: 100%;
        border-radius: 7px;
        border: 1px solid rgb(0, 153, 255);
        text-align: center;
        cursor: pointer;
    }

    .input-file:hover .input-file-button{
        background: #000;
    }

    .modal-form-group-checkbox{
        flex-direction: row;
        justify-content: space-between;
    }

    .checkbox-label{
        font-size: 17px !important;
    }

    .input-checkbox{
        width: 17px !important;
        height: 17px !important;
    }

    .modal-form-submit{
        width: 100%;
        height: 40px;
        cursor: pointer;
        margin-top: 10px;
        border: 0px;
        border-radius: 7px;
        background: rgb(24, 151, 255);
        color: #fff;
        transition: .3s linear;
    }

    .modal-form-submit:hover{
        -webkit-box-shadow: 0px 5px 24px -10px rgba(66, 68, 90, 1);
        -moz-box-shadow: 0px 5px 24px -10px rgba(66, 68, 90, 1);
        box-shadow: 0px 5px 24px -10px rgba(66, 68, 90, 1);
    }

    .select-input{
        border: none;
        border-radius: 7px;
        background: rgb(248, 248, 248);
        width: 100%;
        height: 40px;
        padding: 0px 10px;
        margin-top: 5px;
        font-size: 18px;
    }

    .select-input:focus{
        outline: none;
    }

    .validation-error
    {
        font-size: 12px;
        color: red;
    }

</style>