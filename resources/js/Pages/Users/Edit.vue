<template>
    <layout :title="`${form.fields.name}`">
        <h1 class="mb-8 font-bold text-3xl">
            <inertia-link class="text-indigo-light hover:text-indigo-dark" :href="route('users')">Users</inertia-link>
            <span class="text-indigo-light font-medium">/</span>
            {{ form.fields.name }}
        </h1>
        <!-- <trashed-message v-if="user.deleted_at" class="mb-6" @restore="restore">
            This user has been deleted.
        </trashed-message> -->
        <div class="bg-white rounded shadow overflow-hidden max-w-lg">
            <form @submit.prevent="submit">
                <div class="p-8 -mr-6 -mb-8 flex flex-wrap">
                    <text-input v-model="form.fields.name" class="pr-6 pb-8 w-full lg:w-1/2" :error="form.errors.first('name')" label="Name" />
                    <text-input v-model="form.fields.email" class="pr-6 pb-8 w-full lg:w-1/2" :error="form.errors.first('email')" label="Email" />
                    <text-input v-model="form.fields.password" class="pr-6 pb-8 w-full lg:w-1/2" :error="form.errors.first('password')" type="password" autocomplete="new-password" label="Password" />
                </div>
                <div class="px-8 py-4 bg-grey-lightest border-t border-grey-lighter flex items-center">
                    <button v-if="!user.deleted_at" class="text-red hover:underline" tabindex="-1" type="button" @click="destroy">Delete User</button>
                    <loading-button :loading="form.sending" class="btn-indigo ml-auto" type="submit">Update User</loading-button>
                </div>
            </form>
        </div>
    </layout>
</template>

<script>
import { Inertia, InertiaLink } from 'inertia-vue';
import Form from '@/Utils/Form';
import Layout from '@/Shared/Layout';
import LoadingButton from '@/Shared/LoadingButton';
import TextInput from '@/Shared/TextInput';

export default {
  components: {
    InertiaLink,
    Layout,
    LoadingButton,
    TextInput,
  },
  props: {
    user: Object,
    sessions: Array,
  },
  data () {
    return {
      form: new Form({
        name: this.user.name,
        email: this.user.email,
        password: this.user.password,
      }),
    }
  },
  methods: {
    submit () {
      this.form.put({
        url: this.route('users.update', this.user.id).url(),
        then: () => Inertia.visit(this.route('users')),
      })
    },
    destroy () {
      if (confirm('Are you sure you want to delete this user?')) {
        this.form.delete({
          url: this.route('users.destroy', this.user.id).url(),
          then: () => Inertia.replace(this.route('users.edit', this.user.id).url()),
        })
      }
    },
    restore () {
      if (confirm('Are you sure you want to restore this user?')) {
        this.form.put({
          url: this.route('users.restore', this.user.id).url(),
          then: () => Inertia.replace(this.route('users.edit', this.user.id).url()),
        })
      }
    },
  },
}
</script>
