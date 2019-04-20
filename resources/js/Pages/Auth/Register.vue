<template>
    <div class="p-6 bg-indigo-darker min-h-screen flex justify-center">
        <div class="w-full max-w-sm">
            <form class="mt-8 bg-white rounded-lg shadow-lg overflow-hidden" @submit.prevent="submit">
                <div class="px-10 py-12">
                    <logo class="block mx-auto w-3/5 max-w-xs fill-white" height="50" />
                    <h1 class="text-center font-semibold text-xl text-gray-700 uppercase p-4">Register</h1>
                    <div class="mx-auto mt-6 w-24 border-b-2" />
                    <text-input v-model="form.fields.name" class="mt-10" label="Name" :error="form.errors.first('name')" type="text" autofocus autocapitalize="off" />
                    <text-input v-model="form.fields.email" class="mt-10" label="Email" :error="form.errors.first('email')" type="email" autocapitalize="off" />
                    <text-input v-model="form.fields.password" class="mt-6" label="Password" :error="form.errors.first('password')" type="password" />
                    <text-input v-model="form.fields.password_confirmation" class="mt-6" label="Confirm Password" type="password" />
                </div>
                <div class="px-10 py-4 bg-grey-lightest border-t border-grey-lighter flex justify-between items-center">
                    <a class="hover:underline" tabindex="-1" href="route('login')">Already registered?</a>
                    <loading-button :loading="form.sending" class="btn-indigo" type="submit">Register</loading-button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import { Inertia } from 'inertia-vue'
import Form from '@/Utils/Form'
import LoadingButton from '@/Shared/LoadingButton'
import Logo from '@/Shared/Logo'
import TextInput from '@/Shared/TextInput'

export default {
    components: {
        LoadingButton,
        Logo,
        TextInput,
    },
    props: {
        intendedUrl: String,
    },
    inject: ['page'],
    data () {
        return {
            form: new Form({
                name: null,
                email: null,
                password: null,
                password_confirmation: null,
            }),
        }
    },
    mounted () {
        document.title = `Register | ${this.page.props.app.name}`;
    },
    methods: {
        submit () {
            this.form.post({
                url: this.route('register.attempt').url(),
                then: () => Inertia.visit(this.intendedUrl),
            });
        },
    },
}
</script>
