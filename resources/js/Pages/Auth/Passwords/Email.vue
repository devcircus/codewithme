<template>
    <div class="p-6 bg-indigo-darker min-h-screen flex justify-center">
        <div class="w-full max-w-sm">
            <div v-if="message" class="form-message text-center">{{ message }}</div>
            <div v-if="error" class="form-error text-center">{{ error }}</div>
            <form class="mt-8 bg-white rounded-lg shadow-lg overflow-hidden" @submit.prevent="submit">
                <div class="px-10 py-12">
                    <logo class="block mx-auto w-3/5 max-w-xs fill-white" height="50" />
                    <h1 class="text-center font-semibold text-xl text-gray-700 uppercase p-4">Send Reset Instructions</h1>
                    <div class="mx-auto mt-6 w-24 border-b-2" />
                    <text-input v-model="form.fields.email" class="mt-10" label="Email" :error="form.errors.first('user')" type="email" autofocus autocapitalize="off" />
                </div>
                <div class="px-10 py-4 bg-grey-lightest border-t border-grey-lighter flex justify-between items-center">
                    <loading-button :loading="form.sending" class="btn-indigo" type="submit">Send</loading-button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import Form from '@/Utils/Form';
import LoadingButton from '@/Shared/LoadingButton';
import Logo from '@/Shared/Logo';
import TextInput from '@/Shared/TextInput';

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
        email: null,
      }),
      message: null,

    }
  },
  mounted () {
    document.title = `Forgot Password | ${this.page.props.app.name}`;
  },
  methods: {
    submit () {
      this.form.post({
        url: this.route('password.email').url(),
        then: response => {
            if (response.message) {
                this.message = response.message;
            }
        },
      });
    },
  },
}
</script>
