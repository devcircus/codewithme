<template>
    <div class="p-6 bg-indigo-darker min-h-screen flex justify-center">
        <div class="w-full max-w-sm">
            <logo class="block mx-auto w-full max-w-xs fill-white" height="50" />
            <form class="mt-8 bg-white rounded-lg shadow-lg overflow-hidden" @submit.prevent="submit">
                <div class="px-10 py-12">
                    <h1 class="text-center font-bold text-3xl">Reset Password</h1>
                    <div class="mx-auto mt-6 w-24 border-b-2" />
                    <text-input v-model="form.fields.email" class="mt-10" label="Email" :error="form.errors.first('email')" type="email" autofocus autocapitalize="off" />
                    <text-input v-model="form.fields.password" class="mt-6" label="Password" :error="form.errors.first('password')" type="password" />
                    <text-input v-model="form.fields.password_confirmation" class="mt-6" label="Confirm Password" type="password" />
                    <div v-if="form.errors.errors.token" class="form-error text-center mt-2 text-base italic">The password reset token is invalid. Please start the password reset process from the beginning.</div>
                </div>
                <div class="px-10 py-4 bg-grey-lightest border-t border-grey-lighter flex justify-between items-center">
                    <loading-button :loading="form.sending" class="btn-indigo" type="submit">Reset Password</loading-button>
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
    token: String,
  },
  inject: ['page'],
  data () {
    return {
      form: new Form({
        email: null,
        password: null,
        password_confirmation: null,
        token: this.token,
      }),
    }
  },
  mounted () {
    document.title = `Password Reset | ${this.page.props.app.name}`
  },
  methods: {
    submit () {
      this.form.post({
        url: this.route('password.update').url(),
        then: response => {
            if (response.message) {
                this.$store.notification = 'Your password has been successfully changed!';

                return Inertia.visit('/dashboard');
            }
        },
      });
    },
  },
}
</script>
