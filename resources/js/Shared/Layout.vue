<template>
    <div>
        <notification v-if="notification">{{ notification }}</notification>
        <portal-target name="dropdown" slim />
        <div class="flex flex-col">
            <div class="min-h-screen flex flex-col" @click="hideDropdownMenus">
                <div class="md:flex">
                    <div class="bg-blue-800 md:flex md:w-220p md:flex-none px-6 py-4 flex items-center justify-between md:justify-center">
                        <inertia-link class="mt-1" href="/">
                            <text-logo class="fill-white" width="160" />
                        </inertia-link>
                        <dropdown class="md:hidden" placement="bottom-end">
                            <svg class="fill-white w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" /></svg>
                            <div slot="dropdown" class="mt-2 px-8 py-4 shadow-lg bg-blue-800 rounded">
                                <main-menu />
                            </div>
                        </dropdown>
                    </div>
                    <div class="bg-white border-b p-4 md:py-0 md:px-12 md:w-full text-sm md:text-base flex justify-between items-center">
                        <div class="mt-1 mr-4">
                            <h1 class="font-medium text-gray-800 text-2xl">{{ page.props.active }}</h1>
                        </div>
                        <dropdown class="mt-1 ml-auto" placement="bottom-end">
                            <div class="flex items-center cursor-pointer select-none group">
                                <div class="text-gray-700 group-hover:text-blue-800 focus:text-blue-800 mr-1 whitespace-no-wrap">
                                    <span class="md:inline">{{ page.props.auth.user.name }}</span>
                                </div>
                                <icon class="w-5 h-5 group-hover:fill-blue-800 fill-gray-700 focus:fill-blue-800" name="cheveron-down" />
                            </div>
                            <div slot="dropdown" class="mt-2 py-2 shadow-lg bg-white rounded text-sm">
                                <!-- <inertia-link class="block px-6 py-2 hover:bg-indigo-500 hover:text-white" :href="route('users.edit', page.props.auth.user.id)">My Profile</inertia-link>
                                <inertia-link class="block px-6 py-2 hover:bg-indigo-500 hover:text-white" :href="route('users')">Manage Users</inertia-link> -->
                                <inertia-link class="block px-6 py-2 hover:bg-indigo-500 hover:text-white" :href="route('logout')">Logout</inertia-link>
                            </div>
                        </dropdown>
                    </div>
                </div>
                <div class="flex flex-grow">
                    <div class="bg-blue-600 flex-no-shrink w-220p p-12 hidden md:block">
                        <main-menu />
                    </div>
                    <div class="overflow-hidden px-4 py-8 md:p-12">
                        <slot />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { InertiaLink } from 'inertia-vue'
import Dropdown from '@/Shared/Dropdown'
import Icon from '@/Shared/Icon'
import TextLogo from '@/Shared/TextLogo'
import MainMenu from '@/Shared/MainMenu'
import Notification from '@/Shared/Notification'

export default {
  components: {
    InertiaLink,
    Dropdown,
    Icon,
    TextLogo,
    MainMenu,
    Notification,
  },
  inject: ['page'],
  props: {
    title: String,
  },
  mixins: [ 'HasNotifications'],
  store: ['notification'],
  data () {
    return {
      showUserMenu: false,
    }
  },
  watch: {
    title (title) {
      this.updatePageTitle(title)
    },
  },
  mounted () {
    this.updatePageTitle(this.title)
  },
  methods: {
    updatePageTitle (title) {
      document.title = title ? `${title} | ${this.page.props.app.name}` : this.page.props.app.name
    },
    hideDropdownMenus () {
      this.showUserMenu = false
    },
  },
}
</script>
